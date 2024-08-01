    
    <section id="head">
        <div class="container">
            <div class="slide">
            <?php
                $sql = "SELECT * FROM tb_artikel ORDER BY no_artikel DESC LIMIT 3";
                $q = mysqli_query($k, $sql);
                while ($r = mysqli_fetch_assoc($q)) {
            ?>
                <div class="item" style="background-image: url('demo.galeribukujakarta.com/img/<?=$r['gambar']?>');">
                    <div class="content">
                        <a style="font-family: '72 Black';" class="name" href="?page=artikel-detail&no_artikel=<?=$r['no_artikel']?>"><?=$r['judul_artikel']?></a>
                    </div>
                </div>
            <?php 
                }
            ?>
            </div>
        <div class="button">
            <a  class="prev previous round">&#8249;</a>
            <a  class="next round">&#8250;</a>
        </div>
        </section>
    <!-- content -->
    <section id="content">
        <div class="row">
            <ul>
                <li><a style="font-family: '72 Condensed';" href=".?index.php">Home</a></li>
                <li><a style="font-family: '72 Condensed';" href="?page=buku">Buku</a></li>
                <li><a style="font-family: '72 Condensed';" href="?page=fiksinpuisi">Fiksi & Puisi</a></li>
                <li><a style="font-family: '72 Condensed';" href="?page=inspirasi">Gairah</a></li>
                <li><a style="font-family: '72 Condensed';" href="?page=pemikiran">Pemikiran</a></li>
                <li><a style="font-family: '72 Condensed';" href="?page=coffeeshophia">Coffeesophia</a></li>
                <li><a style="font-family: '72 Condensed';" href="?page=writingTips">Writing Tips</a></li>
                <li><a style="font-family: '72 Condensed';" href="?page=inspirasi">Inspirasi</a></li>
                <li><a style="font-family: '72 Condensed';" href="?page=inspirasi">Jakarta+</a></li>
                <li><a style="font-family: '72 Condensed';" href="?page=katankota">Kata & Kota</a></li>
            </ul>
        </div>
        <div class="row">
            <?php
            $sql1 = "SELECT * FROM tb_fiksi ORDER BY no_fiksi DESC limit 1";
            $q1 = mysqli_query($k,$sql1);
            if ($q1 && mysqli_num_rows($q1) > 0) {
            
                while ($r1 = mysqli_fetch_assoc($q1)){
            ?>
            <div class="col">
                <img src="demo.galeribukujakarta.com/img/<?=$r1['gambar']?>" style="width:100%;" alt="">
            </div>
            <div class="col">
                <a href="?page=fiksi-detail&no_fiksi=<?=$r1['no_fiksi']?>">
                <h3 style="font-family: '72 Black';"><?=$r1['kutipan']?></h3>
                <p style="font-family: '72 Condensed';">by <?=$r1['penulis']?></p>
                </a>
            </div>
            <?php 
                    }
                }
            ?>
        </div>
        <div class="row">
            <div class="col">
                <h3 style="font-family: '72 Condensed';"><a href="?page=katankota">Kata & Kota</a></h3>
            </div>
            <div class="col">
            <?php
            $sql2 = "SELECT * FROM tb_kata ORDER BY no_kata DESC LIMIT 4";
            $q2 = mysqli_query($k,$sql2);
            if ($q2 && mysqli_num_rows($q2) > 0) {
            
                while ($r2 = mysqli_fetch_assoc($q2)){
            ?>
                <div class="content">
                    <a href="?page=kata-detail&no_kata=<?=$r2['no_kata']?>">
                    <img src="demo.galeribukujakarta.com/img/<?=$r2['gambar']?>" alt="deskripsi_gambar">
                    <h3 style="font-family: '72 Black';" ><?=$r2['judul']?></h3>
                    <p style="font-family: '72 Condensed'; color:#b70d0f;"><?=$r2['penulis']?></p>
                    </a>
                </div>
            <?php
                }
            }
            ?>
            </div>
        </div>
    </section>
    <!-- review book -->
    <section id="review">
        <div class="container">
            <div class="row">
                <h3 style="font-family: '72 Condensed';"><a href="?page=buku">The Review Book</a></h3>
            </div>
            <div class="row">
            <?php
            $query_new = "SELECT * FROM tb_buku ORDER BY no_buku DESC LIMIT 1"; // Mengambil data terbaru
            $result_new = mysqli_query($k, $query_new); // Eksekusi kueri
            
            // Ambil data lama
            $query_old = "SELECT * FROM tb_buku WHERE no_buku != (SELECT MAX(no_buku) FROM tb_buku) limit 3"; // Mengambil data selain data terbaru
            $result_old = mysqli_query($k, $query_old); // Eksekusi kueri
            
            if ($result_new && mysqli_num_rows($result_new) > 0) {
                // Jika ada data terbaru, tampilkan data tersebut
                while ($row = mysqli_fetch_assoc($result_new)) {
            
            ?>
                <div class="col">
                    <div class="desc">
                    <a href="?page=buku-detail&no_buku=<?=$row['no_buku']?>" style="text-decoration: none;color:#000000;">
                        <h3 style="font-family: '72 Black';" ><?=$row['judul']?></h3>
                        <p style="margin-bottom: 10px; max-height: calc(1.2em * 5); overflow: hidden; text-overflow: ellipsis; line-height: 1.2em; font-family:'7d Condensed';">
                            <?=$row['penjelasan']?>
                        </p>
                        <p style="font-family:'72 Condensed'; color:#b70d0f;">by <?=$row['penulis']?></p>
                    </a>
                    </div>
                    <img src="demo.galeribukujakarta.com/img/<?=$row['gambar']?>" alt="">
                </div>
                
                <div class="col">
                <?php 
                    }
                }
                
                if ($result_old && mysqli_num_rows($result_old) > 0) {
                    // Jika ada data lama, tampilkan data tersebut
                    while ($row = mysqli_fetch_assoc($result_old)) {
                    
                ?>
                    <div class="content">
                        <div class="desc">
                            <a href="?page=buku-detail&no_buku=<?=$row['no_buku']?>" style="text-decoration: none;color:#000000;">
                                <h6 style="font-family: '72 Black'; font-weight:bold;"><?=$row['judul']?></h6>
                                <p style="font-family:'72 Condensed';" >by <?=$row['penulis']?></p>
                            </a>
                        </div>
                        <img src="demo.galeribukujakarta.com/img/<?=$row['gambar']?>" alt="">
                    </div>
                <?php
                    }
                }
                ?>
                </div>
            </div>
        </div>
    </section>
    <section id="ysk">
        <div class="container">
            <div class="title">
                <h3><a href="?page=inspirasi">INSPIRASI</a></h3>
            </div>
            <div class="content">
            <?php
            $sql3 = "SELECT * FROM tb_inspirasi ORDER BY no_inspirasi DESC LIMIT 5";
            $q3 = mysqli_query($k,$sql3);
            if ($q3 && mysqli_num_rows($q3) > 0) {
            
                while ($r3 = mysqli_fetch_assoc($q3)){
            ?>
                <a href="?page=inspirasi-detail&no_inspirasi=<?=$r3['no_inspirasi']?>">
                    <div class="card" style="background: url('demo.galeribukujakarta.com/img/<?=$r3['gambar']?>');background-size:cover;background-position:center;">
                        <div class="desc">
                            <h3 style="font-family:'72 Condensed';" class="theme">Inspirasi</h3>
                            <h3 style="font-family:'72 Black';" class="card-title"><?=$r3['judul']?></h3>
                        </div>
                    </div>
                </a>

                <?php
                }
            }
            ?>
            </div>
        </div>
    </section>
    <script>
        let next = document.querySelector(".button .next")
        let prev = document.querySelector(".button .prev")
        next.addEventListener('click', function() {
            let items = document.querySelectorAll('.item')
            document.querySelector('.slide').appendChild(items[0])
        })
        prev.addEventListener('click', function() {
            let items = document.querySelectorAll('.item')
            document.querySelector('.slide').prepend(items[items.length - 1])
        })
        let interval = setInterval(function(){
            let items = document.querySelectorAll('.item')
            document.querySelector('.slide').appendChild(items[0])
        },6000)
    </script>