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
    $stepquery = "UPDATE smartpi_user SET StepID = '5' WHERE smartpi_user.UserID = ?";
    $stepstmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stepstmt, $stepquery)) {
        echo "Statement Failed";
    } else {
        mysqli_stmt_bind_param($stepstmt, "i", $userid);
        mysqli_stmt_execute($stepstmt);
        $result = mysqli_stmt_get_result($stepstmt);
        //change to achievement page
        header("Location: step-5.php");
    }
}

if (isset($_POST["achieve"])) {
    //Update Query for achievements

    $achquery = "INSERT INTO smartpi_achieve_user (UserID, AchieveID) VALUES ($userid, 4);";
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
                <h1 class="title playful-font">Step 4: Coding your air quality sensor!</h1>
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
                    <p class="playful-font-lesson">1. Creating the Python Script</p>

                    <p class="is-size-5">We will be creating a <mark id="script">Python script</mark> to read our air quality data and then push this data to Adafruit IO using the account that
                        you set up in the previous step.
                    </p>
                    <br>
                    <p class="is-size-5">Open the <mark id="ide">Thonny Python IDE</mark> (this should come pre-installed with Raspbian). <b>Click File > Save</b> and name the script <code>airquality.py</code>
                    </p>
                    <br>
                    <div class="full-width-center">
                        <img class="img-radius" width="500px" src="../../img/thonny-ide.png" alt="thonny">
                    </div>


                </div>
            </div>

            <div class="timeline-item is-primary">
                <div class="timeline-marker timeline-marker-yellow"></div>
                <div class="timeline-content box lesson-content-right" data-aos="fade-right">
                    <p class="playful-font-lesson">2. The first lines of code!</p>

                    <p class="is-size-5">At the top of your script, type the code: <code><b>import</b> serial, time</code> then on the next line type <code> <b>from</b> Adafruit_IO <b>import</b> Client</code></p>
                    <br>
                    <p class="is-size-5">Importing <mark id="serial">Serial</mark> allows us to access data from the Raspberry Pi serial port. The rest of the code ensures that we can connect
                        to our Adafruit IO repository. Importing means we can use code thats in another file without retyping it! </p>
                </div>
            </div>

            <div class="timeline-item is-primary">
                <div class="timeline-marker timeline-marker-yellow"></div>
                <div class="timeline-content box lesson-content-left" data-aos="fade-left">
                    <p class="playful-font-lesson">3. Linking to Adafruit IO</p>

                    <p class="is-size-5">The next lines of code are very important! We are going to use our Adafruit IO username and key in our code so that we can send and
                        recieve data from the cloud! </p>
                    <br>
                    <p class="is-size-5">Type the following code: <br><code>aio = Client('Your adafruit username', 'your adafruit key')</code></p>
                    <br>
                    <p class="is-size-5">When this line of code runs, we connect to the Adafruit IO cloud servers which enables us to view our data in <mark id="realtime">real time!</mark></p>
                </div>
            </div>

            <div class="timeline-item is-primary">
                <div class="timeline-marker timeline-marker-yellow"></div>
                <div class="timeline-content box lesson-content-right" data-aos="fade-right">
                    <p class="playful-font-lesson">4. Opening and using the Raspberry Pi serial port</p>

                    <p class="is-size-5">Next, type this code, which enables us to recieve data from the serial port and cable which we have connected to the sensor!</p>
                    <br>
                    <p class="is-size-5"><code>ser = serial.<b>Serial</b>('/dev/ttyUSB0')</code></p>
                    <br>
                    <p class="is-size-5">In order for this code to run properly, you need to make sure that your sensor is connected to the USB port labelled <b>USB0!</b></p>
                    <br>
                    <p class="is-size-5"><b>So far</b> your code should look like this!</p>
                    <br>
                    <div class="full-width-center">
                        <img class="img-radius" width="500px" src="../../img/code-1.PNG" alt="first">
                    </div>
                </div>
            </div>

            <div class="timeline-item is-primary">
                <div class="timeline-marker timeline-marker-yellow"></div>
                <div class="timeline-content box lesson-content-left" data-aos="fade-left">
                    <p class="playful-font-lesson">5. Retrieving the sensor data</p>

                    <p class="is-size-5">Next, we will be using a <mark id="while">While Loop</mark> to retrieve the air quality data as long as long as the script is running. Type the following code: </p>

                    <p class="is-size-5"><br><code><b>while True:</b></code>
                        <br>&nbsp;&nbsp;<code>data = []</code>
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<code><b>For</b> index <b>in</b> range(0,10):</code>
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<code>airdata = ser.<b>read</b>()</code>
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<code>data.<b>append</b>(airdata)</code></p>


                    <br>
                    <p class="is-size-5">This while loop does a few important things. Firstly, it reads <mark id="bytes">ten bytes</mark> of data over the serial port – exactly ten
                        because that’s the format that the SDS011 sends data in – and puts these data points together inside an <mark id="array">array</mark> to form a
                        list of bytes that forms the air quality data.</p>
                    <br>
                    <p class="is-size-5">At this stage, your code should look like this!</p>
                    <br>
                    <div class="full-width-center">
                        <img class="img-radius" width="500px" src="../../img/code-2.PNG" alt="first">
                    </div>

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
                                <li class="option" data-target="while">While</li>
                                <li class="option" data-target="bytes">Bytes</li>
                                <li class="option" data-target="true">True</li>
                                <li class="option" data-target="ser">Serial</li>
                                <li class="option" data-target="arr">Array</li>
                                <li class="option" data-target="script">Python Script</li>
                            </ul>

                            <div class="answers">
                                <ol>
                                    <li>A collection of Python commands in a single file is called a <span class="target target-font" data-accept="script">&nbsp;</span>and will contain all the code we need to retrieve air quality data</li>
                                    <li>The air quality data will be read 10<span class="target target-font" data-accept="bytes">&nbsp;</span>at a time</span>.</li>
                                    <li>A<span class="target target-font" data-accept="while">&nbsp;</span>loop is used to run statements as long as the statement is <span class="target target-font" data-accept="true">&nbsp;</span></span></li>
                                    <li>A data type called an<span class="target target-font" data-accept="arr">&nbsp;</span>is used to store the serial data in a list</li>
                                </ol>
                            </div>
                            <br>
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
        </div>

        <div class="modal ">
            <div class="modal-background"></div>
            <div class="modal-card animated tada">
                <header class="modal-card-head has-text-centered">
                    <p class="modal-card-title">Achievement Earned!</p>
                    <button class="delete" aria-label="close"></button>
                </header>
                <section class="modal-card-body has-text-centered">
                    <img src="../../img/achievement4.png" alt="ach4">
                </section>
                <footer class="modal-card-foot">
                    <form method="POST" action="step-4.php">
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
                    url: 'step-4.php',
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

    <script src="dndquiz.js"></script>
    <script src="dndquiz-alt.js"></script>
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