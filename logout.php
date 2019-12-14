<?php

include_once("./databse/constants.php");
if(isset($_SESSION["userid"])){
    session_destroy();
}

header("location:".DOMAIN."/index.php");


?>