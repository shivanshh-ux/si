    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white mt-20">
        <div class="container mx-auto px-4 py-12">
            <div class="grid md:grid-cols-4 gap-8">
                <!-- Logo and Description -->
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-r from-primary to-accent rounded-lg flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-white text-lg"></i>
                        </div>
                        <span class="text-2xl font-bold">SIU UNIVERSE</span>
                    </div>
                    <p class="text-gray-400 mb-4">
                        Established in 2026. A verified student community platform for SI University students.
                    </p>
                    <div class="bg-gray-800 rounded-lg p-4 mb-4">
                        <p class="text-accent font-semibold mb-2">Core Philosophy:</p>
                        <p class="text-gray-300">"Empowering SIU students to organize, collaborate, and grow together. A focused space for a purposeful student life."</p>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="index.php" class="text-gray-400 hover:text-white transition-colors">Home</a></li>
                        <li><a href="discover.php" class="text-gray-400 hover:text-white transition-colors">Discover</a></li>
                        <li><a href="resource-hub.php" class="text-gray-400 hover:text-white transition-colors">Resource Hub</a></li>
                        <li><a href="professional-communities.php" class="text-gray-400 hover:text-white transition-colors">Professional Communities</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Important Rules</h3>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-accent mt-1 mr-2"></i>
                            <span>Predefined communities only</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-accent mt-1 mr-2"></i>
                            <span>No auto-creation of communities</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-accent mt-1 mr-2"></i>
                            <span>WhatsApp groups for planning only</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-accent mt-1 mr-2"></i>
                            <span>No in-app chat system</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Divider -->
            <div class="border-t border-gray-800 mt-8 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-sm">
                        © 2026 SIU UNIVERSE. All rights reserved.
                    </p>
                    <div class="flex space-x-4 mt-4 md:mt-0">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-instagram text-lg"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-twitter text-lg"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-linkedin text-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Include Modals -->
    <?php include 'includes/login-modal.php'; ?>
    <?php include 'includes/onboarding-modal.php'; ?>

    <!-- JavaScript Libraries -->
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    
    <!-- Typed.js -->
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    
    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <!-- Anime.js -->
    <script src="https://cdn.jsdelivr.net/npm/animejs@3.2.1/lib/anime.min.js"></script>
    
    <!-- CountUp.js -->
    <script src="https://cdn.jsdelivr.net/npm/countup.js@2.3.2/dist/countUp.umd.js"></script>
    
    <!-- Custom JS -->
    <script src="assets/js/main.js"></script>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });

        // Mobile Menu Toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                const isHidden = mobileMenu.classList.contains('hidden');
                if (isHidden) {
                    mobileMenu.classList.remove('hidden');
                    mobileMenu.classList.add('animate-slide-down');
                } else {
                    mobileMenu.classList.add('hidden');
                    mobileMenu.classList.remove('animate-slide-down');
                }
                
                // Animate hamburger icon
                const lines = document.querySelectorAll('.hamburger-line');
                if (lines.length >= 3) {
                    if (isHidden) {
                        lines[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
                        lines[1].style.opacity = '0';
                        lines[2].style.transform = 'rotate(-45deg) translate(7px, -6px)';
                    } else {
                        lines[0].style.transform = 'none';
                        lines[1].style.opacity = '1';
                        lines[2].style.transform = 'none';
                    }
                }
            });

            // Close mobile menu when clicking outside
            document.addEventListener('click', (event) => {
                if (!mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target) && !mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    const lines = document.querySelectorAll('.hamburger-line');
                    if (lines.length >= 3) {
                        lines[0].style.transform = 'none';
                        lines[1].style.opacity = '1';
                        lines[2].style.transform = 'none';
                    }
                }
            });
        }

        // Function to show login modal
        function showLoginModal() {
            document.getElementById('loginModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        // Function to show onboarding modal
        function showOnboardingModal() {
            document.getElementById('onboardingModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        // Close modal functions
        function closeLoginModal() {
            document.getElementById('loginModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        function closeOnboardingModal() {
            document.getElementById('onboardingModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modals on outside click
        document.addEventListener('click', (event) => {
            const loginModal = document.getElementById('loginModal');
            const onboardingModal = document.getElementById('onboardingModal');
            
            if (event.target === loginModal) {
                closeLoginModal();
            }
            if (event.target === onboardingModal) {
                closeOnboardingModal();
            }
        });

        // Esc key to close modals
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                closeLoginModal();
                closeOnboardingModal();
            }
        });
    </script>
</body>
</html>