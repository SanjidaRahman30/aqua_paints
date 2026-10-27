/**
 * Aqua Paints - Custom Room Painter & Color Visualizer Engine
 * Features:
 *  - Upload any room photo (drag & drop, file picker, camera) + Preset rooms
 *  - Ultra-smooth Bézier curve brush with soft-edge radial feathering
 *  - Exact Color representation with Realistic Wall Texture & Luminance Preservation
 *  - Smooth Brush, Soft Eraser, Smart Area Fill, Pan/Zoom
 *  - Undo / Redo history stack
 *  - Before / After instant comparison
 *  - High-res branded download
 */

(function () {
  'use strict';

  // State
  const state = {
    currentImage: null,
    imageWidth: 0,
    imageHeight: 0,
    zoom: 1,
    panX: 0,
    panY: 0,
    isPanning: false,
    panStartX: 0,
    panStartY: 0,
    activeTool: 'brush', // 'brush', 'eraser', 'fill', 'pan'
    brushSize: 28,
    brushSoftness: 0.55, // Optimized smooth feathered edge
    brushOpacity: 0.95,
    selectedColor: {
      id: '1',
      name: 'Brilliant White',
      code: 'AS01',
      family: 'Interior (Muslin+Superstar)',
      r: 240,
      g: 244,
      b: 240,
      hex: '#f0f4f0'
    },
    blendMode: 'realistic', // 'realistic', 'truematch', 'solid'
    textureIntensity: 0.65, // 0 to 1
    history: [],
    historyIndex: -1,
    maxHistory: 25,
    isDrawing: false,
    strokePoints: [],
    brushStamp: null,
    eraserStamp: null,
    activeFamily: 'all',
    activeHue: 'all',
    searchQuery: '',
    isComparing: false,
    fillAreaPoints: [],
    draggingPinIndex: -1,
    hoveredPinIndex: -1
  };

  // DOM Elements
  let elements = {};

  function initDOM() {
    elements = {
      viewport: document.getElementById('viewportArea'),
      canvasContainer: document.getElementById('canvasContainer'),
      bgCanvas: document.getElementById('bgCanvas'),
      paintCanvas: document.getElementById('paintCanvas'),
      displayCanvas: document.getElementById('displayCanvas'),
      brushCursor: document.getElementById('dynamicBrushCursor'),
      uploadModal: document.getElementById('uploadDropzoneModal'),
      fileInput: document.getElementById('roomFileInput'),
      cameraInput: document.getElementById('roomCameraInput'),
      dropzoneBox: document.getElementById('dropzoneBox'),
      btnBrowse: document.getElementById('btnBrowseUpload'),
      btnCamera: document.getElementById('btnCameraUpload'),
      presetBtns: document.querySelectorAll('.preset-thumb-btn'),
      // Tools
      toolBtns: document.querySelectorAll('[data-tool]'),
      brushSizeSlider: document.getElementById('brushSizeSlider'),
      brushSizeVal: document.getElementById('brushSizeVal'),
      btnUndo: document.getElementById('btnUndo'),
      btnRedo: document.getElementById('btnRedo'),
      btnClear: document.getElementById('btnClearPaint'),
      btnChangePhoto: document.getElementById('btnChangePhoto'),
      btnZoomIn: document.getElementById('btnZoomIn'),
      btnZoomOut: document.getElementById('btnZoomOut'),
      btnZoomReset: document.getElementById('btnZoomReset'),
      btnDownload: document.getElementById('btnDownloadVisualizer'),
      btnSmartFillCommit: document.getElementById('btnSmartFillCommit'),
      btnSmartFillReset: document.getElementById('btnSmartFillReset'),
      // Color Sidebar
      selectedSwatch: document.getElementById('selectedColorSwatchLarge'),
      selectedName: document.getElementById('selectedColorName'),
      selectedCode: document.getElementById('selectedColorCode'),
      selectedFamily: document.getElementById('selectedColorFamily'),
      selectedRgb: document.getElementById('selectedColorRgb'),
      searchInput: document.getElementById('colorSearchInput'),
      familyPills: document.querySelectorAll('.family-pill'),
      huePills: document.querySelectorAll('.hue-dot-pill'),
      colorCardsGrid: document.getElementById('colorCardsGrid'),
      toast: document.getElementById('toastMsg')
    };
  }

  // Toast Notification
  function showToast(msg, duration = 2400) {
    if (!elements.toast) return;
    elements.toast.textContent = msg;
    elements.toast.classList.add('show');
    clearTimeout(elements.toast._timer);
    elements.toast._timer = setTimeout(() => {
      elements.toast.classList.remove('show');
    }, duration);
  }

  // Pre-render soft radial brush stamp
  function updateBrushStamps() {
    const radius = Math.max(2, state.brushSize / 2);
    const diameter = radius * 2;
    const softness = Math.max(0.05, Math.min(0.95, state.brushSoftness));
    const innerRadius = radius * (1 - softness);

    // Color brush stamp
    const stamp = document.createElement('canvas');
    stamp.width = diameter;
    stamp.height = diameter;
    const sCtx = stamp.getContext('2d');

    const grad = sCtx.createRadialGradient(radius, radius, innerRadius, radius, radius, radius);
    const { r, g, b } = state.selectedColor;
    grad.addColorStop(0, `rgba(${r}, ${g}, ${b}, 1)`);
    grad.addColorStop(0.85, `rgba(${r}, ${g}, ${b}, 1)`);
    grad.addColorStop(1, `rgba(${r}, ${g}, ${b}, 0)`);

    sCtx.fillStyle = grad;
    sCtx.beginPath();
    sCtx.arc(radius, radius, radius, 0, Math.PI * 2);
    sCtx.fill();
    state.brushStamp = stamp;

    // Eraser stamp (white with soft alpha for destination-out)
    const eStamp = document.createElement('canvas');
    eStamp.width = diameter;
    eStamp.height = diameter;
    const eCtx = eStamp.getContext('2d');

    const eGrad = eCtx.createRadialGradient(radius, radius, innerRadius, radius, radius, radius);
    eGrad.addColorStop(0, 'rgba(0, 0, 0, 1)');
    eGrad.addColorStop(0.7, 'rgba(0, 0, 0, 0.75)');
    eGrad.addColorStop(1, 'rgba(0, 0, 0, 0)');

    eCtx.fillStyle = eGrad;
    eCtx.beginPath();
    eCtx.arc(radius, radius, radius, 0, Math.PI * 2);
    eCtx.fill();
    state.eraserStamp = eStamp;

    // Update dynamic brush cursor
    updateCursorSize();
  }

  function updateCursorSize() {
    if (!elements.brushCursor) return;
    const displayRadius = state.brushSize * state.zoom;
    elements.brushCursor.style.width = `${displayRadius}px`;
    elements.brushCursor.style.height = `${displayRadius}px`;
    const { hex } = state.selectedColor;
    if (state.activeTool === 'eraser') {
      elements.brushCursor.style.borderColor = '#ffffff';
      elements.brushCursor.style.borderStyle = 'dashed';
      elements.brushCursor.style.backgroundColor = 'rgba(255, 255, 255, 0.22)';
    } else {
      elements.brushCursor.style.borderColor = hex;
      elements.brushCursor.style.borderStyle = 'solid';
      elements.brushCursor.style.backgroundColor = `${hex}33`;
    }
  }

  // Load Room Image
  function loadRoomImage(src) {
    const img = new Image();
    if (src.startsWith('http://') || src.startsWith('https://')) {
      img.crossOrigin = 'anonymous';
    }
    img.onload = function () {
      state.currentImage = img;
      initCanvasDimensions(img.naturalWidth, img.naturalHeight);
      renderBaseImage();
      clearPaintLayer(false);
      pushHistory();
      if (elements.uploadModal) {
        elements.uploadModal.classList.add('hidden');
      }
      showToast('Room loaded! Start painting with smooth brush or tap wall fill.');
    };
    img.onerror = function (err) {
      console.error('Failed to load room image:', src, err);
      showToast('Failed to load image. Please try another.');
    };
    img.src = src;
  }

  function initCanvasDimensions(w, h) {
    // Limit max resolution for 60fps buttery smooth performance
    const maxDim = 1800;
    let targetW = w;
    let targetH = h;
    if (w > maxDim || h > maxDim) {
      if (w > h) {
        targetW = maxDim;
        targetH = Math.round((h / w) * maxDim);
      } else {
        targetH = maxDim;
        targetW = Math.round((w / h) * maxDim);
      }
    }

    state.imageWidth = targetW;
    state.imageHeight = targetH;

    [elements.bgCanvas, elements.paintCanvas, elements.displayCanvas].forEach(canvas => {
      canvas.width = targetW;
      canvas.height = targetH;
    });

    state.zoom = 1;
    state.panX = 0;
    state.panY = 0;
    applyTransform();
  }

  function applyTransform() {
    if (!elements.canvasContainer) return;
    elements.canvasContainer.style.transform = `translate(${state.panX}px, ${state.panY}px) scale(${state.zoom})`;
    updateCursorSize();
  }

  function renderBaseImage() {
    if (!state.currentImage) return;
    const bgCtx = elements.bgCanvas.getContext('2d');
    bgCtx.clearRect(0, 0, state.imageWidth, state.imageHeight);
    bgCtx.drawImage(state.currentImage, 0, 0, state.imageWidth, state.imageHeight);
    compositeDisplay();
  }

  function clearPaintLayer(pushToHistory = true) {
    cancelAreaFill();
    const pCtx = elements.paintCanvas.getContext('2d');
    pCtx.clearRect(0, 0, state.imageWidth, state.imageHeight);
    compositeDisplay();
    if (pushToHistory) {
      pushHistory();
      showToast('Paint cleared');
    }
  }

  // Exact Color Blending Compositor
  // Calculates real-time composite between base room photo and painted layer
  function compositeDisplay() {
    if (!state.currentImage) return;
    const dCtx = elements.displayCanvas.getContext('2d');
    dCtx.clearRect(0, 0, state.imageWidth, state.imageHeight);

    const w = state.imageWidth;
    const h = state.imageHeight;

    // Check if paintCanvas has any pixels
    // To maintain silky 60fps during brush strokes, we use 2D canvas blend modes:
    // When blendMode === 'solid': draw bg, then paintCanvas with source-over
    // When blendMode === 'truematch': draw bg, draw paintCanvas with source-over at 88% opacity
    // When blendMode === 'realistic': draw bg, draw paintCanvas with multiply/soft-light preserving exact color highlights
    dCtx.drawImage(elements.bgCanvas, 0, 0);

    dCtx.save();
    if (state.blendMode === 'solid') {
      // 100% flat swatch color
      dCtx.globalCompositeOperation = 'source-over';
      dCtx.globalAlpha = 1.0;
      dCtx.drawImage(elements.paintCanvas, 0, 0);
    } else {
      // Natural Wall Paint:
      // Direct paint coat at 0.90 opacity shows the true, exact paint pigment!
      dCtx.globalCompositeOperation = 'source-over';
      dCtx.globalAlpha = 0.90;
      dCtx.drawImage(elements.paintCanvas, 0, 0);

      // Subtle room lighting and shadows overlaid so wall contours are preserved
      dCtx.globalCompositeOperation = 'soft-light';
      dCtx.globalAlpha = 0.38;
      dCtx.drawImage(elements.bgCanvas, 0, 0);
    }
    dCtx.restore();
  }

  // Pointer & Smooth Drawing Engine
  function getCanvasCoords(e) {
    const rect = elements.displayCanvas.getBoundingClientRect();
    const scaleX = state.imageWidth / rect.width;
    const scaleY = state.imageHeight / rect.height;
    return {
      x: (e.clientX - rect.left) * scaleX,
      y: (e.clientY - rect.top) * scaleY
    };
  }

  function onPointerDown(e) {
    if (!state.currentImage) return;

    // Pan Tool or Middle Click or Spacebar
    if (state.activeTool === 'pan' || e.button === 1 || e.spaceKey) {
      state.isPanning = true;
      state.panStartX = e.clientX - state.panX;
      state.panStartY = e.clientY - state.panY;
      elements.viewport.style.cursor = 'grabbing';
      return;
    }

    if (e.button !== 0) return; // Only primary button

    const pt = getCanvasCoords(e);

    // Smart Wall Corners Fill: Click 3 or 4 architectural wall corners
    if (state.activeTool === 'fill') {
      elements.displayCanvas.setPointerCapture(e.pointerId);

      // 1. If clicking on an existing pin: start dragging it!
      if (state.hoveredPinIndex !== -1) {
        state.draggingPinIndex = state.hoveredPinIndex;
        elements.viewport.style.cursor = 'grabbing';
        return;
      }

      // 2. If clicking near start pin (pin 0) and we already have 3+ corners: finish & paint!
      if (state.fillAreaPoints.length >= 3) {
        const start = state.fillAreaPoints[0];
        const distToStart = Math.hypot(pt.x - start.x, pt.y - start.y);
        if (distToStart < 26 / state.zoom) {
          commitAreaFill();
          return;
        }
      }

      // 3. Add new corner pin
      state.fillAreaPoints.push(pt);
      updateFillUI();
      drawFillAreaPreview(pt);
      return;
    }

    // Brush or Eraser Tool
    state.isDrawing = true;
    state.strokePoints = [pt];
    elements.displayCanvas.setPointerCapture(e.pointerId);

    // Stamp initial point
    stampBrushAt(pt.x, pt.y);
    compositeDisplay();
  }

  function onPointerMove(e) {
    // Update dynamic cursor position
    if (elements.brushCursor && elements.viewport) {
      const vRect = elements.viewport.getBoundingClientRect();
      elements.brushCursor.style.left = `${e.clientX - vRect.left}px`;
      elements.brushCursor.style.top = `${e.clientY - vRect.top}px`;

      if (state.activeTool === 'brush' || state.activeTool === 'eraser') {
        elements.brushCursor.style.display = 'block';
        updateCursorSize();
      } else {
        elements.brushCursor.style.display = 'none';
      }
    }

    // Handle Pan
    if (state.isPanning) {
      state.panX = e.clientX - state.panStartX;
      state.panY = e.clientY - state.panStartY;
      applyTransform();
      return;
    }

    // Smart Wall Corners: pointer movement, hover detection, and drag handling
    if (state.activeTool === 'fill') {
      const pt = getCanvasCoords(e);

      // While dragging an existing corner pin:
      if (state.draggingPinIndex !== -1 && state.fillAreaPoints[state.draggingPinIndex]) {
        state.fillAreaPoints[state.draggingPinIndex] = pt;
        drawFillAreaPreview(null);
        return;
      }

      // Check if hovering over any existing pin to allow dragging:
      let foundHover = -1;
      const hitRadius = 18 / state.zoom;
      for (let i = 0; i < state.fillAreaPoints.length; i++) {
        const p = state.fillAreaPoints[i];
        if (Math.hypot(pt.x - p.x, pt.y - p.y) <= hitRadius) {
          foundHover = i;
          break;
        }
      }
      state.hoveredPinIndex = foundHover;
      elements.viewport.style.cursor = foundHover !== -1 ? 'grab' : 'crosshair';

      // Redraw preview showing rubber-band connection to mouse
      if (state.fillAreaPoints.length > 0) {
        drawFillAreaPreview(pt);
      }
      return;
    }

    if (!state.isDrawing) return;

    const pt = getCanvasCoords(e);
    state.strokePoints.push(pt);

    // Smooth Bézier curve interpolation
    renderSmoothStrokeSegment();
    compositeDisplay();
  }

  function onPointerUp(e) {
    if (state.isPanning) {
      state.isPanning = false;
      elements.viewport.style.cursor = state.activeTool === 'pan' ? 'grab' : 'crosshair';
    }

    // Smart Wall Corners: finish dragging pin
    if (state.activeTool === 'fill') {
      if (state.draggingPinIndex !== -1) {
        state.draggingPinIndex = -1;
        elements.viewport.style.cursor = 'crosshair';
        drawFillAreaPreview(getCanvasCoords(e));
      }
      return;
    }

    if (state.isDrawing) {
      state.isDrawing = false;
      // Finish stroke curve
      if (state.strokePoints.length > 2) {
        const last = state.strokePoints[state.strokePoints.length - 1];
        stampBrushAt(last.x, last.y);
      }
      state.strokePoints = [];
      compositeDisplay();
      pushHistory();
    }
  }

  // Bézier Midpoint Smoothing & Continuous Stamping
  function renderSmoothStrokeSegment() {
    const pts = state.strokePoints;
    if (pts.length < 3) {
      if (pts.length === 2) {
        interpolateLine(pts[0], pts[1]);
      }
      return;
    }

    // Get last 3 points
    const i = pts.length - 1;
    const p0 = pts[i - 2];
    const p1 = pts[i - 1];
    const p2 = pts[i];

    // Midpoints
    const mid1 = { x: (p0.x + p1.x) / 2, y: (p0.y + p1.y) / 2 };
    const mid2 = { x: (p1.x + p2.x) / 2, y: (p1.y + p2.y) / 2 };

    // Interpolate quadratic curve from mid1 to mid2 with control point p1
    interpolateQuadraticCurve(mid1, p1, mid2);
  }

  function interpolateQuadraticCurve(start, ctrl, end) {
    const dist = Math.hypot(ctrl.x - start.x, ctrl.y - start.y) + Math.hypot(end.x - ctrl.x, end.y - ctrl.y);
    const radius = state.brushSize / 2;
    // Step spacing: dense stamping ensures completely seamless, gap-free stroke
    const stepSpacing = Math.max(1.2, radius * 0.18);
    const steps = Math.max(2, Math.ceil(dist / stepSpacing));

    for (let s = 1; s <= steps; s++) {
      const t = s / steps;
      const invT = 1 - t;
      const x = invT * invT * start.x + 2 * invT * t * ctrl.x + t * t * end.x;
      const y = invT * invT * start.y + 2 * invT * t * ctrl.y + t * t * end.y;
      stampBrushAt(x, y);
    }
  }

  function interpolateLine(p1, p2) {
    const dist = Math.hypot(p2.x - p1.x, p2.y - p1.y);
    const radius = state.brushSize / 2;
    const stepSpacing = Math.max(1.2, radius * 0.18);
    const steps = Math.max(1, Math.ceil(dist / stepSpacing));

    for (let s = 1; s <= steps; s++) {
      const t = s / steps;
      const x = p1.x + (p2.x - p1.x) * t;
      const y = p1.y + (p2.y - p1.y) * t;
      stampBrushAt(x, y);
    }
  }

  function stampBrushAt(x, y) {
    const pCtx = elements.paintCanvas.getContext('2d');
    const radius = state.brushSize / 2;
    const stamp = state.activeTool === 'eraser' ? state.eraserStamp : state.brushStamp;
    if (!stamp) return;

    pCtx.save();
    if (state.activeTool === 'eraser') {
      pCtx.globalCompositeOperation = 'destination-out';
    } else {
      pCtx.globalCompositeOperation = 'source-over';
    }
    pCtx.drawImage(stamp, x - radius, y - radius);
    pCtx.restore();
  }

  // Smart Wall Corners: Draw live outline, numbered corner pins, and color preview
  function drawFillAreaPreview(mousePt) {
    compositeDisplay();
    const pts = state.fillAreaPoints;
    if (!pts || pts.length === 0) return;

    const dCtx = elements.displayCanvas.getContext('2d');
    const { r, g, b } = state.selectedColor;

    dCtx.save();

    // 1. Semi-transparent fill preview of the enclosed area
    dCtx.beginPath();
    dCtx.moveTo(pts[0].x, pts[0].y);
    for (let i = 1; i < pts.length; i++) {
      dCtx.lineTo(pts[i].x, pts[i].y);
    }
    if (mousePt) {
      dCtx.lineTo(mousePt.x, mousePt.y);
    }
    dCtx.closePath();

    dCtx.fillStyle = `rgba(${r}, ${g}, ${b}, 0.38)`;
    dCtx.fill();

    // 2. High-contrast dashed boundary line (white with dark glow)
    dCtx.lineWidth = Math.max(2, 2.5 / state.zoom);
    dCtx.strokeStyle = '#ffffff';
    dCtx.setLineDash([6, 5]);
    dCtx.shadowColor = 'rgba(0, 0, 0, 0.65)';
    dCtx.shadowBlur = 4;
    dCtx.stroke();

    dCtx.lineWidth = Math.max(1, 1.2 / state.zoom);
    dCtx.strokeStyle = '#0f766e';
    dCtx.setLineDash([0]);
    dCtx.shadowBlur = 0;
    dCtx.stroke();

    // 3. Numbered corner pins with drag handles
    if (pts.length > 0) {
      pts.forEach((p, idx) => {
        const isHovered = state.hoveredPinIndex === idx;
        const isStartPin = idx === 0;
        const isStartClose = mousePt && pts.length >= 3 && (Math.hypot(mousePt.x - pts[0].x, mousePt.y - pts[0].y) < 26 / state.zoom);

        dCtx.save();
        dCtx.shadowColor = 'rgba(0, 0, 0, 0.55)';
        dCtx.shadowBlur = 6;

        // Pin badge circle
        const pinRadius = (isHovered || (isStartPin && isStartClose) ? 14 : 12) / state.zoom;
        dCtx.beginPath();
        dCtx.arc(p.x, p.y, pinRadius, 0, Math.PI * 2);

        if (isStartPin && isStartClose) {
          dCtx.fillStyle = '#22c55e'; // Green when ready to close
        } else if (isHovered) {
          dCtx.fillStyle = '#14b8a6';
        } else {
          dCtx.fillStyle = '#0f766e';
        }
        dCtx.fill();

        // Pin white border
        dCtx.lineWidth = 2 / state.zoom;
        dCtx.strokeStyle = '#ffffff';
        dCtx.stroke();

        // Pin Number Label inside circle
        dCtx.fillStyle = '#ffffff';
        dCtx.font = `bold ${Math.round(11 / state.zoom)}px "Plus Jakarta Sans", sans-serif`;
        dCtx.textAlign = 'center';
        dCtx.textBaseline = 'middle';
        dCtx.fillText(String(idx + 1), p.x, p.y);

        // Tooltip hint on start point when ready to close
        if (isStartPin && isStartClose) {
          dCtx.font = `bold ${Math.round(12 / state.zoom)}px "Plus Jakarta Sans", sans-serif`;
          dCtx.fillStyle = '#22c55e';
          dCtx.fillText('Click to Paint!', p.x, p.y - 20 / state.zoom);
        }

        dCtx.restore();
      });
    }

    dCtx.restore();
  }

  // Commit the architectural corner area fill to paintCanvas
  function commitAreaFill() {
    const pts = state.fillAreaPoints;
    if (!pts || pts.length < 3) {
      cancelAreaFill();
      return;
    }

    const pCtx = elements.paintCanvas.getContext('2d');
    const { r, g, b } = state.selectedColor;

    pCtx.save();
    pCtx.beginPath();
    pCtx.moveTo(pts[0].x, pts[0].y);
    for (let i = 1; i < pts.length; i++) {
      pCtx.lineTo(pts[i].x, pts[i].y);
    }
    pCtx.closePath();

    // Natural soft feathering along wall boundaries
    pCtx.shadowColor = `rgb(${r}, ${g}, ${b})`;
    pCtx.shadowBlur = 3.5;
    pCtx.fillStyle = `rgb(${r}, ${g}, ${b})`;
    pCtx.fill();
    // Second pass for rich solid core pigment
    pCtx.shadowBlur = 0;
    pCtx.fill();
    pCtx.restore();

    state.fillAreaPoints = [];
    state.draggingPinIndex = -1;
    state.hoveredPinIndex = -1;
    updateFillUI();

    compositeDisplay();
    pushHistory();
    showToast(`Wall area painted in ${state.selectedColor.name}!`);
  }

  function cancelAreaFill() {
    state.fillAreaPoints = [];
    state.draggingPinIndex = -1;
    state.hoveredPinIndex = -1;
    updateFillUI();
    compositeDisplay();
  }

  function updateFillUI() {
    const isFillActive = state.activeTool === 'fill';
    const count = state.fillAreaPoints.length;

    if (elements.btnSmartFillCommit) {
      elements.btnSmartFillCommit.style.display = (isFillActive && count >= 3) ? 'inline-flex' : 'none';
    }

    if (elements.btnSmartFillReset) {
      elements.btnSmartFillReset.style.display = (isFillActive && count > 0) ? 'inline-flex' : 'none';
    }
  }

  // Undo / Redo History Stack
  function pushHistory() {
    const pCtx = elements.paintCanvas.getContext('2d');
    const imgData = pCtx.getImageData(0, 0, state.imageWidth, state.imageHeight);

    // Truncate future states if we drew after undoing
    if (state.historyIndex < state.history.length - 1) {
      state.history = state.history.slice(0, state.historyIndex + 1);
    }

    state.history.push(imgData);
    if (state.history.length > state.maxHistory) {
      state.history.shift();
    } else {
      state.historyIndex++;
    }

    updateUndoRedoUI();
  }

  function undo() {
    if (state.historyIndex > 0) {
      state.historyIndex--;
      const imgData = state.history[state.historyIndex];
      const pCtx = elements.paintCanvas.getContext('2d');
      pCtx.putImageData(imgData, 0, 0);
      compositeDisplay();
      updateUndoRedoUI();
      showToast('Undo');
    }
  }

  function redo() {
    if (state.historyIndex < state.history.length - 1) {
      state.historyIndex++;
      const imgData = state.history[state.historyIndex];
      const pCtx = elements.paintCanvas.getContext('2d');
      pCtx.putImageData(imgData, 0, 0);
      compositeDisplay();
      updateUndoRedoUI();
      showToast('Redo');
    }
  }

  function updateUndoRedoUI() {
    if (elements.btnUndo) {
      elements.btnUndo.disabled = state.historyIndex <= 0;
      elements.btnUndo.style.opacity = state.historyIndex <= 0 ? '0.45' : '1';
    }
    if (elements.btnRedo) {
      elements.btnRedo.disabled = state.historyIndex >= state.history.length - 1;
      elements.btnRedo.style.opacity = state.historyIndex >= state.history.length - 1 ? '0.45' : '1';
    }
  }

  // Tool Switching
  function setTool(toolName) {
    state.activeTool = toolName;
    const toolMap = {
      brush: 'toolBrush',
      eraser: 'toolEraser',
      fill: 'toolFill'
    };

    document.querySelectorAll('[data-tool]').forEach(btn => {
      const match = btn.dataset.tool === toolName || btn.id === toolMap[toolName];
      btn.classList.toggle('active', match);
    });

    if (elements.viewport) {
      if (toolName === 'pan') {
        elements.viewport.style.cursor = 'grab';
      } else if (toolName === 'fill') {
        elements.viewport.style.cursor = 'crosshair';
      } else {
        elements.viewport.style.cursor = 'crosshair';
      }
    }

    if (toolName !== 'fill') {
      cancelAreaFill();
    } else {
      updateFillUI();
    }

    if (toolName === 'eraser') {
      showToast('🧹 Soft Eraser active — drag over paint to clean up edges.');
    } else if (toolName === 'fill') {
      showToast('📐 Smart Fill: Click corners of your wall to outline and paint.');
    } else {
      showToast('🖌️ Smooth Brush active — paint freely with soft edges.');
    }
  }

  // Color Selection & Sidebar Sync
  function selectColor(colorData) {
    state.selectedColor = colorData;
    updateBrushStamps();

    if (elements.selectedSwatch) {
      elements.selectedSwatch.style.backgroundColor = colorData.hex;
    }
    if (elements.selectedName) {
      elements.selectedName.textContent = colorData.name;
    }
    if (elements.selectedCode) {
      elements.selectedCode.textContent = colorData.code;
    }
    if (elements.selectedFamily) {
      elements.selectedFamily.textContent = colorData.family;
    }
    if (elements.selectedRgb) {
      elements.selectedRgb.textContent = `RGB: ${colorData.r}, ${colorData.g}, ${colorData.b}`;
    }

    // Highlight active card in grid
    document.querySelectorAll('.color-card-item').forEach(card => {
      card.classList.toggle('active', card.dataset.code === colorData.code);
    });
  }

  // Render Color Cards Grid
  function renderColorCardsGrid() {
    if (!elements.colorCardsGrid || !window.AQUA_COLORS_DATA) return;

    const { colors } = window.AQUA_COLORS_DATA;
    const query = state.searchQuery.toLowerCase().trim();

    const filtered = colors.filter(c => {
      // Family match
      if (state.activeFamily !== 'all' && c.family !== state.activeFamily) return false;
      // Hue match
      if (state.activeHue !== 'all' && c.hueGroup !== state.activeHue) return false;
      // Search match
      if (query) {
        const matchesName = c.name.toLowerCase().includes(query);
        const matchesCode = c.code.toLowerCase().includes(query);
        return matchesName || matchesCode;
      }
      return true;
    });

    // Update count indicator
    const countEl = document.getElementById('paletteCountBadge');
    if (countEl) {
      countEl.textContent = `${filtered.length} colors`;
    }

    elements.colorCardsGrid.innerHTML = '';

    if (filtered.length === 0) {
      elements.colorCardsGrid.innerHTML = `
        <div style="grid-column: 1 / -1; padding: 24px; text-align: center; color: #94a3b8; font-size: 0.86rem;">
          No matching Aqua Paints colors found. Try clearing filters or search.
        </div>
      `;
      return;
    }

    const fragment = document.createDocumentFragment();
    filtered.forEach(c => {
      const card = document.createElement('div');
      card.className = `color-card-item ${c.code === state.selectedColor.code ? 'active' : ''}`;
      card.dataset.code = c.code;
      card.title = `${c.name} (${c.code})\n${c.family}\nRGB(${c.r}, ${c.g}, ${c.b})`;

      card.innerHTML = `
        <div class="color-card-swatch" style="background-color: ${c.hex};"></div>
        <div class="color-card-info">
          <div class="color-card-name" title="${escapeHTML(c.name)}">${escapeHTML(c.name)}</div>
          <div class="color-card-sub">
            <span class="color-card-code">${escapeHTML(c.code)}</span>
            <span class="color-card-rgb">${c.r}, ${c.g}, ${c.b}</span>
          </div>
        </div>
      `;

      card.addEventListener('click', () => {
        selectColor(c);
        showToast(`Selected: ${c.name} (${c.code})`);
      });

      fragment.appendChild(card);
    });

    elements.colorCardsGrid.appendChild(fragment);
  }

  // High-Resolution Branded Export
  function downloadVisualizerImage() {
    if (!state.currentImage) {
      showToast('No room loaded to download.');
      return;
    }

    showToast('Generating high-resolution preview...', 1800);

    const w = state.imageWidth;
    const h = state.imageHeight;
    const exportCanvas = document.createElement('canvas');
    const badgeHeight = 110;
    exportCanvas.width = w;
    exportCanvas.height = h + badgeHeight;
    const ctx = exportCanvas.getContext('2d');

    // 1. Draw the composite room visualizer
    ctx.drawImage(elements.displayCanvas, 0, 0);

    // 2. Draw modern Aqua Paints footer badge
    ctx.fillStyle = '#0f766e';
    ctx.fillRect(0, h, w, badgeHeight);

    // Subtle gradient accent line
    ctx.fillStyle = '#14b8a6';
    ctx.fillRect(0, h, w, 4);

    // Color Swatch Box
    const swatchSize = 74;
    const swatchX = 28;
    const swatchY = h + 18;

    ctx.fillStyle = state.selectedColor.hex;
    roundRect(ctx, swatchX, swatchY, swatchSize, swatchSize, 10);
    ctx.fill();
    ctx.lineWidth = 2;
    ctx.strokeStyle = 'rgba(255, 255, 255, 0.4)';
    ctx.stroke();

    // Text details
    ctx.fillStyle = '#ffffff';
    ctx.font = 'bold 24px "Plus Jakarta Sans", sans-serif';
    ctx.fillText(state.selectedColor.name, swatchX + swatchSize + 20, swatchY + 28);

    ctx.fillStyle = '#e2e8f0';
    ctx.font = '600 16px "Plus Jakarta Sans", sans-serif';
    ctx.fillText(`Code: ${state.selectedColor.code}   |   ${state.selectedColor.family}   |   RGB: ${state.selectedColor.r}, ${state.selectedColor.g}, ${state.selectedColor.b}`, swatchX + swatchSize + 20, swatchY + 54);

    // Aqua Paints Brand on Right
    ctx.textAlign = 'right';
    ctx.fillStyle = '#ffffff';
    ctx.font = '900 22px "Plus Jakarta Sans", sans-serif';
    ctx.fillText('AQUA PAINTS', w - 32, swatchY + 30);

    ctx.fillStyle = '#99f6e4';
    ctx.font = '600 13px "Plus Jakarta Sans", sans-serif';
    ctx.fillText('COLOUR VISUALIZER', w - 32, swatchY + 52);

    // Trigger Download
    const dataUrl = exportCanvas.toDataURL('image/png');
    const a = document.createElement('a');
    a.download = `AquaPaints_${state.selectedColor.code}_${state.selectedColor.name.replace(/\s+/g, '_')}_Visualizer.png`;
    a.href = dataUrl;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);

    showToast('Visualizer image downloaded successfully!');
  }

  // Setup Event Handlers
  function bindEvents() {
    // Canvas pointer events
    const display = elements.displayCanvas;
    display.addEventListener('pointerdown', onPointerDown);
    display.addEventListener('pointermove', onPointerMove);
    window.addEventListener('pointerup', onPointerUp);
    window.addEventListener('pointercancel', onPointerUp);

    // Viewport Wheel Zoom
    elements.viewport.addEventListener('wheel', e => {
      e.preventDefault();
      const zoomFactor = e.deltaY < 0 ? 1.15 : 0.88;
      const newZoom = Math.max(0.5, Math.min(4.5, state.zoom * zoomFactor));
      state.zoom = newZoom;
      applyTransform();
    }, { passive: false });

    // Keyboard Shortcuts (Ctrl+Z, Ctrl+Y, Space)
    window.addEventListener('keydown', e => {
      if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'z') {
        e.preventDefault();
        if (e.shiftKey) {
          redo();
        } else {
          undo();
        }
      } else if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'y') {
        e.preventDefault();
        redo();
      } else if (e.code === 'Space' && !e.repeat && document.activeElement.tagName !== 'INPUT') {
        e.preventDefault();
        e.spaceKey = true;
        elements.viewport.style.cursor = 'grab';
      } else if (e.key === 'Escape' && state.activeTool === 'fill') {
        cancelAreaFill();
        showToast('Area selection reset');
      } else if (e.key === 'Enter' && state.activeTool === 'fill') {
        if (state.fillAreaPoints && state.fillAreaPoints.length >= 3) {
          commitAreaFill();
        }
      }
    });

    // Double-click on display canvas to close & fill
    elements.displayCanvas.addEventListener('dblclick', e => {
      if (state.activeTool === 'fill' && state.fillAreaPoints && state.fillAreaPoints.length >= 3) {
        e.preventDefault();
        commitAreaFill();
      }
    });

    // Smart Fill Guidance Bar Button Listeners
    if (elements.btnSmartFillCommit) {
      elements.btnSmartFillCommit.addEventListener('click', (e) => {
        e.preventDefault();
        commitAreaFill();
      });
    }

    if (elements.btnSmartFillReset) {
      elements.btnSmartFillReset.addEventListener('click', (e) => {
        e.preventDefault();
        cancelAreaFill();
        showToast('Corners cleared');
      });
    }

    window.addEventListener('keyup', e => {
      if (e.code === 'Space') {
        elements.viewport.style.cursor = state.activeTool === 'pan' ? 'grab' : 'crosshair';
      }
    });

    // Tool Buttons (bind by selector and explicit IDs)
    const toolBtns = [
      { id: 'toolBrush', tool: 'brush' },
      { id: 'toolEraser', tool: 'eraser' },
      { id: 'toolFill', tool: 'fill' }
    ];

    toolBtns.forEach(({ id, tool }) => {
      const btn = document.getElementById(id);
      if (btn) {
        btn.addEventListener('click', (e) => {
          e.preventDefault();
          setTool(tool);
        });
      }
    });

    document.querySelectorAll('[data-tool]').forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        if (btn.dataset.tool) {
          setTool(btn.dataset.tool);
        }
      });
    });

    // Brush Slider
    if (elements.brushSizeSlider) {
      elements.brushSizeSlider.addEventListener('input', e => {
        state.brushSize = parseInt(e.target.value, 10);
        if (elements.brushSizeVal) elements.brushSizeVal.textContent = `${state.brushSize}px`;
        updateBrushStamps();
      });
    }

    // Undo / Redo / Clear
    if (elements.btnUndo) elements.btnUndo.addEventListener('click', undo);
    if (elements.btnRedo) elements.btnRedo.addEventListener('click', redo);
    if (elements.btnClear) {
      elements.btnClear.addEventListener('click', () => {
        if (confirm('Clear all paint strokes on this photo?')) {
          clearPaintLayer(true);
        }
      });
    }

    // Change Photo
    if (elements.btnChangePhoto) {
      elements.btnChangePhoto.addEventListener('click', () => {
        if (elements.uploadModal) elements.uploadModal.classList.remove('hidden');
      });
    }


    // Zoom Buttons
    if (elements.btnZoomIn) {
      elements.btnZoomIn.addEventListener('click', () => {
        state.zoom = Math.min(4.5, state.zoom * 1.25);
        applyTransform();
      });
    }
    if (elements.btnZoomOut) {
      elements.btnZoomOut.addEventListener('click', () => {
        state.zoom = Math.max(0.5, state.zoom * 0.8);
        applyTransform();
      });
    }
    if (elements.btnZoomReset) {
      elements.btnZoomReset.addEventListener('click', () => {
        state.zoom = 1;
        state.panX = 0;
        state.panY = 0;
        applyTransform();
      });
    }

    // Download Button
    if (elements.btnDownload) {
      elements.btnDownload.addEventListener('click', downloadVisualizerImage);
    }

    // Texture Intensity Slider
    if (elements.textureSlider) {
      elements.textureSlider.addEventListener('input', e => {
        state.textureIntensity = parseFloat(e.target.value);
        if (elements.textureVal) {
          elements.textureVal.textContent = `${Math.round(state.textureIntensity * 100)}%`;
        }
        compositeDisplay();
      });
    }

    // File Upload Handlers
    if (elements.btnBrowse && elements.fileInput) {
      elements.btnBrowse.addEventListener('click', () => elements.fileInput.click());
    }
    if (elements.btnCamera && elements.cameraInput) {
      elements.btnCamera.addEventListener('click', () => elements.cameraInput.click());
    }

    const handleFile = file => {
      if (!file || !file.type.startsWith('image/')) {
        showToast('Please select a valid image file (JPEG, PNG, WEBP).');
        return;
      }
      const reader = new FileReader();
      reader.onload = e => loadRoomImage(e.target.result);
      reader.readAsDataURL(file);
    };

    if (elements.fileInput) {
      elements.fileInput.addEventListener('change', e => {
        if (e.target.files && e.target.files[0]) handleFile(e.target.files[0]);
      });
    }

    if (elements.cameraInput) {
      elements.cameraInput.addEventListener('change', e => {
        if (e.target.files && e.target.files[0]) handleFile(e.target.files[0]);
      });
    }

    // Drag and Drop
    if (elements.dropzoneBox) {
      elements.dropzoneBox.addEventListener('dragover', e => {
        e.preventDefault();
        elements.dropzoneBox.classList.add('drag-over');
      });
      elements.dropzoneBox.addEventListener('dragleave', () => {
        elements.dropzoneBox.classList.remove('drag-over');
      });
      elements.dropzoneBox.addEventListener('drop', e => {
        e.preventDefault();
        elements.dropzoneBox.classList.remove('drag-over');
        if (e.dataTransfer.files && e.dataTransfer.files[0]) {
          handleFile(e.dataTransfer.files[0]);
        }
      });
    }

    // Preset Room Buttons
    elements.presetBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        const src = btn.dataset.src;
        if (src) loadRoomImage(src);
      });
    });

    // Palette Search
    if (elements.searchInput) {
      elements.searchInput.addEventListener('input', e => {
        state.searchQuery = e.target.value;
        renderColorCardsGrid();
      });
    }

    // Family Filter Pills
    elements.familyPills.forEach(pill => {
      pill.addEventListener('click', () => {
        elements.familyPills.forEach(p => p.classList.remove('active'));
        pill.classList.add('active');
        state.activeFamily = pill.dataset.family;
        renderColorCardsGrid();
      });
    });

    // Hue Filter Pills
    elements.huePills.forEach(pill => {
      pill.addEventListener('click', () => {
        elements.huePills.forEach(p => p.classList.remove('active'));
        pill.classList.add('active');
        state.activeHue = pill.dataset.hue;
        renderColorCardsGrid();
      });
    });



    // How to Use Guide Modal
    const btnOpenGuide = document.getElementById('btnOpenGuide');
    const btnCloseGuide = document.getElementById('btnCloseGuide');
    const btnGotItGuide = document.getElementById('btnGotItGuide');
    const guideModal = document.getElementById('guideModal');

    if (btnOpenGuide && guideModal) {
      btnOpenGuide.addEventListener('click', () => guideModal.classList.add('show'));
    }
    if (btnCloseGuide && guideModal) {
      btnCloseGuide.addEventListener('click', () => guideModal.classList.remove('show'));
    }
    if (btnGotItGuide && guideModal) {
      btnGotItGuide.addEventListener('click', () => guideModal.classList.remove('show'));
    }
  }

  // Utilities
  function roundRect(ctx, x, y, width, height, radius) {
    ctx.beginPath();
    ctx.moveTo(x + radius, y);
    ctx.lineTo(x + width - radius, y);
    ctx.quadraticCurveTo(x + width, y, x + width, y + radius);
    ctx.lineTo(x + width, y + height - radius);
    ctx.quadraticCurveTo(x + width, y + height, x + width - radius, y + height);
    ctx.lineTo(x + radius, y + height);
    ctx.quadraticCurveTo(x, y + height, x, y + height - radius);
    ctx.lineTo(x, y + radius);
    ctx.quadraticCurveTo(x, y, x + radius, y);
    ctx.closePath();
  }

  function rgbToHex(r, g, b) {
    return '#' + [r, g, b].map(x => {
      const hex = x.toString(16);
      return hex.length === 1 ? '0' + hex : hex;
    }).join('');
  }

  function hexToRgb(hex) {
    const result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? {
      r: parseInt(result[1], 16),
      g: parseInt(result[2], 16),
      b: parseInt(result[3], 16)
    } : null;
  }

  function escapeHTML(str) {
    return str.replace(/[&<>'"]/g, tag => ({
      '&': '&amp;',
      '<': '&lt;',
      '>': '&gt;',
      "'": '&#39;',
      '"': '&quot;'
    }[tag] || tag));
  }

  // Initialize
  function boot() {
    initDOM();
    updateBrushStamps();
    bindEvents();
    renderColorCardsGrid();

    // Default room image: Living Room 1
    loadRoomImage('assets/rooms/living-room.jpg');
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }

})();
