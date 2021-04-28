<?php 
require('core/init.php');
require('../includes/function.php');
function gen_passkey()
{
    return Hash::unique();
}
$user = new User();
if($user->isLoggedIn()){


?>

<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8" />
    <title>Department | KIOT</title>
    <meta name="description" content="View all Teachers" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="robots" content="noindex, nofollow">
    <link rel="canonical" href="#" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="../theme/plugins/custom/datatables/datatables.bundlec7e5.css?v=7.1.2" rel="stylesheet" type="text/css">
    <link href="../theme/plugins/custom/fullcalendar/fullcalendar.bundlec7e5.css?v=7.1.1" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="../theme/plugins/global/plugins.bundlec7e5.css?v=7.1.1" rel="stylesheet" type="text/css" />
    <link href="../theme/plugins/custom/prismjs/prismjs.bundlec7e5.css?v=7.1.1" rel="stylesheet" type="text/css" />
    <link href="../theme/css/style.bundlec7e5.css?v=7.1.1" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="../theme/media/logos/favicon.ico" />
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="../theme/css/pages/wizard/wizard-4c7e5.css?v=7.1.1" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->

</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed mr-4 page-loading">   
    <!--begin::Main-->
    <?php require('aside.php'); ?>
    <!--begin::Wrapper-->
    <div class="d-flex flex-column-fluid flex-column flex-row-fluid wrapper" id="kt_wrapper">
        <!--begin::Header-->
        <div id="kt_header" class="header header-fixed">
            <!--begin::Header Wrapper-->
            <div class="header-wrapper rounded-top-xl d-flex flex-grow-1 align-items-center">
                <!--begin::Container-->
                <div class="container-fluid d-flex align-items-center justify-content-end justify-content-lg-between flex-wrap">
                    <!--begin::Menu Wrapper-->
                    <div class="header-menu-wrapper header-menu-wrapper-left py-lg-5" id="kt_header_menu_wrapper">
                        <!--begin::Menu-->
                        <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                            <!--begin::Nav-->
							<ul class="menu-nav">
								<li class="menu-item" aria-haspopup="true">
									<a href="../index.php" class="menu-link">
										<span class="menu-text">Dashboard</span>
									</a>
								</li>
								<li class="menu-item menu-item-active" aria-haspopup="true">
									<a href="em_department/index.php" class="menu-link">
										<span class="menu-text">Department</span>
									</a>
								</li>								
								<li class="menu-item" aria-haspopup="true">
									<a href="../em_faculty/index.php" class="menu-link">
										<span class="menu-text">Faculty</span>
									</a>
								</li>
								<li class="menu-item" aria-haspopup="true">
									<a href="../em_student/index.php" class="menu-link">
										<span class="menu-text">Students</span>
									</a>
								</li>
								
							</ul>
							<!--end::Nav-->
                        </div>
                        <!--end::Menu-->
                    </div>
                    <!--end::Menu Wrapper-->
                    <!--begin::Toolbar-->
                    <div class="d-flex">
                        <!--begin::Desktop Search-->
                        <div class="quick-search quick-search-inline flex-grow-1" id="kt_quick_search_inline">
                            <!--begin::Form-->
                            <form method="get" class="quick-search-form">
                                <div class="input-group rounded bg-light">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span class="svg-icon svg-icon-lg">
                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Search.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                        <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control h-40px" placeholder="Search..." />
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="quick-search-close ki ki-close icon-sm text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                            </form>
                            <!--end::Form-->
                            <!--begin::Search Toggle-->
                            <div id="kt_quick_search_toggle" data-toggle="dropdown" data-offset="0px,1px"></div>
                            <!--end::Search Toggle-->
                            <!--begin::Dropdown-->
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg dropdown-menu-anim-up">
                                <div class="quick-search-wrapper scroll" data-scroll="true" data-height="350" data-mobile-height="200"></div>
                            </div>
                            <!--end::Dropdown-->
                        </div>
                        <!--end::Desktop Search-->
                        <!--begin::Dropdown-->
                        <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
                            <a href="#" class="btn btn-icon btn-light-info ml-3 h-40px w-40px flex-shrink-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="svg-icon svg-icon-lg">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Media/Equalizer.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
                                            <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
                                            <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
                                            <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0">
                                <!--begin::Navigation-->
                                <ul class="navi navi-hover py-5">
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="flaticon2-drop"></i>
                                            </span>
                                            <span class="navi-text">New Group</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="flaticon2-list-3"></i>
                                            </span>
                                            <span class="navi-text">Contacts</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="flaticon2-rocket-1"></i>
                                            </span>
                                            <span class="navi-text">Groups</span>
                                            <span class="navi-link-badge">
                                                <span class="label label-light-primary label-inline font-weight-bold">new</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="flaticon2-bell-2"></i>
                                            </span>
                                            <span class="navi-text">Calls</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="flaticon2-gear"></i>
                                            </span>
                                            <span class="navi-text">Settings</span>
                                        </a>
                                    </li>
                                    <li class="navi-separator my-3"></li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="flaticon2-magnifier-tool"></i>
                                            </span>
                                            <span class="navi-text">Help</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="flaticon2-bell-2"></i>
                                            </span>
                                            <span class="navi-text">Privacy</span>
                                            <span class="navi-link-badge">
                                                <span class="label label-light-danger label-rounded font-weight-bold">5</span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                                <!--end::Navigation-->
                            </div>
                        </div>
                        <!--end::Dropdown-->
                        <!--begin::Dropdown-->
                        <div class="dropdown dropdown-inline" data-toggle="tooltip" title="More links" data-placement="left">
                            <a href="#" class="btn btn-icon btn-light-danger ml-3 h-40px w-40px flex-shrink-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="svg-icon svg-icon-lg">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Layout/Layout-vertical.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <rect fill="#000000" x="5" y="4" width="6" height="16" rx="1.5" />
                                            <rect fill="#000000" opacity="0.3" x="13" y="4" width="6" height="16" rx="1.5" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0">
                                <!--begin::Navigation-->
                                <ul class="navi navi-hover">
                                    <li class="navi-header font-weight-bold py-4">
                                        <span class="font-size-lg">Choose Label:</span>
                                        <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
                                    </li>
                                    <li class="navi-separator mb-3 opacity-70"></li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-text">
                                                <span class="label label-xl label-inline label-light-success">Customer</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-text">
                                                <span class="label label-xl label-inline label-light-danger">Partner</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-text">
                                                <span class="label label-xl label-inline label-light-warning">Suplier</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-text">
                                                <span class="label label-xl label-inline label-light-primary">Member</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-text">
                                                <span class="label label-xl label-inline label-light-dark">Staff</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="navi-separator mt-3 opacity-70"></li>
                                    <li class="navi-footer py-4">
                                        <a class="btn btn-clean font-weight-bold btn-sm" href="#">
                                            <i class="ki ki-plus icon-sm"></i>Add new</a>
                                    </li>
                                </ul>
                                <!--end::Navigation-->
                            </div>
                        </div>
                        <!--end::Dropdown-->
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Header Wrapper-->
        </div>
        <!--end::Header-->
        <!--begin::Content-->
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Subheader-->
            <div class="subheader py-2 py-lg-6 subheader-transparent" id="kt_subheader">
                
            </div>
            <!--end::Subheader-->
            <!--begin::Entry-->
            <div class="d-flex flex-column-fluid">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Notice-->
                    <div class="alert alert-custom alert-white alert-shadow gutter-b" role="alert">
                        <div class="alert-icon">
                            <span class="svg-icon svg-icon-xl svg-icon-primary">
                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Tools/Compass.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3"></path>
                                        <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero"></path>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </div>
                        <div class="alert-text">Each column has an optional rendering control called columns.render which can be used to process the content of each cell before the data is used.
                            <a class="font-weight-bold" href="https://datatables.net/examples/advanced_init/column_render.html" target="_blank">here</a>.</div>
                    </div>
                    <!--end::Notice-->
                    <!--begin::Card-->
                    <div class="card card-custom">
                        <div class="card-header flex-wrap py-5">
                            <div class="card-title">
                                <h3 class="card-label">Department Details
                                    <div class="text-muted pt-2 font-size-sm">View all department details</div>
                                </h3>
                            </div>
                            <div class="card-toolbar">
                                <!--begin::Dropdown-->
                                <div class="dropdown dropdown-inline mr-2 show">
                                    <button type="button" class="btn btn-light font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <span class="svg-icon svg-icon-md">
                                        <!--begin::Svg Icon | path:/metronic/theme/html/demo10/dist/assets/media/svg/icons/Design/PenAndRuller.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"></path>
                                                <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>Export</button>
                                    <!--begin::Dropdown Menu-->
                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-62px, -254px, 0px);" x-placement="top-end">
                                        <!--begin::Navigation-->
                                        <ul class="navi flex-column navi-hover py-2">
                                            <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link" id="export_print">
                                                    <span class="navi-icon">
                                                        <i class="la la-print"></i>
                                                    </span>
                                                    <span class="navi-text">Print</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link" id="export_copy">
                                                    <span class="navi-icon">
                                                        <i class="la la-copy"></i>
                                                    </span>
                                                    <span class="navi-text">Copy</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link" id="export_excel">
                                                    <span class="navi-icon">
                                                        <i class="la la-file-excel-o"></i>
                                                    </span>
                                                    <span class="navi-text">Excel</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link" id="export_csv">
                                                    <span class="navi-icon">
                                                        <i class="la la-file-text-o"></i>
                                                    </span>
                                                    <span class="navi-text">CSV</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link" id="export_pdf">
                                                    <span class="navi-icon">
                                                        <i class="la la-file-pdf-o"></i>
                                                    </span>
                                                    <span class="navi-text">PDF</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <!--end::Navigation-->
                                    </div>
                                    <!--end::Dropdown Menu-->
                                </div>
                                <!--end::Dropdown-->
                                <!--begin::Button-->
                                <button class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#DepartmentModel" id="add_department">
                                    <span class="svg-icon svg-icon-md">
                                        <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Design/Flatten.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <circle fill="#000000" cx="9" cy="15" r="6"></circle>
                                                <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>New Department</button>
                                <!--end::Button-->
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin: Datatable-->
                            <div id="kt_datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 footer">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="DepartmentData" class="table table-separate table-head-custom table-checkable dataTable dtr-inline collapsed" role="grid" style="width: 700px;">
                                            <thead>
                                                <tr role="row">
                                                    <th>ID</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Username</th>
                                                    <th>Status</th>
                                                    <th>Created at</th>
                                                    <th class="sorting-disabled">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Username</th>
                                                    <th>Status</th>
                                                    <th>Created at</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            <!--end: Datatable-->
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Entry-->
        </div>
        <!--end::Content-->
        <!-- Modal-->
        <div class="modal fade" id="DepartmentModel" tabindex="-1" role="dialog" aria-labelledby="DepartmentModelLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="teacherModelLabel">Modal Title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--begin::Entry-->
                        <form class="form" id="department_form" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="alert alert-custom alert-primary fade show" id="alert_" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text font-weight-bold">Don't forget to generate Department <b>Passkey</b> & <b>Token</b></div>
                                    <div class="alert-close">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-8">
                                        <label>Department Name:</label>
                                        <input class="form-control form-control-solid" name="ett_name" type="text" id="ett_name" placeholder="Enter Dept Name" required />
                                        <span class="form-text text-muted">
                                            Please enter department name
                                        </span>
                                    </div>
                                    <div class="col-xl-4">
                                        <label>Department Short Name:</label>
                                        <input class="form-control form-control-solid" name="ett_sname" type="text" id="ett_sname" placeholder="Enter Dept Short Name" required />
                                        <span class="form-text text-muted">
                                            Please enter short department name
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Phone:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-solid" name="ett_phone" id="ett_phone" placeholder="Enter Phone No" required />
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-phone"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <span class="form-text text-muted">Please enter department phone no</span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Email:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-solid " name="ett_email" id="ett_email" placeholder="Enter Department E-Mail Address" required />
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-at"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <span class="form-text text-muted">Please enter department email</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label>Username:</label>
                                        <div class="input-group">
                                            <input class="form-control form-control-solid " name="ett_username" type="text" id="ett_username" placeholder="Enter Teacher Username" required />
                                        </div>
                                        <span class="form-text text-muted">Please enter department Username</span>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Password:</label>
                                        <div class="input-group">
                                            <input class="form-control form-control-solid " name="ett_password" type="password" id="ett_password" placeholder="Enter Teacher Password" required />
                                        </div>
                                        <span class="form-text text-muted">Please enter department Password</span>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Confirm Password:</label>
                                        <div class="input-group">
                                            <input class="form-control form-control-solid " name="ett_cpassword" type="password" id="ett_cpassword" placeholder="Enter Teacher Password" required />
                                        </div>
                                        <span class="form-text text-muted">
                                            Please confirm department Password
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Passkey:</label>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button" id="gen_passkey" name="gen_passkey" title="Generate Passkey"><i class="flaticon-refresh"></i></button>
                                            </div>
                                            <input class="form-control form-control-solid form-control-lg" name="ett_passkey" type="text" id="ett_passkey" required />

                                        </div>
                                        <span class="form-text text-muted">
                                            Please generate teacher passkey
                                        </span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Token:</label>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button" id="gen_token" name="gen_token" title="Generate Token!"><i class="flaticon-refresh"></i></button>
                                            </div>
                                            <input class="form-control form-control-solid form-control-lg" name="ett_hash" type="text" id="ett_hash" required />

                                        </div>
                                        <span class="form-text text-muted">Please generate teacher token</span>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button data-dismiss="modal" class="btn btn-primary mr-2">
                                            Close
                                        </button>
                                    </div>
                                    <div class="col-lg-6 text-lg-right">
                                        <input type="hidden" name="ett_id" id="ett_id" />
                                        <input type="hidden" name="operation" id="operation" />
                                        <input type="submit" name="teacher_action" value="Submit" class="teacher_action btn btn-danger">                                            
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end::Entry-->
                    </div>
                </div>
            </div>
        </div>
        

        <?php require('footer.php'); ?>
        <!--begin::Page Scripts(used by this page)-->
        <script src="../theme/plugins/custom/datatables/datatables.bundlec7e5.js"></script>
        <!--end::Page Scripts-->
        
        <script type="text/javascript" language="javascript">
            $(document).ready(function() {
                $('#add_department').click(function() {
                    $('#department_form')[0].reset();
                    $('.modal-title').text("Add Department");
                    $('#action').val("Add");
                    $('#operation').val("Add");
                    $('#teacher_uploaded_avatar').html('');
                });
                var t = $("#DepartmentData").DataTable({
                    "processing": true,
                    "serverSide": true,
                    "order": [],
                    "ajax": {
                        url: "emd_fetch.php",
                        dataType: "json",
                        type: "POST"
                    },
                    "columnDefs": [{
                        "target": [0, 1, 2, 3, 4, 5, 6, 7],
                        "orderable": true
                    }],
                    buttons: [
                        'print',
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdfHtml5'
                    ],
                    "pageLength": 10,
                    "responsive": true,
                });

                $("#export_print").on("click", function(e) {
                    e.preventDefault(), t.button(0).trigger()
                }),
                $("#export_copy").on("click", function(e) {
                    e.preventDefault(), t.button(1).trigger()
                }),
                $("#export_excel").on("click", function(e) {
                    e.preventDefault(), t.button(2).trigger()
                }),
                $("#export_csv").on("click", function(e) {
                    e.preventDefault(), t.button(3).trigger()
                }),
                $("#export_pdf").on("click", function(e) {
                    e.preventDefault(), t.button(4).trigger()
                });
                
                $(document).on('submit', '#department_form', function(event) {
                    event.preventDefault();
                    var form_data = $(this).serialize();
                    $.ajax({
                        url: "emd_insert.php",
                        method: 'POST',
                        data: form_data,
                        dataType: "json",
                        success: function(data) {
                            if (data.err != '') {
                                $('.alert_text').html(data.err);
                                Swal.fire({
                                    title: "Error",
                                    text: data.err,
                                    icon: "warning",
                                    showClass: {
                                        popup: 'animate__animated animate__fadeInDown'
                                    },
                                    hideClass: {
                                        popup: 'animate__animated animate__fadeOutUp'
                                    },
                                    timer: 5000,
                                    onOpen: function() {
                                        Swal.showLoading()
                                    }
                                }).then(function(result) {
                                    if (result.dismiss === "timer") {
                                        //console.log("I was closed by the timer")
                                    }
                                });                                
                                t.ajax.reload();
                            } else {
                                Swal.fire({
                                    title: "Message",
                                    text: data.msg,
                                    icon: "success",
                                    showClass: {
                                        popup: 'animate__animated animate__fadeInDown'
                                    },
                                    hideClass: {
                                        popup: 'animate__animated animate__fadeOutUp'
                                    },
                                    timer: 5000,
                                    onOpen: function() {
                                        Swal.showLoading()
                                    }
                                }).then(function(result) {
                                    if (result.dismiss === "timer") {
                                        //console.log("I was closed by the timer")
                                    }
                                });                                
                                $('#department_form')[0].reset();
                                $('#DepartmentModel').modal('hide');
                                t.ajax.reload();
                            }
                        }
                    });

                });

                $(document).on('click', '.ett_edit', function() {
                    var ett_id = $(this).attr("id");
                    var operation = 'fetch_single';
                    $.ajax({
                        url: "emd_insert.php",
                        method: "POST",
                        data: {
                            ett_id: ett_id,
                            operation: operation
                        },
                        dataType: "json",
                        success: function(data) {
                            $('#DepartmentModel').modal('show');
                            $("#ett_password").prop("type", "text");
                            $("#ett_cpassword").prop("type", "text");
                            $(".teacher_action").prop('type',"hidden");
                            $("#alert_").hide();
                            $('#ett_name').val(data.te_name);
                            $('#ett_sname').val(data.te_sname);
                            $('#ett_phone').val(data.te_phone);
                            $('#ett_email').val(data.te_email);
                            $('#ett_username').val(data.te_username);
                            $('#ett_password').val(data.te_password);
                            $('#ett_cpassword').val(data.te_password);
                            $('#ett_passkey').val(data.te_passkey);
                            $('#ett_hash').val(data.te_token);
                            $('.modal-title').text("View Department Details");

                        }
                    })
                });

                $(document).on('click', '.ett_delete', function() {
                    var ett_id = $(this).attr("id");
                    var ett_status = $(this).data('status');
                    var operation = "delete";
                    Swal.fire({
                        title: "Are you sure to change the status?",
                        text: "You will be revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Yes, change it!"
                    }).then(function(result) {
                        if (result.value) {
                            $.ajax({
                            url: "emd_insert.php",
                            method: "POST",
                            data: {
                                ett_id: ett_id,
                                ett_status: ett_status,
                                operation: operation
                            },
                            success: function(data) {
                                Swal.fire(
                                    "Changed!",
                                    "Department status has been changed!.",
                                    "success"
                                )
                                t.ajax.reload();
                            }
                        });
                            
                        }
                    });                    
                });                

                $(document).on('click', '#gen_passkey', function() {
                    var passkey = generate_passkey(60);
                    document.getElementById("ett_passkey").value = passkey;
                });
                
                $(document).on('click', '#gen_token', function() {
                    var token = generate_token(60);
                    document.getElementById("ett_hash").value = token;
                });



            });
        </script>
        
        <script>
            function generate_passkey(length) {
                //edit the token allowed characters
                var a = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890~`@#$%^&*--+=".split("");
                var b = [];
                for (var i = 0; i < length; i++) {
                    var j = (Math.random() * Math.random() * Math.random() * (a.length - 1)).toFixed(0);
                    b[i] = a[j];
                }
                return b.join("");
            }

            function generate_token(length) {
                //edit the token allowed characters
                var a = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*_-+=".split("");
                var b = [];
                for (var i = 0; i < length; i++) {
                    var j = (Math.random() * Math.random() * (a.length - 1)).toFixed(0);
                    b[i] = a[j];
                }
                return b.join("");
            }
        </script>
</body>
<!--end::Body-->


</html>

<?php
}else{
    Redirect::to(404);
}
?>