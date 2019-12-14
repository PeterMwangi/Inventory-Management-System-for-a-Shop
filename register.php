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

        <div class="card mx-auto" style="width: 30rem;">
            <div class="card-header">REGISTER:</div>
            <div class="card-body">

                <form id="register_form" onsubmit="return false" autocomplete="off">
                    <div class="form-group">
                        <label for="username">FULL NAME:*</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username">
                        <small id="u_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="email">EMAIL ADDRESS:*</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
                        <small id="e_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="password1">PASSWORD:*</label>
                        <input type="password" name="password1" class="form-control" id="password1" placeholder="Password">
                        <small id="p1_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="password2">CONRIRM PASSWORD:*</label>
                        <input type="password" name="password2" class="form-control" id="password2" placeholder="Confirm Password">
                        <small id="p2_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="usertype">USERTYPE</label>
                        <select name="usertype" class="form-control" id="usertype">
                            <option value="">Choose User Type</option>
                            <option value="1">Admin</option>
                            <option value="0">Other user</option>

                        </select>
                        <small id="t_error" class="form-text text-muted"></small>
                    </div>

                    <button type="submit" name="user_register" class="btn btn-primary"><i class="fa fa-user">&nbsp;</i>&nbsp;SIGN UP</button>
                    <span><a href="index.php">Login</a></span>
                </form>

            </div>
            <div class="card-footer"><i>By signing up with us you agree to our<a href="#"> Privacy, Terms & Conditions</a></div>
        </div>



    </div>

</body>

</html>