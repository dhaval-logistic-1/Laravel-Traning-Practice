<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>AdminLTE – Fixed Navbar + Control Sidebar</title>

  <!-- AdminLTE & Bootstrap CSS (CDN) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"/>

  <style>
    /* ── Control Sidebar Slide-in ── */
    .control-sidebar {
      position: fixed;
      top: 0;
      right: -320px;
      width: 300px;
      height: 100%;
      background: #fff;
      border-left: 1px solid #dee2e6;
      z-index: 1055;
      transition: right 0.25s ease;
      overflow-y: auto;
      padding-top: 57px;
    }
    .control-sidebar.control-sidebar-open {
      right: 0;
    }

    /* Overlay behind sidebar */
    .control-sidebar-overlay {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.4);
      z-index: 1050;
    }
    .control-sidebar-overlay.show {
      display: block;
    }

    /* Close button inside sidebar */
    .cs-close-btn {
      position: absolute;
      top: 62px;
      right: 12px;
      background: none;
      border: none;
      font-size: 20px;
      cursor: pointer;
      color: #6c757d;
      line-height: 1;
      padding: 4px 8px;
    }
    .cs-close-btn:hover {
      color: #343a40;
    }

    /* Checkbox rows */
    .cs-check {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 8px;
      font-size: 14px;
      cursor: pointer;
    }

    /* Make selects full-width */
    .cs-select {
      width: 100%;
    }

    /* Dark mode support */
    body.dark-mode .control-sidebar {
      background: #343a40;
      border-color: #495057;
      color: #dee2e6;
    }
    body.dark-mode .control-sidebar h5,
    body.dark-mode .control-sidebar h6,
    body.dark-mode .control-sidebar label,
    body.dark-mode .control-sidebar span {
      color: #dee2e6;
    }
    body.dark-mode .cs-close-btn {
      color: #adb5bd;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- ═══════════════════════════════════════
       NAVBAR
  ═══════════════════════════════════════ -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Left: Sidebar toggle + links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button">
          <i class="bi bi-list"></i>
        </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right: Icons & menus -->
    <ul class="navbar-nav ml-auto">

      <!-- Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="bi bi-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search"/>
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="bi bi-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="bi bi-x"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="bi bi-chat-text"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="bi bi-star-fill"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted">
                  <i class="bi bi-clock-fill mr-1"></i> 4 Hours Ago
                </p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="bi bi-star-fill"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted">
                  <i class="bi bi-clock-fill mr-1"></i> 4 Hours Ago
                </p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="bi bi-star-fill"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted">
                  <i class="bi bi-clock-fill mr-1"></i> 4 Hours Ago
                </p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>

      <!-- Notifications Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="bi bi-bell-fill"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="bi bi-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="bi bi-people-fill mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="bi bi-file-earmark-fill mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>

      <!-- Fullscreen Toggle -->
      <li class="nav-item">
        <a class="nav-link" href="#" data-widget="fullscreen">
          <i class="bi bi-arrows-fullscreen"></i>
        </a>
      </li>

      <!-- User Menu Dropdown -->
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg"
               class="user-image img-circle elevation-2" alt="User Image"/>
          <span class="d-none d-md-inline">Alexander Pierce</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <li class="user-header bg-primary">
            <img src="https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg"
                 class="img-circle elevation-2" alt="User Image"/>
            <p>
              Alexander Pierce - Web Developer
              <small>Member since Nov. 2023</small>
            </p>
          </li>
          <li class="user-body">
            <div class="row">
              <div class="col-4 text-center"><a href="#">Followers</a></div>
              <div class="col-4 text-center"><a href="#">Sales</a></div>
              <div class="col-4 text-center"><a href="#">Friends</a></div>
            </div>
          </li>
          <li class="user-footer">
            <a href="#" class="btn btn-default btn-flat">Profile</a>
            <a href="#" class="btn btn-default btn-flat float-right">Sign out</a>
          </li>
        </ul>
      </li>

      <!-- Open Customizer Button -->
      <li class="nav-item">
        <a class="nav-link btn btn-sm btn-primary ml-2" href="#" id="open-customizer" role="button">
          <i class="bi bi-sliders mr-1"></i> Customize
        </a>
      </li>

    </ul>
  </nav>
  <!-- ═══ END NAVBAR ═══ -->


  <!-- ═══════════════════════════════════════
       LEFT SIDEBAR (standard AdminLTE)
  ═══════════════════════════════════════ -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon bi bi-house-fill"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-table"></i>
              <p>Tables</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-person-fill"></i>
              <p>Profile</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
  <!-- ═══ END LEFT SIDEBAR ═══ -->


  <!-- ═══════════════════════════════════════
       MAIN CONTENT
  ═══════════════════════════════════════ -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <h1>Dashboard</h1>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <p>Your page content goes here.</p>
      </div>
    </section>
  </div>
  <!-- ═══ END MAIN CONTENT ═══ -->


  <!-- ═══════════════════════════════════════
       FOOTER
  ═══════════════════════════════════════ -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2024 <a href="#">AdminLTE</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>


  <!-- ═══════════════════════════════════════
       OVERLAY (closes sidebar on click)
  ═══════════════════════════════════════ -->
  <div class="control-sidebar-overlay" id="cs-overlay"></div>


  <!-- ═══════════════════════════════════════
       RIGHT CONTROL SIDEBAR (FIXED)
  ═══════════════════════════════════════ -->
  <aside class="control-sidebar" id="control-sidebar">

    <!-- Close button -->
    <button class="cs-close-btn" id="close-customizer" title="Close">&times;</button>

    <div class="p-3">
      <h5>Customize AdminLTE</h5>
      <hr class="mb-2"/>

      <!-- Dark Mode -->
      <div class="mb-4">
        <label class="cs-check">
          <input type="checkbox" id="dark-mode-toggle"/> Dark Mode
        </label>
      </div>

      <!-- Header Options -->
      <h6>Header Options</h6>
      <label class="cs-check"><input type="checkbox"/> Fixed</label>
      <label class="cs-check"><input type="checkbox"/> Dropdown Legacy Offset</label>
      <label class="cs-check mb-4"><input type="checkbox"/> No border</label>

      <!-- Sidebar Options -->
      <h6>Sidebar Options</h6>
      <label class="cs-check"><input type="checkbox"/> Collapsed</label>
      <label class="cs-check"><input type="checkbox"/> Fixed</label>
      <label class="cs-check"><input type="checkbox" checked/> Sidebar Mini</label>
      <label class="cs-check"><input type="checkbox"/> Sidebar Mini MD</label>
      <label class="cs-check"><input type="checkbox"/> Sidebar Mini XS</label>
      <label class="cs-check"><input type="checkbox"/> Nav Flat Style</label>
      <label class="cs-check"><input type="checkbox"/> Nav Legacy Style</label>
      <label class="cs-check"><input type="checkbox"/> Nav Compact</label>
      <label class="cs-check"><input type="checkbox"/> Nav Child Indent</label>
      <label class="cs-check"><input type="checkbox"/> Nav Child Hide on Collapse</label>
      <label class="cs-check mb-4"><input type="checkbox"/> Disable Hover/Focus Auto-Expand</label>

      <!-- Footer Options -->
      <h6>Footer Options</h6>
      <label class="cs-check mb-4"><input type="checkbox"/> Fixed</label>

      <!-- Small Text Options -->
      <h6>Small Text Options</h6>
      <label class="cs-check"><input type="checkbox"/> Body</label>
      <label class="cs-check"><input type="checkbox"/> Navbar</label>
      <label class="cs-check"><input type="checkbox"/> Brand</label>
      <label class="cs-check"><input type="checkbox"/> Sidebar Nav</label>
      <label class="cs-check mb-4"><input type="checkbox"/> Footer</label>

      <!-- Navbar Variants -->
      <h6>Navbar Variants</h6>
      <div class="mb-3">
        <select class="custom-select cs-select" id="navbar-variant">
          <option value="navbar-white navbar-light">White (default)</option>
          <option value="navbar-primary">Primary</option>
          <option value="navbar-secondary">Secondary</option>
          <option value="navbar-info">Info</option>
          <option value="navbar-success">Success</option>
          <option value="navbar-danger">Danger</option>
          <option value="navbar-warning">Warning</option>
          <option value="navbar-dark navbar-navy">Navy</option>
          <option value="navbar-dark navbar-dark">Dark</option>
          <option value="navbar-dark navbar-indigo">Indigo</option>
          <option value="navbar-dark navbar-purple">Purple</option>
          <option value="navbar-dark navbar-pink">Pink</option>
          <option value="navbar-lightblue">Lightblue</option>
          <option value="navbar-teal">Teal</option>
          <option value="navbar-cyan">Cyan</option>
          <option value="navbar-dark navbar-gray-dark">Gray Dark</option>
          <option value="navbar-gray">Gray</option>
          <option value="navbar-orange">Orange</option>
        </select>
      </div>

      <!-- Accent Color Variants -->
      <h6>Accent Color Variants</h6>
      <div class="mb-3">
        <select class="custom-select cs-select" id="accent-variant">
          <option value="">None Selected</option>
          <option value="accent-primary">Primary</option>
          <option value="accent-warning">Warning</option>
          <option value="accent-info">Info</option>
          <option value="accent-danger">Danger</option>
          <option value="accent-success">Success</option>
          <option value="accent-indigo">Indigo</option>
          <option value="accent-lightblue">Lightblue</option>
          <option value="accent-navy">Navy</option>
          <option value="accent-purple">Purple</option>
          <option value="accent-fuchsia">Fuchsia</option>
          <option value="accent-pink">Pink</option>
          <option value="accent-maroon">Maroon</option>
          <option value="accent-orange">Orange</option>
          <option value="accent-lime">Lime</option>
          <option value="accent-teal">Teal</option>
          <option value="accent-olive">Olive</option>
        </select>
      </div>

      <!-- Dark Sidebar Variants -->
      <h6>Dark Sidebar Variants</h6>
      <div class="mb-3">
        <select class="custom-select cs-select" id="dark-sidebar-variant">
          <option value="">None Selected</option>
          <option value="sidebar-dark-primary">Primary</option>
          <option value="sidebar-dark-warning">Warning</option>
          <option value="sidebar-dark-info">Info</option>
          <option value="sidebar-dark-danger">Danger</option>
          <option value="sidebar-dark-success">Success</option>
          <option value="sidebar-dark-indigo">Indigo</option>
          <option value="sidebar-dark-lightblue">Lightblue</option>
          <option value="sidebar-dark-navy">Navy</option>
          <option value="sidebar-dark-purple">Purple</option>
          <option value="sidebar-dark-fuchsia">Fuchsia</option>
          <option value="sidebar-dark-pink">Pink</option>
          <option value="sidebar-dark-maroon">Maroon</option>
          <option value="sidebar-dark-orange">Orange</option>
          <option value="sidebar-dark-lime">Lime</option>
          <option value="sidebar-dark-teal">Teal</option>
          <option value="sidebar-dark-olive">Olive</option>
        </select>
      </div>

      <!-- Light Sidebar Variants -->
      <h6>Light Sidebar Variants</h6>
      <div class="mb-3">
        <select class="custom-select cs-select" id="light-sidebar-variant">
          <option value="">None Selected</option>
          <option value="sidebar-light-primary">Primary</option>
          <option value="sidebar-light-warning">Warning</option>
          <option value="sidebar-light-info">Info</option>
          <option value="sidebar-light-danger">Danger</option>
          <option value="sidebar-light-success">Success</option>
          <option value="sidebar-light-indigo">Indigo</option>
          <option value="sidebar-light-lightblue">Lightblue</option>
          <option value="sidebar-light-navy">Navy</option>
          <option value="sidebar-light-purple">Purple</option>
          <option value="sidebar-light-fuchsia">Fuchsia</option>
          <option value="sidebar-light-pink">Pink</option>
          <option value="sidebar-light-maroon">Maroon</option>
          <option value="sidebar-light-orange">Orange</option>
          <option value="sidebar-light-lime">Lime</option>
          <option value="sidebar-light-teal">Teal</option>
          <option value="sidebar-light-olive">Olive</option>
        </select>
      </div>

      <!-- Brand Logo Variants -->
      <h6>Brand Logo Variants</h6>
      <div class="mb-1">
        <select class="custom-select cs-select" id="brand-variant">
          <option value="">None Selected</option>
          <option value="brand-primary">Primary</option>
          <option value="brand-secondary">Secondary</option>
          <option value="brand-info">Info</option>
          <option value="brand-success">Success</option>
          <option value="brand-danger">Danger</option>
          <option value="brand-indigo">Indigo</option>
          <option value="brand-purple">Purple</option>
          <option value="brand-pink">Pink</option>
          <option value="brand-navy">Navy</option>
          <option value="brand-lightblue">Lightblue</option>
          <option value="brand-teal">Teal</option>
          <option value="brand-cyan">Cyan</option>
          <option value="brand-dark">Dark</option>
          <option value="brand-gray-dark">Gray Dark</option>
          <option value="brand-gray">Gray</option>
          <option value="brand-light">Light</option>
          <option value="brand-warning">Warning</option>
          <option value="brand-white">White</option>
          <option value="brand-orange">Orange</option>
        </select>
      </div>
      <a href="#" id="clear-brand" class="text-sm text-info d-block mb-3">Clear</a>

    </div>
  </aside>
  <!-- ═══ END CONTROL SIDEBAR ═══ -->

</div><!-- /.wrapper -->


<!-- ═══════════════════════════════════════
     SCRIPTS
═══════════════════════════════════════ -->
<!-- jQuery -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

<script>
  /* ── Customizer open / close ── */
  var $sidebar  = $('#control-sidebar');
  var $overlay  = $('#cs-overlay');

  function openCustomizer() {
    $sidebar.addClass('control-sidebar-open');
    $overlay.addClass('show');
  }

  function closeCustomizer() {
    $sidebar.removeClass('control-sidebar-open');
    $overlay.removeClass('show');
  }

  $('#open-customizer').on('click', function(e) {
    e.preventDefault();
    openCustomizer();
  });

  $('#close-customizer, #cs-overlay').on('click', function() {
    closeCustomizer();
  });

  /* ── Dark Mode toggle ── */
  $('#dark-mode-toggle').on('change', function() {
    $('body').toggleClass('dark-mode layout-navbar-fixed', this.checked);
    // AdminLTE dark classes
    $('body').toggleClass('dark-mode', this.checked);
    $('.main-sidebar').toggleClass('sidebar-dark-primary', this.checked);
  });

  /* ── Navbar variant ── */
  var navbarClasses = [
    'navbar-white','navbar-light','navbar-primary','navbar-secondary',
    'navbar-info','navbar-success','navbar-danger','navbar-warning',
    'navbar-dark','navbar-navy','navbar-dark','navbar-indigo',
    'navbar-purple','navbar-pink','navbar-lightblue','navbar-teal',
    'navbar-cyan','navbar-gray-dark','navbar-gray','navbar-orange'
  ];

  $('#navbar-variant').on('change', function() {
    var $nav = $('.main-header.navbar');
    $nav.removeClass(navbarClasses.join(' '));
    var selected = $(this).val();
    if (selected) $nav.addClass(selected);
  });

  /* ── Accent color ── */
  var accentClasses = [
    'accent-primary','accent-warning','accent-info','accent-danger',
    'accent-success','accent-indigo','accent-lightblue','accent-navy',
    'accent-purple','accent-fuchsia','accent-pink','accent-maroon',
    'accent-orange','accent-lime','accent-teal','accent-olive'
  ];

  $('#accent-variant').on('change', function() {
    $('body').removeClass(accentClasses.join(' '));
    var selected = $(this).val();
    if (selected) $('body').addClass(selected);
  });

  /* ── Dark sidebar variant ── */
  var sidebarDarkClasses = [
    'sidebar-dark-primary','sidebar-dark-warning','sidebar-dark-info',
    'sidebar-dark-danger','sidebar-dark-success','sidebar-dark-indigo',
    'sidebar-dark-lightblue','sidebar-dark-navy','sidebar-dark-purple',
    'sidebar-dark-fuchsia','sidebar-dark-pink','sidebar-dark-maroon',
    'sidebar-dark-orange','sidebar-dark-lime','sidebar-dark-teal','sidebar-dark-olive'
  ];

  $('#dark-sidebar-variant').on('change', function() {
    var $aside = $('.main-sidebar');
    $aside.removeClass(sidebarDarkClasses.join(' '));
    var selected = $(this).val();
    if (selected) $aside.addClass(selected);
  });

  /* ── Light sidebar variant ── */
  var sidebarLightClasses = sidebarDarkClasses.map(function(c) {
    return c.replace('sidebar-dark-', 'sidebar-light-');
  });

  $('#light-sidebar-variant').on('change', function() {
    var $aside = $('.main-sidebar');
    $aside.removeClass(sidebarLightClasses.join(' '));
    var selected = $(this).val();
    if (selected) $aside.addClass(selected);
  });

  /* ── Brand logo variant ── */
  var brandClasses = [
    'brand-primary','brand-secondary','brand-info','brand-success',
    'brand-danger','brand-indigo','brand-purple','brand-pink',
    'brand-navy','brand-lightblue','brand-teal','brand-cyan',
    'brand-dark','brand-gray-dark','brand-gray','brand-light',
    'brand-warning','brand-white','brand-orange'
  ];

  $('#brand-variant').on('change', function() {
    var $brand = $('.brand-link');
    $brand.removeClass(brandClasses.join(' '));
    var selected = $(this).val();
    if (selected) $brand.addClass(selected);
  });

  $('#clear-brand').on('click', function(e) {
    e.preventDefault();
    $('#brand-variant').val('').trigger('change');
  });
</script>

</body>
</html>