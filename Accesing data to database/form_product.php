<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 

  $status = '';
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
      $query = "INSERT INTO products (productCode, productName, productLine, productScale, productVendor, productDescription, quantityInStock, buyPrice, MSRP)
      values ('$productCode', '$productName', '$productLine', '$productScale', '$productVendor', '$productDescription', '$quantityInStock', '$buyPrice', '$MSRP') ";
      //eksekusi query
      $result = mysqli_query(connection(),$query);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }}


?>     n
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
                <a class="nav-link " href="<?php echo "Index_Customer.php"; ?>">Data Customer</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="<?php echo "Index_Product.php"; ?>">Data Product</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="<?php echo "form_customer.php"; ?>">Tambah Data Customer</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "form_product.php"; ?>">Tambah Data Product</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          
          <?php 
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Mahasiswa berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Mahasiswa gagal disimpan</div>';
              }
           ?>

          <h2 style="margin: 30px 0 30px 0;">Add Product</h2>
          <form action="form_product.php" method="POST">
            
            <div class="form-group">
              <label>Product Code</label>
              <input type="text" class="form-control" name="productCode" placeholder="Product Code">
            </div>
            <div class="form-group">
              <label>Product Name</label>
              <input type="text" class="form-control" name="productName" placeholder="Product Name">
            </div>
            <div class="form-group">
              <label>Product line</label>
              <select class="custom-select" name="productLine" required="required">
                <option value="">Pilih Salah Satu</option>
                <option value="Classic Cars">Classic Cars</option>
                <option value="Motorcycles">Motorcycles</option>
                <option value="Planes">Planes</option>
                <option value="Trains">Trains</option>
                <option value="Ships">Ships</option>
                <option value="Trucks and Buses">Trucks and Buses</option>
                <option value="Vintage Cars">Vintage Cars</option>
              </select>
            <div class="form-group">
              <label>Product Scale</label>
              <input type="text" class="form-control" name="productScale" placeholder="Product Scale">
            </div>
            <div class="form-group">
              <label>Product Vendor</label>
              <input type="text" class="form-control" name="productVendor" placeholder="Product Vendor">
            </div>
            <div class="form-group">
              <label>Product Description</label>
              <input type="text" class="form-control" name="productDescription" placeholder="Product Description">
            </div>
            <div class="form-group">
              <label>Quantity In Stock</label>
              <input type="text" class="form-control" name="quantityInStock" placeholder="Quantity In Stock">
            </div>
            <div class="form-group">
              <label>Buy Price</label>
              <input type="text" class="form-control" name="buyPrice" placeholder="Buy Price">
            </div>
            <div class="form-group">
              <label>MSRP</label>
              <input type="text" class="form-control" name="MSRP" placeholder="MSRP">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>