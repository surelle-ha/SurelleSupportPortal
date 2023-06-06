<?php
  include('app/Controllers/Users.php'); 
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
        <div class="main-panel">
          <div class="content-wrapper">
          </div>
          <!-- content-wrapper ends -->
          <?php include_once("app/Views/page-footer.php"); ?>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- Plugin js for this page -->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/progressbar.js/progressbar.min.js"></script>
    <script src="vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>