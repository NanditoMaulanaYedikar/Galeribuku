<!-- Half Image -->
<section id="artikel2">
    <div class="container">
    <?php
        $id1 = $_GET['no_kata'];
        
        // Ambil nilai jumlah_dilihat dari database
        $sql_select = "SELECT jumlah_dilihat FROM tb_kata WHERE no_kata = '$id1'";
        $result = mysqli_query($k, $sql_select);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $new_views = $row['jumlah_dilihat'] + 1;
            
            // Update nilai jumlah_dilihat
            $sql_update = "UPDATE tb_kata SET jumlah_dilihat = $new_views WHERE no_kata = '$id1'";
            mysqli_query($k, $sql_update);
        }

        $sql1 = "SELECT * FROM tb_kata WHERE no_kata='$id1' ORDER BY no_kata DESC LIMIT 1";
        $q1 = mysqli_query($k, $sql1);
        if ($q1 && mysqli_num_rows($q1) > 0) {
            while ($r1 = mysqli_fetch_assoc($q1)){
    ?>
    <div class="header">
        <h2>Kata & Kota</h2>
        <h1><?= htmlspecialchars($r1['judul'], ENT_QUOTES, 'UTF-8') ?></h1>
    </div>
    <div class="image-wrapper">
        <img src="demo.galeribukujakarta.com/img/<?= htmlspecialchars($r1['gambar'], ENT_QUOTES, 'UTF-8') ?>" alt="Image" class="image">
    </div>
    <div class="image-caption">
        <img src="demo.galeribukujakarta.com/img/logodesc.png" alt="Logo"> 
        <span class="description"><?=$r1['deskripsi']?></span>
    </div>

    <hr class="long-line">
    <div class="meta-wrapper">
        <div class="article-meta"><?= htmlspecialchars($r1['tanggal'], ENT_QUOTES, 'UTF-8') ?></div>
        <div class="share-save">
            <a href="#" class="share-save-link"><img src="demo.galeribukujakarta.com/img/share.png" alt="Share"> SHARE</a>
            <a href="#" class="share-save-link"><img src="demo.galeribukujakarta.com/img/save.webp" alt="Save"> SAVE</a>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="related-articles">
            <h3>INSIGHT</h3>
            <hr class="long-line-related">
            <?php
            $sql = "SELECT * FROM tb_artikel ORDER BY no_artikel DESC LIMIT 7";
            $q = mysqli_query($k, $sql);
            if ($q) {
                while ($row = mysqli_fetch_assoc($q)) {
            ?>
            <p><a href="?page=artikel-detail&no_artikel=<?=$row['no_artikel']?>"><?= htmlspecialchars($row['judul_artikel'], ENT_QUOTES, 'UTF-8') ?></a></p>
            <hr class="long-line-related">
            <?php
                }
            }
            ?>
        </div>
        <div class="content">
            <div class="author">By <?= htmlspecialchars($r1['penulis'], ENT_QUOTES, 'UTF-8') ?></div>
            <p><?php
                $penjelasan = nl2br(htmlspecialchars_decode($r1['penjelasan']));
                echo $penjelasan;
            ?></p>                    
        </div>
    </div>
    <?php
            }
        }
    ?>
    </div>
</section>
<section id="readmore">
    <div class="container">
        <div class="slider">
        <?php
            $id1 = $_GET['no_kata']; // Nomor artikel yang sedang ditampilkan

            // Query untuk mengambil artikel berdasarkan jumlah dilihat, kecuali yang sedang ditampilkan
            $sql_slider = "SELECT * FROM tb_kata WHERE no_kata != '$id1' ORDER BY jumlah_dilihat DESC";
            $q_slider = mysqli_query($k, $sql_slider);

            while ($r_slider = mysqli_fetch_assoc($q_slider)) {
            ?>
            <div class="slide">
                <a href="?page=kata-detail&no_kata=<?=$r_slider['no_kata']?>">
                    <img src="demo.galeribukujakarta.com/img/<?=$r_slider['gambar']?>" alt="A Quiet Place: Day One">
                    <h3><?=$r_slider['judul']?></h3>
                </a>
            </div>
            <?php
            }
            ?>

        </div>
    </div>
    <button id="prev">Previous</button>
    <button id="next">Next</button>
</section>
<script>
    // Ambil elemen dengan kelas 'article-meta'
    const articleMeta = document.querySelector('.article-meta');

    if (articleMeta) {
        // Ambil teks dari elemen
        const dateText = articleMeta.textContent;

        // Konversi teks menjadi objek Date
        const date = new Date(dateText);

        // Fungsi untuk memformat tanggal sesuai kebutuhan
        function formatDate(date) {
            const months = [
                "JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE", 
                "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"
            ];
            const month = months[date.getMonth()];
            const day = date.getDate();
            const year = date.getFullYear();
            let hours = date.getHours();
            const minutes = date.getMinutes().toString().padStart(2, '0');
            const ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // Jam '0' harus menjadi '12'

            return `${month} ${day}, ${year}, ${hours}:${minutes} ${ampm}`;
        }

        // Format tanggal dan waktu
        const formattedDate = formatDate(date);

        // Tampilkan hasil dalam elemen
        articleMeta.textContent = formattedDate;
    } else {
        console.log("Element '.article-meta' tidak ditemukan.");
    }
</script>