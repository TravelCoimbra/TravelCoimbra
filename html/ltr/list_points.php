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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Points</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Website</th>
                                                <th>Latitude</th>
                                                <th>Longitude</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                                  $select = "SELECT
                                                                  places.*
                                                              FROM
                                                                  places
                                                              WHERE
                                                                  places.approved=0
                                          							ORDER BY name ASC";
                                                  $result = mysqli_query($conn, $select);
                                          		    $line_number = mysqli_num_rows($result);
                                                  while ($line=mysqli_fetch_array($result))
			                                            {
                                                      echo "<tr>";
                                                        echo "<td>";
                                                          echo $line['name'];
                                                        echo "</td>";
                                                        echo "<td style='word-break:break-all'>";
                                                          echo $line['description'];
                                                        echo "</td>";
                                                        echo "<td>";
                                                          echo $line['website'];
                                                        echo "</td>";
                                                        echo "<td>";
                                                          echo $line['lat'];
                                                        echo "</td>";
                                                        echo "<td>";
                                                          echo $line['lon'];
                                                        echo "</td>";
                                                        echo "<td>";
                                                          echo '<form name="approve_place'.$line['idplaces'].'" id="approve_place'.$line['idplaces'].'" method="post" action="approve_place.php" enctype="multipart/form-data">';
                                                            echo '<a onclick="approve_place('.$line['idplaces'].')"><i class="mdi mdi-check"></i></a>';
                                                            echo '<input type="text" id="approve_hidden'.$line['idplaces'].'" name="approve_hidden" value="" style="display:none">';
                                                          echo "</form>";
                                                        echo "</td>";
                                                        echo "<td>";
                                                        echo '<form name="reject_place'.$line['idplaces'].'" id="reject_place'.$line['idplaces'].'" method="post" action="reject_place.php" enctype="multipart/form-data">';
                                                          echo '<a onclick="reject_place('.$line['idplaces'].')"><i class="mdi mdi-delete"></i></a>';
                                                          echo '<input type="text" name="reject_hidden" id="reject_hidden'.$line['idplaces'].'" value="" style="display:none">';
                                                        echo "</form>";
                                                        echo "</td>";
                                                      echo "</tr>";

                                                  }
                                                  ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              <th>Name</th>
                                              <th>Description</th>
                                              <th>Website</th>
                                              <th>Latitude</th>
                                              <th>Longitude</th>
                                              <th></th>
                                              <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
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
    function approve_place(e)
		{
      document.getElementById("approve_hidden"+e).value=e;
			f="approve_place"+e;
			document.getElementById(f).submit();
		}
    function reject_place(e)
		{
      document.getElementById("reject_hidden"+e).value=e;
			f="reject_place"+e;
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
