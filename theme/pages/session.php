<?php
    include('../../connection.php');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        session_destroy();
        session_unset();
    }
    $input = $_POST;

    $id = $input['id'];
    $role = $input['role'];

    if($role == "Customer") {
        $_SESSION['customer-id'] = $id;
    }
    
    echo "success";
?>