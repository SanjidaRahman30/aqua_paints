<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interior Visualizer Studio - Aqua Paints</title>
    <meta name="theme-color" content="#0f766e">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Aqua Visualizer">
    <link rel="manifest" href="manifest.webmanifest">
    <link rel="icon" href="assets/icons/pwa-icon-192.png" sizes="192x192" type="image/png">
    <link rel="apple-touch-icon" href="assets/icons/pwa-icon-192.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,600&family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css?v=20261027">
</head>
<body class="interior-visualizer-page" data-visualizer-type="interior">

<!-- Top Announcement Ticker -->
<div class="top-brand-ticker">
    <span><span class="ticker-tag">INTERIOR STUDIO</span> <strong>দেশের রঙে রাঙাই দেশ</strong> &bull; Explore 290+ Authentic Indoor Paint Shades</span>
    <a href="custom-painter.html">Want to paint on your room photo? Try Custom Painter &rarr;</a>
</div>

<!-- Main Header with Authentic Aqua Paints Logo -->
<header class="site-header">
    <div class="container">
        <a class="site-brand" href="index.html" title="Aqua Colour Visualizer Home">
            <div class="brand-logo-badge">
                <div class="brand-letters-row">
                    <span class="brand-letter-a1">a</span>
                    <span class="brand-letter-q">q</span>
                    <span class="brand-letter-u">u</span>
                    <span class="brand-letter-a2">a</span>
                </div>
                <div class="brand-word-paints">PAINTS</div>
            </div>
            <div class="brand-title-group">
                <div class="brand-title-text">
                    AQUA VISUALIZER
                    <span class="brand-tag-studio">STUDIO</span>
                </div>
                <div class="brand-slogan-bengali">দেশের রঙে রাঙাই দেশ</div>
            </div>
        </a>

        <label for="siteMenuToggle" class="site-menu-button" aria-label="Open menu" role="button" tabindex="0">
            <span></span>
            <span></span>
            <span></span>
        </label>
        <input type="checkbox" id="siteMenuToggle" class="site-menu-toggle" aria-hidden="true">
        <label for="siteMenuToggle" class="site-menu-backdrop" aria-hidden="true"></label>

        <nav class="site-nav-drawer">
            <a href="index.html">Home</a>
            <a href="custom-painter.html" class="nav-upload-paint">
                🎨 Upload & Paint <span class="badge-pulse">NEW</span>
            </a>
            <a href="visualizer.html">Visualizer Hub</a>
            <a href="interior.html" class="active">Interior Studio</a>
            <a href="exterior.html">Exterior Studio</a>
        </nav>
    </div>
</header>

