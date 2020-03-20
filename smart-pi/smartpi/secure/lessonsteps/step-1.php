<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("../../functions/functions.php");
include("../../connection/connection.php");

if (!isset($_SESSION["smartpi_user"])) {
    header("Location: ../../login.php");
    $userid = $_SESSION["userid"];
}

$ach = 1;
include("../../functions/getprogression.php");

//Advance user step and give user achievement


if (isset($_POST["updatestep"])) {
    //Update Query for user step
    $stepquery = "UPDATE smartpi_user SET StepID = '2' WHERE smartpi_user.UserID = ?";
    $stepstmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stepstmt, $stepquery)) {
        echo "Statement Failed";
    } else {
        mysqli_stmt_bind_param($stepstmt, "i", $userid);
        mysqli_stmt_execute($stepstmt);
        $result = mysqli_stmt_get_result($stepstmt);
        //change to achievement page
        header("Location: step-2.php");
    }
    mysqli_stmt_close($stepstmt);
    mysqli_close($conn);
}

if (isset($_POST["achieve"])) {
    //Update Query for achievements

    $achquery = "INSERT INTO smartpi_achieve_user (UserID, AchieveID) VALUES ($userid, 1);";
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
                <h1 class="title playful-font">Step 1: Introduction</h1>
            </div>
            <br>
        </div>

        <div class="timeline is-centered">
            <header class="timeline-header">
                <span class="tag is-large is-primary is-white">Start</span>
            </header>
            <div class="timeline-item is-primary"></div>
            <div class="timeline-item is-primary">
                <div class="timeline-marker timeline-marker-yellow"></div>

                <div class="timeline-content box lesson-content-left" data-aos="fade-left">
                    <p class="playful-font-lesson">1. What are the objectives of this lesson?</p>

                    <p class="is-size-5">This lesson is about about Smart Cities and how you can develop your own smart city device at home or in school!
                        Smart cities use sensors, data, and analytics to improve the quality of urban life. In this lesson you will be using a <mark id="pi">Raspberry Pi</mark> and
                        <mark id="aquality">Air Quality Sensor</mark> to create an air quality monitor. You can then check the air around you for particles and pollution. In the effort
                        to help our climate, it is important for us as smart citizens to be proactive and be aware of our local environment!</p>

                    <br>
                    <div class="important-info">
                        <p class="playful-font-info"> By the end of this lesson, you should be able to:</p>
                        <div class="is-size-5">
                            <ol class="list-indent">
                                <li>Recognise the challenges and opportunities cities face</li>
                                <li>Describe some different approaches to smart city design and delivery.</li>
                                <li>Create your own Smart City device - An air quality sensor!</li>
                            </ol>
                        </div>
                    </div>
                    <br>
                    <div class="is-inline-block playful-font-info">
                        TIP: If you see text <mark id="tip">highlighted in yellow</mark>, hover over it for more details and tips!
                    </div>

                </div>
            </div>

            <div class="timeline-item is-primary">
                <div class="timeline-marker timeline-marker-yellow"></div>
                <div class="timeline-content box lesson-content-right" data-aos="fade-right">
                    <p class="playful-font-lesson">2. Thinking about Smart Cities</p>

                    <p class="is-size-5">
                        Growing cities come with economic and population growth which has resulted in large increases
                        in vehicle, factory and energy usage and much more. Many of these challenges are tackled by using
                        the latest technology to a cities advantage!
                    </p>
                    <br>
                    <div class="important-info-reg is-inline-block playful-font-info">
                        For example, to tackle pollution, smart cities often use air quality monitors to ensure that levels are kept safe!
                    </div>
                    </p>
                    <br>
                    <p class="is-size-5">
                        During this lesson you will learn more about how smart cities use technology to improve the lives of their citizens, and how you can create your
                        own smart city air quality monitor!
                    </p>
                    <br>


                    <div class="lesson-img">
                        <img src="../../img/smart-city1.png" width="320" height="220">
                        <img src="../../img/air-qual-city.png" width="320" height="220">
                    </div>



                </div>
            </div>





            <div class="timeline-item is-primary">
                <div class="timeline-marker timeline-marker-yellow"></div>
                <div class="timeline-content box lesson-content-left" data-aos="fade-left">
                    <p class="playful-font-lesson">3. Activity - Reflection</p>
                    <br>
                    <p class="is-size-5">Consider the following questions:</p>
                    <br>

                    <div class="is-size-5">
                        <ol class="list-indent">
                            <li>What do you think the term <b>'Smart City'</b> means?</li>
                            <li>Are you aware of any Smart Cities? Look up your <b>nearest city</b> and see if you can find their <b>Smart City programme!</b></li>
                        </ol>

                    </div>

                    <p class="is-size-5">
                        <br>
                        <b>Look at some of the following smart city initiatives to get an idea of what Smart Cities are all about!</b></p>
                    <br>

                    <div class="is-centered full-width-center">
                        <div class="important-info is-inline-block">

                            <p class="playful-font-info">Pick a Smart City!</p>
                            <br>
                            <a id="nyc" href="https://smartcitiesny.com/"> <img src="../../img/newyork.png" onmouseover="this.src='../../img/newyork-hover.png';" onmouseout="this.src='../../img/newyork.png';" alt="ny"></a>
                            <a id="dub" href="https://smartdublin.ie/"> <img src="../../img/dublin.png" onmouseover="this.src='../../img/dublin-hover.png';" onmouseout="this.src='../../img/dublin.png';" alt="ny"></a>
                            <a id="ber" href="https://www.smart-city-berlin.de/en/home/"> <img src="../../img/berlin.png" onmouseover="this.src='../../img/berlin-hover.png';" onmouseout="this.src='../../img/berlin.png';" alt="ny"></a>

                        </div>
                    </div>
                </div>
            </div>




            <div class="timeline-item is-primary">
                <div class="timeline-marker timeline-marker-yellow"></div>
                <div class="timeline-content box lesson-content-right" data-aos="fade-right">
                    <p class="playful-font-lesson">4. What data are we collecting with the air quality monitor?</p>

                    <p class="is-size-5">Air is what we breathe. All life relies on the air. It’s about 78% nitrogen, 21% oxygen, and 1% argon,
                        and then there’s other assorted bits and pieces which have been created by humans. For humans, tiny particulate matter is
                        the most dangerous, as it can go into our bodies and damage our lungs.

                    </p>
                    <p class="is-size-5">
                        <br>
                        <b>Particulate Matter (PM) is measured as follows:</b></p>
                    <br>

                    <div class="important-info">
                        <p class="is-size-5">
                            Small particles are measured in <b>Micro Meters (µm).</b> PM10 are all particles in the air that are smaller than 10µm, whereas PM2.5 are all particles that are smaller than 2.5µm.
                            The smaller the particles, i.e. everything smaller than 2.5µm, the more dangerous they are to health as they can penetrate deep into human lungs.</p>
                        <br>

                        <div class="buttons is-centered">
                            <button class="button is-light is-medium"><b>Sand: 90µm</b></button>
                            <button class="button is-success is-medium"><b>Human Hair: 10-70µm</b></button>
                            <button class="button is-bright-yellow is-medium"><b>Dust: 10µm</b></button>
                            <button class="button is-warning is-medium"><b>Bacteria: 2.5µm</b></button>
                            <button class="button is-warning is-medium"><b>Organic matter: < 2.5µm</b> </button> </div> </div> <br>
                        </div>


                    </div>


                    <div class="timeline-item is-primary">
                        <div class="timeline-marker timeline-marker-yellow"></div>
                        <div class="timeline-content box lesson-content-right" data-aos="fade-right">
                            <p class="playful-font-lesson">5. Quick Quiz!</p>
                            <br>

                            <div class="important-info-reg is-inline-block playful-font-info">
                                <p class="is-size-5">What size of Particle Matter (PM) is the most dangerous for humans?</p>
                            </div>
                            <br>
                            <div class="anstoggle">
                                <button onclick="quizfeedback(); this.onclick=null;" class="button is-normal is-light is-fullwidth quiz-button-btm wr-bg"><strong>10µm</strong></button>
                                <button onclick="quizfeedback(); this.onclick=null;" class="button is-normal is-light is-fullwidth quiz-button-btm wr-bg"><strong>2.6µm</strong></button>
                                <button onclick="quizfeedback(); this.onclick=null;" class="button is-normal is-light is-fullwidth quiz-button-btm wr-bg"><strong>4.5µm</strong></button>
                                <button onclick="quizfeedbackR(); this.onclick=null;" class="button is-normal is-light is-fullwidth quiz-button-btm ri-bg"><strong>2.1µm</strong></button>
                            </div>

                            <p id="right-hidden"class='is-size-5'><br><b>Correct!</b> Particles smaller than 2.5 Microns can be very harmful to humans! This is what we will be looking for using our air quality sensor! </p>
                            <p id="wrong-hidden" class='is-size-5'><br><b>Incorrect!</b> Particles smaller than 2.5 Microns can be very harmful to humans! This is what we will be looking for using our air quality sensor! </p>
                        </div>
                    </div>

                    <header class="timeline-header">
                        <!-- <form method="POST" action="step-1.php">
                            <button id="nextstep" onclick="confetti.start(5000);" class="open-modal button is-rounded is-large get-started hvr-grow is-yellow" type="submit" name="achieve">
                                <strong>Next Step!</strong>
                            </button>
                        </form> -->


                        <button id="nextstep" onclick="confetti.start(10000);" class="giveachieve open-modal button is-rounded is-large get-started hvr-grow is-yellow" type="submit">
                            <strong>Next Step!</strong>
                        </button>






                        <br>

                    </header>
                    <div id="completequiz" class="has-text-centered">
                        <p class="playful-font-info">Complete the quiz to continue!</p>
                    </div>
                </div>


                <div class="modal ">
                    <div class="modal-background"></div>
                    <div class="modal-card animated tada">
                        <header class="modal-card-head has-text-centered">
                            <p class="modal-card-title">Achievement Earned!</p>
                            <button class="delete" aria-label="close"></button>
                        </header>
                        <section class="modal-card-body has-text-centered">
                            <img src="../../img/achievement1.png" alt="ach1">
                        </section>
                        <footer class="modal-card-foot">
                            <form method="POST" action="step-1.php">
                                <button class="button is-rounded is-medium get-started hvr-grow is-yellow center-button" type="submit" name="updatestep">
                                    <strong>Continue to Next Step!</strong>
                                </button>
                            </form>
                        </footer>
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
                    url: 'step-1.php',
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
    <script src="https://cdn.jsdelivr.net/gh/mathusummut/confetti.js/confetti.min.js"></script>
    <script src="https://unpkg.com/popper.js@1"></script>
    <script src="https://unpkg.com/tippy.js@5"></script>
    <script src="https://unpkg.com/popper.js@1"></script>
    <script src="https://unpkg.com/tippy.js@5/dist/tippy-bundle.iife.js"></script>
    <script src="tooltips.js"></script>
    <script src="achieve-modal.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <script src="lesson.js"></script>


</body>

</html>