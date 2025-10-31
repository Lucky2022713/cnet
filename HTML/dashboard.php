<?php
session_start();
if (!isset($_SESSION['username'])) { header("Location: ../HTML/LoginPage.html"); exit; }
$username = $_SESSION['username']; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CNET - Dashboard</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />
    <style>
      body {
        margin: 0;
        padding: 0;
        font-family: "Poppins", sans-serif;
        background-color: #0d0d0d;
        color: #e0e0e0;
      }
      header {
        background-color: #1a1a1a;
        color: #e0e0e0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 20px;
        border-bottom: 1px solid #333;
      }
      header h1 {
        margin: 0;
        font-size: 1.6rem;
        color: #4da3ff;
      }
      nav a {
        color: #4da3ff;
        text-decoration: none;
        font-weight: 500;
        transition: 0.3s;
      }
      nav a:hover {
        opacity: 0.8;
      }
      nav a.logout {
        background-color: #007bff;
        color: white;
        padding: 8px 14px;
        border-radius: 6px;
      }
      .gradient-box {
        background: #1a1a1a;
        width: 90%;
        max-width: 1200px;
        margin: 40px auto;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.6);
      }
      .subtitle {
        font-size: 18px;
        color: #e0e0e0;
        margin-bottom: 20px;
      }
      .category-box {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 20px;
      }
      .category {
        width: 230px;
        height: 180px;
        background-color: #121212;
        border-radius: 10px;
        font-size: 15px;
        font-weight: bold;
        color: #e0e0e0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        transition: 0.3s ease;
        border: 1px solid #333;
      }
      .category:hover {
        transform: translateY(-5px);
        background-color: #1f1f1f;
      }
      .reserve-btn {
        margin-top: 30px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 6px;
        padding: 8px 14px;
        cursor: pointer;
        transition: 0.3s;
      }
      .reserve-btn:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
      }
    </style>
  </head>
  <body>
    <header>
      <h1>
        Welcome,
        <?php echo htmlspecialchars($username); ?>!
      </h1>
      <nav style="display: flex; gap: 15px; align-items: center">
        <a href="dashboard.php">Home</a>
        <a href="MyReservations.php">My Reservations</a>
        <a href="../PHP/Logout.php" class="logout">Logout</a>
      </nav>
    </header>
    <div class="gradient-box">
      <p class="subtitle">Available Computer Units</p>
      <div class="category-box">
        <?php for ($i = 1; $i <= 5; $i++): ?>
        <div class="category">
          <span
            >Computer Unit
            <?php echo $i; ?></span
          >
          <button
            class="reserve-btn"
            onclick="window.location.href='../HTML/ReservePage.php?unit=<?php echo $i; ?>'"
          >
            Reserve
          </button>
        </div>
        <?php endfor; ?>
      </div>
    </div>
  </body>
</html>
