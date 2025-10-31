<?php
session_start();
require_once "../PHP/db.php";

if (!isset($_SESSION['username'])) {
    header("Location: ../HTML/LoginPage.html");
    exit;
}

$username = $_SESSION['username'];
$user_id = $_SESSION['user_id']; // assuming stored at login

// fetch reservations
$stmt = $conn->prepare("SELECT reservation_id, unit_number, reservation_date,
reservation_time FROM reservation WHERE user_id = ? ORDER BY reservation_date
DESC"); if (!$stmt) { die("SQL ERROR: " . $conn->error); }
$stmt->bind_param("i", $user_id); $stmt->execute(); $result =
$stmt->get_result(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Reservations</title>
    <style>
      body {
        font-family: Poppins, sans-serif;
        background: #0d0d0d;
        color: #e0e0e0;
        margin: 0;
        padding: 0;
      }
      header {
        background: #1a1a1a;
        padding: 12px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #333;
      }
      header h1 {
        margin: 0;
        color: #4da3ff;
      }
      nav a {
        text-decoration: none;
        color: #4da3ff;
        margin-right: 15px;
        font-weight: 500;
        transition: 0.3s;
      }
      nav a:hover {
        opacity: 0.8;
      }
      table {
        width: 90%;
        margin: 30px auto;
        border-collapse: collapse;
        background: #121212;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.6);
      }
      th,
      td {
        padding: 12px;
        border-bottom: 1px solid #333;
        text-align: center;
      }
      th {
        background: #1f1f1f;
        color: #4da3ff;
      }
    </style>
  </head>
  <body>
    <header>
      <h1>My Reservations</h1>
      <nav>
        <a href="dashboard.php">Home</a>
        <a href="MyReservations.php">My Reservations</a>
        <a href="../PHP/Logout.php">Logout</a>
      </nav>
    </header>
    <table>
      <tr>
        <th>Unit</th>
        <th>Date</th>
        <th>Time</th>
      </tr>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?php echo $row['unit_number']; ?></td>
        <td><?php echo $row['reservation_date']; ?></td>
        <td><?php echo $row['reservation_time']; ?></td>
      </tr>
      <?php endwhile; ?>
    </table>
  </body>
</html>
