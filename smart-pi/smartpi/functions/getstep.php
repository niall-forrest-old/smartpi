<?php

if (isset($_SESSION["smartpi_user"])) {
    $userid = $_SESSION["userid"];
}

//SQL query to get user's current step
$stepsql = "SELECT smartpi_user.StepID FROM smartpi_user WHERE UserID = ?;";

//Prepared Statement 
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $stepsql)) {
    echo "Statement failed";
} else {
    //Bind params
    mysqli_stmt_bind_param($stmt, "i", $userid);
    //Run params
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    //Get Step id and put it in variable
    while ($row = mysqli_fetch_assoc($result)) {
        $userstep = $row["StepID"];
    }
}

?>