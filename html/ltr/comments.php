<?php
session_start();
include ("acess_db.php");
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
  <title>Home</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="../../assets/libs/select2/dist/css/select2.min.css">
  <link rel="stylesheet" type="text/css" href="../../assets/libs/jquery-minicolors/jquery.minicolors.css">
  <link rel="stylesheet" type="text/css" href="../../assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" type="text/css" href="../../assets/libs/quill/dist/quill.snow.css">
  <link href="../../dist/css/style.min.css" rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php
          include "header.php";
        ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php
        include "sidebar.php";
        ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                  <div class="col-md-12">
                       <div class="card">
                          <div class="card-body">
                              <h4 class="card-title">Latest Posts</h4>
                          </div>
                          <div class="comment-widgets scrollable">
                              <!-- Comment Row -->
                              <?php
                                  $select = "SELECT
                              				comments.*
                              			FROM
                              				comments
                                      order by date_created desc" ;

                              //echo $select;
                              //exit();

                              $result = mysqli_query($conn, $select);

                              $numb_lines = mysqli_num_rows($result);
                              while ($line=mysqli_fetch_array($result))
    							            {

                                $select_users = "SELECT
                                    users.username,
                                    users.idusers
                                  FROM
                                    users
                                  WHERE users.idusers='".$line['users_idusers']. "'
                                  LIMIT 1";
                                  $result_users = mysqli_query($conn, $select_users);
                                  $line_user=mysqli_fetch_array($result_users);

                                  $select_places = "SELECT
                                      places.name
                                    FROM
                                      places
                                    WHERE places.idplaces='".$line['places_idplaces']. "'
                                    LIMIT 1";
                                    $result_places = mysqli_query($conn, $select_places);
                                    $line_places=mysqli_fetch_array($result_places);
                                ?>
                              <div class="d-flex flex-row comment-row">
                                  <div class="comment-text w-100">
                                      <h3 class="font-medium"><b><?php echo $line_user['username']; ?></b></h3>
                                      <h4 class="font-medium"><?php echo $line_places['name']; ?></h4>

                                      <?php
                                      echo '<span id="description'.$line['idcomments'].'" style="display:block">'.$line['description'].'</span>';
                                      if(isset($_SESSION['id_user']) && $_SESSION['user_permission']){
                                      if($line_user['idusers'] == $_SESSION['id_user'] || $_SESSION['user_permission']==1){
                                        echo '<form name="save_comment'.$line['idcomments'].'" id="save_comment'.$line['idcomments'].'" method="post" style="display:none" action="edit_comment.php" enctype="multipart/form-data">';
                                          echo '<textarea id="text_save'.$line['idcomments'].'" name="text_save" value="" style="display:none;width:100%"></textarea>';
                                          echo '<br>';
                                          echo '<a onclick="back_save('.$line['idcomments'].')" class="btn btn-danger btn-sm" style="color:white;margin:5px">Back</a>';
                                          echo '<a onclick="save_comment('.$line['idcomments'].')" class="btn btn-cyan btn-sm" style="color:white">Save</a>';
                                          echo '<input type="text" id="save_hidden'.$line['idcomments'].'" name="save_hidden" value="" style="display:none">';
                                        echo "</form>";
                                        echo '<form name="edit_comment'.$line['idcomments'].'" id="edit_comment'.$line['idcomments'].'" style="display:inline-block;margin:5px" enctype="multipart/form-data">';
                                          echo '<a onclick="edit_comment('.$line['idcomments'].')" class="btn btn-cyan btn-sm" style="color:white">Edit</a>';
                                          echo '<input type="text" id="edit_hidden'.$line['idcomments'].'" name="edit_hidden" value="" style="display:none">';
                                        echo "</form>";
                                      echo '<form name="delete_comment'.$line['idcomments'].'" id="delete_comment'.$line['idcomments'].'" method="post" style="display:inline-block;" action="delete_comment.php" enctype="multipart/form-data">';
                                        echo '<a onclick="delete_comment('.$line['idcomments'].')" class="btn btn-danger btn-sm" style="color:white">Delete</a>';
                                        echo '<input type="text" name="delete_hidden" id="delete_hidden'.$line['idcomments'].'" value="" style="display:none">';
                                      echo "</form>";
                                      }
                                      }
                                        ?>
                                        <div class="comment-footer">
                                            <span class="text-muted float-right"><?php echo $line['date_created']; ?></span>
                                      </div>
                                  </div>
                              </div>
                              <?php
                            }
                               ?>
                          </div>
                      </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="../../assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="../../assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="../../assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
    function edit_comment(e)
		{
			document.getElementById("save_comment"+e).style.display = "inline-block";
      document.getElementById("text_save"+e).style.display = "inline-block";
      document.getElementById("edit_comment"+e).style.display = "none";
      document.getElementById("delete_comment"+e).style.display = "none";
      document.getElementById("description"+e).style.display = "none";
		}
    function back_save(e)
		{
      document.getElementById("save_comment"+e).style.display = "none";
      document.getElementById("text_save"+e).style.display = "none";
      document.getElementById("edit_comment"+e).style.display = "inline-block";
      document.getElementById("delete_comment"+e).style.display = "inline-block";
      document.getElementById("description"+e).style.display = "block";
		}
    function save_comment(e)
		{
      document.getElementById("save_hidden"+e).value=e;
			f="save_comment"+e;
			document.getElementById(f).submit();
		}
    function delete_comment(e)
		{
      document.getElementById("delete_hidden"+e).value=e;
			f="delete_comment"+e;
			document.getElementById(f).submit();
		}
 </script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>

</body>

</html>
