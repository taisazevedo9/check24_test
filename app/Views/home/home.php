<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>SB Admin 2 - Blank</title>

<!-- Custom fonts for this template-->
<link href="../assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<!-- Custom styles for this template-->
<link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <a href="#"><img src="../img/337822.png" alt="90px" width="90px"></a>
                <div class="sidebar-brand-text mx-3"> BLOG NAME</div>  
                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="<?php echo $_SESSION['authUrl'];?>" id="alertsDropdown" role="button">
                            Login
                            <!-- Counter - Alerts -->
                            
                        </a>
                    </li>


                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
            <div class="row">
            <div class="nav-scroller py-1 mb-2">
                <nav class="nav d-flex justify-content-between">
                <a class="p-2 text-muted" href="#">Home</a>
                <a class="p-2 text-muted" href="#">New</a>
                <a class="p-2 text-muted" href="#">Print</a>
                </nav>
            </div>

            <div class="col-lg-12">

            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                <!-- Page Heading -->
                <div class="col-md-12">
                    <div class="page-header-title">

</h5></div><ul class="breadcrumb">
<li class="breadcrumb-item">
<a href="/angular/default/dashboard/analytics" class="ng-star-inserted">
<i class="feather icon-home"></i></a>
</li><li _ngcontent-xca-c104="" class="breadcrumb-item ng-star-inserted">
<a _ngcontent-xca-c104="" href="javascript:">Home</a></li><!----><!---->

</div>

<div class="card-body">
        
<?php
    foreach($this->data['articles'] as $article):
        extract($article);
        $dates  = date("Y-m-d", getlastmod()) == date("Y-m-d",strtotime($article['date'])) ? "Today" : date("d.m.Y",strtotime($article['date'])) ;
        $time = date("H:i",strtotime($article['date']));
        $dates = $dates.', '.$time.'h';

    ?>

    <div class="col-lg-12">

        <div class="card flex-md-row mb-4 box-shadow h-md-250 border-left-secondary">
            <div class="card-body d-flex flex-column align-items-start">
                
                <div class="mb-1 text-muted"><?php echo $dates ;?></div>
                <strong class="mb-2 text-primary"> 
                <h3 class="mb-0"><a class="text-dark" href="#"><?php echo $article['title'];?></a></h3></strong>
                <p class="card-text mb-auto"><?php echo  mb_strimwidth($article['content'], 0, 1000, " <a href='#'>...</a>");?>
                 
                </p>
                <div class="row">
                    <div class="col-12">        
                        <span class="col-12 col-sm-6 col-lg-8">Author. <?php echo $article['author_name'];?> </span> 
                        <span class="col-6 col-lg-4">Comments:<?php echo $article['number'];?></span> 
                    </div>
                </div>
            </div>

            <img class="card-img-right flex-auto d-none d-md-block" 
            data-src="holder.js/200x250?theme=thumb" 
            alt="Thumbnail [200x250]" 
            style="width: 250px; height: 250px;" 
            
            src="<?php echo $article['picture'] ? $article['picture']: "data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_178519f865f%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A13pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_178519f865f%22%3E%3Crect%20width%3D%22200%22%20height%3D%22250%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2256.1953125%22%20y%3D%22131%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E";?>" data-holder-rendered="true">
        </div>
    </div>
    

    <?php
    endforeach;
    ?>
</div>
    </div>
</div>

</div>
                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Check24 Test 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="../assets/jquery/jquery.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../assets/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../js/sb-admin-2.min.js"></script>

</body>

</html>