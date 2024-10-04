<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mobile App Class</title>
  <link rel="stylesheet" href="./bootstrap.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
  <!---------------------------Header--------------------------->
  <nav class="navbar navbar-expand-lg bg-secondary p-0 m-0 position-sticky sticky-top">
    <div class="container">
      <a class="navbar-brand text-light" href="index.php">Mobile App Class</a>
      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="text-light"><i class="bi bi-flower1" style="font-size: 3rem;"></i></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item m-auto">
            <a class="nav-link active text-light" href="index.php">
              Log In
            </a>
          </li>
          <li class="nav-item m-auto">
            <a class="nav-link text-light" href="register.php">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-------------------------//Header//------------------------->

<!-------------------------Log In Logic------------------------->

<?php
// Configuration
include './conection-details.php' ;

// Create connection
$conn = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Prepare query
  $query = "SELECT * FROM registration WHERE email = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  // Check if user exists
  if ($result->num_rows > 0) {
      $user_data = $result->fetch_assoc();
      $hashed_password = $user_data["password"];

      // Verify password using password_verify()
      if (password_verify($password, $hashed_password)) {
          // Password is correct, log in successful
          session_start();
          $_SESSION["logged_in"] = true;
          $_SESSION["email"] = $email;
          header("Location: welcome.php"); // Redirect to dashboard
          exit;
      } else {
          // Password is incorrect, display error message
          $error = "Invalid email or password";
      }
  } else {
      // User does not exist, display error message
      $error = "Invalid email or password";
  }
}

// Close connection
$conn->close();
?>

<!-- Display error message if any -->
<?php if (isset($error)) { ?>
    <div class="alert alert-danger"><?= $error ?></div>
<?php } ?>

<!-----------------------//Log In Logic//----------------------->


  <!-------------------------Log In Form------------------------->
  <div class="c-anime align-content-center vh-100">
    <br />
    <div class="glass rounded-3 p-3 m-auto c-w">
      <h1 class="text-secondary text-center">Log In</h1>
      <form method="post">
        <div class="mb-2">
          <label for="exampleInputEmail1" class="form-label text-secondary">Email Address</label>
          <input type="email" class="form-control rounded-5 border-secondary border-2 bg-transparent text-secondary" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" />
          <div id="emailHelp" class="form-text"></div>
        </div>
        <div class="mb-2">
          <label for="exampleInputPassword1" class="form-label text-secondary">Password</label>
          <input type="password" class="form-control rounded-5 border-secondary border-2 bg-transparent text-secondary text-emphasis" id="exampleInputPassword1" name="password" />
        </div>
        <div class="mb-2 form-check">
          <input type="checkbox" class="form-check-input bg-transparent border-secondary border-2" id="exampleCheck1" />
          <label class="form-check-label text-secondary" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-secondary text-light">Sign In</button>
      </form>
    </div>
  </div>
  <!-----------------------//Log In Form//----------------------->
  <script type="module" src="bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>