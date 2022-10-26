<?php 
if(isset($_GET['uid'])){
    include "config.php";
    $uid = $_GET['uid'];

    
    // Update Data Into table

    mysqli_query($db,"UPDATE register SET status = 'Approved' WHERE id='".$uid."'" );
    
    $FetchEmail = mysqli_query($db,"SELECT email FROM register WHERE id= '".$uid."'");
    //Associative Array
    $data = mysqli_fetch_assoc($FetchEmail);
    $email = $data['email'];
    $subject = "Panel Assigned";
    $msg = "Testing";
    $sender = "talibmari123@gmail.com";

    // Send Mail TO User
    mail($email,$subject,$msg,$sender);
    echo "<script>
        alert('Account Approved');
        location.assign('index.php');
    </script>";
}




?>