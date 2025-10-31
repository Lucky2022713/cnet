<?php
session_start();
if (!isset($_SESSION['username'])) { header("Location: ../HTML/LoginPage.html"); exit; }
$username = $_SESSION['username'];
$unit = isset($_GET['unit']) ? intval($_GET['unit']) : 0;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reserve Unit</title>
    <style>
      body {
        font-family: Poppins, sans-serif;
        background: #0d0d0d;
        color: #e0e0e0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
      }
      .box {
        background: #1a1a1a;
        padding: 40px;
        border-radius: 12px;
        max-width: 420px;
        width: 90%;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.6);
        text-align: center;
      }
      h2 {
        color: #4da3ff;
        margin-bottom: 20px;
        font-size: 24px;
      }
      label {
        text-align: left;
        display: block;
        margin-top: 15px;
        font-size: 14px;
        color: #bbb;
      }
      input,
      button {
        width: 100%;
        padding: 12px;
        margin-top: 8px;
        border-radius: 8px;
        border: none;
        outline: none;
        font-size: 15px;
      }
      input {
        background: #262626;
        color: #e0e0e0;
        border: 1px solid #333;
      }
      input:focus {
        border-color: #4da3ff;
        box-shadow: 0 0 8px rgba(77, 163, 255, 0.5);
      }
      button {
        background: #4da3ff;
        color: #fff;
        font-weight: 600;
        cursor: pointer;
        margin-top: 20px;
        transition: 0.3s;
      }
      button:hover {
        background: #2a7cd6;
        transform: scale(1.02);
      }
      .back-btn {
        display: inline-block;
        margin-top: 15px;
        font-size: 13px;
        color: #4da3ff;
        text-decoration: none;
        opacity: 0.8;
      }
      .back-btn:hover {
        opacity: 1;
      }
    </style>
  </head>
  <body>
    <div class="box">
      <h2>
        Reserve Computer Unit
        <?php echo $unit; ?>
      </h2>
      <form action="../PHP/Reserve.php" method="POST">
        <input type="hidden" name="unit" value="<?php echo $unit; ?>" />
        <label>Select Date</label>
        <input type="date" name="date" required />
        <label>Select Time</label>
        <input type="time" name="time" required />
        <button type="submit">Confirm Reservation</button>
      </form>
      <a href="dashboard.php" class="back-btn">← Back to Dashboard</a>
    </div>
  </body>
</html>
