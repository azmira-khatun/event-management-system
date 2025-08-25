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
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="antialiased text-gray-800">

    <!-- Navbar -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
            <!-- Brand -->
            <a href="#" class="text-2xl font-bold text-gray-900">EventEase</a>
            
            <!-- Navigation Links - Hidden on small screens -->
            <ul class="hidden md:flex space-x-8 text-gray-600 font-medium">
                <li><a href="#hero" class="hover:text-indigo-600 transition duration-300">Home</a></li>
                <li><a href="#features" class="hover:text-indigo-600 transition duration-300">Features</a></li>
                <li><a href="#events" class="hover:text-indigo-600 transition duration-300">Events</a></li>
                <li><a href="#pricing" class="hover:text-indigo-600 transition duration-300">Pricing</a></li>
                <li><a href="#contact" class="hover:text-indigo-600 transition duration-300">Contact</a></li>
            </ul>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-btn" class="text-gray-600 hover:text-indigo-600 focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </nav>
        <!-- Mobile Menu - hidden by default -->
        <div id="mobile-menu" class="hidden md:hidden bg-white shadow-lg border-t border-gray-200">
            <ul class="flex flex-col p-4 space-y-2 text-gray-600 font-medium">
                <li><a href="#hero" class="block p-2 hover:bg-gray-100 rounded-md">Home</a></li>
                <li><a href="#features" class="block p-2 hover:bg-gray-100 rounded-md">Features</a></li>
                <li><a href="#events" class="block p-2 hover:bg-gray-100 rounded-md">Events</a></li>
                <li><a href="#pricing" class="block p-2 hover:bg-gray-100 rounded-md">Pricing</a></li>
                <li><a href="#contact" class="block p-2 hover:bg-gray-100 rounded-md">Contact</a></li>
            </ul>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="hero" class="hero-bg text-center py-20 md:py-40 flex items-center justify-center text-white">
        <div class="container mx-auto px-4 animate-fade-in">
            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight">Plan. Promote. Manage.</h1>
            <p class="mt-4 text-lg md:text-xl font-light max-w-2xl mx-auto">
                Everything you need to manage events seamlessly in one powerful and intuitive platform.
            </p>
            <a href="#" class="mt-8 inline-block px-8 py-3 bg-indigo-600 text-white font-bold rounded-full shadow-lg hover:bg-indigo-700 transition duration-300 transform hover:scale-105">
                Get Started
            </a>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">Why Choose EventEase?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-shadow duration-300 transform hover:scale-105">
                    <div class="text-indigo-600 text-4xl mb-4"><i class="fas fa-edit"></i></div>
                    <h3 class="text-xl font-semibold mb-2">Easy Event Setup</h3>
                    <p class="text-gray-600">Create and publish your events in minutes with our intuitive dashboard.</p>
                </div>
                <!-- Feature 2 -->
                <div class="bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-shadow duration-300 transform hover:scale-105">
                    <div class="text-indigo-600 text-4xl mb-4"><i class="fas fa-credit-card"></i></div>
                    <h3 class="text-xl font-semibold mb-2">Ticketing & Payments</h3>
                    <p class="text-gray-600">Handle registrations and ticket sales with integrated payment options.</p>
                </div>
                <!-- Feature 3 -->
                <div class="bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-shadow duration-300 transform hover:scale-105">
                    <div class="text-indigo-600 text-4xl mb-4"><i class="fas fa-chart-line"></i></div>
                    <h3 class="text-xl font-semibold mb-2">Real-time Analytics</h3>
                    <p class="text-gray-600">Track attendee data, revenue, and engagement in real-time.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Upcoming Events Section -->
    <section id="events" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">Upcoming Events</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Event Card 1 -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Tech Conference 2025</h3>
                        <p class="text-gray-500 text-sm mb-4"><i class="fas fa-calendar-alt mr-2 text-indigo-600"></i>Oct 5, 2025 | <i class="fas fa-map-marker-alt mr-2 text-indigo-600"></i>New York City</p>
                        <a href="#" class="inline-block px-4 py-2 text-sm text-indigo-600 font-medium rounded-full border border-indigo-600 hover:bg-indigo-600 hover:text-white transition-colors duration-300">Learn More</a>
                    </div>
                </div>
                <!-- Event Card 2 -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Marketing Summit</h3>
                        <p class="text-gray-500 text-sm mb-4"><i class="fas fa-calendar-alt mr-2 text-indigo-600"></i>Nov 15, 2025 | <i class="fas fa-map-marker-alt mr-2 text-indigo-600"></i>San Francisco</p>
                        <a href="#" class="inline-block px-4 py-2 text-sm text-indigo-600 font-medium rounded-full border border-indigo-600 hover:bg-indigo-600 hover:text-white transition-colors duration-300">Learn More</a>
                    </div>
                </div>
                <!-- Event Card 3 -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Startup Expo</h3>
                        <p class="text-gray-500 text-sm mb-4"><i class="fas fa-calendar-alt mr-2 text-indigo-600"></i>Dec 1, 2025 | <i class="fas fa-map-marker-alt mr-2 text-indigo-600"></i>Chicago</p>
                        <a href="#" class="inline-block px-4 py-2 text-sm text-indigo-600 font-medium rounded-full border border-indigo-600 hover:bg-indigo-600 hover:text-white transition-colors duration-300">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section (NEW) -->
    <section id="pricing" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-4">Simple, transparent pricing</h2>
            <p class="text-center text-gray-500 mb-12">Choose the plan that's right for you.</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
                <!-- Basic Plan -->
                <div class="bg-white p-8 rounded-2xl shadow-xl transition-shadow duration-300 hover:shadow-2xl">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Basic</h3>
                    <p class="text-gray-500">For small teams and side projects.</p>
                    <div class="my-6">
                        <span class="text-5xl font-extrabold">$29</span>
                        <span class="text-gray-500">/month</span>
                    </div>
                    <ul class="text-gray-600 space-y-3 mb-8">
                        <li><i class="fas fa-check text-green-500 mr-2"></i>5 Events per month</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Basic Ticketing</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Email Support</li>
                        <li class="text-gray-400"><i class="fas fa-times text-red-400 mr-2"></i>Advanced Analytics</li>
                        <li class="text-gray-400"><i class="fas fa-times text-red-400 mr-2"></i>Dedicated Account Manager</li>
                    </ul>
                    <a href="#" class="block w-full text-center px-6 py-3 bg-gray-200 text-gray-800 font-bold rounded-full hover:bg-gray-300 transition duration-300">Choose Plan</a>
                </div>
                <!-- Pro Plan (Most Popular) -->
                <div class="bg-indigo-600 p-10 rounded-2xl shadow-xl text-white transform scale-105 relative z-10 transition-all duration-300">
                    <span class="absolute top-0 right-0 m-4 px-3 py-1 text-xs font-bold text-indigo-600 bg-white rounded-full">Most Popular</span>
                    <h3 class="text-2xl font-bold mb-2">Pro</h3>
                    <p class="text-indigo-100">For growing businesses and event managers.</p>
                    <div class="my-6">
                        <span class="text-5xl font-extrabold">$99</span>
                        <span class="text-indigo-100">/month</span>
                    </div>
                    <ul class="space-y-3 mb-8">
                        <li><i class="fas fa-check mr-2"></i>Unlimited Events</li>
                        <li><i class="fas fa-check mr-2"></i>Customizable Ticketing</li>
                        <li><i class="fas fa-check mr-2"></i>Advanced Analytics</li>
                        <li><i class="fas fa-check mr-2"></i>Priority Support</li>
                        <li class="text-indigo-100"><i class="fas fa-times text-indigo-200 mr-2"></i>Dedicated Account Manager</li>
                    </ul>
                    <a href="#" class="block w-full text-center px-6 py-3 bg-white text-indigo-600 font-bold rounded-full hover:bg-gray-100 transition duration-300">Choose Plan</a>
                </div>
                <!-- Enterprise Plan -->
                <div class="bg-white p-8 rounded-2xl shadow-xl transition-shadow duration-300 hover:shadow-2xl">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Enterprise</h3>
                    <p class="text-gray-500">For large organizations with complex needs.</p>
                    <div class="my-6">
                        <span class="text-5xl font-extrabold">$249</span>
                        <span class="text-gray-500">/month</span>
                    </div>
                    <ul class="text-gray-600 space-y-3 mb-8">
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Unlimited Events</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Custom Ticketing & APIs</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Advanced Analytics</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Priority Support</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Dedicated Account Manager</li>
                    </ul>
                    <a href="#" class="block w-full text-center px-6 py-3 bg-gray-200 text-gray-800 font-bold rounded-full hover:bg-gray-300 transition duration-300">Choose Plan</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section (NEW) -->
    <section id="testimonials" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">What Our Customers Say</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-gray-50 p-8 rounded-2xl shadow-md">
                    <p class="text-gray-700 italic mb-4">"EventEase completely transformed our event planning. The analytics are a game-changer!"</p>
                    <div class="flex items-center">
                        <img class="w-12 h-12 rounded-full mr-4" src="https://placehold.co/48x48/6b7280/FFFFFF?text=J" alt="John Doe">
                        <div>
                            <p class="font-bold">John Doe</p>
                            <p class="text-sm text-gray-500">CEO, Tech Innovators</p>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 2 -->
                <div class="bg-gray-50 p-8 rounded-2xl shadow-md">
                    <p class="text-gray-700 italic mb-4">"The platform is so easy to use. We were able to set up our conference in record time."</p>
                    <div class="flex items-center">
                        <img class="w-12 h-12 rounded-full mr-4" src="https://placehold.co/48x48/6b7280/FFFFFF?text=A" alt="Jane Smith">
                        <div>
                            <p class="font-bold">Jane Smith</p>
                            <p class="text-sm text-gray-500">Event Manager, Creative Labs</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section (NEW) -->
    <section class="py-16 bg-indigo-600 text-white text-center">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to simplify your events?</h2>
            <p class="text-lg mb-8">Join thousands of event managers who trust EventEase to deliver exceptional experiences.</p>
            <a href="#" class="inline-block px-10 py-4 bg-white text-indigo-600 font-bold rounded-full shadow-lg hover:bg-gray-100 transition duration-300 transform hover:scale-105">
                Start Your Free Trial
            </a>
        </div>
    </section>

    <!-- Contact & Footer Section -->
    <footer id="contact" class="bg-gray-900 text-gray-300 py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8 text-center md:text-left">
                <!-- Company Info -->
                <div>
                    <h3 class="text-2xl font-bold text-white mb-2">EventEase</h3>
                    <p class="text-sm">Your partner in seamless event management.</p>
                </div>
                <!-- Links -->
                <div>
                    <h4 class="text-lg font-semibold text-white mb-3">Quick Links</h4>
                    <ul class="space-y-1">
                        <li><a href="#features" class="hover:text-white transition-colors duration-300">Features</a></li>
                        <li><a href="#events" class="hover:text-white transition-colors duration-300">Events</a></li>
                        <li><a href="#pricing" class="hover:text-white transition-colors duration-300">Pricing</a></li>
                        <li><a href="#" class="hover:text-white transition-colors duration-300">Privacy Policy</a></li>
                    </ul>
                </div>
                <!-- Contact Info -->
                <div>
                    <h4 class="text-lg font-semibold text-white mb-3">Get in Touch</h4>
                    <p class="flex items-center justify-center md:justify-start mb-1"><i class="fas fa-envelope mr-2 text-indigo-400"></i>support@eventease.com</p>
                    <p class="flex items-center justify-center md:justify-start"><i class="fas fa-phone-alt mr-2 text-indigo-400"></i>+1 234 567 890</p>
                </div>
            </div>
            <hr class="border-gray-700 my-8">
            <div class="flex flex-col md:flex-row justify-between items-center text-sm">
                <p>&copy; 2025 EventEase. All rights reserved.</p>
                <div class="mt-4 md:mt-0 space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Mobile menu script -->
    <script>
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>
