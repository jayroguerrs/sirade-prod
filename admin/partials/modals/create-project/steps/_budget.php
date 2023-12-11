<!--begin::Budget-->
<div data-kt-stepper-element="content">
    <!--begin::Wrapper-->
    <div class="w-100">
        <!--begin::Heading-->
        <div class="pb-10 pb-lg-12">
            <!--begin::Title-->
            <h1 class="fw-bold text-dark">Budget</h1>
            <!--end::Title-->
            <!--begin::Description-->
            <div class="text-muted fw-semibold fs-4">
                If you need more info, please check
                <a href="#" class="link-primary">Project Guidelines</a>
            </div>
            <!--end::Description-->
        </div>
        <!--end::Heading-->
        <!--begin::Input group-->
        <div class="fv-row mb-8">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">Setup Budget</span>
                <i
                    class="fas fa-exclamation-circle ms-2 fs-7"
                    data-bs-toggle="popover"
                    data-bs-trigger="hover"
                    data-bs-html="true"
                    data-bs-content="
                        <div class='p-4 rounded bg-light'>
                            <div class='d-flex flex-stack text-muted mb-4'>
                                <i class='fas fa-university fs-3 me-3'></i>
                                <div class='fw-bold'>INCBANK **** 1245 STATEMENT</div>
                            </div>
                            <div class='d-flex flex-stack fw-semibold text-gray-600'>
                                <div>Amount</div>
                                <div>Transaction</div>
                            </div>
                            <div class='separator separator-dashed my-2'></div>
                            <div class='d-flex flex-stack text-dark fw-bold mb-2'>
                                <div>USD345.00</div>
                                <div>KEENTHEMES*</div>
                            </div>
                            <div class='d-flex flex-stack text-muted mb-2'>
                                <div>USD75.00</div>
                                <div>Hosting fee</div>
                            </div>
                            <div class='d-flex flex-stack text-muted'>
                                <div>USD3,950.00</div>
                                <div>Payrol</div>
                            </div>
                        </div>
                    ">
                </i>
            </label>
            <!--end::Label-->
            <!--begin::Dialer-->
            <div class="position-relative w-lg-250px"
                id="kt_modal_create_project_budget_setup"
                data-kt-dialer="true"
                data-kt-dialer-min="50"
                data-kt-dialer-max="50000"
                data-kt-dialer-step="100"
                data-kt-dialer-prefix="$"
                data-kt-dialer-decimals="2">
                <!--begin::Decrease control-->
                <button type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 start-0" data-kt-dialer-control="decrease">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen042.svg-->
<span class="svg-icon svg-icon-1"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>
<rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor"/>
</svg>
</span>
<!--end::Svg Icon-->                </button>
                <!--end::Decrease control-->
                <!--begin::Input control-->
                <input type="text" class="form-control form-control-solid border-0 ps-12" data-kt-dialer-control="input" placeholder="Amount" name="budget_setup" readonly value="$50"/>
                <!--end::Input control-->
                <!--begin::Increase control-->
                <button type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 end-0" data-kt-dialer-control="increase">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen041.svg-->
<span class="svg-icon svg-icon-1"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>
<rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor"/>
<rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor"/>
</svg>
</span>
<!--end::Svg Icon-->                </button>
                <!--end::Increase control-->
            </div>
            <!--end::Dialer-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-8">
            <!--begin::Label-->
            <label class="fs-6 fw-semibold mb-2">Budget Usage</label>
            <!--end::Label-->
            <!--begin::Row-->
            <div class="row g-9" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']">
                <!--begin::Col-->
                <div class="col-md-6 col-lg-12 col-xxl-6">
                    <!--begin::Option-->
                    <label class="btn btn-outline btn-outline-dashed btn-active-light-primary active d-flex text-start p-6" data-kt-button="true">
                        <!--begin::Radio-->
                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                            <input class="form-check-input" type="radio" name="budget_usage" value="1" checked="checked" />
                        </span>
                        <!--end::Radio-->
                        <!--begin::Info-->
                        <span class="ms-5">
                            <span class="fs-4 fw-bold text-gray-800 mb-2 d-block">Precise Usage</span>
                            <span class="fw-semibold fs-7 text-gray-600">
                                Withdraw money to your bank account per transaction under $50,000 budget
                            </span>
                        </span>
                        <!--end::Info-->
                    </label>
                    <!--end::Option-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 col-lg-12 col-xxl-6">
                    <!--begin::Option-->
                    <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6" data-kt-button="true">
                        <!--begin::Radio-->
                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                            <input class="form-check-input" type="radio" name="budget_usage" value="2" />
                        </span>
                        <!--end::Radio-->
                        <!--begin::Info-->
                        <span class="ms-5">
                            <span class="fs-4 fw-bold text-gray-800 mb-2 d-block">Extreme Usage</span>
                            <span class="fw-semibold fs-7 text-gray-600">
                                Withdraw money to your bank account per transaction under $50,000 budget
                            </span>
                        </span>
                        <!--end::Info-->
                    </label>
                    <!--end::Option-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-15">
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack">
                <!--begin::Label-->
                <div class="me-5">
                    <label class="fs-6 fw-semibold">Allow Changes in Budget</label>
                    <div class="fs-7 fw-semibold text-muted">If you need more info, please check budget planning</div>
                </div>
                <!--end::Label-->
                <!--begin::Switch-->
                <label class="form-check form-switch form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" value="1" name="budget_allow" checked="checked"/>
                    <span class="form-check-label fw-semibold text-muted">
                        Allowed
                    </span>
                </label>
                <!--end::Switch-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Input group-->
        <!--begin::Actions-->
        <div class="d-flex flex-stack">
            <button type="button" class="btn btn-lg btn-light me-3" data-kt-element="budget-previous">
                Project Settings
            </button>
            <button type="button" class="btn btn-lg btn-primary" data-kt-element="budget-next">
                <span class="indicator-label">
                    Build Team
                </span>
                <span class="indicator-progress">
                    Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
            </button>
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Budget-->