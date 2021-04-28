
<?php

require_once 'core/init.php';
require '../../includes/function.php';

$user = new User();
if($user->isLoggedIn()){


?>
<?php
if (!$ett_hash = Input::get('emd_department_hash')) {
    Redirect::to('../index.php');
} else {
    
    $ett_teacher = new Student(convert_string('encrypt',Input::get('emd_department_hash')));
    
    if (!$ett_teacher->exists()) {
        //Redirect::to('../index.php');
        
    } else {
        $data = $ett_teacher->data();
        $d_data = new Department($data->fac_dept_hash);
        $datas = $d_data->data();
        $d_datas = new Faculty($data->fac_mentor_hash);
        $mentor = $d_datas->data();

?>



        <!DOCTYPE html>

        <html lang="en">
        <!--begin::Head-->

        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

        <head>
            <meta charset="utf-8" />
            <title><?php echo escape($data->fac_name) ?> | Profile Overview</title>
            <meta name="description" content="View all Students" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <meta name="robots" content="noindex, nofollow">
            <link rel="canonical" href="#" />
            <!--begin::Fonts-->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
            <!--end::Fonts-->
            <!--begin::Page Vendors Styles(used by this page)-->
            <link href="../../theme/plugins/custom/datatables/datatables.bundlec7e5.css?v=7.1.2" rel="stylesheet" type="text/css">
            <link href="../../theme/plugins/custom/fullcalendar/fullcalendar.bundlec7e5.css?v=7.1.1" rel="stylesheet" type="text/css" />
            <!--end::Page Vendors Styles-->
            <!--begin::Global Theme Styles(used by all pages)-->
            <link href="../../theme/plugins/global/plugins.bundlec7e5.css?v=7.1.1" rel="stylesheet" type="text/css" />
            <link href="../../theme/plugins/custom/prismjs/prismjs.bundlec7e5.css?v=7.1.1" rel="stylesheet" type="text/css" />
            <link href="../../theme/css/style.bundlec7e5.css?v=7.1.1" rel="stylesheet" type="text/css" />
            <!--end::Global Theme Styles-->
            <!--begin::Layout Themes(used by all pages)-->
            <!--end::Layout Themes-->
            <link rel="shortcut icon" href="../theme/media/logos/favicon.ico" />            

        </head>
        <!--end::Head-->
        <!--begin::Body-->

        <body id="kt_body" class="header-fixed header-mobile-fixed">            
            <!--begin::Main-->
            <?php require('../aside.php'); ?>
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
                                            <a href="../../index.php" class="menu-link">
                                                <span class="menu-text">Dashboard</span>
                                            </a>
                                        </li>
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="../index.php" class="menu-link">
                                                <span class="menu-text">Department</span>
                                            </a>
                                        </li>                                        
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="../../em_faculty/index.php" class="menu-link">
                                                <span class="menu-text">Faculty</span>
                                            </a>
                                        </li>
                                        <li class="menu-item menu-item-active" aria-haspopup="true">
                                            <a href="../index.php" class="menu-link">
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
                        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                            <!--begin::Info-->
                            <div class="d-flex align-items-start flex-wrap mr-1">
                                <!--begin::Mobile Toggle-->
                                <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
                                    <span></span>
                                </button>
                                <!--end::Mobile Toggle-->
                                <!--begin::Page Heading-->
                                <div class="d-flex align-items-baseline flex-wrap mr-5">
                                    <!--begin::Page Title-->
                                    <h5 class="text-dark font-weight-bold my-1 mr-5">KIOT@<?php echo $datas->dept_name ?>#<?php echo $mentor->fac_name ?></h5>
                                    <!--end::Page Title-->
                                    <!--begin::Breadcrumb-->
                                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                        <li class="breadcrumb-item">
                                            <a href="#" class="text-muted">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="#" class="text-muted">Student</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="#" class="text-muted"><?php echo escape($data->fac_name) ?></a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="#" class="text-muted">Profile</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="#" class="text-muted">Overview</a>
                                        </li>
                                    </ul>
                                    <!--end::Breadcrumb-->
                                </div>
                                <!--end::Page Heading-->
                            </div>
                            <!--end::Info-->
                            <!--begin::Toolbar-->
                            <div class="d-flex align-items-center">
                                <!--begin::Actions-->
                                <a href="#" class="btn btn-light-primary font-weight-bolder btn-sm">Actions</a>
                                <!--end::Actions-->
                                <!--begin::Dropdown-->
                                <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
                                    <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="svg-icon svg-icon-success svg-icon-2x">
                                            <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Files/File-plus.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0 m-0">
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
                    </div>
                    <!--end::Subheader-->
                    <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container-fluid">
                            <!--begin::Profile Overview-->
                            <div class="d-flex flex-row">
                                <!--begin::Aside-->
                                <div class="flex-row-auto offcanvas-mobile w-300px w-xl-350px" id="kt_profile_aside">
                                    <!--begin::Profile Card-->
                                    <div class="card card-custom card-stretch">
                                        <!--begin::Body-->
                                        <div class="card-body pt-4">
                                            <!--begin::Toolbar-->
                                            <div class="d-flex justify-content-end">
                                                <div class="dropdown dropdown-inline">
                                                    <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ki ki-bold-more-hor"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
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
                                            </div>
                                            <!--end::Toolbar-->
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <?php if ($data->fac_image) { ?>
                                                    <div class="symbol mr-5 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                                        <div class="symbol symbol-60">
                                                            <img src="data:image/png;base64,<?php echo base64_encode($ett_teacher->data()->fac_image); ?>" alt="<?php echo escape($data->fac_name); ?> image">
                                                        </div>
                                                        <i class="symbol-badge bg-success"></i>
                                                    </div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                                        <div class=" symbol-label font-size-auto"><?php echo $data->fac_name; ?>
                                                        </div>
                                                        <i class="symbol-badge bg-success"></i>
                                                    </div>
                                                <?php } ?>
                                                <div>
                                                    <a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary"><?php echo escape($data->fac_name); ?></a>
                                                    <div class="text-muted"><?php echo escape($data->fac_department) ?></div>
                                                    <div class="mt-2">
                                                        <a href="#" class="btn btn-sm btn-primary font-weight-bold mr-2 py-2 px-3 px-xxl-5 my-1"><?php echo escape($datas->dept_sname) ?></a>
                                                        <a href="#" class="btn btn-sm btn-danger font-weight-bold mr-2 py-2 px-3 px-xxl-5 my-1"><?php echo escape($data->fac_year) ?></a>                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::User-->
                                            <!--begin::Contact-->
                                            <div class="py-9">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="font-weight-bold mr-2">Name:</span>
                                                    <a href="#" class="text-muted text-hover-primary"><?php echo escape($data->fac_name); ?></a>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="font-weight-bold mr-2">Email:</span>
                                                    <a href="#" class="text-muted text-hover-primary"><?php echo escape($data->fac_email); ?></a>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="font-weight-bold mr-2">Phone:</span>
                                                    <span class="text-muted"><?php echo escape($data->fac_phone); ?></span>
                                                </div>                                                
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="font-weight-bold mr-2">Gender:</span>
                                                    <span class="text-muted"><?php echo escape($data->fac_gender); ?></span>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="font-weight-bold mr-2">Date of Birth:</span>
                                                    <span class="label label-inline label-warning"><?php echo escape($data->fac_dob); ?></span>
                                                </div>                                                
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="font-weight-bold mr-2">Location:</span>
                                                    <span class="text-muted"><?php echo escape($data->fac_address); ?></span>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <span class="font-weight-bold mr-2">Joined at:</span>
                                                    <span class="text-muted"><?php echo escape($data->fac_created_at); ?></span>
                                                </div>
                                            </div>
                                            <!--end::Contact-->
                                            <!--begin::Nav-->
                                            <div class="navi navi-bold navi-hover navi-active navi-link-rounded">
                                                <div class="navi-item mb-2">
                                                    <a href="index.php?emd_department_hash=<?php echo escape(convert_string('decrypt',$data->fac_hash)); ?>&em_admin=admin" class="navi-link py-4 active">
                                                        <span class="navi-icon mr-2">
                                                            <span class="svg-icon">
                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Design/Layers.svg-->
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                                        <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
                                                                        <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
                                                                    </g>
                                                                </svg>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </span>
                                                        <span class="navi-text font-size-lg">Profile Overview</span>
                                                    </a>
                                                </div>
                                                <div class="navi-item mb-2">
                                                    <a href="ett_personal-information.php?emd_department_hash=<?php echo escape(convert_string('decrypt',$data->fac_hash)); ?>&em_admin=admin" class="navi-link py-4">
                                                        <span class="navi-icon mr-2">
                                                            <span class="svg-icon">
                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/User.svg-->
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                                        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                                    </g>
                                                                </svg>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </span>
                                                        <span class="navi-text font-size-lg">Personal Information</span>
                                                    </a>
                                                </div>
                                                <div class="navi-item mb-2">
                                                    <a href="ett_account-information.php?emd_department_hash=<?php echo escape(convert_string('decrypt',$data->fac_hash)); ?>&em_admin=admin" class="navi-link py-4">
                                                        <span class="navi-icon mr-2">
                                                            <span class="svg-icon">
                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Code/Compiling.svg-->
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
                                                                        <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
                                                                    </g>
                                                                </svg>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </span>
                                                        <span class="navi-text font-size-lg">Account Information</span>
                                                    </a>
                                                </div>                                                
                                                <div class="navi-item mb-2">
                                                    <a href="efo_event.php?emd_department_hash=<?php echo escape(convert_string('decrypt',$data->fac_hash)); ?>&em_admin=admin" class="navi-link py-4" data-toggle="tooltip" title="Event Organized" data-placement="right">
                                                        <span class="navi-icon mr-2">
                                                            <span class="svg-icon">
                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Layout/Layout-top-panel-6.svg-->
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <rect fill="#000000" x="2" y="5" width="19" height="4" rx="1" />
                                                                        <rect fill="#000000" opacity="0.3" x="2" y="11" width="19" height="10" rx="1" />
                                                                    </g>
                                                                </svg>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </span>
                                                        <span class="navi-text font-size-lg">Event Organized</span>
                                                        <span class="navi-label">
                                                            <span class="label label-light-primary label-inline font-weight-bold">new</span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="navi-item mb-2">
                                                    <a href="efp_event.php.php?emd_department_hash=<?php echo escape(convert_string('decrypt',$data->fac_hash)); ?>&em_admin=admin" class="navi-link py-4" data-toggle="tooltip" title="Event Participates" data-placement="right">
                                                        <span class="navi-icon mr-2">
                                                            <span class="svg-icon">
                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Files/File.svg-->
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                                        <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                        <rect fill="#000000" x="6" y="11" width="9" height="2" rx="1" />
                                                                        <rect fill="#000000" x="6" y="15" width="5" height="2" rx="1" />
                                                                    </g>
                                                                </svg>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </span>
                                                        <span class="navi-text font-size-lg">Event Participate</span>
                                                        <span class="navi-label">
                                                            <span class="label label-light-primary label-inline font-weight-bold">new</span>
                                                        </span>
                                                    </a>
                                                </div>                                                
                                            </div>
                                            <!--end::Nav-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Profile Card-->
                                </div>
                                <!--end::Aside-->
                                <!--begin::Content-->
                                <div class="flex-row-fluid ml-lg-8">
                                    <!--begin::Row-->
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <!--begin::List Widget 14-->
                                            <div class="card card-custom card-stretch gutter-b">
                                                <!--begin::Header-->
                                                <div class="card-header border-0">
                                                    <h3 class="card-title font-weight-bolder text-dark">Market Leaders</h3>
                                                    <div class="card-toolbar">
                                                        <div class="dropdown dropdown-inline">
                                                            <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="ki ki-bold-more-ver"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
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
                                                    </div>
                                                </div>
                                                <!--end::Header-->
                                                <!--begin::Body-->
                                                <div class="card-body pt-2">
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-wrap align-items-center mb-10">
                                                        <!--begin::Symbol-->
                                                        <div class="symbol symbol-60 symbol-2by3 flex-shrink-0 mr-4">
                                                            <div class="symbol-label" style="background-image: url('../../../../../theme/media/stock-600x400/img-17.jpg')"></div>
                                                        </div>
                                                        <!--end::Symbol-->
                                                        <!--begin::Title-->
                                                        <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">Cup &amp; Green</a>
                                                            <span class="text-muted font-weight-bold font-size-sm my-1">Local, clean &amp; environmental</span>
                                                            <span class="text-muted font-weight-bold font-size-sm">Created by:
                                                                <span class="text-primary font-weight-bold">CoreAd</span></span>
                                                        </div>
                                                        <!--end::Title-->
                                                        <!--begin::Info-->
                                                        <div class="d-flex align-items-center py-lg-0 py-2">
                                                            <div class="d-flex flex-column text-right">
                                                                <span class="text-dark-75 font-weight-bolder font-size-h4">24,900</span>
                                                                <span class="text-muted font-size-sm font-weight-bolder">votes</span>
                                                            </div>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin: Item-->
                                                    <div class="d-flex flex-wrap align-items-center mb-10">
                                                        <!--begin::Symbol-->
                                                        <div class="symbol symbol-60 symbol-2by3 flex-shrink-0 mr-4">
                                                            <div class="symbol-label" style="background-image: url('../../../../../theme/media/stock-600x400/img-10.jpg')"></div>
                                                        </div>
                                                        <!--end::Symbol-->
                                                        <!--begin::Title-->
                                                        <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">Yellow Background</a>
                                                            <span class="text-muted font-weight-bold font-size-sm my-1">Strong abstract concept</span>
                                                            <span class="text-muted font-weight-bold font-size-sm">Created by:
                                                                <span class="text-primary font-weight-bold">KeenThemes</span></span>
                                                        </div>
                                                        <!--end::Title-->
                                                        <!--begin::Info-->
                                                        <div class="d-flex align-items-center py-lg-0 py-2">
                                                            <div class="d-flex flex-column text-right">
                                                                <span class="text-dark-75 font-weight-bolder font-size-h4">70,380</span>
                                                                <span class="text-muted font-weight-bolder font-size-sm">votes</span>
                                                            </div>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end: Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-wrap align-items-center mb-10">
                                                        <!--begin::Symbol-->
                                                        <div class="symbol symbol-60 symbol-2by3 flex-shrink-0 mr-4">
                                                            <div class="symbol-label" style="background-image: url('../../../../../theme/media/stock-600x400/img-1.jpg')"></div>
                                                        </div>
                                                        <!--end::Symbol-->
                                                        <!--begin::Title-->
                                                        <div class="d-flex flex-column flex-grow-1 pr-3">
                                                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">Nike &amp; Blue</a>
                                                            <span class="text-muted font-weight-bold font-size-sm my-1">Footwear overalls</span>
                                                            <span class="text-muted font-weight-bold font-size-sm">Created by:
                                                                <span class="text-primary font-weight-bold">Invision Inc.</span></span>
                                                        </div>
                                                        <!--end::Title-->
                                                        <!--begin::Info-->
                                                        <div class="d-flex align-items-center py-lg-0 py-2">
                                                            <div class="d-flex flex-column text-right">
                                                                <span class="text-dark-75 font-size-h4 font-weight-bolder">7,200</span>
                                                                <span class="text-muted font-size-sm font-weight-bolder">votes</span>
                                                            </div>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-wrap align-items-center mb-10">
                                                        <!--begin::Symbol-->
                                                        <div class="symbol symbol-60 symbol-2by3 flex-shrink-0 mr-4">
                                                            <div class="symbol-label" style="background-image: url('../../../../../theme/media/stock-600x400/img-9.jpg')"></div>
                                                        </div>
                                                        <!--end::Symbol-->
                                                        <!--begin::Title-->
                                                        <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">Desserts platter</a>
                                                            <span class="text-muted font-size-sm font-weight-bold my-1">Food trends &amp; reviews</span>
                                                            <span class="text-muted font-size-sm font-weight-bold">Created by:
                                                                <span class="text-primary font-weight-bold">Figma Studio</span></span>
                                                        </div>
                                                        <!--end::Title-->
                                                        <!--begin::Info-->
                                                        <div class="d-flex align-items-center py-lg-0 py-2">
                                                            <div class="d-flex flex-column text-right">
                                                                <span class="text-dark-75 font-size-h4 font-weight-bolder">36,450</span>
                                                                <span class="text-muted font-size-sm font-weight-bolder">votes</span>
                                                            </div>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-wrap align-items-center">
                                                        <!--begin::Symbol-->
                                                        <div class="symbol symbol-60 symbol-2by3 flex-shrink-0 mr-4">
                                                            <div class="symbol-label" style="background-image: url('../../../../../theme/media/stock-600x400/img-12.jpg')"></div>
                                                        </div>
                                                        <!--end::Symbol-->
                                                        <!--begin::Title-->
                                                        <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">Cup &amp; Green</a>
                                                            <span class="text-muted font-weight-bold font-size-sm my-1">Local, clean &amp; environmental</span>
                                                            <span class="text-muted font-weight-bold font-size-sm">Created by:
                                                                <span class="text-primary font-weight-bold">CoreAd</span></span>
                                                        </div>
                                                        <!--end::Title-->
                                                        <!--begin::Info-->
                                                        <div class="d-flex align-items-center py-lg-0 py-2">
                                                            <div class="d-flex flex-column text-right">
                                                                <span class="text-dark-75 font-weight-bolder font-size-h4">23,900</span>
                                                                <span class="text-muted font-size-sm font-weight-bolder">votes</span>
                                                            </div>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::Item-->
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                            <!--end::List Widget 14-->
                                        </div>
                                        <div class="col-lg-6">
                                            <!--begin::List Widget 10-->
                                            <div class="card card-custom card-stretch gutter-b">
                                                <!--begin::Header-->
                                                <div class="card-header border-0">
                                                    <h3 class="card-title font-weight-bolder text-dark">Notifications</h3>
                                                    <div class="card-toolbar">
                                                        <div class="dropdown dropdown-inline">
                                                            <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="ki ki-bold-more-ver"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                                                <!--begin::Naviigation-->
                                                                <ul class="navi">
                                                                    <li class="navi-header font-weight-bold py-5">
                                                                        <span class="font-size-lg">Add New:</span>
                                                                        <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
                                                                    </li>
                                                                    <li class="navi-separator mb-3 opacity-70"></li>
                                                                    <li class="navi-item">
                                                                        <a href="#" class="navi-link">
                                                                            <span class="navi-icon">
                                                                                <i class="flaticon2-shopping-cart-1"></i>
                                                                            </span>
                                                                            <span class="navi-text">Order</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="navi-item">
                                                                        <a href="#" class="navi-link">
                                                                            <span class="navi-icon">
                                                                                <i class="navi-icon flaticon2-calendar-8"></i>
                                                                            </span>
                                                                            <span class="navi-text">Members</span>
                                                                            <span class="navi-label">
                                                                                <span class="label label-light-danger label-rounded font-weight-bold">3</span>
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="navi-item">
                                                                        <a href="#" class="navi-link">
                                                                            <span class="navi-icon">
                                                                                <i class="navi-icon flaticon2-telegram-logo"></i>
                                                                            </span>
                                                                            <span class="navi-text">Project</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="navi-item">
                                                                        <a href="#" class="navi-link">
                                                                            <span class="navi-icon">
                                                                                <i class="navi-icon flaticon2-new-email"></i>
                                                                            </span>
                                                                            <span class="navi-text">Record</span>
                                                                            <span class="navi-label">
                                                                                <span class="label label-light-success label-rounded font-weight-bold">5</span>
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="navi-separator mt-3 opacity-70"></li>
                                                                    <li class="navi-footer pt-5 pb-4">
                                                                        <a class="btn btn-light-primary font-weight-bolder btn-sm" href="#">More options</a>
                                                                        <a class="btn btn-clean font-weight-bold btn-sm d-none" href="#" data-toggle="tooltip" data-placement="right" title="Click to learn more...">Learn more</a>
                                                                    </li>
                                                                </ul>
                                                                <!--end::Naviigation-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Header-->
                                                <!--begin::Body-->
                                                <div class="card-body pt-0">
                                                    <!--begin::Item-->
                                                    <div class="mb-6">
                                                        <!--begin::Content-->
                                                        <div class="d-flex align-items-center flex-grow-1">
                                                            <!--begin::Checkbox-->
                                                            <label class="checkbox checkbox-lg checkbox-lg flex-shrink-0 mr-4">
                                                                <input type="checkbox" value="1" />
                                                                <span></span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Section-->
                                                            <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                                                <!--begin::Info-->
                                                                <div class="d-flex flex-column align-items-cente py-2 w-75">
                                                                    <!--begin::Title-->
                                                                    <a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">Daily Standup Meeting</a>
                                                                    <!--end::Title-->
                                                                    <!--begin::Data-->
                                                                    <span class="text-muted font-weight-bold">Due in 2 Days</span>
                                                                    <!--end::Data-->
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::Label-->
                                                                <span class="label label-lg label-light-primary label-inline font-weight-bold py-4">Approved</span>
                                                                <!--end::Label-->
                                                            </div>
                                                            <!--end::Section-->
                                                        </div>
                                                        <!--end::Content-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="mb-6">
                                                        <!--begin::Content-->
                                                        <div class="d-flex align-items-center flex-grow-1">
                                                            <!--begin::Checkbox-->
                                                            <label class="checkbox checkbox-lg checkbox-lg flex-shrink-0 mr-4">
                                                                <input type="checkbox" value="1" />
                                                                <span></span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Section-->
                                                            <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                                                <!--begin::Info-->
                                                                <div class="d-flex flex-column align-items-cente py-2 w-75">
                                                                    <!--begin::Title-->
                                                                    <a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">Group Town Hall Meet-up with showcase</a>
                                                                    <!--end::Title-->
                                                                    <!--begin::Data-->
                                                                    <span class="text-muted font-weight-bold">Due in 2 Days</span>
                                                                    <!--end::Data-->
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::Label-->
                                                                <span class="label label-lg label-light-warning label-inline font-weight-bold py-4">In Progress</span>
                                                                <!--end::Label-->
                                                            </div>
                                                            <!--end::Section-->
                                                        </div>
                                                        <!--end::Content-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="mb-6">
                                                        <!--begin::Content-->
                                                        <div class="d-flex align-items-center flex-grow-1">
                                                            <!--begin::Checkbox-->
                                                            <label class="checkbox checkbox-lg checkbox-lg flex-shrink-0 mr-4">
                                                                <input type="checkbox" value="1" />
                                                                <span></span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Section-->
                                                            <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                                                <!--begin::Info-->
                                                                <div class="d-flex flex-column align-items-cente py-2 w-75">
                                                                    <!--begin::Title-->
                                                                    <a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">Next sprint planning and estimations</a>
                                                                    <!--end::Title-->
                                                                    <!--begin::Data-->
                                                                    <span class="text-muted font-weight-bold">Due in 2 Days</span>
                                                                    <!--end::Data-->
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::Label-->
                                                                <span class="label label-lg label-light-success label-inline font-weight-bold py-4">Success</span>
                                                                <!--end::Label-->
                                                            </div>
                                                            <!--end::Section-->
                                                        </div>
                                                        <!--end::Content-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="mb-6">
                                                        <!--begin::Content-->
                                                        <div class="d-flex align-items-center flex-grow-1">
                                                            <!--begin::Checkbox-->
                                                            <label class="checkbox checkbox-lg checkbox-lg flex-shrink-0 mr-4">
                                                                <input type="checkbox" value="1" />
                                                                <span></span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Section-->
                                                            <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                                                <!--begin::Info-->
                                                                <div class="d-flex flex-column align-items-cente py-2 w-75">
                                                                    <!--begin::Title-->
                                                                    <a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">Sprint delivery and project deployment</a>
                                                                    <!--end::Title-->
                                                                    <!--begin::Data-->
                                                                    <span class="text-muted font-weight-bold">Due in 2 Days</span>
                                                                    <!--end::Data-->
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::Label-->
                                                                <span class="label label-lg label-light-danger label-inline font-weight-bold py-4">Rejected</span>
                                                                <!--end::Label-->
                                                            </div>
                                                            <!--end::Section-->
                                                        </div>
                                                        <!--end::Content-->
                                                    </div>
                                                    <!--end: Item-->
                                                    <!--begin: Item-->
                                                    <div class="">
                                                        <!--begin::Content-->
                                                        <div class="d-flex align-items-center flex-grow-1">
                                                            <!--begin::Checkbox-->
                                                            <label class="checkbox checkbox-lg checkbox-lg flex-shrink-0 mr-4">
                                                                <input type="checkbox" value="1" />
                                                                <span></span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Section-->
                                                            <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                                                <!--begin::Info-->
                                                                <div class="d-flex flex-column align-items-cente py-2 w-75">
                                                                    <!--begin::Title-->
                                                                    <a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">Data analytics research showcase</a>
                                                                    <!--end::Title-->
                                                                    <!--begin::Data-->
                                                                    <span class="text-muted font-weight-bold">Due in 2 Days</span>
                                                                    <!--end::Data-->
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::Label-->
                                                                <span class="label label-lg label-light-warning label-inline font-weight-bold py-4">In Progress</span>
                                                                <!--end::Label-->
                                                            </div>
                                                            <!--end::Section-->
                                                        </div>
                                                        <!--end::Content-->
                                                    </div>
                                                    <!--end: Item-->
                                                </div>
                                                <!--end: Card Body-->
                                            </div>
                                            <!--end: Card-->
                                            <!--end: List Widget 10-->
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Advance Table: Widget 7-->
                                    <div class="card card-custom gutter-b">
                                        <!--begin::Header-->
                                        <div class="card-header border-0 pt-5">
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label font-weight-bolder text-dark">New Arrivals</span>
                                                <span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span>
                                            </h3>
                                            <div class="card-toolbar">
                                                <ul class="nav nav-pills nav-pills-sm nav-dark-75">
                                                    <li class="nav-item">
                                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#kt_tab_pane_12_1">Month</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#kt_tab_pane_12_2">Week</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link py-2 px-4 active" data-toggle="tab" href="#kt_tab_pane_12_3">Day</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Body-->
                                        <div class="card-body pt-2 pb-0 mt-n3">
                                            <div class="tab-content mt-5" id="myTabTables12">
                                                <!--begin::Tap pane-->
                                                <div class="tab-pane fade" id="kt_tab_pane_12_1" role="tabpanel" aria-labelledby="kt_tab_pane_12_1">
                                                    <!--begin::Table-->
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless table-vertical-center">
                                                            <thead>
                                                                <tr>
                                                                    <th class="p-0 w-50px"></th>
                                                                    <th class="p-0 min-w-200px"></th>
                                                                    <th class="p-0 min-w-120px"></th>
                                                                    <th class="p-0 min-w-120px"></th>
                                                                    <th class="p-0 min-w-120px"></th>
                                                                    <th class="p-0 min-w-160px"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="p-0 py-4">
                                                                        <div class="symbol symbol-50 symbol-light mr-5">
                                                                            <span class="symbol-label">
                                                                                <img src="https://preview.keenthemes.com/metronic/theme/html/demo6/dist/assets/media/svg/misc/005-bebo.svg" class="h-50 align-self-center" alt="" />
                                                                            </span>
                                                                        </div>
                                                                    </td>
                                                                    <td class="pl-0">
                                                                        <a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Beats Studio</a>
                                                                        <span class="text-muted font-weight-bold d-block">FTP: bprow@bnc.cc</span>
                                                                    </td>
                                                                    <td class="text-right pr-0">
                                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$57,000</span>
                                                                        <span class="text-muted font-weight-bold">Paid</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="text-muted font-weight-bold">AngularJS, C#</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="label label-lg label-light-danger label-inline">Rejected</span>
                                                                    </td>
                                                                    <td class="pr-0 text-right">
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Settings-1.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
                                                                                        <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Communication/Write.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Trash.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="p-0 py-4">
                                                                        <div class="symbol symbol-50 symbol-light mr-5">
                                                                            <span class="symbol-label">
                                                                                <img src="https://preview.keenthemes.com/metronic/theme/html/demo6/dist/assets/media/svg/misc/014-kickstarter.svg" class="h-50 align-self-center" alt="" />
                                                                            </span>
                                                                        </div>
                                                                    </td>
                                                                    <td class="pl-0">
                                                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">KTR Application</a>
                                                                        <span class="text-muted font-weight-bold d-block">
                                                                            <span class="font-weight-bolder text-dark-75">FTP:</span>bprow@bnc.cc</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$45,200,000</span>
                                                                        <span class="text-muted font-weight-bold">Paid</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="text-muted font-weight-bold">ReactJS, Ruby</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="label label-lg label-light-warning label-inline">In Progress</span>
                                                                    </td>
                                                                    <td class="p-0 text-right">
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Settings-1.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
                                                                                        <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Communication/Write.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Trash.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="p-0 py-4">
                                                                        <div class="symbol symbol-50 symbol-light">
                                                                            <span class="symbol-label">
                                                                                <img src="https://preview.keenthemes.com/metronic/theme/html/demo6/dist/assets/media/svg/misc/006-plurk.svg" class="h-50 align-self-center" alt="" />
                                                                            </span>
                                                                        </div>
                                                                    </td>
                                                                    <td class="pl-0">
                                                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Sant Outstanding</a>
                                                                        <div>
                                                                            <span class="font-weight-bolder">Email:</span>
                                                                            <a class="text-muted font-weight-bold text-hover-primary" href="#">bprow@bnc.cc</a>
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$2,000,000</span>
                                                                        <span class="text-muted font-weight-bold">Paid</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="text-muted font-weight-bold">ReactJs, HTML</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="label label-lg label-light-primary label-inline">Approved</span>
                                                                    </td>
                                                                    <td class="pr-0 text-right">
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Settings-1.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
                                                                                        <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Communication/Write.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Trash.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="p-0 py-4">
                                                                        <div class="symbol symbol-50 symbol-light mr-5">
                                                                            <span class="symbol-label">
                                                                                <img src="https://preview.keenthemes.com/metronic/theme/html/demo6/dist/assets/media/svg/misc/015-telegram.svg" class="h-50 align-self-center" alt="" />
                                                                            </span>
                                                                        </div>
                                                                    </td>
                                                                    <td class="pl-0">
                                                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Telegram Mobile</a>
                                                                        <span class="text-muted font-weight-bold d-block">
                                                                            <span class="font-weight-bolder text-dark-75">FTP:</span>bprow@bnc.cc</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$4,600,000</span>
                                                                        <span class="text-muted font-weight-bold">Paid</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="text-muted font-weight-bold">Python, MySQL</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="label label-lg label-light-warning label-inline">In Progress</span>
                                                                    </td>
                                                                    <td class="p-0 text-right">
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Settings-1.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
                                                                                        <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Communication/Write.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Trash.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="p-0 py-4">
                                                                        <div class="symbol symbol-50 symbol-light mr-5">
                                                                            <span class="symbol-label">
                                                                                <img src="https://preview.keenthemes.com/metronic/theme/html/demo6/dist/assets/media/svg/misc/003-puzzle.svg" class="h-50 align-self-center" alt="" />
                                                                            </span>
                                                                        </div>
                                                                    </td>
                                                                    <td class="pl-0">
                                                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Cisco Management</a>
                                                                        <span class="text-muted font-weight-bold d-block">
                                                                            <span class="font-weight-bolder text-dark-75">FTP:</span>bprow@bnc.cc</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$560,000</span>
                                                                        <span class="text-muted font-weight-bold">Paid</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="text-muted font-weight-bold">Laravel, Metronic</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="label label-lg label-light-success label-inline">Success</span>
                                                                    </td>
                                                                    <td class="p-0 text-right">
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Settings-1.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
                                                                                        <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Communication/Write.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Trash.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!--end::Table-->
                                                </div>
                                                <!--end::Tap pane-->
                                                <!--begin::Tap pane-->
                                                <div class="tab-pane fade" id="kt_tab_pane_12_2" role="tabpanel" aria-labelledby="kt_tab_pane_12_2">
                                                    <!--begin::Table-->
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless table-vertical-center">
                                                            <thead>
                                                                <tr>
                                                                    <th class="p-0 w-50px"></th>
                                                                    <th class="p-0 min-w-200px"></th>
                                                                    <th class="p-0 min-w-120px"></th>
                                                                    <th class="p-0 min-w-120px"></th>
                                                                    <th class="p-0 min-w-120px"></th>
                                                                    <th class="p-0 min-w-160px"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="p-0 py-4">
                                                                        <div class="symbol symbol-50 symbol-light mr-5">
                                                                            <span class="symbol-label">
                                                                                <img src="https://preview.keenthemes.com/metronic/theme/html/demo6/dist/assets/media/svg/misc/015-telegram.svg" class="h-50 align-self-center" alt="" />
                                                                            </span>
                                                                        </div>
                                                                    </td>
                                                                    <td class="pl-0">
                                                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Telegram Mobile</a>
                                                                        <span class="text-muted font-weight-bold d-block">
                                                                            <span class="font-weight-bolder text-dark-75">FTP:</span>bprow@bnc.cc</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$4,600,000</span>
                                                                        <span class="text-muted font-weight-bold">Paid</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="text-muted font-weight-bold">Python, MySQL</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="label label-lg label-light-warning label-inline">In Progress</span>
                                                                    </td>
                                                                    <td class="p-0 text-right">
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Settings-1.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
                                                                                        <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Communication/Write.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Trash.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="p-0 py-4">
                                                                        <div class="symbol symbol-50 symbol-light mr-5">
                                                                            <span class="symbol-label">
                                                                                <img src="https://preview.keenthemes.com/metronic/theme/html/demo6/dist/assets/media/svg/misc/003-puzzle.svg" class="h-50 align-self-center" alt="" />
                                                                            </span>
                                                                        </div>
                                                                    </td>
                                                                    <td class="pl-0">
                                                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Cisco Management</a>
                                                                        <span class="text-muted font-weight-bold d-block">
                                                                            <span class="font-weight-bolder text-dark-75">FTP:</span>bprow@bnc.cc</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$560,000</span>
                                                                        <span class="text-muted font-weight-bold">Paid</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="text-muted font-weight-bold">Laravel, Metronic</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="label label-lg label-light-success label-inline">Success</span>
                                                                    </td>
                                                                    <td class="p-0 text-right">
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Settings-1.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
                                                                                        <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Communication/Write.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Trash.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="p-0 py-4">
                                                                        <div class="symbol symbol-50 symbol-light mr-5">
                                                                            <span class="symbol-label">
                                                                                <img src="https://preview.keenthemes.com/metronic/theme/html/demo6/dist/assets/media/svg/misc/005-bebo.svg" class="h-50 align-self-center" alt="" />
                                                                            </span>
                                                                        </div>
                                                                    </td>
                                                                    <td class="pl-0">
                                                                        <a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Beats Studio</a>
                                                                        <span class="text-muted font-weight-bold d-block">FTP: bprow@bnc.cc</span>
                                                                    </td>
                                                                    <td class="text-right pr-0">
                                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$57,000</span>
                                                                        <span class="text-muted font-weight-bold">Paid</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="text-muted font-weight-bold">AngularJS, C#</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="label label-lg label-light-danger label-inline">Rejected</span>
                                                                    </td>
                                                                    <td class="pr-0 text-right">
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Settings-1.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
                                                                                        <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Communication/Write.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Trash.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="p-0 py-4">
                                                                        <div class="symbol symbol-50 symbol-light">
                                                                            <span class="symbol-label">
                                                                                <img src="https://preview.keenthemes.com/metronic/theme/html/demo6/dist/assets/media/svg/misc/006-plurk.svg" class="h-50 align-self-center" alt="" />
                                                                            </span>
                                                                        </div>
                                                                    </td>
                                                                    <td class="pl-0">
                                                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Sant Outstanding</a>
                                                                        <div>
                                                                            <span class="font-weight-bolder">Email:</span>
                                                                            <a class="text-muted font-weight-bold text-hover-primary" href="#">bprow@bnc.cc</a>
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$2,000,000</span>
                                                                        <span class="text-muted font-weight-bold">Paid</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="text-muted font-weight-bold">ReactJs, HTML</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="label label-lg label-light-primary label-inline">Approved</span>
                                                                    </td>
                                                                    <td class="pr-0 text-right">
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Settings-1.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
                                                                                        <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Communication/Write.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Trash.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="p-0 py-4">
                                                                        <div class="symbol symbol-50 symbol-light mr-5">
                                                                            <span class="symbol-label">
                                                                                <img src="https://preview.keenthemes.com/metronic/theme/html/demo6/dist/assets/media/svg/misc/014-kickstarter.svg" class="h-50 align-self-center" alt="" />
                                                                            </span>
                                                                        </div>
                                                                    </td>
                                                                    <td class="pl-0">
                                                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">KTR Application</a>
                                                                        <span class="text-muted font-weight-bold d-block">
                                                                            <span class="font-weight-bolder text-dark-75">FTP:</span>bprow@bnc.cc</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$45,200,000</span>
                                                                        <span class="text-muted font-weight-bold">Paid</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="text-muted font-weight-bold">ReactJS, Ruby</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="label label-lg label-light-warning label-inline">In Progress</span>
                                                                    </td>
                                                                    <td class="p-0 text-right">
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Settings-1.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
                                                                                        <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Communication/Write.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Trash.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!--end::Table-->
                                                </div>
                                                <!--end::Tap pane-->
                                                <!--begin::Tap pane-->
                                                <div class="tab-pane fade show active" id="kt_tab_pane_12_3" role="tabpanel" aria-labelledby="kt_tab_pane_12_3">
                                                    <!--begin::Table-->
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless table-vertical-center">
                                                            <thead>
                                                                <tr>
                                                                    <th class="p-0 w-50px"></th>
                                                                    <th class="p-0 min-w-200px"></th>
                                                                    <th class="p-0 min-w-120px"></th>
                                                                    <th class="p-0 min-w-120px"></th>
                                                                    <th class="p-0 min-w-120px"></th>
                                                                    <th class="p-0 min-w-160px"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="p-0 py-4">
                                                                        <div class="symbol symbol-50 symbol-light">
                                                                            <span class="symbol-label">
                                                                                <img src="https://preview.keenthemes.com/metronic/theme/html/demo6/dist/assets/media/svg/misc/006-plurk.svg" class="h-50 align-self-center" alt="" />
                                                                            </span>
                                                                        </div>
                                                                    </td>
                                                                    <td class="pl-0">
                                                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Sant Outstanding</a>
                                                                        <div>
                                                                            <span class="font-weight-bolder">Email:</span>
                                                                            <a class="text-muted font-weight-bold text-hover-primary" href="#">bprow@bnc.cc</a>
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$2,000,000</span>
                                                                        <span class="text-muted font-weight-bold">Paid</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="text-muted font-weight-bold">ReactJs, HTML</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="label label-lg label-light-primary label-inline">Approved</span>
                                                                    </td>
                                                                    <td class="pr-0 text-right">
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Settings-1.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
                                                                                        <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Communication/Write.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Trash.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="p-0 py-4">
                                                                        <div class="symbol symbol-50 symbol-light mr-5">
                                                                            <span class="symbol-label">
                                                                                <img src="https://preview.keenthemes.com/metronic/theme/html/demo6/dist/assets/media/svg/misc/015-telegram.svg" class="h-50 align-self-center" alt="" />
                                                                            </span>
                                                                        </div>
                                                                    </td>
                                                                    <td class="pl-0">
                                                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Telegram Mobile</a>
                                                                        <span class="text-muted font-weight-bold d-block">
                                                                            <span class="font-weight-bolder text-dark-75">FTP:</span>bprow@bnc.cc</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$4,600,000</span>
                                                                        <span class="text-muted font-weight-bold">Paid</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="text-muted font-weight-bold">Python, MySQL</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="label label-lg label-light-warning label-inline">In Progress</span>
                                                                    </td>
                                                                    <td class="p-0 text-right">
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Settings-1.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
                                                                                        <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Communication/Write.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Trash.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="p-0 py-4">
                                                                        <div class="symbol symbol-50 symbol-light mr-5">
                                                                            <span class="symbol-label">
                                                                                <img src="https://preview.keenthemes.com/metronic/theme/html/demo6/dist/assets/media/svg/misc/003-puzzle.svg" class="h-50 align-self-center" alt="" />
                                                                            </span>
                                                                        </div>
                                                                    </td>
                                                                    <td class="pl-0">
                                                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Cisco Management</a>
                                                                        <span class="text-muted font-weight-bold d-block">
                                                                            <span class="font-weight-bolder text-dark-75">FTP:</span>bprow@bnc.cc</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$560,000</span>
                                                                        <span class="text-muted font-weight-bold">Paid</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="text-muted font-weight-bold">Laravel, Metronic</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="label label-lg label-light-success label-inline">Success</span>
                                                                    </td>
                                                                    <td class="p-0 text-right">
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Settings-1.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
                                                                                        <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Communication/Write.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Trash.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="p-0 py-4">
                                                                        <div class="symbol symbol-50 symbol-light mr-5">
                                                                            <span class="symbol-label">
                                                                                <img src="https://preview.keenthemes.com/metronic/theme/html/demo6/dist/assets/media/svg/misc/005-bebo.svg" class="h-50 align-self-center" alt="" />
                                                                            </span>
                                                                        </div>
                                                                    </td>
                                                                    <td class="pl-0">
                                                                        <a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Beats Studio</a>
                                                                        <span class="text-muted font-weight-bold d-block">FTP: bprow@bnc.cc</span>
                                                                    </td>
                                                                    <td class="text-right pr-0">
                                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$57,000</span>
                                                                        <span class="text-muted font-weight-bold">Paid</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="text-muted font-weight-bold">AngularJS, C#</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="label label-lg label-light-danger label-inline">Rejected</span>
                                                                    </td>
                                                                    <td class="pr-0 text-right">
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Settings-1.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
                                                                                        <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Communication/Write.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Trash.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="p-0 py-4">
                                                                        <div class="symbol symbol-50 symbol-light mr-5">
                                                                            <span class="symbol-label">
                                                                                <img src="https://preview.keenthemes.com/metronic/theme/html/demo6/dist/assets/media/svg/misc/014-kickstarter.svg" class="h-50 align-self-center" alt="" />
                                                                            </span>
                                                                        </div>
                                                                    </td>
                                                                    <td class="pl-0">
                                                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">KTR Application</a>
                                                                        <span class="text-muted font-weight-bold d-block">
                                                                            <span class="font-weight-bolder text-dark-75">FTP:</span>bprow@bnc.cc</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$45,200,000</span>
                                                                        <span class="text-muted font-weight-bold">Paid</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="text-muted font-weight-bold">ReactJS, Ruby</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="label label-lg label-light-warning label-inline">In Progress</span>
                                                                    </td>
                                                                    <td class="p-0 text-right">
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Settings-1.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
                                                                                        <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Communication/Write.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Trash.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!--end::Table-->
                                                </div>
                                                <!--end::Tap pane-->
                                            </div>
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Advance Table Widget 7-->
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Profile Overview-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Entry-->
                </div>
                <!--end::Content-->
                <?php require('footer.php'); ?>
                <script src="../../theme/js/pages/widgetsc7e5.js?v=7.1.1"></script>
                <script src="../../theme/js/pages/custom/profile/profilec7e5.js?v=7.1.1"></script>

        </body>
        <!--end::Body-->


        </html>

<?php
    }
}
}else{
    Redirect::to('../../../index.php');
}

?>