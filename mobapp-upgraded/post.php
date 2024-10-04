<?php
// Database connection details
include './conection-details.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form values
    $first_name = $_POST["first-name"];
    $middle_name = $_POST["middle-name"];
    $last_name = $_POST["last-name"];
    $birth_date = $_POST["birth-date"];
    $address = $_POST["address"];
    $zip_code = $_POST["zip-code"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm-password"];

    // Validate the form values
    $errors = array();
    if (empty($first_name)) {
        $errors[] = "First name is required";
    }
    if (empty($last_name)) {
        $errors[] = "Last name is required";
    }
    if (empty($email)) {
        $errors[] = "Email is required";
    }
    if (empty($password)) {
        $errors[] = "Password is required";
    }
    if ($password != $confirm_password) {
        $errors[] = "Passwords do not match";
    }

    // If there are no errors, insert the data into the database
    if (count($errors) == 0) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Connect to the database
        $conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Insert the data into the database
        $sql = "INSERT INTO registration (`firstname`, `middle`, `last`, `birth_day`, `address`, `zipcode`, `email`, `password`)
                VALUES ('$first_name', '$middle_name', '$last_name', '$birth_date', '$address', '$zip_code', '$email', '$hashed_password')";

        if (mysqli_query($conn, $sql)) {
            echo '<h1 class=" text-secondary m-auto text-center">Success </h1>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    } else {
        // Display the errors
        echo "Errors: <br>";
        foreach ($errors as $error) {
            echo "- " . $error . "<br>";
        }
    }
}
?>