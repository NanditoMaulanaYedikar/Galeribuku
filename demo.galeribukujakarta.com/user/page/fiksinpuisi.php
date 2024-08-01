<?php
include 'demo.galeribukujakarta.com/admin/koneksi.php';

$query_head = "SELECT * FROM tb_fiksi ORDER BY no_fiksi DESC LIMIT 4";
$result_head = mysqli_query($k, $query_head);

$query_body = "SELECT * FROM tb_fiksi ORDER BY no_fiksi DESC LIMIT 4 OFFSET 4";
$result_body = mysqli_query($k, $query_body);
?>

<section id="fiksinpuisi">
    <div class="container">
        <div class="head">
            <div class="slider2">
                <?php
                while ($row_head = mysqli_fetch_assoc($result_head)) {
                    echo '<div class="img" style="background:url(demo.galeribukujakarta.com/img/' . $row_head['gambar'] . ');background-size:cover;background-position:center;"></div>';
                }
                ?>
            </div>
            <div class="desc">
                <ul>
                    <?php
                    mysqli_data_seek($result_head, 0); // Kembalikan penunjuk data ke awal
                    while ($row_head = mysqli_fetch_assoc($result_head)) {
                        echo '<li>
                                <h3>Fiksi & Puisi</h3>
                                <p><a href="?page=fiksi-detail&no_fiksi=' . $row_head['no_fiksi'] . '">' . $row_head['kutipan'] . '</a></p>
                            </li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="body">
            <div class="isi">
                <div class="row">
                    <h3 style="font-family: '72 Black';">ALL STORIES</h3>
                </div>
                <div class="row">
                    <div class="artikel">
                        <?php
                        while ($row_body = mysqli_fetch_assoc($result_body)) {
                            echo '<div class="content border">
                                    <div class="desc">
                                        <h1>Fiksi & Puisi</h1>
                                        <h3><a href="?page=fiksi-detail&no_fiksi=' . $row_body['no_fiksi'] . '">' . $row_body['kutipan'] . '</a></h3>
                                        <p><a href="?page=fiksi-detail&no_fiksi=' . $row_body['no_fiksi'] . '">' . $row_body['penjelasan'] . '</a></p>
                                    </div>
                                    <img src="demo.galeribukujakarta.com/img/' . $row_body['gambar'] . '" alt="">
                                  </div>';
                        }
                        ?>
                    </div>
                    <div class="iklan">
                        <img src="demo.galeribukujakarta.com/img/a1.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<script>
    const li = document.querySelectorAll("#fiksinpuisi .container .head .desc ul li");
    const imgfnp = document.querySelectorAll("#fiksinpuisi .container .head .slider2 .img");

    li.forEach((item, index) => {
        item.addEventListener('mouseover', function () {
            imgfnp.forEach((img, i) => {
                if (i === index) {
                    img.style.opacity = "100";
                    li[i].classList.add("lihover");
                } else {
                    img.style.opacity = "0";
                    li[i].classList.remove("lihover");
                }
            });
        });
    });

    function lfnp() {
        imgfnp[0].style.opacity = "100";
        li[0].classList.add("lihover");
        setTimeout(function () {
            imgfnp[0].style.opacity = "0";
            imgfnp[1].style.opacity = "100";
            li[0].classList.remove("lihover");
            li[1].classList.add("lihover");
        }, 5000);
        setTimeout(function () {
            imgfnp[1].style.opacity = "0";
            imgfnp[2].style.opacity = "100";
            li[1].classList.remove("lihover");
            li[2].classList.add("lihover");
        }, 10000);
        setTimeout(function () {
            imgfnp[2].style.opacity = "0";
            imgfnp[0].style.opacity = "100";
            li[2].classList.remove("lihover");
            li[0].classList.add("lihover");
        }, 15000);
    }
    setInterval(lfnp, 15000);
    lfnp();
</script>
