<?php
include 'demo.galeribukujakarta.com/admin/koneksi.php';

$query_head = "SELECT * FROM tb_kata ORDER BY no_kata DESC LIMIT 1";
$result_head = mysqli_query($k, $query_head);

$query_body = "SELECT * FROM tb_kata ORDER BY no_kata DESC LIMIT 5 OFFSET 1";
$result_body = mysqli_query($k, $query_body);

$query_footer = "SELECT * FROM tb_kata ORDER BY no_kata DESC LIMIT 5 OFFSET 6";
$result_footer = mysqli_query($k, $query_footer);

?>
<section id="knkhead">
    <div class="container">
        <div class="judul">
            <h3>Kata & Kota</h3>
            <p>Jakarta dibangun dengan kata-kata yang mudah disalah artikan. Sastra dan Pemikiran menjernihkannya. </p>
        </div>
        <div class="row">
            <div class="col">
                <?php
                mysqli_data_seek($result_head, 0); // Kembalikan penunjuk data ke awal
                while ($row_head = mysqli_fetch_assoc($result_head)) {
                    echo '
                    <div class="img" style="background: url(demo.galeribukujakarta.com/img/' . $row_head['gambar'] . ');background-size:cover;background-position:center;">
                      <a href="?page=kata-detail&no_kata=' . $row_head['no_kata'] . '"></a>
                    </div>
                    <h1 class="news">Kata & Kota</h1>
                    <h3 class="title"><a href="?page=kata-detail&no_kata=' . $row_head['no_kata'] . '">' . $row_head['judul'] . '</a></h3>';

                } ?>
            </div>
            
            <div class="col">
                <h3 class="judul2">POPULER</h3>
                <div class="bungkusContent">
                    <?php
                    mysqli_data_seek($result_body, 0); // Kembalikan penunjuk data ke awal
                    while ($row_body = mysqli_fetch_assoc($result_body)) {
                        echo '
                        <div class="content">
                            <div class="desc">
                                <a href="?page=kata-detail&no_kata=' . $row_body['no_kata'] . '" style="text-decoration: none;">
                                    <h3 class="tgl">' . $row_body['tanggal'] . '</h3>
                                    <h2>' . $row_body['judul'] . '</h2>
                                </a>
                            </div>
                            <img src="demo.galeribukujakarta.com/img/' . $row_body['gambar'] . '" alt="">
                        </div>
                        ';
                    }

                    ?>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php
                while ($row_footer = mysqli_fetch_assoc($result_footer)) {
                    echo '
                    <div class="stori">
                    <a href="?page=kata-detail&no_kata=' . $row_footer['no_kata'] . '" style="text-decoration: none;">
                    <img src="demo.galeribukujakarta.com/img/' . $row_footer['gambar'] . '" alt="">
                    </a>
                    <div class="desc">
                        <a href="?page=kata-detail&no_kata=' . $row_footer['no_kata'] . '" style="text-decoration: none;">
                        <h3>' . $row_footer['judul'] . '</h3>
                        <p class="p">' . $row_footer['penjelasan'] . '</p>
                        </a>
                        <div class="detail">
                            <a href="?page=kata-detail&no_kata=' . $row_footer['no_kata'] . '" style="text-decoration: none;">
                            <p>by ' . $row_footer['penulis'] . '</p>
                            </a>
                        </div>
                    </div>
                </div>';
                }
                ?>

            </div>
            <div class="col">
                <img src="demo.galeribukujakarta.com/img/sidebar.png" alt="">
            </div>
        </div>
    </div>
</section>
