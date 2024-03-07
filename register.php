<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Fullname = $_POST['Fullname'];
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    $conn = mysqli_connect('localhost', 'root', '', 'financial-web-users');
    if ($conn->connect_error) {
        die('Connection Failed: ' . mysqli_connect_error());
    } else {
        $stmt = $conn->prepare("INSERT INTO users (Fullname, Username, Email, Password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $Fullname, $Username, $Email, $Password);
        $stmt->execute();
        $stmt->close();
        
        // Redirect the user to the login page
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
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

    /* Styles for register page */

    .register-container {
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

    .form-control-register {
      border: 2px solid darkblue;
    }

    .register-container:hover button {
      background-color: blue; /* Blue color on button hover */
      border-color: white; /* Blue border on button hover */
    }

    .logo-register {
      width: 100%;
      border: 2px;
    }

    .register-word {
      color: greenyellow;
    }

    .register-text {
      font-family: "Lucida Sans", "Lucida Grande", "Lucida", sans-serif;
      color: white;
      box-shadow: 10px 10px 10px #000;
    }

    .custom-register-btn {
      background-color: transparent; /* Set background color to transparent */
      color: #ffffff; /* Set text color to white */
      border-color: #ffffff; /* Set border color to white */
    }

    .custom-register-btn:hover {
      background-color: white; /* Change the background color on hover to white */
      color: white; /* Change the text color on hover to black */
    }
      
  </style>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="register-container">
        <h2 class="text-center">Register</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <div class="form-group">
            <label for="fullname">Fullname</label>
            <input type="text" class="form-control" id="fullname" placeholder="Enter Fullname" name="Fullname">
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" placeholder="Enter username" name="Username">
          </div>
          <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="Email">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Enter password" name="Password">
          </div>
          <button type="submit" class="btn btn-primary btn-block custom-register-btn" name="register">Register</button>
        </form>
        <div class="alert alert-success mt-3" id="registration-success" style="display: none;">Account created successfully!</div>
        <div class="text-center mt-3">
          <a href="index.php" class="btn btn-link">Already have an account? Login</a>
        </div>
      </div>
    </div>
  </div>
</div>



</body>
</html>
