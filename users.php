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
    <div id="loading">
      <div class="spinner-container">
        <div class="triple-spinner"></div>
      </div>
    </div>
    <div class="container-scroller">
      <?php include_once("app/Views/navigation-sidebar.php"); ?>
      <div class="container-fluid page-body-wrapper">
        <?php include_once("app/Views/navigation-topbar.php"); ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">12</h3>
                          <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Monthly Logins</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">2</h3>
                          <p class="text-success ml-2 mb-0 font-weight-medium">+0%</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Accounts</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">1</h3>
                          <p class="text-danger ml-2 mb-0 font-weight-medium">+0%</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-danger">
                          <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Guest Accounts</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">1</h3>
                          <p class="text-success ml-2 mb-0 font-weight-medium">+0%</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">True Accounts</h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="row" id="createAccount" style="display:none;">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Horizontal Two column</h4>
                    <form class="form-sample" method="POST" id="new_account_form">
                      <p class="card-description"> Personal info </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">First Name</label>
                            <div class="col-sm-9">
                              <input type="text" name="fname" class="form-control" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Last Name</label>
                            <div class="col-sm-9">
                              <input type="text" name="lname" class="form-control" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-9">
                              <select name="gender" class="form-control" required>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date of Birth</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="birthday" type="date" placeholder="dd/mm/yyyy" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                              <input type="email" name="email" class="form-control" placeholder="Email here.." required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                              <input type="password" name="password" class="form-control" placeholder="Password here.." required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Access Type</label>
                            <div class="col-sm-9">
                              <select name="access_type" class="form-control" required>
                                <option value="user">User</option>
                                <option value="guest">Guest</option>
                                <option value="tester">Tester</option>
                                <option value="admin">Admin</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Access Level</label>
                            <div class="col-sm-9">
                              <select name="access_level" class="form-control" required>
                                <option value="1">Rank 1</option>
                                <option value="2">Rank 2</option>
                                <option value="3">Rank 3</option>
                                <option value="4">Rank 4</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--
                      <p class="card-description"> Address </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Address 1</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">State</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Address 2</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Postcode</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">City</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Country</label>
                            <div class="col-sm-9">
                              <select class="form-control">
                                <option>America</option>
                                <option>Italy</option>
                                <option>Russia</option>
                                <option>Britain</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      -->
                      <input type="submit" name="new_account" value="Create Account Manually" class="btn btn-primary mb-2">
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="row" id="accountlist">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div>
                        <h4 class="card-title">Account Manager</h4>
                      </div>
                      <button class="btn btn-outline-primary" onclick="document.getElementById('createAccount').style = 'block';">+ Add Account</button>
                    </div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Name </th>
                            <th> ID </th>
                            <th> birthday </th>
                            <th> Gender </th>
                            <th> Timezone </th>
                            <th> Access Type </th>
                            <th> Access Level </th>
                            <th> Verified </th>
                            <th> Restricted </th>
                            <th> Status </th>
                            <th> Last Login </th>
                            <th> Date Created </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $sql = "SELECT * FROM users_tb;";
                          $result = mysqli_query($conn, $sql);
                          if (mysqli_num_rows($result) > 0) { 
                            while($row = mysqli_fetch_array($result)) {
                          ?>
                          <tr>
                            <td>
                              <img src="https://www.m6toll.co.uk/wp-content/uploads/2021/06/personal-account-logo.png" alt="image" />
                              <span class="pl-2"><?php echo $row['first_name'].' '.$row['last_name']; ?></span>
                            </td>
                            <td> <?php echo $row['id']; ?> </td>
                            <td> <?php echo $row['birthdate']; ?> </td>
                            <td> <?php echo $row['gender']; ?> </td>
                            <td> <?php echo $row['timezone']; ?> </td>
                            <td> 
                              <div class="badge badge-outline-success"><?php echo $row['access_type']; ?></div> 
                            </td>
                            <td> Rank <?php echo $row['access_level']; ?> </td>
                            <td> <?php if($row['verified'] == 1){ echo "Yes"; }else{ echo "No"; } ?> </td>
                            <td> <?php if($row['restricted'] == 1){ echo "Yes"; }else{ echo "No"; } ?> </td>
                            <td> <?php echo "Active"; ?> </td>
                            <td> <?php echo $row['last_login']; ?> </td>
                            <td> <?php echo $row['date_created']; ?> </td>
                          </tr>
                          <?php 
                            }
                          }
                          ?>
                        </tbody>
                      </table>
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