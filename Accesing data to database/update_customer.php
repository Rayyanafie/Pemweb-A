<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['customerNumber'])) {
          //query SQL
          $nrp_upd = $_GET['customerNumber'];
          $query = "SELECT * FROM classicmodels.customers WHERE customerNumber = '$nrp_upd'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerNumber = $_POST['customerNumber'];
    $customerName = $_POST['customerName'];
    $contactLastName = $_POST['contactLastName'];
    $contactFirstName = $_POST['contactFirstName'];
    $phone = $_POST['phone'];
    $addressLine1 = $_POST['addressLine1'];
    $addressLine2 = $_POST['addressLine2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postalCode = $_POST['postalCode'];
    $country = $_POST['country'];
    $salesRepEmployeeNumber = $_POST['salesRepEmployeeNumber'];
    $creditLimit = $_POST['creditLimit'];
      //query Update SQL
      $sql = "UPDATE customers set customerName='$customerName', contactLastName='$contactLastName',contactFirstName='$contactFirstName', phone='$phone',addressLine1='$addressLine1', addressLine2='$addressLine2',
      city='$city', state='$state',postalCode='$postalCode', country='$country',salesRepEmployeeNumber='$salesRepEmployeeNumber', creditLimit='$creditLimit' where customerNumber='$customerNumber'";

      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: Index_Customer.php?status='.$status);
  }


?>


<!DOCTYPE html>
<html>
  <head>
    <title>Example</title>
    <!-- load css boostrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Pemrograman Web</a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:100px;">
            <li class="nav-item">
                <a class="nav-link " href="<?php echo "index_Customer.php"; ?>">Data Customer</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "update_customer.php"; ?>">Update Data</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">


          <h2 style="margin: 30px 0 30px 0;">Update Data Customer</h2>
          <form action="update_customer.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>
              <div class="form-group">
              <label>Customer Number</label>
              <input type="text" class="form-control" placeholder="Customer Number" name="customerNumber" required="required"value="<?php echo $data['customerNumber'];  ?>" required="required" readonly>
            </div>
            <div class="form-group">
              <label>Customer Name</label>
              <input type="text" class="form-control" placeholder="Customer Name" name="customerName" required="required"value="<?php echo $data['customerName'];  ?>">
            </div>
            <div class="form-group">
              <label>Contact Last Name</label>
              <input type="text" class="form-control" placeholder="Contact Last Name" name="contactLastName" required="required"value="<?php echo $data['contactLastName'];  ?>">
            </div>
            <div class="form-group">
              <label>Contact First Name</label>
              <input type="text" class="form-control" placeholder="Contact First Name" name="contactFirstName" required="required"value="<?php echo $data['contactFirstName'];  ?>">
            </div>
            <div class="form-group">
              <label>Phone</label>
              <input type="text" class="form-control" placeholder="Phone" name="phone" required="required"value="<?php echo $data['phone'];  ?>">
            </div>
            <div class="form-group">
              <label>Address Line 1</label>
              <input type="text" class="form-control" placeholder="Address Line 1" name="addressLine1" required="required"value="<?php echo $data['addressLine1'];  ?>">
            </div>
            <div class="form-group">
              <label>Address Line 2</label>
              <input type="text" class="form-control" placeholder="Address Line 2" name="addressLine2" required="required"value="<?php echo $data['addressLine2'];  ?>">
            </div>
            <div class="form-group">
              <label>City</label>
              <input type="text" class="form-control" placeholder="City" name="city" required="required"value="<?php echo $data['city'];  ?>">
            </div>
            <div class="form-group">
              <label>State</label>
              <input type="text" class="form-control" placeholder="State" name="state" required="required"value="<?php echo $data['state'];  ?>">
            </div>
            <div class="form-group">
              <label>Postal Code</label>
              <input type="text" class="form-control" placeholder="Postal Code" name="postalCode" required="required"value="<?php echo $data['postalCode'];  ?>">
            </div>
            <div class="form-group">
              <label>Country</label>
              <input type="text" class="form-control" placeholder="Country" name="country" required="required"value="<?php echo $data['country'];  ?>">
            </div>
            <div class="form-group">
              <label>Sales Rep Employee Number</label>
              <input type="text" class="form-control" placeholder="Sales Rep Employee Number" name="salesRepEmployeeNumber" required="required"value="<?php echo $data['salesRepEmployeeNumber'];  ?>">
            </div>
            <div class="form-group">
              <label>Credit Limit</label>
              <input type="text" class="form-control" placeholder="Credit Limit" name="creditLimit" required="required"value="<?php echo $data['creditLimit'];  ?>">
            </div>
            <?php endwhile; ?>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>