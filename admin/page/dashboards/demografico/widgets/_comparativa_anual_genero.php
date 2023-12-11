<!--begin::Chart Widget 1-->
<div class="card card-flush h-xl-100">
    <!--begin::Header-->
    <div class="card-header pt-5">
        <!--begin::Title-->
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold text-dark">Comparativa de género</span>
            <span class="text-gray-400 pt-2 fw-semibold fs-6">Por periodo anual</span>
        </h3>
        <!--end::Title-->
        <!--begin::Toolbar-->
        <div class="card-toolbar">
            <!--begin::Menu-->
            <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
                <span class="svg-icon svg-icon-1 svg-icon-gray-300 me-n1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4" fill="currentColor" />
                        <rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor" />
                        <rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor" />
                        <rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </button>
            <!--begin::Menu 2-->
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Acciones</div>
                </div>
                <!--end::Menu item-->															
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <div class="menu-content px-3 py-3">
                        <a class="btn btn-primary btn-sm px-4" href="#">Generar Reportes</a>
                    </div>
                </div>
                <!--end::Menu item-->
            </div>
            <!--end::Menu 2-->
            <!--end::Menu-->
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body pt-0 px-0">
        <!--begin::Chart-->
        <div id="ch_generoanual" class="min-h-auto ps-4 pe-6 mb-3" style="height: 300px" data-kt-negative-color="rgba(150, 142, 126, 0.2)"></div>
        <!--end::Chart-->
        <!--begin::Info-->
        <div class="d-flex align-items-center px-9">
            <!--begin::Item-->
            <div class="d-flex align-items-center me-6">
                <!--begin::Bullet-->
                <span class="rounded-1 bg-primary me-2 h-10px w-10px"></span>
                <!--end::Bullet-->
                <!--begin::Label-->
                <span class="fw-semibold fs-6 text-gray-600">Hombres</span>
                <!--end::Label-->
            </div>
            <!--ed::Item-->
            <!--begin::Item-->
            <div class="d-flex align-items-center">
                <!--begin::Bullet-->
                <span class="rounded-1 me-2 h-10px w-10px" style="background-color: #F1416C"></span>
                <!--end::Bullet-->
                <!--begin::Label-->
                <span class="fw-semibold fs-6 text-gray-600">Mujeres</span>
                <!--end::Label-->
            </div>
            <!--ed::Item-->
        </div>
        <!--ed::Info-->
    </div>
    <!--end::Body-->
</div>
<!--end::Chart Widget 1-->