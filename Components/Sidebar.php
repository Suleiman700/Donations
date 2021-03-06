<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="index.html">
                <img src="../../assets/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
                <img src="../../assets/images/brand/logo-1.png" class="header-brand-img toggle-logo"
                     alt="logo">
                <img src="../../assets/images/brand/logo-2.png" class="header-brand-img light-logo" alt="logo">
                <img src="../../assets/images/brand/logo-3.png" class="header-brand-img light-logo1"
                     alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg"
                     fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"/>
                </svg>
            </div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>Main</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="index.html"><i
                                class="side-menu__icon fe fe-home"></i><span
                                class="side-menu__label">Dashboard</span></a>
                </li>
                <li class="sub-category">
                    <h3>UI Kit</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fa fa-car"></i><span
                                class="side-menu__label">Cars</span><i
                                class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Apps</a></li>
                        <li><a href="../cars/my-cars.php" class="slide-item"> My Cars</a></li>
                        <li><a href="calendar.html" class="slide-item"> Add Car</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fe fe-slack"></i>
                        <span class="side-menu__label">Categories</span>
                        <i class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Categories</a></li>
                        <li><a href="../categories/expense-categories.php" class="slide-item"> <?php echo $app->get_word("expense_categories"); ?></a></li>
                        <li><a href="../categories/income-categories.php" class="slide-item"> <?php echo $app->get_word("income_categories"); ?></a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fe fe-dollar-sign"></i>
                        <span class="side-menu__label"><?php echo $app->get_word("donations"); ?></span>
                        <i class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Categories</a></li>
                        <li><a href="../donations/list.php" class="slide-item"> <?php echo $app->get_word("donations_list"); ?></a></li>
                        <li><a href="../donations/add.php" class="slide-item"> <?php echo $app->get_word("add_donation"); ?></a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fe fe-slack"></i><span
                                class="side-menu__label"><?php echo $app->get_word("campaigns"); ?></span><i
                                class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a
                                    href="javascript:void(0)"><?php echo $app->get_word("campaigns"); ?></a></li>
                        <li><a href="../campaigns/list.php"
                               class="slide-item"> <?php echo $app->get_word("campaigns_list"); ?></a></li>
                        <li><a href="../categories/income-categories.php"
                               class="slide-item"> <?php echo $app->get_word("add_campaign"); ?></a></li>
                    </ul>
                </li>
            </ul>
            <div class="slide-right" id="slide-right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                     width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/>
                </svg>
            </div>
        </div>
    </div>
</div>
