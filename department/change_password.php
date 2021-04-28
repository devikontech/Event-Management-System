<?php

require_once 'core/init.php';
require_once 'core/DB.php';
require_once '../includes/function.php';

$user = new Department();
if ($user->isLoggedIn()) {
    $data = $user->data();

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
                                    <a class="nav-link" href="event_create.php?hash=<?php echo convert_string('decrypt', $data->dept_passkey) ?>">Event Organized</a>
                                </li>
                                <li class="nav-item">
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
                                <?php if ($data->dept_image) { ?>
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
                                <a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="event_create.php?hash=<?php echo convert_string('decrypt', $data->dept_passkey) ?>">
                                    Faculty Event Organized
                                </a>
                                <h3 class="d-block bg-secondary font-size-sm font-weight-semibold text-muted mb-0 px-4 py-3">
                                    Student
                                </h3>
                                <a class="d-flex align-items-center nav-link-style px-4 py-3" href="student_information.php">
                                    Student Information
                                </a>
                                <h3 class="d-block bg-secondary font-size-sm font-weight-semibold text-muted mb-0 px-4 py-3">
                                    Account settings
                                </h3>
                                <a class="d-flex align-items-center nav-link-style px-4 py-3" href="index.php">Profile info</a>
                                <a class="d-flex align-items-center nav-link-style px-4 py-3 border-top active" href="change_password.php">Change Password</a>
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
                                <!-- Title + Delete link-->
                                <div class="d-sm-flex align-items-center justify-content-between pb-4 text-center text-sm-left">
                                    <h1 class="h3 mb-2 text-nowrap">Change Password</h1>
                                    </a>
                                </div>
                                <p id="alert" class="text-center d-none mb-2 mt-2 text-danger h6 font-weight-bold"></p>
                                <!-- Content-->
                                <form method="post" id="profile_info" class="needs-validation" novalidate>
                                    <div class="row mt-4">
                                        <div class="col-sm-12">
                                            <!-- Password visibility toggle -->
                                            <div class="form-group">
                                                <label for="oldpass-visibility">Old Password</label>
                                                <div class="cs-password-toggle">
                                                    <input type="password" id="oldpass-visibility" name="old_password" placeholder="Old Password" class="form-control" required>
                                                    <label class="cs-password-toggle-btn">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <i class="fe-eye cs-password-toggle-indicator"></i>
                                                        <span class="sr-only">Show password</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- Password visibility toggle -->
                                            <div class="form-group">
                                                <label for="newpass">New Password</label>
                                                <div class="cs-password-toggle">
                                                    <input type="password" id="newpass" name="new_password" placeholder="New Password" class="form-control" required>
                                                    <label class="cs-password-toggle-btn">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <i class="fe-eye cs-password-toggle-indicator"></i>
                                                        <span class="sr-only">Show password</span>
                                                    </label>
                                                </div>
                                                <small id="pa" class="form-text text-muted d-none"></small>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- Password visibility toggle -->
                                            <div class="form-group">
                                                <label for="conpass">Confirm Password</label>
                                                <div class="cs-password-toggle">
                                                    <input type="password" id="conpass" name="con_password" placeholder="Confirm Password" class="form-control" required>
                                                    <label class="cs-password-toggle-btn">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <i class="fe-eye cs-password-toggle-indicator"></i>
                                                        <span class="sr-only">Show password</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <hr class="mt-2 mb-4" />
                                            <div class="d-flex flex-wrap justify-content-end align-items-center">
                                                <input type="hidden" name="action" value="password_update">
                                                <input type="hidden" name="ett_passkey" value="<?php echo convert_string('decrypt', $data->dept_passkey) ?>">
                                                <button class="btn btn-primary mt-3 mt-sm-0 float-right" type="submit">
                                                    <i class="fe-save font-size-lg mr-2"></i>Change Password
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
        <!-- Vendor scrits:js libraries and plugins-->
        <script src="../vendor/jquery/dist/jquery.slim.min.js"></script>
        <script src="../vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../vendor/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
        <script src="../vendor/simplebar/dist/simplebar.min.js"></script>
        <script src="../vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Main theme script-->
        <script src="../js/theme.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#newpass').change(function() {

                });

                $(document).on('submit', '#profile_info', function(e) {
                    e.preventDefault();
                    var regularExp = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
                    var password = $('#newpass').val();
                    if (!regularExp.test(password)) {
                        $('#pa').removeClass('d-none');
                        $('#pa').html('Your password must be 8-20 characters long, contain letters and numbers and special characters, and must not contain spaces or emoji.');
                        setTimeout(function() {
                            $('#pa').addClass('d-none');
                        }, 2000);
                        return false;
                    } else {
                        var form_data = $(this).serialize();
                        $.ajax({
                            url: "action.php",
                            method: "post",
                            data: form_data,
                            dataType: "json",
                            success: function(data) {
                                if (data.message) {
                                    setTimeout(function() {
                                        location.reload();
                                    }, 1000);
                                } else {
                                    $('#alert').removeClass('d-none');
                                    $('#alert').html(data.error);
                                }
                            }
                        });
                    }

                });

            });
        </script>
    </body>

    </html>
<?php

} else {
    Redirect::to('../index.php');
}
?>