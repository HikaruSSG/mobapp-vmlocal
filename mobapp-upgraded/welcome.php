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
          <li class="nav-item m-auto">
            <a class="nav-link text-light" href="logout.php">Log Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <?php
  // Start the session
  session_start();

  // Check if the user is logged in
  if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: index.php"); // Redirect to login page if not logged in
    exit;
  }

  // Retrieve the user's email from the session
  $email = $_SESSION["email"];

  // Create a connection to the database
  $databaseHost = 'localhost';
  $databaseName = 'registration';
  $databaseUsername = 'root';
  $databasePassword = '';
  $conn = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Prepare a query to retrieve the user's firstname
  $query = "SELECT firstname FROM registration WHERE email = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  // Fetch the user's firstname
  if ($result->num_rows > 0) { // Check if result is not empty
    $user_data = $result->fetch_assoc();
    $firstname = $user_data["firstname"];
  } else {
    // Handle the case when no result is found
    $firstname = null;
  }

  // Close the connection
  $conn->close();
  ?>


  <div class="c-anime align-content-center vh-100">
    <h1 class=" text-secondary m-auto text-center">Welcome, <?= $firstname ?>! </h1>
    
  </div>

  <script type="module" src="bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>