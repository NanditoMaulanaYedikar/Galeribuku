<section id="artikel1">
    <div class="container">
        <div class="head">
            <?php
                $id1 = $_GET['no_mostpopular'];
                
                // Ambil nilai jumlah_dilihat dari database
                $sql_select = "SELECT jumlah_dilihat FROM tb_mostpopular WHERE no_mostpopular = '$id1'";
                $result = mysqli_query($k, $sql_select);
                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    $new_views = $row['jumlah_dilihat'] + 1;
                    
                    // Update nilai jumlah_dilihat
                    $sql_update = "UPDATE tb_mostpopular SET jumlah_dilihat = $new_views WHERE no_mostpopular = '$id1'";
                    mysqli_query($k, $sql_update);
                }

                $sql1 = "SELECT * FROM tb_mostpopular WHERE no_mostpopular='$id1' ORDER BY no_mostpopular DESC LIMIT 1";
                $q1 = mysqli_query($k, $sql1);
                if ($q1 && mysqli_num_rows($q1) > 0) {
                    while ($r1 = mysqli_fetch_assoc($q1)){
            ?>
            <div class="img" style="background: url('demo.galeribukujakarta.com/img/<?=$r1['gambar']?>');background-size:cover;"></div>
                <h3 class="desc">
                    <img src="demo.galeribukujakarta.com/img/logodesc.png" alt="Logo"> <?=$r1['deskripsi']?>
                </h3>
                <div class="waktu">
                    <p class="detail">Fiksi Dan Puisi</p>
                    <p class="tgl"><?=$r1['tanggal']?></p>
                    <p class="sponsor"><?=$r1['sponsor']?></p>
                </div>
                <h3 style="font-family: 'Bell MT';" class="title"><?=$r1['judul']?></h3>
                <p style="font-family: 'Bell MT';" class="lead"><?=$r1['sinopsis']?></p>
        </div>     
    </div>
    <div class="container">
        <div class="paragraf">
            <div class="row">
                <div class="sosmed">
                    <a href=""><i class="fab fa-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-x-twitter"></i></a>
                    <a href=""><i class="fab fa-facebook-f"></i></i></a>
                </div>
                <div class="bookmark">
                    <a href=""><i class="fal fa-bookmark"></i></a>
                </div>
            </div>
            <div class="row">
                <h3 style="font-family: '72 Condensed';" class="penulis">By <a href=""></a><?=$r1['penulis']?></h3>
                <p style="font-family: 'Bell MT';"> <?= nl2br($r1['penjelasan']) ?></p>
            </div>
    
        </div>
        
        <div class="adv">
            <!-- <div class="iklan">
                <img src="demo.galeribukujakarta.com/img/f6.jpg" alt="">
            </div> -->
            <div class="mostPopular">
                <h3 class="judul">MOST POPULAR</h3>
                <!--5 content  -->
                <?php
                      }
                    }
                    $sql = "SELECT * FROM tb_mostpopular ORDER BY no_mostpopular DESC LIMIT 7";
                    $q = mysqli_query($k, $sql);
                    while ($r = mysqli_fetch_assoc($q)) {
                    ?>
                <a href="?page=mostpopular-detail&no_mostpopular=<?=$r['no_mostpopular']?>" style="text-decoration: none; color: inherit;">
                    <div class="content">
                        <div class="img" style="background: url(demo.galeribukujakarta.com/img/<?=$r['gambar']?>); background-size: cover; background-position: center;"></div>
                        <div class="desc">
                            <h3 class="tipe"><?=$r['jenisrubrik']?></h3>
                            <p class="title"><?=$r['judul']?></p>
                        </div>
                    </div>
                </a>

                <?php 
                    }
                ?>
            </div>
        </div>
    </div>
</section>

<script>
    // Ambil elemen dengan kelas 'article-meta'
    const articleMeta = document.querySelector('.tgl');

    if (articleMeta) {
        // Ambil teks dari elemen
        const dateText = articleMeta.textContent;

        // Konversi teks menjadi objek Date
        const date = new Date(dateText);

        // Fungsi untuk memformat tanggal sesuai kebutuhan
        function formatDate(date) {
            const months = [
                "January", "February", "March", "April", "May", "June", 
                "July", "August", "September", "October", "November", "December"
            ];
            const month = months[date.getMonth()];
            const day = date.getDate();
            const year = date.getFullYear();
            let hours = date.getHours();
            const minutes = date.getMinutes().toString().padStart(2, '0');
            const ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // Jam '0' harus menjadi '12'

            return `${month}, ${day}, ${year}`;
        }

        // Format tanggal dan waktu
        const formattedDate = formatDate(date);

        // Tampilkan hasil dalam elemen
        articleMeta.textContent = formattedDate;
    } else {
        console.log("Element '.article-meta' tidak ditemukan.");
    }
</script>
