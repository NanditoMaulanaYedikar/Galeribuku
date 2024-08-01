<?php
include "koneksi.php";
$id = $_GET['id'];
$sql = "SELECT * FROM tb_pemikiran WHERE no_pemikiran = '$id'";
$q = mysqli_query($k, $sql);
$r = mysqli_fetch_assoc($q);
?>
<h3 class="mt-4">Form Pemikiran</h3>
<hr>
<style>
    .bold-button {
        padding: 5px 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        margin-left: 5px;
    }
</style>

<form method="post" action="" enctype="multipart/form-data">
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="form-floating mb-3 mb-md-0">
                <input name="txtjudul" value="<?=$r['judul']?>" class="form-control" type="text" placeholder="Masukkan Judul" />
                <label for="inputFirstName">Judul Buku</label>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="form-floating mb-3 mb-md-0">
                <input name="txtsinopsis" value="<?=$r['sinopsis']?>" class="form-control" type="text" placeholder="Masukkan Sinopsis" />
                <label for="inputFirstName">Sinopsis</label>
            </div>
        </div>
    </div>
    <div class="form-floating mb-3">
        <div class="form-group">
            <textarea id="txtisi" name="txtisi" class="form-control" rows="5"><?=$r['penjelasan']?></textarea>
            <label>Isi</label>
            <button type="button" class="bold-button" onclick="toggleBold('txtisi')">Bold</button>
            <button type="button" class="bold-button" onclick="toggleItalic('txtisi')">Italic</button>
            <button type="button" class="bold-button" onclick="insertLink('txtisi')">Masukkan link</button>
        </div>
    </div>
    <div class="form-floating mb-3">
        <input name="txtgambar" class="form-control" type="file"/>
        <img src="../img/<?=$r['gambar']?>" alt="" width="100" height="100">
        <label>Gambar</label>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="form-floating mb-3 mb-md-0">
                <input name="txtdeskripsi" value="<?=$r['deskripsi']?>" class="form-control" type="text" placeholder="Masukkan Deskripsi Gambar" />
                <label for="inputFirstName">Deskripsi</label>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input name="txttanggal" value="<?=explode(' ', $r['tanggal'])[0]?>" class="form-control" type="date" placeholder="Masukkan Tanggal" />
                <label for="inputFirstName">Tanggal</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input name="txtwaktu" value="<?=explode(' ', $r['tanggal'])[1]?>" class="form-control" type="time" placeholder="Masukkan Waktu" />
                <label for="inputFirstName">Waktu</label>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="form-floating mb-3 mb-md-0">
                <input name="txtpenulis" value="<?=$r['penulis']?>" class="form-control" type="text" placeholder="Masukkan Penulis" />
                <label for="inputFirstName">Penulis</label>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="form-floating mb-3 mb-md-0">
                <input name="txtsponsor" value="<?=$r['sponsor']?>" class="form-control" type="text" placeholder="Masukkan Sponsor" />
                <label for="inputFirstName">Sponsor</label>
            </div>
        </div>
    </div>
    <div class="mt-4 mb-0">
        <div class="d-grid">
            <input type="submit" value="Simpan" name="simpan" class="btn btn-primary btn-block">
        </div>
    </div>
    <?php
    if (@$_POST['simpan']) {
        // Ambil dan sanitasi input dari form
        $judul = mysqli_real_escape_string($k, $_POST['txtjudul']);
        $sinopsis = mysqli_real_escape_string($k, $_POST['txtsinopsis']);
        $isi = mysqli_real_escape_string($k, $_POST['txtisi']);
        $penulis = mysqli_real_escape_string($k, $_POST['txtpenulis']);
        $tanggal = mysqli_real_escape_string($k, $_POST['txttanggal']);
        $waktu = mysqli_real_escape_string($k, $_POST['txtwaktu']);
        $sponsor = mysqli_real_escape_string($k, $_POST['txtsponsor']);
        $deskripsi = mysqli_real_escape_string($k, $_POST['txtdeskripsi']);

        // Gabungkan tanggal dan waktu menjadi format DATETIME
        $datetime = $tanggal . ' ' . $waktu;

        // Proses file upload
        $gambar = $_FILES['txtgambar']['name'];
        $tmp = $_FILES['txtgambar']['tmp_name'];
        $ekstensi_gambar = pathinfo($gambar, PATHINFO_EXTENSION);
        $nama_gambar_baru = 'g' . uniqid() . '.' . $ekstensi_gambar;

        // Cek apakah ada gambar baru yang diunggah
        if (empty($gambar)) {
            $query = "UPDATE tb_pemikiran SET judul='$judul', sinopsis='$sinopsis', penjelasan='$isi', deskripsi='$deskripsi', tanggal='$datetime', penulis='$penulis', sponsor='$sponsor' WHERE no_pemikiran='$id'";
        } else {
            if (move_uploaded_file($tmp, "../img/$nama_gambar_baru")) {
                $query = "UPDATE tb_pemikiran SET judul='$judul', sinopsis='$sinopsis', penjelasan='$isi', gambar='$nama_gambar_baru', deskripsi='$deskripsi', tanggal='$datetime', penulis='$penulis', sponsor='$sponsor' WHERE no_pemikiran='$id'";
            } else {
                echo "Error: Gagal mengunggah gambar.<br>";
                exit;
            }
        }

        if (mysqli_query($k, $query)) {
            echo "<script>alert('Data berhasil disimpan');location='.?hal=pemikiran'</script>";
        } else {
            echo "ERROR: " . mysqli_error($k) . "<br>";
        }
    }
    ?>
