<?php include 'connection/bd_connection.php'; ?>

<!--begin::List widget 13-->
<div class="card card-flush h-xl-100">
    <!--begin::Header-->
    <div class="card-header pt-5">
        <!--begin::Title-->
        <div class="card-title d-flex flex-column">
            <!--begin::Info-->
            <div class="d-flex align-items-center">
                <!--begin::Amount-->
                <span class="card-label fw-bold text-dark">País de Nacimiento</span>														
                <!--end::Amount-->															
            </div>
            <!--end::Info-->
            <!--begin::Subtitle-->
            <span class="text-gray-400 pt-1 fw-semibold fs-6">Top 6 Países por Orden</span>
            <!--end::Subtitle-->
        </div>
        <!--end::Title-->
        <!--begin::Toolbar-->
        <div class="card-toolbar">
            <!--begin::Menu-->
            <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
                <span class="svg-icon svg-icon-1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4" fill="currentColor" />
                        <rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor" />
                        <rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor" />
                        <rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </button>
            <!--begin::Menu 3-->
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
                <!--begin::Heading-->
                <div class="menu-item px-3">
                    <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Acciones</div>
                </div>
                <!--end::Heading-->															
                <!--begin::Menu item-->
                <div class="menu-item px-3 my-1">
                    <a href="#" class="menu-link px-3">Generar Reporte</a>
                </div>
                <!--end::Menu item-->
            </div>
            <!--end::Menu 3-->
            <!--end::Menu-->
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body">
        <!--begin::Scroll-->
        <div class="hover-scroll-overlay-y pe-6 me-n6" style="height: 310px">    
            <!--begin::Item-->
            <?php 
                $sql = "SELECT 
                            IF(A.paisNac IS NULL, 'PENDIENTES', A.paisNac) id, 
                            LOWER(IF(A.paisNac IS NULL, 'PENDIENTES', P.nombrePais)) nombre, 
                            SUM(IF(A.paisNac IS NULL OR A.paisNac = '' OR A.paisNac <> '' OR A.paisNac IS NOT NULL, 1, 0)) total,  
                            P.img imagen,
                            ROUND(SUM(IF(A.paisNac IS NULL OR A.paisNac = '' OR A.paisNac <> '' OR A.paisNac IS NOT NULL, 1, 0))*100.0/SUM(COUNT(*)) OVER(), 1) porc
                        FROM 
                            alumni A 
                        LEFT JOIN paises P ON A.paisNac = P.idPais 
                        GROUP BY A.paisNac ORDER BY total DESC; ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) { ?>
                        <!--begin::Item-->     
                        <div class="d-flex flex-stack mb-8">
                            <!--begin::Section-->
                            <div class="d-flex align-items-center me-5">
                                <!--begin::Flag-->
                                <img src="assets/media/flags/<?php echo $row['imagen']; ?>" class="me-3" style="width: 20px;border-radius: 4px" alt="" />
                                <!--end::Flag-->
                                <a href="#" class="text-dark fw-bold text-hover-primary fs-6"><?php echo ucwords($row['nombre']); ?></a>
                            </div>
                            <!--end::Section-->
                            <!--begin::Wrapper-->
                            <div class="text-gray-800 fw-bold fs-6">
                                <!--begin::Number-->
                                <span class="me-7"><?php echo $row['total']; ?></span>
                                <!--end::Number-->
                                <!--begin::Statistics-->
                                <span class="m-0">
                                    % <?php echo $row['porc']; ?>
                                </span>
                                <!--end::Statistics-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Item-->
                    <?php } 
                }?>
        </div>
    </div>
    <!--end::Body-->
</div>
<!--end::List widget 13-->

<?php $conn->close(); ?>