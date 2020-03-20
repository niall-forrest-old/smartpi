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
    $stepquery = "UPDATE smartpi_user SET StepID = '6' WHERE smartpi_user.UserID = ?";
    $stepstmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stepstmt, $stepquery)) {
        echo "Statement Failed";
    } else {
        mysqli_stmt_bind_param($stepstmt, "i", $userid);
        mysqli_stmt_execute($stepstmt);
        $result = mysqli_stmt_get_result($stepstmt);
        //change to achievement page
        header("Location: step-6.php");
    }
}

if (isset($_POST["achieve"])) {
    //Update Query for achievements

    $achquery = "INSERT INTO smartpi_achieve_user (UserID, AchieveID) VALUES ($userid, 5);";
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
                <h1 class="title playful-font">Step 5 - Finishing the Script</h1>
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
                    <p class="playful-font-lesson">1. Remember how we measure air quality</p>

                    <p class="is-size-5"><b>So far</b> we have created the script, imported the modules we need and we have created a While loop to retrieve the sensor data. Next we have
                        to make the air quality data more readable so we can display it on Adafruit IO!
                    </p>
                    <br>
                    <p class="is-size-5">
                        Next, we need to seperate our bytes stored in <code>data = []</code> into different numbers depending on the size of the particulate.
                    </p>
                    <br>
                    <div class="example-bg">
                        <p class="is-size-5">
                            Remember - air quality is measured in a <b>Particulate Matter (PM)</b> scale, with <mark>PM10</mark>
                            being larger and less damaging for humans and <mark>PM2.5</mark> very dangerous for human health.
                        </p>
                    </div>
                    <br>
                    <div class="full-width-center">
                        <img class="img-radius" width="500px" src="../../img/pmscale.jpg" alt="pm">
                    </div>


                </div>
            </div>
            <div class="timeline-item is-primary">
                <div class="timeline-marker timeline-marker-yellow"></div>
                <div class="timeline-content box lesson-content-left" data-aos="fade-right">
                    <p class="playful-font-lesson">2. Convert the data to readable Particulate Matter sizes</p>

                    <p class="is-size-5">
                        We are interested in bytes 2 and 3 for <b>PM2.5</b> and 4 and 5 for <b>PM10</b>.
                        We convert these bytes into an <mark id="int">Integer</mark> data type, and then push the data to Adafruit IO with the following (slightly confusing) lines of code!
                    </p>
                    <br>
                    <p class="is-size-5"><code>pmtwofive = int.<b>from_bytes</b>(b''.<b>join</b>(data[2:4], byteorder='little') / <b>10</b></code></p>
                    <p class="is-size-5"><code>aio.<b>send</b>('yourlocationtwofive', pmtwofive)</code></p>
                    <br>
                    <p class="is-size-5">And for PM10, the following code:</p>
                    <br>
                    <p class="is-size-5"><code>pmten = int.<b>from_bytes</b>(b''.<b>join</b>(data[4:6], byteorder='little') / <b>10</b></code></p>
                    <p class="is-size-5"><code>aio.<b>send</b>('yourlocationten', pmten)</code></p>
                    <br>
                    <p class="is-size-5">'yourlocationtwofive' and 'yourlocationten' corresponds to two feeds in Adafruit IO.
                        To create a feed, click on <mark>Feeds > Actions > Create New Feed</mark>. Name the feed the same as it is in the Python Script! </p>
                    <br>
                    <div class="full-width-center">
                        <img class="img-radius" width="300px" src="../../img/feeds.PNG" alt="feeds">
                    </div>




                </div>
            </div>

            <div class="timeline-item is-primary">
                <div class="timeline-marker timeline-marker-yellow"></div>
                <div class="timeline-content box lesson-content-left" data-aos="fade-left">
                    <p class="playful-font-lesson">3. What does this code do?</p>

                    <p class="is-size-5">The <code>from_bytes</code> command takes the <mark id="string">String</mark> of byte data and converts it into an <b>Integer</b>, so that Adafruit IO can read and display the data properly.</p>
                    <br>
                    <p class="is-size-5">But first we need to convert the data from a <b>list</b> to a <b>string of bytes</b>. The command <code>b''</code> is used to create an <b>empty</b>
                        string of bytes, where we use the <mark id="join">Join</mark> method to combine the list and put it into the empty string!</p>
                    <br>

                    <div class="important-info-reg">
                        <p class="playful-font-info">Example:</p>
                        <br>

                        <div class="columns">
                            <div class="column example-bg full-width-center">
                                <p class="playful-font-info is-size-5">Before the Join method:</p>
                                <p class="is-size-4"><code>data = ["10","20"]</code></p>
                            </div>
                            <div class="column example-bg full-width-center">
                                <p class="playful-font-info is-size-5">After the Join method: </p>
                                <p class="is-size-4"><code>string = ["1020"]</code></p>

                            </div>

                        </div>


                    </div>
                </div>

            </div>

            <div class="timeline-item is-primary">
                <div class="timeline-marker timeline-marker-yellow"></div>
                <div class="timeline-content box lesson-content-left" data-aos="fade-right">
                    <p class="playful-font-lesson">What does this code do? (2)</p>

                    <p class="is-size-5">
                        The <code>byte_order</code> <mark id="flag">flag</mark> is used to decide which way around the command should read the string, in this case, the byte with the smallest value <b>(little)</b> is at the beginning.</p>
                    <br>
                    <p class="is-size-5"> We divide the result by ten, because the SDS011 returns data in units of <b>tens of grams per metre cubed</b> and we want the result to display in that format.
                    </p>
                    <br>
                    <p class="is-size-5">Finally, <code>aio.send</code> is a command that is used to push the data to the Adafruit IO cloud server!
                    </p>




                </div>
            </div>

            <div class="timeline-item is-primary">
                <div class="timeline-marker timeline-marker-yellow"></div>
                <div class="timeline-content box lesson-content-left" data-aos="fade-right">
                    <p class="playful-font-lesson">4. The final line!</p>

                    <p class="is-size-5">
                        To improve the longevity and accuracy of the SDS011 sensor, it is important to ensure it isn't <b>always</b> running. The final line of code at the end of the While loop is as follows:
                        <code>time.<b>sleep</b>(10)</code>
                    </p>
                    <br>
                    <p class="is-size-5">
                        When completed, your air quality Python script should look like this:
                    </p>
                    <br>
                    <div class="full-width-center">
                        <img class="img-radius" width="500px" src="../../img/code-3.PNG" alt="script">
                    </div>




                </div>
            </div>

            <div class="timeline-item is-primary">
                <div class="timeline-marker timeline-marker-yellow"></div>
                <div class="timeline-content box lesson-content-right" data-aos="fade-right">
                    <p class="playful-font-lesson">5. Quick Quiz!</p>
                    <br>

                    <div class="important-info-reg is-inline-block playful-font-info">
                        <p class="is-size-5">What command is used to combine strings together?</p>
                    </div>
                    <br>
                    <br>
                    <div class="anstoggle">
                        <button onclick="quizfeedback(); this.onclick=null;" class="button is-normal is-light is-fullwidth quiz-button-btm wr-bg"><strong>from_bytes()</strong></button>
                        <button onclick="quizfeedback(); this.onclick=null;" class="button is-normal is-light is-fullwidth quiz-button-btm wr-bg"><strong>byte_order()</strong></button>
                        <button onclick="quizfeedbackR(); this.onclick=null;" class="button is-normal is-light is-fullwidth quiz-button-btm ri-bg"><strong>join()</strong></button>
                        <button onclick="quizfeedback(); this.onclick=null;" class="button is-normal is-light is-fullwidth quiz-button-btm wr-bg"><strong>send()</strong></button>
                    </div>

                    <p id="right-hidden" class='is-size-5'><br><b>Correct!</b> The join() method takes all strings and joins them into one string.</p>
                    <p id="wrong-hidden" class='is-size-5'><br><b>Incorrect!</b> The join() method takes all strings and joins them into one string. </p>
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
        </div>

        <div class="modal ">
            <div class="modal-background"></div>
            <div class="modal-card animated tada">
                <header class="modal-card-head has-text-centered">
                    <p class="modal-card-title">Achievement Earned!</p>
                    <button class="delete" aria-label="close"></button>
                </header>
                <section class="modal-card-body has-text-centered">
                    <img src="../../img/achievement5.png" alt="ach5">
                </section>
                <footer class="modal-card-foot">
                    <form method="POST" action="step-5.php">
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
                    url: 'step-5.php',
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