<div class="container visualizer-page">
    <div class="visualizer-left">
        <div class="page-kicker">
            Interior Collection &bull; Living & Bed Rooms
        </div>
        <h2>বাস্তব রুমের মতো দৃশ্যে ইন্টেরিয়র রঙ কেমন দেখাবে তা দেখুন</h2>
        <p class="section-copy">
            নিচের যেকোনো রুম নির্বাচন করুন এবং ডানপাশের ক্যাটালগ থেকে একুয়া পেইন্টসের শেড ক্লিক করে দেয়ালে রিয়েল-টাইম প্রিভিউ দেখুন।
        </p>

        <!-- Visual Room Carousel Thumbnails Strip (Asian Paints Feature) -->
        <label for="roomSelect" style="font-weight: 700; color: #475569; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px; display: block;">Select Room Space:</label>
        <div class="room-selector-strip" id="roomSelectorStrip">
            <button type="button" class="room-thumb-btn active" data-val="1">
                <img src="assets/rooms/living-room.jpg" alt="Living Room 1">
                <span>Living Room 1</span>
            </button>
            <button type="button" class="room-thumb-btn" data-val="2">
                <img src="assets/rooms/bedroom.jpg" alt="Living Room 2">
                <span>Living Room 2</span>
            </button>
            <button type="button" class="room-thumb-btn" data-val="3">
                <img src="assets/rooms/Living_Room_2.png" alt="Living Room 3">
                <span>Living Room 3</span>
            </button>
            <button type="button" class="room-thumb-btn" data-val="5">
                <img src="assets/rooms/Kids_Room.png" alt="Kids Room">
                <span>Kids Room</span>
            </button>
        </div>

        <!-- Accessible Room Select Dropdown (kept fully functional for app.js) -->
        <select id="roomSelect" style="display: none;">
            <option value="1" data-room="assets/rooms/living-room.jpg" data-mask="assets/rooms/living-room-mask.png">Living Room 1</option>
            <option value="2" data-room="assets/rooms/bedroom.jpg" data-mask="assets/rooms/bedroom-mask.png">Living Room 2</option>
            <option value="3" data-room="assets/rooms/Living_Room_2.png" data-mask="assets/rooms/Living_Room_3_Mask.png">Living Room 3</option>
            <option value="5" data-room="assets/rooms/Kids_Room.png" data-mask="assets/rooms/Kids_Room_Mask.png">Kids Room</option>
        </select>

        <div id="downloadArea" class="download-area">
            <div class="preview-box" id="previewBox">
                <img id="roomImage" src="assets/rooms/living-room.jpg" class="room-image" alt="Room preview">
                
                <div id="paintLayer" class="paint-layer" style="position: absolute; inset: 0; background-color: rgb(54, 180, 204); opacity: 0.86; mix-blend-mode: multiply; mask-image: url('assets/rooms/living-room-mask.png'); -webkit-mask-image: url('assets/rooms/living-room-mask.png'); mask-size: cover; -webkit-mask-size: cover; mask-position: center; -webkit-mask-position: center; pointer-events: none;"></div>

                <div class="studio-lighting-badge">
                    <span>☀️ Natural Studio Lighting &bull; Realistic Multi-Coat</span>
                </div>
            </div>

            <!-- Active Selected Color Hero Card (Asian Paints Luxury Quality) -->
            <div class="download-info">
                <div class="download-swatch-row">
                    <div id="selectedColorSwatch" class="selected-swatch" style="background: rgb(54, 180, 204);"></div>
                    <div class="download-text-info">
                        <h3 id="selectedColorName">Sunlight Blue</h3>
                        <div class="shade-meta-chips">
                            <span id="selectedColorCode">AS55</span>
                            <span id="selectedColorFamily">Family: Interior (Muslin+Superstar)</span>
                        </div>
                        <div class="brand-guarantee-tag">
                            🛡️ Official Aqua Paints Certified Shade &bull; High Washability
                        </div>
                    </div>
                </div>

                <!-- Harmonious Combinations Bar (Asian Paints Signature Feature) -->
                <div class="color-harmony-box">
                    <div class="color-harmony-title">
                        <span>✨ Harmonious Pairings & Accent Suggestions:</span>
                    </div>
                    <div class="color-harmony-swatches">
                        <div class="harmony-swatch-chip" title="Accent Wall Pairing">
                            <span class="harmony-swatch-dot" style="background: #0f766e;"></span>
                            <span>Accent: Aqua Lagoon</span>
                        </div>
                        <div class="harmony-swatch-chip" title="Ceiling / Trim Pairing">
                            <span class="harmony-swatch-dot" style="background: #ffffff;"></span>
                            <span>Trim: Pure White</span>
                        </div>
                        <div class="harmony-swatch-chip" title="Feature Nook">
                            <span class="harmony-swatch-dot" style="background: #ea580c;"></span>
                            <span>Nook: Terracotta</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="selected-color-actions">
            <button id="downloadPreviewBtn" class="btn" type="button">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                    <polyline points="7 10 12 15 17 10"/>
                    <line x1="12" x2="12" y1="15" stroke-width="2.2"/>
                </svg>
                Download Room Preview with Recipe
            </button>
            <a href="custom-painter.html" class="btn btn-secondary" style="border-radius: var(--radius-full);">
                🎨 Paint on Your Photo
            </a>
        </div>
    </div>

    <div class="visualizer-right">
        <h2>
            <span>Interior Palette</span>
            <span class="catalog-count" id="catalogCountBadge">290 Shades</span>
        </h2>
        
        <div class="search-box-wrapper">
            <svg class="search-icon-inside" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                <circle cx="11" cy="11" r="8"/>
                <line x1="21" y1="21" x2="16.65" y2="16.65"/>
            </svg>
            <input type="text" id="searchInput" placeholder="Search Aqua shades by name, code (e.g. AS01) or RGB...">
        </div>

        <!-- 1-Click Trending Quick Shades (Asian Paints Signature) -->
        <div class="quick-shades-container">
            <div class="quick-shades-label">
                <span>🔥 Trending Quick Shades:</span>
            </div>
            <div class="quick-shades-row">
                <button type="button" class="quick-shade-pill" data-code="AS55" title="Sunlight Blue (AS55)">
                    <span class="quick-shade-dot" style="background-color: #36b4cc;"></span>
                    <span>Sunlight Blue</span>
                </button>
                <button type="button" class="quick-shade-pill" data-code="AS50" title="Satin Blue (AS50)">
                    <span class="quick-shade-dot" style="background-color: #85bcc5;"></span>
                    <span>Satin Blue</span>
                </button>
                <button type="button" class="quick-shade-pill" data-code="AS58" title="Flamingo (AS58)">
                    <span class="quick-shade-dot" style="background-color: #dfaab2;"></span>
                    <span>Flamingo</span>
                </button>
                <button type="button" class="quick-shade-pill" data-code="AS57" title="Rigel Teal (AS57)">
                    <span class="quick-shade-dot" style="background-color: #00a1bc;"></span>
                    <span>Rigel Teal</span>
                </button>
                <button type="button" class="quick-shade-pill" data-code="AS25" title="Warm Ochre (AS25)">
                    <span class="quick-shade-dot" style="background-color: #ea580c;"></span>
                    <span>Warm Ochre</span>
                </button>
                <button type="button" class="quick-shade-pill" data-code="AS01" title="Brilliant White (AS01)">
                    <span class="quick-shade-dot" style="background-color: #f0f4f0; border-color: #cbd5e1;"></span>
                    <span>White</span>
                </button>
            </div>
        </div>

        <div class="family-tabs">
            <button class="family-tab active" data-family="all" type="button">
                All Shades
            </button>
            <button class="family-tab" data-family="1" type="button">
                Muslin + Superstar
            </button>
            <button class="family-tab" data-family="2" type="button">
                National Distemper
            </button>
        </div>

        <div class="color-grid" id="colorGrid">
                                            <div class="color-card"
                     data-id="1"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Brilliant White"
                     data-code="AS01"
                     data-r="240"
                     data-g="244"
                     data-b="240">
                    <div class="color-box" style="background: rgb(240, 244, 240);"></div>
                    <div class="color-info">
                        <strong>Brilliant White</strong>
                        <span>AS01</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="2"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Off White(Light)"
                     data-code="AS02"
                     data-r="227"
                     data-g="217"
                     data-b="196">
                    <div class="color-box" style="background: rgb(227, 217, 196);"></div>
                    <div class="color-info">
                        <strong>Off White(Light)</strong>
                        <span>AS02</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="3"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Off White"
                     data-code="AS03"
                     data-r="228"
                     data-g="218"
                     data-b="189">
                    <div class="color-box" style="background: rgb(228, 218, 189);"></div>
                    <div class="color-info">
                        <strong>Off White</strong>
                        <span>AS03</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="4"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Snow White"
                     data-code="AS04"
                     data-r="219"
                     data-g="236"
                     data-b="222">
                    <div class="color-box" style="background: rgb(219, 236, 222);"></div>
                    <div class="color-info">
                        <strong>Snow White</strong>
                        <span>AS04</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="5"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Milk Wash"
                     data-code="AS05"
                     data-r="244"
                     data-g="238"
                     data-b="208">
                    <div class="color-box" style="background: rgb(244, 238, 208);"></div>
                    <div class="color-info">
                        <strong>Milk Wash</strong>
                        <span>AS05</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="6"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Cream"
                     data-code="AS06"
                     data-r="211"
                     data-g="189"
                     data-b="110">
                    <div class="color-box" style="background: rgb(211, 189, 110);"></div>
                    <div class="color-info">
                        <strong>Cream</strong>
                        <span>AS06</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="7"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Arid Plain"
                     data-code="AS07"
                     data-r="234"
                     data-g="227"
                     data-b="214">
                    <div class="color-box" style="background: rgb(234, 227, 214);"></div>
                    <div class="color-info">
                        <strong>Arid Plain</strong>
                        <span>AS07</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="8"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Apple White"
                     data-code="AS08"
                     data-r="242"
                     data-g="238"
                     data-b="209">
                    <div class="color-box" style="background: rgb(242, 238, 209);"></div>
                    <div class="color-info">
                        <strong>Apple White</strong>
                        <span>AS08</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="9"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Ivory"
                     data-code="AS09"
                     data-r="237"
                     data-g="205"
                     data-b="159">
                    <div class="color-box" style="background: rgb(237, 205, 159);"></div>
                    <div class="color-info">
                        <strong>Ivory</strong>
                        <span>AS09</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="10"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Milk White"
                     data-code="AS10"
                     data-r="228"
                     data-g="211"
                     data-b="178">
                    <div class="color-box" style="background: rgb(228, 211, 178);"></div>
                    <div class="color-info">
                        <strong>Milk White</strong>
                        <span>AS10</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="11"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Emperor"
                     data-code="AS11"
                     data-r="220"
                     data-g="214"
                     data-b="183">
                    <div class="color-box" style="background: rgb(220, 214, 183);"></div>
                    <div class="color-info">
                        <strong>Emperor</strong>
                        <span>AS11</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="12"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Honey Suckle"
                     data-code="AS12"
                     data-r="227"
                     data-g="208"
                     data-b="168">
                    <div class="color-box" style="background: rgb(227, 208, 168);"></div>
                    <div class="color-info">
                        <strong>Honey Suckle</strong>
                        <span>AS12</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="13"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Summer Ice"
                     data-code="AS13"
                     data-r="231"
                     data-g="235"
                     data-b="212">
                    <div class="color-box" style="background: rgb(231, 235, 212);"></div>
                    <div class="color-info">
                        <strong>Summer Ice</strong>
                        <span>AS13</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="14"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Aspiration"
                     data-code="AS14"
                     data-r="240"
                     data-g="230"
                     data-b="207">
                    <div class="color-box" style="background: rgb(240, 230, 207);"></div>
                    <div class="color-info">
                        <strong>Aspiration</strong>
                        <span>AS14</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="15"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Ivory Hue"
                     data-code="AS15"
                     data-r="237"
                     data-g="205"
                     data-b="159">
                    <div class="color-box" style="background: rgb(237, 205, 159);"></div>
                    <div class="color-info">
                        <strong>Ivory Hue</strong>
                        <span>AS15</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="16"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Papaya Cream"
                     data-code="AS16"
                     data-r="225"
                     data-g="233"
                     data-b="210">
                    <div class="color-box" style="background: rgb(225, 233, 210);"></div>
                    <div class="color-info">
                        <strong>Papaya Cream</strong>
                        <span>AS16</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="17"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Alomnd Torte"
                     data-code="AS17"
                     data-r="242"
                     data-g="235"
                     data-b="212">
                    <div class="color-box" style="background: rgb(242, 235, 212);"></div>
                    <div class="color-info">
                        <strong>Alomnd Torte</strong>
                        <span>AS17</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="18"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="White Asparagus"
                     data-code="AS18"
                     data-r="214"
                     data-g="223"
                     data-b="205">
                    <div class="color-box" style="background: rgb(214, 223, 205);"></div>
                    <div class="color-info">
                        <strong>White Asparagus</strong>
                        <span>AS18</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="19"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Quiet Sea"
                     data-code="AS19"
                     data-r="222"
                     data-g="233"
                     data-b="220">
                    <div class="color-box" style="background: rgb(222, 233, 220);"></div>
                    <div class="color-info">
                        <strong>Quiet Sea</strong>
                        <span>AS19</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="20"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Calm Spirit"
                     data-code="AS20"
                     data-r="225"
                     data-g="227"
                     data-b="217">
                    <div class="color-box" style="background: rgb(225, 227, 217);"></div>
                    <div class="color-info">
                        <strong>Calm Spirit</strong>
                        <span>AS20</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="21"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Evening Breeze"
                     data-code="AS21"
                     data-r="219"
                     data-g="214"
                     data-b="213">
                    <div class="color-box" style="background: rgb(219, 214, 213);"></div>
                    <div class="color-info">
                        <strong>Evening Breeze</strong>
                        <span>AS21</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="22"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Cotton Field"
                     data-code="AS22"
                     data-r="231"
                     data-g="220"
                     data-b="203">
                    <div class="color-box" style="background: rgb(231, 220, 203);"></div>
                    <div class="color-info">
                        <strong>Cotton Field</strong>
                        <span>AS22</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="23"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Vanila Cream"
                     data-code="AS23"
                     data-r="231"
                     data-g="223"
                     data-b="205">
                    <div class="color-box" style="background: rgb(231, 223, 205);"></div>
                    <div class="color-info">
                        <strong>Vanila Cream</strong>
                        <span>AS23</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="24"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Early Day"
                     data-code="AS24"
                     data-r="223"
                     data-g="223"
                     data-b="217">
                    <div class="color-box" style="background: rgb(223, 223, 217);"></div>
                    <div class="color-info">
                        <strong>Early Day</strong>
                        <span>AS24</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="25"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Glamour Yellow"
                     data-code="AS25"
                     data-r="232"
                     data-g="209"
                     data-b="160">
                    <div class="color-box" style="background: rgb(232, 209, 160);"></div>
                    <div class="color-info">
                        <strong>Glamour Yellow</strong>
                        <span>AS25</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="26"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Lemon Tart"
                     data-code="AS26"
                     data-r="243"
                     data-g="229"
                     data-b="143">
                    <div class="color-box" style="background: rgb(243, 229, 143);"></div>
                    <div class="color-info">
                        <strong>Lemon Tart</strong>
                        <span>AS26</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="27"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Lemon"
                     data-code="AS27"
                     data-r="212"
                     data-g="166"
                     data-b="64">
                    <div class="color-box" style="background: rgb(212, 166, 64);"></div>
                    <div class="color-info">
                        <strong>Lemon</strong>
                        <span>AS27</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="28"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Lemon Yellow"
                     data-code="AS28"
                     data-r="247"
                     data-g="209"
                     data-b="141">
                    <div class="color-box" style="background: rgb(247, 209, 141);"></div>
                    <div class="color-info">
                        <strong>Lemon Yellow</strong>
                        <span>AS28</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="29"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Deep Orange"
                     data-code="AS29"
                     data-r="209"
                     data-g="112"
                     data-b="88">
                    <div class="color-box" style="background: rgb(209, 112, 88);"></div>
                    <div class="color-info">
                        <strong>Deep Orange</strong>
                        <span>AS29</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="30"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Day Lily"
                     data-code="AS30"
                     data-r="233"
                     data-g="143"
                     data-b="91">
                    <div class="color-box" style="background: rgb(233, 143, 91);"></div>
                    <div class="color-info">
                        <strong>Day Lily</strong>
                        <span>AS30</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="31"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Jacobite"
                     data-code="AS31"
                     data-r="141"
                     data-g="157"
                     data-b="99">
                    <div class="color-box" style="background: rgb(141, 157, 99);"></div>
                    <div class="color-info">
                        <strong>Jacobite</strong>
                        <span>AS31</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="32"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Meghna"
                     data-code="AS32"
                     data-r="177"
                     data-g="220"
                     data-b="193">
                    <div class="color-box" style="background: rgb(177, 220, 193);"></div>
                    <div class="color-info">
                        <strong>Meghna</strong>
                        <span>AS32</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="33"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Summer Green"
                     data-code="AS33"
                     data-r="211"
                     data-g="216"
                     data-b="170">
                    <div class="color-box" style="background: rgb(211, 216, 170);"></div>
                    <div class="color-info">
                        <strong>Summer Green</strong>
                        <span>AS33</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="34"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Coral Green"
                     data-code="AS34"
                     data-r="191"
                     data-g="212"
                     data-b="178">
                    <div class="color-box" style="background: rgb(191, 212, 178);"></div>
                    <div class="color-info">
                        <strong>Coral Green</strong>
                        <span>AS34</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="35"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Crystal Green-N"
                     data-code="AS35"
                     data-r="158"
                     data-g="206"
                     data-b="183">
                    <div class="color-box" style="background: rgb(158, 206, 183);"></div>
                    <div class="color-info">
                        <strong>Crystal Green-N</strong>
                        <span>AS35</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="36"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Marsh Green"
                     data-code="AS36"
                     data-r="115"
                     data-g="149"
                     data-b="112">
                    <div class="color-box" style="background: rgb(115, 149, 112);"></div>
                    <div class="color-info">
                        <strong>Marsh Green</strong>
                        <span>AS36</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="37"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Garden Green"
                     data-code="AS37"
                     data-r="160"
                     data-g="202"
                     data-b="126">
                    <div class="color-box" style="background: rgb(160, 202, 126);"></div>
                    <div class="color-info">
                        <strong>Garden Green</strong>
                        <span>AS37</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="38"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Aqua Green"
                     data-code="AS38"
                     data-r="35"
                     data-g="162"
                     data-b="136">
                    <div class="color-box" style="background: rgb(35, 162, 136);"></div>
                    <div class="color-info">
                        <strong>Aqua Green</strong>
                        <span>AS38</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="39"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Lemon Souffle"
                     data-code="AS39"
                     data-r="198"
                     data-g="196"
                     data-b="70">
                    <div class="color-box" style="background: rgb(198, 196, 70);"></div>
                    <div class="color-info">
                        <strong>Lemon Souffle</strong>
                        <span>AS39</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="40"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Paste Rose"
                     data-code="AS40"
                     data-r="175"
                     data-g="225"
                     data-b="196">
                    <div class="color-box" style="background: rgb(175, 225, 196);"></div>
                    <div class="color-info">
                        <strong>Paste Rose</strong>
                        <span>AS40</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="41"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Seagrass Bay"
                     data-code="AS41"
                     data-r="114"
                     data-g="211"
                     data-b="187">
                    <div class="color-box" style="background: rgb(114, 211, 187);"></div>
                    <div class="color-info">
                        <strong>Seagrass Bay</strong>
                        <span>AS41</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="42"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Forest Green"
                     data-code="AS42"
                     data-r="208"
                     data-g="222"
                     data-b="177">
                    <div class="color-box" style="background: rgb(208, 222, 177);"></div>
                    <div class="color-info">
                        <strong>Forest Green</strong>
                        <span>AS42</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="43"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Morning Dew"
                     data-code="AS43"
                     data-r="190"
                     data-g="224"
                     data-b="159">
                    <div class="color-box" style="background: rgb(190, 224, 159);"></div>
                    <div class="color-info">
                        <strong>Morning Dew</strong>
                        <span>AS43</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="44"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Green Apple"
                     data-code="AS44"
                     data-r="184"
                     data-g="189"
                     data-b="87">
                    <div class="color-box" style="background: rgb(184, 189, 87);"></div>
                    <div class="color-info">
                        <strong>Green Apple</strong>
                        <span>AS44</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="45"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Joy Green"
                     data-code="AS45"
                     data-r="152"
                     data-g="182"
                     data-b="98">
                    <div class="color-box" style="background: rgb(152, 182, 98);"></div>
                    <div class="color-info">
                        <strong>Joy Green</strong>
                        <span>AS45</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="46"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Light Blue"
                     data-code="AS46"
                     data-r="110"
                     data-g="168"
                     data-b="171">
                    <div class="color-box" style="background: rgb(110, 168, 171);"></div>
                    <div class="color-info">
                        <strong>Light Blue</strong>
                        <span>AS46</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="47"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Coral Reef"
                     data-code="AS47"
                     data-r="181"
                     data-g="215"
                     data-b="202">
                    <div class="color-box" style="background: rgb(181, 215, 202);"></div>
                    <div class="color-info">
                        <strong>Coral Reef</strong>
                        <span>AS47</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="48"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="New Blue"
                     data-code="AS48"
                     data-r="152"
                     data-g="185"
                     data-b="191">
                    <div class="color-box" style="background: rgb(152, 185, 191);"></div>
                    <div class="color-info">
                        <strong>New Blue</strong>
                        <span>AS48</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="49"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Sky Blue"
                     data-code="AS49"
                     data-r="189"
                     data-g="212"
                     data-b="199">
                    <div class="color-box" style="background: rgb(189, 212, 199);"></div>
                    <div class="color-info">
                        <strong>Sky Blue</strong>
                        <span>AS49</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="50"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Satin Blue"
                     data-code="AS50"
                     data-r="133"
                     data-g="188"
                     data-b="197">
                    <div class="color-box" style="background: rgb(133, 188, 197);"></div>
                    <div class="color-info">
                        <strong>Satin Blue</strong>
                        <span>AS50</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="51"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Ocean Blue"
                     data-code="AS51"
                     data-r="176"
                     data-g="217"
                     data-b="225">
                    <div class="color-box" style="background: rgb(176, 217, 225);"></div>
                    <div class="color-info">
                        <strong>Ocean Blue</strong>
                        <span>AS51</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="52"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Ice Blue"
                     data-code="AS52"
                     data-r="165"
                     data-g="201"
                     data-b="201">
                    <div class="color-box" style="background: rgb(165, 201, 201);"></div>
                    <div class="color-info">
                        <strong>Ice Blue</strong>
                        <span>AS52</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="53"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="New Blue-E"
                     data-code="AS53"
                     data-r="113"
                     data-g="171"
                     data-b="196">
                    <div class="color-box" style="background: rgb(113, 171, 196);"></div>
                    <div class="color-info">
                        <strong>New Blue-E</strong>
                        <span>AS53</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="54"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Blue Flame"
                     data-code="AS54"
                     data-r="152"
                     data-g="180"
                     data-b="198">
                    <div class="color-box" style="background: rgb(152, 180, 198);"></div>
                    <div class="color-info">
                        <strong>Blue Flame</strong>
                        <span>AS54</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="55"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Sunlight Blue"
                     data-code="AS55"
                     data-r="54"
                     data-g="180"
                     data-b="204">
                    <div class="color-box" style="background: rgb(54, 180, 204);"></div>
                    <div class="color-info">
                        <strong>Sunlight Blue</strong>
                        <span>AS55</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="56"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Classical Blue-N"
                     data-code="AS56"
                     data-r="39"
                     data-g="168"
                     data-b="178">
                    <div class="color-box" style="background: rgb(39, 168, 178);"></div>
                    <div class="color-info">
                        <strong>Classical Blue-N</strong>
                        <span>AS56</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="57"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Rigel"
                     data-code="AS57"
                     data-r="0"
                     data-g="161"
                     data-b="188">
                    <div class="color-box" style="background: rgb(0, 161, 188);"></div>
                    <div class="color-info">
                        <strong>Rigel</strong>
                        <span>AS57</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="58"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Flamingo"
                     data-code="AS58"
                     data-r="223"
                     data-g="170"
                     data-b="178">
                    <div class="color-box" style="background: rgb(223, 170, 178);"></div>
                    <div class="color-info">
                        <strong>Flamingo</strong>
                        <span>AS58</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="59"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Pink Lily"
                     data-code="AS59"
                     data-r="230"
                     data-g="206"
                     data-b="195">
                    <div class="color-box" style="background: rgb(230, 206, 195);"></div>
                    <div class="color-info">
                        <strong>Pink Lily</strong>
                        <span>AS59</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="60"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Angel"
                     data-code="AS60"
                     data-r="237"
                     data-g="219"
                     data-b="217">
                    <div class="color-box" style="background: rgb(237, 219, 217);"></div>
                    <div class="color-info">
                        <strong>Angel</strong>
                        <span>AS60</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="61"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Memory"
                     data-code="AS61"
                     data-r="202"
                     data-g="194"
                     data-b="191">
                    <div class="color-box" style="background: rgb(202, 194, 191);"></div>
                    <div class="color-info">
                        <strong>Memory</strong>
                        <span>AS61</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="62"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Vanila"
                     data-code="AS62"
                     data-r="235"
                     data-g="231"
                     data-b="217">
                    <div class="color-box" style="background: rgb(235, 231, 217);"></div>
                    <div class="color-info">
                        <strong>Vanila</strong>
                        <span>AS62</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="63"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Chiffon"
                     data-code="AS63"
                     data-r="215"
                     data-g="207"
                     data-b="203">
                    <div class="color-box" style="background: rgb(215, 207, 203);"></div>
                    <div class="color-info">
                        <strong>Chiffon</strong>
                        <span>AS63</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="64"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Pastel Hue"
                     data-code="AS64"
                     data-r="228"
                     data-g="211"
                     data-b="190">
                    <div class="color-box" style="background: rgb(228, 211, 190);"></div>
                    <div class="color-info">
                        <strong>Pastel Hue</strong>
                        <span>AS64</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="65"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Lilac Mist"
                     data-code="AS65"
                     data-r="201"
                     data-g="191"
                     data-b="186">
                    <div class="color-box" style="background: rgb(201, 191, 186);"></div>
                    <div class="color-info">
                        <strong>Lilac Mist</strong>
                        <span>AS65</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="66"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Tile Red"
                     data-code="AS66"
                     data-r="165"
                     data-g="114"
                     data-b="106">
                    <div class="color-box" style="background: rgb(165, 114, 106);"></div>
                    <div class="color-info">
                        <strong>Tile Red</strong>
                        <span>AS66</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="67"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Rebecca"
                     data-code="AS67"
                     data-r="206"
                     data-g="169"
                     data-b="152">
                    <div class="color-box" style="background: rgb(206, 169, 152);"></div>
                    <div class="color-info">
                        <strong>Rebecca</strong>
                        <span>AS67</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="68"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Falsetto"
                     data-code="AS68"
                     data-r="204"
                     data-g="122"
                     data-b="158">
                    <div class="color-box" style="background: rgb(204, 122, 158);"></div>
                    <div class="color-info">
                        <strong>Falsetto</strong>
                        <span>AS68</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="69"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Pink Plum"
                     data-code="AS69"
                     data-r="227"
                     data-g="197"
                     data-b="190">
                    <div class="color-box" style="background: rgb(227, 197, 190);"></div>
                    <div class="color-info">
                        <strong>Pink Plum</strong>
                        <span>AS69</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="70"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Deep Pink"
                     data-code="AS70"
                     data-r="210"
                     data-g="145"
                     data-b="150">
                    <div class="color-box" style="background: rgb(210, 145, 150);"></div>
                    <div class="color-info">
                        <strong>Deep Pink</strong>
                        <span>AS70</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="71"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Coral"
                     data-code="AS71"
                     data-r="218"
                     data-g="124"
                     data-b="107">
                    <div class="color-box" style="background: rgb(218, 124, 107);"></div>
                    <div class="color-info">
                        <strong>Coral</strong>
                        <span>AS71</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="72"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Sweet Pink"
                     data-code="AS72"
                     data-r="235"
                     data-g="161"
                     data-b="177">
                    <div class="color-box" style="background: rgb(235, 161, 177);"></div>
                    <div class="color-info">
                        <strong>Sweet Pink</strong>
                        <span>AS72</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="73"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Bonofire"
                     data-code="AS73"
                     data-r="231"
                     data-g="118"
                     data-b="72">
                    <div class="color-box" style="background: rgb(231, 118, 72);"></div>
                    <div class="color-info">
                        <strong>Bonofire</strong>
                        <span>AS73</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="74"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Romance"
                     data-code="AS74"
                     data-r="215"
                     data-g="175"
                     data-b="167">
                    <div class="color-box" style="background: rgb(215, 175, 167);"></div>
                    <div class="color-info">
                        <strong>Romance</strong>
                        <span>AS74</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="75"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Signal Red"
                     data-code="AS75"
                     data-r="196"
                     data-g="30"
                     data-b="58">
                    <div class="color-box" style="background: rgb(196, 30, 58);"></div>
                    <div class="color-info">
                        <strong>Signal Red</strong>
                        <span>AS75</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="76"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Gypsy Queen"
                     data-code="AS76"
                     data-r="199"
                     data-g="196"
                     data-b="196">
                    <div class="color-box" style="background: rgb(199, 196, 196);"></div>
                    <div class="color-info">
                        <strong>Gypsy Queen</strong>
                        <span>AS76</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="77"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Alpine"
                     data-code="AS77"
                     data-r="205"
                     data-g="185"
                     data-b="190">
                    <div class="color-box" style="background: rgb(205, 185, 190);"></div>
                    <div class="color-info">
                        <strong>Alpine</strong>
                        <span>AS77</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="78"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Olympia"
                     data-code="AS78"
                     data-r="142"
                     data-g="141"
                     data-b="178">
                    <div class="color-box" style="background: rgb(142, 141, 178);"></div>
                    <div class="color-info">
                        <strong>Olympia</strong>
                        <span>AS78</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="79"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Orchid"
                     data-code="AS79"
                     data-r="168"
                     data-g="139"
                     data-b="174">
                    <div class="color-box" style="background: rgb(168, 139, 174);"></div>
                    <div class="color-info">
                        <strong>Orchid</strong>
                        <span>AS79</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="80"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Florentine"
                     data-code="AS80"
                     data-r="193"
                     data-g="151"
                     data-b="187">
                    <div class="color-box" style="background: rgb(193, 151, 187);"></div>
                    <div class="color-info">
                        <strong>Florentine</strong>
                        <span>AS80</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="81"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Dream Catcher"
                     data-code="AS81"
                     data-r="167"
                     data-g="146"
                     data-b="186">
                    <div class="color-box" style="background: rgb(167, 146, 186);"></div>
                    <div class="color-info">
                        <strong>Dream Catcher</strong>
                        <span>AS81</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="82"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="French Grey"
                     data-code="AS82"
                     data-r="178"
                     data-g="186"
                     data-b="175">
                    <div class="color-box" style="background: rgb(178, 186, 175);"></div>
                    <div class="color-info">
                        <strong>French Grey</strong>
                        <span>AS82</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="83"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Snow Goose"
                     data-code="AS83"
                     data-r="185"
                     data-g="192"
                     data-b="180">
                    <div class="color-box" style="background: rgb(185, 192, 180);"></div>
                    <div class="color-info">
                        <strong>Snow Goose</strong>
                        <span>AS83</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="84"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Dolomite"
                     data-code="AS84"
                     data-r="178"
                     data-g="186"
                     data-b="180">
                    <div class="color-box" style="background: rgb(178, 186, 180);"></div>
                    <div class="color-info">
                        <strong>Dolomite</strong>
                        <span>AS84</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="85"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Silver Lining"
                     data-code="AS85"
                     data-r="159"
                     data-g="164"
                     data-b="156">
                    <div class="color-box" style="background: rgb(159, 164, 156);"></div>
                    <div class="color-info">
                        <strong>Silver Lining</strong>
                        <span>AS85</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="86"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Smokey"
                     data-code="AS86"
                     data-r="132"
                     data-g="135"
                     data-b="132">
                    <div class="color-box" style="background: rgb(132, 135, 132);"></div>
                    <div class="color-info">
                        <strong>Smokey</strong>
                        <span>AS86</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="87"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Light Grey"
                     data-code="AS87"
                     data-r="145"
                     data-g="157"
                     data-b="150">
                    <div class="color-box" style="background: rgb(145, 157, 150);"></div>
                    <div class="color-info">
                        <strong>Light Grey</strong>
                        <span>AS87</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="88"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Steel Grey"
                     data-code="AS88"
                     data-r="156"
                     data-g="163"
                     data-b="159">
                    <div class="color-box" style="background: rgb(156, 163, 159);"></div>
                    <div class="color-info">
                        <strong>Steel Grey</strong>
                        <span>AS88</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="89"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Armour"
                     data-code="AS89"
                     data-r="167"
                     data-g="171"
                     data-b="164">
                    <div class="color-box" style="background: rgb(167, 171, 164);"></div>
                    <div class="color-info">
                        <strong>Armour</strong>
                        <span>AS89</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="90"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Dove Grey"
                     data-code="AS90"
                     data-r="202"
                     data-g="205"
                     data-b="195">
                    <div class="color-box" style="background: rgb(202, 205, 195);"></div>
                    <div class="color-info">
                        <strong>Dove Grey</strong>
                        <span>AS90</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="91"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Misty"
                     data-code="AS91"
                     data-r="188"
                     data-g="179"
                     data-b="158">
                    <div class="color-box" style="background: rgb(188, 179, 158);"></div>
                    <div class="color-info">
                        <strong>Misty</strong>
                        <span>AS91</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="92"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Wood Smoke"
                     data-code="AS92"
                     data-r="202"
                     data-g="190"
                     data-b="154">
                    <div class="color-box" style="background: rgb(202, 190, 154);"></div>
                    <div class="color-info">
                        <strong>Wood Smoke</strong>
                        <span>AS92</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="93"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Fawn"
                     data-code="AS93"
                     data-r="201"
                     data-g="196"
                     data-b="175">
                    <div class="color-box" style="background: rgb(201, 196, 175);"></div>
                    <div class="color-info">
                        <strong>Fawn</strong>
                        <span>AS93</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="94"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Whisper Lime"
                     data-code="AS94"
                     data-r="200"
                     data-g="196"
                     data-b="165">
                    <div class="color-box" style="background: rgb(200, 196, 165);"></div>
                    <div class="color-info">
                        <strong>Whisper Lime</strong>
                        <span>AS94</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="95"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Blossom"
                     data-code="AS95"
                     data-r="212"
                     data-g="192"
                     data-b="164">
                    <div class="color-box" style="background: rgb(212, 192, 164);"></div>
                    <div class="color-info">
                        <strong>Blossom</strong>
                        <span>AS95</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="96"
                     data-family="1"
                     data-family-name="Interior (Muslin+Superstar)"
                     data-name="Chamoise"
                     data-code="AS96"
                     data-r="187"
                     data-g="158"
                     data-b="126">
                    <div class="color-box" style="background: rgb(187, 158, 126);"></div>
                    <div class="color-info">
                        <strong>Chamoise</strong>
                        <span>AS96</span>
                        <small>Interior (Muslin+Superstar)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="241"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Brilliant White"
                     data-code="AN01"
                     data-r="240"
                     data-g="244"
                     data-b="240">
                    <div class="color-box" style="background: rgb(240, 244, 240);"></div>
                    <div class="color-info">
                        <strong>Brilliant White</strong>
                        <span>AN01</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="242"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Off White(Light)"
                     data-code="AN02"
                     data-r="227"
                     data-g="217"
                     data-b="196">
                    <div class="color-box" style="background: rgb(227, 217, 196);"></div>
                    <div class="color-info">
                        <strong>Off White(Light)</strong>
                        <span>AN02</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="243"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="OFF White"
                     data-code="AN03"
                     data-r="228"
                     data-g="218"
                     data-b="189">
                    <div class="color-box" style="background: rgb(228, 218, 189);"></div>
                    <div class="color-info">
                        <strong>OFF White</strong>
                        <span>AN03</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="244"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Apple White"
                     data-code="AN04"
                     data-r="241"
                     data-g="236"
                     data-b="214">
                    <div class="color-box" style="background: rgb(241, 236, 214);"></div>
                    <div class="color-info">
                        <strong>Apple White</strong>
                        <span>AN04</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="245"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Cream"
                     data-code="AN05"
                     data-r="216"
                     data-g="194"
                     data-b="151">
                    <div class="color-box" style="background: rgb(216, 194, 151);"></div>
                    <div class="color-info">
                        <strong>Cream</strong>
                        <span>AN05</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="246"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Milk White"
                     data-code="AN06"
                     data-r="231"
                     data-g="217"
                     data-b="184">
                    <div class="color-box" style="background: rgb(231, 217, 184);"></div>
                    <div class="color-info">
                        <strong>Milk White</strong>
                        <span>AN06</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="247"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Saroj"
                     data-code="AN07"
                     data-r="233"
                     data-g="208"
                     data-b="166">
                    <div class="color-box" style="background: rgb(233, 208, 166);"></div>
                    <div class="color-info">
                        <strong>Saroj</strong>
                        <span>AN07</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="248"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Shukla"
                     data-code="AN08"
                     data-r="225"
                     data-g="219"
                     data-b="190">
                    <div class="color-box" style="background: rgb(225, 219, 190);"></div>
                    <div class="color-info">
                        <strong>Shukla</strong>
                        <span>AN08</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="249"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Whisper Lime"
                     data-code="AN09"
                     data-r="200"
                     data-g="196"
                     data-b="165">
                    <div class="color-box" style="background: rgb(200, 196, 165);"></div>
                    <div class="color-info">
                        <strong>Whisper Lime</strong>
                        <span>AN09</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="250"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Blossom"
                     data-code="AN10"
                     data-r="212"
                     data-g="192"
                     data-b="164">
                    <div class="color-box" style="background: rgb(212, 192, 164);"></div>
                    <div class="color-info">
                        <strong>Blossom</strong>
                        <span>AN10</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="251"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Fawn"
                     data-code="AN11"
                     data-r="201"
                     data-g="196"
                     data-b="175">
                    <div class="color-box" style="background: rgb(201, 196, 175);"></div>
                    <div class="color-info">
                        <strong>Fawn</strong>
                        <span>AN11</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="252"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Coffee"
                     data-code="AN12"
                     data-r="190"
                     data-g="163"
                     data-b="128">
                    <div class="color-box" style="background: rgb(190, 163, 128);"></div>
                    <div class="color-info">
                        <strong>Coffee</strong>
                        <span>AN12</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="253"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Godhuli"
                     data-code="AN13"
                     data-r="208"
                     data-g="174"
                     data-b="144">
                    <div class="color-box" style="background: rgb(208, 174, 144);"></div>
                    <div class="color-info">
                        <strong>Godhuli</strong>
                        <span>AN13</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="254"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Lemon Yellow"
                     data-code="AN14"
                     data-r="241"
                     data-g="207"
                     data-b="116">
                    <div class="color-box" style="background: rgb(241, 207, 116);"></div>
                    <div class="color-info">
                        <strong>Lemon Yellow</strong>
                        <span>AN14</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="255"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Lemon Tart"
                     data-code="AN15"
                     data-r="244"
                     data-g="229"
                     data-b="141">
                    <div class="color-box" style="background: rgb(244, 229, 141);"></div>
                    <div class="color-info">
                        <strong>Lemon Tart</strong>
                        <span>AN15</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="256"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Ocean Blue"
                     data-code="AN16"
                     data-r="176"
                     data-g="217"
                     data-b="225">
                    <div class="color-box" style="background: rgb(176, 217, 225);"></div>
                    <div class="color-info">
                        <strong>Ocean Blue</strong>
                        <span>AN16</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="257"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Light Blue"
                     data-code="AN17"
                     data-r="110"
                     data-g="168"
                     data-b="171">
                    <div class="color-box" style="background: rgb(110, 168, 171);"></div>
                    <div class="color-info">
                        <strong>Light Blue</strong>
                        <span>AN17</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="258"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Sky Blue"
                     data-code="AN18"
                     data-r="189"
                     data-g="212"
                     data-b="199">
                    <div class="color-box" style="background: rgb(189, 212, 199);"></div>
                    <div class="color-info">
                        <strong>Sky Blue</strong>
                        <span>AN18</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="259"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Sunlight Blue"
                     data-code="AN19"
                     data-r="32"
                     data-g="180"
                     data-b="204">
                    <div class="color-box" style="background: rgb(32, 180, 204);"></div>
                    <div class="color-info">
                        <strong>Sunlight Blue</strong>
                        <span>AN19</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="260"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Ice Blue"
                     data-code="AN20"
                     data-r="165"
                     data-g="201"
                     data-b="201">
                    <div class="color-box" style="background: rgb(165, 201, 201);"></div>
                    <div class="color-info">
                        <strong>Ice Blue</strong>
                        <span>AN20</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="261"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="New Blue"
                     data-code="AN21"
                     data-r="152"
                     data-g="185"
                     data-b="191">
                    <div class="color-box" style="background: rgb(152, 185, 191);"></div>
                    <div class="color-info">
                        <strong>New Blue</strong>
                        <span>AN21</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="262"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Meghla"
                     data-code="AN22"
                     data-r="170"
                     data-g="191"
                     data-b="193">
                    <div class="color-box" style="background: rgb(170, 191, 193);"></div>
                    <div class="color-info">
                        <strong>Meghla</strong>
                        <span>AN22</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="263"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Meghna"
                     data-code="AN23"
                     data-r="169"
                     data-g="212"
                     data-b="185">
                    <div class="color-box" style="background: rgb(169, 212, 185);"></div>
                    <div class="color-info">
                        <strong>Meghna</strong>
                        <span>AN23</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="264"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Crystal Green"
                     data-code="AN24"
                     data-r="144"
                     data-g="202"
                     data-b="178">
                    <div class="color-box" style="background: rgb(144, 202, 178);"></div>
                    <div class="color-info">
                        <strong>Crystal Green</strong>
                        <span>AN24</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="265"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Crystal Green N"
                     data-code="AN25"
                     data-r="166"
                     data-g="197"
                     data-b="164">
                    <div class="color-box" style="background: rgb(166, 197, 164);"></div>
                    <div class="color-info">
                        <strong>Crystal Green N</strong>
                        <span>AN25</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="266"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Adam Green"
                     data-code="AN26"
                     data-r="182"
                     data-g="196"
                     data-b="160">
                    <div class="color-box" style="background: rgb(182, 196, 160);"></div>
                    <div class="color-info">
                        <strong>Adam Green</strong>
                        <span>AN26</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="267"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Kaptai Green"
                     data-code="AN27"
                     data-r="169"
                     data-g="204"
                     data-b="156">
                    <div class="color-box" style="background: rgb(169, 204, 156);"></div>
                    <div class="color-info">
                        <strong>Kaptai Green</strong>
                        <span>AN27</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="268"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Morning Dew"
                     data-code="AN28"
                     data-r="190"
                     data-g="224"
                     data-b="159">
                    <div class="color-box" style="background: rgb(190, 224, 159);"></div>
                    <div class="color-info">
                        <strong>Morning Dew</strong>
                        <span>AN28</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="269"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Garden Green"
                     data-code="AN29"
                     data-r="160"
                     data-g="202"
                     data-b="126">
                    <div class="color-box" style="background: rgb(160, 202, 126);"></div>
                    <div class="color-info">
                        <strong>Garden Green</strong>
                        <span>AN29</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="270"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Lush Lawn"
                     data-code="AN30"
                     data-r="149"
                     data-g="166"
                     data-b="88">
                    <div class="color-box" style="background: rgb(149, 166, 88);"></div>
                    <div class="color-info">
                        <strong>Lush Lawn</strong>
                        <span>AN30</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="271"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Jacobite"
                     data-code="AN31"
                     data-r="141"
                     data-g="157"
                     data-b="99">
                    <div class="color-box" style="background: rgb(141, 157, 99);"></div>
                    <div class="color-info">
                        <strong>Jacobite</strong>
                        <span>AN31</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="272"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Roussoue"
                     data-code="AN32"
                     data-r="144"
                     data-g="178"
                     data-b="116">
                    <div class="color-box" style="background: rgb(144, 178, 116);"></div>
                    <div class="color-info">
                        <strong>Roussoue</strong>
                        <span>AN32</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="273"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Green Apple"
                     data-code="AN33"
                     data-r="184"
                     data-g="189"
                     data-b="87">
                    <div class="color-box" style="background: rgb(184, 189, 87);"></div>
                    <div class="color-info">
                        <strong>Green Apple</strong>
                        <span>AN33</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="274"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Nebula"
                     data-code="AN34"
                     data-r="198"
                     data-g="212"
                     data-b="156">
                    <div class="color-box" style="background: rgb(198, 212, 156);"></div>
                    <div class="color-info">
                        <strong>Nebula</strong>
                        <span>AN34</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="275"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Bithika"
                     data-code="AN35"
                     data-r="167"
                     data-g="193"
                     data-b="160">
                    <div class="color-box" style="background: rgb(167, 193, 160);"></div>
                    <div class="color-info">
                        <strong>Bithika</strong>
                        <span>AN35</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="276"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Fairy Pink"
                     data-code="AN36"
                     data-r="223"
                     data-g="182"
                     data-b="184">
                    <div class="color-box" style="background: rgb(223, 182, 184);"></div>
                    <div class="color-info">
                        <strong>Fairy Pink</strong>
                        <span>AN36</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="277"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Flamingo"
                     data-code="AN37"
                     data-r="223"
                     data-g="170"
                     data-b="178">
                    <div class="color-box" style="background: rgb(223, 170, 178);"></div>
                    <div class="color-info">
                        <strong>Flamingo</strong>
                        <span>AN37</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="278"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Rebecca"
                     data-code="AN38"
                     data-r="206"
                     data-g="162"
                     data-b="155">
                    <div class="color-box" style="background: rgb(206, 162, 155);"></div>
                    <div class="color-info">
                        <strong>Rebecca</strong>
                        <span>AN38</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="279"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Rose Pink"
                     data-code="AN39"
                     data-r="211"
                     data-g="153"
                     data-b="149">
                    <div class="color-box" style="background: rgb(211, 153, 149);"></div>
                    <div class="color-info">
                        <strong>Rose Pink</strong>
                        <span>AN39</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="280"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Sweet Pink"
                     data-code="AN40"
                     data-r="235"
                     data-g="161"
                     data-b="177">
                    <div class="color-box" style="background: rgb(235, 161, 177);"></div>
                    <div class="color-info">
                        <strong>Sweet Pink</strong>
                        <span>AN40</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="281"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Ghazal"
                     data-code="AN41"
                     data-r="194"
                     data-g="191"
                     data-b="192">
                    <div class="color-box" style="background: rgb(194, 191, 192);"></div>
                    <div class="color-info">
                        <strong>Ghazal</strong>
                        <span>AN41</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="282"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Florentine"
                     data-code="AN42"
                     data-r="193"
                     data-g="151"
                     data-b="187">
                    <div class="color-box" style="background: rgb(193, 151, 187);"></div>
                    <div class="color-info">
                        <strong>Florentine</strong>
                        <span>AN42</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="283"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Snow Goose"
                     data-code="AN43"
                     data-r="185"
                     data-g="192"
                     data-b="180">
                    <div class="color-box" style="background: rgb(185, 192, 180);"></div>
                    <div class="color-info">
                        <strong>Snow Goose</strong>
                        <span>AN43</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="284"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="French Grey"
                     data-code="AN44"
                     data-r="178"
                     data-g="186"
                     data-b="175">
                    <div class="color-box" style="background: rgb(178, 186, 175);"></div>
                    <div class="color-info">
                        <strong>French Grey</strong>
                        <span>AN44</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="285"
                     data-family="2"
                     data-family-name="Interior (National Distemper)"
                     data-name="Dolomite"
                     data-code="AN45"
                     data-r="178"
                     data-g="186"
                     data-b="180">
                    <div class="color-box" style="background: rgb(178, 186, 180);"></div>
                    <div class="color-info">
                        <strong>Dolomite</strong>
                        <span>AN45</span>
                        <small>Interior (National Distemper)</small>
                    </div>
                </div>
                    </div>
    </div>
