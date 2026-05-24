<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php print $SITE_TITLE; ?> | Sign In</title>

  <!-- ═══ FAVICON & TOUCH ICONS ═══════════════════════════════ -->
  <link rel="icon"             type="image/x-icon"  href="<?php echo $theme_link; ?>images/favicon.ico" />
  <link rel="shortcut icon"    type="image/x-icon"  href="<?php echo $theme_link; ?>images/favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180"      href="<?php echo $theme_link; ?>images/favicon.ico" />

  <!-- ═══ OPEN GRAPH — WhatsApp / Facebook / LinkedIn ════════ -->
  <meta property="og:type"        content="website" />
  <meta property="og:site_name"   content="Dua Fashion" />
  <meta property="og:title"       content="Dua Fashion — Premium Fashion Retail POS" />
  <meta property="og:description" content="Africa's finest fashion retail management system. Clothing, shoes, jewelry, bags & accessories — all in one place. Visit DuaFashion.store" />
  <meta property="og:url"         content="https://pos.duafashion.store/login" />
  <meta property="og:image"       content="https://images.pexels.com/photos/1536619/pexels-photo-1536619.jpeg?auto=compress&cs=tinysrgb&w=1200&h=630&fit=crop" />
  <meta property="og:image:width"  content="1200" />
  <meta property="og:image:height" content="630" />
  <meta property="og:image:alt"   content="Dua Fashion — Premium African Fashion Retail" />
  <meta property="og:locale"      content="en_NG" />

  <!-- ═══ TWITTER CARD ════════════════════════════════════════ -->
  <meta name="twitter:card"        content="summary_large_image" />
  <meta name="twitter:title"       content="Dua Fashion — Premium Fashion Retail POS" />
  <meta name="twitter:description" content="Africa's finest fashion retail management system. Clothing, shoes, jewelry, bags & accessories." />
  <meta name="twitter:image"       content="https://images.pexels.com/photos/1536619/pexels-photo-1536619.jpeg?auto=compress&cs=tinysrgb&w=1200&h=630&fit=crop" />
  <meta name="twitter:image:alt"   content="Dua Fashion Store" />

  <!-- ═══ GENERAL SEO ════════════════════════════════════════ -->
  <meta name="description"  content="Dua Fashion POS — Africa's premium fashion retail management system. Manage clothing, shoes, jewelry, bags & accessories at DuaFashion.store" />
  <meta name="keywords"     content="Dua Fashion, fashion retail, POS, African fashion, clothing store, Nigeria fashion" />
  <meta name="author"       content="Intellisense Vivid Technologies" />
  <meta name="robots"       content="noindex, nofollow" />
  <meta name="theme-color"  content="#C9922A" />

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

  <!-- Font Awesome 5 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- Bootstrap (kept for form compatibility) -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>bootstrap/css/bootstrap.min.css">

  <style>
    /* ============================================================
       DESIGN TOKENS
    ============================================================ */
    :root {
      --gold:        #C9922A;
      --gold-light:  #E8B84B;
      --gold-pale:   #FFF3D1;
      --deep:        #0D0A0A;
      --panel-bg:    #111010;
      --card-bg:     rgba(255,255,255,0.06);
      --card-border: rgba(201,146,42,0.25);
      --text-main:   #F2EBE1;
      --text-sub:    rgba(242,235,225,0.55);
      --input-bg:    rgba(255,255,255,0.07);
      --input-border:rgba(201,146,42,0.3);
      --input-focus: rgba(201,146,42,0.7);
      --btn-bg:      linear-gradient(135deg, #C9922A 0%, #E8B84B 100%);
      --btn-hover:   linear-gradient(135deg, #E8B84B 0%, #C9922A 100%);
      --error-bg:    rgba(220,53,69,0.15);
      --success-bg:  rgba(40,167,69,0.15);
      --toggle-bg:   rgba(255,255,255,0.12);
      --divider:     rgba(201,146,42,0.2);
    }

    [data-theme="light"] {
      --deep:        #FAF7F2;
      --panel-bg:    #F5EFE6;
      --card-bg:     rgba(255,255,255,0.85);
      --card-border: rgba(150,90,10,0.2);
      --text-main:   #1A1208;
      --text-sub:    rgba(26,18,8,0.55);
      --input-bg:    rgba(255,255,255,0.9);
      --input-border:rgba(150,90,10,0.25);
      --input-focus: rgba(201,146,42,0.6);
      --toggle-bg:   rgba(0,0,0,0.08);
      --divider:     rgba(150,90,10,0.15);
      --error-bg:    rgba(220,53,69,0.1);
      --success-bg:  rgba(40,167,69,0.1);
    }

    /* ============================================================
       RESET & BASE
    ============================================================ */
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    html, body {
      height: 100%;
      font-family: 'Inter', sans-serif;
      background: var(--deep);
      color: var(--text-main);
      overflow: hidden;
      transition: background 0.4s, color 0.4s;
    }

    @media (max-width: 768px) {
      html, body { overflow: auto; }
    }

    /* ============================================================
       LAYOUT
    ============================================================ */
    .auth-wrapper {
      display: flex;
      width: 100%;
      height: 100vh;
      min-height: 100dvh;
    }

    /* ============================================================
       LEFT — FASHION PANEL
    ============================================================ */
    .fashion-panel {
      flex: 0 0 58%;
      position: relative;
      overflow: hidden;
      display: flex;
      align-items: flex-end;
    }

    @media (max-width: 900px) { .fashion-panel { flex: 0 0 45%; } }
    @media (max-width: 768px) { .fashion-panel { display: none; } }

    /* Slideshow */
    .slide-track {
      position: absolute;
      inset: 0;
      display: flex;
      transition: transform 1.1s cubic-bezier(0.77,0,0.175,1);
    }

    .slide {
      flex: 0 0 100%;
      background-size: cover;
      background-position: center top;
      will-change: transform;
    }

    .slide:nth-child(1) {
      background-image: url('https://images.pexels.com/photos/1536619/pexels-photo-1536619.jpeg?auto=compress&cs=tinysrgb&w=1400&h=1800&fit=crop');
    }
    .slide:nth-child(2) {
      background-image: url('https://images.pexels.com/photos/2220316/pexels-photo-2220316.jpeg?auto=compress&cs=tinysrgb&w=1400&h=1800&fit=crop');
    }
    .slide:nth-child(3) {
      background-image: url('https://images.pexels.com/photos/1884584/pexels-photo-1884584.jpeg?auto=compress&cs=tinysrgb&w=1400&h=1800&fit=crop');
    }
    .slide:nth-child(4) {
      background-image: url('https://images.pexels.com/photos/291762/pexels-photo-291762.jpeg?auto=compress&cs=tinysrgb&w=1400&h=1800&fit=crop');
    }

    /* Dark vignette overlay */
    .fashion-panel::after {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(
        to right,
        rgba(0,0,0,0.15) 0%,
        rgba(0,0,0,0.08) 60%,
        rgba(0,0,0,0.55) 100%
      ),
      linear-gradient(
        to top,
        rgba(0,0,0,0.85) 0%,
        rgba(0,0,0,0.3) 40%,
        transparent 70%
      );
      z-index: 1;
      pointer-events: none;
    }

    [data-theme="light"] .fashion-panel::after {
      background: linear-gradient(
        to right,
        rgba(0,0,0,0.05) 0%,
        transparent 60%,
        rgba(0,0,0,0.45) 100%
      ),
      linear-gradient(
        to top,
        rgba(0,0,0,0.7) 0%,
        rgba(0,0,0,0.2) 40%,
        transparent 65%
      );
    }

    /* Fashion panel text content */
    .fashion-content {
      position: relative;
      z-index: 2;
      padding: 48px 44px;
      width: 100%;
    }

    .brand-tag {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(201,146,42,0.18);
      border: 1px solid rgba(201,146,42,0.4);
      border-radius: 50px;
      padding: 6px 16px;
      font-size: 11px;
      font-weight: 600;
      letter-spacing: 2.5px;
      text-transform: uppercase;
      color: var(--gold-light);
      margin-bottom: 20px;
      backdrop-filter: blur(8px);
      animation: fadeSlideUp 0.9s 0.2s both;
    }

    .fashion-headline {
      font-family: 'Playfair Display', serif;
      font-size: clamp(30px, 4vw, 52px);
      font-weight: 700;
      line-height: 1.15;
      color: #fff;
      margin-bottom: 16px;
      animation: fadeSlideUp 0.9s 0.4s both;
    }

    .fashion-headline em {
      font-style: italic;
      color: var(--gold-light);
    }

    .fashion-sub {
      font-size: 14px;
      font-weight: 400;
      color: rgba(255,255,255,0.7);
      line-height: 1.7;
      max-width: 360px;
      margin-bottom: 32px;
      animation: fadeSlideUp 0.9s 0.6s both;
    }

    /* Slide dots */
    .slide-dots {
      display: flex;
      gap: 8px;
      animation: fadeSlideUp 0.9s 0.8s both;
    }

    .dot {
      width: 6px;
      height: 6px;
      border-radius: 50%;
      background: rgba(255,255,255,0.35);
      cursor: pointer;
      transition: all 0.4s;
    }

    .dot.active {
      width: 24px;
      border-radius: 3px;
      background: var(--gold-light);
    }

    /* Floating product tags */
    .float-tags {
      position: absolute;
      top: 36px;
      left: 36px;
      z-index: 2;
      display: flex;
      flex-direction: column;
      gap: 10px;
      animation: fadeIn 1s 1s both;
    }

    .float-tag {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(0,0,0,0.45);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(255,255,255,0.12);
      border-radius: 8px;
      padding: 8px 14px;
      font-size: 12px;
      font-weight: 500;
      color: rgba(255,255,255,0.9);
      animation: floatAnim 3s ease-in-out infinite;
    }

    .float-tag i { color: var(--gold-light); }
    .float-tag:nth-child(2) { animation-delay: 1s; }
    .float-tag:nth-child(3) { animation-delay: 2s; }

    /* ============================================================
       RIGHT — LOGIN PANEL
    ============================================================ */
    .login-panel {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      background: var(--panel-bg);
      padding: 40px 24px;
      position: relative;
      overflow-y: auto;
      transition: background 0.4s;
    }

    @media (max-width: 768px) {
      .login-panel {
        min-height: 100vh;
        background: var(--deep);
        padding: 32px 20px 80px;
      }
    }

    /* Subtle radial glow behind form */
    .login-panel::before {
      content: '';
      position: absolute;
      top: 30%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 420px;
      height: 420px;
      background: radial-gradient(circle, rgba(201,146,42,0.12) 0%, transparent 70%);
      pointer-events: none;
      animation: pulseGlow 6s ease-in-out infinite;
    }

    /* Mobile background image overlay */
    @media (max-width: 768px) {
      .login-panel::after {
        content: '';
        position: fixed;
        inset: 0;
        background: url('https://images.pexels.com/photos/1536619/pexels-photo-1536619.jpeg?auto=compress&cs=tinysrgb&w=800&h=1200&fit=crop') center/cover no-repeat;
        opacity: 0.12;
        z-index: 0;
        pointer-events: none;
      }
    }

    /* Theme toggle */
    .theme-toggle {
      position: absolute;
      top: 20px;
      right: 20px;
      z-index: 10;
      background: var(--toggle-bg);
      border: 1px solid var(--card-border);
      border-radius: 50px;
      padding: 6px 14px;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 7px;
      font-size: 12px;
      font-weight: 500;
      color: var(--text-sub);
      transition: all 0.3s;
      backdrop-filter: blur(8px);
    }

    .theme-toggle:hover {
      color: var(--gold-light);
      border-color: var(--gold);
    }

    .theme-toggle i { font-size: 13px; }

    /* Login card */
    .login-card {
      width: 100%;
      max-width: 400px;
      position: relative;
      z-index: 1;
      animation: fadeSlideUp 0.8s 0.1s both;
    }

    /* Logo / brand header */
    .brand-header {
      text-align: center;
      margin-bottom: 36px;
    }

    .brand-logo-wrap {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 72px;
      height: 72px;
      background: linear-gradient(135deg, rgba(201,146,42,0.2), rgba(232,184,75,0.1));
      border: 1.5px solid var(--gold);
      border-radius: 18px;
      margin-bottom: 16px;
      transition: all 0.4s;
    }

    .brand-logo-wrap img {
      width: 52px;
      height: 52px;
      object-fit: contain;
      border-radius: 8px;
    }

    .brand-logo-placeholder {
      font-family: 'Playfair Display', serif;
      font-size: 28px;
      font-weight: 700;
      color: var(--gold-light);
    }

    .brand-name {
      font-family: 'Playfair Display', serif;
      font-size: 22px;
      font-weight: 700;
      color: var(--text-main);
      letter-spacing: 0.5px;
    }

    .brand-tagline {
      font-size: 12px;
      color: var(--text-sub);
      margin-top: 4px;
      letter-spacing: 0.3px;
    }

    /* Glass form card */
    .glass-card {
      background: var(--card-bg);
      border: 1px solid var(--card-border);
      border-radius: 20px;
      padding: 36px 32px;
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      transition: background 0.4s, border 0.4s;
    }

    @media (max-width: 480px) {
      .glass-card { padding: 28px 22px; border-radius: 16px; }
    }

    .card-title {
      font-size: 20px;
      font-weight: 600;
      color: var(--text-main);
      margin-bottom: 4px;
    }

    .card-sub {
      font-size: 13px;
      color: var(--text-sub);
      margin-bottom: 28px;
    }

    /* Flash messages */
    .flash-error, .flash-success {
      border-radius: 10px;
      padding: 10px 14px;
      font-size: 13px;
      font-weight: 500;
      margin-bottom: 18px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .flash-error {
      background: var(--error-bg);
      border: 1px solid rgba(220,53,69,0.3);
      color: #f87171;
    }

    .flash-success {
      background: var(--success-bg);
      border: 1px solid rgba(40,167,69,0.3);
      color: #4ade80;
    }

    /* Form fields */
    .field-group {
      margin-bottom: 18px;
    }

    .field-label {
      display: block;
      font-size: 12px;
      font-weight: 600;
      letter-spacing: 0.8px;
      text-transform: uppercase;
      color: var(--text-sub);
      margin-bottom: 8px;
    }

    .field-wrap {
      position: relative;
    }

    .field-wrap i {
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--gold);
      font-size: 14px;
      pointer-events: none;
      transition: color 0.3s;
    }

    .field-input {
      width: 100%;
      background: var(--input-bg);
      border: 1.5px solid var(--input-border);
      border-radius: 12px;
      padding: 13px 14px 13px 42px;
      font-size: 14px;
      font-family: 'Inter', sans-serif;
      color: var(--text-main);
      outline: none;
      transition: border-color 0.3s, box-shadow 0.3s, background 0.3s;
    }

    .field-input::placeholder { color: var(--text-sub); }

    .field-input:focus {
      border-color: var(--gold);
      box-shadow: 0 0 0 3px rgba(201,146,42,0.18);
      background: var(--input-bg);
    }

    /* Password toggle */
    .pw-toggle {
      position: absolute;
      right: 14px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: var(--text-sub);
      font-size: 14px;
      transition: color 0.3s;
      background: none;
      border: none;
      padding: 0;
    }

    .pw-toggle:hover { color: var(--gold-light); }

    /* Remember row */
    .remember-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 24px;
    }

    .remember-label {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 13px;
      color: var(--text-sub);
      cursor: pointer;
      user-select: none;
    }

    .remember-label input[type="checkbox"] {
      appearance: none;
      -webkit-appearance: none;
      width: 16px;
      height: 16px;
      border: 1.5px solid var(--input-border);
      border-radius: 4px;
      background: var(--input-bg);
      cursor: pointer;
      position: relative;
      transition: all 0.2s;
      flex-shrink: 0;
    }

    .remember-label input[type="checkbox"]:checked {
      background: var(--gold);
      border-color: var(--gold);
    }

    .remember-label input[type="checkbox"]:checked::after {
      content: '✓';
      position: absolute;
      top: -1px;
      left: 2px;
      font-size: 11px;
      color: #fff;
      font-weight: 700;
    }

    .forgot-link {
      font-size: 13px;
      color: var(--gold);
      text-decoration: none;
      transition: color 0.3s;
    }

    .forgot-link:hover { color: var(--gold-light); text-decoration: none; }

    /* Submit button */
    .btn-signin {
      width: 100%;
      padding: 14px;
      background: var(--btn-bg);
      border: none;
      border-radius: 12px;
      font-family: 'Inter', sans-serif;
      font-size: 14px;
      font-weight: 600;
      color: #fff;
      letter-spacing: 0.5px;
      cursor: pointer;
      position: relative;
      overflow: hidden;
      transition: all 0.3s;
      box-shadow: 0 4px 20px rgba(201,146,42,0.35);
    }

    .btn-signin::before {
      content: '';
      position: absolute;
      top: 0; left: -100%;
      width: 100%; height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.15), transparent);
      transition: left 0.5s;
    }

    .btn-signin:hover {
      background: var(--btn-hover);
      box-shadow: 0 6px 28px rgba(201,146,42,0.5);
      transform: translateY(-1px);
    }

    .btn-signin:hover::before { left: 100%; }
    .btn-signin:active { transform: translateY(0); }

    .btn-signin i { margin-right: 8px; }

    /* Divider */
    .divider {
      display: flex;
      align-items: center;
      gap: 12px;
      margin: 22px 0 0;
      color: var(--text-sub);
      font-size: 11px;
      letter-spacing: 0.5px;
    }

    .divider::before, .divider::after {
      content: '';
      flex: 1;
      height: 1px;
      background: var(--divider);
    }

    /* Category pills */
    .category-pills {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin-top: 14px;
    }

    .pill {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      background: rgba(201,146,42,0.08);
      border: 1px solid rgba(201,146,42,0.18);
      border-radius: 50px;
      padding: 5px 12px;
      font-size: 11px;
      font-weight: 500;
      color: var(--text-sub);
      transition: all 0.3s;
    }

    .pill i { color: var(--gold); font-size: 10px; }

    /* Version + footer */
    .card-footer-info {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: 20px;
      padding-top: 16px;
      border-top: 1px solid var(--divider);
    }

    .version-text {
      font-size: 11px;
      color: var(--text-sub);
      letter-spacing: 0.3px;
    }

    /* Footer */
    .page-footer {
      margin-top: 24px;
      text-align: center;
    }

    .footer-link {
      font-size: 12px;
      color: var(--text-sub);
      text-decoration: none;
      transition: color 0.3s;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }

    .footer-link:hover { color: var(--gold); text-decoration: none; }
    .footer-link i { color: #25D366; font-size: 14px; }

    /* Demo panel */
    .demo-box {
      width: 100%;
      max-width: 400px;
      margin-top: 16px;
      background: var(--card-bg);
      border: 1px dashed var(--card-border);
      border-radius: 14px;
      padding: 20px 24px;
      backdrop-filter: blur(12px);
      animation: fadeSlideUp 0.8s 0.4s both;
      position: relative;
      z-index: 1;
    }

    .demo-box label {
      font-size: 12px;
      font-weight: 600;
      color: var(--gold);
      letter-spacing: 1px;
      text-transform: uppercase;
      display: block;
      margin-bottom: 12px;
    }

    .demo-table { width: 100%; border-collapse: collapse; }
    .demo-table td {
      padding: 7px 8px;
      font-size: 13px;
      color: var(--text-main);
      border-bottom: 1px solid var(--divider);
    }
    .demo-table tr:last-child td { border-bottom: none; }
    .demo-table td:nth-child(2) { color: var(--text-sub); }

    .btn-demo {
      background: rgba(201,146,42,0.15);
      border: 1px solid var(--gold);
      border-radius: 6px;
      color: var(--gold-light);
      font-size: 11px;
      font-weight: 600;
      padding: 4px 12px;
      cursor: pointer;
      transition: all 0.2s;
      font-family: 'Inter', sans-serif;
    }

    .btn-demo:hover {
      background: var(--gold);
      color: #fff;
    }

    /* ============================================================
       ANIMATIONS
    ============================================================ */
    @keyframes fadeSlideUp {
      from { opacity: 0; transform: translateY(24px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to   { opacity: 1; }
    }

    @keyframes floatAnim {
      0%, 100% { transform: translateY(0); }
      50%       { transform: translateY(-6px); }
    }

    @keyframes pulseGlow {
      0%, 100% { opacity: 0.7; transform: translate(-50%,-50%) scale(1); }
      50%       { opacity: 1;   transform: translate(-50%,-50%) scale(1.12); }
    }

    /* ============================================================
       UTILITY
    ============================================================ */
    a { text-decoration: none; }

    /* Override Bootstrap defaults that bleed through */
    .form-control { box-shadow: none !important; }
  </style>
</head>
<body>

<?php
  $logo = $this->db->query("select logo from db_sitesettings")->row()->logo;
?>

<div class="auth-wrapper">

  <!-- ============================================================
       LEFT — FASHION SHOWCASE PANEL
  ============================================================ -->
  <div class="fashion-panel" id="fashionPanel">
    <div class="slide-track" id="slideTrack">
      <div class="slide"></div>
      <div class="slide"></div>
      <div class="slide"></div>
      <div class="slide"></div>
    </div>

    <!-- Floating category tags -->
    <div class="float-tags">
      <div class="float-tag"><i class="fas fa-tshirt"></i> Clothing</div>
      <div class="float-tag" style="animation-delay:1.2s"><i class="fas fa-gem"></i> Jewelry &amp; Accessories</div>
      <div class="float-tag" style="animation-delay:2.4s"><i class="fas fa-shopping-bag"></i> Bags &amp; Shoes</div>
    </div>

    <!-- Bottom content -->
    <div class="fashion-content">
      <div class="brand-tag">
        <i class="fas fa-star"></i> Dua Fashion Store
      </div>
      <h1 class="fashion-headline">
        Africa's <em>Finest</em><br>Fashion Retail
      </h1>
      <p class="fashion-sub">
        Manage your premium fashion inventory, sales &amp; customers — all from one elegant dashboard.
      </p>
      <div class="slide-dots" id="slideDots">
        <div class="dot active" data-slide="0"></div>
        <div class="dot" data-slide="1"></div>
        <div class="dot" data-slide="2"></div>
        <div class="dot" data-slide="3"></div>
      </div>
    </div>
  </div>

  <!-- ============================================================
       RIGHT — LOGIN PANEL
  ============================================================ -->
  <div class="login-panel">

    <!-- Theme toggle -->
    <button class="theme-toggle" id="themeToggle" title="Toggle theme">
      <i class="fas fa-moon" id="themeIcon"></i>
      <span id="themeLabel">Dark</span>
    </button>

    <div class="login-card">

      <!-- Brand header -->
      <div class="brand-header">
        <div class="brand-logo-wrap">
          <?php if(!empty($logo) && file_exists(FCPATH.'uploads/'.$logo)): ?>
            <img src="<?= $base_url ?>uploads/<?= $logo ?>" alt="<?php print $SITE_TITLE; ?>">
          <?php else: ?>
            <span class="brand-logo-placeholder">D</span>
          <?php endif; ?>
        </div>
        <div class="brand-name"><?php print $SITE_TITLE; ?></div>
        <div class="brand-tagline">Fashion Retail Management System</div>
      </div>

      <!-- Glass card with form -->
      <div class="glass-card">
        <div class="card-title">Welcome Back</div>
        <div class="card-sub">Sign in to your admin account</div>

        <!-- Flash messages -->
        <?php $err = $this->session->flashdata('failed'); ?>
        <?php if(!empty($err)): ?>
          <div class="flash-error">
            <i class="fas fa-exclamation-circle"></i> <?= $err ?>
          </div>
        <?php endif; ?>

        <?php $ok = $this->session->flashdata('success'); ?>
        <?php if(!empty($ok)): ?>
          <div class="flash-success">
            <i class="fas fa-check-circle"></i> <?= $ok ?>
          </div>
        <?php endif; ?>

        <!-- LOGIN FORM — action/method/CSRF unchanged -->
        <form action="<?php echo $base_url; ?>login/verify" method="post" id="login">
          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                 value="<?php echo $this->security->get_csrf_hash(); ?>">

          <div class="field-group">
            <label class="field-label" for="username">Username</label>
            <div class="field-wrap">
              <i class="fas fa-user"></i>
              <input type="text" class="field-input" id="username" name="username"
                     placeholder="Enter your username" autofocus autocomplete="username">
            </div>
          </div>

          <div class="field-group">
            <label class="field-label" for="pass">Password</label>
            <div class="field-wrap">
              <i class="fas fa-lock"></i>
              <input type="password" class="field-input" id="pass" name="pass"
                     placeholder="Enter your password" autocomplete="current-password">
              <button type="button" class="pw-toggle" id="pwToggle" tabindex="-1">
                <i class="fas fa-eye" id="pwIcon"></i>
              </button>
            </div>
          </div>

          <div class="remember-row">
            <label class="remember-label">
              <input type="checkbox" name="remember"> Remember me
            </label>
            <a href="<?= $base_url ?>login/forgot_password" class="forgot-link">Forgot password?</a>
          </div>

          <button type="submit" class="btn-signin">
            <i class="fas fa-sign-in-alt"></i> Sign In to Dashboard
          </button>

        </form>

        <!-- Category pills (decorative, non-interactive) -->
        <div class="divider">What we manage</div>
        <div class="category-pills">
          <span class="pill"><i class="fas fa-tshirt"></i> Clothing</span>
          <span class="pill"><i class="fas fa-shoe-prints"></i> Shoes</span>
          <span class="pill"><i class="fas fa-gem"></i> Jewelry</span>
          <span class="pill"><i class="fas fa-shopping-bag"></i> Bags</span>
          <span class="pill"><i class="fas fa-glasses"></i> Accessories</span>
        </div>

        <div class="card-footer-info">
          <span class="version-text">v<?= app_version(); ?></span>
          <span class="version-text">DuaFashion.store</span>
        </div>
      </div>

      <!-- Footer -->
      <div class="page-footer">
        <a href="https://wa.me/2348160327173" target="_blank" rel="noopener" class="footer-link">
          <i class="fab fa-whatsapp"></i> Powered By Intellisense Vivid Technologies
        </a>
      </div>

    </div><!-- /.login-card -->

  </div><!-- /.login-panel -->

</div><!-- /.auth-wrapper -->


<?php if(demo_app()): ?>
<div style="display:flex;justify-content:flex-end;padding:0 40px 32px;position:relative;z-index:5;" id="demoWrap">
  <div class="demo-box" style="max-width:340px;margin:0 auto;">
    <label><i class="fas fa-flask" style="margin-right:6px;"></i>Demo Credentials — Click to Apply</label>
    <table class="demo-table">
      <tr>
        <td>admin</td>
        <td>123456</td>
        <td><button class="btn-demo admin">Apply</button></td>
      </tr>
      <tr>
        <td>Sales</td>
        <td>123456</td>
        <td><button class="btn-demo sales">Apply</button></td>
      </tr>
      <tr>
        <td>Purchase</td>
        <td>123456</td>
        <td><button class="btn-demo purchase">Apply</button></td>
      </tr>
    </table>
    <div style="margin-top:12px;font-size:11px;color:var(--text-sub);">
      <i class="fas fa-info-circle" style="color:#f59e0b;"></i>
      Some features are disabled in demo &amp; reset every hour.
    </div>
  </div>
</div>
<?php endif; ?>


<!-- jQuery (kept for compatibility) -->
<script src="<?php echo $theme_link; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo $theme_link; ?>bootstrap/js/bootstrap.min.js"></script>

<script>
/* ── CSRF setup ──────────────────────────────────────────── */
$(function($) {
  $.ajaxSetup({ data: { '<?php echo $this->security->get_csrf_token_name(); ?>':
                         '<?php echo $this->security->get_csrf_hash(); ?>' } });
});

/* ── Demo buttons ───────────────────────────────────────── */
<?php if(demo_app()): ?>
$(".admin").on("click",   function(){ $("#username").val("admin");    $("#pass").val("123456"); $("#login").submit(); });
$(".sales").on("click",   function(){ $("#username").val("Sales");    $("#pass").val("123456"); $("#login").submit(); });
$(".purchase").on("click",function(){ $("#username").val("Purchase"); $("#pass").val("123456"); $("#login").submit(); });
<?php endif; ?>

/* ── Password toggle ─────────────────────────────────────── */
document.getElementById('pwToggle').addEventListener('click', function() {
  var inp  = document.getElementById('pass');
  var icon = document.getElementById('pwIcon');
  if (inp.type === 'password') {
    inp.type  = 'text';
    icon.className = 'fas fa-eye-slash';
  } else {
    inp.type  = 'password';
    icon.className = 'fas fa-eye';
  }
});

/* ── Dark / Light toggle ─────────────────────────────────── */
(function() {
  var saved = localStorage.getItem('dua_theme') || 'dark';
  applyTheme(saved);

  document.getElementById('themeToggle').addEventListener('click', function() {
    var current = document.documentElement.getAttribute('data-theme');
    var next    = current === 'dark' ? 'light' : 'dark';
    applyTheme(next);
    localStorage.setItem('dua_theme', next);
  });

  function applyTheme(t) {
    document.documentElement.setAttribute('data-theme', t);
    var icon  = document.getElementById('themeIcon');
    var label = document.getElementById('themeLabel');
    if (t === 'dark') {
      icon.className  = 'fas fa-moon';
      label.textContent = 'Dark';
    } else {
      icon.className  = 'fas fa-sun';
      label.textContent = 'Light';
    }
  }
})();

/* ── Fashion Slideshow ───────────────────────────────────── */
(function() {
  var track  = document.getElementById('slideTrack');
  var dots   = document.querySelectorAll('.dot');
  var total  = 4;
  var current = 0;
  var interval;

  if (!track) return;

  function goTo(n) {
    current = (n + total) % total;
    track.style.transform = 'translateX(-' + (current * 100) + '%)';
    dots.forEach(function(d, i) {
      d.classList.toggle('active', i === current);
    });
  }

  function next() { goTo(current + 1); }

  dots.forEach(function(d) {
    d.addEventListener('click', function() {
      goTo(parseInt(this.getAttribute('data-slide')));
      clearInterval(interval);
      interval = setInterval(next, 5000);
    });
  });

  interval = setInterval(next, 5000);
})();

/* ── Button loading state ────────────────────────────────── */
document.getElementById('login').addEventListener('submit', function() {
  var btn = this.querySelector('.btn-signin');
  btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Signing in…';
  btn.disabled = true;
});
</script>

</body>
</html>
