 <?php
    // require "../config/db.php";
    $query = "SELECT * FROM products ORDER BY id DESC";
    $result = mysqli_query($con, $query);
    ?>

    <div class="product-grid-wrapper bg-light" data-theme="indigo">
        <div class="container">
            <header>
                <div class="brand">
                    <div class="logo"><i class="fa-solid fa-store"></i></div>
                    <h1>Feature Product</h1>
                </div>
            </header>

            <button class="carousel-btn prev-btn" aria-label="Previous">
                <i class="fa-solid fa-chevron-left"></i>
            </button>

            <div class="carousel-wrapper">
                <main class="carousel py-0">
                    <?php while ($product = mysqli_fetch_assoc($result)): ?>
                        <div class="card">
                            <div class="media">
                                <img src="./admin/<?= htmlspecialchars($product['images']) ?>"
                                    alt="<?= htmlspecialchars($product['name']) ?>">
                                <div class="badges">
                                    <div class="badge">New</div>
                                    <div class="badge secondary">-30%</div>
                                </div>
                                <div class="wishlist">
                                    <button class="icon-btn"><i class="fa-regular fa-heart"></i></button>
                                </div>
                            </div>
                            <div class="content">
                                <div class="title"><?= htmlspecialchars($product['name']) ?></div>
                                <div class="price">
                                    <div class="new">$<?= number_format($product['price'], 2) ?></div>
                                    <div class="old">$<?= number_format($product['old_price'], 2) ?></div>
                                </div>
                                <div class="rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star-half-stroke"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <span class="count">(<?= rand(50, 500) ?>)</span>
                                </div>
                                <div class="actions">
                                    <a href="cart.php?add=<?= $product['id'] ?>" class="p_btn">
                                        <i class="fa-solid fa-cart-plus"></i> Add to Cart
                                    </a>
                                    <a href="shop_detail.php?id=<?= $product['id'] ?>" class="p_btn">
                                        <i class="fa-solid fa-eye"></i> Preview
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </main>
            </div>

            <button class="carousel-btn next-btn" aria-label="Next">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        const carousel = document.querySelector('.product-grid-wrapper .carousel');
        const prevBtn = document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.next-btn');

        function scrollByCard(direction) {
            const card = carousel.querySelector('.card');
            if (!card) return;
            const gap = parseInt(getComputedStyle(carousel).gap || 18);
            const scrollAmt = card.getBoundingClientRect().width + gap;
            carousel.scrollBy({ left: direction * scrollAmt, behavior: 'smooth' });
        }

        prevBtn.addEventListener('click', () => scrollByCard(-1));
        nextBtn.addEventListener('click', () => scrollByCard(1));
    </script>
</div>