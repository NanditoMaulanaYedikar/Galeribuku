<?php
include 'demo.galeribukujakarta.com/admin/koneksi.php';

$query_head = "SELECT * FROM tb_jktplus ORDER BY no_jktplus DESC LIMIT 4";
$result_head = mysqli_query($k, $query_head);

$query_body = "SELECT * FROM tb_jktplus ORDER BY no_jktplus DESC LIMIT 4 OFFSET 4";
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
                                <h3>coffeeshophia</h3>
                                <p><a href="?page=jktplus-detail&no_jktplus=' . $row_head['no_jktplus'] . '">' . $row_head['judul'] . '</a></p>
                            </li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="body">
            <div class="isi">
                <div class="row">
                    <h3>ALL STORIES</h3>
                </div>
                <div class="row">
                    <div class="artikel">
                        <?php
                        while ($row_body = mysqli_fetch_assoc($result_body)) {
                            echo '<div class="content border">
                                    <div class="desc">
                                        <h1>Coffeeshophia</h1>
                                        <h3><a href="?page=jktplus-detail&no_jktplus=' . $row_body['no_jktplus'] . '">' . $row_body['judul'] . '</a></h3>
                                        <p><a href="?page=jktplus-detail&no_jktplus=' . $row_body['no_jktplus'] . '">' . $row_body['penjelasan'] . '</a></p>
                                    </div>
                                    <img src="demo.galeribukujakarta.com/img/' . $row_body['gambar'] . '" alt="">
                                  </div>';
                        }
                        ?>
                    </div>
                    <div class="iklan">
                        <img src="demo.galeribukujakarta.com/img/off.jpg" alt="">
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
