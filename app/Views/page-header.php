<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- plugins:css -->
<link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
<!-- endinject -->
<!-- Plugin css for this page -->
<link rel="stylesheet" href="vendors/jvectormap/jquery-jvectormap.css">
<link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" href="vendors/owl-carousel-2/owl.carousel.min.css">
<link rel="stylesheet" href="vendors/owl-carousel-2/owl.theme.default.min.css">
<!-- End plugin css for this page -->
<!-- inject:css -->
<!-- endinject -->
<!-- Layout styles -->
<link rel="stylesheet" href="css/style.css">
<!-- End layout styles -->
<link rel="shortcut icon" href="images/favicon.png" />
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