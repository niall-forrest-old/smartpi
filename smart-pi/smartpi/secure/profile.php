<?php
session_start();
include("../functions/functions.php");
include("../connection/connection.php");


if (!isset($_SESSION["smartpi_user"])) {
    header("Location: ../index.php");
    $userid = $_SESSION["userid"];
}

include("../functions/getprogression.php");
include("../functions/getstep.php");
include("../functions/getuserachievements.php");

?>


<!DOCTYPE html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/custom.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700&display=swap" rel="stylesheet">
    <script src="../_javascript/main.js"></script>
    <script src="https://kit.fontawesome.com/a5fb41a228.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link href="https://fonts.googleapis.com/css?family=Chelsea+Market&display=swap" rel="stylesheet">


</head>

<body>

    <nav class="navbar is-transparent is-dark" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="../index.php">
                <img src="../../img/smartpi-logo.png" width="112" height="28">
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-end">
                <a href="../index.php" class="navbar-item underline">
                    <strong>Home</strong>
                </a>

                <a href="../index.php#middle" class="navbar-item underline">
                    Smart Cities
                </a>

                <a href="../get-started.php" class="navbar-item underline">
                    Get Started
                </a>

                <div class="navbar-item">
                    <div class="buttons">
                        <a href="profile.php" class="button is-primary is-rounded">
                            <i class="fas fa-user i-space"></i> My Profile
                        </a>
                        <a href="../logout.php" class="button is-light is-rounded is-outlined">
                            Log Out
                        </a>
                    </div>
                </div>
            </div>
    </nav>

    <section class="hero is-primary hero-text profile-banner">
        <div class="hero-body">
            <div class="container">

                <?php

                echo "<h1 class='title'> Hello, $fullname</h1>";
                ?>
                <h2 class="subtitle">
                    Your Profile
                </h2>
            </div>
        </div>
    </section>

    <section class="section profile-section">
        <div id="middle" class="container">

            <div class="columns">


                <div class="column is-one-third">
                    <div class="profile-container">

                        <?php
                        echo "<div class='progress-round playful-font-progress has-text-centered'>$userprogress%</div>"
                        ?>

                        <h1 class="title is-5 playful-font-button">Your Lesson Progress!</h1>
                        <h6 class="subtitle is-6 profile-text">
                            <br><b>Currently on Step <?php echo $stepnum ?>: </b><?php echo $steptitle ?>
                        </h6>

                        <h6 class="subtitle is-6">
                            <?php echo $stepdesc ?>
                        </h6>
                        <br>



                        <?php
                        if ($userstep == 1) {
                            echo "<div class='has-text-centered is-vcentered'>
                            <a href='lessonsteps/step-$userstep.php' class='button is-rounded is-large get-started hvr-grow is-yellow playful-font-button profile-continue'>
                                <strong>Begin Lesson!</strong>
                            </a>
                        </div>";
                        } else if ($userstep == 7) {
                            echo "<div class='has-text-centered is-vcentered'>
                            <a href='lessonsteps/step-1.php' class='button is-rounded is-large get-started hvr-grow is-yellow playful-font-button profile-continue'>
                                <strong>Start Lesson Again!</strong>
                            </a>
                        </div>";
                        } else {
                            echo "<div class='has-text-centered is-vcentered'>
                            <a href='lessonsteps/step-$userstep.php' class='button is-rounded is-large get-started hvr-grow is-yellow playful-font-button profile-continue'>
                                <strong>Continue Lesson!</strong>
                            </a>
                        </div>";
                        }

                        ?>

                    </div>
                </div>



                <div class="column is-two-thirds">
                    <div class="profile-container">

                        <button class="button-top-right playful-font-button open-modal">+</button>

                        <h1 class="title is-5 playful-font-button">Your Achievements!</h1>


                        <?php
                        //ACHIEVEMENTS CODE
                        //SQL inner join query to get the logged in user's lesson progression
                        $achievesql = "SELECT DISTINCT smartpi_achieve.AchieveName, smartpi_achieve.AchieveDesc, smartpi_achieve.achieve_img, smartpi_achieve_user.AchieveID 
                        FROM smartpi_achieve INNER JOIN smartpi_achieve_user ON smartpi_achieve.AchieveID = smartpi_achieve_user.AchieveID WHERE UserID = ?";

                        //Prepared Statement 
                        $stmt = mysqli_stmt_init($conn);

                        if (!mysqli_stmt_prepare($stmt, $achievesql)) {
                            echo "Statement failed";
                        } else {
                            //Bind params
                            mysqli_stmt_bind_param($stmt, "i", $userid);
                            //Run params
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);

                            $numrows = mysqli_num_rows($result);
                            //show hidden achievement images if user has no achievements
                            if ($numrows == 0) {
                                echo "<img class='achievement-img' src='../img/hidden-achievement.png' alt='achievement'>";
                                echo "<img class='achievement-img' src='../img/hidden-achievement.png' alt='achievement'>";
                                echo "<img class='achievement-img' src='../img/hidden-achievement.png' alt='achievement'>";
                                echo "<img class='achievement-img' src='../img/hidden-achievement.png' alt='achievement'>";
                                echo "<img class='achievement-img' src='../img/hidden-achievement.png' alt='achievement'>";
                            } else {
                                //Get user progress row and store in variable

                                //ensure profile only shows 5 achievements at a time
                                $acharr = array();
                                $count = 0;
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $acharr[] = $row["achieve_img"];
                                        $count = $count + 1;

                                        //only show up to 5 achievements unless the user clicks to view more achievements
                                        if ($count < 6) {
                                            echo "<img class='achievement-img' src='" . $row["achieve_img"] . "' alt='achievement'>";
                                        } else {
                                            //put each row into the array so that it can be displayed outside of while loop
                                            $achrow = "<img class='achievement-img' src='" . $row1["achieve_img"] . "' alt='achievement'>";
                                            $achievements .= $achrow;
                                        }
                                    }
                                }
                            }
                        }

                        ?>



                    </div>
                </div>

            </div>

        </div>


        <div class="modal ">
            <div class="modal-background"></div>
            <div class="modal-card animated tada profile-ach">
                <header class="modal-card-head has-text-centered">
                    <p class="modal-card-title">All Achievements</p>
                    <button class="delete" aria-label="close"></button>
                </header>
                <section class="modal-card-body">
                    <?php
                    foreach ($acharr as $achievement) {
                        echo "<img class='achievement-img' src='" . $achievement . "' alt='achievement'>";
                    }
                    ?>
                </section>
                <footer class="modal-card-foot">
                    <button class='close button is-rounded is-small get-started hvr-grow is-yellow playful-font-button profile-ach-close' aria-label="close">Close</button>
                </footer>
            </div>
        </div>

        <div class="progress-padding-profile">
            <div class="progress-bar center-progress">
                <div class="playful-font-progress-1"><?php echo $userprogress ?>%</div>
                <progress class="progress is-yellow" value="<?php echo $userprogress ?>" max="100"></progress>
            </div>
        </div>
    </section>

    <script src="lessonsteps/achieve-modal.js"></script>
    <script type="text/javascript" src="../../lib/main.js"></script>
    <script type="text/javascript" src="../../lib/nav.js"></script>

</body>