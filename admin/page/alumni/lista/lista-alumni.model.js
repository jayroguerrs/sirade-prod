"use strict";var KTAlumniList=function(){var e,t,n=()=>{document.querySelectorAll('[data-kt-customer-table-filter="delete_row"]').forEach((t=>{t.addEventListener("click",(function(t){t.preventDefault();const n=t.target.closest("tr").querySelectorAll("td")[1].innerText;Swal.fire({text:"¿Está seguro que desea eliminar el registro: "+n+"?",icon:"warning",showCancelButton:!0,buttonsStyling:!1,confirmButtonText:"Yes, eliminar",cancelButtonText:"No, cancelar",customClass:{confirmButton:"btn fw-bold btn-danger",cancelButton:"btn fw-bold btn-active-light-primary"}}).then((function(t){t.value&&Swal.fire({text:"Eliminando "+n,icon:"info",buttonsStyling:!1,showConfirmButton:!1,timer:2e3}).then((function(){Swal.fire({text:"Se acaba de eliminar el registro: "+n+".",icon:"success",buttonsStyling:!1,confirmButtonText:"Ok, entendido",customClass:{confirmButton:"btn fw-bold btn-primary"}}).then((function(){e.draw()}))}))}))}))}))},i=function(){const t=document.querySelector("#tb_alumni"),n=t.querySelectorAll('[type="checkbox"]'),i=document.querySelector('[data-kt-customer-table-select="delete_selected"]');n.forEach((e=>{e.addEventListener("click",(function(){setTimeout((function(){a()}),50)}))})),i.addEventListener("click",(function(){Swal.fire({text:"Are you sure you want to delete selected customers?",icon:"warning",showCancelButton:!0,buttonsStyling:!1,showLoaderOnConfirm:!0,confirmButtonText:"Yes, delete!",cancelButtonText:"No, cancel",customClass:{confirmButton:"btn fw-bold btn-danger",cancelButton:"btn fw-bold btn-active-light-primary"}}).then((function(n){n.value?Swal.fire({text:"Deleting selected customers",icon:"info",buttonsStyling:!1,showConfirmButton:!1,timer:2e3}).then((function(){Swal.fire({text:"You have deleted all selected customers!.",icon:"success",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn fw-bold btn-primary"}}).then((function(){e.draw()}));t.querySelectorAll('[type="checkbox"]')[0].checked=!1})):"cancel"===n.dismiss&&Swal.fire({text:"Selected customers was not deleted.",icon:"error",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn fw-bold btn-primary"}})}))}))},a=function(){const e=document.querySelector("#tb_alumni"),t=document.querySelector('[data-kt-customer-table-toolbar="base"]'),n=document.querySelector('[data-kt-customer-table-toolbar="selected"]'),i=document.querySelector('[data-kt-customer-table-select="selected_count"]'),a=e.querySelectorAll('tbody [type="checkbox"]');let s=!1,r=0;a.forEach((e=>{e.checked&&(s=!0,r++)})),s?(i.innerHTML=r,t.classList.add("d-none"),n.classList.remove("d-none")):(t.classList.remove("d-none"),n.classList.add("d-none"))};return{init:function(){e=$("#tb_alumni").DataTable({searchDelay:500,processing:!0,serverSide:!0,order:[[4,"asc"]],stateSave:!0,select:{style:"multi",selector:'td:first-child input[type="checkbox"]',className:"row-selected"},ajax:{type:"POST",url:"page/alumni/lista/lista-alumni.model.php"},columnDefs:[{targets:0,visible:!0,orderable:!1,render:function(e){return`\n                      <div class="form-check form-check-sm form-check-custom form-check-solid">\n                          <input class="form-check-input" type="checkbox" value="${e}" />\n                      </div>`}},{targets:1,visible:!1},{targets:2,visible:!1},{targets:3,visible:!1},{targets:4,visible:!0,orderable:!0,className:"d-flex align-items-center",render:function(e,t,n){if(""!=n[20])var i='<div class=symbol-label><img src="/img/avatars/ alt="Avatar" class="w-100"></div>';else{var a=["success","danger","warning","info","dark","primary","secondary"][Math.floor(6*Math.random())],s=e.match(/\b\w/g)||[];i='<div class="symbol-label fs-3 bg-light-'+a+" text-"+a+'">'+(s=((s.shift()||"")+(s.pop()||"")).toUpperCase())+"</div>"}return`                        \n                    \x3c!--begin:: Avatar --\x3e\n                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">\n                      <a href="/good/apps/user-management/users/view.html">\n                          ${i}\n                      </a>\n                    </div>\n                    \x3c!--end::Avatar--\x3e\n\n                    \x3c!--begin::User details--\x3e\n                    <div class="d-flex flex-column">\n                      <a href="" class="text-gray-800 text-hover-primary mb-1">${e}</a>\n                      <span>${n[14]}</span>\n                    </div>\n                    \x3c!--end::User details--\x3e                        \n                  `}},{targets:5,visible:!0},{targets:6,visible:!0,render:function(e,t,n){return`\n                    <div class="badge badge-light-${"M"==e?"primary":"F"==e?"warning":"success"}">${"M"==e?"Masculino":"F"==e?"Femenino":"No Binario"}</div>\n                  `}},{targets:7,visible:!1},{targets:8,visible:!1},{targets:9,visible:!1},{targets:10,visible:!1},{targets:11,visible:!1},{targets:12,visible:!1},{targets:13,visible:!1},{targets:14,visible:!1},{targets:15,visible:!1},{targets:16,visible:!1},{targets:17,visible:!1},{targets:18,visible:!1},{targets:19,visible:!1},{targets:20,visible:!1},{targets:21,visible:!0,render:function(e,t,n){return`\n                    \x3c!--begin::User details--\x3e\n                    <div class="d-flex flex-column">\n                      <a class="fs-7 text-gray-800 mb-1">${e}</a>\n                      <span class="fs-8">${n[30]}</span>\n                    </div>\n                    \x3c!--end::User details--\x3e\n                  `}},{targets:22,visible:!1},{targets:23,visible:!1},{targets:24,visible:!1},{targets:25,visible:!1},{targets:26,visible:!1},{targets:27,visible:!1},{targets:28,visible:!0},{targets:29,visible:!1},{targets:30,visible:!1},{targets:31,visible:!1},{targets:-1,visible:!0,data:null,orderable:!1,className:"text-end",render:function(e,t,n){return'\n                      <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">                                \n                        <span class="svg-icon svg-icon-5 m-0">\n                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\n                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\n                                  <polygon points="0 0 24 0 24 24 0 24"></polygon>\n                                  <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="currentColor" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>\n                                </g>\n                            </svg>\n                        </span>\n                      </a>\n                      \x3c!--begin::Menu--\x3e\n                      <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">\n                        \x3c!--begin::Menu item--\x3e\n                        <div class="menu-item px-3">\n                          <a href="#" class="menu-link px-3" data-kt-customer-table-filter="edit_row">\n                            Editar\n                          </a>\n                        </div>\n                        \x3c!--end::Menu item--\x3e\n\n                        \x3c!--begin::Menu item--\x3e\n                        <div class="menu-item px-3">\n                          <a href="#" class="menu-link px-3" data-kt-customer-table-filter="delete_row">\n                            Eliminar\n                          </a>\n                        </div>\n                        \x3c!--end::Menu item--\x3e\n                      </div>\n                      \x3c!--end::Menu--\x3e\n                    '}}],createdRow:function(e,t,n){$(e).find("td:eq(4)").attr("data-filter",t.CreditCardType)}}),e.$,e.on("draw",(function(){i(),a(),n(),KTMenu.createInstances()})),document.querySelector('[data-kt-customer-table-filter="search"]').addEventListener("keyup",(function(t){e.search(t.target.value).draw()})),i(),t=document.querySelectorAll('[data-kt-customer-table-filter="payment_type"] [name="payment_type"]'),document.querySelector('[data-kt-customer-table-filter="filter"]').addEventListener("click",(function(){let n="";t.forEach((e=>{e.checked&&(n=e.value),"all"===n&&(n="")})),e.search(n).draw()})),n(),document.querySelector('[data-kt-customer-table-filter="reset"]').addEventListener("click",(function(){t[0].checked=!0,e.search("").draw()}))}}}();KTUtil.onDOMContentLoaded((function(){KTAlumniList.init()}));