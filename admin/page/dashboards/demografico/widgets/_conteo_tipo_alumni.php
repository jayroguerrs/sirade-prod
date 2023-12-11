<?php include 'connection/bd_connection.php'; ?>

<div class="card card-flush h-xl-100">
    <!--begin::Header-->
    <div class="card-header pt-5">
        <!--begin::Title-->
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold text-dark">Alumni por programa</span>
            <span class="text-gray-400 mt-1 fw-semibold fs-6">Conteo General</span>
        </h3>
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
    <div class="card-body pt-5">
        <?php 
            $sql = "SELECT SUM(IF(tipopostgrado = 'MAESTRÍA', 1, 0)) AS 'Total', ROUND(SUM(IF(tipopostgrado = 'MAESTRÍA', 1, 0))/(COUNT(cod)) *100, 2) AS 'Porc', 'Maestría' AS 'Tipo' FROM datosalumni UNION
                    SELECT SUM(IF(tipopostgrado = 'DOCTORADO', 1, 0)) AS 'Total', ROUND(SUM(IF(tipopostgrado = 'DOCTORADO', 1, 0))/(COUNT(cod)) *100, 2) AS 'Porc', 'Doctorado' AS 'Tipo' FROM datosalumni UNION
                    SELECT SUM(IF(tipopostgrado = '' OR tipopostgrado IS NULL, 1, 0)) AS 'Total', ROUND(SUM(IF(tipopostgrado = '' OR tipopostgrado IS NULL, 1, 0))/(COUNT(cod)) *100, 2) AS 'Porc', 'Pendiente' AS 'Tipo' FROM datosalumni; ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) { ?>
                    <!--begin::Item-->
                    <div class="d-flex flex-stack">
                        <!--begin::Section-->
                        <div class="text-gray-700 fw-semibold fs-6 me-2"><?php echo $row['Tipo'];?></div>
                        <!--end::Section-->
                        <!--begin::Statistics-->
                        <div class="d-flex align-items-senter">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr094.svg-->
                            <span class="svg-icon svg-icon-2 svg-icon-success me-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="16.9497" y="8.46448" width="13" height="2" rx="1" transform="rotate(135 16.9497 8.46448)" fill="currentColor" />
                                    <path d="M14.8284 9.97157L14.8284 15.8891C14.8284 16.4749 15.3033 16.9497 15.8891 16.9497C16.4749 16.9497 16.9497 16.4749 16.9497 15.8891L16.9497 8.05025C16.9497 7.49797 16.502 7.05025 15.9497 7.05025L8.11091 7.05025C7.52512 7.05025 7.05025 7.52513 7.05025 8.11091C7.05025 8.6967 7.52512 9.17157 8.11091 9.17157L14.0284 9.17157C14.4703 9.17157 14.8284 9.52975 14.8284 9.97157Z" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <!--begin::Number-->
                            <span class="text-gray-900 fw-bolder fs-6"><?php echo $row['Total'];?></span>
                            <span class="badge badge-light-primary fs-base ms-4">                                
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor"></rect>
                                        <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->                                               
                                <?php echo $row['Porc'] ;?>% 
                            </span>
                            <!--end::Number-->                                                            
                        </div>
                        <!--end::Statistics-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Separator-->
                    <div class="separator separator-dashed my-3"></div>
                    <!--end::Separator-->
                <?php }                
            }
        ?>        
    </div>
    <!--end::Body-->
</div>
<?php $conn->close();?>