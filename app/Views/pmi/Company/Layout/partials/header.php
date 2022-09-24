<!-- ======= Header ======= -->
<header id="header" class="header bg-danger fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="<?=base_url('company');?>" class="logo d-flex align-items-center">
            <img src="<?=base_url('uploads/images/logo/'.session()->get('user_image'));?>" alt="" class="bg-light">
            <span class="d-none d-lg-block text-warning"><?=session()->get('user_name')?></span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn text-light"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->

            <li class="nav-item dropdown pe-3">

                <a class="nav-link text-light nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="<?=base_url('uploads/images/logo/'.session()->get('user_image'));?>" alt="Profile" class="rounded-circle bg-light">
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?=session()->get('user_name')?></span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                            <i class="bi bi-gear"></i>
                            <span>Account Settings</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                            <i class="bi bi-question-circle"></i>
                            <span>Need Help?</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="<?=base_url('authentication/logout')?>">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->