<?php

if(isset($_POST['uname'], $_POST['pword'])){

    $uname = $_POST['uname'];
    $pword = $_POST['pword'];

    if($uname == 'admin' && $pword == 'csrf'){
        echo '<script>alert("Login Success!");</script>';
    }
    else{
        echo '<script>alert("Login Failed!");</script>';
        echo '<script>location.href="index.php";</script>';
    }
}

require 'headers.php';

?>

<script>

$(document).ready(function() {
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("token_to_add").setAttribute('value', this.responseText);
        }
    };

    xhttp.open("GET", "token_generator.php", true);
    xhttp.send();
});
</script>

    <body>
        <div class="outer_div">
            <h1 class=welcome align=center>Wellcome!</h1>
            <h2 class=welcome align=center>CSRF prevention - Synchronizer Token Pattern</h3>
            <form action="verify.php" method="post">
                <div class=inner_div>
                    <label class=welcome >Write message :</label><br><br><input type="text" class=input_text id="uname" name="theMsg"><br><br><br>
                    
                    <div id=div_hidden>
                        <input type="hidden" name="token" value="" id="token_to_add"/>
                    </div>

                    <div class=btn_holder><input type="submit" class=btn name="msg" value="Send Message"></div>
                </div>
            </form>
        </div>
    </body>

</html>