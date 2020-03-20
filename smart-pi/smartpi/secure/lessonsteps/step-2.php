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
    $stepquery = "UPDATE smartpi_user SET StepID = '3' WHERE smartpi_user.UserID = ?";
    $stepstmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stepstmt, $stepquery)) {
        echo "Statement Failed";
    } else {
        mysqli_stmt_bind_param($stepstmt, "i", $userid);
        mysqli_stmt_execute($stepstmt);
        $result = mysqli_stmt_get_result($stepstmt);
        //change to achievement page
        header("Location: step-3.php");
    }
}

if (isset($_POST["achieve"])) {
    //Update Query for achievements

    $achquery = "INSERT INTO smartpi_achieve_user (UserID, AchieveID) VALUES ($userid, 2);";
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
                <h1 class="title playful-font">Step 2: Smart Cities</h1>
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
                    <p class="playful-font-lesson">1. Why Smart Cities?</p>


                    <p class="is-size-5">More than half the world's population lives in cities, over 3.5 billion people, and this number is rising; this poses many challenges! Hover over the challenges below to see how a Smart City can help:</p>
                    <br>
                    <div class="buttons is-centered lesson-btn-section">
                        <button id="traffic" class="button is-light is-medium"><b><i class="fas fa-car fa-fw"></i>More Traffic</b></button>
                        <button id="pollution" class="button is-light is-medium"><b><i class="fas fa-smog fa-fw"></i>More Pollution</b></button>
                        <button id="energy" class="button is-light is-medium"><b><i class="fas fa-plug fa-fw"></i>More Energy Consumption</b></button>
                        <button id="water" class="button is-light is-medium"><b><i class="fas fa-shower fa-fw"></i>More Water Usage</b></button>
                        <button id="waste" class="button is-light is-medium"><b><i class="fas fa-dumpster fa-fw"></i>More Waste</b></button>
                    </div>


                    <p class="is-size-5">The city of the future is smart. A smart city is entirely interconnected; it will regulate traffic, reduce energy, fight crime and tackle pollution,
                        using tech such as <mark id="bigdata">Big Data</mark> and <mark id="iot">The Internet of Things.</mark> This huge increase in data gives us the ability to create a
                        smarter city where buildings sense and predict temperatures outside and adjust heating or air conditioning systems inside, where cars drive themselves based on traffic data
                        and where your baby’s diaper tweets you when it needs changing. A futuristic vision? No, all of these things are already possible today!</p>

                </div>
            </div>

            <div class="timeline-item is-primary">
                <div class="timeline-marker timeline-marker-yellow"></div>
                <div class="timeline-content box lesson-content-right" data-aos="fade-right">
                    <p class="playful-font-lesson">2. Smart Cities - A definition</p>
                    <br>
                    <p class="is-size-5">A Smart City can be defined as:</p>
                    <br>
                    <div class="important-info-reg playful-font-info">
                        "The use of smart technologies and data as the means to solve a cities sustainability challenges.
                        Smart technologies can be generally classified as ICT solutions. They range from expensive
                        hardware solutions such as city control centres, smart electrical grids and autonomous vehicles,
                        through to much lower cost solutions such as smartphone apps and low-cost environmental sensors such
                        as the one we will be making in this lesson."
                    </div>
                    <br>
                    <div class="lesson-img">
                        <img class="img-radius" src="https://www.jumbla.com/hubfs/ASEAN_GIF03_smallest.gif" width="600" alt="">
                    </div>
                </div>
            </div>

            <div class="timeline-item is-primary">
                <div class="timeline-marker timeline-marker-yellow"></div>
                <div class="timeline-content box lesson-content-left" data-aos="fade-left">
                    <p class="playful-font-lesson">3. What makes a City Smart, and why should citizens be involved?</p>

                    <p class="is-size-5">A city is smart if it tries to achieve the following goals effectively using technology - hover over the goals below to find out more:</p>
                    <br>
                    <div class="buttons is-centered lesson-btn-section">
                        <button id="health" class="button is-light is-medium"><b><i class="fas fa-heart fa-fw"></i>Health and Wellbeing</b></button>
                        <button id="econ" class="button is-light is-medium"><b><i class="fas fa-balance-scale fa-fw"></i>Economy and Society</b></button>
                        <button id="leader" class="button is-light is-medium"><b><i class="fas fa-landmark fa-fw"></i>Leadership Strategy</b></button>
                        <button id="infra" class="button is-light is-medium"><b><i class="fas fa-leaf fa-fw"></i>Infrastructure and Environment</b></button>
                    </div>

                    <div class="quiz-centered info-bg">
                        <div class="quiz-wrapper1">
                            <p class="question-description"><b>Match the goals to a solution!</b></p>
                            <ul class="options">
                                <li class="title is-4">Options</li>
                                <li class="option" data-target="infra">Infrastructure</li>
                                <li class="option" data-target="envir">Environment</li>
                                <li class="option" data-target="econo">Economy</li>
                                <li class="option" data-target="healt">Health & Wellbeing</li>
                            </ul>

                            <div class="answers">
                                <ol>
                                    <li><span class="target target-font" data-accept="envir">&nbsp;</span>- An air and water quality monitoring system.</li>
                                    <li><span class="target target-font" data-accept="infra">&nbsp;</span>- flood warning system.</li>
                                    <li><span class="target target-font" data-accept="healt">&nbsp;</span>- An e-Healthcare mobile app.</li>
                                    <li><span class="target target-font" data-accept="econo">&nbsp;</span>- Jobs created by the need for data and information technology experts.</li>
                                </ol>
                            </div>


                        </div>
                    </div>

                    <br>
                    <p class="is-size-5">The success of smart cities relies on citizens like you engaging with technology solutions like the one you will be creating in this lesson. Citizens must
                        also take a leading role in their design, creation and maintenance to make cities a better place to live, work and play! </p>

                </div>

            </div>


            <div class="timeline-item is-primary">
                <div class="timeline-marker timeline-marker-yellow"></div>
                <div class="timeline-content box lesson-content-right" data-aos="fade-right">
                    <p class="playful-font-lesson">4. Fill in the blanks, drag the missing answers!</p>

                    <div class="quiz-centered">
                        <div class="quiz-wrapper">
                            <p class="question-description">Before progressing to the next step, fill in the blanks!</p>
                            <ul class="options">
                                <li class="title is-4">Options</li>
                                <li class="option" data-target="half">Half</li>
                                <li class="option" data-target="big">Big Data</li>
                                <li class="option" data-target="air">Air Quality Sensor</li>
                                <li class="option" data-target="env">Environmental</li>
                                <li class="option" data-target="iot">Internet of Things</li>
                                <li class="option" data-target="threequarters">Three-Quarters</li>
                            </ul>

                            <div class="answers">
                                <ol>
                                    <li>More than<span class="target target-font" data-accept="half">&nbsp;</span>of the world's population lives in cities, with this number growing rapidly!</li>
                                    <li><span class="target target-font" data-accept="iot">&nbsp;</span> is a system of internet connected devices which talk to eachother. An example of an IoT device is an<span class="target target-font" data-accept="air">&nbsp;</span>.</li>
                                    <li>Data is central to smart cities, particularly the use of <span class="target target-font" data-accept="big">&nbsp;</span></li>
                                    <li>Smart cities use technology to solve economic, social and<span class="target target-font" data-accept="env">&nbsp;</span>issues that a growing city faces</li>
                                </ol>
                            </div>

                            <button class="button is-rounded is-large get-started hvr-grow playful-font-button profile-continue" type="submit" value="submit">Submit</button>
                            <div class="lb-bg"></div>
                            <div class="status confirm">
                                <p>Quiz Complete! You can now move to the next step!</p>
                            </div>
                            <div class="status deny">
                                <p>Some answers remain! Click to return</p>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            
            <div id="completequiz" class="has-text-centered">
                <p class="playful-font-info">Complete the quiz to continue!</p>
            </div>

            <header class="timeline-header">
                <button id="nextstep" onclick="confetti.start(10000);" class="giveachieve open-modal button is-rounded is-large get-started hvr-grow is-yellow" type="submit">
                    <strong>Next Step!</strong>
                </button>
            </header>

            <div class="modal ">
                <div class="modal-background"></div>
                <div class="modal-card animated tada">
                    <header class="modal-card-head has-text-centered">
                        <p class="modal-card-title">Achievement Earned!</p>
                        <button class="delete" aria-label="close"></button>
                    </header>
                    <section class="modal-card-body has-text-centered">
                        <img src="../../img/achievement2.png" alt="ach1">
                    </section>
                    <footer class="modal-card-foot">
                        <form method="POST" action="step-2.php">
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
                    url: 'step-2.php',
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


 
    <script src="dndquiz.js"></script>
    <script src="dndquiz-alt.js"></script>


</body>

</html>