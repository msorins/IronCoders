<?php
echo "Starting";
echo exec("whoami");
$resp=exec("sudo docker build -t my-gcc-app .  >> output.txt");
echo $resp;
?>