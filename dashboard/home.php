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
    <link href="assets/img/icon.jpg" rel="icon">
    <link href="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.vecteezy.com%2Fvector-art%2F6893671-dog-foot-print&psig=AOvVaw2NTvdZwxpdMReDCqY9vpbU&ust=1669526340126000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCOjLnLWMy_sCFQAAAAAdAAAAABAK" rel="apple-touch-icon">

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
                    <li><a class="active" href="#hero">Home</a></li>
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

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container d-flex flex-column align-items-center" data-aos="zoom-in" data-aos-delay="100">
            <h1>Welcome to Our Website</h1>
            <h2>Prepare your documents and start your registration</h2>
            <!-- <a href="#encrypt" class="btn-about">Regis Now</a> -->
        </div>
    </section><!-- End Hero -->

    <!-- History Section -->
    <section id="history" class="facts">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>History</h2>
            </div>

            <div class="row counters">

                <div class="col-lg-4 col-6 text-center">
                    <?php
                    $query = mysqli_query($connect, "SELECT count(*) totaluser FROM users");
                    $datauser = mysqli_fetch_array($query);
                    ?>
                    <span><?php echo $datauser['totaluser']; ?></span>
                    <p>Total User</p>
                </div>

                <div class="col-lg-4 col-6 text-center">
                    <?php
                    $query = mysqli_query($connect, "SELECT count(*) totalencrypt FROM file WHERE status='1'");
                    $dataencrypt = mysqli_fetch_array($query);
                    ?>
                    <span><?php echo $dataencrypt['totalencrypt']; ?></span>
                    <p>File Enkripsi</p>
                </div>

                <div class="col-lg-4 col-6 text-center">
                    <?php
                    $query = mysqli_query($connect, "SELECT count(*) totaldecrypt FROM file WHERE status='2'");
                    $datadecrypt = mysqli_fetch_array($query);
                    ?>
                    <span><?php echo $datadecrypt['totaldecrypt']; ?></span>
                    <p>File Dekripsi</p>
                </div>

                <div class="container">
                    <!-- Bootstrap table and table-stripped classes -->
                    <br><br>
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Username</th>
                                <th scope="col" class="text-center">Nama File Plain</th>
                                <th scope="col" class="text-center">Nama File Cipher</th>
                                <th scope="col" class="text-center">Ukuran</th>
                                <th scope="col" class="text-center">Tanggal</th>
                                <th scope="col" class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($connect, "SELECT * FROM file");
                            while ($data = mysqli_fetch_array($query)) { ?>
                                <tr>
                                    <td class="text-center"><?php echo $data['username']; ?></td>
                                    <td class="text-center"><?php echo $data['file_name_source']; ?></td>
                                    <td class="text-center"><?php echo $data['file_name_finish']; ?></td>
                                    <td class="text-center"><?php echo $data['file_size']; ?> KB</td>
                                    <td class="text-center"><?php echo $data['tgl_upload']; ?></td>
                                    <td class="text-center"><?php if ($data['status'] == 1) {
                                                                echo "<span>Terenkripsi</span>";
                                                            } elseif ($data['status'] == 2) {
                                                                echo "<span>Terdekripsi</span>";
                                                            } else {
                                                                echo "<span>Status Tidak Diketahui</span>";
                                                            }
                                                            ?></td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </section>
    <!-- End History Section -->

    <!-- Section Encrypt Start -->
    <section id="encrypt" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Upload File</h2>

                <div class="row mt-5">

                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address"><br>
                                <h4>Upload File : </h4>
                            </div>

                            <div class="email">
                                <h4>Password : </h4>
                            </div>

                            <div class="phone">
                                <h4>Deskripsi File : </h4>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0">

                        <form class="form-horizontal" method="post" action="encrypt-process.php" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" style="color:#000000;" for="inputFile"></label>
                                    <div class="col-lg-8">
                                        <input class="form-control" id="inputFile" placeholder="Input File" type="file" name="file" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" style="color:#000000;" for="inputPassword"></label>
                                    <div class="col-lg-8">
                                        <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="pwdfile" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" style="color:#000000;" for="textArea"></label>
                                    <div class="col-lg-8">
                                        <textarea class="form-control" id="textArea" rows="3" name="desc" placeholder="Deskripsi"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="textArea"></label>
                                    <div class="col-lg-8">
                                        <input type="submit" name="encrypt_now" value="Upload File" class="form-control btn btn-default" style="background-color:#34b7a7; color:#fff">
                                    </div>
                                </div>
                            </fieldset>
                        </form>

                    </div>

                </div>

            </div>
    </section>
    <!-- End Encrypt Section -->

    <!-- Dekrip Section -->
    <section id="decrypt" class="container-fluid text-center">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Dekrip</h2>
            </div>

            <div class="row counters">
                <div class="container">
                    <!-- Bootstrap table and table-stripped classes -->
                    <br><br>
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Nama File Plain</th>
                                <th scope="col" class="text-center">Nama File Cipher</th>
                                <th scope="col" class="text-center">Path File</th>
                                <th scope="col" class="text-center">Status File</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $query = mysqli_query($connect, "SELECT * FROM file");
                            while ($data = mysqli_fetch_array($query)) { ?>
                                <tr>
                                    <td class="text-center"><?php echo $data['file_name_source']; ?></td>
                                    <td class="text-center"><?php echo $data['file_name_finish']; ?></td>
                                    <td class="text-center"><?php echo $data['file_url']; ?> KB</td>
                                    <td class="text-center"><?php if ($data['status'] == 1) {
                                                                echo "Enkripsi";
                                                            } elseif ($data['status'] == 2) {
                                                                echo "Dekripsi";
                                                            } else {
                                                                echo "Status Tidak Diketahui";
                                                            }
                                                            ?></td>
                                    <td class="text-center"><?php
                                                            $a = $data['id_file'];
                                                            if ($data['status'] == 1) {
                                                                echo '<a href="decrypt-file.php?id_file=' . $a . '" class="btn btn-primary">Dekripsi File</a>';
                                                            } elseif ($data['status'] == 2) {
                                                                echo '<a href="#encrypt" class="btn btn-success">Enkripsi File</a>';
                                                            } else {
                                                                echo '<a href="#decrypt" class="btn btn-danger">Data Tidak Diketahui</a>';
                                                            }
                                                            ?></td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </section>
    <!-- End Dekrip Section -->

    <!-- Section Super Enkripsi -->
    <section id="feedback" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>FeedBack</h2>

                <div class="row mt-5" style="margin-left:20%; margin-right:20%">

                    <div class="col-lg-12 mt-5 mt-lg-0">

                        <form class="form-horizontal" method="post" action="super.php" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-lg-5 control-label" style="color:#000000;" for="textArea"></label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control" id="textArea" rows="3" name="desc" placeholder="kritik dan saran ..."></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="textArea"></label>
                                    <div style="margin-left:35%" class="col-lg-4">
                                        <input type="submit" name="encrypt_now" value="Submit" class="form-control btn btn-default" style="background-color:#34b7a7; color:#fff">
                                    </div>
                                </div>
                            </fieldset>
                        </form>

                    </div>

                </div>

            </div>
    </section>

    <!-- Section Super Enkripsi End -->


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