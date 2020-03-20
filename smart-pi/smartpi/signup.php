<!DOCTYPE html>

<?php
session_start();
if(isset($_SESSION["smartpi_user"]))
{
    header("Location: index.php");
}
 
include("connection/connection.php");

if(isset($_POST["signup"])){

$username = mysqli_real_escape_string($conn, $_POST["username"]);
$firstname = mysqli_real_escape_string($conn, $_POST["name"]);
$password = mysqli_real_escape_string($conn, $_POST["pw"]);
$signupinsert = "INSERT INTO smartpi_user (FName, Username, Pass, StepID) VALUES('$firstname','$username', MD5('$password'), '1') ";
$result = mysqli_query($conn, $signupinsert) or die(mysqli_error($conn));
header("Location: login.php");

}

?>


<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/custom.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700&display=swap" rel="stylesheet">
    <script src="../_javascript/main.js"></script>
    <script src="https://kit.fontawesome.com/a5fb41a228.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
</head>

<body>
<div id="particles-js"></div>
    <section class="hero is-primary is-fullheight">
        <div class="hero-body">
            <div class="container">

                <div class="columns is-centered">

                    <div class="column is-5-tablet is-4-desktop is-3-widescreen">
                        <div class="has-text-centered">
                            <a href="index.php">
                                <img src="../img/smartpi-logo.png" alt="Logo" width="200px">
                            </a>
                        </div>
                        <br>
                        <form method="POST" class="box" action="signup.php">
                            <div class="field">
                                <label for="" class="label">Username</label>
                                <div class="control has-icons-left">
                                    <input type="text" placeholder="e.g. smartkid123" class="input" required name="username">
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="field">
                                <label for="" class="label">Name</label>
                                <div class="control">
                                    <input type="text" placeholder="Enter your First Name" class="input" required name="name">

                                </div>
                            </div>

                            <div class="field">
                                <label for="" class="label">Password</label>
                                <div class="control has-icons-left">
                                    <input type="password" placeholder="*******" class="input" required name="pw">
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="field">

                                <button class="button is-info is-fullwidth" type="submit" name="signup">
                                    Sign Up
                                </button>
                            </div>

                            
                        </form>
                        <div class="has-text-centered">
                            <a href="index.php" class="button is-light is-rounded is-outlined has-text-centered">
                                Return to Homepage
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

<script>
        
        particlesJS.load('particles-js', '../particlesjs-config.json', function () {
            console.log('particles.js config loaded');
        });
    </script>
