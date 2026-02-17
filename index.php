<?php
session_start();
include 'includes/header.php';

// Onboarding logic
$p = $_SESSION['onboarding_data'] ?? null;
$acc = $p['accommodation'] ?? '';
$campus = $p['campus'] ?? '';
$gym = $p['gym'] ?? '';
$is_intl = $p['international_student'] ?? false;
?>

<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-br from-primary/10 via-white to-accent/10">
    <div class="container mx-auto px-4 py-8 md:py-20">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <!-- Left Column: Welcome -->
            <div data-aos="fade-right">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                    Welcome to 
                    <span class="text-primary">SIU UNIVERSE</span>
                </h1>
                <p class="text-gray-600 text-lg mb-8">
                    <span id="typed-text" class="text-secondary font-semibold"></span>
                </p>
                <div class="bg-yellow-50 border-l-4 border-accent p-4 mb-8">
                    <p class="text-gray-800 font-bold mb-2">Core Philosophy:</p>
                    <p class="text-gray-700">"Empowering SIU students to organize, collaborate, and grow together. A focused space for a purposeful student life."</p>
                </div>
            </div>

            <!-- Right Column: Your Communities -->
            <div data-aos="fade-left" class="space-y-6">
                <div class="mb-2">
                    <h2 class="text-2xl font-bold text-gray-800">Your Communities</h2>
                    <p class="text-sm text-gray-500">Based on your profile, here are the groups you belong to.</p>
                </div>

                <div class="space-y-4 max-h-[500px] overflow-y-auto pr-2 custom-scrollbar">
                    <!-- 1. International Students Community -->
                    <?php if ($is_intl): ?>
                    <div class="bg-white rounded-2xl shadow-md p-4 border-l-4 border-purple-500 hover:shadow-lg transition-all">
                        <div class="flex justify-between items-center mb-2">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-purple-100 text-purple-600 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-globe-americas"></i>
                                </div>
                                <h3 class="font-bold text-gray-800 text-sm">International Students Comm.</h3>
                            </div>
                            <span class="text-[10px] font-bold text-purple-600 bg-purple-50 px-2 py-0.5 rounded">INTL</span>
                        </div>
                        <p class="text-gray-500 text-xs mb-3">Support and communication for all international students on campus.</p>
                        <button class="w-full bg-green-500 hover:bg-green-600 text-white py-2 rounded-lg text-sm font-bold transition-all flex items-center justify-center">
                            <i class="fab fa-whatsapp mr-2"></i> Join Group
                        </button>
                    </div>
                    <?php endif; ?>

                    <!-- 2. Accommodation Communities (Non-Hostel) -->
                    <?php if ($acc === 'PG / Flat' || $acc === 'Day Scholar'): ?>
                    <div class="bg-white rounded-2xl shadow-md p-4 border-l-4 border-green-500 hover:shadow-lg transition-all">
                        <div class="flex justify-between items-center mb-2">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-green-100 text-green-600 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas <?= $acc === 'PG / Flat' ? 'fa-home' : 'fa-bus' ?>"></i>
                                </div>
                                <h3 class="font-bold text-gray-800 text-sm"><?= $acc ?> Community</h3>
                            </div>
                            <span class="text-[10px] font-bold text-green-600 bg-green-50 px-2 py-0.5 rounded">HOUSING</span>
                        </div>
                        <p class="text-gray-500 text-xs mb-3">Campus-wide group for students living in <?= strtolower($acc) ?>s.</p>
                        <button class="w-full bg-green-500 hover:bg-green-600 text-white py-2 rounded-lg text-sm font-bold transition-all flex items-center justify-center">
                            <i class="fab fa-whatsapp mr-2"></i> Join Group
                        </button>
                    </div>
                    <?php endif; ?>

                    <!-- 3. Mess Communities (Hostel Only) -->
                    <?php if ($acc === 'Hostel'): ?>
                    <div class="bg-white rounded-2xl shadow-md p-4 border-l-4 border-orange-500 hover:shadow-lg transition-all">
                        <div class="flex justify-between items-center mb-2">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-orange-100 text-orange-600 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-utensils"></i>
                                </div>
                                <h3 class="font-bold text-gray-800 text-sm">Student Mess Community</h3>
                            </div>
                            <span class="text-[10px] font-bold text-orange-600 bg-orange-50 px-2 py-0.5 rounded">MESS</span>
                        </div>
                        <p class="text-gray-500 text-xs mb-3">Report issues and discuss menus for <?= $p['mess'] ?>.</p>
                        <button class="w-full bg-green-500 hover:bg-green-600 text-white py-2 rounded-lg text-sm font-bold transition-all flex items-center justify-center">
                            <i class="fab fa-whatsapp mr-2"></i> Join Group
                        </button>
                    </div>

                    <?php if ($gym !== 'no gym'): ?>
                    <div class="bg-white rounded-2xl shadow-md p-4 border-l-4 border-blue-500 hover:shadow-lg transition-all">
                        <div class="flex justify-between items-center mb-2">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-dumbbell"></i>
                                </div>
                                <h3 class="font-bold text-gray-800 text-sm"><?= $gym ?> Community</h3>
                            </div>
                            <span class="text-[10px] font-bold text-blue-600 bg-blue-50 px-2 py-0.5 rounded">FITNESS</span>
                        </div>
                        <p class="text-gray-500 text-xs mb-3">Connect with fellow student athletes at the <?= $gym ?>.</p>
                        <button class="w-full bg-green-500 hover:bg-green-600 text-white py-2 rounded-lg text-sm font-bold transition-all flex items-center justify-center">
                            <i class="fab fa-whatsapp mr-2"></i> Join Group
                        </button>
                    </div>
                    <?php endif; ?>
                    <?php endif; ?>

                    <?php if (!$is_intl && $acc !== 'PG / Flat' && $acc !== 'Day Scholar' && $acc !== 'Hostel'): ?>
                    <div class="bg-blue-50 rounded-xl p-6 text-center border-2 border-dashed border-blue-200">
                        <i class="fas fa-info-circle text-blue-400 text-3xl mb-3"></i>
                        <p class="text-blue-600 font-medium">No groups found based on your selection. Check the <a href="discover.php" class="underline font-bold">Discover</a> page for all groups.</p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>




