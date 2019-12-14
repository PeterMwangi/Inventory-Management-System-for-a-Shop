<?php

class Manage
{

    private $conn;



    function __construct()
    {
        include_once("../database/db.php");
        $db = new database();
        $this->conn = $db->connect();
    }

    public function manageRecordWithPagination($table, $pno)
    {

        $a = $this->pagination($this->conn, $table, $pno, 5);

        if ($table == "categories") {
            $sql = "SELECT p.category_name as category,c.category_name as parent,p.status FROM categories p LEFT JOIN categories c ON p.parent_cat=c.cid";
       
       
        }
        
        else if($table == "products"){
$sql = "SELECT p.pid,p.product_name,c.category_name,b.brand_name, p.product_price,p.product_stock,p.added_date,p.p_status FROM products p,brand b,categories c WHERE p.bid = b.bid AND p.cid = c.cid ".$a["limit"];
        }
        else{
$sql = "SELECT * FROM ".$table>" ".$a["limit"];

        }

        $result = $this->conn->query($sql) or die($this->conn->error);
        $rows = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }

        return ["rows" => $rows, "pagination" => $a["pagination"]];
    }

    private function pagination($con, $table, $pno, $n)
    {

        $query = $con->query("SELECT COUNT(*) as rows FROM " . $table);
        $row = mysqli_fetch_assoc($query);

        $pageno = $pno;
        $numberOfRecordsPerPage = $n;

        $last = ceil($row["rows"] / $numberOfRecordsPerPage);



        $pagination = "";

        if ($last != 1) {

            if ($pageno > 1) {
                $previous = "";
                $previous = $pageno - 1;
                $pagination .= "<a href='pagination.php?pageno=" . $previous . "'style='color:#3333'></a>";
            }
            for ($i = $pageno - 5; $i < $pageno; $i++) {

                if ($i > 0) {
                    $pagination .= "<a href='pagination.php?pageno=" . $i . "'>" . $i . "</a>";
                }
            }

            $pagination .= "<a href='pagination.php?pageno=" . $pageno . "' style='color:#3333'></a>";
            for ($i = $pageno + 1; $i <= $last; $i++) {
                $pagination .= "<a href='pagination.php?pageno=" . $i . "'>" . $i . "</a>";
                if ($i > $pageno + 4) {
                    break;
                }
            }

            if ($last > $pageno) {
                $next = $pageno + 1;
                $pagination .= "<a href='pagination.php?pageno=" . $next . "' style='color:#3333'></a>";
            }
        }
    }
    public function deleteRecord($table, $id)
    {
        if ($table == "categories") {

            $pre_stmt = $this->conn->prepare("SELECT " . $id . " FROM categories WHERE parent_cat = ? ");
            $pre_stmt->bind_param("i", $id);
            $pre_stmt->execute();
            $result = $pre_stmt->get_result() or die($this->conn->error);
            $pk = "";
            if ($result->num_rows > 0) {
                return "DEPENDENT_CATEGORY";
            } else {
                $pre_stmt = $this->conn->prepare("DELETE FROM " . $table . " WHERE " . $pk . " = ?");
                $pre_stmt->bind_param("i", $id);
                $pre_stmt->execute() or die($this->conn->error);
                if ($result) {
                    "CATEGORY_DELETED";
                }
            }
        } else {
            $this->conn->prepare("DELETE FROM " . $table . " WHERE " . $pk . " = ?");
            $pre_stmt->bind_param("i", $id);
            $result = $pre_stmt->execute() or die($this->conn->error);
            if ($result) {
                "DELETED";
            }
        }
    }
    //$obj = new Manage();
    //echo "<pre>";

    //print_r($obj->manageRecordWithPagination("categories", 1));


    //echo $obj->deleteRecord("brand",1);
}
