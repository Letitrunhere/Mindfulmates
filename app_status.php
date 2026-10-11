<?php
session_start();
include('include/config.php');

// Check if appointmentId and action are set
if(isset($_POST['appointmentId']) && isset($_POST['action'])) {
    $appointmentId = $_POST['appointmentId'];
    $action = $_POST['action'];
    
    if($action == 'accept') {
        // Update appointment status to "Accepted"
        $query = mysqli_query($con, "UPDATE appointment SET appointmentStatus='Accepted' WHERE id='$appointmentId'");
        $_SESSION['msg'] = "Appointment Accepted";
    } elseif($action == 'decline') {
        // Update appointment status to "Declined by Doctor"
        $query = mysqli_query($con, "UPDATE appointment SET appointmentStatus='Declined by Doctor' WHERE id='$appointmentId'");
        $_SESSION['msg'] = "Appointment Declined by Doctor";
    }
}
header('location:appointment-history.php');
?>
