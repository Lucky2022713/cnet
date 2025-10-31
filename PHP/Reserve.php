<?php
session_start();
require_once "db.php"; 

// Make sure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../HTML/LoginPage.html");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_id = $_SESSION['user_id'];  // comes from login session
    $unit = intval($_POST['unit']);
    $date = $_POST['date'];
    $time = $_POST['time'];

    // INSERT to database
    $sql = "INSERT INTO reservation (user_id, unit_number, reservation_date, reservation_time)
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiss", $user_id, $unit, $date, $time);

    if ($stmt->execute()) {
        $reservation_id = $conn->insert_id;  // ✅ GET THE ID JUST SAVED
        echo "<script>window.location.href='../HTML/PaymentPage.php?reservation_id=$reservation_id';</script>";
    } else {
        echo "<script>alert('Error: Could not reserve.'); window.history.back();</script>";
    }

    $stmt->close();
}
$conn->close();
?>