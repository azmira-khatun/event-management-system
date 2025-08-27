<div>
    <!-- Fonts and Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" />

    <style>
        .upcoming-events {
            margin: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .card {
            min-width: 250px;
            margin: 0 10px;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .card .content {
            padding: 10px;
        }

        .card .title {
            font-size: 18px;
            font-weight: 600;
        }

        .card .info {
            font-size: 14px;
            margin: 5px 0;
        }

        .p_btn {
            display: inline-block;
            margin: 5px 2px;
            padding: 5px 10px;
            background: #007bff;
            color: #fff;
            border-radius: 5px;
            font-size: 14px;
            text-decoration: none;
        }

        .p_btn:hover {
            background: #0056b3;
        }
    </style>

    <?php
        include("config.php");
        $query = "SELECT * FROM booking ORDER BY id DESC";
        $result = mysqli_query($conn, $query);
    ?>

    <div class="product-grid-wrapper bg-light" data-theme="indigo">
        <div class="container">
            <header>
                <div class="brand">
                    <div class="logo"><i class="fa-solid fa-store"></i></div>
                    <h1>Feature Booking</h1>
                </div>
            </header>

            <button class="carousel-btn prev-btn" aria-label="Previous">
                <i class="fa-solid fa-chevron-left"></i>
            </button>

            <div class="carousel-wrapper">
                <main class="carousel py-0 d-flex" style="gap: 18px; overflow-x: auto; scroll-behavior: smooth;">
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <div class="card">
                            <div class="media">
                                <img src="./admin/<?= htmlspecialchars($row['image'] ?? 'default.jpg') ?>" 
                                    alt="<?= htmlspecialchars($row['customer_name']) ?>">
                                <div class="badges">
                                    <div class="badge">Event <?= htmlspecialchars($row['event_id']) ?></div>
                                    <?php if ($row['discount_rent'] > 0): ?>
                                        <div class="badge secondary">-<?= htmlspecialchars($row['discount_rent']) ?>%</div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="content">
                                <div class="title"><?= htmlspecialchars($row['customer_name']) ?></div>
                                <div class="info"><i class="fa-solid fa-envelope"></i> <?= htmlspecialchars($row['gmail']) ?></div>
                                <div class="info"><i class="fa-solid fa-phone"></i> <?= htmlspecialchars($row['contact_number']) ?></div>
                                <div class="info"><i class="fa-solid fa-calendar"></i> <?= htmlspecialchars($row['date']) ?></div>
                                <div class="info"><i class="fa-solid fa-location-dot"></i> <?= htmlspecialchars($row['address']) ?></div>
                                <div class="actions">
                                    <a href="booking_detail.php?id=<?= $row['id'] ?>" class="p_btn">
                                        <i class="fa-solid fa-eye"></i> View
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
