<?php
session_start();
define("BASE_URL", "http://localhost/Back-End/estrada2/admin/");

function url($var = null)
{
    return BASE_URL . $var;
}


function getSuccessMessage($condition, $message)
{
    if ($condition) {
        $_SESSION['success_message'] = "$message successfully";
    }
}

function getFailedMessage($condition, $message)
{
    if ($condition) {
        $_SESSION['failed_message'] = "$message";
    }
}

function redirect($var)
{
    echo "<script>
    window.location.replace('http://localhost/Back-End/estrada2/admin/app/$var')
</script>";
}

function redirectGeneral($var)
{
    echo "<script>
    window.location.replace('http://localhost/Back-End/estrada2/admin/$var')
</script>";
}

if (isset($_POST['ClearSession'])) {
    if (isset($_SESSION['success_message'])) {
        unset($_SESSION['success_message']);
    }
    if (isset($_SESSION['failed_message'])) {
        unset($_SESSION['failed_message']);
    }
}


function auth()
{
    if (!$_SESSION['admin']) {
        redirectGeneral("pages-login.php");
    }
}


function FilterValidation($input)
{
    $input = trim($input);
    $input = strip_tags($input);
    $input = htmlspecialchars($input);
    $input = stripslashes($input);
    return $input;
}

function StringValidation($input , $minlength=2 , $maxlength=20){
    $empty=empty($input);
    $MinimumLength=strlen($input) < $minlength;
    $MaximumLength=strlen($input) > $maxlength;
    if($empty || $MinimumLength==true || $MaximumLength==true){
        return true;
    }
    else {
        return false;
    }
}

function NumberValidation(){
    
}