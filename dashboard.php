<?php
include_once("./database/constants.php");
if(!isset($_SESSION["userid"])){
    header("location:".DOMAIN."/");
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
    <br><br>
    <div class="container">
        <?php

        if (isset($_GET["msg"]) and !empty($_GET["msg"])) {

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
        <div class="row">
            <div class="col-md-4">
                <div class="card">

                    <img src="./images/user.png" style="width:60%;" class="card-img-top mx-auto" alt="">

                    <div class="card-body">
                        <h4 class="card-title">Cloud Inventory Profile</h4>
                        <p class="card-text"><i class="fa fa-user"></i>&nbsp; Peter Mwangi</p>
                        <p class="card-text"><i class="fa fa-user"></i>&nbsp; Admin</p>
                        <p class="card-text">Last Login: xxxx-xx-xx</p>
                        <a href="#" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Edit Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="jumbotron" style="width:100%; height:100%">
                    <h1>Welcome Admin</h1>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">ORDERS</h4>
                                    <p class="card-text">You can make invoices and create new orders</p>
                                    <a href="new_order.php" class="btn btn-primary">New Orders</a>
                                </div>

                            </div>


                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">

                                    <p class="card-text">Lorem ip itaque dolor dolores laboriosam repellendus possimus deserunt distinctio ab voluptas! Ea explicabo expedita nam veniam ducimus sunt quibusdam voluptates qui?</p>
                                    <a href="#" class="btn btn-primary">DISCOVER<i class="fa fa-user"></i></a>
                                </div>

                            </div>

                        </div>


                    </div>


                </div>

            </div>



        </div>
    </div>
    <p></p>
    <p></p>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">CATEGORIES</h4>
                        <p class="card-text">You can add and manage all your categories</p>
                        <a href="#" data-toggle="modal" data-target="#form_category" class="btn btn-primary">Add</a>
                        <a href="manage_categories.php" class="btn btn-primary">Manage</a>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">BRANDS</h4>
                        <p class="card-text">You can add and manage all your brands</p>
                        <a href="#" data-toggle="modal" data-target="#form_brand" class="btn btn-primary">Add</a>
                        <a href="manage_brands.php" class="btn btn-primary">Manage</a>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">PRODUCTS</h4>
                        <p class="card-text">You can add and manage all your products</p>
                        <a href="#" data-toggle="modal" data-target="#form_products" class="btn btn-primary">Add</a>
                        <a href="manage_products.php" class="btn btn-primary">Manage</a>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <?php
    //Category Form

    include_once("./templates/category.php");

    ?>

    <?php
    //Brand Form

    include_once("./templates/brand.php");

    ?>


    <?php
    //Products Form

    include_once("./templates/products.php");

    ?>



</body>

</html>