<?php

if (isset($_SESSION["smartpi_user"])) {
    $userid = $_SESSION["userid"];
    $fullname = $_SESSION["fullname"];
}

//SQL Qquery to get the logged in user's lesson progression
$progsql = "SELECT smartpi_user.StepID, smartpi_steps.StepNumber, smartpi_steps.StepTitle, smartpi_steps.StepDesc, smartpi_steps.Progression FROM smartpi_user #
INNER JOIN smartpi_steps ON smartpi_user.StepID = smartpi_steps.StepID WHERE smartpi_user.UserID = ?;";

//Prepared Statement 
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $progsql)) {
    echo "Statement failed";
} else {
    //Bind params
    mysqli_stmt_bind_param($stmt, "i", $userid);
    //Run params
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    //Get user progress row and store in variable
    while ($row = mysqli_fetch_assoc($result)) {
        $stepnum = $row["StepNumber"];
        $steptitle = $row["StepTitle"];
        $stepdesc = $row["StepDesc"];
        $userprogress = $row["Progression"];
    }
}

?>
