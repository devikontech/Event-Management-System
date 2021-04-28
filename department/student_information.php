<?php

require_once 'core/init.php';
require_once 'core/DB.php';
require_once '../includes/function.php';

$user = new Department();
if ($user->isLoggedIn()) {
    $data = $user->data();
    $db = DB::getInstance();

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <title><?php echo $data->dept_name ?> | EMS@DEPARTMENT</title>
        <!-- SEO Meta Tags-->
        <meta name="description" content="EMS KIOT" />
        <meta name="keywords" content="ems,kiot" />
        <meta name="author" content="EMS Team" />
        <!-- Viewport-->
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- Favicon and Touch Icons-->
        <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png" />
        <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png" />
        <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png" />
        <link rel="manifest" href="site.webmanifest" />
        <link rel="mask-icon" color="#5bbad5" href="safari-pinned-tab.svg" />
        <meta name="msapplication-TileColor" content="#766df4" />
        <meta name="theme-color" content="#ffffff" />

        <!-- Vendor Styles-->
        <link rel="stylesheet" media="screen" href="../vendor/simplebar/dist/simplebar.min.css" />
        <!-- Main Theme Styles + Bootstrap-->
        <link rel="stylesheet" media="screen" href="../css/theme.min.css" />

    </head>
    <!-- Body-->

    <body style="background-color: #f7f7fc">

        <main class="cs-page-wrapper">
            <header class="cs-header navbar navbar-expand-lg navbar-dark navbar-floating navbar-sticky" data-scroll-header>
                <div class="container px-0 px-xl-3">
                    <button class="navbar-toggler ml-n2 mr-2" type="button" data-toggle="offcanvas" data-offcanvas-id="primaryMenu">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand order-lg-1 mx-auto ml-lg-0 pr-lg-2 mr-lg-4 font-weight-bolder" href="../index.php">EMS</a>
                    <div class="d-flex align-items-center order-lg-3 ml-lg-auto">
                        <div class="navbar-tool dropdown">
                            <?php if ($data->dept_image) { ?>
                                <a class="navbar-tool-icon-box" href="account-profile.html">
                                    <img class="navbar-tool-icon-box-img" src="data:image/png;base64,<?php echo base64_encode($data->dept_image) ?>" alt="Avatar" />
                                </a>
                            <?php } ?>

                            <a class="navbar-tool-label dropdown-toggle" href="account-profile.html"><small>Hello,</small><?php echo $data->dept_sname ?></a>
                            <ul class="dropdown-menu dropdown-menu-right" style="width: 15rem">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="index.php"><i class="fe-shopping-bag font-size-base opacity-60 mr-2"></i>My Profile<span class="nav-indicator"></span><span class="ml-auto font-size-xs text-muted"></span></a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="#"><i class="fe-message-square font-size-base opacity-60 mr-2"></i>Messages<span class="nav-indicator"></span><span class="ml-auto font-size-xs text-muted"></span></a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="#"><i class="fe-users font-size-base opacity-60 mr-2"></i>Followers<span class="ml-auto font-size-xs text-muted"></span></a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="logout.php"><i class="fe-log-out font-size-base opacity-60 mr-2"></i>Sign out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="cs-offcanvas-collapse order-lg-2" id="primaryMenu">
                        <div class="cs-offcanvas-cap navbar-box-shadow">
                            <h5 class="mt-1 mb-0">Menu</h5>
                            <button class="close lead" type="button" data-toggle="offcanvas" data-offcanvas-id="primaryMenu">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="cs-offcanvas-body">
                            <!-- Menu-->
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="faculty_information.php">Faculty Information</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="fac_event.php">Event Report</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="event_create.php?hash=<?php echo convert_string('decrypt',$data->dept_passkey) ?>">Event Organized</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="student_information.php">Student Information</a>
                                </li>                                

                            </ul>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Page content-->
            <!-- Slanted background-->
            <div class="position-relative bg-gradient" style="height: 480px">
                <div class="cs-shape cs-shape-bottom cs-shape-slant bg-secondary d-none d-lg-block">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3000 260">
                        <polygon fill="currentColor" points="0,257 0,260 3000,260 3000,0"></polygon>
                    </svg>
                </div>
            </div>
            <!-- Page content-->
            <div class="container bg-overlay-content pb-4 mb-md-3" style="margin-top: -350px">
                <div class="row">
                    <!-- Sidebar-->
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="bg-light rounded-lg box-shadow-lg">
                            <div class="px-4 py-4 mb-1 text-center">
                                <?php if($data->dept_image){ ?> 
                                    <img class="d-block rounded-circle mx-auto my-2" width="110" src="data:image/png;base64,<?php echo base64_encode($data->dept_image) ?>" alt="<?php echo $data->dept_name ?>" />
                                <?php } ?>
                                
                                <h6 class="mb-0 pt-1"><?php echo $data->dept_name ?></h6>
                                <span class="text-muted font-size-sm"><?php echo $data->dept_sname ?></span>
                            </div>
                            <div class="d-lg-none px-4 pb-4 text-center">
                                <a class="btn btn-primary px-5 mb-2" href="#account-menu" data-toggle="collapse"><i class="fe-menu mr-2"></i>Account menu</a>
                            </div>
                            <div class="d-lg-block collapse pb-2" id="account-menu">
                                <h3 class="d-block bg-secondary font-size-sm font-weight-semibold text-muted mb-0 px-4 py-3">
                                    Faculty
                                </h3>
                                <a class="d-flex align-items-center nav-link-style px-4 py-3" href="faculty_information.php">
                                    Faculty Information
                                </a>
                                <a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="fac_event.php">
                                    Faculty Event Report
                                </a>
                                <a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="event_create.php?hash=<?php echo convert_string('decrypt',$data->dept_passkey) ?>">
                                    Faculty Event Organized
                                </a>
                                <h3 class="d-block bg-secondary font-size-sm font-weight-semibold text-muted mb-0 px-4 py-3">
                                    Student
                                </h3>
                                <a class="d-flex align-items-center nav-link-style px-4 py-3 active" href="student_information.php">
                                    Student Information
                                </a>                                
                                <h3 class="d-block bg-secondary font-size-sm font-weight-semibold text-muted mb-0 px-4 py-3">
                                    Account settings
                                </h3>
                                <a class="d-flex align-items-center nav-link-style px-4 py-3" href="index.php">Profile info</a>
                                <a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="change_password.php">Change Password</a>
                                <a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="message.php">Message</a>
                                <div class="d-flex align-items-center border-top">
                                    <a class="d-block w-100 nav-link-style px-4 py-3" href="account-notifications.html">Notifications</a>
                                    <div class="ml-auto px-3">
                                        <div class="custom-control custom-switch">
                                            <input class="custom-control-input" type="checkbox" id="notifications-switch" data-master-checkbox-for="#notification-settings" checked />
                                            <label class="custom-control-label" for="notifications-switch"></label>
                                        </div>
                                    </div>
                                </div>
                                <a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="logout.php"><i class="fe-log-out font-size-lg opacity-60 mr-2"></i>Sign out</a>
                            </div>
                        </div>
                    </div>
                    <!-- Content-->
                    <div class="col-lg-8">
                        <div class="d-flex flex-column h-100 bg-light rounded-lg box-shadow-lg p-4">
                            <div class="py-2 p-md-3">
                                <!-- Title-->
                                <h1 class="h3 mb-3 text-nowrap text-center text-sm-left">Students Information<span class="d-inline-block align-middle bg-faded-dark font-size-ms font-weight-medium rounded-sm py-1 px-2 ml-2"><?php echo $user->student_count($data->dept_passkey) ?></span></h1>
                                <div class="row">
                                <?php 
                                    $fac_data = $db->get('em_students',array('fac_dept_hash','=',$data->dept_passkey));
                                    if($fac_data->count()){
                                        foreach($fac_data->results() as $row){
                                            if($row->fac_year == 1){
                                                $year = 'First Year';
                                            }elseif($row->fac_year == 2){
                                                $year = 'Second Year';
                                            }elseif($row->fac_year == 3){
                                                $year = 'Third Year';
                                            }else{
                                                $year = 'Final Year';
                                            }
                                ?>
                                <div class="col-xl-6 mt-2">                                    
                                    <div class="card h-100 border-0 box-shadow card-hover mx-1">
                                        <span class="badge badge-lg badge-floating badge-floating-right badge-primary"><?php echo $year ?></span>
                                        <div class="card-img-top card-img-gradient">
                                            <?php if($row->fac_image){ ?>
                                                <img src="data:image/png;base64,<?php echo base64_encode($row->fac_image) ?>" alt="<?php echo $row->fac_name ?>">
                                            <?php }else{ ?>
                                                <img src="../img/blank.png" alt="<?php echo $row->fac_name ?>">
                                            <?php } ?>
                                            <span class="card-floating-text text-light font-weight-medium">View Profile<i class="fe-chevron-right font-size-lg ml-1"></i></span>
                                        </div>
                                        <div class="card-body">                                            
                                            <h3 class="h5 pt-1 mb-2"><?php echo $row->fac_name ?><p class="font-size-sm text-muted mb-2 float-right"><i class="fe-user"></i> <?php echo $row->fac_mentor ?></p></h3>
                                            
                                            <ul class="list-unstyled mb-0">
                                                <li class="media pb-2 border-bottom">
                                                    <i class="fe-map-pin font-size-lg mt-2 mb-0 text-primary"></i>
                                                    <div class="media-body pl-3">
                                                    <span class="font-size-ms text-muted">Location</span>
                                                    <a href="#" class="d-block nav-link-style font-size-sm"><?php echo $row->fac_address ?></a>
                                                    </div>
                                                </li>
                                                <li class="media pt-1 pb-2 border-bottom">
                                                    <i class="fe-phone font-size-lg mt-2 mb-0 text-primary"></i>
                                                    <div class="media-body pl-3">
                                                    <span class="font-size-ms text-muted">Phone</span>
                                                    <a href="tel:+91<?php echo $row->fac_phone ?>" class="d-block nav-link-style font-size-sm"><?php echo $row->fac_phone ?></a>
                                                    </div>
                                                </li>
                                                <li class="media pt-2m">
                                                    <i class="fe-mail font-size-lg mt-1 mb-0 text-primary"></i>
                                                    <div class="media-body pl-3">
                                                    <span class="font-size-ms text-muted">Email</span>
                                                    <a href="mailto:<?php echo $row->fac_email ?>" class="d-block nav-link-style font-size-sm"><?php echo $row->fac_email ?></a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php
                                        }
                                    }else{
                                        echo 'Faculty not Found';
                                    }
                                ?>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer-->
        <footer class="cs-footer py-4">
            <div class="container d-md-flex align-items-center justify-content-between py-2 text-center text-md-left">
                <ul class="list-inline font-size-sm mb-3 mb-md-0 order-md-2">
                    <li class="list-inline-item my-1"><a class="nav-link-style" href="#">Support</a></li>
                    <li class="list-inline-item my-1"><a class="nav-link-style" href="#">Contacts</a></li>
                    <li class="list-inline-item my-1"><a class="nav-link-style" href="#">Terms &amp; Conditions</a></li>
                </ul>
                <p class="font-size-sm mb-0 mr-3 order-md-1">
                    <span class="text-muted mr-1">© All rights reserved. Made by</span><a class="nav-link-style font-weight-normal" href="" target="_blank" rel="noopener">EMS TEAM</a>
                </p>
            </div>
        </footer>
        <!-- Back to top button-->
        <a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted font-size-sm mr-2">Top</span><i class="btn-scroll-top-icon fe-arrow-up">
            </i></a>
        <!-- Vendor scrits: js libraries and plugins-->
        <script src="../vendor/jquery/dist/jquery.slim.min.js"></script>
        <script src="../vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../vendor/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
        <script src="../vendor/simplebar/dist/simplebar.min.js"></script>
        <script src="../vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Main theme script-->
        <script src="../js/theme.min.js"></script>

    </body>

    </html>
<?php

} else {
    Redirect::to('../index.php');
}
?>