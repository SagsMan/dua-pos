<?php
require_once 'config.php';
$db = db();

// Load store info
$site    = $db->query("SELECT site_name, logo FROM db_sitesettings LIMIT 1")->fetch_assoc();
$company = $db->query("SELECT company_name, mobile, phone, address, company_logo FROM db_company LIMIT 1")->fetch_assoc();

$site_name = $site['site_name'] ?? "DU'A Fashion";
$whatsapp  = preg_replace('/\D/', '', $company['mobile'] ?? '2348160327173');

$logo = !empty($site['logo'])
    ? POS_BASE . '/uploads/' . $site['logo']
    : POS_BASE . '/theme/images/dua-logo.jpeg';

$company_logo = !empty($company['company_logo'])
    ? POS_BASE . '/uploads/company/' . $company['company_logo']
    : $logo;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title><?= htmlspecialchars($site_name) ?> — Modesty Redefined</title>
<meta name="description" content="Shop the finest modest fashion at <?= htmlspecialchars($site_name) ?>. Elegance, quality and style."/>
<link rel="icon" href="<?= $logo ?>" type="image/jpeg"/>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com"/>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet"/>

<style>
:root {
  --gold:    #C9922A;
  --gold-lt: #E8C06A;
  --cream:   #FAF7F2;
  --dark:    #1A1208;
  --mid:     #3D2E18;
  --muted:   #7A6652;
  --border:  #E8DDD0;
  --white:   #FFFFFF;
  --shadow:  0 8px 40px rgba(26,18,8,.10);
  --radius:  16px;
}

*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{font-family:'Inter',sans-serif;background:var(--cream);color:var(--dark);line-height:1.6;overflow-x:hidden}

/* ── NAVBAR ─────────────────────────────────────────── */
.navbar{
  position:fixed;top:0;left:0;right:0;z-index:999;
  padding:0 5%;
  display:flex;align-items:center;justify-content:space-between;
  height:72px;
  background:rgba(250,247,242,.92);
  backdrop-filter:blur(18px);
  border-bottom:1px solid var(--border);
  transition:box-shadow .3s;
}
.navbar.scrolled{box-shadow:0 4px 24px rgba(26,18,8,.08)}
.nav-brand{display:flex;align-items:center;gap:12px;text-decoration:none}
.nav-brand img{height:42px;width:42px;object-fit:contain;border-radius:50%;border:2px solid var(--gold)}
.nav-brand-name{font-family:'Cormorant Garamond',serif;font-size:1.4rem;font-weight:600;color:var(--dark);letter-spacing:.02em}
.nav-search{
  flex:1;max-width:380px;margin:0 32px;
  display:flex;align-items:center;
  background:var(--white);border:1.5px solid var(--border);border-radius:50px;
  padding:0 18px;gap:10px;
  transition:border-color .2s,box-shadow .2s;
}
.nav-search:focus-within{border-color:var(--gold);box-shadow:0 0 0 3px rgba(201,146,42,.12)}
.nav-search input{
  flex:1;border:none;outline:none;background:transparent;
  font-size:.9rem;font-family:'Inter',sans-serif;color:var(--dark);padding:10px 0;
}
.nav-search input::placeholder{color:var(--muted)}
.nav-search svg{width:16px;height:16px;color:var(--muted);flex-shrink:0}
.nav-wa{
  display:flex;align-items:center;gap:8px;
  background:var(--gold);color:var(--white);
  border-radius:50px;padding:9px 20px;
  font-size:.85rem;font-weight:500;text-decoration:none;
  transition:background .2s,transform .15s;white-space:nowrap;
}
.nav-wa:hover{background:var(--mid);transform:translateY(-1px)}
.nav-wa svg{width:18px;height:18px}

