<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS (Popper এবং jQuery সহ) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>


<?php
if ($stmt->execute()) {
    echo "<div class='alert alert-success'>Booking confirmed!</div>";

    // ধরছি আপলোড ছবি একটির ক্ষেত্রে:
    // একাধিক হলে: $imagePaths = [$imagePath, ...];
    $imagePaths = [$imagePath];

    echo "
    <div id='bookingCarousel' class='carousel slide my-4' data-ride='carousel'>
      <div class='carousel-inner'>
    ";

    foreach ($imagePaths as $idx => $imgSrc) {
        $activeClass = ($idx === 0) ? ' active' : '';
        $safeSrc = htmlspecialchars($imgSrc);
        echo "
        <div class='carousel-item{$activeClass}'>
          <img src='{$safeSrc}' class='d-block w-100 img-fluid' alt='Uploaded Image'>
        </div>
        ";
    }

    echo "
      </div>
      <a class='carousel-control-prev' href='#bookingCarousel' role='button' data-slide='prev'>
        <span class='carousel-control-prev-icon' aria-hidden='true'></span>
        <span class='sr-only'>Previous</span>
      </a>
      <a class='carousel-control-next' href='#bookingCarousel' role='button' data-slide='next'>
        <span class='carousel-control-next-icon' aria-hidden='true'></span>
        <span class='sr-only'>Next</span>
      </a>
    </div>
    ";
}
?>