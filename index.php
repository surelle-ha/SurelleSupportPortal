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
            <?php if($_SESSION['access_type'] == 'admin'){ ?>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                  <div class="card-body py-0 px-0 px-sm-3">
                    <div class="row align-items-center">
                      <div class="col-4 col-sm-3 col-xl-2">
                        <img src="images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                      </div>
                      <div class="col-5 col-sm-7 col-xl-8 p-0">
                        <h4 class="mb-1 mb-sm-0">Welcome <?php echo "Harold Eustaquio"; ?>,</h4>
                        <p class="mb-0 font-weight-normal d-none d-sm-block">You're logged in as <?php if(true){ echo $_SESSION['access_type']." user with rank ".$_SESSION['access_level'].' access'; }else{ echo "Developer"; } ?>. Enjoy unlimited access to our free services and content..</p>
                      </div>
                      <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                        <span>
                          <a href="/admin" target="_blank" class="btn btn-outline-light btn-rounded get-started-btn">Open Developer Settings</a>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php }else if($_SESSION['access_type'] == 'guest'){ ?>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                  <div class="card-body py-0 px-0 px-sm-3">
                    <div class="row align-items-center">
                      <div class="col-4 col-sm-3 col-xl-2">
                        <img src="images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                      </div>
                      <div class="col-5 col-sm-7 col-xl-8 p-0">
                        <h4 class="mb-1 mb-sm-0">Welcome <?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?>,</h4>
                        <p class="mb-0 font-weight-normal d-none d-sm-block">You're logged in as <?php if(true){ echo $_SESSION['access_type']." user with rank ".$_SESSION['access_level'].' access'; }else{ echo "Developer"; } ?>. Enjoy limited access to my free services and content.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php }else{ ?>
              <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                  <div class="card-body py-0 px-0 px-sm-3">
                    <div class="row align-items-center">
                      <div class="col-4 col-sm-3 col-xl-2">
                        <img src="images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                      </div>
                      <div class="col-5 col-sm-7 col-xl-8 p-0">
                        <h4 class="mb-1 mb-sm-0">Welcome <?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?>,</h4>
                        <p class="mb-0 font-weight-normal d-none d-sm-block">You're logged in as <?php if(true){ echo $_SESSION['access_type']." with rank ".$_SESSION['access_level'].' access'; }else{ echo "Developer"; } ?>. Are you interested in managing our content? We have an exciting opportunity available! If you're up for the task, please apply now. We can't wait to hear from you!</p>
                      </div>
                      <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                        <span>
                          <a href="/admin" target="_blank" class="btn btn-outline-light btn-rounded get-started-btn">Open Developer Settings</a>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>

            <style>
              .news-container {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
              }

              .card {
                flex-basis: calc(33.33% - 20px);
                margin-bottom: 20px;
              }

              .card-img-top {
                height: 200px; /* Adjust the height as needed */
                object-fit: cover; /* Maintain aspect ratio and cover the container */
              }

              @media (max-width: 768px) {
                .card {
                  flex-basis: 100%;
                }
              }
            </style>

            <div class="row">
              <div class="col-md-12">
                <h3>News and Update</h3>
                <div class="news-container d-flex justify-content-between"></div>
                <script>
                  $(document).ready(function() {
                    var url = 'https://api.newscatcherapi.com/v2/search?q=<?php echo urlencode($newsKeyword); ?>&lang=en&sort_by=relevancy&page=1';
                    
                    $('#loading').css('display', 'block');
                    $.ajax({
                      url: url,
                      method: 'GET',
                      dataType: 'json',
                      headers: {
                        'x-api-key': '<?php echo $newsApiKey; ?>'
                      },
                      success: function(response) {
                        var articles = response.articles;
                        var newsContainer = $('.news-container');
                        var randomArticles = getRandomElements(articles, 3);

                        randomArticles.forEach(function(article) {
                          var card = $('<div>').addClass('card mb-3');
                          var image = $('<img>').attr('src', article.media).addClass('card-img-top').attr('alt', 'News Image');
                          var cardBody = $('<div>').addClass('card-body');
                          var title = $('<h5>').addClass('card-title').text(article.title);
                          var description = $('<p>').addClass('card-text').text(article.summary);
                          var readMoreLink = $('<a>').attr('href', article.link).addClass('btn btn-primary').text('Read More');

                          cardBody.append(title, description, readMoreLink);
                          card.append(image, cardBody);
                          newsContainer.append(card);
                          $('#loading').css('display', 'none');
                        });
                      },
                      error: function(jqXHR, textStatus, errorThrown) {
                        $('.news-container').text('Unable to fetch news data. Error' + errorThrown);
                        $('#loading').css('display', 'none');
                      }
                    });
                  });

                  function getRandomElements(array, numElements) {
                    var shuffled = array.slice(0);
                    var i = array.length;
                    var min = i - numElements;
                    var temp, index;

                    while (i-- > min) {
                      index = Math.floor((i + 1) * Math.random());
                      temp = shuffled[index];
                      shuffled[index] = shuffled[i];
                      shuffled[i] = temp;
                    }
                    return shuffled.slice(min);
                  }
                </script>
              </div>
            </div>

            <?php if(false){ ?>
            <div class="row">
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Current Orders</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0"><?php echo number_format(1392); ?></h2>
                          <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                        </div>
                        <h6 class="text-muted font-weight-normal">11 Since last month</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Processed Orders</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0"><?php echo number_format(841); ?></h2>
                          <p class="text-success ml-2 mb-0 font-weight-medium">+8.3%</p>
                        </div>
                        <h6 class="text-muted font-weight-normal"> 9.61% Since last month</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>In Transit</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0"><?php echo number_format(541); ?></h2>
                          <p class="text-danger ml-2 mb-0 font-weight-medium">-2.1% </p>
                        </div>
                        <h6 class="text-muted font-weight-normal">2.27% Since last month</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>

            <?php if(true){ ?>
            <div class="row">
              <div class="col col grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title">Announcement</h4>
                      <p class="text-muted mb-1 small" style="cursor: pointer;" onclick="window.location.href='announcements'">View all</p>
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
                        $sql = "SELECT * FROM announcements_tb WHERE NOT JSON_CONTAINS(acknowledgeby, '\"".$_SESSION['id']."\"') ORDER BY timedate DESC LIMIT 5;";
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
                                <h6 class="preview-subject"><?php echo $row['subject']; ?><code style="font-size: 11px;"><?php echo $row['id']; ?></code></h6>
                                <p class="text-muted text-small"><?php echo $row['timedate']; ?></p>
                                </div>
                                <p class="text-justify text-muted"><?php echo $row['message']; ?></p>
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
              <div class="col-xl-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title mb-1">Change Logs</h4>
                      <p class="text-muted mb-1">Date</p>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="preview-list">
                          <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-primary">
                                <i class="mdi mdi-file-document"></i>
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject">Admin dashboard design</h6>
                                <p class="text-muted mb-0">Broadcast web app mockup</p>
                              </div>
                              <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">15 minutes ago</p>
                                <p class="text-muted mb-0">30 tasks, 5 issues </p>
                              </div>
                            </div>
                          </div>
                          <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-success">
                                <i class="mdi mdi-cloud-download"></i>
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject">Wordpress Development</h6>
                                <p class="text-muted mb-0">Upload new design</p>
                              </div>
                              <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">1 hour ago</p>
                                <p class="text-muted mb-0">23 tasks, 5 issues </p>
                              </div>
                            </div>
                          </div>
                          <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-info">
                                <i class="mdi mdi-clock"></i>
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject">Project meeting</h6>
                                <p class="text-muted mb-0">New project discussion</p>
                              </div>
                              <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">35 minutes ago</p>
                                <p class="text-muted mb-0">15 tasks, 2 issues</p>
                              </div>
                            </div>
                          </div>
                          <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-danger">
                                <i class="mdi mdi-email-open"></i>
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject">Broadcast Mail</h6>
                                <p class="text-muted mb-0">Sent release details to team</p>
                              </div>
                              <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">55 minutes ago</p>
                                <p class="text-muted mb-0">35 tasks, 7 issues </p>
                              </div>
                            </div>
                          </div>
                          <div class="preview-item">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-warning">
                                <i class="mdi mdi-chart-pie"></i>
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject">UI Design</h6>
                                <p class="text-muted mb-0">New application planning</p>
                              </div>
                              <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">50 minutes ago</p>
                                <p class="text-muted mb-0">27 tasks, 4 issues </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>

            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Login History</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Login ID </th>
                            <th> User </th>
                            <th> IP Address </th>
                            <th> Date </th>
                            <th> Time </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          if($_SESSION['access_type'] == 'admin'){
                            $sql = "SELECT * FROM logins_tb ORDER BY date DESC, time DESC LIMIT 10;";
                          }else{
                            $sql = "SELECT * FROM logins_tb WHERE user_id = '".$_SESSION['id']."' ORDER BY date DESC, time DESC LIMIT 10;";
                          }
                          $result = mysqli_query($conn, $sql);
                          if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_array($result)) {
                          ?>
                            <tr>
                              <td><div class="badge badge-outline-success"> <?php echo $row['id']; ?> </div></td>
                              <td>
                                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="image" />
                                <span class="pl-2"><?php if($_SESSION['access_type'] == 'admin'){ echo ($row['user_name']); }else{ echo ($row['user_name']); } ?></span>
                              </td>
                              <td> <?php echo $row['ip_address']; ?> </td>
                              <td> <?php echo $row['date']; ?>0 </td>
                              <td> <?php echo $row['time']; ?> </td>
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