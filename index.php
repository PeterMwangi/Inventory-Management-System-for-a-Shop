<?
include_once("./database/constants.php");
if(isset($_SESSION["userid"])){
header("location:".DOMAIN."/dashboard.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory Management System</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script rel="stylesheet" type="text/javascript" src="./js/main.js"></script>
</head>

<body>


    <?php

    //include the header in index.php from template header

    include_once("./templates/header.php")
    ?>

    <br>
    <div class="container">

        <?php

        if (isset($_GET["msg"]) AND !empty($_GET["msg"])) {

            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $_GET["msg"]; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        }
        ?>


        <div class="card mx-auto" style="width: 18rem;">
            <img src="./images/login.jpg" class="card-img-top" alt="">
            <div class="card-body">

                <form id="login_form" onsubmit="return false"  autocomplete="off">
                    <div class="form-group">
                        <label for="email">EMAIL: *</label>
                        <input type="email" class="form-control" name="log_email" id="log_email" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="elog_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="password">PASSWORD: *</label>
                        <input type="password" class="form-control" id="log_password" name="log_password" placeholder="Password">
                        <small id="plog_error" class="form-text text-muted"></small>

                    </div>

                    <button type="submit" class="btn btn-primary"><i class="fa fa-lock">&nbsp;</i>LOGIN</button>
                    <span><a href="register.php">Register</a></span>
                </form>

            </div>
            <div class="card-footer"><a href="#">Forgot password?</a></div>
        </div>
    </div>

</body>

</html>