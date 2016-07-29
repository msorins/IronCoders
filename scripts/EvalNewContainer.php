<?php
    require "user_name.php";
    if($_SESSION["username"] == "sorynsoo" && $_SESSION["user_rang"] ==3 ) {
        echo "Restarting Docker";
        echo exec("sudo docker stop eval");
        //sleep(5);
        //echo exec("sudo docker rm $(docker ps -a -q) 2>&1");
        //sleep(5);
        //echo exec("sudo docker run -d --name=\"eval\" ironcoders-eval tail -f /dev/null 2>&1");
        echo "Done";
    }

?>
