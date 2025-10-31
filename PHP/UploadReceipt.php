<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../HTML/LoginPage.html");
    exit;
}

require_once "db.php"; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reservation_id = intval($_POST['reservation_id']);

    // FILE UPLOAD HANDLER
    $targetDir = "../uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $fileName = basename($_FILES["receipt"]["name"]);
    $targetFile = $targetDir . time() . "_" . $fileName;

    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $allowed = ['jpg', 'jpeg', 'png'];
    if (in_array($fileType, $allowed)) {
        if (move_uploaded_file($_FILES["receipt"]["tmp_name"], $targetFile)) {

            // INSERT INTO DB
            $sql = "INSERT INTO payment (reservation_id, image_path) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("is", $reservation_id, $targetFile);

            if ($stmt->execute()) {
                echo "<script>
                        alert('Payment receipt uploaded successfully.');
                        window.location.href = '../HTML/dashboard.php';
                      </script>";
            } else {
                echo "Database error: " . $conn->error;
            }
        } else {
            echo "Failed to upload file.";
        }
    } else {
        echo "Only JPG, JPEG, PNG files are allowed.";
    }
} else {
    echo "Invalid request.";
}
?>
