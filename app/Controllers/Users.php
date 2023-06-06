<?php
    include('Configuration.php');
    
    /* Auth Validation */
    if(basename($_SERVER['PHP_SELF']) == 'login.php'){
        if(isset($_SESSION['logged_status'])){
            header('location: index');     
        }
    }else{
        if(!isset($_SESSION['logged_status'])){
            header('location: login');
        }
    }

    if(array_key_exists('new_account', $_POST)) {
        $newUniqueIDUser = 'UNQ' . rand(1000, 9999) . 'RLL' . rand(10000, 99999) . 'E';
        $newPublicIDUser = 'PBC' . rand(1000, 9999) . 'RLL' . rand(10000, 99999) . 'E';
        $sql = "INSERT INTO `users_tb` (`_id`, `id`, `email`, `password`, `first_name`, `last_name`, `birthdate`, `gender`, `shipping_address1`, `shipping_address2`, `shipping_city`, `shipping_state`, `shipping_zipcode`, `shipping_country`, `billing_address1`, `billing_address2`, `billing_city`, `billing_state`, `billing_zipcode`, `billing_country`, `phone`, `language`, `timezone`, `referrer_code`, `referral_code`, `payment_method`, `payment_details`, `newsletter_subscription`, `display_path`, `access_type`, `access_level`, `verified`, `restricted`, `status`, `last_login`, `date_created`, `date_modified`, `password_modified`) VALUES 
        ('$newUniqueIDUser', '$newPublicIDUser', '".$_POST['email']."', '".$_POST['password']."', '".$_POST['fname']."', '".$_POST['lname']."', '".$_POST['birthday']."', '".$_POST['gender']."', '123 Main St', NULL, 'Los Angeles', 'CA', '90001', 'USA', '123 Main St', NULL, 'Los Angeles', 'CA', '90001', 'USA', '555-1234', 'English', 'GMT-7', NULL, NULL, NULL, NULL, 0, '/$newPublicIDUser', '".$_POST['access_type']."', ".$_POST['access_level'].", 1, 0, 'active', '".date('Y-m-d h:m:s')."', '".date('Y-m-d h:m:s')."', '".date('Y-m-d h:m:s')."', '".date('Y-m-d h:m:s')."');";
        if ($conn->query($sql) === TRUE) {
            // Return a success response
            //$response = array('success' => true);
            //echo json_encode($response);
        } else {
            // Return an error response
            //$response = array('success' => false);
            //echo json_encode($response.mysqli_error($conn));
        }
    }

    /* Login Processor */
    if(isset($_POST['login'])){
        $sql = "SELECT * FROM users_tb WHERE email = '".$_POST['email']."';";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
                if($row['password'] == $_POST['password']){
                    if($row['verified'] == 0){
                        header('location: login?err=502');
                    }else if($row['status'] == 'active'){
                        session_start();
                        $_SESSION['logged_status'] = 1;
                        $_SESSION['logged_time'] = time();
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['fname'] = $row['first_name'];
                        $_SESSION['lname'] = $row['last_name'];
                        $_SESSION['birthday'] = $row['birthday'];
                        $_SESSION['access_type'] = $row['access_type'];
                        $_SESSION['access_level'] = $row['access_level'];

                        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                            $ip = $_SERVER['HTTP_CLIENT_IP'];
                        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                        } else {
                            $ip = $_SERVER['REMOTE_ADDR'];
                        }
                        $newIDHis = 'LOGIN-'.rand(1000, 9999).'N'.rand(10000, 99999).'TSY';
                        $addLoginHis = "INSERT INTO logins_tb VALUES ('$newIDHis', '".$_SESSION['id']."', '".$_SESSION['fname'].' '.$_SESSION['lname']."', '$ip', '".date('Y-m-d')."', '".date('H:i:s')."')";
                        $conn->query($addLoginHis);

                        header("location: index");
                        
                    }else if($row['status'] == -1){
                        header('location: login?err=404');
                    }
                }else{
                    header('location: login?err=403');
                }
            }
        }else{
            header('location: login?err=403');
        }
    }

    /* Signout Processor */
    if(isset($_GET['signout']) && $_GET['signout'] == $_SESSION['id']){ //
        $lastuser = urlencode($_SESSION['email']);
        session_destroy();
        session_unset();
        header('location: login?redirect=logout&time='.date('Ymdhms').'&lastuse='.encrypt($lastuser, $encryptionKey));
    }

    /* Renew Session Timeout */
    $currentTime = time();
    if (isset($_SESSION['logged_time']) && ($currentTime - $_SESSION['logged_time'] > $ssTIMEOUT)) { //ssTIMEOUT
        $lastuser = urlencode($_SESSION['email']);
        session_destroy();
        session_unset();
        header('location: login?redirect=login_timeout&time='.date('Ymdhms').'&lastuse='.encrypt($lastuser, $encryptionKey));
    }else {
        $_SESSION['logged_time'] = time();
    }  

    function checkAccessType($actual_access){
        if($_SESSION['access_type'] == $actual_access){
            return true;
        }else{
            return false;
        }
    }
    
?>