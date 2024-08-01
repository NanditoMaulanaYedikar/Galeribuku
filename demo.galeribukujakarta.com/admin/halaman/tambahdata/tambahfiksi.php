<?php
include "koneksi.php";
?>
<h3 class="mt-4">Form Fiksi Dan Puisi</h3>
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
    <div class="form-floating mb-3">
        <input name ="txtgambar" class="form-control" type="file"/>
        <label>Gambar</label>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="form-floating mb-3 mb-md-0">
                <input  name ="txtdeskripsi" class="form-control" type="text" placeholder="Masukkan Deskripsi Gambar" />
                <label for="inputFirstName">Deskripsi</label>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="form-floating mb-3 mb-md-0">
                <input  name ="txtjudul" class="form-control" type="text" placeholder="Masukkan Judul" />
                <label for="inputFirstName">Judul Artikel</label>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="form-floating mb-3 mb-md-0">
                <input  name ="txtsinopsis" class="form-control" type="text" placeholder="Masukkan Sinopsis" />
                <label for="inputFirstName">Sinopsis</label>
            </div>
        </div>
    </div>
    <div class="form-floating mb-3">
        <div class="form-group">
            <textarea id="txtisi" name ="txtisi" class="form-control" rows="5"></textarea>
            <label >Isi Artikel</label>
            <button type="button" class="bold-button" onclick="toggleBold('txtisi')">Bold</button>
            <button type="button" class="bold-button" onclick="toggleItalic('txtisi')">Italic</button>
            <button type="button" class="bold-button" onclick="insertLink('txtisi')">masukkan link</button> 
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="form-floating mb-3 mb-md-0">
                <input  name ="txtpenulis" class="form-control" type="text" placeholder="Masukkan penulis" />
                <label for="inputFirstName">Penulis</label>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="form-floating mb-3 mb-md-0">
                <input  name ="txttgl" class="form-control" type="date" placeholder="Masukkan tanggal terbit" />
                <label for="inputFirstName">Tanggal Terbit</label>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="form-floating mb-3 mb-md-0">
                <input  name ="txtsponsor" class="form-control" type="text" placeholder="Masukkan Sponsor" />
                <label for="inputFirstName">sponsor</label>
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
        $tanggal = mysqli_real_escape_string($k, $_POST['txttgl']);
        $sponsor = mysqli_real_escape_string($k, $_POST['txtsponsor']);
        $deskripsi = mysqli_real_escape_string($k, $_POST['txtdeskripsi']);

        // Proses file upload
        $gambar = $_FILES['txtgambar']['name'];
        $tmp = $_FILES['txtgambar']['tmp_name'];
        $ekstensi_gambar = pathinfo($gambar, PATHINFO_EXTENSION);
        $nama_gambar_baru = 'g' . uniqid() . '.' . $ekstensi_gambar;

        if (!empty($gambar) && is_uploaded_file($tmp)) {
            if (move_uploaded_file($tmp, "../img/$nama_gambar_baru")) {
                $query = "INSERT INTO tb_fiksi(gambar, deskripsi, kutipan, penulis, sinopsis, tanggal, penjelasan, sponsor) 
                        VALUES('$nama_gambar_baru', '$deskripsi', '$judul', '$penulis', '$sinopsis', '$tanggal', '$isi', '$sponsor')";
                if (mysqli_query($k, $query)) {
                    echo "<script>alert('Data berhasil disimpan');location='.?hal=fiksi'</script>";
                } else {
                    echo "ERROR: " . mysqli_error($k) . "<br>";
                }
            } else {
                echo "Error: Gagal mengunggah gambar.<br>";
            }
        } else {
            echo "Error: Gambar tidak terkirim dengan benar atau tidak ada gambar yang diunggah.<br>";
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