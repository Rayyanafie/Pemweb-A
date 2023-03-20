<?php 

  include ('conn.php'); 

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['customerNumber'])) {
        //query SQL
        $upd = $_GET['customerNumber'];
        $query = "DELETE from classicmodels.customers where customerNumber = '$upd'"; 

        //eksekusi query
        $result = mysqli_query(connection(),$query);

        if ($result) {
          $status = 'ok';
        }
        else{
          $status = 'err';
        }

        //redirect ke halaman lain
        header('Location: Index_Customer.php?status='.$status);
    }  
  }