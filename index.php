<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      background-color: yellow; /* Black background */
      color: #fff; /* White text color */
    }

    .banner {
      background-color: grey /* Black banner */
      height: 50px;
    }

    .login-container {
      max-width: 600px;
      margin: 100px auto;
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
      background-color: #111; /* Darker black container background */
    }

    .logo {
      width: 300px; /* Adjusted width for the logo */
      margin-bottom: 10px; /* Add space below the logo */
    }

    .login-word {
      font-size: 24px; /* Increase font size */
      color: #FFD700; /* Yellow color */
      text-transform: uppercase; /* Uppercase text */
    }

    .form-control {
      border: none; /* Remove border */
      border-radius: 20px; /* Rounded corners */
      background-color: #222; /* Darker black input background */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Light shadow */
      color: #fff; /* White text color */
    }

    .form-control:focus {
      outline: none; /* Remove focus outline */
      box-shadow: 0 0 10px rgba(255, 215, 0, 0.5); /* Yellow shadow on focus */
    }

    .custom-login-btn {
      background-color: #FFD700; /* Yellow button background */
      color: #000; /* Black button text color */
      border: none; /* Remove button border */
      border-radius: 20px; /* Rounded corners */
      padding: 10px 20px; /* Add padding */
      transition: background-color 0.3s ease; /* Smooth color transition */
    }

    .custom-login-btn:hover {
      background-color: #DAA520; /* Darker yellow button on hover */
    }

    .custom-register-btn,
    .custom-forgot-password-btn {
      background-color: #111; /* Darker black button background */
      color: #FFD700; /* Yellow button text color */
      border: none; /* Remove button border */
      border-radius: 20px; /* Rounded corners */
      padding: 5px 15px; /* Add padding */
      margin-right: 10px; /* Add space between buttons */
    }

    .custom-register-btn:hover,
    .custom-forgot-password-btn:hover {
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
          <img src="/images/brand2.png" class="logo">
        </div>
        <div class="login-container">
          <h2 class="text-center"><span class="login-word">LOGIN</span></h2>
          <form id="loginForm">
            <div class="form-group">
              <input type="text" class="form-control" id="username" placeholder="Username">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary btn-block custom-login-btn">Login</button>
          </form>
          <div class="text-center mt-3">
            <a href="register.html" class="btn btn-link custom-register-btn">Register</a>
            <a href="forgotpassword.html" class="btn btn-link custom-forgot-password-btn">Forgot Password</a>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];

    //Database Connection 
    $con = new mysqli("localhost", 'root', '', 'financial-web-users');
    if ($con->connect_error) {
        die("Failed to Connect: " . $con->connect_error);
    } else {
        $stmt = $con->prepare("SELECT * FROM users where Username = ?");
        $stmt->bind_param("s", $Username);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if ($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();
            if ($data["Password"] === $Password) {
                header("Location: HomePage.php");
                exit;
            } else {
                echo "<h2>Invalid Username or Password</h2>";
            }
        } else {
            echo "<h2>Invalid Username or Password</h2>";
        }
    }
}
?>
</body>
</html>