</div>

<footer class="site-footer">
    <div class="container">
        <div class="footer-brand-row">
            <div class="brand-logo-badge" style="background: rgba(255,255,255,0.08); border-color: rgba(255,255,255,0.15);">
                <div class="brand-letters-row">
                    <span class="brand-letter-a1">a</span>
                    <span class="brand-letter-q">q</span>
                    <span class="brand-letter-u">u</span>
                    <span class="brand-letter-a2">a</span>
                </div>
                <div class="brand-word-paints" style="color: #cbd5e1;">PAINTS</div>
            </div>
            <span class="footer-slogan">দেশের রঙে রাঙাই দেশ</span>
        </div>
        
        <p class="footer-disclaimer">
            Digital colour swatches are shown for representation only. Lighting, device screens, and surface textures may alter physical appearance. Please consult physical Aqua Paints shade fandeck at your nearest authorized dealer before purchase.
        </p>

        <p class="footer-bottom-copy">
            &copy; 2026 Aqua Paints. All rights reserved. &bull; Developed by Monwar Hossen &bull; Enhanced with Custom Wall Painter
        </p>
    </div>
</footer>

<script>
    // Room Selector Thumbnails Synchronization with #roomSelect
    document.addEventListener("DOMContentLoaded", function () {
        const roomSelect = document.getElementById("roomSelect");
        const thumbBtns = document.querySelectorAll("#roomSelectorStrip .room-thumb-btn");

        if (roomSelect && thumbBtns.length > 0) {
            thumbBtns.forEach(btn => {
                btn.addEventListener("click", function () {
                    thumbBtns.forEach(b => b.classList.remove("active"));
                    this.classList.add("active");

                    const val = this.getAttribute("data-val");
                    if (roomSelect.value !== val) {
                        roomSelect.value = val;
                        // Dispatch change event so app.js updates the room image and mask
                        roomSelect.dispatchEvent(new Event("change", { bubbles: true }));
                    }
                });
            });

            // Also keep thumbnails in sync if dropdown changes
            roomSelect.addEventListener("change", function () {
                thumbBtns.forEach(b => {
                    if (b.getAttribute("data-val") === roomSelect.value) {
                        b.classList.add("active");
                    } else {
                        b.classList.remove("active");
                    }
                });
            });
        }
    });
</script>
<script src="assets/js/app.js?v=20261027"></script>
</body>
</html>