<!-- How It Works -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">How SIU UNIVERSE Works</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Simple, focused, and effective community platform</p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center" data-aos="fade-up" data-aos-delay="0">
                <div class="w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-user-check text-primary text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">1. Verified Onboarding</h3>
                <p class="text-gray-600">Select your accommodation type and institute. Strict separation enforced.</p>
            </div>
            
            <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="w-20 h-20 bg-secondary/10 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-users text-secondary text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">2. Join Communities</h3>
                <p class="text-gray-600">Access predefined communities based on your profile. No random creation.</p>
            </div>
            
            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="w-20 h-20 bg-accent/10 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fab fa-whatsapp text-accent text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">3. Plan & Meet Offline</h3>
                <p class="text-gray-600">Use WhatsApp groups only for planning. Meet in person for real interactions.</p>
            </div>
        </div>
    </div>
</section>

<script>
    // Initialize Typed.js
    document.addEventListener('DOMContentLoaded', function() {
        // Typed text animation
        new Typed('#typed-text', {
            strings: [
                'Decide online. Meet offline.',
                'Verified student communities.',
                'No random chatting.',
                'WhatsApp groups for planning only.'
            ],
            typeSpeed: 50,
            backSpeed: 30,
            loop: true
        });

        // Initialize counters
        const counters = document.querySelectorAll('.count-up');
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-count'));
            const countUp = new CountUp(counter, target, {
                duration: 2,
                separator: ','
            });
            countUp.start();
        });

        // Animate cards on hover with anime.js
        const cards = document.querySelectorAll('.bg-white.rounded-xl');
        cards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                anime({
                    targets: card,
                    scale: 1.02,
                    duration: 300,
                    easing: 'easeOutCubic'
                });
            });
            card.addEventListener('mouseleave', () => {
                anime({
                    targets: card,
                    scale: 1,
                    duration: 300,
                    easing: 'easeOutCubic'
                });
            });
        });
    });
</script>

<?php include 'includes/footer.php'; ?>