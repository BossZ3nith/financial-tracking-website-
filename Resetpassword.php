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
      background-color: #f8f9fa;
    }
    .forgot-password-container {
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
      <div class="forgot-password-container">
        <h2 class="text-center">Forgot Password</h2>
        <?php if(isset($error_message)): ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $error_message; ?>
          </div>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email" name="Email" placeholder="Enter email">
          </div>
          <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
        </form>
        <div class="text-center mt-3">
          <a href="index.php" class="btn btn-link">Return to login screen</a>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
