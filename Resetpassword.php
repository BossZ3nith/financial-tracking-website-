<?php
session_start(); // Start the session

// Assuming you've already connected to your MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "financial-web-users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if email exists
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = sanitize_input($_POST['Email']);
    
    // Store the email in session
    $_SESSION['Email'] = $Email;

    // Prepare and execute query
    $stmt = $conn->prepare("SELECT * FROM users WHERE Email = ?");
    $stmt->bind_param("s", $Email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if email exists
    if ($result->num_rows > 0) {
        // Redirect user to another page if email exists
        header("Location: Changepassword.php");
        exit;
    } else {
        $error_message = "Email does not exist in the database";
    }

    $stmt->close();
}

$conn->close();
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: yellow; /* Black background */
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      color: #FFD700; /* White text color */
    }

    .banner {
      background-color: yellow; /* Darker black banner */
      height: 50px;
    }

    .forgot-password-container {
      max-width: 800px; /* Adjusted max-width for the container */
      margin: 100px auto;
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
      background-color: #111; /* Darker black container background */
    }

    .form-control {
      border: none;
      border-radius: 20px;
      background-color: #222; /* Darker black input background */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      color: #fff;
      padding: 15px 20px; /* Adjust padding */
      margin-bottom: 20px; /* Add space between inputs */
    }

    .form-control:focus {
      outline: none;
      box-shadow: 0 0 10px rgba(255, 215, 0, 0.5);
    }

    .btn-primary {
      background-color: #FFD700; /* Yellow button background */
      color: #000; /* Black button text color */
      border: none; /* Remove button border */
      border-radius: 20px; /* Rounded corners */
      padding: 15px 30px; /* Adjust padding */
      margin-top: 20px; /* Add space between button and inputs */
      transition: background-color 0.3s ease; /* Smooth color transition */
    }

    .btn-primary:hover {
      background-color: #DAA520; /* Darker yellow button on hover */
    }

    .btn-link {
      background-color: #111; /* Darker black button background */
      color: #FFD700; /* Yellow button text color */
      border: none; /* Remove button border */
      border-radius: 20px; /* Rounded corners */
      padding: 10px 20px; /* Adjust padding */
      margin-right: 10px; /* Add space between buttons */
    }

    .btn-link:hover {
      background-color: #222; /* Darker black button on hover */
    }
  </style>
</head>

<body>
  <div class="banner">
    <!-- Add your banner content here -->
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="text-center">
          <img src="/images/brand1.png" class="logo">
        </div>
        <div class="forgot-password-container">
          <h2 class="text-center">Forgot Password</h2>
          <br>
          <form>
            <div class="form-group">
              <input type="email" class="form-control" id="email" placeholder="Email Address">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
          </form>
          <div class="text-center mt-3">
            <a href="loginscreen.html" class="btn btn-link">Return to login screen</a>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>