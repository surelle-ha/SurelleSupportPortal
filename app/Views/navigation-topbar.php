<!-- partial:partials/_navbar.html -->
<nav class="navbar p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
    <a class="navbar-brand brand-logo-mini" href="index"><img src="images/logo-mini.png" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-menu"></span>
    </button>
    <ul class="navbar-nav w-100">
        <li class="nav-item w-100">
        <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
            <input type="text" class="form-control" placeholder="Search products">
        </form>
        </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right">
        
        <?php if($_SESSION['access_type'] == 'admin'){ ?>
        <li class="nav-item dropdown d-none d-lg-block">
        <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" data-toggle="dropdown" aria-expanded="false" href="#">§ Quick Admin Control</a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="createbuttonDropdown">
            <h6 class="p-3 mb-0">Tool</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-file-outline text-primary"></i>
                </div>
            </div>
            <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1">Add New Service</p>
            </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-web text-info"></i>
                </div>
            </div>
            <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1">UI Development</p>
            </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-layers text-danger"></i>
                </div>
            </div>
            <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1">Software Testing</p>
            </div>
            </a>
            <div class="dropdown-divider"></div>
            <p class="p-3 mb-0 text-center">See all projects</p>
        </div>
        </li>
        
        <?php if(false){ ?>
        <li class="nav-item dropdown border-left">
        <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
            <i class="mdi mdi-email"></i>
            <span class="count bg-success"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
            <h6 class="p-3 mb-0">Messages</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
                <img src="images/faces/face4.jpg" alt="image" class="rounded-circle profile-pic">
            </div>
            <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1">Mark send you a message</p>
                <p class="text-muted mb-0"> 1 Minutes ago </p>
            </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
                <img src="images/faces/face2.jpg" alt="image" class="rounded-circle profile-pic">
            </div>
            <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1">Cregh send you a message</p>
                <p class="text-muted mb-0"> 15 Minutes ago </p>
            </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
                <img src="images/faces/face3.jpg" alt="image" class="rounded-circle profile-pic">
            </div>
            <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1">Profile picture updated</p>
                <p class="text-muted mb-0"> 18 Minutes ago </p>
            </div>
            </a>
            <div class="dropdown-divider"></div>
            <p class="p-3 mb-0 text-center">4 new messages</p>
        </div>
        </li>
        <?php } ?>

        <?php if(false){ ?>
        <li class="nav-item dropdown border-left">
        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
            <i class="mdi mdi-bell"></i>
            <span class="count bg-danger"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
            <h6 class="p-3 mb-0">Notifications</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-calendar text-success"></i>
                </div>
            </div>
            <div class="preview-item-content">
                <p class="preview-subject mb-1">BTCUSDT</p>
                <p class="text-muted ellipsis mb-0" id="btcPriceLink"> </p>
            </div>
            <script>
            $(document).ready(function() {
                var url = 'https://api.binance.com/api/v3/avgPrice?symbol=BTCUSDT';
                $.ajax({
                url: url,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    var btcPrice = response.price;
                    var btcPriceLink = $('#btcPriceLink');
                    btcPriceLink.text(btcPrice + ' USDT');
                },
                error: function() {
                    var btcPriceLink = $('#btcPriceLink');
                    btcPriceLink.text('Unable to fetch BTC price.');
                }
                });
            });
            </script>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-settings text-danger"></i>
                </div>
            </div>
            <div class="preview-item-content">
                <p class="preview-subject mb-1">Settings</p>
                <p class="text-muted ellipsis mb-0"> Update dashboard </p>
            </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-link-variant text-warning"></i>
                </div>
            </div>
            <div class="preview-item-content">
                <p class="preview-subject mb-1">Launch Admin</p>
                <p class="text-muted ellipsis mb-0"> New admin wow! </p>
            </div>
            </a>
            <div class="dropdown-divider"></div>
            <p class="p-3 mb-0 text-center">See all notifications</p>
        </div>
        </li>
        <?php } ?>
        
        <?php } ?>
        <li class="nav-item dropdown">
        <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
            <div class="navbar-profile">
            <img class="img-xs rounded-circle" src="https://static.vecteezy.com/system/resources/previews/019/896/008/original/male-user-avatar-icon-in-flat-design-style-person-signs-illustration-png.png" alt="">
            <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?></p>
            <i class="mdi mdi-menu-down d-none d-sm-block"></i>
            </div>
        </a>

        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
            <h6 class="p-3 mb-0">Profile</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-settings text-success"></i>
                </div>
            </div>
            <div class="preview-item-content">
                <p class="preview-subject mb-1">Settings</p>
            </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item" onclick="window.location.href='?signout=<?php echo $_SESSION['id']; ?>'">
            <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-logout text-danger"></i>
                </div>
            </div>
            <div class="preview-item-content">
                <p class="preview-subject mb-1">Log out</p>
            </div>
            </a>
            <div class="dropdown-divider"></div>
            <p class="p-3 mb-0 text-center">Advanced settings</p>
        </div>
        </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-format-line-spacing"></span>
    </button>
    </div>
</nav>
<!-- partial -->