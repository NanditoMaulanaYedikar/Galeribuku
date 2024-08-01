<section id="fiksinpuisi">
    <div class="container">
    <div class="head">
            <div class="slider2">
                <div class="img" style="background:url(demo.galeribukujakarta.com/img/c5.jpg);background-size:cover;background-position:center;">
                </div>
                <div class="img" style="background:url(demo.galeribukujakarta.com/img/c6.jpg);background-size:cover;background-position:center;">
                </div>
                <div class="img" style="background:url(demo.galeribukujakarta.com/img/c8.jpg);background-size:cover;background-position:center;">
                </div>
                <div class="img" style="background:url(demo.galeribukujakarta.com/img/c10.jpg);background-size:cover;background-position:center;">
                </div>
            </div>
            <div class="desc">
                <ul>
                    <li>
                        <h3><a href="?page=artikel2">Siapakah Jakarta</a></h3>
                        <p><a href="?page=artikel2">Kota dan Kata, ada apa?</a></p>
                    </li>
                    <li>
                        <h3><a href="?page=artikel2">Sayembara</a></h3>
                        <p><a href="?page=artikel2">Tanpa kata-kata dan tanpa buku tidak akan ada sejarah.</a></p>
                    </li>
                    <li>
                        <h3><a href="?page=artikel2">Ziarah Kota</a></h3>
                        <p><a href="?page=artikel2">Identitas dan Kemungkinan tak Terbatas.</a></p>
                    </li>
                    <li>
                        <div class="content" style="background:url(demo.galeribukujakarta.com/img/c10.jpg);background-size:cover;background-position:center;"></div>
                        <div class="detail">
                            <h3><a href="?page=artikel2">Ruang Kota</a></h3>
                            <p><a href="?page=artikel2">Untuk penulis terbaik dan pembaca ambisius.</a></p>
                        </div>
                    </li>
                </ul>
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
    lfnp();
</script>