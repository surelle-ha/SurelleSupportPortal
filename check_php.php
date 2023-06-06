<?php
  include('app/Controllers/Users.php'); 
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
      function sanitize(input) { return input.replace(/<\/?[^>]+(>|$)/g, ""); }

      $(document).ready(function() {
        $('#phpcheck_form').submit(function(e) {
          e.preventDefault();

          var formData = new FormData(this);
          var apiUrl = 'app/Controllers/PHPTester.php';

          $('#loading').show(); // Show loading spinner

          $.ajax({
            url: apiUrl,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
              try {
                console.log(response);

                // Extract relevant information from the response
                var resultText = '';
                var totalVulnerabilities = 0; // Variable to store the total number of vulnerabilities

                if (response.success) {

                  response.vulnerabilities.forEach(function(vulnerability, index) {
                    totalVulnerabilities++; // Increment the total number of vulnerabilities

                    resultText += '<div class="mb-3">';
                    resultText += '<div class="card-body">';
                    resultText += '<h5 class="card-title">Vulnerability ' + (index + 1) + '</h5>';
                    resultText += '<p class="card-text"><b>Threat Level:</b> ' + vulnerability.threat_level + '</p>';
                    resultText += '<p class="card-text"><b>Message:</b> ' + vulnerability.message + '</p>';
                    resultText += '<p class="card-text"><b>Explanation:</b> <code style="color: orangered;">' + (vulnerability.explanation) + '</code></p>';
                    resultText += '<p class="card-text"><b>Solution:</b> <code style="color: orange;">' + vulnerability.solution + '</code></p>';
                    resultText += '</div>';
                    resultText += '</div>';
                  });

                  resultText += 'Total Vulnerabilities Found: ' + totalVulnerabilities; // Display the total number of vulnerabilities
                } else {
                  resultText = 'An error occurred during the PHP test.';
                }

                // Set the HTML result in the textarea
                $('#phptest_result').html(resultText);
                $('#testresult').show();

                $('#phpcheck_form')[0].reset();
              } catch (error) {
                console.error('Failed to parse JSON response:', error);
              }
            },
            error: function(jqXHR, textStatus, errorThrown) {
              console.error('AJAX request failed:', errorThrown);
            },
            complete: function() {
              $('#loading').hide(); // Hide loading spinner
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
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">PHP Vulnerability Test</h4>
                    <p class="card-description"> <code> This feature is underdevelopment and may provide inaccurate result. </code> </p>
                    <form method="POST" class="forms-sample" id="phpcheck_form" enctype="multipart/form-data">
                      <div class="form-group">
                        <label>Upload PHP file</label>
                        <input type="file" class="file-upload-default" id="phpcheck_req" name="phpcheck_req" accept=".php" required>
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload PHP file">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      <input type="submit" name="phpcheck" value="Test" class="btn btn-primary mr-2">
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="row" id="testresult" style="display:none;">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">PHP Vulnerability Result</h4>
                    <div id="phptest_result" rows="30" style="background: #2A3038;" disabled></div>
                    <!--<button onclick="downloadResult()" class="btn btn-warning">Download Result</button>-->
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
    <script src="js/file-upload.js"></script>
    <script src="js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>