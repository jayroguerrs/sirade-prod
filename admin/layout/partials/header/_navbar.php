<!--begin::Navbar-->
<div class="app-navbar align-items-center flex-shrink-0">
    <!--begin::Search-->
    <div class="app-navbar-item ms-2 ms-lg-4">
<?php //include 'partials/search/_inline.php' ?>
    </div>
    <!--end::Search-->
    <!--begin::Notifications-->
    <div class="app-navbar-item ms-2 ms-lg-4">
        <!--begin::Menu- wrapper-->
        <a href="#" class="btn btn-custom btn-icon btn-outline btn-icon-gray-700 btn-active-icon-primary"
            data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end"
            data-kt-menu-flip="bottom">
            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
            <span class="svg-icon svg-icon-1"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor" />
                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor" />
                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </a>
        <?php //include 'partials/menus/_quick-links-menu.php' ?>
        <!--end::Menu wrapper-->
    </div>
    <!--end::Notifications-->
    <!--begin::Theme mode-->
    <div class="app-navbar-item ms-2 ms-lg-4">
        <?php include 'partials/theme-mode/_main.php' ?>
    </div>
    <!--end::Theme mode-->
    <!--begin::Quick links-->
    <div class="app-navbar-item ms-2 ms-lg-4">
        <!--begin::Menu wrapper-->
        <a href="#" class="btn btn-icon btn-primary fw-bold" data-kt-menu-trigger="click" data-kt-menu-attach="parent"
            data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
            <span class="fs-5">3</span>
        </a>
<?php //include 'partials/menus/_notifications-menu.php' ?>
        <!--end::Menu wrapper-->
    </div>
    <!--end::Quick links-->
</div>
<!--end::Navbar-->