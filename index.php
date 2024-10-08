<?php
include "demo.galeribukujakarta.com/admin/koneksi.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Buku Jakarta</title>

    <link rel="shortcut icon" href="../img/LOGO.jpeg" type="image/x-icon">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="demo.galeribukujakarta.com/user/assets/css/footer.css">
    <link rel="stylesheet" href="demo.galeribukujakarta.com/user/assets/css/header.css">
    <link rel="stylesheet" href="demo.galeribukujakarta.com/user/assets/css/style.css">
    <link rel="stylesheet" href="demo.galeribukujakarta.com/user/assets/css/responsive.css">
    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro@4cac1a6/css/all.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- nav -->
    <?php
    header("Cache-Control: no-cache, must-revalidate");
    ?>

    <header id="header">
        <div class="container">
            <div class="ms">
                <div class="container">
                    <div class="section">
                        <h3>SECTION</h3>
                        <div class="listSection">
                            <ul>
                                <li><a href="?index.php">Home</a></li>
                                <li><a href=".?page=katankota">Kata & Kota</a></li>
                                <li><a href=".?page=fiksinpuisi">Fiksi & Puisi</a></li>
                                <li><a href=".?page=buku">Buku</a></li>

                            </ul>
                            <ul>
                                <li><a href=".?page=pemikiran">Pemikiran</a></li>
                                <li><a href=".?page=coffeeshophia">Coffeesophia</a></li>
                                <li><a href=".?page=writingTips">Writing Tips</a></li>
                                <li><a href=".?page=inspirasi   ">Inspirasi</a></li>
                            </ul>
                            <ul>
                                <li><a href="https://www.thejakartapost.com/life/2019/11/26/memikirkan-kata-deciphers-one-of-the-greatest-writing-conundrums-producing-words.html">Memikirkan Kata</a></li>
                                <li><a href="https://books.google.co.id/books/about/Siapakah_Jakarta.html?id=54rPEAAAQBAJ&redir_esc=y">Siapakah Jakarta</a></li>
                                <li><a href="">Submisi</a></li>
                                <li><a href="">Kontak</a></li>
                            </ul>
                            <div class="small">
                                <?php
                                $sql = "SELECT * FROM tb_coffeesophia ORDER BY no_coffeesophia DESC LIMIT 2";
                                $q = mysqli_query($k, $sql);
                                while ($r = mysqli_fetch_assoc($q)) {
                                ?>
                                    <div class="content">
                                        <div class="img" style="background: url(demo.galeribukujakarta.com/img/<?= $r['gambar'] ?>);background-size:cover;background-position:center;"></div>
                                        <h3><?= $r['judul'] ?></h3>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="printEdition">
                        <h3>BUKU KAMI</h3>
                        <div class="large">
                            <div class="img" style="background: url(demo.galeribukujakarta.com/img/buku3.png);background-size:cover;background-position:center;"></div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="toggle">
                <input type="checkbox" name="toggle-nav" id="">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="logo">
                <a href="?page=beranda" class="logoImg"><img src="demo.galeribukujakarta.com/img/LOGO.jpeg" alt=""></a>
            </div>
            <ul class="desk">
                <li style="font-family: '72 Black';" class="mega">ALL <i class="fal fa-angle-down"></i>
                </li>
                <li><a href="">Populer</a></li>
                <li><a href="">Latest</a></li>
                <li><a href="">Magazine</a></li>
            </ul>
            <div class="akun">
                <a href="">Sign Up</a>
                <a href="">Subscribe</a>
            </div>
            <div class="reNav">
                <div class="container">
                    <div class="row" style="display:flex;width:100%;border-top:1px solid rgba(255,255,255,.2);padding:20px 0px;">
                        <form action="" method="get" style="width: 100%;display:flex;justify-content:space-between;">
                            <input type="text" class="inputSearch" name="search" style="padding:3px 5px 3px 10px;width:80%;">
                            <button type="submit" class="btnCari" name="cari" style="padding:3px 5px 3px 5px;background:transparent;border:none;"><i class="fal fa-search" style="color: white;"></i></button>
                        </form>
                    </div>
                    <div class="row" style="display:flex;width:100%;border-top:1px solid rgba(255,255,255,.2);padding:20px 0px;">
                        <style>
                            .reNavOl li {
                                font-size: 14px;
                            }

                            .reNavOl li a {
                                color: white;
                                text-decoration: none;
                            }
                        </style>
                        <ol class="reNavOl" style="color: white;display:flex;list-style-type:none;justify-content:end;width:100%;gap:20px;">
                            <li><a href="">Popular</a></li>
                            <li><a href="">Latest</a></li>
                            <li><a href="">Newsletters</a></li>
                        </ol>
                    </div>
                    <h3 style="color: red; padding:20px 0px;border-top:1px solid rgba(255,255,255,.2);width:100%;">Section </h3>
                    <ul>
                        <div class="col" style="width: 50%;">
                            <li><a href="?index.php">Home</a></li>
                            <li><a href="">Popular</a></li>
                            <li><a href="">Latest</a></li>
                            <li><a href="">News Letters</a></li>
                            <li><a href="">News Letters</a></li>
                            <li><a href="">News Letters</a></li>
                            <li><a href="">News Letters</a></li>

                        </div>
                        <div class="col" style="width: 50%;">
                            <li><a href="?index.php"></i>Home</a></li>
                            <li><a href="">Popular</a></li>
                            <li><a href="">Latest</a></li>
                            <li><a href="">News Letters</a></li>
                            <li><a href="">News Letters</a></li>
                            <li><a href="">News Letters</a></li>
                            <li><a href="">News Letters</a></li>
                        </div>
                    </ul>
                </div>
                <div style="margin-top:auto;width:100%;border-top:2px solid rgba(255,255,255,.3);padding:20px 0px;display:flex;justify-content:center;position:relative;">
                    <!-- button close 
                        DISINI!!!-->
                    <button style="background:transparent;border:none;color:white;position:absolute;right:15px;top:15px;"><i class="fal fa-close"></i></button>
                    <!-- /buttonClose -->
                    <h5 style="padding: 5px 0px 5px 0px;border-bottom:2px solid red;width:fit-content;color:white;text-align:center;">Subscribe for unlimited access</h5>
                </div>
            </div>
        </div>
    </header>
    <main>
        <?php
        $page = @$_GET['page'];
        $beranda = "demo.galeribukujakarta.com/user/page/beranda.php";
        $p = "demo.galeribukujakarta.com/user/page/$page.php";
        if (!empty($page) && file_exists($p)) {
            include "$p";
        } else {
            include "$beranda";
        }
        ?>
    </main>
    <!-- footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="sosmed">
                    <a href="https://x.com/galeribuku_jkt" target="_blank">
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>
                    <a href="https://www.facebook.com/galeribukujakarta.inc/" target="_blank">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="https://www.instagram.com/galeribuku_jkt/" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.youtube.com/watch?v=5yFM647bup4" target="_blank">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
                <ul class="about">
                    <li><a href=".?page=about">Tentang</a>
                        <a href="">Majalah</a>
                        <a href="">Penerbitan</a>
                    </li>
                    <li><a href=".?page=redaksi">Redaksi</a>
                        <a href="">Advertising</a>
                        <a href="https://www.tokopedia.com/galeribukujakarta">Marchandise</a>
                    </li>
                    <li><a href=".?page=memikirkan">Submisi</a>
                        <a href=".?page=siapakahjkt">Siapakah Jakarta</a>
                        <a href="">Kontak</a>
                    </li>
                    <li><a href=".?page=sponsor">Sponsor</a>
                        <a href=".?page=submission">Memikirkan Kata</a>
                        <a href="">Karir</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <img src="demo.galeribukujakarta.com/img/footer2.png" alt="">
            </div>
            <div class="row">
                <a href="">©2024 GALERI BUKU JAKARTA</a>
                <a href="">PRIVACY POLICY</a>
                <a href="">TERMS & CONDITIONS</a>
            </div>
        </div>
    </footer>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="demo.galeribukujakarta.com/user/assets/js/main.js"></script>
    <script>
        AOS.init();

        const mega = document.querySelector('.mega')
        const logoImg = document.querySelector('.logoImg')
        const ms = document.querySelector('.ms')
        const megaIkon = mega.querySelector('i')
        const toggle = document.querySelector('.toggle input')
        const reNav = document.querySelector('.reNav')

        toggle.addEventListener('click', function() {
            reNav.classList.toggle('navRight')
            if (reNav.classList.contains('navRight')) {
                logoImg.style.display = "none";
            } else {
                logoImg.style.display = "block";

            }
        })


        mega.addEventListener('click', function() {
            ms.classList.toggle('d')
            megaIkon.classList.toggle('fa-angle-down')
            megaIkon.classList.toggle('fa-times')
        })
    </script>
</body>

</html>