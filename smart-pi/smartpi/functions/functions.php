<?php

/*Default Navbar*/ 

function navbarChange() {
    if (isset($_SESSION["smartpi_user"])) {
        navbarLoggedin();
    } else {
        navbar();
    }
}

function navbar(){
    echo '<nav class="navbar is-transparent is-dark" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="index.php">
            <img src="../img/smartpi-logo.png" width="112" height="28">
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
            data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-end">
            <a href="index.php" class="navbar-item underline">
                <strong>Home</strong>
            </a>

            <a href="index.php#middle" class="navbar-item underline">
                Smart Cities
            </a>

            <a href="get-started.php" class="navbar-item underline">
                Get Started
            </a>


            <div class="navbar-item">
                <div class="buttons">
                    <a href="signup.php" class="button is-primary is-rounded">
                        <strong>Sign up</strong>
                    </a>
                    <a href="login.php" class="button is-light is-rounded is-outlined">
                        Log in
                    </a>
                </div>
            </div>
        </div>
</nav>';
}


function navbarLoggedin(){

    echo '<nav class="navbar is-transparent is-dark" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="index.php">
            <img src="../img/smartpi-logo.png" width="112" height="28">
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
            data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu" id="navMenu">
        <div class="navbar-end">
            <a href="index.php" class="navbar-item underline">
                <strong>Home</strong>
            </a>

            <a href="index.php#middle" class="navbar-item underline">
                Smart Cities
            </a>

            <a href="get-started.php" class="navbar-item underline">
                Get Started
            </a>


            <div class="navbar-item">
                <div class="buttons">
                    <a href="secure/profile.php" class="button is-primary is-rounded">
                         <i class="fas fa-user i-space"></i> My Profile
                     </a>
                    <a href="logout.php" class="button is-light is-rounded is-outlined">
                        Log Out
                    </a>
                </div>
            </div>
        </div>
</nav>';
}

