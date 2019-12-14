<?php
include_once("./database/constants.php");
if (!isset($_SESSION["userid"])) {
    header("location:" . DOMAIN . "/");
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
    <script rel="stylesheet" type="text/javascript" src="./js/order.js"></script>
</head>

<body>


    <?php

    //include the header in index.php from template header

    include_once("./templates/header.php")
    ?>
    <br><br>

    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
                    <div class="card-header">
                        <h4>New Orders</h4>
                    </div>
                    <div class="card-body">
                        <form onsubmit="return false">
                            <div class="form-group row">
                                <label class="col-sm-3" align="right">Order Date</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control-sm" value="<?php echo date("Y-d-m"); ?>">

                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3" align="right" required>Customer Name*</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control-sm" placeholder="Enter Customer Name">

                                </div>
                            </div>

                            <div class="card" style="box-shadow:0 0 15px 0 lightgrey;">
                                <div class="card-body">
                                    <h3>Make An Order</h3>

                                    <table align="center" style="width:800px;">

                                  <thead>
                                            <tr>
                                                <th>#
                                                </th>
                                                <th style="text-align:center;">Item Name
                                                </th>
                                                <th style="text-align:center;">Total Quantity
                                                </th>
                                                <th style="text-align:center;">Quantity
                                                </th>
                                                <th style="text-align:center;">Price
                                                </th>
                                                <th>Total
                                                </th>
                                            </tr>
                                            <thead>
                                            <tbody id="inovoice_item">
                                             <!--   <tr>
                                                    <td><b id="number">1</b></td>
                                                    <td>
                                                        <select name="pid[]" class="form-control form-control-sm" required/>
                                                            <option>Washing Machine</option>
                                                        </select>
                                                    </td>
                                                    <td><input name="tqty[]" readonly type="text" class="form-control form-control-sm"></td>
                                                    <td><input name="qty[]" type="text" class="form-control form-control-sm" required></td>
                                                    <td><input name="price[]" type="text" class="form-control form-control-sm" readonly></td>
                                                    <td>Rs.1540</td>
                                                </tr> --->
                                            </tbody>
                                    </table>
                                    <!--Table Ends--->
                                    <center style="padding: 10px;">
                                        <button id="add" style="width:150px;" class="btn btn-success">Add</button>
                                        <button id="remove" style="width:150px;" class="btn btn-danger">Remove</button>
                                    </center>



                                </div>
                                <!---Card body ends---->

                            </div>
                            <!----Order card ends here----->

                            <p></p>
                            <div class="form-group row">
                                <label for="sub_total" class="col-sm-3 col-form-label" align="right">Sub Total :</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control form-control-sm" name="sub_total" id="sub_total" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gst" class="col-sm-3 col-form-label" align="right">VAT (16%) :</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control" name="gst" id="gst" required/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="discount" class="col-sm-3 col-form-label" align="right">Discount :</label>
                                <div class="col-sm-6">
                                    <input type="text"  class="form-control form-control-sm" name="discount" id="discount" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="net_total" class="col-sm-3 col-form-label" align="right">Net Total :</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control form-control-sm" name="net_total" id="net_total" required/>
                                </div> 
                            </div>
                            <div class="form-group row">
                                <label for="paid" class="col-sm-3 col-form-label" align="right">Paid :</label>
                                <div class="col-sm-6">
                                    <input type="text"  class="form-control form-control-sm" name="paid" id="paid" required/>
                                </div> 
                            </div>
                            <div class="form-group row">
                                <label for="due" class="col-sm-3 col-form-label" align="right">Due :</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control form-control-sm" name="due" id="due" required/>
                                </div> 
                            </div>
                            <div class="form-group row">
                                <label for="payment_type" class="col-sm-3 col-form-label" align="right">Payment Method :</label>
                                <div class="col-sm-6">
                                    <select name="payment_type" class="form-control form-control-sm" id="payment_type" required/>
                                        <option>Cash</option>
                                        <option>Card</option>
                                        <option>Draft</option>
                                        <option>Cheque</option>
                                    </select>
                                </div> 
                            </div>
<center>
    <input type="submit" id="order_form" style="width:150px;" class="btn btn-info" value="Order">
    <input type="submit" id="print_invoice" style="width:150px;" class="btn btn-info d-none" value="Print Invoice">
</center>



                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>










</body>

</html>