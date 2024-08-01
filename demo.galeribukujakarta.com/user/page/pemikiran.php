<?php
include 'demo.galeribukujakarta.com/admin/koneksi.php';

$query_head = "SELECT * FROM tb_pemikiran ORDER BY no_pemikiran DESC LIMIT 1";
$result_head = mysqli_query($k, $query_head);

$query_body = "SELECT * FROM tb_pemikiran ORDER BY no_pemikiran DESC LIMIT 5 OFFSET 1";
$result_body = mysqli_query($k, $query_body);

$query_footer = "SELECT * FROM tb_pemikiran ORDER BY no_pemikiran DESC LIMIT 5 OFFSET 6";
$result_footer = mysqli_query($k, $query_footer);

?>
<section id="knkhead">
    <div class="container">
        <div class="judul">
            <h3>Pemikiran</h3>
            <p>Membaca hanya melengkapi pikiran dengan bahan pengetahuan. Hanya dengan berpikir lah apa yang kita baca menjadi milik kita.—John Locke</p>
        </div>
        <div class="row">
            <div class="col">
                <?php
                mysqli_data_seek($result_head, 0); // Kembalikan penunjuk data ke awal
                while ($row_head = mysqli_fetch_assoc($result_head)) {
                    echo '
                    <div class="img" style="background: url(demo.galeribukujakarta.com/img/' . $row_head['gambar'] . ');background-size:cover;background-position:center;">
                      <a href="?page=pemikiran-detail&no_pemikiran=' . $row_head['no_pemikiran'] . '"></a>
                    </div>
                    <h1 class="news">artikel & Kota</h1>
                    <h3 class="title"><a href="?page=pemikiran-detail&no_pemikiran=' . $row_head['no_pemikiran'] . '">' . $row_head['judul'] . '</a></h3>';

                } ?>
            </div>
            
            <div class="col">
                <h3 class="judul2">SPOTLIGHT</h3>
                <div class="bungkusContent">
                    <?php
                    mysqli_data_seek($result_body, 0); // Kembalikan penunjuk data ke awal
                    while ($row_body = mysqli_fetch_assoc($result_body)) {
                        echo '
                        <div class="content">
                            <div class="desc">
                                <a href="?page=pemikiran-detail&no_pemikiran=' . $row_body['no_pemikiran'] . '" style="text-decoration: none;">
                                    <h3 class="tgl">' . explode(' ', $row_body['tanggal'])[0]  . '</h3>
                                    <h2>' . $row_body['judul'] . '</h2>
                                    <p>' . $row_body['penjelasan'] . '</p>
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
                    <a href="?page=pemikiran-detail&no_pemikiran=' . $row_footer['no_pemikiran'] . '" style="text-decoration: none;">
                    <img src="demo.galeribukujakarta.com/img/' . $row_footer['gambar'] . '" alt="">
                    </a>
                    <div class="desc">
                        <a href="?page=pemikiran-detail&no_pemikiran=' . $row_footer['no_pemikiran'] . '" style="text-decoration: none;">
                        <h3>' . $row_footer['judul'] . '</h3>
                        <p class="p">' . $row_footer['penjelasan'] . '</p>
                        </a>
                        <div class="detail">
                            <a href="?page=pemikiran-detail&no_pemikiran=' . $row_footer['no_pemikiran'] . '" style="text-decoration: none;">
                            <p>' . $row_footer['penulis'] . '</p>
                            <p>' . explode(' ', $row_body['tanggal'])[0]  . '</p>
                            </a>
                        </div>
                    </div>
                </div>';
                }
                ?>

            </div>
            <div class="col">
                <img src="demo.galeribukujakarta.com/img/shopee.jpg" alt="">
            </div>
        </div>
    </div>
</section>
