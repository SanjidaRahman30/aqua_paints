document.addEventListener("DOMContentLoaded", function () {
    const visualizerType = document.body?.dataset?.visualizerType || "visualizer";
    const roomSelect = document.getElementById("roomSelect");
    const roomImage = document.getElementById("roomImage");
    const paintLayer = document.getElementById("paintLayer");
    const colorCards = document.querySelectorAll(".color-card");

    const selectedColorSwatch = document.getElementById("selectedColorSwatch");
    const selectedColorName = document.getElementById("selectedColorName");
    const selectedColorCode = document.getElementById("selectedColorCode");
    const selectedColorFamily = document.getElementById("selectedColorFamily");

    const familyTabs = document.querySelectorAll(".family-tab");
    const searchInput = document.getElementById("searchInput");
    const saveFavoriteBtn = document.getElementById("saveFavoriteBtn");
    const downloadPreviewBtn = document.getElementById("downloadPreviewBtn");

    let selectedColorId = null;
    let selectedRoomId = roomSelect ? roomSelect.value : null;
    let selectedColorData = null;
    let activeFamily = "all";

    function rgbToString(r, g, b) {
        return `rgb(${r}, ${g}, ${b})`;
    }

    function getBrightness(r, g, b) {
        return (0.299 * r) + (0.587 * g) + (0.114 * b);
    }

    function getBlendOpacity(r, g, b) {
        const brightness = getBrightness(r, g, b);

        if (brightness >= 220) return 0.68;
        if (brightness >= 190) return 0.74;
        if (brightness >= 160) return 0.80;
        if (brightness >= 130) return 0.86;
        if (brightness >= 100) return 0.90;
        return 0.94;
    }

    function getSelectedRoomData() {
        if (!roomSelect) return null;

        const selectedOption = roomSelect.options[roomSelect.selectedIndex];
        if (!selectedOption) return null;

        return {
            roomId: selectedOption.value,
            roomPath: selectedOption.getAttribute("data-room"),
            maskPath: selectedOption.getAttribute("data-mask"),
            roomName: selectedOption.textContent.trim()
        };
    }

    function applyRoomMask() {
        if (!roomSelect || !paintLayer) return;

        const roomData = getSelectedRoomData();
        if (!roomData) return;

        if (roomImage && roomImage.tagName === "IMG" && roomData.roomPath) {
            roomImage.src = roomData.roomPath;
        }

        if (roomData.maskPath) {
            paintLayer.style.maskImage = `url('${roomData.maskPath}')`;
            paintLayer.style.webkitMaskImage = `url('${roomData.maskPath}')`;
            paintLayer.style.maskSize = "cover";
            paintLayer.style.webkitMaskSize = "cover";
            paintLayer.style.maskPosition = "center";
            paintLayer.style.webkitMaskPosition = "center";
            paintLayer.style.maskRepeat = "no-repeat";
            paintLayer.style.webkitMaskRepeat = "no-repeat";
        } else {
            paintLayer.style.maskImage = "";
            paintLayer.style.webkitMaskImage = "";
        }

        // Keep wall color active when switching rooms
        if (selectedColorData) {
            applyPaintAppearance(selectedColorData.r, selectedColorData.g, selectedColorData.b);
        }

        selectedRoomId = roomData.roomId;
    }

    function clearSelectedCard() {
        colorCards.forEach(card => card.classList.remove("active"));
    }

    function applyPaintAppearance(r, g, b) {
        if (!paintLayer) return;

        const rgbColor = rgbToString(r, g, b);
        const opacity = getBlendOpacity(parseInt(r, 10), parseInt(g, 10), parseInt(b, 10));

        paintLayer.style.background = rgbColor;
        paintLayer.style.opacity = opacity;
    }

    function selectColor(card) {
        if (!card) return;

        const id = card.dataset.id;
        const name = card.dataset.name;
        const code = card.dataset.code;
        const familyName = card.dataset.familyName;
        const r = card.dataset.r;
        const g = card.dataset.g;
        const b = card.dataset.b;

        const rgbColor = rgbToString(r, g, b);
        const opacity = getBlendOpacity(parseInt(r, 10), parseInt(g, 10), parseInt(b, 10));

        selectedColorId = id;
        selectedColorData = {
            id: id,
            name: name,
            code: code,
            familyName: familyName,
            r: parseInt(r, 10),
            g: parseInt(g, 10),
            b: parseInt(b, 10),
            rgbColor: rgbColor,
            opacity: opacity
        };

        applyPaintAppearance(r, g, b);

        if (selectedColorSwatch) {
            selectedColorSwatch.style.background = rgbColor;
        }

        if (selectedColorName) {
            selectedColorName.textContent = name;
        }

        if (selectedColorCode) {
            selectedColorCode.textContent = code;
        }

        if (selectedColorFamily) {
            selectedColorFamily.textContent = `Family: ${familyName}`;
        }

        clearSelectedCard();
        card.classList.add("active");
    }

    function filterColors() {
        const search = searchInput ? searchInput.value.toLowerCase().trim() : "";

        colorCards.forEach(card => {
            const family = card.dataset.family || "";
            const name = (card.dataset.name || "").toLowerCase();
            const code = (card.dataset.code || "").toLowerCase();
            const familyName = (card.dataset.familyName || "").toLowerCase();
            const r = card.dataset.r || "";
            const g = card.dataset.g || "";
            const b = card.dataset.b || "";
            const rgbText = `rgb(${r}, ${g}, ${b})`.toLowerCase();

            const familyMatch = activeFamily === "all" || family === activeFamily;
            const searchMatch =
                name.includes(search) ||
                code.includes(search) ||
                familyName.includes(search) ||
                rgbText.includes(search);

            card.style.display = familyMatch && searchMatch ? "flex" : "none";
        });
    }

    function loadImage(src) {
        return new Promise((resolve, reject) => {
            if (!src) {
                reject(new Error("Image source missing"));
                return;
            }

            const img = new Image();
            img.crossOrigin = "anonymous";
            img.onload = () => resolve(img);
            img.onerror = () => reject(new Error("Failed to load image: " + src));
            img.src = src;
        });
    }

    function drawRoundedRect(ctx, x, y, width, height, radius) {
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

    function wrapText(ctx, text, x, y, maxWidth, lineHeight) {
        const words = String(text).split(/\s+/);
        let line = "";
        const lines = [];

        for (let n = 0; n < words.length; n += 1) {
            const testLine = line ? `${line} ${words[n]}` : words[n];
            const metrics = ctx.measureText(testLine);

            if (metrics.width > maxWidth && line) {
                lines.push(line);
                line = words[n];
            } else if (metrics.width > maxWidth && !line) {
                let chunk = "";
                for (const char of words[n]) {
                    const testChunk = chunk + char;
                    if (ctx.measureText(testChunk).width > maxWidth && chunk) {
                        lines.push(chunk);
                        chunk = char;
                    } else {
                        chunk = testChunk;
                    }
                }
                line = chunk;
            } else {
                line = testLine;
            }
        }

        if (line) {
            lines.push(line);
        }

        lines.forEach((item, index) => {
            ctx.fillText(item, x, y + (index * lineHeight));
        });

        return y + (lines.length * lineHeight);
    }

    async function downloadCompositedPreview() {
        if (!selectedColorData) {
            alert("Please select a colour first.");
            return;
        }

        const roomData = getSelectedRoomData();
        if (!roomData || !roomData.roomPath || !roomData.maskPath) {
            alert("Room image or mask not found.");
            return;
        }

        try {
            const roomImgObj = await loadImage(roomData.roomPath);
            const maskImgObj = await loadImage(roomData.maskPath);

            const exportWidth = roomImgObj.naturalWidth;
            const exportHeight = roomImgObj.naturalHeight;
            const infoHeight = 215;
            const padding = 28;

            const canvas = document.createElement("canvas");
            canvas.width = exportWidth;
            canvas.height = exportHeight + infoHeight;

            const ctx = canvas.getContext("2d");

            ctx.fillStyle = "#f3f3f3";
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            // Base room image
            ctx.drawImage(roomImgObj, 0, 0, exportWidth, exportHeight);

            // Build masked overlay
            const overlayCanvas = document.createElement("canvas");
            overlayCanvas.width = exportWidth;
            overlayCanvas.height = exportHeight;
            const overlayCtx = overlayCanvas.getContext("2d");

            overlayCtx.clearRect(0, 0, exportWidth, exportHeight);
            overlayCtx.fillStyle = `rgb(${selectedColorData.r}, ${selectedColorData.g}, ${selectedColorData.b})`;
            overlayCtx.fillRect(0, 0, exportWidth, exportHeight);

            overlayCtx.globalCompositeOperation = "destination-in";
            overlayCtx.drawImage(maskImgObj, 0, 0, exportWidth, exportHeight);

            // Blend overlay with room for realistic result
            ctx.save();
            ctx.globalCompositeOperation = "multiply";
            ctx.globalAlpha = selectedColorData.opacity || 0.82;
            ctx.drawImage(overlayCanvas, 0, 0);
            ctx.restore();

            // Info panel
            const panelY = exportHeight + 20;
            const panelX = 20;
            const panelWidth = canvas.width - 40;
            const panelHeight = infoHeight - 40;

            ctx.save();
            drawRoundedRect(ctx, panelX, panelY, panelWidth, panelHeight, 24);
            ctx.fillStyle = "#e9e9e9";
            ctx.fill();
            ctx.restore();

            // Color swatch
            const swatchSize = 96;
            const swatchX = panelX + padding;
            const swatchY = panelY + 24;

            ctx.save();
            drawRoundedRect(ctx, swatchX, swatchY, swatchSize, swatchSize, 18);
            ctx.fillStyle = `rgb(${selectedColorData.r}, ${selectedColorData.g}, ${selectedColorData.b})`;
            ctx.fill();
            ctx.lineWidth = 2;
            ctx.strokeStyle = "#cfcfcf";
            ctx.stroke();
            ctx.restore();

            // Text
            const textX = swatchX + swatchSize + 35;
            const textWidth = panelWidth - (swatchSize + 35 + padding * 2);
            let textY = swatchY + 18;

            ctx.fillStyle = "#111111";
            ctx.font = "bold 28px Arial";
            textY = wrapText(ctx, selectedColorData.name, textX, textY, textWidth, 30) + 6;

            ctx.fillStyle = "#333333";
            ctx.font = "22px Arial";
            ctx.fillText(selectedColorData.code, textX, textY);

            textY += 34;
            ctx.font = "18px Arial";
            textY = wrapText(ctx, `Family: ${selectedColorData.familyName}`, textX, textY, textWidth, 22) + 8;

            ctx.fillStyle = "#111111";
            ctx.font = "18px Arial";
            ctx.fillText("Aqua Paints", textX, textY);

            // Download
            const link = document.createElement("a");
            const safeName = selectedColorData.name.replace(/[^a-z0-9]/gi, "_").toLowerCase();
            const safeCode = selectedColorData.code.replace(/[^a-z0-9]/gi, "_").toLowerCase();

            link.download = `aqua_paints_${visualizerType}_${safeName}_${safeCode}_preview.png`;
            link.href = canvas.toDataURL("image/png");
            link.click();

        } catch (error) {
            console.error(error);
            alert("Could not generate full preview image. Check room image and mask image paths.");
        }
    }

    if (roomSelect) {
        applyRoomMask();
        roomSelect.addEventListener("change", applyRoomMask);
    }

    colorCards.forEach(card => {
        card.addEventListener("click", function () {
            selectColor(this);
        });
    });

    familyTabs.forEach(tab => {
        tab.addEventListener("click", function () {
            familyTabs.forEach(t => t.classList.remove("active"));
            this.classList.add("active");
            activeFamily = this.dataset.family;
            filterColors();
        });
    });

    if (searchInput) {
        searchInput.addEventListener("input", filterColors);
    }

    if (saveFavoriteBtn) {
        saveFavoriteBtn.addEventListener("click", function () {
            if (!selectedColorId || !selectedRoomId) {
                alert("Please select a room and colour first.");
                return;
            }

            fetch("/api/save_favorite.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: `color_id=${encodeURIComponent(selectedColorId)}&room_id=${encodeURIComponent(selectedRoomId)}`
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
            })
            .catch(error => {
                console.error("Error:", error);
                alert("Something went wrong while saving favourite.");
            });
        });
    }

    if (downloadPreviewBtn) {
        downloadPreviewBtn.addEventListener("click", function () {
            downloadCompositedPreview();
        });
    }

    // Quick trending shade buttons
    const quickPills = document.querySelectorAll(".quick-shade-pill");
    quickPills.forEach(pill => {
        pill.addEventListener("click", function () {
            const targetCode = this.getAttribute("data-code");
            const targetCard = document.querySelector(`.color-card[data-code="${targetCode}"]`);
            if (targetCard) {
                // If the target family is filtered out, reset family to 'all'
                if (targetCard.style.display === "none") {
                    const allTab = document.querySelector('.family-tab[data-family="all"]');
                    if (allTab) allTab.click();
                }
                selectColor(targetCard);
                targetCard.scrollIntoView({ behavior: "smooth", block: "nearest" });
            }
        });
    });

    // Select an attractive signature shade on first load so the visualizer is immediately alive
    // Interior: AS55 (Sunlight Blue) / AS50 (Satin Blue)
    // Exterior: AD31 (Terracotta) / AD27 (Tangarine)
    let initialColorCard = null;
    const isInterior = visualizerType === "interior" || window.location.pathname.includes("interior");
    const isExterior = visualizerType === "exterior" || window.location.pathname.includes("exterior");

    if (isInterior) {
        initialColorCard = document.querySelector('.color-card[data-code="AS55"]') ||
                           document.querySelector('.color-card[data-code="AS50"]') ||
                           document.querySelector('.color-card[data-code="AS18"]');
    } else if (isExterior) {
        initialColorCard = document.querySelector('.color-card[data-code="AD31"]') ||
                           document.querySelector('.color-card[data-code="AD27"]') ||
                           document.querySelector('.color-card[data-code="AD09"]');
    }

    if (!initialColorCard) {
        initialColorCard = document.querySelector(".color-card");
    }

    if (initialColorCard) {
        selectColor(initialColorCard);
    }
});

if ("serviceWorker" in navigator) {
    window.addEventListener("load", function () {
        navigator.serviceWorker.register("/sw.js").catch(function (error) {
            console.warn("Service worker registration failed:", error);
        });
    });
}
