<?php
session_start();
include("../../functions/functions.php");
include("../../connection/connection.php");

if (!isset($_SESSION["smartpi_user"])) {
    header("Location: ../../login.php");
}

include("../../functions/getprogression.php");


if (isset($_POST["updatestep"])) {
    //Update Query for user step
    $stepquery = "UPDATE smartpi_user SET StepID = '4' WHERE smartpi_user.UserID = ?";
    $stepstmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stepstmt, $stepquery)) {
        echo "Statement Failed";
    } else {
        mysqli_stmt_bind_param($stepstmt, "i", $userid);
        mysqli_stmt_execute($stepstmt);
        $result = mysqli_stmt_get_result($stepstmt);
        //change to achievement page
        header("Location: step-4.php");
    }
}

if (isset($_POST["achieve"])) {
    //Update Query for achievements

    $achquery = "INSERT INTO smartpi_achieve_user (UserID, AchieveID) VALUES ($userid, 3);";
    $updateRes = mysqli_query($conn, $achquery) or die(mysqli_error($conn));
    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SmartPi</title>
    <link rel="stylesheet" href="../../../css/main.css">
    <link rel="stylesheet" href="../../../css/custom.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700&display=swap" rel="stylesheet">
    <script src="../../../_javascript/main.js"></script>
    <script src="https://kit.fontawesome.com/a5fb41a228.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://fonts.googleapis.com/css?family=Chelsea+Market&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bulma-extensions@6.2.7/dist/js/bulma-extensions.min.js">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

</head>

<body>
    <nav class="navbar is-transparent is-dark" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a href="../../index.php" class="navbar-item" href="index.php">
                <img src="../../../img/smartpi-logo.png" width="112" height="28">
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-end">

                <div class="navbar-item">
                    <div class="buttons">
                        <a href="../../index.php" class="button is-light is-rounded is-outlined">
                            <strong><i class="fas fa-home i-space"></i>Return Home</strong>
                        </a>
                        <a href="../profile.php" class="button is-primary is-rounded">
                            <i class="fas fa-user i-space"></i> My Profile
                        </a>
                    </div>
                </div>
            </div>
    </nav>

    <section class="section">
        <div class="container has-text-centered">
            <div class="step-title">
                <h1 class="title playful-font">Step 3: Connecting the Sensor</h1>
            </div>
            <br>
        </div>

        <div class="timeline is-centered">
            <header class="timeline-header">
                <span class="tag is-large is-primary is-white">Start</span>

            </header>
            <div class="timeline-item is-primary"></div>
            <div class="timeline-item is-primary">
                <div class="timeline-marker  timeline-marker-yellow"></div>

                <div class="timeline-content box lesson-content-left" data-aos="fade-left">
                    <p class="playful-font-lesson">1. Getting Started - Why are we measuring?</p>

                    <p class="is-size-5">In this part of the lesson you will learn how to co-create your own smart city project; an air quality monitor! Keeping tabs on your
                        local air pollution is a great way to get involved in the discussion around smart cities and how they can help solve environmental issues!
                    </p>
                    <br>
                    <p class="is-size-5">Here in the UK, we have relatively little data about <mark id="quality">air quality</mark>. While there are official sensors in most major towns
                        and cities, the effects of pollution can be very localised around busy roads and trapped in valleys. How does the particular
                        make-up of your area affect your local air quality? In this lesson we are setting out to monitor our environment to see how concerned we should be
                        about our local air.</p>
                    <div class="full-width-center">
                        <br>
                        <img class="img-radius" src="https://image.jimcdn.com/app/cms/image/transf/none/path/s84afce38611cf0b3/image/ia4b650b2720d122f/version/1573649439/thresholds-colors-and-meaning-of-the-levels-of-the-air-quality-index.png" width="650" alt="">
                    </div>
                </div>
            </div>

            <div class="timeline-item is-primary">
                <div class="timeline-marker timeline-marker-yellow"></div>
                <div class="timeline-content box lesson-content-right" data-aos="fade-right">
                    <p class="playful-font-lesson">2. Setting up your Raspberry Pi</p>

                    <p class="is-size-5">There are many models of Raspberry Pi, and you can use any model for this lesson! If you are using a Raspberry Pi Zero, you will
                        need a USB hub in order to connect a keyboard, mouse and the air quality monitor at the same time. To see a list of what you need, have a look at the <mark><a href="../getstarted.php">Get Started</a></mark>
                        page!</p>
                    <div class="full-width-center">
                        <img class="img-radius" width="400px" src="../../img/pi-plug-in.gif" alt="pi">
                    </div>
                    <p class="is-size-5">If your SD card has not been set up with the Raspbian OS yet, you can easily install it yourself. The <mark id="noobs">NOOBS software</mark> is the
                        best way to install Raspbian. <mark><a href="https://www.raspberrypi.org/downloads/noobs/">Click here</a></mark> to go to the NOOBS download page.</p>
                    <br>
                    <p class="is-size-5">Once you have NOOBS downloaded, copy all of the files in the NOOBS folder and paste them into the SD card.
                        Once the files have copied over, you can remove the SD card and insert it into the Raspberry Pi!<br><br> If you have any issues
                        with your Raspberry Pi, head over to the <mark><a href="https://www.raspberrypi.org/learning/troubleshooting-guide/">troubleshooting page!</a></mark></p>

                </div>
            </div>

            <div class="timeline-item is-primary">
                <div class="timeline-marker timeline-marker-yellow"></div>
                <div class="timeline-content box lesson-content-left" data-aos="fade-left">
                    <p class="playful-font-lesson">3. Connecting the air quality monitor</p>

                    <p class="is-size-5">The <mark id="nova">Nova PM SDS011</mark> connects to the Raspberry Pi with the Serial to USB adapter. Once you have it securely connected, you are ready to
                        monitor the air around you!
                    </p>
                    <br>
                    <div class="full-width-center">
                        <img class="img-radius" src="../../img/sds-connect.jpg" alt="usbserial" width="400px">
                    </div>


                </div>
            </div>

            <div class="timeline-item is-primary">
                <div class="timeline-marker timeline-marker-yellow"></div>
                <div class="timeline-content box lesson-content-left" data-aos="fade-right">
                    <p class="playful-font-lesson">4. Before we start to code...</p>

                    <p class="is-size-5">Before we start on the Python coding, we have to find a place to store and display our air quality data. For this we are going to use a <mark id="cloud">cloud service</mark> called
                        Adafruit IO. You will need a free account, which you can create on the <mark><a href="https://io.adafruit.com/">AdafruitIO website.</a></mark> When you create your account, it is important that you
                        write down your <mark id="key">Username and Adafruit IO key</mark>, which we will need later when writing our Python code!
                    </p>
                </div>
            </div>

            <div class="timeline-item is-primary">
                <div class="timeline-marker timeline-marker-yellow"></div>
                <div class="timeline-content box lesson-content-left" data-aos="fade-left">
                    <p class="playful-font-lesson">4. Last but not least...</p>

                    <p class="is-size-5">We will be using <b>Python 3</b> for our code - this comes pre-installed with Raspbian! However we will need to install two <mark id="module">Python Modules.</mark>
                        You can install these modules by entering the following command in a terminal window: <code>pip3 install pyserial adafruit-io</code>
                    </p>
                    <br>
                    <div class="full-width-center">
                        <img class="img-radius" src="https://rpi-magazines.s3-eu-west-1.amazonaws.com/magpi/legacy-assets/2017/04/Open-Terminal-Raspberry-Pi.jpg" width="600px" alt="">
                    </div>
                </div>
            </div>

            <div class="timeline-item is-primary">
                <div class="timeline-marker timeline-marker-yellow"></div>
                <div class="timeline-content box lesson-content-right" data-aos="fade-right">
                    <p class="playful-font-lesson">5. Quick Recap Quiz</p>


                    <div class="important-info-reg is-inline-block playful-font-info">
                        <p class="is-size-5">What programming language are we using for the lesson?</p>
                    </div>
                    <br>
                    <br>
                    <div class="anstoggle">
                        <button onclick="quizfeedback(); this.onclick=null;" class="button is-normal is-light is-fullwidth quiz-button-btm wr-bg"><strong>Java</strong></button>
                        <button onclick="quizfeedbackR(); this.onclick=null;" class="button is-normal is-light is-fullwidth quiz-button-btm ri-bg"><strong>Python 3</strong></button>
                        <button onclick="quizfeedback(); this.onclick=null;" class="button is-normal is-light is-fullwidth quiz-button-btm wr-bg"><strong>PHP</strong></button>
                        <button onclick="quizfeedback(); this.onclick=null;" class="button is-normal is-light is-fullwidth quiz-button-btm wr-bg"><strong>C++</strong></button>
                    </div>
                    <p id="right-hidden" class='is-size-5'><br><b>Correct!</b> We will be using Python 3 to code our air quality monitor!</p>
                    <p id="wrong-hidden" class='is-size-5'><br><b>Incorrect!</b> We will be using Python 3 to code our air quality monitor!</p>
                </div>
            </div>

            <header class="timeline-header">
                <button id="nextstep" onclick="confetti.start(10000);" class="giveachieve open-modal button is-rounded is-large get-started hvr-grow is-yellow" type="submit">
                    <strong>Next Step!</strong>
                </button>
            </header>


            <div id="completequiz" class="has-text-centered">
                <p class="playful-font-info">Complete the quiz to continue!</p>
            </div>

            

            <div class="modal ">
                <div class="modal-background"></div>
                <div class="modal-card animated tada">
                    <header class="modal-card-head has-text-centered">
                        <p class="modal-card-title">Achievement Earned!</p>
                        <button class="delete" aria-label="close"></button>
                    </header>
                    <section class="modal-card-body has-text-centered">
                        <img src="../../img/achievement3.png" alt="ach1">
                    </section>
                    <footer class="modal-card-foot">
                        <form method="POST" action="step-3.php">
                            <button class="button is-rounded is-medium get-started hvr-grow is-yellow center-button" type="submit" name="updatestep">
                                <strong>Continue to Next Step!</strong>
                            </button>
                        </form>
                    </footer>
                </div>
            </div>
        </div>

    </section>
    <div class="progress-padding">
        <div class="progress-bar">
            <div class="playful-font-progress-1"><?php echo $userprogress ?>%</div>
            <progress class="progress is-yellow" value="<?php echo $userprogress ?>" max="100"></progress>
        </div>
    </div>
    <br>

    <script>
        //Ajax for giving user an achievement
        $(document).ready(function() {
            $('.giveachieve').one('click', function() {

                $.ajax({
                    type: "POST",
                    url: 'step-3.php',
                    data: {
                        'achieve': name
                    },
                    success: function() {
                        console.log("Achievement SQL successful"); // alerts the response from myphpdoc.php
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        console.log("Achievement SQL unsuccessful");
                    }
                });
            });
        });
    </script>

    <script src="lesson.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/mathusummut/confetti.js/confetti.min.js"></script>
    <script src="achieve-modal.js"></script>

    <script src="https://unpkg.com/popper.js@1"></script>
    <script src="https://unpkg.com/tippy.js@5"></script>
    <script src="https://unpkg.com/popper.js@1"></script>
    <script src="https://unpkg.com/tippy.js@5/dist/tippy-bundle.iife.js"></script>
    <script src="tooltips.js"></script>

    <script type="text/javascript" src="../lib/main.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>


</body>

</html>