<section id="redaksi" data-aos="fade-up" data-aos-duration="1500">
        <div class="row" data-aos="fade-up" data-aos-duration="1500">
            <div class="content" data-aos="fade-up">
                <div class="text">
                    <h3>Values & Strategic Plan Highlight</h3>
                    <p>Kami percaya pada kemandirian dan voluntarisme sebagai cara menjaga kejernihan dan keberpihakan yang penuh pada kemanusian serta tahapan kemajuan sosial yang transofrmatif. Sehingga kami ingin bekerja dengan semua kalangan dalam batas nilai yang kami pegangi tersebut; juga upaya untuk tetap bebas dari penilain-penilai kanonisasi kebudayaan—maka seperti telah berlangsung dalam 10 tahun perjalanan Galeri Buku Jakarta, kami akan terus bekerja dengan para penulis baru mau pun telah lama bekerja, muda mau pun tua; laki-laki mau pun perempuan dalam semua lintasan nilai dan religiusitas masing-masing.</p>
                    <p>Sebagai tambahan, dalam tiga tahun mendatang kami akan berfokus pada kerja kolaborasi berbasis voluntarisme dan dukungan publik independent dalam kerja kolektif bersama para penulis/ sastrawan dan komunitas kreatif dari para pembaca dan pecinta sastra dengan (i) Sharing dan Kolaborasi (ii) Ruang dan akses adil untuk semua (iii) Keragaman dan Kelintasan. (iiii) Untuk Tumbuh dan Inovatif.</p>
                    <a href="#">VIEW ALL STRATEGIC PLAN HIGHLIGHT</a>
                </div>

                <div class="image">
                <?php
                    $image_path = 'demo.galeribukujakarta.com/img/aboutbuku.png';
                    $img2 = 'demo.galeribukujakarta.com/img/aboutbuku2.png';
                    if(file_exists($image_path)) {
                        echo '<img src="'.$image_path.'" alt="Tulisan Image">';
                        echo '<img src="'.$img2.'" alt="Tulisan Image">';
                    } else {
                        echo 'Gambar tidak ditemukan';
                    }
                ?>
                </div>
            </div>
        </div>
        <div class="row">
            <h3>Editorial Team</h3>
            <p>Galeri Buku Jakarta dan Tim Editorial di dalamnya selalu memiliki misi ganda: untuk mempromosikan penulis yang paling menarik dan untuk mendukung pembaca yang ambisius dan ingin tahu.</p>
        </div>
        <div class="row">
            <div class="kolom" data-aos="fade-left" data-aos-duration="1000">
                <div class="image">
                    <?php
                        $image_path = 'demo.galeribukujakarta.com/img/shabiq.png';
                        if(file_exists($image_path)) {
                            echo '<img src="'.$image_path.'" alt="Tulisan Image">';
                        } else {
                            echo 'Gambar tidak ditemukan';
                        }
                    ?>
                </div>
                <div class="text">
                    <h2>Shabiq Charabest</h2>
                    <h1>Pendiri & Editor</h1>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Debitis perspiciatis numquam aliquam nemo, distinctio eos placeat deserunt maiores, ut quia nobis. Vel illum quidem earum ab maiores asperiores libero in.</p>
                </div>
            </div>
            <div class="kolom" data-aos="fade-up" data-aos-duration="1000">
                <div class="image">
                    <?php
                        $image_path = 'demo.galeribukujakarta.com/img/habibi.png';
                        if(file_exists($image_path)) {
                            echo '<img src="'.$image_path.'" alt="Tulisan Image">';
                        } else {
                            echo 'Gambar tidak ditemukan';
                        }
                    ?>
                </div>
                <div class="text">
                    <h2>Zaenul Habibi</h2>
                    <h1>Support Team</h1>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Debitis perspiciatis numquam aliquam nemo, distinctio eos placeat deserunt maiores, ut quia nobis. Vel illum quidem earum ab maiores asperiores libero in.</p>
                </div>
            </div>
            <div class="kolom" data-aos="fade-right" data-aos-duration="10  00">
                <div class="image">
                    <?php
                        $image_path = 'demo.galeribukujakarta.com/img/siwi.png';
                        if(file_exists($image_path)) {
                            echo '<img src="'.$image_path.'" alt="Tulisan Image">';
                        } else {
                            echo 'Gambar tidak ditemukan';
                        }
                    ?>
                </div>
                <div class="text">
                    <h2>Siwika</h2>
                    <h1>Developer</h1>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Debitis perspiciatis numquam aliquam nemo, distinctio eos placeat deserunt maiores, ut quia nobis. Vel illum quidem earum ab maiores asperiores libero in.</p>
                </div>
            </div>
        </div>
</section>