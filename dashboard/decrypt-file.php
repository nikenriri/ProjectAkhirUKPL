<?php
session_start();
include('../config.php');
if (empty($_SESSION['username'])) {
    header("location:../index.php");
}
$last = $_SESSION['username'];
$sqlupdate = "UPDATE users SET last_activity=now() WHERE username='$last'";
$queryupdate = mysqli_query($connect, $sqlupdate);
?>
<!DOCTYPE html>
<html>
<?php
$user = $_SESSION['username'];
$query = mysqli_query($connect, "SELECT fullname,job_title,last_activity FROM users WHERE username='$user'");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Kriptografi</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Kelly - v4.9.1
  * Template URL: https://bootstrapmade.com/kelly-free-bootstrap-cv-resume-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container-fluid d-flex justify-content-between align-items-center">

            <h1 class="logo me-auto me-lg-0"><a href="index.php">HEREGISTER</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="active" href="home.php">Home</a></li>
                    <li><a class="active" href="#history">History</a></li>
                    <li><a href="#encrypt">Upload File</a></li>
                    <li><a href="#decrypt">Dekrip</a></li>
                    <li><a href="#feedback">Feedback</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <div class="header-social-links">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            </div>

        </div>

    </header><!-- End Header -->

    <!-- Dekrip Section -->
    <section id="decrypt" class="container-fluid text-center">
        <div class="container" data-aos="fade-up">
            <br><br>

            <div class="section-title">
                <h2>Dekrip</h2>
            </div>

            <?php
            $id_file = $_GET['id_file'];
            $query = mysqli_query($connect, "SELECT * FROM file WHERE id_file='$id_file'");
            $data2 = mysqli_fetch_array($query);
            ?>

            <div class="row counters">
                <div class="container">
                    <!-- Bootstrap table and table-stripped classes -->
                    <h3 class="text-center" style="color:#000000;">Dekripsi File <i style="color:red"><?php echo $data2['file_name_finish'] ?></i></h3><br>
                    <form class="form-horizontal" method="post" action="decrypt-process.php">
                        <div class="table-responsive">
                            <table class="table table-striped" style="color:#000000;">
                                <tr>
                                    <td>Nama File Sumber</td>
                                    <td>:</td>
                                    <td><?php echo $data2['file_name_source']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nama File Enkripsi</td>
                                    <td>:</td>
                                    <td><?php echo $data2['file_name_finish']; ?></td>
                                </tr>
                                <tr>
                                    <td>Ukuran File</td>
                                    <td>:</td>
                                    <td><?php echo $data2['file_size']; ?> KB</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Enkripsi</td>
                                    <td>:</td>
                                    <td><?php echo $data2['tgl_upload']; ?></td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td><?php echo $data2['keterangan']; ?></td>
                                </tr>
                                <tr>
                                    <td>Masukkan Password Untuk Mendekrip</td>
                                    <td></td>
                                    <td>
                                        <div class="col-md-6">
                                            <input type="hidden" name="fileid" value="<?php echo $data2['id_file']; ?>">
                                            <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="pwdfile" required><br>
                                            <input type="submit" name="decrypt_now" value="Dekripsi File" class="form-control btn btn-primary" style="background-color:#34b7a7; color:#fff">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
    <!-- End Dekrip Section -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Niken Riri</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/kelly-free-bootstrap-cv-resume-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End  Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>