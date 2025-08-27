<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>EventEase - Your Event Management Partner</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7fafc;
        }

        .hero-bg {
            background-image: linear-gradient(rgba(17, 24, 39, 0.8), rgba(17, 24, 39, 0.8)), url('https://placehold.co/1920x1080/1f2937/FFFFFF?text=Event+Background');
            background-size: cover;
            background-position: center;
        }

        .animate-fade-in {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <?php
    include("config.php");
    $query = "SELECT * FROM booking ORDER BY id DESC";
    $result = mysqli_query($conn, $query);
    ?>

    Upcoming Events Section
    <section id="events" class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">Upcoming Events</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <!-- Event Card 1 -->
                <div class="relative rounded-2xl overflow-hidden shadow-xl transform transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 bg-cover bg-center"
                    style="background-image: url('https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=800&q=80');">
                                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                    <div class="relative p-6 text-white">
                        <h3 class="text-xl font-semibold mb-2">Tech Conference 2025</h3>
                        <p class="text-sm mb-4"><i class="fas fa-calendar-alt mr-2"></i>Oct 5, 2025 | <i
                                class="fas fa-map-marker-alt mr-2"></i>New York City</p>
                        <a href="#"
                            class="inline-block px-4 py-2 text-sm font-medium rounded-full border border-white hover:bg-white hover:text-black transition-colors duration-300">Learn
                            More</a>
                    </div>
                </div>

                <!-- Event Card 2 -->
                <!-- <div class="relative rounded-2xl overflow-hidden shadow-xl transform transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 bg-cover bg-center"
                    style="background-image: url('https://images.unsplash.com/photo-1556761175-4b46a572b786?auto=format&fit=crop&w=800&q=80');">
                    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                    <div class="relative p-6 text-white">
                        <h3 class="text-xl font-semibold mb-2">Startup Meetup 2025</h3>
                        <p class="text-sm mb-4"><i class="fas fa-calendar-alt mr-2"></i>Nov 12, 2025 | <i
                                class="fas fa-map-marker-alt mr-2"></i>San Francisco</p>
                        <a href="#"
                            class="inline-block px-4 py-2 text-sm font-medium rounded-full border border-white hover:bg-white hover:text-black transition-colors duration-300">Learn
                            More</a>
                    </div>
                </div> -->

                <!-- Event Card 3 -->
                <!-- <div class="relative rounded-2xl overflow-hidden shadow-xl transform transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 bg-cover bg-center"
                    style="background-image: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=800&q=80');">
                    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                    <div class="relative p-6 text-white">
                        <h3 class="text-xl font-semibold mb-2">Design Workshop 2025</h3>
                        <p class="text-sm mb-4"><i class="fas fa-calendar-alt mr-2"></i>Dec 3, 2025 | <i
                                class="fas fa-map-marker-alt mr-2"></i>Los Angeles</p>
                        <a href="#"
                            class="inline-block px-4 py-2 text-sm font-medium rounded-full border border-white hover:bg-white hover:text-black transition-colors duration-300">Learn
                            More</a>
                    </div>
                </div> -->


            </div>
        </div>
    </section>


    <script>
        document.getElementById('mobile-menu-btn').addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
    </body>

</html>