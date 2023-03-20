<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['productCode'])) {
          //query SQL
          $nrp_upd = $_GET['productCode'];
          $query = "SELECT * FROM products WHERE productCode = '$nrp_upd'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productCode = $_POST['productCode'];
    $productName = $_POST['productName'];
    $productLine = $_POST['productLine'];
    $productScale = $_POST['productScale'];
    $productVendor = $_POST['productVendor'];
    $productDescription = $_POST['productDescription'];
    $quantityInStock = $_POST['quantityInStock'];
    $buyPrice = $_POST['buyPrice'];
    $MSRP = $_POST['MSRP'];
      //query SQL
      $sql = "UPDATE products set productName='$productName', productLine='$productLine',productScale='$productScale', productVendor='$productVendor',productDescription='$productDescription', quantityInStock='$quantityInStock',
      buyPrice='$buyPrice',MSRP='$MSRP' where productCode='$productCode'";

      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: Index_Product.php?status='.$status);
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
                <a class="nav-link " href="<?php echo "index_Product.php"; ?>">Data Product</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "update_Product.php"; ?>">Update Data</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">


          <h2 style="margin: 30px 0 30px 0;">Update Data Product</h2>
          <form action="update.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>
              <div class="form-group">
              <label>Product Code</label>
              <input type="text" class="form-control" name="productCode" placeholder="Product Code"value="<?php echo $data['productCode'];  ?>" readonly>
            </div>
            <div class="form-group">
              <label>Product Name</label>
              <input type="text" class="form-control" name="productName" placeholder="Product Name"value="<?php echo $data['productName'];  ?>">
            </div>
            <div class="form-group">
              <label>Product line</label>
              <input type="text" class="form-control" name="productLine" placeholder="Product Line"value="<?php echo $data['productLine'];  ?>">
            </div>
            <div class="form-group">
              <label>Product Scale</label>
              <input type="text" class="form-control" name="productScale" placeholder="Product Scale"value="<?php echo $data['productScale'];  ?>">
            </div>
            <div class="form-group">
              <label>Product Vendor</label>
              <input type="text" class="form-control" name="productVendor" placeholder="Product Vendor"value="<?php echo $data['productVendor'];  ?>">
            </div>
            <div class="form-group">
              <label>Product Description</label>
              <input type="text" class="form-control" name="productDescription" placeholder="Product Description"value="<?php echo $data['productDescription'];  ?>">
            </div>
            <div class="form-group">
              <label>Quantity In Stock</label>
              <input type="text" class="form-control" name="quantityInStock" placeholder="Quantity In Stock"value="<?php echo $data['quantityInStock'];  ?>">
            </div>
            <div class="form-group">
              <label>Buy Price</label>
              <input type="text" class="form-control" name="buyPrice" placeholder="Buy Price"value="<?php echo $data['buyPrice'];  ?>">
            </div>
            <div class="form-group">
              <label>MSRP</label>
              <input type="text" class="form-control" name="MSRP" placeholder="MSRP"value="<?php echo $data['MSRP'];  ?>">
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