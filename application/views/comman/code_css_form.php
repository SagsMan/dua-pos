  <meta charset="UTF-8">
<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $page_title;?></title>

  <!-- ═══ FAVICON & TOUCH ICONS ═══════════════════════════════ -->
  <link rel="icon"             type="image/x-icon"  href="<?php echo $theme_link; ?>images/favicon.ico" />
  <link rel="shortcut icon"    type="image/x-icon"  href="<?php echo $theme_link; ?>images/favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180"      href="<?php echo $theme_link; ?>images/favicon.ico" />

  <!-- ═══ OPEN GRAPH — WhatsApp / Facebook / LinkedIn ════════ -->
  <meta property="og:type"        content="website" />
  <meta property="og:site_name"   content="Dua Fashion" />
  <meta property="og:title"       content="<?= isset($page_title) ? htmlspecialchars($page_title) : 'Dua Fashion'; ?> — DuaFashion.store" />
  <meta property="og:description" content="Africa's finest fashion retail management system. Clothing, shoes, jewelry, bags &amp; accessories — all in one place." />
  <meta property="og:url"         content="https://pos.duafashion.store" />
  <meta property="og:image"       content="https://pos.duafashion.store/theme/images/dua-logo.jpeg" />
  <meta property="og:image:width"  content="540" />
  <meta property="og:image:height" content="1140" />
  <meta property="og:image:alt"   content="Dua Fashion — Premium African Fashion Retail" />
  <meta property="og:locale"      content="en_NG" />

  <!-- ═══ TWITTER CARD ════════════════════════════════════════ -->
  <meta name="twitter:card"        content="summary" />
  <meta name="twitter:title"       content="Dua Fashion — Premium Fashion Retail POS" />
  <meta name="twitter:description" content="Africa's finest fashion retail management system. Clothing, shoes, jewelry, bags &amp; accessories." />
  <meta name="twitter:image"       content="https://pos.duafashion.store/theme/images/dua-logo.jpeg" />

  <!-- ═══ GENERAL SEO ═════════════════════════════════════════ -->
  <meta name="description"  content="Dua Fashion POS — Africa's premium fashion retail management system. Manage clothing, shoes, jewelry, bags &amp; accessories at DuaFashion.store" />
  <meta name="author"       content="Intellisense Vivid Technologies" />
  <meta name="robots"       content="noindex, nofollow" />
  <meta name="theme-color"  content="#C9922A" />

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>css/font-awesome-4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>css/ionicons-2.0.1/css/ionicons.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo $theme_link; ?>dist/css/skins/_all-skins.min.css">
  <!-- bootstrap date-range-picker -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>plugins/datepicker/datepicker3.css">
  <!--Toastr notification -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>toastr/toastr.css">
  <!--Custom Css File-->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>dist/css/custom.css">
  <!-- Autocomplete -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>plugins/autocomplete/autocomplete.css">
  <!-- Pace Loader -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>plugins/pace/pace.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>plugins/iCheck/square/orange.css">
  <?php 
      $lang = trim(strtoupper($this->session->userdata('language')));
      if($lang==strtoupper('arabic') || $lang==strtoupper('urdu')) {?>
  <!-- RTL For arabic styles -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>bootstrap/css/bootstrap.rtl.min.css">
  <link rel="stylesheet" href="<?php echo $theme_link; ?>dist/css/AdminLTE.rtl.min.css">
  <?php } ?>
  <!-- Theme color finder -->
  <script type="text/javascript">
  var theme_skin = (typeof (Storage) !== "undefined") ? localStorage.getItem('skin') : 'skin-blue';
  theme_skin = (theme_skin=='' || theme_skin==null) ? 'skin-blue' : theme_skin;
  var sidebar_collapse = (typeof (Storage) !== "undefined") ? localStorage.getItem('collapse') : 'skin-blue';
  </script>
  <!-- jQuery 2.2.3 -->
  <script src="<?php echo $theme_link; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>