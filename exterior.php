<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exterior Visualizer Studio - Aqua Paints</title>
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
<body class="exterior-visualizer-page" data-visualizer-type="exterior">

<!-- Top Announcement Ticker -->
<div class="top-brand-ticker">
    <span><span class="ticker-tag">EXTERIOR STUDIO</span> <strong>দেশের রঙে রাঙাই দেশ</strong> &bull; Platina, Defender & Outershield Weather-Guard Shades</span>
    <a href="custom-painter.html">Upload your house photo & paint &rarr;</a>
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
                    <span class="brand-tag-studio" style="background: linear-gradient(135deg, #cb6d3e, #ea580c);">EXTERIOR</span>
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
            <a href="interior.html">Interior Studio</a>
            <a href="exterior.html" class="active">Exterior Studio</a>
        </nav>
    </div>
</header>

<div class="container visualizer-page">
    <div class="visualizer-left">
        <div class="page-kicker" style="color: #cb6d3e; background: rgba(203, 109, 62, 0.08); border-color: rgba(203, 109, 62, 0.2);">
            Exterior Collection &bull; Weather Protection Range
        </div>
        <h2>বাহিরের দেয়ালে পেইন্টের রং কেমন দেখাবে তা দেখুন</h2>
        <p class="section-copy">
            এই পেজে শুধুমাত্র একুয়া পেইন্টসের আউটডোর শেড কার্ড ও এক্সটেরিয়র ভিলার প্রিভিউ সাজানো রয়েছে।
        </p>

        <!-- Visual Space Selector Thumbnails Strip -->
        <label for="roomSelect" style="font-weight: 700; color: #475569; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px; display: block;">Select Exterior Facade:</label>
        <div class="room-selector-strip" id="roomSelectorStrip">
            <button type="button" class="room-thumb-btn active" data-val="10">
                <img src="assets/rooms/exterior.jpg" alt="Villa Exterior">
                <span>Modern Villa Exterior</span>
            </button>
        </div>

        <!-- Accessible Room Select Dropdown (kept fully functional for app.js) -->
        <select id="roomSelect" style="display: none;">
            <option value="10" data-room="assets/rooms/exterior.jpg" data-mask="assets/rooms/mxterior_mask.png">Exterior</option>
        </select>

        <div id="downloadArea" class="download-area">
            <div class="preview-box" id="previewBox">
                <img id="roomImage" src="assets/rooms/exterior.jpg" class="room-image" alt="Exterior preview">
                
                <div id="paintLayer" class="paint-layer" style="position: absolute; inset: 0; background-color: rgb(156, 104, 86); opacity: 0.86; mix-blend-mode: multiply; mask-image: url('assets/rooms/mxterior_mask.png'); -webkit-mask-image: url('assets/rooms/mxterior_mask.png'); mask-size: cover; -webkit-mask-size: cover; mask-position: center; -webkit-mask-position: center; pointer-events: none;"></div>

                <div class="studio-lighting-badge">
                    <span>☀️ Outdoor Sunlight &bull; Weather Shield Protection</span>
                </div>
            </div>

            <!-- Active Selected Color Hero Card (Asian Paints Luxury Quality) -->
            <div class="download-info">
                <div class="download-swatch-row">
                    <div id="selectedColorSwatch" class="selected-swatch" style="background: rgb(156, 104, 86);"></div>
                    <div class="download-text-info">
                        <h3 id="selectedColorName">Terracotta</h3>
                        <div class="shade-meta-chips">
                            <span id="selectedColorCode">AD31</span>
                            <span id="selectedColorFamily">Family: Exterior (Platina+Defender)</span>
                        </div>
                        <div class="brand-guarantee-tag">
                            🛡️ UV & Rain Resistant &bull; Anti-Fungal Weather Guard
                        </div>
                    </div>
                </div>

                <!-- Harmonious Exterior Pairings -->
                <div class="color-harmony-box">
                    <div class="color-harmony-title">
                        <span>✨ Recommended Exterior Harmony & Trim Combinations:</span>
                    </div>
                    <div class="color-harmony-swatches">
                        <div class="harmony-swatch-chip" title="Facade Accent">
                            <span class="harmony-swatch-dot" style="background: #cb6d3e;"></span>
                            <span>Facade: Terracotta Sunset</span>
                        </div>
                        <div class="harmony-swatch-chip" title="Window & Roof Trim">
                            <span class="harmony-swatch-dot" style="background: #1e293b;"></span>
                            <span>Trim: Slate Charcoal</span>
                        </div>
                        <div class="harmony-swatch-chip" title="Boundary / Accent">
                            <span class="harmony-swatch-dot" style="background: #e2e8f0;"></span>
                            <span>Boundary: Soft Stone</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="selected-color-actions">
            <button id="downloadPreviewBtn" class="btn" type="button" style="background: linear-gradient(135deg, #cb6d3e 0%, #ea580c 100%);">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                    <polyline points="7 10 12 15 17 10"/>
                    <line x1="12" x2="12" y1="15" stroke-width="2.2"/>
                </svg>
                Download Exterior Preview with Recipe
            </button>
            <a href="custom-painter.html" class="btn btn-secondary" style="border-radius: var(--radius-full);">
                🎨 Paint on House Photo
            </a>
        </div>
    </div>

    <div class="visualizer-right">
        <h2>
            <span>Exterior Palette</span>
            <span class="catalog-count" style="color: #cb6d3e; background: rgba(203, 109, 62, 0.1);">Weather Guard Range</span>
        </h2>
        
        <div class="search-box-wrapper">
            <svg class="search-icon-inside" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                <circle cx="11" cy="11" r="8"/>
                <line x1="21" y1="21" x2="16.65" y2="16.65"/>
            </svg>
            <input type="text" id="searchInput" placeholder="Search exterior shades by name, code or RGB...">
        </div>

        <!-- 1-Click Trending Quick Shades (Asian Paints Signature) -->
        <div class="quick-shades-container">
            <div class="quick-shades-label">
                <span>🔥 Popular Outdoor Shades:</span>
            </div>
            <div class="quick-shades-row">
                <button type="button" class="quick-shade-pill" data-code="AD31" title="Terracotta (AD31)">
                    <span class="quick-shade-dot" style="background-color: #9c6856;"></span>
                    <span>Terracotta</span>
                </button>
                <button type="button" class="quick-shade-pill" data-code="AD34" title="Signal Red (AD34)">
                    <span class="quick-shade-dot" style="background-color: #c41e3a;"></span>
                    <span>Signal Red</span>
                </button>
                <button type="button" class="quick-shade-pill" data-code="AD27" title="Tangarine (AD27)">
                    <span class="quick-shade-dot" style="background-color: #b37c6f;"></span>
                    <span>Tangarine</span>
                </button>
                <button type="button" class="quick-shade-pill" data-code="AD15" title="Cream (AD15)">
                    <span class="quick-shade-dot" style="background-color: #d4c38c;"></span>
                    <span>Cream</span>
                </button>
                <button type="button" class="quick-shade-pill" data-code="AD09" title="Fawn (AD09)">
                    <span class="quick-shade-dot" style="background-color: #ada087;"></span>
                    <span>Fawn</span>
                </button>
                <button type="button" class="quick-shade-pill" data-code="AD01" title="Super White (AD01)">
                    <span class="quick-shade-dot" style="background-color: #fdfdfd; border-color: #cbd5e1;"></span>
                    <span>White</span>
                </button>
            </div>
        </div>

        <div class="family-tabs">
            <button class="family-tab active" data-family="all" type="button">
                All Outdoor Shades
            </button>
            <button class="family-tab" data-family="10" type="button">
                Platina + Defender
            </button>
            <button class="family-tab" data-family="11" type="button">
                Outershield Range
            </button>
        </div>

        <div class="color-grid" id="colorGrid">
                                            <div class="color-card"
                     data-id="97"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Super White"
                     data-code="AD01"
                     data-r="253"
                     data-g="253"
                     data-b="253">
                    <div class="color-box" style="background: rgb(253, 253, 253);"></div>
                    <div class="color-info">
                        <strong>Super White</strong>
                        <span>AD01</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="98"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Brilliant White"
                     data-code="AD02"
                     data-r="240"
                     data-g="244"
                     data-b="240">
                    <div class="color-box" style="background: rgb(240, 244, 240);"></div>
                    <div class="color-info">
                        <strong>Brilliant White</strong>
                        <span>AD02</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="99"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Off White(Light)"
                     data-code="AD03"
                     data-r="227"
                     data-g="217"
                     data-b="196">
                    <div class="color-box" style="background: rgb(227, 217, 196);"></div>
                    <div class="color-info">
                        <strong>Off White(Light)</strong>
                        <span>AD03</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="100"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Off White"
                     data-code="AD04"
                     data-r="228"
                     data-g="218"
                     data-b="189">
                    <div class="color-box" style="background: rgb(228, 218, 189);"></div>
                    <div class="color-info">
                        <strong>Off White</strong>
                        <span>AD04</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="101"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Kashfool White"
                     data-code="AD05"
                     data-r="235"
                     data-g="228"
                     data-b="208">
                    <div class="color-box" style="background: rgb(235, 228, 208);"></div>
                    <div class="color-info">
                        <strong>Kashfool White</strong>
                        <span>AD05</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="102"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Coral Shell"
                     data-code="AD06"
                     data-r="228"
                     data-g="220"
                     data-b="194">
                    <div class="color-box" style="background: rgb(228, 220, 194);"></div>
                    <div class="color-info">
                        <strong>Coral Shell</strong>
                        <span>AD06</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="103"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Pearl"
                     data-code="AD07"
                     data-r="225"
                     data-g="202"
                     data-b="174">
                    <div class="color-box" style="background: rgb(225, 202, 174);"></div>
                    <div class="color-info">
                        <strong>Pearl</strong>
                        <span>AD07</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="104"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Wild Orchid"
                     data-code="AD08"
                     data-r="241"
                     data-g="232"
                     data-b="223">
                    <div class="color-box" style="background: rgb(241, 232, 223);"></div>
                    <div class="color-info">
                        <strong>Wild Orchid</strong>
                        <span>AD08</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="105"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Fawn"
                     data-code="AD09"
                     data-r="201"
                     data-g="196"
                     data-b="175">
                    <div class="color-box" style="background: rgb(201, 196, 175);"></div>
                    <div class="color-info">
                        <strong>Fawn</strong>
                        <span>AD09</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="106"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Misty"
                     data-code="AD10"
                     data-r="188"
                     data-g="179"
                     data-b="158">
                    <div class="color-box" style="background: rgb(188, 179, 158);"></div>
                    <div class="color-info">
                        <strong>Misty</strong>
                        <span>AD10</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="107"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Pale Mashrom"
                     data-code="AD11"
                     data-r="203"
                     data-g="190"
                     data-b="168">
                    <div class="color-box" style="background: rgb(203, 190, 168);"></div>
                    <div class="color-info">
                        <strong>Pale Mashrom</strong>
                        <span>AD11</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="108"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Chamoise"
                     data-code="AD12"
                     data-r="187"
                     data-g="158"
                     data-b="126">
                    <div class="color-box" style="background: rgb(187, 158, 126);"></div>
                    <div class="color-info">
                        <strong>Chamoise</strong>
                        <span>AD12</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="109"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Magnolia"
                     data-code="AD13"
                     data-r="238"
                     data-g="204"
                     data-b="167">
                    <div class="color-box" style="background: rgb(238, 204, 167);"></div>
                    <div class="color-info">
                        <strong>Magnolia</strong>
                        <span>AD13</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="110"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Ivory"
                     data-code="AD14"
                     data-r="237"
                     data-g="205"
                     data-b="159">
                    <div class="color-box" style="background: rgb(237, 205, 159);"></div>
                    <div class="color-info">
                        <strong>Ivory</strong>
                        <span>AD14</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="111"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Cream"
                     data-code="AD15"
                     data-r="211"
                     data-g="189"
                     data-b="110">
                    <div class="color-box" style="background: rgb(211, 189, 110);"></div>
                    <div class="color-info">
                        <strong>Cream</strong>
                        <span>AD15</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="112"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Melba"
                     data-code="AD16"
                     data-r="214"
                     data-g="177"
                     data-b="146">
                    <div class="color-box" style="background: rgb(214, 177, 146);"></div>
                    <div class="color-info">
                        <strong>Melba</strong>
                        <span>AD16</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="113"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Old Gold"
                     data-code="AD17"
                     data-r="184"
                     data-g="187"
                     data-b="108">
                    <div class="color-box" style="background: rgb(184, 187, 108);"></div>
                    <div class="color-info">
                        <strong>Old Gold</strong>
                        <span>AD17</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="114"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Copper Leaf"
                     data-code="AD18"
                     data-r="178"
                     data-g="113"
                     data-b="103">
                    <div class="color-box" style="background: rgb(178, 113, 103);"></div>
                    <div class="color-info">
                        <strong>Copper Leaf</strong>
                        <span>AD18</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="115"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Cumulus"
                     data-code="AD19"
                     data-r="200"
                     data-g="200"
                     data-b="185">
                    <div class="color-box" style="background: rgb(200, 200, 185);"></div>
                    <div class="color-info">
                        <strong>Cumulus</strong>
                        <span>AD19</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="116"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Sonargaon"
                     data-code="AD20"
                     data-r="152"
                     data-g="142"
                     data-b="119">
                    <div class="color-box" style="background: rgb(152, 142, 119);"></div>
                    <div class="color-info">
                        <strong>Sonargaon</strong>
                        <span>AD20</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="117"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Sweet Pink"
                     data-code="AD21"
                     data-r="235"
                     data-g="161"
                     data-b="177">
                    <div class="color-box" style="background: rgb(235, 161, 177);"></div>
                    <div class="color-info">
                        <strong>Sweet Pink</strong>
                        <span>AD21</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="118"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Flamingo"
                     data-code="AD22"
                     data-r="223"
                     data-g="170"
                     data-b="178">
                    <div class="color-box" style="background: rgb(223, 170, 178);"></div>
                    <div class="color-info">
                        <strong>Flamingo</strong>
                        <span>AD22</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="119"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Falsetto"
                     data-code="AD23"
                     data-r="204"
                     data-g="122"
                     data-b="158">
                    <div class="color-box" style="background: rgb(204, 122, 158);"></div>
                    <div class="color-info">
                        <strong>Falsetto</strong>
                        <span>AD23</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="120"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Taffy"
                     data-code="AD24"
                     data-r="230"
                     data-g="117"
                     data-b="142">
                    <div class="color-box" style="background: rgb(230, 117, 142);"></div>
                    <div class="color-info">
                        <strong>Taffy</strong>
                        <span>AD24</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="121"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Queen Pink"
                     data-code="AD25"
                     data-r="231"
                     data-g="116"
                     data-b="133">
                    <div class="color-box" style="background: rgb(231, 116, 133);"></div>
                    <div class="color-info">
                        <strong>Queen Pink</strong>
                        <span>AD25</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="122"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="New Falsetto"
                     data-code="AD26"
                     data-r="182"
                     data-g="102"
                     data-b="122">
                    <div class="color-box" style="background: rgb(182, 102, 122);"></div>
                    <div class="color-info">
                        <strong>New Falsetto</strong>
                        <span>AD26</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="123"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Tangarine"
                     data-code="AD27"
                     data-r="179"
                     data-g="124"
                     data-b="111">
                    <div class="color-box" style="background: rgb(179, 124, 111);"></div>
                    <div class="color-info">
                        <strong>Tangarine</strong>
                        <span>AD27</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="124"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Brandy"
                     data-code="AD28"
                     data-r="176"
                     data-g="139"
                     data-b="108">
                    <div class="color-box" style="background: rgb(176, 139, 108);"></div>
                    <div class="color-info">
                        <strong>Brandy</strong>
                        <span>AD28</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="125"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Rustic"
                     data-code="AD29"
                     data-r="161"
                     data-g="110"
                     data-b="94">
                    <div class="color-box" style="background: rgb(161, 110, 94);"></div>
                    <div class="color-info">
                        <strong>Rustic</strong>
                        <span>AD29</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="126"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Burnt Brick"
                     data-code="AD30"
                     data-r="145"
                     data-g="96"
                     data-b="82">
                    <div class="color-box" style="background: rgb(145, 96, 82);"></div>
                    <div class="color-info">
                        <strong>Burnt Brick</strong>
                        <span>AD30</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="127"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Terracotta"
                     data-code="AD31"
                     data-r="156"
                     data-g="104"
                     data-b="86">
                    <div class="color-box" style="background: rgb(156, 104, 86);"></div>
                    <div class="color-info">
                        <strong>Terracotta</strong>
                        <span>AD31</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="128"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Brick Red"
                     data-code="AD32"
                     data-r="149"
                     data-g="95"
                     data-b="91">
                    <div class="color-box" style="background: rgb(149, 95, 91);"></div>
                    <div class="color-info">
                        <strong>Brick Red</strong>
                        <span>AD32</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="129"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Black Coffee"
                     data-code="AD33"
                     data-r="44"
                     data-g="12"
                     data-b="26">
                    <div class="color-box" style="background: rgb(44, 12, 26);"></div>
                    <div class="color-info">
                        <strong>Black Coffee</strong>
                        <span>AD33</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="130"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Signal Red"
                     data-code="AD34"
                     data-r="196"
                     data-g="30"
                     data-b="58">
                    <div class="color-box" style="background: rgb(196, 30, 58);"></div>
                    <div class="color-info">
                        <strong>Signal Red</strong>
                        <span>AD34</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="131"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Ming Red"
                     data-code="AD35"
                     data-r="152"
                     data-g="90"
                     data-b="82">
                    <div class="color-box" style="background: rgb(152, 90, 82);"></div>
                    <div class="color-info">
                        <strong>Ming Red</strong>
                        <span>AD35</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="132"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Ferrari Red"
                     data-code="AD36"
                     data-r="196"
                     data-g="4"
                     data-b="18">
                    <div class="color-box" style="background: rgb(196, 4, 18);"></div>
                    <div class="color-info">
                        <strong>Ferrari Red</strong>
                        <span>AD36</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="133"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Flag Red"
                     data-code="AD37"
                     data-r="196"
                     data-g="89"
                     data-b="82">
                    <div class="color-box" style="background: rgb(196, 89, 82);"></div>
                    <div class="color-info">
                        <strong>Flag Red</strong>
                        <span>AD37</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="134"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Sporty Yellow"
                     data-code="AD38"
                     data-r="249"
                     data-g="197"
                     data-b="23">
                    <div class="color-box" style="background: rgb(249, 197, 23);"></div>
                    <div class="color-info">
                        <strong>Sporty Yellow</strong>
                        <span>AD38</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="135"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Orange Crush"
                     data-code="AD39"
                     data-r="249"
                     data-g="170"
                     data-b="42">
                    <div class="color-box" style="background: rgb(249, 170, 42);"></div>
                    <div class="color-info">
                        <strong>Orange Crush</strong>
                        <span>AD39</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="136"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Sunrise"
                     data-code="AD40"
                     data-r="232"
                     data-g="109"
                     data-b="48">
                    <div class="color-box" style="background: rgb(232, 109, 48);"></div>
                    <div class="color-info">
                        <strong>Sunrise</strong>
                        <span>AD40</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="137"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Ra Gold"
                     data-code="AD41"
                     data-r="224"
                     data-g="168"
                     data-b="104">
                    <div class="color-box" style="background: rgb(224, 168, 104);"></div>
                    <div class="color-info">
                        <strong>Ra Gold</strong>
                        <span>AD41</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="138"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Daffodil"
                     data-code="AD42"
                     data-r="151"
                     data-g="199"
                     data-b="131">
                    <div class="color-box" style="background: rgb(151, 199, 131);"></div>
                    <div class="color-info">
                        <strong>Daffodil</strong>
                        <span>AD42</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="139"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Lemon Suoffle"
                     data-code="AD43"
                     data-r="181"
                     data-g="197"
                     data-b="7">
                    <div class="color-box" style="background: rgb(181, 197, 7);"></div>
                    <div class="color-info">
                        <strong>Lemon Suoffle</strong>
                        <span>AD43</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="140"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Pastel Green"
                     data-code="AD44"
                     data-r="127"
                     data-g="160"
                     data-b="137">
                    <div class="color-box" style="background: rgb(127, 160, 137);"></div>
                    <div class="color-info">
                        <strong>Pastel Green</strong>
                        <span>AD44</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="141"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Moss Green"
                     data-code="AD45"
                     data-r="175"
                     data-g="177"
                     data-b="145">
                    <div class="color-box" style="background: rgb(175, 177, 145);"></div>
                    <div class="color-info">
                        <strong>Moss Green</strong>
                        <span>AD45</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="142"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Green Gold"
                     data-code="AD46"
                     data-r="137"
                     data-g="136"
                     data-b="105">
                    <div class="color-box" style="background: rgb(137, 136, 105);"></div>
                    <div class="color-info">
                        <strong>Green Gold</strong>
                        <span>AD46</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="143"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Grass Green"
                     data-code="AD47"
                     data-r="124"
                     data-g="197"
                     data-b="115">
                    <div class="color-box" style="background: rgb(124, 197, 115);"></div>
                    <div class="color-info">
                        <strong>Grass Green</strong>
                        <span>AD47</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="144"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Jewel Green"
                     data-code="AD48"
                     data-r="50"
                     data-g="137"
                     data-b="74">
                    <div class="color-box" style="background: rgb(50, 137, 74);"></div>
                    <div class="color-info">
                        <strong>Jewel Green</strong>
                        <span>AD48</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="145"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Marsh Green"
                     data-code="AD49"
                     data-r="115"
                     data-g="149"
                     data-b="112">
                    <div class="color-box" style="background: rgb(115, 149, 112);"></div>
                    <div class="color-info">
                        <strong>Marsh Green</strong>
                        <span>AD49</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="146"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Deep Olive"
                     data-code="AD50"
                     data-r="35"
                     data-g="162"
                     data-b="136">
                    <div class="color-box" style="background: rgb(35, 162, 136);"></div>
                    <div class="color-info">
                        <strong>Deep Olive</strong>
                        <span>AD50</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="147"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Paddy Field"
                     data-code="AD51"
                     data-r="193"
                     data-g="228"
                     data-b="211">
                    <div class="color-box" style="background: rgb(193, 228, 211);"></div>
                    <div class="color-info">
                        <strong>Paddy Field</strong>
                        <span>AD51</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="148"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Valley Green"
                     data-code="AD52"
                     data-r="73"
                     data-g="185"
                     data-b="177">
                    <div class="color-box" style="background: rgb(73, 185, 177);"></div>
                    <div class="color-info">
                        <strong>Valley Green</strong>
                        <span>AD52</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="149"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Lavise Lime"
                     data-code="AD53"
                     data-r="75"
                     data-g="177"
                     data-b="95">
                    <div class="color-box" style="background: rgb(75, 177, 95);"></div>
                    <div class="color-info">
                        <strong>Lavise Lime</strong>
                        <span>AD53</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="150"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Flag Green"
                     data-code="AD54"
                     data-r="41"
                     data-g="129"
                     data-b="92">
                    <div class="color-box" style="background: rgb(41, 129, 92);"></div>
                    <div class="color-info">
                        <strong>Flag Green</strong>
                        <span>AD54</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="151"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Rhine Blue"
                     data-code="AD55"
                     data-r="144"
                     data-g="196"
                     data-b="210">
                    <div class="color-box" style="background: rgb(144, 196, 210);"></div>
                    <div class="color-info">
                        <strong>Rhine Blue</strong>
                        <span>AD55</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="152"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Icy Blue"
                     data-code="AD56"
                     data-r="141"
                     data-g="197"
                     data-b="203">
                    <div class="color-box" style="background: rgb(141, 197, 203);"></div>
                    <div class="color-info">
                        <strong>Icy Blue</strong>
                        <span>AD56</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="153"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Satin Blue"
                     data-code="AD57"
                     data-r="133"
                     data-g="188"
                     data-b="197">
                    <div class="color-box" style="background: rgb(133, 188, 197);"></div>
                    <div class="color-info">
                        <strong>Satin Blue</strong>
                        <span>AD57</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="154"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Ocean Blue"
                     data-code="AD58"
                     data-r="152"
                     data-g="211"
                     data-b="231">
                    <div class="color-box" style="background: rgb(152, 211, 231);"></div>
                    <div class="color-info">
                        <strong>Ocean Blue</strong>
                        <span>AD58</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="155"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Blue Flame"
                     data-code="AD59"
                     data-r="152"
                     data-g="180"
                     data-b="198">
                    <div class="color-box" style="background: rgb(152, 180, 198);"></div>
                    <div class="color-info">
                        <strong>Blue Flame</strong>
                        <span>AD59</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="156"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Wedgwood"
                     data-code="AD60"
                     data-r="106"
                     data-g="140"
                     data-b="148">
                    <div class="color-box" style="background: rgb(106, 140, 148);"></div>
                    <div class="color-info">
                        <strong>Wedgwood</strong>
                        <span>AD60</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="157"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Aqua Blue"
                     data-code="AD61"
                     data-r="30"
                     data-g="120"
                     data-b="172">
                    <div class="color-box" style="background: rgb(30, 120, 172);"></div>
                    <div class="color-info">
                        <strong>Aqua Blue</strong>
                        <span>AD61</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="158"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Ice Blue"
                     data-code="AD62"
                     data-r="205"
                     data-g="226"
                     data-b="240">
                    <div class="color-box" style="background: rgb(205, 226, 240);"></div>
                    <div class="color-info">
                        <strong>Ice Blue</strong>
                        <span>AD62</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="159"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Water Blue"
                     data-code="AD63"
                     data-r="0"
                     data-g="156"
                     data-b="185">
                    <div class="color-box" style="background: rgb(0, 156, 185);"></div>
                    <div class="color-info">
                        <strong>Water Blue</strong>
                        <span>AD63</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="160"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Cerulean"
                     data-code="AD64"
                     data-r="98"
                     data-g="172"
                     data-b="203">
                    <div class="color-box" style="background: rgb(98, 172, 203);"></div>
                    <div class="color-info">
                        <strong>Cerulean</strong>
                        <span>AD64</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="161"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Horizon Blue"
                     data-code="AD65"
                     data-r="139"
                     data-g="177"
                     data-b="204">
                    <div class="color-box" style="background: rgb(139, 177, 204);"></div>
                    <div class="color-info">
                        <strong>Horizon Blue</strong>
                        <span>AD65</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="162"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Ocean Cruise"
                     data-code="AD66"
                     data-r="80"
                     data-g="186"
                     data-b="179">
                    <div class="color-box" style="background: rgb(80, 186, 179);"></div>
                    <div class="color-info">
                        <strong>Ocean Cruise</strong>
                        <span>AD66</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="163"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Turkish Tile"
                     data-code="AD67"
                     data-r="45"
                     data-g="155"
                     data-b="159">
                    <div class="color-box" style="background: rgb(45, 155, 159);"></div>
                    <div class="color-info">
                        <strong>Turkish Tile</strong>
                        <span>AD67</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="164"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Secrets"
                     data-code="AD68"
                     data-r="84"
                     data-g="112"
                     data-b="132">
                    <div class="color-box" style="background: rgb(84, 112, 132);"></div>
                    <div class="color-info">
                        <strong>Secrets</strong>
                        <span>AD68</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="165"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Blushing Blue"
                     data-code="AD69"
                     data-r="126"
                     data-g="178"
                     data-b="197">
                    <div class="color-box" style="background: rgb(126, 178, 197);"></div>
                    <div class="color-info">
                        <strong>Blushing Blue</strong>
                        <span>AD69</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="166"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Olympia"
                     data-code="AD70"
                     data-r="124"
                     data-g="121"
                     data-b="160">
                    <div class="color-box" style="background: rgb(124, 121, 160);"></div>
                    <div class="color-info">
                        <strong>Olympia</strong>
                        <span>AD70</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="167"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Prophetic Purple"
                     data-code="AD71"
                     data-r="124"
                     data-g="121"
                     data-b="160">
                    <div class="color-box" style="background: rgb(124, 121, 160);"></div>
                    <div class="color-info">
                        <strong>Prophetic Purple</strong>
                        <span>AD71</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="168"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Strawberry"
                     data-code="AD72"
                     data-r="181"
                     data-g="116"
                     data-b="161">
                    <div class="color-box" style="background: rgb(181, 116, 161);"></div>
                    <div class="color-info">
                        <strong>Strawberry</strong>
                        <span>AD72</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="169"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Mauve"
                     data-code="AD73"
                     data-r="191"
                     data-g="122"
                     data-b="159">
                    <div class="color-box" style="background: rgb(191, 122, 159);"></div>
                    <div class="color-info">
                        <strong>Mauve</strong>
                        <span>AD73</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="170"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Flo-Jio"
                     data-code="AD74"
                     data-r="160"
                     data-g="120"
                     data-b="162">
                    <div class="color-box" style="background: rgb(160, 120, 162);"></div>
                    <div class="color-info">
                        <strong>Flo-Jio</strong>
                        <span>AD74</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="171"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Burple"
                     data-code="AD75"
                     data-r="157"
                     data-g="179"
                     data-b="206">
                    <div class="color-box" style="background: rgb(157, 179, 206);"></div>
                    <div class="color-info">
                        <strong>Burple</strong>
                        <span>AD75</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="172"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Virginia Bluebell"
                     data-code="AD76"
                     data-r="113"
                     data-g="143"
                     data-b="181">
                    <div class="color-box" style="background: rgb(113, 143, 181);"></div>
                    <div class="color-info">
                        <strong>Virginia Bluebell</strong>
                        <span>AD76</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="173"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Bright Grey"
                     data-code="AD77"
                     data-r="170"
                     data-g="174"
                     data-b="178">
                    <div class="color-box" style="background: rgb(170, 174, 178);"></div>
                    <div class="color-info">
                        <strong>Bright Grey</strong>
                        <span>AD77</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="174"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Light Peach"
                     data-code="AD78"
                     data-r="145"
                     data-g="157"
                     data-b="150">
                    <div class="color-box" style="background: rgb(145, 157, 150);"></div>
                    <div class="color-info">
                        <strong>Light Peach</strong>
                        <span>AD78</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="175"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Silver Grey"
                     data-code="AD79"
                     data-r="184"
                     data-g="179"
                     data-b="160">
                    <div class="color-box" style="background: rgb(184, 179, 160);"></div>
                    <div class="color-info">
                        <strong>Silver Grey</strong>
                        <span>AD79</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="176"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="French Grey"
                     data-code="AD80"
                     data-r="174"
                     data-g="174"
                     data-b="179">
                    <div class="color-box" style="background: rgb(174, 174, 179);"></div>
                    <div class="color-info">
                        <strong>French Grey</strong>
                        <span>AD80</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="177"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Tiara"
                     data-code="AD81"
                     data-r="199"
                     data-g="203"
                     data-b="204">
                    <div class="color-box" style="background: rgb(199, 203, 204);"></div>
                    <div class="color-info">
                        <strong>Tiara</strong>
                        <span>AD81</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="178"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Cement Grey"
                     data-code="AD82"
                     data-r="179"
                     data-g="179"
                     data-b="176">
                    <div class="color-box" style="background: rgb(179, 179, 176);"></div>
                    <div class="color-info">
                        <strong>Cement Grey</strong>
                        <span>AD82</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="179"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Armour"
                     data-code="AD83"
                     data-r="156"
                     data-g="173"
                     data-b="186">
                    <div class="color-box" style="background: rgb(156, 173, 186);"></div>
                    <div class="color-info">
                        <strong>Armour</strong>
                        <span>AD83</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="180"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Platinum Grey"
                     data-code="AD84"
                     data-r="182"
                     data-g="181"
                     data-b="176">
                    <div class="color-box" style="background: rgb(182, 181, 176);"></div>
                    <div class="color-info">
                        <strong>Platinum Grey</strong>
                        <span>AD84</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="181"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Marshy Grey"
                     data-code="AD85"
                     data-r="189"
                     data-g="195"
                     data-b="193">
                    <div class="color-box" style="background: rgb(189, 195, 193);"></div>
                    <div class="color-info">
                        <strong>Marshy Grey</strong>
                        <span>AD85</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="182"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Smoke Grey"
                     data-code="AD86"
                     data-r="140"
                     data-g="158"
                     data-b="152">
                    <div class="color-box" style="background: rgb(140, 158, 152);"></div>
                    <div class="color-info">
                        <strong>Smoke Grey</strong>
                        <span>AD86</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="183"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Steel Grey"
                     data-code="AD87"
                     data-r="123"
                     data-g="143"
                     data-b="160">
                    <div class="color-box" style="background: rgb(123, 143, 160);"></div>
                    <div class="color-info">
                        <strong>Steel Grey</strong>
                        <span>AD87</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="184"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Denim"
                     data-code="AD88"
                     data-r="137"
                     data-g="151"
                     data-b="157">
                    <div class="color-box" style="background: rgb(137, 151, 157);"></div>
                    <div class="color-info">
                        <strong>Denim</strong>
                        <span>AD88</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="185"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Moon Dance"
                     data-code="AD89"
                     data-r="128"
                     data-g="144"
                     data-b="152">
                    <div class="color-box" style="background: rgb(128, 144, 152);"></div>
                    <div class="color-info">
                        <strong>Moon Dance</strong>
                        <span>AD89</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="186"
                     data-family="10"
                     data-family-name="Exterior (Platina+Defender)"
                     data-name="Black"
                     data-code="AD90"
                     data-r="67"
                     data-g="69"
                     data-b="61">
                    <div class="color-box" style="background: rgb(67, 69, 61);"></div>
                    <div class="color-info">
                        <strong>Black</strong>
                        <span>AD90</span>
                        <small>Exterior (Platina+Defender)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="286"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Brilliant White"
                     data-code="OS01"
                     data-r="240"
                     data-g="244"
                     data-b="240">
                    <div class="color-box" style="background: rgb(240, 244, 240);"></div>
                    <div class="color-info">
                        <strong>Brilliant White</strong>
                        <span>OS01</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="287"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Off White"
                     data-code="OS02"
                     data-r="228"
                     data-g="218"
                     data-b="189">
                    <div class="color-box" style="background: rgb(228, 218, 189);"></div>
                    <div class="color-info">
                        <strong>Off White</strong>
                        <span>OS02</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="288"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Coral Shell"
                     data-code="OS03"
                     data-r="228"
                     data-g="220"
                     data-b="194">
                    <div class="color-box" style="background: rgb(228, 220, 194);"></div>
                    <div class="color-info">
                        <strong>Coral Shell</strong>
                        <span>OS03</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="289"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Pearl"
                     data-code="OS04"
                     data-r="225"
                     data-g="202"
                     data-b="174">
                    <div class="color-box" style="background: rgb(225, 202, 174);"></div>
                    <div class="color-info">
                        <strong>Pearl</strong>
                        <span>OS04</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="290"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Misty"
                     data-code="OS05"
                     data-r="188"
                     data-g="179"
                     data-b="158">
                    <div class="color-box" style="background: rgb(188, 179, 158);"></div>
                    <div class="color-info">
                        <strong>Misty</strong>
                        <span>OS05</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="291"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Pale Mashrom"
                     data-code="OS06"
                     data-r="203"
                     data-g="190"
                     data-b="168">
                    <div class="color-box" style="background: rgb(203, 190, 168);"></div>
                    <div class="color-info">
                        <strong>Pale Mashrom</strong>
                        <span>OS06</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="292"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Magnolia"
                     data-code="OS07"
                     data-r="238"
                     data-g="204"
                     data-b="167">
                    <div class="color-box" style="background: rgb(238, 204, 167);"></div>
                    <div class="color-info">
                        <strong>Magnolia</strong>
                        <span>OS07</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="293"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Ivory"
                     data-code="OS08"
                     data-r="237"
                     data-g="205"
                     data-b="159">
                    <div class="color-box" style="background: rgb(237, 205, 159);"></div>
                    <div class="color-info">
                        <strong>Ivory</strong>
                        <span>OS08</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="294"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Cream"
                     data-code="OS09"
                     data-r="211"
                     data-g="189"
                     data-b="110">
                    <div class="color-box" style="background: rgb(211, 189, 110);"></div>
                    <div class="color-info">
                        <strong>Cream</strong>
                        <span>OS09</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="295"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Melba"
                     data-code="OS10"
                     data-r="214"
                     data-g="177"
                     data-b="146">
                    <div class="color-box" style="background: rgb(214, 177, 146);"></div>
                    <div class="color-info">
                        <strong>Melba</strong>
                        <span>OS10</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="296"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Old Gold"
                     data-code="OS11"
                     data-r="184"
                     data-g="187"
                     data-b="108">
                    <div class="color-box" style="background: rgb(184, 187, 108);"></div>
                    <div class="color-info">
                        <strong>Old Gold</strong>
                        <span>OS11</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="297"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Copper Leaf"
                     data-code="OS12"
                     data-r="178"
                     data-g="113"
                     data-b="103">
                    <div class="color-box" style="background: rgb(178, 113, 103);"></div>
                    <div class="color-info">
                        <strong>Copper Leaf</strong>
                        <span>OS12</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="298"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Pink"
                     data-code="OS13"
                     data-r="230"
                     data-g="157"
                     data-b="139">
                    <div class="color-box" style="background: rgb(230, 157, 139);"></div>
                    <div class="color-info">
                        <strong>Pink</strong>
                        <span>OS13</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="299"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Flamingo"
                     data-code="OS14"
                     data-r="223"
                     data-g="170"
                     data-b="178">
                    <div class="color-box" style="background: rgb(223, 170, 178);"></div>
                    <div class="color-info">
                        <strong>Flamingo</strong>
                        <span>OS14</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="300"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Falsetto"
                     data-code="OS15"
                     data-r="204"
                     data-g="122"
                     data-b="158">
                    <div class="color-box" style="background: rgb(204, 122, 158);"></div>
                    <div class="color-info">
                        <strong>Falsetto</strong>
                        <span>OS15</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="301"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Taffy"
                     data-code="OS16"
                     data-r="230"
                     data-g="117"
                     data-b="142">
                    <div class="color-box" style="background: rgb(230, 117, 142);"></div>
                    <div class="color-info">
                        <strong>Taffy</strong>
                        <span>OS16</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="302"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Queen Pink"
                     data-code="OS17"
                     data-r="231"
                     data-g="116"
                     data-b="133">
                    <div class="color-box" style="background: rgb(231, 116, 133);"></div>
                    <div class="color-info">
                        <strong>Queen Pink</strong>
                        <span>OS17</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="303"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Tangarine"
                     data-code="OS18"
                     data-r="179"
                     data-g="124"
                     data-b="111">
                    <div class="color-box" style="background: rgb(179, 124, 111);"></div>
                    <div class="color-info">
                        <strong>Tangarine</strong>
                        <span>OS18</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="304"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Mushroom"
                     data-code="OS19"
                     data-r="176"
                     data-g="145"
                     data-b="123">
                    <div class="color-box" style="background: rgb(176, 145, 123);"></div>
                    <div class="color-info">
                        <strong>Mushroom</strong>
                        <span>OS19</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="305"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Amber"
                     data-code="OS20"
                     data-r="187"
                     data-g="128"
                     data-b="104">
                    <div class="color-box" style="background: rgb(187, 128, 104);"></div>
                    <div class="color-info">
                        <strong>Amber</strong>
                        <span>OS20</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="306"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Dark Mikado"
                     data-code="OS21"
                     data-r="196"
                     data-g="151"
                     data-b="137">
                    <div class="color-box" style="background: rgb(196, 151, 137);"></div>
                    <div class="color-info">
                        <strong>Dark Mikado</strong>
                        <span>OS21</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="307"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Brick Red"
                     data-code="OS22"
                     data-r="149"
                     data-g="95"
                     data-b="91">
                    <div class="color-box" style="background: rgb(149, 95, 91);"></div>
                    <div class="color-info">
                        <strong>Brick Red</strong>
                        <span>OS22</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="308"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Black Coffee"
                     data-code="OS23"
                     data-r="44"
                     data-g="12"
                     data-b="26">
                    <div class="color-box" style="background: rgb(44, 12, 26);"></div>
                    <div class="color-info">
                        <strong>Black Coffee</strong>
                        <span>OS23</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="309"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Signal Red"
                     data-code="OS24"
                     data-r="196"
                     data-g="30"
                     data-b="58">
                    <div class="color-box" style="background: rgb(196, 30, 58);"></div>
                    <div class="color-info">
                        <strong>Signal Red</strong>
                        <span>OS24</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="310"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Ming Red"
                     data-code="OS25"
                     data-r="152"
                     data-g="90"
                     data-b="82">
                    <div class="color-box" style="background: rgb(152, 90, 82);"></div>
                    <div class="color-info">
                        <strong>Ming Red</strong>
                        <span>OS25</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="311"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Sporty Yellow"
                     data-code="OS26"
                     data-r="249"
                     data-g="197"
                     data-b="23">
                    <div class="color-box" style="background: rgb(249, 197, 23);"></div>
                    <div class="color-info">
                        <strong>Sporty Yellow</strong>
                        <span>OS26</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="312"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Sunrise"
                     data-code="OS27"
                     data-r="232"
                     data-g="109"
                     data-b="48">
                    <div class="color-box" style="background: rgb(232, 109, 48);"></div>
                    <div class="color-info">
                        <strong>Sunrise</strong>
                        <span>OS27</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="313"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Orange Crush"
                     data-code="OS28"
                     data-r="249"
                     data-g="170"
                     data-b="42">
                    <div class="color-box" style="background: rgb(249, 170, 42);"></div>
                    <div class="color-info">
                        <strong>Orange Crush</strong>
                        <span>OS28</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="314"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Ra Gold"
                     data-code="OS29"
                     data-r="224"
                     data-g="168"
                     data-b="104">
                    <div class="color-box" style="background: rgb(224, 168, 104);"></div>
                    <div class="color-info">
                        <strong>Ra Gold</strong>
                        <span>OS29</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="315"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Partel Green"
                     data-code="OS30"
                     data-r="171"
                     data-g="179"
                     data-b="147">
                    <div class="color-box" style="background: rgb(171, 179, 147);"></div>
                    <div class="color-info">
                        <strong>Partel Green</strong>
                        <span>OS30</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="316"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Moss Green"
                     data-code="OS31"
                     data-r="175"
                     data-g="177"
                     data-b="145">
                    <div class="color-box" style="background: rgb(175, 177, 145);"></div>
                    <div class="color-info">
                        <strong>Moss Green</strong>
                        <span>OS31</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="317"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Green Gold"
                     data-code="OS32"
                     data-r="137"
                     data-g="136"
                     data-b="105">
                    <div class="color-box" style="background: rgb(137, 136, 105);"></div>
                    <div class="color-info">
                        <strong>Green Gold</strong>
                        <span>OS32</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="318"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Garden Green"
                     data-code="OS33"
                     data-r="179"
                     data-g="210"
                     data-b="143">
                    <div class="color-box" style="background: rgb(179, 210, 143);"></div>
                    <div class="color-info">
                        <strong>Garden Green</strong>
                        <span>OS33</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="319"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Jewel Green"
                     data-code="OS34"
                     data-r="94"
                     data-g="168"
                     data-b="113">
                    <div class="color-box" style="background: rgb(94, 168, 113);"></div>
                    <div class="color-info">
                        <strong>Jewel Green</strong>
                        <span>OS34</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="320"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Aqua Green"
                     data-code="OS35"
                     data-r="35"
                     data-g="162"
                     data-b="136">
                    <div class="color-box" style="background: rgb(35, 162, 136);"></div>
                    <div class="color-info">
                        <strong>Aqua Green</strong>
                        <span>OS35</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="321"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Lemon Suoffle"
                     data-code="OS36"
                     data-r="205"
                     data-g="200"
                     data-b="72">
                    <div class="color-box" style="background: rgb(205, 200, 72);"></div>
                    <div class="color-info">
                        <strong>Lemon Suoffle</strong>
                        <span>OS36</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="322"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Paddy Field"
                     data-code="OS37"
                     data-r="193"
                     data-g="228"
                     data-b="211">
                    <div class="color-box" style="background: rgb(193, 228, 211);"></div>
                    <div class="color-info">
                        <strong>Paddy Field</strong>
                        <span>OS37</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="323"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Valley Green"
                     data-code="OS38"
                     data-r="73"
                     data-g="185"
                     data-b="177">
                    <div class="color-box" style="background: rgb(73, 185, 177);"></div>
                    <div class="color-info">
                        <strong>Valley Green</strong>
                        <span>OS38</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="324"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Lavise Lime"
                     data-code="OS39"
                     data-r="135"
                     data-g="177"
                     data-b="95">
                    <div class="color-box" style="background: rgb(135, 177, 95);"></div>
                    <div class="color-info">
                        <strong>Lavise Lime</strong>
                        <span>OS39</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="325"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Rhine Blue"
                     data-code="OS40"
                     data-r="163"
                     data-g="200"
                     data-b="202">
                    <div class="color-box" style="background: rgb(163, 200, 202);"></div>
                    <div class="color-info">
                        <strong>Rhine Blue</strong>
                        <span>OS40</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="326"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Satin Blue"
                     data-code="OS41"
                     data-r="133"
                     data-g="188"
                     data-b="197">
                    <div class="color-box" style="background: rgb(133, 188, 197);"></div>
                    <div class="color-info">
                        <strong>Satin Blue</strong>
                        <span>OS41</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="327"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Ocean Blue"
                     data-code="OS42"
                     data-r="176"
                     data-g="217"
                     data-b="225">
                    <div class="color-box" style="background: rgb(176, 217, 225);"></div>
                    <div class="color-info">
                        <strong>Ocean Blue</strong>
                        <span>OS42</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="328"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Blue Flame"
                     data-code="OS43"
                     data-r="152"
                     data-g="180"
                     data-b="198">
                    <div class="color-box" style="background: rgb(152, 180, 198);"></div>
                    <div class="color-info">
                        <strong>Blue Flame</strong>
                        <span>OS43</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="329"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Wdgewood"
                     data-code="OS44"
                     data-r="136"
                     data-g="157"
                     data-b="165">
                    <div class="color-box" style="background: rgb(136, 157, 165);"></div>
                    <div class="color-info">
                        <strong>Wdgewood</strong>
                        <span>OS44</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="330"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Aqua Blue"
                     data-code="OS45"
                     data-r="30"
                     data-g="120"
                     data-b="172">
                    <div class="color-box" style="background: rgb(30, 120, 172);"></div>
                    <div class="color-info">
                        <strong>Aqua Blue</strong>
                        <span>OS45</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="331"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Smart Blue"
                     data-code="OS46"
                     data-r="134"
                     data-g="184"
                     data-b="198">
                    <div class="color-box" style="background: rgb(134, 184, 198);"></div>
                    <div class="color-info">
                        <strong>Smart Blue</strong>
                        <span>OS46</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="332"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Water Blue"
                     data-code="OS47"
                     data-r="0"
                     data-g="156"
                     data-b="185">
                    <div class="color-box" style="background: rgb(0, 156, 185);"></div>
                    <div class="color-info">
                        <strong>Water Blue</strong>
                        <span>OS47</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="333"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Cerulean"
                     data-code="OS48"
                     data-r="98"
                     data-g="172"
                     data-b="203">
                    <div class="color-box" style="background: rgb(98, 172, 203);"></div>
                    <div class="color-info">
                        <strong>Cerulean</strong>
                        <span>OS48</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="334"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Turkish Tile"
                     data-code="OS49"
                     data-r="45"
                     data-g="155"
                     data-b="159">
                    <div class="color-box" style="background: rgb(45, 155, 159);"></div>
                    <div class="color-info">
                        <strong>Turkish Tile</strong>
                        <span>OS49</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="335"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Secrets"
                     data-code="OS50"
                     data-r="84"
                     data-g="112"
                     data-b="132">
                    <div class="color-box" style="background: rgb(84, 112, 132);"></div>
                    <div class="color-info">
                        <strong>Secrets</strong>
                        <span>OS50</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="336"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Olympia"
                     data-code="OS51"
                     data-r="142"
                     data-g="141"
                     data-b="178">
                    <div class="color-box" style="background: rgb(142, 141, 178);"></div>
                    <div class="color-info">
                        <strong>Olympia</strong>
                        <span>OS51</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="337"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Prophetic Purple"
                     data-code="OS52"
                     data-r="124"
                     data-g="121"
                     data-b="160">
                    <div class="color-box" style="background: rgb(124, 121, 160);"></div>
                    <div class="color-info">
                        <strong>Prophetic Purple</strong>
                        <span>OS52</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="338"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Strawberry"
                     data-code="OS53"
                     data-r="181"
                     data-g="116"
                     data-b="161">
                    <div class="color-box" style="background: rgb(181, 116, 161);"></div>
                    <div class="color-info">
                        <strong>Strawberry</strong>
                        <span>OS53</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="339"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Silver Grey"
                     data-code="OS54"
                     data-r="184"
                     data-g="179"
                     data-b="160">
                    <div class="color-box" style="background: rgb(184, 179, 160);"></div>
                    <div class="color-info">
                        <strong>Silver Grey</strong>
                        <span>OS54</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="340"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="French Grey"
                     data-code="OS55"
                     data-r="174"
                     data-g="174"
                     data-b="179">
                    <div class="color-box" style="background: rgb(174, 174, 179);"></div>
                    <div class="color-info">
                        <strong>French Grey</strong>
                        <span>OS55</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="341"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Monsoon Skies"
                     data-code="OS56"
                     data-r="197"
                     data-g="196"
                     data-b="189">
                    <div class="color-box" style="background: rgb(197, 196, 189);"></div>
                    <div class="color-info">
                        <strong>Monsoon Skies</strong>
                        <span>OS56</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="342"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Cement Grey"
                     data-code="OS57"
                     data-r="179"
                     data-g="179"
                     data-b="176">
                    <div class="color-box" style="background: rgb(179, 179, 176);"></div>
                    <div class="color-info">
                        <strong>Cement Grey</strong>
                        <span>OS57</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="343"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Platinum Grey"
                     data-code="OS58"
                     data-r="182"
                     data-g="181"
                     data-b="176">
                    <div class="color-box" style="background: rgb(182, 181, 176);"></div>
                    <div class="color-info">
                        <strong>Platinum Grey</strong>
                        <span>OS58</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="344"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Marshy Grey"
                     data-code="OS59"
                     data-r="189"
                     data-g="195"
                     data-b="193">
                    <div class="color-box" style="background: rgb(189, 195, 193);"></div>
                    <div class="color-info">
                        <strong>Marshy Grey</strong>
                        <span>OS59</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="345"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Smoke Grey"
                     data-code="OS60"
                     data-r="140"
                     data-g="158"
                     data-b="152">
                    <div class="color-box" style="background: rgb(140, 158, 152);"></div>
                    <div class="color-info">
                        <strong>Smoke Grey</strong>
                        <span>OS60</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="346"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Denim"
                     data-code="OS61"
                     data-r="137"
                     data-g="151"
                     data-b="157">
                    <div class="color-box" style="background: rgb(137, 151, 157);"></div>
                    <div class="color-info">
                        <strong>Denim</strong>
                        <span>OS61</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="347"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Moon Dance"
                     data-code="OS62"
                     data-r="128"
                     data-g="144"
                     data-b="152">
                    <div class="color-box" style="background: rgb(128, 144, 152);"></div>
                    <div class="color-info">
                        <strong>Moon Dance</strong>
                        <span>OS62</span>
                        <small>Exterior (Outersheild)</small>
                    </div>
                </div>
                                            <div class="color-card"
                     data-id="348"
                     data-family="11"
                     data-family-name="Exterior (Outersheild)"
                     data-name="Black"
                     data-code="OS63"
                     data-r="67"
                     data-g="69"
                     data-b="61">
                    <div class="color-box" style="background: rgb(67, 69, 61);"></div>
                    <div class="color-info">
                        <strong>Black</strong>
                        <span>OS63</span>
                        <small>Exterior (Outersheild)</small>
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
                        roomSelect.dispatchEvent(new Event("change", { bubbles: true }));
                    }
                });
            });

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