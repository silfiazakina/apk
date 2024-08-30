<?php
session_start();
include "database/koneksi.php";
include "assets/auth.php";

// Inisialisasi koneksi database dan objek Auth
$pdo = koneksi::connect();
$auth = Auth::getInstance($pdo);

// Cek apakah pengguna sudah login
if (!$auth->isLoggedIn()) {
    $login = isset($_GET['auth']) ? $_GET['auth'] : 'auth';
    switch ($login) {
        case 'login':
            include 'auth/login.php';
            break;
        case 'register':
            include 'auth/register.php';
            break;
        case 'forgot-password':
            include 'auth/forgot-password.php';
            break;
        default:
            include 'auth/login.php';
            break;
    }
} else {

    if (isset($_GET['page']) && $_GET['page'] === 'logout') {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
            session_destroy();
            header("Location: index.php");
            exit(); // Pastikan untuk menghentikan eksekusi setelah redirect
        }
        include('page/user/logout.php');
    } else {
        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
            <title>Kasir ama</title>
            <?php include 'layouts/load_css.php'; ?>
        </head>

        <body>
            <?php include("layouts/header.php"); ?>

            <div class="main-content">
                <section class="section">

                    <?php
                    $page = isset($_GET["page"]) ? $_GET["page"] : 'dashboard';
                    switch ($page) {

                        case 'anggota':
                            include('page/anggota/default.php');
                            break;

                        case 'peg awai':
                            include('page/pegawai/default.php');
                            break;

                        case 'peminjaman':
                            include('page/peminjaman/default.php');
                            break;

                        case 'buku':
                            include('page/buku/default.php');
                            break;

                        case 'penerbit': 
                            include('page/penerbit/default.php');
                            break;

                        case 'pengarang':
                            include('page/pengarang/index.php');
                            break;

                        case 'pengembalian':
                            include('page/pengembalian/index.php');
                            break;

                        default:
                            include('page/dashboard/index.php');
                    }
                    ?>

                </section>
            </div>

            <!-- General JS Scripts -->
            <?php
            include 'layouts/footer.php ';
            include("layouts/load_js.php");
            ?>
        </body>

        </html>

        <?php
    }
}
?>
