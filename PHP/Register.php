<?php
require_once "db.php"; // include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (!empty($username) && !empty($password) && !empty($email)) {

        // Check if email already exists
        $stmt = mysqli_prepare($conn, "SELECT user_id FROM user WHERE email = ?");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            header("Location: ../HTML/Register.html?error=email_taken");
            exit;
        }
        mysqli_stmt_close($stmt);

        // Check if username already exists
        $stmt = mysqli_prepare($conn, "SELECT user_id FROM user WHERE username = ?");
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            header("Location: ../HTML/Register.html?error=username_taken");
            exit;
        }
        mysqli_stmt_close($stmt);

        // INSERT email too
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = mysqli_prepare($conn, "INSERT INTO user (username, email, password) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPassword);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: ../HTML/LoginPage.html");
            exit;
        } else {
            header("Location: ../HTML/Register.html?error=insert_failed");
            exit;
        }
        mysqli_stmt_close($stmt);

    } else {
        header("Location: ../HTML/Register.html?error=empty_fields");
        exit;
    }
}
?>
