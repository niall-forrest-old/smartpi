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
    $stepquery = "UPDATE smartpi_user SET StepID = '7' WHERE smartpi_user.UserID = ?";
    $stepstmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stepstmt, $stepquery)) {
        echo "Statement Failed";
    } else {
        mysqli_stmt_bind_param($stepstmt, "i", $userid);
        mysqli_stmt_execute($stepstmt);
        $result = mysqli_stmt_get_result($stepstmt);
        //change to achievement page
        header("Location: ../profile.php");
    }
}

if (isset($_POST["achieve"])) {
    //Update Query for achievements

    $achquery = "INSERT INTO smartpi_achieve_user (UserID, AchieveID) VALUES ($userid, 6);";
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
                <h1 class="title playful-font">Step 6 - Viewing your data and Conclusion</h1>
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
                    <p class="playful-font-lesson">1. Run the Script</p>

                    <p class="is-size-5">You are ready to run the script and monitor the air! Make sure your air quality sensor is plugged into your Raspberry Pi,
                        then open a Terminal window, in the same location as your script and type the following command <code>python3 airquality.py</code>
                    </p>

                    <br>
                    <div class="full-width-center">
                        <img class="img-radius" width="500px" src="../../img/command.PNG" alt="comm">
                    </div>


                </div>
            </div>

            <div class="timeline-item is-primary">
                <div class="timeline-marker timeline-marker-yellow"></div>
                <div class="timeline-content box lesson-content-left" data-aos="fade-right">
                    <p class="playful-font-lesson">2. Create a dashboard</p>

                    <p class="is-size-5">
                        In the previous step you set up two feeds for both sizes of Particulate Matter. You can now create a dashboard that displays the data visually in real time!
                    </p>
                    <br>
                    <p class="is-size-5">To do this, navigate to <mark>Dashboards > Actions > Create a New Dashboard</mark></p>
                    <br>
                    <div class="full-width-center">
                        <img class="img-radius" width="250px" src="../../img/dashboard.PNG" alt="dash">
                    </div>
                    <br>
                    <p class="is-size-5">Give the dashboard a Name and Description. Once created, you can add new dashboard items. See an example of a dashboard you can create below!</p>
                    <br>
                    <div class="full-width-center">
                        <img class="img-radius" width="650px" src="../../img/dashboarditems.PNG" alt="items">
                    </div>


                </div>
            </div>

            <div class="timeline-item is-primary">
                <div class="timeline-marker timeline-marker-yellow"></div>
                <div class="timeline-content box lesson-content-left" data-aos="fade-left">
                    <p class="playful-font-lesson">3. What next?</p>

                    <p class="is-size-5">From here you can keep your monitor on and use the dashboard to keep an eye on the air quality in your area!</p>
                    <br>

                    <div class="important-info-reg">
                        <p class="playful-font-info">Example Activities!</p>
                        <br>

                        <div class="columns">
                            <div class="column example-bg">
                                <p class="playful-font-info is-size-5">With a portable power supply, set up the monitor outdoors and compare the values in different areas. For example, compare roadside to a park, or indoors to outdoors! </p>
                            </div>

                            <div class="column example-bg">
                                <p class="playful-font-info is-size-5">What activities produce the most particles?</p>
                                <br>
                                <ul>
                                    <li>Walking on carpet</li>
                                    <li>Sweeping up dust</li>
                                    <li>Shaking hair</li>
                                    <li>Tearing paper</li>
                                    <li>Rubbing hands together</li>

                                </ul>

                            </div>

                        </div>


                    </div>
                </div>

            </div>

            <div class="timeline-item is-primary">
                <div class="timeline-marker timeline-marker-yellow"></div>
                <div class="timeline-content box lesson-content-left" data-aos="fade-right">
                    <p class="playful-font-lesson">4. What should you be looking out for?</p>

                    <p class="is-size-5">
                        As mentioned in the first step, the <mark id="who">World Health Organisation</mark> air quality guidelines state the following:</p>
                    <br>
                    <div class="important-info-reg is-inline-block playful-font-info">
                        <p class="is-size-5"> PM2.5 should not exceed 25 µg/m3 24-hour mean and PM10 50 µg/m3 24-hour mean.</p>
                    </div>
                    <br>
                    <br>
                    <p class="is-size-5"> There is a good chance that your readings will be much lower than that, unless you are monitoring in a very densely populated city environment!</p>
                    <br>


                </div>
            </div>

            <div class="timeline-item is-primary">
                <div class="timeline-marker timeline-marker-yellow"></div>
                <div class="timeline-content box lesson-content-left" data-aos="fade-right">
                    <p class="playful-font-lesson">5. Back to Smart Cities</p>

                    <p class="is-size-5">
                        You can now call yourself a Smart Citizen! It is very important to be aware of the air around you and the dangers of air pollution; with your monitor
                        you are helping to <mark id="dem">democratise smart data</mark> and prove that everyone can get involved in the smart city process! Air quality is one of the many
                        <mark id="wicked">wicked problems</mark> that Smart Cities try to solve and we hope that you will get involved in the conversation!
                    </p>
                    <br>
                    <div class="important-info-reg is-inline-block playful-font-info">
                        <p class="is-size-5">
                            You can now use your air quality monitor around your area comparing different places to see if there are any places where the air quality needs to improve!
                        </p>
                    </div>
                    <br>
                    <div class="full-width-center">
                        <img class="img-radius" width="600px" src="../../img/comparedata.PNG" alt="script">
                        <br>
                        <small>Image Source: http://smartkidslab.nl/english</small>
                    </div>




                </div>
            </div>

            <div class="timeline-item is-primary">
                <div class="timeline-marker timeline-marker-yellow"></div>
                <div class="timeline-content box lesson-content-right" data-aos="fade-right">
                    <p class="playful-font-lesson">5. Quick Quiz!</p>
                    <br>

                    <div class="important-info-reg is-inline-block playful-font-info">
                        <p class="is-size-5">What activity do you think produces the most particles?</p>
                    </div>
                    <br>
                    <br>
                    <div class="anstoggle">
                        <button onclick="quizfeedback(); this.onclick=null;" class="button is-normal is-light is-fullwidth quiz-button-btm wr-bg"><strong>Sweeping the floor</strong></button>
                        <button onclick="quizfeedbackR(); this.onclick=null;" class="button is-normal is-light is-fullwidth quiz-button-btm ri-bg"><strong>Starting a car</strong></button>
                        <button onclick="quizfeedback(); this.onclick=null;" class="button is-normal is-light is-fullwidth quiz-button-btm wr-bg"><strong>Tearing paper</strong></button>
                        <button onclick="quizfeedback(); this.onclick=null;" class="button is-normal is-light is-fullwidth quiz-button-btm wr-bg"><strong>Burning a pizza</strong></button>
                    </div>

                    <p id="right-hidden" class='is-size-5'><br><b>Correct!</b> Starting and running a vehicle produces by far the most particulates!</p>
                    <p id="wrong-hidden" class='is-size-5'><br><b>Incorrect!</b> Starting and running a vehicle produces by far the most particulates! </p>
                </div>
            </div>

            <div id="completequiz" class="has-text-centered">
                <p class="playful-font-info">Complete the quiz to continue!</p>
            </div>

            <header class="timeline-header">
                <button id="nextstep" onclick="confetti.start();" class="giveachieve open-modal button is-rounded is-large get-started hvr-grow is-yellow" type="submit">
                    <strong>Next Step!</strong>
                </button>
            </header>
        </div>

        <div class="modal">
            <div class="modal-background"></div>
            <div class="modal-card animated tada">
                <header class="modal-card-head has-text-centered">
                    <p class="modal-card-title">Congratulations! <br><br> You have finished the SmartPi Lesson!</p>
                    <button class="delete" aria-label="close"></button>
                </header>
                <section class="modal-card-body has-text-centered">
                    <img src="../../img/achievement6.png" alt="ach6">
                    <br>
                    <br>
                    <div class="progress-bar">
                        <div class="playful-font-progress-1">100%</div>
                        <progress class="progress is-yellow" value="100" max="100"></progress>
                    </div>
                </section>

                <footer class="modal-card-foot">
            
                        <form method="POST" action="step-6.php">
                       
                        <button class="button is-rounded is-medium get-started hvr-grow is-yellow center-button button-margin" type="submit" name="updatestep">
                            <strong>Continue to Profile!</strong>
                        </button>
                      
                        </form>
                    </div>

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
                    url: 'step-6.php',
                    data: {
                        'achieve': name
                    },
                    success: function() {
                        console.log("Achievement SQL successful"); // alerts the response 
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