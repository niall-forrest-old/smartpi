<?php
session_start();
include("functions/functions.php");
include("connection/connection.php");

//SEE README.MD for frameworks, sources and credits. 


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

    <script src="https://kit.fontawesome.com/a5fb41a228.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">


</head>

<body>
    <div id="particles-js"></div>


    <?php
    navbarChange();
    ?>
    <section class="hero is-medium hero-text hero-pos ">

        <div class="hero-body hero-content">
            <div class="container is-vcentered hero-text">
                <div class="animated fadeInDown columns is-4 is-vcentered">

                    <div class="column is-half-desktop is-offset-1-desktop">

                        <?php
                        //display user's name on home screen
                        if (isset($_SESSION["smartpi_user"])) {
                            $fullname = $_SESSION["fullname"];
                            echo "<h5 class='subtitle is-5'>Welcome to SmartPi, $fullname! </h5>";
                        } else {
                            echo "<h5 class='subtitle is-5'>Welcome to SmartPi</h5>";
                        }

                        ?>

                        <h1 class="title is-1 is-spaced playful-font-white">
                            Make your own <br> Smart City Device!
                        </h1>

                        <h2 class="subtitle is-5">
                            Learn how to use a Raspberry Pi device to create your own<br>Smart City device like an air
                            quality monitor!
                        </h2>
                        <br>

                        <a href="get-started.php" class="button is-rounded is-large get-started hvr-grow is-yellow mobile-button-spacing">
                            <strong>Get Started!</strong>
                        </a>


                        <a href="#middle" class="button is-light is-rounded is-large is-outlined hvr-icon-down is-inline-block">

                            <span class="icon is-small hvr-icon">
                                <i class="fas fa-fw fa-chevron-down hvr-icon"></i>
                            </span>

                            <strong>Smart City?</strong>
                        </a>
                    </div>

                    <div class="column is-4 is-spaced">
                        <img id="removeimage" src="../img/Group 151.png" alt="city">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section bg-1">
        <div id="middle" class="container smart-container">
            <h1 class="title"><br>What is a Smart City?</h1>
            <h2 class="subtitle is-5">
                A smart is a city that uses the latest and coolest technology<br> make cities safer, cleaner and better
                places to work and live.
            </h2>
            <br>
            <div class="columns">
                <div class="column">

                    <div class="smart-box">

                        <div class="content-opacity ">
                            <div class="has-text-centered">
                                <figure class="is-inline-block float-top">
                                    <img src="../img/smartphone.svg" width="175px">
                                </figure>
                            </div>
                            <div class="float-bottom">
                                <h1 class="title is-5">Internet of Things</h1>

                                <h6 class="subtitle is-6">
                                    A system of devices such as sensors, collect data about transport, energy, waste,
                                    crime and much more to help the city become a better place to live.
                                </h6>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="column">
                    <div class="smart-box">

                        <div class="has-text-centered">
                            <figure class="is-inline-block float-top">
                                <img src="../img/smart-city.svg" width="175px">
                            </figure>
                        </div>
                        <div class="float-bottom">
                            <h1 class="title is-5">Data</h1>
                            <h6 class="subtitle is-6 ">
                                This data from sensors is processed so that the city can detect where things
                                like air pollution, traffic and energy consumption have become an issue.
                            </h6>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <div class="smart-box">
                        <div class="has-text-centered">
                            <figure class="is-inline-block float-top">
                                <img src="../img/earth.svg" width="175px">
                            </figure>
                        </div>
                        <div class="float-bottom">
                            <h1 class="title is-5">Environment</h1>
                            <h6 class="subtitle is-6">
                                For example, deploying air quality sensors around a city can provide data to track peak times of bad air quality
                                so it can be improved, with the goal of improving people's health!


                            </h6>
                        </div>
                    </div>
                </div>

            </div>
            <div class="has-text-centered button-padding">
                <br>
                <a id="open-modal" href=""><button class="round-button is-inline-block"><img class="image is-inline-block" src="../img/play.png" width="25px" alt=""></button></a>

                <h6 class=" subtitle has-text-centered is-6"><small>Play Video</small></h5>

                    <div class="modal">
                        <div class="modal-background"></div>
                        <div class="modal-content">

                            <iframe width="960" height="960" src="https://www.youtube.com/embed/Br5aJa6MkBc" frameborder="0" allowfullscreen></iframe>

                        </div>
                        <button class="modal-close is-large" aria-label="close"></button>
                    </div>
            </div>
        </div>
    </section>


    <section class="section section-3">
        <div class="container smart-container is-vcentered is-center">
            <div class="columns is-vcentered">
                <div class="column is-two-thirds  is-vcentered">
                    <h1 class="title title-margin"><br>What is SmartPi?</h1>

                    <h2 class="subtitle is-5">
                        SmartPi is an online learning platform which teaches you <br>how to make your own Internet of Things Smart City Device!<br><br>

                        Smart City's are a great way to learn about Computing, <br> the Internet of Things,
                        and other STEM areas. SmartPi teaches <br> you to create your own air quality monitor
                        device at home or in school!
                    </h2>
                    <br>
                </div>

                <div class="column is-one-third is-spaced">
                    <img src="../img/raspberry-pi.svg.png" alt="pi">
                </div>


            </div>
        </div>

    </section>

    <footer class="footer footer-padding">

        <div class="content has-text-centered">
            <p>
                <img src="../img/smartpi-logo.png"><br>
            </p>
        </div>


    </footer>

    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>


    <script>
        //Load particlesJS custom config json file
        particlesJS.load('particles-js', '../particlesjs-config.json', function() {
            console.log('particles.js config loaded');
        });
    </script>

    <script type="text/javascript" src="../lib/main.js"></script>
    <script type="text/javascript" src="../lib/nav.js"></script>

</body>

</html>