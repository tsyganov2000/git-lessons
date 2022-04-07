<?php

$servername = "localhost";
$username = "root";
$db_password = "qqepta";
$name_db = "contactUS";

$mysql = mysqli_connect($servername, $username, $db_password, $name_db);

if ($mysql === false) {
    die("ERROR: Not connected to data base. " . mysqli_connect_error());
}

$mode = isset($_REQUEST['mode']) ? $_REQUEST['mode'] : false;

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    if ($mode === 'admin_panel') {
        $email = trim($_REQUEST['email']);
        $admin = mysqli_query($mysql, "SELECT email, password FROM admins WHERE email = '$email' LIMIT 1");
        $admin = mysqli_fetch_array($admin, $mode = MYSQLI_ASSOC);

        if ($admin){
            if(password_verify(trim($_REQUEST['password']), $admin['password'])){
                
                $admin = mysqli_query($mysql, "SELECT * FROM users");
    
                while($results = mysqli_fetch_array($admin, $mode = MYSQLI_ASSOC)){

                    $admin_arr[] = $results;
                }

                require 'requests.html';
                exit;
            } else {
                $failed_verify_admin = 'true';
                require 'auth.html';
                exit;
            }
        }
        
        $failed_verify_admin = 'true';
        require 'auth.html';
        exit;
        
    }
    if ((trim($_REQUEST['first_name']) != '') && (trim($_REQUEST['last_name']) != '') && (trim($_REQUEST['email']) != '') && (trim($_REQUEST['password']) != '')){

    

        if ($mode === 'reg_admin'){

            $first_name = trim($_REQUEST['first_name']);
            $last_name = trim($_REQUEST['last_name']);
            $gender = $_REQUEST['gender'];
            $password = password_hash(trim($_REQUEST['password']), PASSWORD_BCRYPT);
            $email = trim($_REQUEST['email']);

            $admin_is_created = mysqli_query($mysql, "INSERT INTO admins(first_name, last_name, gender, email, password) VALUES
                ('$first_name', '$last_name', '$gender', '$email', '$password')");
            if ($admin_is_created) {
                require 'auth.html';
                exit;
            } else {
                $failed_reg_admin = 'true';
                require 'reg_admin.html';
                exit;
            }
            

        
        }


        $email = trim($_REQUEST['email']);

        $user = mysqli_query($mysql, "SELECT first_name, last_name, gender, email, password FROM users WHERE email = '$email' LIMIT 1");
        $user = mysqli_fetch_array($user, $mode = MYSQLI_ASSOC);
            
        if ($user){
            if(password_verify(trim($_REQUEST['password']), $user['password'])){
                    

                $first_name = $user['first_name'];
                $last_name = $user['last_name'];
                $gender = $user['gender'];
                $feedback1 = isset($_REQUEST['feedback1']) ? $_REQUEST['feedback1'] : false;
                $feedback2 = isset($_REQUEST['feedback2']) ? $_REQUEST['feedback2'] : false;
                $feedback3 = isset($_REQUEST['feedback3']) ? $_REQUEST['feedback3'] : false;
                $password = password_hash(trim($_REQUEST['password']), PASSWORD_BCRYPT);
                $text = $_REQUEST['text'];
                
                $uploaddir = $_SERVER[ 'DOCUMENT_ROOT'].'/contactUs/Files/';
                $uploadfile = $uploaddir . basename($_FILES['file']['name']);
                if (!move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)){
                    $uploadfile = '';
                }
                
                $request_is_created = mysqli_query($mysql, "INSERT INTO users(first_name, last_name, gender, feedback, email, password, text, file) VALUES
                    ('$first_name', '$last_name', '$gender', '$feedback1  $feedback2  $feedback3', '$email', '$password', '$text', '$uploadfile')");
                require 'index.html';
                exit;
            } else {
                $failed_verify_user = 'true';
                require 'index.html';
                exit;
            }
        }
        
        $first_name = trim($_REQUEST['first_name']);
        $last_name = trim($_REQUEST['last_name']);
        $gender = $_REQUEST['gender'];
        $feedback1 = isset($_REQUEST['feedback1']) ? $_REQUEST['feedback1'] : false;
        $feedback2 = isset($_REQUEST['feedback2']) ? $_REQUEST['feedback2'] : false;
        $feedback3 = isset($_REQUEST['feedback3']) ? $_REQUEST['feedback3'] : false;
        $password = password_hash(trim($_REQUEST['password']), PASSWORD_BCRYPT);
        $text = $_REQUEST['text'];

        $uploaddir = $_SERVER[ 'DOCUMENT_ROOT'].'/contactUs/Files/';
        $uploadfile = $uploaddir . basename($_FILES['file']['name']);
        if (!move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)){
            $uploadfile = '';
        }


        $request_is_created = mysqli_query($mysql, "INSERT INTO users(first_name, last_name, gender, feedback, email, password, text, file) VALUES
            ('$first_name', '$last_name', '$gender', '$feedback1  $feedback2  $feedback3', '$email', '$password', '$text', '$uploadfile')");


    } else {
        $failed = 'true';
        require 'index.html';
        exit;
    }
} 


if ($mode === 'auth'){
    require 'auth.html';
} elseif ($mode === 'reg_admin') {
    require 'reg_admin.html';
} else {
    require 'index.html';
}



exit;
