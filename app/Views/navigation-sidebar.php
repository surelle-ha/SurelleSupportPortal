<!-- partial:partials/_sidebar -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
<div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <a class="sidebar-brand brand-logo" href="/index"><img src="images/logo.png" alt="logo" /></a>
    <a class="sidebar-brand brand-logo-mini" href="/index"><img src="images/logo-mini.png" alt="logo" /></a>
</div>
<ul class="nav">
    <li class="nav-item profile">
    <div class="profile-desc">
        <div class="profile-pic">
        <div class="count-indicator">
            <img class="img-xs rounded-circle " src="https://static.vecteezy.com/system/resources/previews/019/896/008/original/male-user-avatar-icon-in-flat-design-style-person-signs-illustration-png.png" alt="">
            <span class="count bg-success"></span>
        </div>
        <div class="profile-name">
            <h5 class="mb-0 font-weight-normal"><?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?></h5>
            <span><?php echo strtoupper($_SESSION['access_type']); ?></span>
        </div>
        </div>
        <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
        <a href="/users" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
            <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-settings text-primary"></i>
            </div>
            </div>
            <div class="preview-item-content">
            <p class="preview-subject ellipsis mb-1 text-small">Account settings [UD]</p>
            </div>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
            <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-onepassword  text-info"></i>
            </div>
            </div>
            <div class="preview-item-content">
            <p class="preview-subject ellipsis mb-1 text-small">Change Password [UD]</p>
            </div>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
            <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-calendar-today text-success"></i>
            </div>
            </div>
            <div class="preview-item-content">
            <p class="preview-subject ellipsis mb-1 text-small">To-do list [UD]</p>
            </div>
        </a>
        </div>
    </div>
    </li>

    <?php if(getSystemElementStatus($conn, 'Navigation')){ ?>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <?php if(true){ ?>
        <li class="nav-item menu-items">
            <a class="nav-link" href="index">
                <span class="menu-icon">
                <i class="mdi mdi-home"></i>
                </span>
                <span class="menu-title">Home</span>
            </a>
        </li>
        <?php } ?>
        <?php if(true){ ?>
        <li class="nav-item menu-items">
            <a class="nav-link" href="announcements">
                <span class="menu-icon">
                <i class="mdi mdi-home"></i>
                </span>
                <span class="menu-title">Announcements</span>
            </a>
        </li>
        <?php } ?>
        <?php if(false){ ?>
        <li class="nav-item menu-items">
            <a class="nav-link" href="message">
                <span class="menu-icon">
                <i class="mdi mdi-home"></i>
                </span>
                <span class="menu-title">Message</span>
            </a>
        </li>
        <?php } ?>
        <?php if(false){ ?>
        <li class="nav-item menu-items">
            <a class="nav-link" href="ticket">
                <span class="menu-icon">
                <i class="mdi mdi-home"></i>
                </span>
                <span class="menu-title">Ticket</span>
            </a>
        </li>
        <?php } ?>
    <?php } ?>

    <?php if(getSystemElementStatus($conn, 'Admin')){ ?>
        <?php if($_SESSION['access_type'] == 'admin'){ ?>
        <li class="nav-item nav-category">
            <span class="nav-link">Admin</span>
        </li>
        <li class="nav-item menu-items">
        <a class="nav-link" href="dashboard">
            <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title">Dashboard</span>
        </a>
        </li>
        <li class="nav-item menu-items">
        <a class="nav-link" href="users">
            <span class="menu-icon">
            <i class="mdi mdi-account"></i>
            </span>
            <span class="menu-title">Users</span>
        </a>
        </li>
        <li class="nav-item menu-items">
        <a class="nav-link" href="system">
            <span class="menu-icon">
            <i class="mdi mdi-console"></i>
            </span>
            <span class="menu-title">System</span>
        </a>
        </li>
        <li class="nav-item menu-items">
        <a class="nav-link" href="settings">
            <span class="menu-icon">
            <i class="mdi mdi-wrench"></i>
            </span>
            <span class="menu-title">Settings</span>
        </a>
        </li>
        <?php } ?>
    <?php } ?>

    <?php if(getSystemElementStatus($conn, 'PaidServices')){ ?>
        <li class="nav-item nav-category">
            <span class="nav-link">Services</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#phpsup" aria-expanded="false" aria-controls="phpsup">
                <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
                </span>
                <span class="menu-title">PHP Support</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="phpsup">
                <ul class="nav flex-column sub-menu">
                    <?php 
                        $sql = "SELECT * FROM products_tb WHERE subject = 'PHP';";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) { 
                            while($row = mysqli_fetch_array($result)) {
                    ?>
                        <li class="nav-item"> <a class="nav-link" href="support?idSup=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></li>
                    <?php 
                            }
                        }
                    ?>
                    <?php if($_SESSION['access_type'] == "admin"){ ?>
                        <li class="nav-item"> <a class="nav-link" style="color:gray;" href="support?noSup=new">+ Add New Product</a></li>
                    <?php } ?>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#nodesup" aria-expanded="false" aria-controls="nodesup">
                <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
                </span>
                <span class="menu-title">Node.JS Support</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="nodesup">
                <ul class="nav flex-column sub-menu">
                    <?php 
                        $sql = "SELECT * FROM products_tb WHERE subject = 'NodeJS';";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) { 
                            while($row = mysqli_fetch_array($result)) {
                    ?>
                        <li class="nav-item"> <a class="nav-link" href="support?idSup=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></li>
                    <?php 
                            }
                        }
                    ?>
                    <?php if($_SESSION['access_type'] == "admin"){ ?>
                        <li class="nav-item"> <a class="nav-link" style="color:gray;" href="support?noSup=new">+ Add New Product</a></li>
                    <?php } ?>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#javasup" aria-expanded="false" aria-controls="javasup">
                <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
                </span>
                <span class="menu-title">Java Support</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="javasup">
                <ul class="nav flex-column sub-menu">
                    <?php 
                        $sql = "SELECT * FROM products_tb WHERE subject = 'Java';";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) { 
                            while($row = mysqli_fetch_array($result)) {
                    ?>
                        <li class="nav-item"> <a class="nav-link" href="support?idSup=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></li>
                    <?php 
                            }
                        }
                    ?>
                    <?php if($_SESSION['access_type'] == "admin"){ ?>
                        <li class="nav-item"> <a class="nav-link" style="color:gray;" href="support?noSup=new">+ Add New Product</a></li>
                    <?php } ?>
                </ul>
            </div>
        </li>
    <?php } ?>

    <?php if(getSystemElementStatus($conn, 'FreeServices')){ ?>
        <li class="nav-item nav-category">
            <span class="nav-link">Free Services</span>
        </li>
        <li class="nav-item menu-items">
        <a class="nav-link" href="check_php">
            <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title">PHP Vulnerability Check</span>
        </a>
        </li>
    <?php } ?>

    <?php if(getSystemElementStatus($conn, 'DevReference')){ ?>
        <?php if($_SESSION['access_type'] == "admin" && $_SESSION['access_level'] == '4' && true){ ?>
        <li class="nav-item nav-category">
            <span class="nav-link">Dev Reference</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
                </span>
                <span class="menu-title">Basic UI Elements</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="guide_ui/buttons">Buttons</a></li>
                    <li class="nav-item"> <a class="nav-link" href="guide_ui/dropdowns">Dropdowns</a></li>
                    <li class="nav-item"> <a class="nav-link" href="guide_ui/typography">Typography</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
        <a class="nav-link" href="guide_ui/basic_elements">
            <span class="menu-icon">
            <i class="mdi mdi-playlist-play"></i>
            </span>
            <span class="menu-title">Form Elements</span>
        </a>
        </li>
        <li class="nav-item menu-items">
        <a class="nav-link" href="guide_ui/basic-table">
            <span class="menu-icon">
            <i class="mdi mdi-table-large"></i>
            </span>
            <span class="menu-title">Tables</span>
        </a>
        </li>
        <li class="nav-item menu-items">
        <a class="nav-link" href="guide_ui/chartjs">
            <span class="menu-icon">
            <i class="mdi mdi-chart-bar"></i>
            </span>
            <span class="menu-title">Charts</span>
        </a>
        </li>
        <li class="nav-item menu-items">
        <a class="nav-link" href="guide_ui/mdi">
            <span class="menu-icon">
            <i class="mdi mdi-contacts"></i>
            </span>
            <span class="menu-title">Icons</span>
        </a>
        </li>
        <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
            <span class="menu-icon">
            <i class="mdi mdi-security"></i>
            </span>
            <span class="menu-title">User Pages</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
            <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="guide_ui/blank-page"> Blank Page </a></li>
            <li class="nav-item"> <a class="nav-link" href="guide_ui/error-404"> 404 </a></li>
            <li class="nav-item"> <a class="nav-link" href="guide_ui/error-500"> 500 </a></li>
            <li class="nav-item"> <a class="nav-link" href="guide_ui/login"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="guide_ui/register"> Register </a></li>
            </ul>
        </div>
        </li>
        <li class="nav-item menu-items">
        <a class="nav-link" href="http://www.bootstrapdash.com/demo/corona-free/jquery/documentation/documentation">
            <span class="menu-icon">
            <i class="mdi mdi-file-document-box"></i>
            </span>
            <span class="menu-title">Documentation</span>
        </a>
        </li>
        <?php } ?>
    <?php } ?>
</ul>
</nav>
<!-- partial -->