<?php



//include_once("constants.php");
include_once("dboperation.php");
include_once("user.php");
include_once("manage.php");

//For registration form processing

if (isset($_POST["username"]) and isset($_POST["email"])) {
    $user = new User();
    $result = $user->createUserAccount($_POST["username"], $_POST["emai"], $_POST["password1"], $usertype);
    echo $result;
}

//For login form processing 

if (isset($_POST["log_email"]) and isset($_POST["log_password"])) {
    $user = new User();
    $result = $user->userLogin($_POST["log_email"], $_POST["log_password"]);

    echo $result;
}

//To get category

if (isset($_POST["getCategory"])) {
    $obj = new dboperation();
    $rows = $obj->getAllRecord("categories");
    foreach ($rows as $row) {
        echo "<option value='" . $row["cid"] . "'>" . $row["category_name"] . "</option>";
    }
    exit();
}


//To get brand

if (isset($_POST["getBrand"])) {
    $obj = new dboperation();
    $rows = $obj->getAllRecord("brands");
    foreach ($rows as $row) {
        echo "<option value='" . $row["bid"] . "'>" . $row["brand_name"] . "</option>";
    }
    exit();
}

//Add category objects

if (isset($_POST["category_name"]) and isset($_POST["parent_cat"])) {
    $obj = new dboperation();
    $result = $obj->addCategory($_POST["parent_cat"], $_POST["category_name"]);
    echo $result;
    exit();
}

//Add brand

if (isset($_POST["brand_name"])) {
    $obj = new dboperation();
    $result = $obj->addBrands($_POST["brand_name"]);
    echo $result;
    exit();
}

//Add Products

if (isset($_POST["added_date"]) and isset($_POST["product_name"])) {
    $obj = new dboperation();
    $result = $obj->addproducts(
        $_POST["select_cat"],
        $_POST["select_brand"],
        $_POST["product_name"],
        $_POST["product_price"],
        $_POST["product_stock"],
        $_POST["added_date"]
    );
    echo $result;
    exit();
}


//Manage Category

if (isset($_POST["manageCategory"])) {
    $m = new Manage();
    $result = $m->manageRecordWithPagination("categories", 1);

    $rows = $result["rows"];
    $pagination = $result["pagination"];
    if (count($rows) > 0) {
        $n = 0;

        foreach ($rows as $row) {
            ?>

            <tr>
                <td><?php echo ++$n; ?></td>
                <td><?php echo $row["category"]; ?></td>
                <td><?php echo $row["parent"]; ?></td>
                <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
                <td>
                    <a href="#" did="<?php echo $row['did']; ?>" class="btn btn-danger btn-sm" del_cat>Delete</a>
                    <a href="#" eid="<?php echo $row['eid']; ?>" class="btn btn-info btn-sm" edit_cat>Edit</a>
                </td>
            </tr>
        <?php

                }

                ?>
        <tr>
            <td colspan="5"><?php echo $pagination; ?></td>
        </tr>

        <?php

                echo $pagination;
                exit();
            }
        }



        //Managing Brands

        if (isset($_POST["manageBrands"])) {
            $m = new Manage();
            $result = $m->manageRecordWithPagination("brand", 1);

            $rows = $result["rows"];
            $pagination = $result["pagination"];
            if (count($rows) > 0) {
                $n = 0;

                foreach ($rows as $row) {
                    ?>

            <tr>
                <td><?php echo ++$n; ?></td>
                <td><?php echo $row["brand_name"]; ?></td>

                <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
                <td>
                    <a href="#" did="<?php echo $row['did']; ?>" class="btn btn-danger btn-sm" del_brand>Delete</a>
                    <a href="#" eid="<?php echo $row['eid']; ?>" class="btn btn-info btn-sm" edit_brand>Edit</a>
                </td>
            </tr>
        <?php

                }

                ?>
        <tr>
            <td colspan="5"><?php echo $pagination; ?></td>
        </tr>

        <?php

                echo $pagination;
                exit();
            }
        }



        //Products process file


        if (isset($_POST["manageProducts"])) {
            $m = new Manage();
            $result = $m->manageRecordWithPagination("products", 1);

            $rows = $result["rows"];
            $pagination = $result["pagination"];
            if (count($rows) > 0) {
                $n = 0;

                foreach ($rows as $row) {
                    ?>

            <tr>
                <td><?php echo ++$n; ?></td>
                <td><?php echo $row["product_name"]; ?></td>
                <td><?php echo $row["category_name"]; ?></td>
                <td><?php echo $row["brand_name"]; ?></td>
                <td><?php echo $row["product_price"]; ?></td>
                <td><?php echo $row["product_stock"]; ?></td>
                <td><?php echo $row["added_date"]; ?></td>
                <td><?php echo $row["p_status"]; ?></td>
                <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
                <td>
                    <a href="#" did="<?php echo $row['pid']; ?>" class="btn btn-danger btn-sm" del_product>Delete</a>
                    <a href="#" eid="<?php echo $row['eid']; ?>" data-toggle="modal" data-target="#form_brand" class="btn btn-info btn-sm" edit_product>Edit</a>
                </td>
            </tr>
        <?php

                }

                ?>
        <tr>
            <td colspan="5"><?php echo $pagination; ?></td>
        </tr>

    <?php

            echo $pagination;
            exit();
        }
    }


    //Order processing 

    if (isset($_POST["getNewOrderItem"])) {
        $obj = new dboperation();
        $rows = $obj->getAllRecord("products");

        ?>
    <tr>
        <td><b id="number">1</b></td>
        <td>
            <select name="pid[]" class="form-control form-control-sm" required />

            <?php

                foreach ($rows as $row) {

                    ?>
                <option value="<?php echo $row['pid']; ?>"><?php echo $row["product_name"] ?></option>

            <?php

                }

                ?>



            </select>
        </td>
        <td><input name="tqty[]" readonly type="text" class="form-control form-control-sm"></td>
        <td><input name="qty[]" type="text" class="form-control form-control-sm" required></td>
        <td><input name="price[]" type="text" class="form-control form-control-sm" readonly></td>
        <td>Rs.<span>0</span></td>
    </tr>


<?php

    exit();
}

?>