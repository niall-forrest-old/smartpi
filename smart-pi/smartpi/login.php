<?php

if (isset($_POST["submit"])) {

    
    $loginerror = false;

    include("connection/connection.php");

    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $pass = mysqli_real_escape_string($conn, $_POST["password"]);

    $checkuser = "SELECT * FROM smartpi_user WHERE Username='$username' AND Pass=MD5('$pass')";

    $sql = mysqli_query($conn, $checkuser) or die(mysqli_error($conn));

    mysqli_close($conn);

    if (mysqli_num_rows($sql) > 0) {
        session_start();
        $_SESSION["smartpi_user"] = $username;
        header("Location: index.php");

        while ($row = mysqli_fetch_assoc($sql)) {
           $_SESSION["userid"] = $row["UserID"];
           $_SESSION["fullname"] = $row["FName"];
           $_SESSION["stepid"] = $row["StepID"];
         }

    } else {

        $loginerror = true;
    }
}

?>
<!DOCTYPE html>

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
    <link href="https://fonts.googleapis.com/css?family=Chelsea+Market&display=swap" rel="stylesheet">




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

                        <div class="box">

                            <?php if ($loginerror) { ?>
                                <div class="notification is-danger">
                                    <button class="delete"></button>
                                    <small>Your Username or Password is incorrect, please try again.</small>
                                </div>
                            <?php } ?>

                            <form action="login.php" method="POST">
                                <div class="field">
                                    <label for="" class="label">Username</label>
                                    <div class="control has-icons-left">
                                        <input name="username" type="text" placeholder="e.g. bobsmith" class="input" required>
                                        <span class="icon is-small is-left">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="" class="label">Password</label>
                                    <div class="control has-icons-left">
                                        <input name="password" type="password" placeholder="*******" class="input" required>
                                        <span class="icon is-small is-left">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                    </div>
                                </div>


                                <div class="field">
                                    <button class="button is-primary is-inline-block is-fullwidth" name='submit' type='submit'>
                                        Login
                                    </button>


                                </div>

                                <span class="has-text-centered ">
                                    <h1 class="playful-font-small or-margin">OR</h1>
                                </span>
                            </form>

                            <a href="signup.php">
                                <button class="button is-info is-fullwidth">
                                    Sign Up
                                </button>
                            </a>

                        </div>

                        <div class="has-text-centered">
                            <a href="index.php" class="button is-light is-rounded is-outlined has-text-centered">
                                <i class="fas fa-home i-space"></i> Return to Homepage
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
    particlesJS.load('particles-js', '../particlesjs-config.json', function() {
        console.log('particles.js config loaded');
    });

//JS For Error Message deletion
    document.addEventListener('DOMContentLoaded', () => {
        (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
            $notification = $delete.parentNode;

            $delete.addEventListener('click', () => {
                $notification.parentNode.removeChild($notification);
            });
        });
    });
</script>