/* ── HERO ────────────────────────────────────────────── */
.hero{
  margin-top:72px;
  min-height:92vh;
  background:linear-gradient(135deg,var(--dark) 0%,var(--mid) 60%,#5C4020 100%);
  display:flex;align-items:center;justify-content:center;
  text-align:center;padding:80px 5%;
  position:relative;overflow:hidden;
}
.hero::before{
  content:'';position:absolute;inset:0;
  background:url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23C9922A' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.hero-inner{position:relative;z-index:1;max-width:700px}
.hero-logo{
  width:120px;height:120px;object-fit:contain;border-radius:50%;
  border:3px solid var(--gold);
  box-shadow:0 0 0 8px rgba(201,146,42,.15);
  margin-bottom:28px;animation:fadeDown .8s ease both;
}
.hero-title{
  font-family:'Cormorant Garamond',serif;
  font-size:clamp(2.8rem,6vw,5rem);
  font-weight:300;color:var(--white);
  letter-spacing:.04em;line-height:1.15;
  animation:fadeUp .8s .15s ease both;
}
.hero-title span{color:var(--gold-lt);font-style:italic}
.hero-tagline{
  font-size:1rem;font-weight:300;color:rgba(255,255,255,.65);
  letter-spacing:.18em;text-transform:uppercase;margin-top:16px;
  animation:fadeUp .8s .3s ease both;
}
.hero-cta{
  margin-top:44px;animation:fadeUp .8s .45s ease both;
  display:flex;gap:16px;justify-content:center;flex-wrap:wrap;
}
.btn-primary{
  background:var(--gold);color:var(--white);
  border:none;border-radius:50px;padding:15px 40px;
  font-size:.95rem;font-weight:500;cursor:pointer;
  font-family:'Inter',sans-serif;letter-spacing:.04em;
  transition:background .2s,transform .15s,box-shadow .2s;
  box-shadow:0 4px 24px rgba(201,146,42,.4);
}
.btn-primary:hover{background:#B5811F;transform:translateY(-2px);box-shadow:0 8px 32px rgba(201,146,42,.45)}
.btn-outline{
  background:transparent;color:var(--white);
  border:1.5px solid rgba(255,255,255,.35);border-radius:50px;padding:15px 40px;
  font-size:.95rem;font-weight:400;cursor:pointer;
  font-family:'Inter',sans-serif;letter-spacing:.04em;
  transition:border-color .2s,background .2s,transform .15s;
}
.btn-outline:hover{border-color:var(--gold);background:rgba(201,146,42,.1);transform:translateY(-2px)}
.scroll-hint{
  position:absolute;bottom:32px;left:50%;transform:translateX(-50%);
  display:flex;flex-direction:column;align-items:center;gap:6px;
  color:rgba(255,255,255,.4);font-size:.75rem;letter-spacing:.12em;text-transform:uppercase;
  animation:fadeUp 1s 1s ease both;
}
.scroll-hint span{display:block;width:1px;height:40px;background:linear-gradient(to bottom,rgba(201,146,42,.8),transparent)}

/* ── STORE SECTION ───────────────────────────────────── */
.store{padding:80px 5%}
.section-header{text-align:center;margin-bottom:52px}
.section-label{
  font-size:.75rem;letter-spacing:.2em;text-transform:uppercase;
  color:var(--gold);font-weight:500;margin-bottom:12px;display:block;
}
.section-title{
  font-family:'Cormorant Garamond',serif;
  font-size:clamp(2rem,4vw,3rem);font-weight:400;color:var(--dark);
}

/* ── CATEGORY TABS ───────────────────────────────────── */
.category-bar{
  display:flex;gap:10px;overflow-x:auto;padding-bottom:8px;
  scrollbar-width:none;justify-content:center;flex-wrap:wrap;
  margin-bottom:48px;
}
.category-bar::-webkit-scrollbar{display:none}
.cat-btn{
  flex-shrink:0;border:1.5px solid var(--border);background:var(--white);
  color:var(--muted);border-radius:50px;padding:9px 22px;
  font-size:.85rem;font-weight:500;cursor:pointer;
  font-family:'Inter',sans-serif;
  transition:all .2s;white-space:nowrap;
}
.cat-btn:hover{border-color:var(--gold);color:var(--gold)}
.cat-btn.active{background:var(--gold);border-color:var(--gold);color:var(--white)}
.cat-count{
  display:inline-flex;align-items:center;justify-content:center;
  background:rgba(255,255,255,.25);width:20px;height:20px;
  border-radius:50%;font-size:.72rem;margin-left:6px;
}
.cat-btn:not(.active) .cat-count{background:var(--border);color:var(--muted)}

/* ── PRODUCT GRID ────────────────────────────────────── */
.product-grid{
  display:grid;
  grid-template-columns:repeat(auto-fill,minmax(260px,1fr));
  gap:28px;
}
.product-card{
  background:var(--white);border-radius:var(--radius);
  overflow:hidden;box-shadow:0 2px 16px rgba(26,18,8,.06);
  transition:transform .3s,box-shadow .3s;cursor:default;
  animation:fadeUp .5s ease both;
}
.product-card:hover{transform:translateY(-6px);box-shadow:0 16px 48px rgba(26,18,8,.14)}
.product-img-wrap{
  position:relative;width:100%;padding-top:120%;
  overflow:hidden;background:var(--cream);
}
.product-img-wrap img{
  position:absolute;inset:0;width:100%;height:100%;
  object-fit:cover;transition:transform .5s;
}
.product-card:hover .product-img-wrap img{transform:scale(1.06)}
.product-badge{
  position:absolute;top:12px;left:12px;
  background:var(--gold);color:var(--white);
  font-size:.7rem;font-weight:600;letter-spacing:.08em;text-transform:uppercase;
  padding:4px 10px;border-radius:50px;
}
.out-badge{background:#8B7355}
.product-info{padding:18px 20px 20px}
.product-category{
  font-size:.72rem;letter-spacing:.14em;text-transform:uppercase;
  color:var(--gold);font-weight:500;margin-bottom:6px;
}
.product-name{
  font-family:'Cormorant Garamond',serif;
  font-size:1.18rem;font-weight:500;color:var(--dark);
  line-height:1.3;margin-bottom:10px;
}
.product-footer{
  display:flex;align-items:center;justify-content:space-between;
  margin-top:14px;padding-top:14px;
  border-top:1px solid var(--border);
}
.product-price{
  font-size:1.15rem;font-weight:600;color:var(--dark);
  font-family:'Cormorant Garamond',serif;
}
.product-wa{
  display:flex;align-items:center;gap:6px;
  background:rgba(37,211,102,.1);color:#128C7E;
  border:1px solid rgba(37,211,102,.25);
  border-radius:50px;padding:7px 14px;
  font-size:.8rem;font-weight:500;text-decoration:none;
  transition:background .2s,transform .15s;
}
.product-wa:hover{background:rgba(37,211,102,.2);transform:scale(1.03)}
.product-wa svg{width:15px;height:15px}

/* ── LOADING / EMPTY ─────────────────────────────────── */
.grid-loader{
  grid-column:1/-1;display:flex;justify-content:center;padding:60px;
}
.spinner{
  width:42px;height:42px;border:3px solid var(--border);
  border-top-color:var(--gold);border-radius:50%;
  animation:spin .7s linear infinite;
}
.empty-state{
  grid-column:1/-1;text-align:center;padding:80px 20px;
  font-family:'Cormorant Garamond',serif;
  font-size:1.5rem;color:var(--muted);
}

/* ── PAGINATION ──────────────────────────────────────── */
.pagination{
  display:flex;justify-content:center;gap:8px;margin-top:56px;flex-wrap:wrap;
}
.page-btn{
  width:42px;height:42px;border-radius:50%;border:1.5px solid var(--border);
  background:var(--white);color:var(--muted);cursor:pointer;
  font-size:.9rem;font-family:'Inter',sans-serif;
  transition:all .2s;display:flex;align-items:center;justify-content:center;
}
.page-btn:hover{border-color:var(--gold);color:var(--gold)}
.page-btn.active{background:var(--gold);border-color:var(--gold);color:var(--white)}
.page-btn:disabled{opacity:.35;cursor:default}

/* ── STATS STRIP ─────────────────────────────────────── */
.stats-strip{
  background:var(--dark);padding:52px 5%;
  display:grid;grid-template-columns:repeat(auto-fit,minmax(160px,1fr));
  gap:32px;text-align:center;
}
.stat-val{
  font-family:'Cormorant Garamond',serif;
  font-size:2.8rem;font-weight:300;color:var(--gold-lt);
}
.stat-label{
  font-size:.8rem;letter-spacing:.15em;text-transform:uppercase;
  color:rgba(255,255,255,.5);margin-top:6px;
}

/* ── ABOUT STRIP ─────────────────────────────────────── */
.about-strip{
  background:linear-gradient(135deg,#F5EDE0 0%,var(--cream) 100%);
  padding:80px 5%;display:flex;align-items:center;gap:60px;flex-wrap:wrap;
}
.about-img{
  width:200px;height:200px;border-radius:50%;
  object-fit:contain;border:4px solid var(--gold);
  box-shadow:0 0 0 12px rgba(201,146,42,.1);flex-shrink:0;
}
.about-text .section-title{text-align:left;margin-bottom:12px}
.about-text p{color:var(--muted);max-width:520px;font-weight:300;line-height:1.8}
.about-contact{margin-top:24px;display:flex;gap:16px;flex-wrap:wrap}
.contact-chip{
  display:flex;align-items:center;gap:8px;
  background:var(--white);border:1.5px solid var(--border);
  border-radius:50px;padding:10px 20px;
  font-size:.85rem;color:var(--dark);text-decoration:none;
  transition:border-color .2s,transform .15s;
}
.contact-chip:hover{border-color:var(--gold);transform:translateY(-1px)}
.contact-chip svg{color:var(--gold);width:16px;height:16px}

/* ── FLOATING WA ─────────────────────────────────────── */
.float-wa{
  position:fixed;bottom:28px;right:28px;z-index:998;
  width:58px;height:58px;border-radius:50%;
  background:#25D366;
  display:flex;align-items:center;justify-content:center;
  box-shadow:0 6px 24px rgba(37,211,102,.45);
  text-decoration:none;transition:transform .2s,box-shadow .2s;
  animation:pulse 2.5s ease infinite;
}
.float-wa:hover{transform:scale(1.1);box-shadow:0 10px 32px rgba(37,211,102,.55);animation:none}
.float-wa svg{width:30px;height:30px;fill:white}
.float-wa-tip{
  position:absolute;right:68px;background:var(--dark);
  color:var(--white);font-size:.8rem;padding:7px 14px;border-radius:8px;
  white-space:nowrap;opacity:0;pointer-events:none;
  transition:opacity .2s;
}
.float-wa-tip::after{
  content:'';position:absolute;left:100%;top:50%;transform:translateY(-50%);
  border:6px solid transparent;border-left-color:var(--dark);
}
.float-wa:hover .float-wa-tip{opacity:1}

/* ── FOOTER ──────────────────────────────────────────── */
footer{
  background:var(--dark);color:rgba(255,255,255,.45);
  text-align:center;padding:36px 5%;
  font-size:.82rem;line-height:1.9;
}
footer a{color:var(--gold);text-decoration:none}
footer a:hover{text-decoration:underline}
footer .footer-logo{
  width:52px;height:52px;border-radius:50%;object-fit:contain;
  border:2px solid rgba(201,146,42,.4);margin-bottom:16px;
}
footer .footer-brand{
  font-family:'Cormorant Garamond',serif;
  font-size:1.3rem;color:rgba(255,255,255,.8);
  margin-bottom:6px;font-weight:400;
}

/* ── ANIMATIONS ──────────────────────────────────────── */
@keyframes fadeUp{from{opacity:0;transform:translateY(24px)}to{opacity:1;transform:translateY(0)}}
@keyframes fadeDown{from{opacity:0;transform:translateY(-24px)}to{opacity:1;transform:translateY(0)}}
@keyframes spin{to{transform:rotate(360deg)}}
@keyframes pulse{0%,100%{box-shadow:0 6px 24px rgba(37,211,102,.45)}50%{box-shadow:0 6px 32px rgba(37,211,102,.75)}}

/* ── RESPONSIVE ──────────────────────────────────────── */
@media(max-width:768px){
  .nav-search{display:none}
  .nav-wa span{display:none}
  .nav-wa{padding:9px 14px}
  .about-strip{flex-direction:column;align-items:flex-start}
  .about-img{width:120px;height:120px}
  .product-grid{grid-template-columns:repeat(auto-fill,minmax(160px,1fr));gap:16px}
  .store{padding:60px 4%}
}
@media(max-width:480px){
  .product-grid{grid-template-columns:1fr 1fr;gap:12px}
  .product-info{padding:12px 14px 14px}
  .hero{min-height:80vh}
}
</style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar" id="navbar">
  <a href="#" class="nav-brand">
    <img src="<?= $logo ?>" alt="<?= htmlspecialchars($site_name) ?>"/>
    <span class="nav-brand-name"><?= htmlspecialchars($site_name) ?></span>
  </a>
  <div class="nav-search">
    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
    <input type="text" id="search-input" placeholder="Search products…" autocomplete="off"/>
  </div>
  <a href="https://wa.me/<?= $whatsapp ?>" target="_blank" rel="noopener" class="nav-wa">
    <svg fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
    <span>WhatsApp</span>
  </a>
</nav>

<!-- HERO -->
<section class="hero" id="home">
  <div class="hero-inner">
    <img src="<?= $company_logo ?>" alt="<?= htmlspecialchars($site_name) ?>" class="hero-logo"/>
    <h1 class="hero-title"><?= htmlspecialchars($site_name) ?><br/><span>Modesty Redefined</span></h1>
    <p class="hero-tagline">Elegance &nbsp;·&nbsp; Quality &nbsp;·&nbsp; Style</p>
    <div class="hero-cta">
      <button class="btn-primary" onclick="document.getElementById('shop').scrollIntoView({behavior:'smooth'})">Shop Collection</button>
      <a href="https://wa.me/<?= $whatsapp ?>" target="_blank" rel="noopener" class="btn-outline">Contact Us</a>
    </div>
  </div>
  <div class="scroll-hint" aria-hidden="true"><span></span></div>
</section>

<!-- STATS -->
<div class="stats-strip" id="stats">
  <div><div class="stat-val" id="stat-products">—</div><div class="stat-label">Products</div></div>
  <div><div class="stat-val" id="stat-categories">—</div><div class="stat-label">Categories</div></div>
  <div><div class="stat-val">100%</div><div class="stat-label">Modest Fashion</div></div>
  <div><div class="stat-val">NG</div><div class="stat-label">Serving Nigeria</div></div>
</div>

<!-- SHOP -->
<section class="store" id="shop">
  <div class="section-header">
    <span class="section-label">Our Collection</span>
    <h2 class="section-title">Discover Every Piece</h2>
  </div>

  <div class="category-bar" id="category-bar">
    <button class="cat-btn active" data-id="0">All Items</button>
  </div>

  <div class="product-grid" id="product-grid">
    <div class="grid-loader"><div class="spinner"></div></div>
  </div>

  <div class="pagination" id="pagination"></div>
</section>

<!-- ABOUT -->
<section class="about-strip">
  <img src="<?= $company_logo ?>" alt="<?= htmlspecialchars($site_name) ?>" class="about-img"/>
  <div class="about-text">
    <span class="section-label">Our Story</span>
    <h2 class="section-title"><?= htmlspecialchars($site_name) ?></h2>
    <p>We are dedicated to bringing you the finest in modest fashion — carefully curated pieces that celebrate elegance, culture, and modern style. Every item in our collection is selected with love and quality in mind.</p>
    <div class="about-contact">
      <a href="https://wa.me/<?= $whatsapp ?>" target="_blank" rel="noopener" class="contact-chip">
        <svg fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        +<?= $whatsapp ?>
      </a>
    </div>
  </div>
</section>

<!-- FLOATING WHATSAPP -->
<a href="https://wa.me/<?= $whatsapp ?>" target="_blank" rel="noopener" class="float-wa" aria-label="Chat on WhatsApp">
  <span class="float-wa-tip">Chat with us</span>
  <svg viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
</a>

<!-- FOOTER -->
<footer>
  <img src="<?= $logo ?>" alt="logo" class="footer-logo"/>
  <div class="footer-brand"><?= htmlspecialchars($site_name) ?></div>
  <div>Modesty Redefined &nbsp;·&nbsp; Nigeria</div>
  <div style="margin-top:12px">
    &copy; <?= date('Y') ?> <?= htmlspecialchars($site_name) ?>. All rights reserved.
  </div>
  <div style="margin-top:8px">
    Designed &amp; Developed by <a href="https://wa.me/2348160327173" target="_blank" rel="noopener">Intellisense Vivid Technologies</a>
  </div>
</footer>

<script>
const WA = '<?= $whatsapp ?>';
let currentCategory = 0;
let currentPage = 1;
let searchTimer;
let totalProducts = 0;
let totalCategories = 0;

// Navbar scroll effect
window.addEventListener('scroll', () => {
  document.getElementById('navbar').classList.toggle('scrolled', window.scrollY > 30);
});

// Load categories
async function loadCategories() {
  const res = await fetch('api/categories.php');
  const cats = await res.json();
  totalCategories = cats.length;
  document.getElementById('stat-categories').textContent = totalCategories;

  const bar = document.getElementById('category-bar');
  cats.forEach(c => {
    const btn = document.createElement('button');
    btn.className = 'cat-btn';
    btn.dataset.id = c.id;
    btn.innerHTML = c.category_name + '<span class="cat-count">' + c.product_count + '</span>';
    btn.addEventListener('click', () => selectCategory(c.id, btn));
    bar.appendChild(btn);
  });
}

function selectCategory(id, btnEl) {
  currentCategory = id;
  currentPage = 1;
  document.querySelectorAll('.cat-btn').forEach(b => b.classList.remove('active'));
  btnEl.classList.add('active');
  loadProducts();
}

// Load products
async function loadProducts() {
  const grid = document.getElementById('product-grid');
  grid.innerHTML = '<div class="grid-loader"><div class="spinner"></div></div>';

  const search = document.getElementById('search-input').value.trim();
  const url = `api/products.php?category=${currentCategory}&page=${currentPage}&search=${encodeURIComponent(search)}`;

  const res = await fetch(url);
  const data = await res.json();

  totalProducts = data.total;
  document.getElementById('stat-products').textContent = totalProducts;

  grid.innerHTML = '';

  if (data.products.length === 0) {
    grid.innerHTML = '<div class="empty-state">No products found in this category.</div>';
    document.getElementById('pagination').innerHTML = '';
    return;
  }

  data.products.forEach((p, i) => {
    const inStock = parseInt(p.stock) > 0;
    const price = parseFloat(p.final_price).toLocaleString('en-NG', {style:'currency', currency:'NGN', minimumFractionDigits:0});
    const msg = encodeURIComponent(`Hi! I'm interested in: ${p.item_name} (Code: ${p.item_code}). Is it available?`);

    const card = document.createElement('div');
    card.className = 'product-card';
    card.style.animationDelay = (i * 0.04) + 's';
    card.innerHTML = `
      <div class="product-img-wrap">
        <img src="${p.image_url}" alt="${esc(p.item_name)}" loading="lazy"
          onerror="this.src='https://pos.duafashion.store/theme/images/no_image.png'"/>
        ${inStock
          ? '<span class="product-badge">In Stock</span>'
          : '<span class="product-badge out-badge">Out of Stock</span>'}
      </div>
      <div class="product-info">
        <div class="product-category">${esc(p.category_name || '')}</div>
        <div class="product-name">${esc(p.item_name)}</div>
        <div class="product-footer">
          <span class="product-price">${price}</span>
          <a href="https://wa.me/${WA}?text=${msg}" target="_blank" rel="noopener" class="product-wa">
            <svg fill="currentColor" viewBox="0 0 24 24" width="15" height="15"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
            Enquire
          </a>
        </div>
      </div>`;
    grid.appendChild(card);
  });

  renderPagination(data.page, data.pages);
}

function renderPagination(page, pages) {
  const el = document.getElementById('pagination');
  el.innerHTML = '';
  if (pages <= 1) return;

  const prev = document.createElement('button');
  prev.className = 'page-btn';
  prev.innerHTML = '&#8592;';
  prev.disabled = page === 1;
  prev.onclick = () => { currentPage--; loadProducts(); window.scrollTo({top: document.getElementById('shop').offsetTop - 80, behavior:'smooth'}); };
  el.appendChild(prev);

  for (let i = 1; i <= pages; i++) {
    if (pages > 7 && i > 2 && i < pages - 1 && Math.abs(i - page) > 2) {
      if (i === 3 || i === pages - 2) { const dot = document.createElement('span'); dot.textContent='…'; dot.style.cssText='padding:0 6px;color:var(--muted);line-height:42px'; el.appendChild(dot); }
      continue;
    }
    const btn = document.createElement('button');
    btn.className = 'page-btn' + (i === page ? ' active' : '');
    btn.textContent = i;
    btn.onclick = ((_i) => () => { currentPage = _i; loadProducts(); window.scrollTo({top: document.getElementById('shop').offsetTop - 80, behavior:'smooth'}); })(i);
    el.appendChild(btn);
  }

  const next = document.createElement('button');
  next.className = 'page-btn';
  next.innerHTML = '&#8594;';
  next.disabled = page === pages;
  next.onclick = () => { currentPage++; loadProducts(); window.scrollTo({top: document.getElementById('shop').offsetTop - 80, behavior:'smooth'}); };
  el.appendChild(next);
}

// Search
document.getElementById('search-input').addEventListener('input', () => {
  clearTimeout(searchTimer);
  searchTimer = setTimeout(() => { currentPage = 1; loadProducts(); }, 420);
});

// Category bar "All" button
document.querySelector('.cat-btn[data-id="0"]').addEventListener('click', function() {
  selectCategory(0, this);
});

function esc(str) {
  const d = document.createElement('div');
  d.textContent = str || '';
  return d.innerHTML;
}

// Init
loadCategories();
loadProducts();
</script>
</body>
</html>
