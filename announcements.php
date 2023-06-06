<?php
  include('app/Controllers/Users.php'); 
  include('app/Controllers/Announcements.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Surelle Support</title>
    <?php include_once("app/Views/page-header.php"); ?>
    <style>
      #loading {
        display: none;
      }
      .spinner-container {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        -webkit-backdrop-filter: blur(5px);
        backdrop-filter: blur(5px);
      }
      .triple-spinner {
        width: 125px;
        height: 125px;
        border-radius: 50%;
        border: 4px solid transparent;
        border-top: 4px solid #FF5722;
        animation: spin 2s linear infinite;
        position: relative;
        z-index: 10000;
      }
      .triple-spinner::before,
      .triple-spinner::after {
        content: "";
        position: absolute;
        border-radius: 50%;
        border: 4px solid transparent;
      }
      .triple-spinner::before {
        top: 5px;
        left: 5px;
        right: 5px;
        bottom: 5px;
        border-top-color: #FF9800;
        -webkit-animation: spin 3s linear infinite;
        animation: spin 3.5s linear infinite;
      }
      .triple-spinner::after {
        top: 15px;
        left: 15px;
        right: 15px;
        bottom: 15px;
        border-top-color: #FFC107;
        -webkit-animation: spin 1.5s linear infinite;
        animation: spin 1.75s linear infinite;
      }
      @-webkit-@keyframes spin {
        -webkit-from {
          -webkit-transform: rotate(0deg);
          -ms-transform: rotate(0deg);
          transform: rotate(0deg);
        }
        -webkit-to {
          -webkit-transform: rotate(360deg);
          -ms-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }

      @-webkit-keyframes spin {
        from {
          -webkit-transform: rotate(0deg);
          transform: rotate(0deg);
        }
        to {
          -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }

      @keyframes spin {
        from {
          -webkit-transform: rotate(0deg);
          transform: rotate(0deg);
        }
        to {
          -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function() {
        $('form').submit(function(e) {
            e.preventDefault(); // Prevent the default form submission behavior

            var formData = $(this).serialize();
            var apiUrl = '.';

            // Show loading spinner
            $('#loading').css('display', 'block');

            // Make an AJAX request to the API URL
            $.ajax({
                url: apiUrl,
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Handle successful response
                    // !IMPORTANT - Add modal here
                    $('#announcement-section').load(' #announcement-section');
                    $('form input[type="text"], form input[type="hidden"], form textarea').val('');
                    // Hide loading spinner
                    $('#loading').css('display', 'none');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // !IMPORTANT - Add modal here
                    // Hide loading spinner
                    $('#loading').css('display', 'none');
                }
            });
        });
    });
    </script>
  </head>
  <body>
    <div class="container-scroller">
      <?php include_once("app/Views/navigation-sidebar.php"); ?>
      <div class="container-fluid page-body-wrapper">
        <?php include_once("app/Views/navigation-topbar.php"); ?>
        <div class="main-panel">
          <div class="content-wrapper">
            
            <?php if($_SESSION['access_type'] == 'admin'){ ?>
            <div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">P12.34</h3>
                          <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Potential growth</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">P17.34</h3>
                          <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Revenue current</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">P12.34</h3>
                          <p class="text-danger ml-2 mb-0 font-weight-medium">-2.4%</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-danger">
                          <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Daily Income</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">P31.53</h3>
                          <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Expense current</h6>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>

            <div class="row">
              <div class="col col grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title">Announcement</h4>
                      <?php
                      if($_SESSION['access_type'] == 'admin'){
                        echo '<code>You\'re viewing as an Administrator.</code>';
                      }
                      ?>
                    </div>
                    
                    <div class="preview-list">
                      <?php if($_SESSION['access_type'] == 'admin'){ ?>
                      <div class="preview-item">
                        <div class="preview-item-content d-flex flex-grow">
                          <div class="flex-grow">
                            <div class="d-flex d-md-block d-xl-flex justify-content-between">
                              <h6 class="preview-subject"><?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?></h6>
                            </div>
                            <form class="forms-sample" method="POST">
                              <div class="form-group">
                                <input class="form-control" style="margin-bottom: 5px;" type="text" name="subject" placeholder="Announcement Subject" required>
                                <textarea class="form-control" id="exampleTextarea1" name="announcement_send" placeholder="What's on your mind?" rows="4"></textarea>
                              </div>
                              <input type="submit" class="btn btn-primary mr-4 float-right" data-toggle="modal" data-target="#feedCreate" value="Post">
                            </form>
                          </div>
                        </div>
                      </div>
                      <?php } ?>
                      
                      <div id="announcement-section">
                        <?php 
                        if($_SESSION['access_type'] == 'admin'){
                          $sql = "SELECT * FROM announcements_tb ORDER BY timedate DESC LIMIT 15;";
                        }else{
                          $sql = "SELECT * FROM announcements_tb WHERE NOT JSON_CONTAINS(acknowledgeby, '\"".$_SESSION['id']."\"') ORDER BY timedate DESC LIMIT 15;";
                        }
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) <= 0) { 
                        ?>
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card corona-gradient-card">
                            <div class="card-body py-0 px-0 px-sm-5">
                                <div class="row align-items-center">
                                <div class="col-4 col-sm-3 col-xl-2">
                                    <img src="images\illustration\empty_announcement.png" class="gradient-corona-img img-fluid" alt=""> <!-- https://icons8.com/illustrations/style--3d-casual-life -->
                                </div>
                                <div class="col-5 col-sm-7 col-xl-8 p-3">
                                    <h4 class="mb-1 mb-sm-0">Congratulations!</h4>
                                    <p class="mb-0 font-weight-normal d-none d-sm-block text-justify">You don't have any announcement at this time. This means you can focus on other important tasks.
                                    Remember, not having any announcement is a cause for celebration, so enjoy the moment and make the most of your free
                                    time!</p>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>

                        <?php } else { 
                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_array($result)) {
                        ?>

                        <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                            <img src="https://cdn-icons-png.flaticon.com/512/326/326031.png" alt="image" class="rounded-circle" />
                            </div>
                            <div class="preview-item-content d-flex flex-grow">
                            <div class="flex-grow">
                                <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                <h6 class="preview-subject"><?php echo $row['subject']; ?><code style="color: gray;font-size: 11px;"><?php echo $row['id']; ?></code></h6>
                                <p class="text-muted text-small"><?php echo $row['timedate']; ?></p>
                                </div>
                                <p class="text-justify text-muted"><?php echo $row['message']; ?></p>
                                <?php if($_SESSION['access_type'] == 'admin'){ ?>
                                <form method="post">
                                  <input type="hidden" name="announcement_delete" value='<?php echo $row['id']; ?>'>
                                  <input type="submit" class="btn btn-danger mr-2 float-right" value="Delete">
                                </form>

                                <?php } ?>
                                <form method="post">
                                  <input type="hidden" name="announcement_acknowledge" value='<?php echo $row['id']; ?>'>
                                  <input type="submit" class="btn btn-primary mr-2 float-right" value="Acknowledge">
                                </form>
                            </div>
                            </div>
                        </div>
                        <?php
                            }
                          }
                        } 
                        ?>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
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
    <!-- End custom js for this page -->
  </body>
</html>