<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mobile App Class</title>
    <link rel="stylesheet" href="./bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>


<!---------------------------Header--------------------------->
<nav class="navbar navbar-expand-lg bg-secondary p-0 m-0 position-sticky">
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

<!--------------------------PHP Form Logic-------------------------->
<?php
include './post.php';
?>
<!------------------------//PHP Form Logic//------------------------>

<!-------------------------Registration Form------------------------->
<div class="c-anime align-content-center vh-100">
    <br />
    <div class="glass rounded-3 p-3 m-auto c-w-r container-fluid">
        <h1 class="text-secondary text-center">Register</h1>
        <form class="row m-2" action="register.php" method="post">
            <div class="mb-2 col-xl-4">
                <label for="first-name" class="form-label text-secondary">First Name</label>
                <input type="text" name="first-name"
                    class="form-control rounded-5 border-secondary border-2 bg-transparent text-secondary" />
            </div>
            <div class="mb-2 col-xl-4">
                <label for="middle-name" class="form-label text-secondary">Middle Name</label>
                <input type="text" name="middle-name"
                    class="form-control rounded-5 border-secondary border-2 bg-transparent text-secondary" />
            </div>
            <div class="mb-2 col-xl-4">
                <label for="last-name" class="form-label text-secondary">Last Name</label>
                <input type="text" name="last-name"
                    class="form-control rounded-5 border-secondary border-2 bg-transparent text-secondary" />
            </div>
            <div class="mb-2">
                <label for="birth-date" class="form-label text-secondary">Birth Day</label>
                <input type="date" name="birth-date"
                    class="form-control rounded-5 border-secondary border-2 bg-transparent text-secondary" />
            </div>
            <div class="mb-2  col-md-9">
                <label for="address" class="form-label text-secondary">Address</label>
                <input type="text" name="address"
                    class="form-control rounded-5 border-secondary border-2 bg-transparent text-secondary" />
            </div>
            <div class="mb-2  col-md-3">
                <label for="zip-code" class="form-label text-secondary">Zip Code</label>
                <input type="text" name="zip-code"
                    class="form-control rounded-5 border-secondary border-2 bg-transparent text-secondary" />
            </div>
            <div class="mb-2">
                <label for="email" class="form-label text-secondary">Email Address</label>
                <input type="email" name="email"
                    class="form-control rounded-5 border-secondary border-2 bg-transparent text-secondary"
                    aria-describedby="emailHelp" />
            </div>
            <div class="mb-2">
                <label for="password" class="form-label text-secondary">Password</label>
                <input type="password" name="password"
                    class="form-control rounded-5 border-secondary border-2 bg-transparent text-secondary text-emphasis" />
            </div>
            <div class="mb-2">
                <label for="confirm-password" class="form-label text-secondary">Confirm Password</label>
                <input type="password" name="confirm-password"
                    class="form-control rounded-5 border-secondary border-2 bg-transparent text-secondary text-emphasis" />
            </div>
            <button name="submit" type="submit" value="submit" class="btn btn-secondary text-light w-auto p-2 m-2 rounded-5">Register</button>
        </form>
    </div>
</div>
<!-----------------------//Registration Form//----------------------->
<script src="bootstrap.min.js"></script>


</body>

</html>