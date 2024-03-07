<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Password</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .change-password-container {
      max-width: 400px;
      margin: 100px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="change-password-container">
        <h2 class="text-center">Change Password</h2>
        <form id="change-password-form" method="post">
          <div class="form-group">
            <label for="password">New Password</label>
            <input type="password" class="form-control" id="password" name="Password" placeholder="Enter new password">
          </div>
          <div class="form-group">
            <label for="confirm-password">Confirm New Password</label>
            <input type="password" class="form-control" id="confirm-password" placeholder="Confirm new password">
          </div>
          <div class="alert alert-success" id="password-success" style="display: none;">Password changed successfully!</div>
          <button type="submit" class="btn btn-primary btn-block">Change Password</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "financial-web-users";

    $conn = new mysqli($servername, $username, $password, $dbname);

 
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $Password = $_POST['Password'];
    $Email = $_SESSION['Email'];

    $sql = "UPDATE users SET Password = ? WHERE Email = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $Password, $Email);

    if ($stmt->execute() === TRUE) {
        echo "<script>document.getElementById('password-success').style.display = 'block';</script>";
    } else {
        echo "Error updating password: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
