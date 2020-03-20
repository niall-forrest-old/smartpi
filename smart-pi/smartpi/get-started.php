<?php
session_start();
include("functions/functions.php");
include("connection/connection.php");
include("functions/getstep.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SmartPi</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/custom.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Chelsea+Market&display=swap" rel="stylesheet">
    <script src="../_javascript/main.js"></script>
    <script src="https://kit.fontawesome.com/a5fb41a228.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

</head>

<body>
    <?php
    navbarChange();
    ?>

    <section class="hero  hero-text">
        <div class="hero-body">
            <div class="container">
                <div class="animated fadeInDown columns is-4 is-vcentered">

                    <div class="column is-half-desktop is-offset-1-desktop">


                        <h1 class="title is-1 is-spaced playful-font-medium">
                            Ready to make
                            <br>
                            your own air quality
                            <br>
                            monitor?
                        </h1>

                        <h2 class="subtitle is-5">
                            How clean is the air you breathe? Discover how healthy
                            your area is and what you can do to improve it!
                            SmartPi lets you examine the air around you with a
                            RaspberryPi and air quality sensor equipment!
                        </h2>
                        <br>

                        <?php
                        //Take user to their current lesson step if lesson has already began, if not, display begin lesson button
                        if ($userstep > 1 && $userstep < 7) {
                            echo "<a href='secure/lessonsteps/step-$userstep.php' class='button is-rounded is-large get-started hvr-grow is-yellow'>
                                    <strong>Continue Lesson!</strong></a>";
                        } else if ($userstep == 7) {
                            //else if user hasn't started lesson, show begin lesson button
                            echo "<a href='secure/lessonsteps/step-1.php' class='button is-rounded is-large get-started hvr-grow is-yellow'>
                                    <strong>Restart the lesson!</strong></a>";
                        } else {
                            echo "<a href='secure/lessonsteps/step-1.php' class='button is-rounded is-large get-started hvr-grow is-yellow'>
                            <strong>Begin the lesson!</strong></a>";
                        }

                        ?>

                    </div>

                    <div class="column is-4 is-spaced">
                        <img src="../img/raspberry-pi.svg.png" alt="city">
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="hero is-medium is-danger">

        <div class="container">
            <h1 class="title">
                <br>
                <br>
                All you need to measure, record and explore...

            </h1>
            <br>

        </div>
        <br>
        <div class="columns is-centered">
            <div class="column is-one-fifth has-text-centered">

                <p class="notification is-white"><i class="fab fa-raspberry-pi fa-3x"></i>
                    <br><br><strong>Raspberry Pi</strong><br><br>
                    Any model of <a href="https://www.raspberrypi.org/products/"><b>Raspberry Pi</b></a> will do. If using a Raspberry Pi Zero
                    to ensure that you have a USB to Micro-USB adapter!
                </p>



            </div>
            <div class="column is-one-fifth has-text-centered">
                <p class="notification is-white"><i class="fas fa-smog fa-3x"></i><br><br><strong>Air Quality Sensor</strong><br><br>
                    There are many air quality sensors on the market,
                    however we would recommend the <a href="https://www.amazon.co.uk/iHaospace-Quality-Detection-Conditioning-Monitor/dp/B07D7BL33R/ref=sr_1_1?keywords=sds011&qid=1583694636&sr=8-1"><b>NovaPM SDS011</b></a> N for it's value and accuracy</p>
            </div>
            <div class="column is-one-fifth has-text-centered">
                <p class="notification is-white"><i class="far fa-keyboard fa-3x"></i>
                    <br><br><strong>Keyboard and Mouse</strong><br><br>
                    A keyboard and mouse is needed to operate and navigate the Raspbian OS and to write and run your Python code!</p>
            </div>
            <div class="column is-one-fifth has-text-centered">
                <p class="notification is-white"><i class="fas fa-desktop fa-3x"></i><br><br><strong>Monitor</strong><br><br>
                    You need a monitor to navigate the operating system and to view and monitor the readings from the air quality sensor!</p>
            </div>
        </div>
        <br>

    </section>

    <footer class="footer footer-padding">

        <div class="content has-text-centered">
            <p>
                <img src="../img/smartpi-logo.png"><br>
            </p>
        </div>


    </footer>


    <script type="text/javascript" src="../lib/main.js"></script>
    <script type="text/javascript" src="../lib/nav.js"></script>
</body>

</html>