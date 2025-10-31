<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payment Confirmation</title>
    <style>
      body {
        font-family: Poppins, sans-serif;
        background: #0d0d0d;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: #e0e0e0;
      }
      .card {
        background: #1a1a1a;
        padding: 35px;
        border-radius: 14px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.6);
        width: 350px;
        text-align: center;
      }
      .title {
        font-size: 24px;
        font-weight: 600;
        color: #4da3ff;
        margin-bottom: 10px;
      }
      img {
        width: 180px;
        margin: 18px 0;
        border-radius: 8px;
      }
      input[type="file"] {
        margin: 15px 0;
        width: 100%;
        background: #262626;
        color: #e0e0e0;
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #333;
      }
      button {
        background: #4da3ff;
        color: #fff;
        border: none;
        padding: 12px;
        width: 100%;
        font-size: 16px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.3s;
        margin-top: 5px;
      }
      button:hover {
        background: #2a7cd6;
        transform: scale(1.02);
      }
      p {
        font-size: 14px;
        color: #bbb;
        margin-top: 10px;
      }
      .back-btn {
        display: inline-block;
        margin-top: 12px;
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
    <div class="card">
      <p class="title">Payment Confirmation</p>
      <p>Please complete your payment through GCash.</p>
      <img
        src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=GCASH-PAYMENT-LINK"
        alt="QR Code"
      />
      <p>Scan to Pay</p>
      <form
        action="../PHP/UploadReceipt.php"
        method="POST"
        enctype="multipart/form-data"
      >
        <input
          type="hidden"
          name="reservation_id"
          value="<?php echo $_GET['reservation_id']; ?>"
        />
        <input type="file" name="receipt" accept="image/*" required />
        <button type="submit">Complete Payment</button>
      </form>
      <p>Upload screenshot then submit.</p>
    </div>
  </body>
</html>
