<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="/admin/dashboard"><img src="{{ asset('../../admin/images/logo.svg') }}" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="/admin/dashboard"><img src="{{ asset('../../admin/images/logo_mini.svg') }}"  alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle " src="{{ asset(auth()->user()->avatar) }}" alt="">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">{{ auth()->user()->first_name. " " .auth()->user()->last_name}}</h5>
                        <span>Admin</span>
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-settings text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                        </div>
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="/admin/dashboard">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
                <span class="menu-title">Questions</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/buttons.html">All</a></li>
                    <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/dropdowns.html">Approved</a></li>
                    <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/typography.html">On pending</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="/admin/questions">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
                <span class="menu-title">Questions</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="/admin/topics">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
                <span class="menu-title">Topics</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="/admin/users">
              <span class="menu-icon">
                <i class="mdi mdi-contacts"></i>
              </span>
                <span class="menu-title">Users</span>
            </a>
        </li>
    </ul>
</nav>
