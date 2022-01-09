<aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                      <?php
                      if (!isset($_SESSION['user_permission'])) {
                                 $_SESSION['user_permission'] = 0;
                      }
                      switch ($_SESSION['user_permission']) {
                        case 1:
                        echo '<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false"><i class="mdi mdi-map"></i><span class="hide-menu">Map</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="add_point.php" aria-expanded="false"><i class="mdi mdi-map-marker-plus"></i><span class="hide-menu">New Point of Interest</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="add_comment.php" aria-expanded="false"><i class="mdi mdi-comment"></i><span class="hide-menu">New Comment</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="comments.php" aria-expanded="false"><i class="mdi mdi-comment-processing"></i><span class="hide-menu">Comments</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="add_user.php" aria-expanded="false"><i class="mdi mdi-account-plus"></i><span class="hide-menu">Add User</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="list_points.php" aria-expanded="false"><i class="mdi mdi-map-marker-multiple"></i><span class="hide-menu">Approve Points</span></a></li>
                        ';
                        break;
                        case 2:
                        echo '<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false"><i class="mdi mdi-map"></i><span class="hide-menu">Map</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="add_point.php" aria-expanded="false"><i class="mdi mdi-map-marker-plus"></i><span class="hide-menu">New Point of Interest</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="add_comment.php" aria-expanded="false"><i class="mdi mdi-comment"></i><span class="hide-menu">New Comment</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="comments.php" aria-expanded="false"><i class="mdi mdi-comment-processing"></i><span class="hide-menu">Comments</span></a></li>
                        ';
                        break;
                        default:
                        echo '<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false"><i class="mdi mdi-map"></i><span class="hide-menu">Map</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="comments.php" aria-expanded="false"><i class="mdi mdi-comment-processing"></i><span class="hide-menu">Comments</span></a></li>
                        ';
                        break;

                        }
                        if ($_SESSION['user_permission'] == 0) {
                          echo'<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="authentication-login.php" aria-expanded="false"><i class="mdi mdi-login"></i><span class="hide-menu">Login</span></a></li>';
                        }else{
                          echo'<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="logout.php" aria-expanded="false"><i class="mdi mdi-logout"></i><span class="hide-menu">Logout</span></a></li>';
                        }
                        ?>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
