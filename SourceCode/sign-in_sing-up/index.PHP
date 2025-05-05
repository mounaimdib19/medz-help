<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MEDZ CENTER Login & Registration Form</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />


</head>

<body>

  <header class="header">
    <nav class="nav">
      <img src="logo.png" alt="Logo" class="logo" />
    
    </nav>
  </header>

  <section class="home">
    <div class="form_container">
      <i class="uil uil-times form_close"></i>

      <div class="form login_form" style="display:block">
        <form action="#" method="post">
          <h2>Login</h2>
          <div class="input_box">
            <input type="email" id="login-email" name="login-email" placeholder="Enter your email" required />
            <i class="uil uil-envelope-alt email"></i>
          </div>
          <div class="input_box">
            <input type="password" name="passwordInput" id="passwordInput" placeholder="Enter your password" required />
            <i class="uil uil-lock password"></i>
            <i class="uil uil-eye-slash pw_hide"></i>
          </div>
          <div class="option_field">
            <span class="checkbox">
              <input type="checkbox" id="check" />
              <label for="check">Remember me</label>
            </span>
            <a href="#" class="forgot_pw">Forgot password?</a>
          </div>
          <input type="submit" class="button"  id="loginBtn" value="log in">
          <div id="error-login-email" class="error-message"></div>
          <div class="login_signup">Don't have an account? <a href="#" id="signupLink">Signup</a></div>
        </form>
      </div>

      <div class="form signup_form" style="display:none" >
        <form action="#" method="post">
          <h2>Signup</h2>

          <div class="input_box">
            <input type="text" name="fullNameInput" id="fullNameInput" placeholder="Enter your full name" required />
            <i class="uil uil-user"></i>
          </div>
          <div id="error-signup-fullname" class="error-message"></div>

          <div class="input_box">
            <input type="email" name="signup-email" id="signup-email" placeholder="Enter your email" required />
            <i class="uil uil-envelope-alt email"></i>
            <div id="error-signup-email" class="error-message"></div>
          </div>
          <div class="input_box">
            <input type="password" name ="signup-password" id="signup-password" placeholder="Create password" required />
            <i class="uil uil-lock password"></i>
            <i class="uil uil-eye-slash pw_hide"></i>
          </div>
          <div id="error-signup-password" class="error-message"></div>



          <div class="input_box">
            <input type="password"  name ="confirmpasswordinput" id="confirmPasswordInput" placeholder="Confirm password" required />
            <i class="uil uil-lock password"></i>
            <i class="uil uil-eye-slash pw_hide"></i>
          </div>

          <div class="input_box">
    <input type="text" name="locationinput" id="locationinput" placeholder="Enter your location" required />
    <i class="uil uil-location-point"></i>
        </div>
        <div id="error-registration-message" class="error-message"></div>
          <input type="submit" class="button" id="signupBtn" value="sign up">
          <div class="login_signup">Already have an account? <a href="#" id="loginLink">Login</a></div>
        </form>
      </div>
    </div>
  </section>

  <script src="script.JS"></script>
</body>

</html>

<?php
session_start();
function sanitize_input($data, $conn) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $conn->real_escape_string($data);
}

$dbHost = '127.0.0.1';
$dbName = 'medzhelp';
$dbUser = 'root';
$dbPass = '';


$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// submission for login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["login-email"]) && isset($_POST["passwordInput"])) {
    $login_email = sanitize_input($_POST["login-email"], $conn);
    $login_password = sanitize_input($_POST["passwordInput"], $conn);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $login_email);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($login_password, $user['password'])) {
            $_SESSION["username"] = $login_email;
            echo "<script>document.getElementById('error-login-email').innerHTML = '';</script>";
            echo "<script>document.getElementById('error-login-email').innerHTML = 'Welcome back, " . $_SESSION["username"] . "! Login successful';</script>";
            header("refresh:2;url=/LOGIN/MM.PHP");
            exit();
        } else {
            echo "<script>document.getElementById('error-login-email').innerHTML = 'Invalid password. Please try again.';</script>";
            
        }
    } else {
        echo "<script>document.getElementById('error-login-email').innerHTML = 'User not found. Please check your email or sign up for a new account.';</script>";
    }

    $stmt->close();
}

// Form submission for registration
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["fullNameInput"]) && isset($_POST["signup-email"]) && isset($_POST["signup-password"]) && isset($_POST["locationinput"])) {
  // Retrieve user inputs
  if($_POST["signup-password"]!=$_POST["confirmpasswordinput"]){
    echo "<script>document.getElementById('error-login-email').innerHTML = 'Error: Please try again.';</script>";
    echo '<script>  const formContainer = document.querySelector(".form_container");
const loginForm = document.querySelector(".login_form");
const signupForm = document.querySelector(".signup_form");
loginForm.style.display = "none";
signupForm.style.display = "block";</script>
';
  }else{
  $username = sanitize_input($_POST['fullNameInput'], $conn);
  $email = sanitize_input($_POST['signup-email'], $conn);
  $password = password_hash(sanitize_input($_POST['signup-password'], $conn), PASSWORD_DEFAULT);
  $location = sanitize_input($_POST['locationinput'], $conn);

  // Check if the email is already in the database
  $checkEmailStmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
  $checkEmailStmt->bind_param("s", $email);
  $checkEmailStmt->execute();
  $result = $checkEmailStmt->get_result();

  if ($result->num_rows > 0) {
      // Email already exists, display an error message
      echo "<script>document.getElementById('error-registration-message').innerHTML = 'Error: This email is already registered.';</script>";
      echo '<script>  const formContainer = document.querySelector(".form_container");
const loginForm = document.querySelector(".login_form");
const signupForm = document.querySelector(".signup_form");
loginForm.style.display = "none";
signupForm.style.display = "block";</script>

';
      $checkEmailStmt->close();
  } else {
      // Email is not in the database, proceed with registration
      $checkEmailStmt->close();

      // Prepare and execute the SQL statement for registration
      $registrationStmt = $conn->prepare("INSERT INTO users (username, email, password, location) VALUES (?, ?, ?, ?)");
      $registrationStmt->bind_param("ssss", $username, $email, $password, $location);

      if ($registrationStmt->execute()) {
          echo "<script>document.getElementById('error-login-email').innerHTML = 'User registered successfully!';</script>";
          header("refresh:2;url=/LOGIN/MM.PHP");
          $_SESSION['var']=1;
          exit();
        } else {
          echo "<script>document.getElementById('error-login-email').innerHTML = 'Error: Please try again.';</script>" . $registrationStmt->error;
          echo '<script>  const formContainer = document.querySelector(".form_container");
const loginForm = document.querySelector(".login_form");
const signupForm = document.querySelector(".signup_form");
loginForm.style.display = "none";
signupForm.style.display = "block";</script>

';
      }

      $registrationStmt->close();
  }
  $conn->close();
}
}
?>
