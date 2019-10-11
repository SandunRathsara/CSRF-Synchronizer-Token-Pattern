<?php
require 'headers.php';
require_once 'check_token.php';

$value = $_POST['token'];

if (isset($_POST['msg'])){
    if (token::checkToken($value, $_COOKIE['session_time'])){
        echo '
        <div class=outer_div>

            <h1 class=welcome align=center>Cookie Accepted!</h1>
            <p class=congrats align=center>Congratulations!</p>

        </div>
        ';
    }
    else{
        echo '<div class=outer_div>

        <h1 class=welcome align=center>Cookie Rejected!</h1>
        <p class=congrats align=center>You Cheater!</p>

        </div>';
    }
}

?>