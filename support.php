<?php
  include('app/Controllers/Users.php'); 
  include('app/Controllers/Products.php'); 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Surelle Support</title>
    <?php include_once("app/Views/page-header.php"); ?>
  </head>
  <body>
    <div class="container-scroller">
      <?php include_once("app/Views/navigation-sidebar.php"); ?>
      <div class="container-fluid page-body-wrapper">
        <?php include_once("app/Views/navigation-topbar.php"); ?>
        <?php 
        if(isset($_GET['idSup'])){
        $sql = "SELECT * FROM products_tb WHERE id = '".$_GET['idSup']."' LIMIT 1;";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) { 
        while($row = mysqli_fetch_array($result)) {
        ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> <?php echo $row['title']; ?> </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Product</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><?php echo $row['title']; ?></li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Author Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" value="<?php echo $row['author']; ?>" style="background:#2A3038;" disabled/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date Added</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" value="<?php echo $row['date_added']; ?>" style="background:#2A3038;" disabled/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Programming Language</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" value="<?php echo $row['subject']; ?>" style="background:#2A3038;" disabled/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Current Version</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" value="<?php echo $row['current_version']; ?>" style="background:#2A3038;" disabled/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tags</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" value="<?php echo $row['tags']; ?>" style="background:#2A3038;" disabled/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" value="<?php echo $row['status']; ?>" style="background:#2A3038;" disabled/>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleTextarea1">Instruction</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="30" style="background:#2A3038;" disabled><?php echo $row['instructions']; ?></textarea>
                    </div>
                    <p><code>By downloading the file, you're aggreeing to the terms and condition of the service.</code></p>
                    <button class="btn btn-primary mr-2" onclick="downloadFile()">Download</button>
                    <button class="btn btn-dark">Request Help</button>
                    <script>
                      function downloadFile() {
                        const downloadLink = document.createElement('a');
                        downloadLink.href = 'internal_storage/<?php echo $row['id']; ?>.zip';
                        downloadLink.download = '<?php echo $row['title']; ?>.zip';
                        downloadLink.click();
                      }
                    </script>
                  </div>
                </div>
              </div>

              <?php if($_SESSION['access_type'] == "admin"){ ?>
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="form-group">
                        <h3 for="exampleTextarea1">Admin Panel</h3>

                        <form method="POST">
                          <input type="hidden" name="product" value="<?php echo $row['id']; ?>">
                          <button type="submit" name="deleteProduct" class="btn btn-info">admin: Delete</button>
                        </form>

                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>

            </div>
          </div>
          <!-- content-wrapper ends --><!-- content-wrapper ends -->
          <?php include_once("app/Views/page-footer.php"); ?>
          <!-- partial -->
        </div>
        <?php } } }else if(isset($_GET['noSup'])){ ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> New Product </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Product</a></li>
                  <li class="breadcrumb-item active" aria-current="page">New Product</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <form method="POST" enctype="multipart/form-data" class="col-12 grid-margin">
                <div class="col-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Product Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="title" placeholder="Product name..." required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6" style="opacity: 0%;">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">TestField</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="test" placeholder="Product name..." disabled/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Author Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="author" placeholder="Author name..." required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date Added</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="date_added" value="<?php echo date('Y-m-d'); ?>" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Programming Language</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="subject">
                                <option value="PHP">PHP</option>
                                <option value="Javascript">Javascript</option>
                                <option value="Java">Java</option>
                                <option value="NodeJS">NodeJS</option>
                                <option value="Python">Python</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Current Version</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="current_version" placeholder="Version number..." required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tags</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="tags" placeholder="Separate by comma..." required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                            <select class="form-control" name="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleTextarea1">Instruction</label>
                        <textarea class="form-control" id="exampleTextarea1" name="instructions" rows="30" placeholder="Add detailed instructions.."></textarea>
                      </div>
                      <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="file" class="file-upload-default" required>
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      <button type="subject" name="productSubmit" class="btn btn-primary mr-2">Add Product</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- content-wrapper ends --><!-- content-wrapper ends -->
          <?php include_once("app/Views/page-footer.php"); ?>
          <!-- partial -->
        </div>
        <?php } ?>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/progressbar.js/progressbar.min.js"></script>
    <script src="vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/misc.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="js/dashboard.js"></script>
    <script src="js/file-upload.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>