</form>
<script>
    function toggleBold(textareaId) {
        var textarea = document.getElementById(textareaId);
        var start = textarea.selectionStart;
        var end = textarea.selectionEnd;
        var selectedText = textarea.value.substring(start, end);

        if (selectedText.trim() === "") {
            alert("Silakan pilih teks terlebih dahulu.");
            return;
        }

        var textBefore = textarea.value.substring(0, start);
        var textAfter = textarea.value.substring(end, textarea.value.length);
        var newText;

        if (selectedText.startsWith("<b>") && selectedText.endsWith("</b>")) {
            newText = selectedText.slice(3, -4);
        } else {
            newText = "<b>" + selectedText + "</b>";
        }

        var replacedText = textBefore + newText + textAfter;
        textarea.value = replacedText;

        textarea.setSelectionRange(start, end);

        textarea.focus();
    }

    function toggleItalic(textareaId) {
        var textarea = document.getElementById(textareaId);
        var start = textarea.selectionStart;
        var end = textarea.selectionEnd;
        var selectedText = textarea.value.substring(start, end);

        if (selectedText.trim() === "") {
            alert("Silakan pilih teks terlebih dahulu.");
            return;
        }

        var textBefore = textarea.value.substring(0, start);
        var textAfter = textarea.value.substring(end, textarea.value.length);
        var newText;

        if (selectedText.startsWith("<i>") && selectedText.endsWith("</i>")) {
            newText = selectedText.slice(3, -4);
        } else {
            newText = "<i>" + selectedText + "</i>";
        }

        var replacedText = textBefore + newText + textAfter;
        textarea.value = replacedText;

        textarea.setSelectionRange(start, end);

        textarea.focus();
    }

    function insertLink(textareaId) {
        var textarea = document.getElementById(textareaId);
        var start = textarea.selectionStart;
        var end = textarea.selectionEnd;
        var selectedText = textarea.value.substring(start, end);

        var link = prompt("Masukkan URL:");

        if (link === null || link.trim() === "") {
            alert("URL tidak valid.");
            return;
        }

        var textBefore = textarea.value.substring(0, start);
        var textAfter = textarea.value.substring(end, textarea.value.length);
        var newText = '<a href="' + link + '">' + selectedText + '</a>';

        var replacedText = textBefore + newText + textAfter;
        textarea.value = replacedText;

        textarea.setSelectionRange(start, end);

        textarea.focus();
    }
</script>