<?php
if (!isset($_SESSION['user'])) {
           $_SESSION['user'] = '';
       }
 ?>
<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
    <div class="navbar-header" data-logobg="skin5">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="index.php">
                <!-- Logo icon -->
                 <!-- Logo text -->
                 <b class="logo-icon p-l-10" >
                     <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                     <!-- Dark Logo icon -->
                     <img src="../../assets/images/logo-icon.png" alt="homepage" class="light-logo" />

                 </b>
                 <!--End Logo icon -->
                  <!-- Logo text -->
                 <span class="logo-text" >
                      <!-- dark Logo text -->
                      <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" />
                 </span>
                <!-- Logo icon -->
                <!-- <b class="logo-icon"> -->
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <!-- <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                <!-- </b> -->
                <!--End Logo icon -->
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>

        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-left mr-auto">
                <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
            </ul>
            <ul class="navbar-nav float-right">
               <!-- ============================================================== -->
               <!-- Comment -->
               <!-- ============================================================== -->
            <?php echo '<a class="nav-item d-none d-md-block" aria-haspopup="true" style="color:white" aria-expanded="false">Hello '.$_SESSION['user'].'!</a>' ?>
            </ul>
        </div>
    </nav>
</header>
