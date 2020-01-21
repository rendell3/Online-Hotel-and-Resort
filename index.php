<?php
error_reporting(0);
    include('connection.php');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $customer = $_SESSION['customer-id'];
    $page = isset($_GET['page']) ? $_GET['page'] : null;
    $title = null;
    $include = null;
    $javascript = null;
    $list = '<li><a href="javascript:;" data-toggle="modal" data-target="#modalLogin">Login</a></li>
    <li><a href="javascript:;" data-toggle="modal" data-target="#modalRegister">Register</a></li>';
    $logged = false;
    if(isset($_SESSION['customer-id'])) {
        $list = '<li><a href="?page=view">View bookings</a></li>
            <li><a href="?page=logout">Log out</a></li>';
        $logged = true;
    }

    switch($page) {
        case null:
            $include = 'theme/pages/home.php';
            $javascript = '<script src="theme/js/home.js"></script>';
            break;
        case 'home':
            $include = 'theme/pages/home.php';
            // $javascript = '<script src="theme/js/home.js"></script>';
            break;
        case 'rooms':
            $include = 'theme/pages/rooms.php';
            // $javascript = '<script src="theme/js/rooms.js"></script>';
            break;
        case 'gallery':
            $include = 'theme/pages/gallery.php';
            $javascript = '
                        <script src="plugins/isotope.js"></script>
                        <script src="plugins/jquery.magnific-popup.min.js"></script>
                        '
                        ;
            break;
        case 'register':
            $include = 'theme/pages/register.php';
            // $javascript = '<script src="theme/js/register.js"></script>';
            break;
        case 'confirm':
            $userId = isset($_GET['id']) ? $_GET['id'] : null;
            if($userId == null) {
                $include = 'theme/pages/home.php';
                // $javascript = '<script src="theme/js/login.js"></script>';
            } else {
                $user = mysqli_query($connection, "SELECT * FROM tblUsers WHERE fldUserId = $userId AND fldUserStatus = 'Active'");
                if(mysqli_num_rows($user) > 0) {
                    $include = 'theme/pages/home.php';
                    // $javascript = '<script src="theme/js/login.js"></script>';
                } else {
                    $include = 'theme/pages/confirm.php';
                    // $javascript = '<script src="theme/js/confirm.js"></script>';
                }
            }
            break;
        case 'login':
            $include = 'theme/pages/login.php';
            // $javascript = '<script src="theme/js/login.js"></script>';
            break;
        case 'logout':
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            unset($_SESSION['customer-id']);
            $list = '<li><a href="javascript:;" data-toggle="modal" data-target="#modalLogin">Login</a></li>
            <li><a href="javascript:;" data-toggle="modal" data-target="#modalRegister">Register</a></li>';
            $include = 'theme/pages/logout.php';
            break;
        case 'book':
            if(isset($_SESSION['customer-id'])) {
                $userId = $_SESSION['customer-id'];
                if($userId == null) {
                    $include = 'theme/pages/home.php';
                    // $javascript = '<script src="theme/js/login.js"></script>';
                } else {
                    $start = isset($_GET['start']) ? $_GET['start'] : null;
                    $room = isset($_GET['room']) ? $_GET['room'] : '';
                    $include = 'theme/pages/book.php';
                    // $javascript = '<script src="theme/js/book.js"></script>';
                }
            } else {
                $include = 'theme/pages/home.php';
                $javascript = '<script src="theme/js/home.js"></script>';
            }
            break;
        case 'view':
            if(isset($_SESSION['customer-id'])) {
                $userId = $_SESSION['customer-id'];
                if($userId == null) {
                    $include = 'theme/pages/home.php';
                    // $javascript = '<script src="theme/js/login.js"></script>';
                } else {
                    $start = isset($_GET['start']) ? $_GET['start'] : null;
                    $include = 'theme/pages/view.php';
                    // $javascript = '<script src="https://checkout.stripe.com/checkout.js"></script>
                    //                 <script src="theme/js/view.js"></script>';
                }
            } else {
                $include = 'theme/pages/home.php';
                // $javascript = '<script src="theme/js/home.js"></script>';
            }
            break;
            case 'resched':
                if(isset($_SESSION['customer-id'])) {
                    $userId = $_SESSION['customer-id'];
                    if($userId == null) {
                        $include = 'theme/pages/resched.php';
                        // $javascript = '<script src="theme/js/login.js"></script>';
                    } else {
                        $include = 'theme/pages/resched.php';
                        // $javascript = '<script src="https://checkout.stripe.com/checkout.js"></script>
                        //                 <script src="theme/js/view.js"></script>';
                    }
                } else {
                    $include = 'theme/pages/resched.php';
                    // $javascript = '<script src="theme/js/home.js"></script>';
                }
                break;
        default:
            // if(isset($_SESSION['patient-id'])) {
            //     $role = $_SESSION['role'];
            //     $include = checkRole($role);
            // } else {
            //     $include = 'src/views/common/base.php';
            //     $javascript = '';
            // }
            $include = 'theme/pages/home.php';
            // $javascript = '<script src="theme/js/home.js"></script>';
            break;
    }

    include('theme/pages/base.php');
?>
