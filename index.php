<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-image: url('bg.png');
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      padding: 50px 0px;
    }

    .login-container {
      max-width: 300px;
      margin: 100px auto;
      padding: 50px;
      background: rgba(255, 255, 255, 0.2);
      border: 2px solid white; /* Border with solid white color */
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.6); /* Shadow effect */
      backdrop-filter: blur(3px); /* Blur effect */
      color: white;
      position: relative; /* To allow absolute positioning of logo */
    }

    .login-container .logo {
      position: absolute;
      top: 0;
      left: 50%;
      transform: translateX(-50%);
    }

    .login-container:hover button {
      background-color: blue; /* Blue color on button hover */
      border-color: white; /* Blue border on button hover */
    }

    .form-control {
      border: 2px solid darkblue;
    }

    .logo {
      width: 100%;
      border: 2px;
    }

    .login-word {
      color: greenyellow;
    }

    .login-text {
      font-family: "Lucida Sans", "Lucida Grande", "Lucida", sans-serif;
      color: white;
      box-shadow: 10px 10px 10px #000;
    }

    .custom-login-btn {
      background-color: transparent; /* Set background color to transparent */
      color: #ffffff; /* Set text color to white */
      border-color: #ffffff; /* Set border color to white */
    }

    .custom-login-btn:hover {
      background-color: red; /* Change the background color on hover to white */
      color: white; /* Change the text color on hover to black */
    }

    .custom-register-btn {
      background-color: transparent; /* Set background color to transparent */
      color: #ffffff; /* Set text color to white */
    }

    .custom-register-btn:hover {
      background-color: #ffffff; /* Change the background color on hover to white */
      color: #000000; /* Change the text color on hover to black */
    }

    .custom-forgot-password-btn {
      background-color: transparent; /* Set background color to transparent */
      color: #ffffff; /* Set text color to white */
    }

    .custom-forgot-password-btn:hover {
      background-color: #ffffff; /* Change the background color on hover to white */
      color: #000000; /* Change the text color on hover to black */
    }
  </style>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="login-container">
        <img src="brand.png" class="logo" alt="Logo">
        <h2 class="text-center">Login</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="Username" placeholder="Enter username">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="Password" placeholder="Enter password">
          </div>
          <button type="submit" class="btn btn-primary btn-block custom-login-btn">Login</button>
        </form>
        <div class="text-center mt-3">
          <a href="Register.php" class="btn btn-link custom-register-btn">Register</a>
          <a href="Resetpassword.php" class="btn btn-link custom-forgot-password-btn">Forgot Password</a>
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
