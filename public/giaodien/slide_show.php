<link rel="stylesheet" type="text/css" href="css/slide_show.css">

<div class="slideshow-container">
    <?php
    $images = array("img1.png", "img2.png", "img3.png", "img4.png", "img5.png", "img6.png");
    ?>
    <?php foreach ($images as $index => $image) : ?>
        <?php $activeClass = ($index === 0) ? "active" : ""; ?>
        <div class="slide <?php echo $activeClass; ?>">
            <img src="images/banner/<?php echo $image; ?>">
        </div>
    <?php endforeach; ?>
</div>
<script>
    var slides = document.querySelectorAll('.slide');
    var currentSlide = 0;

    function showSlide(n) {
        slides[currentSlide].classList.remove('active');
        currentSlide = (n + slides.length) % slides.length;
        slides[currentSlide].classList.add('active');
    }

    setInterval(function() {
        showSlide(currentSlide + 1);
    }, 3000);
</script>