<?php

function registration()
{
	global $conn;
	mysqli_query($conn,"INSERT INTO `tbl_user` SET 
		name='".$_REQUEST['name']."',
		password='".md5($_REQUEST['password'])."',
		email='".$_REQUEST['email']."'
		");
	header("location:login.php?msg=1");
}

function cust_login()
{
    global $conn;

    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
    $password = md5($_REQUEST['password']);

    $login = mysqli_query($conn, "SELECT * FROM `tbl_user` WHERE email='$email' AND password='$password'");

    if (!$login) {
        die("Query Error: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($login) > 0) {
        $login_data = mysqli_fetch_assoc($login);
        $_SESSION['user_id'] = $login_data['id'];
        $_SESSION['user_name'] = $login_data['name'];
        header("location:dashboard.php");
    } else {
        header("location:login.php?msg=2");
    }
}

function cust_feed()
{
    global $conn;

    mysqli_query($conn, "INSERT INTO tbl_feedback (name, email, comments, queries, rating, overall_rating) 
    VALUES ('".$_REQUEST['name']."', '".$_REQUEST['email']."', '".$_REQUEST['comments']."', 
    '".$_REQUEST['queries']."', '".$_REQUEST['rating']."', '".$_REQUEST['overall_rating']."')");
    header("location:index.php?msg=1");

}



// if(isset($_REQUEST['page_action']))
// {
//    switch($_REQUEST['page_action'])
//    {
//        case 'sign_up':
//            registration();
//            break;
//        case 'login':
//            cust_login();
//            break;
//        case 'feedback':
//            cust_feed();
//            break;
//    }
// }
?>