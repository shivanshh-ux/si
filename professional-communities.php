<?php include 'header.php'; ?>

<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-accent/10 to-primary/10 py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                Professional Communities
            </h1>
            <p class="text-gray-600 text-lg mb-8 max-w-2xl mx-auto">
                Network with peers, explore opportunities, and grow professionally. Same rules apply: WhatsApp groups for planning only.
            </p>
            
            <!-- Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-2xl mx-auto mb-12">
                <div class="bg-white rounded-xl p-6 shadow-lg" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-3xl font-bold text-primary count-up" data-count="8">0</div>
                    <div class="text-sm text-gray-600">Professional Groups</div>
                </div>
                <div class="bg-white rounded-xl p-6 shadow-lg" data-aos="fade-up" data-aos-delay="150">
                    <div class="text-3xl font-bold text-secondary count-up" data-count="1200">0</div>
                    <div class="text-sm text-gray-600">Active Members</div>
                </div>
                <div class="bg-white rounded-xl p-6 shadow-lg" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-3xl font-bold text-accent count-up" data-count="45">0</div>
                    <div class="text-sm text-gray-600">Events This Month</div>
                </div>
                <div class="bg-white rounded-xl p-6 shadow-lg" data-aos="fade-up" data-aos-delay="250">
                    <div class="text-3xl font-bold text-green-600 count-up" data-count="89">0</div>
                    <div class="text-sm text-gray-600">Opportunities Posted</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Rules Banner -->
<section class="py-4 bg-gradient-to-r from-primary to-accent text-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center justify-center space-y-2 md:space-y-0 md:space-x-6">
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle text-xl mr-2"></i>
                <span class="font-semibold">Same Rules Apply:</span>
            </div>
            <div class="flex flex-wrap justify-center gap-2">
                <span class="bg-white/20 px-3 py-1 rounded-full text-sm">Predefined communities only</span>
                <span class="bg-white/20 px-3 py-1 rounded-full text-sm">One WhatsApp group per community</span>
                <span class="bg-white/20 px-3 py-1 rounded-full text-sm">No in-app chat</span>
                <span class="bg-white/20 px-3 py-1 rounded-full text-sm">No member list display</span>
            </div>
        </div>
    </div>
</section>
<!-- Communities Grid -->
<section class="py-16 sm:py-20 bg-gray-50">
  <div class="container mx-auto px-4">

    <!-- Header -->
    <div class="text-center mb-12" data-aos="fade-up">
      <h2 class="text-3xl font-bold text-gray-800 mb-4">
        Professional Communities
      </h2>
      <p class="text-gray-600 max-w-2xl mx-auto">
        Join these pre-approved professional communities to network and grow
      </p>
    </div>

    <!-- MAIN GRID -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

      <!-- Institute Official Group -->
      <div class="bg-white rounded-2xl shadow-xl border border-blue-100 hover:shadow-2xl transition-all">
        <div class="p-6 sm:p-8">
          <div class="flex items-center space-x-4 mb-6">
            <div class="w-14 h-14 sm:w-16 sm:h-16 bg-blue-100 rounded-xl flex items-center justify-center">
              <i class="fas fa-university text-blue-600 text-2xl"></i>
            </div>
            <div>
              <h3 class="text-xl font-bold text-gray-800">Institute Official Group</h3>
              <span class="text-blue-600 font-semibold">Official Announcements</span>
            </div>
          </div>

          <ul class="space-y-3 mb-6 text-gray-700">
            <li class="flex items-center"><i class="fas fa-bullhorn text-blue-500 mr-3"></i>Official announcements</li>
            <li class="flex items-center"><i class="fas fa-calendar-check text-blue-500 mr-3"></i>Important dates</li>
            <li class="flex items-center"><i class="fas fa-file-alt text-blue-500 mr-3"></i>Policy updates</li>
            <li class="flex items-center"><i class="fas fa-users text-blue-500 mr-3"></i>Faculty-student updates</li>
          </ul>

          <button class="w-full bg-green-500 hover:bg-green-600 text-white py-3 sm:py-4 rounded-xl font-semibold transition-all">
            <i class="fab fa-whatsapp mr-2"></i>Join Official Group
          </button>
        </div>
      </div>

      <!-- Startup Community -->
      <div class="bg-white rounded-2xl shadow-xl border border-yellow-100 hover:shadow-2xl transition-all">
        <div class="p-6 sm:p-8">
          <div class="flex items-center space-x-4 mb-6">
            <div class="w-14 h-14 sm:w-16 sm:h-16 bg-yellow-100 rounded-xl flex items-center justify-center">
              <i class="fas fa-rocket text-yellow-600 text-2xl"></i>
            </div>
            <div>
              <h3 class="text-xl font-bold text-gray-800">Startup Community</h3>
              <span class="text-yellow-600 font-semibold">Innovation & Entrepreneurship</span>
            </div>
          </div>

          <ul class="space-y-3 mb-6 text-gray-700">
            <li class="flex items-center"><i class="fas fa-lightbulb text-yellow-500 mr-3"></i>Startup ideas</li>
            <li class="flex items-center"><i class="fas fa-users-cog text-yellow-500 mr-3"></i>Founder matching</li>
            <li class="flex items-center"><i class="fas fa-handshake-angle text-yellow-500 mr-3"></i>Collaboration</li>
            <li class="flex items-center"><i class="fas fa-chart-line text-yellow-500 mr-3"></i>Funding support</li>
          </ul>

          <button class="w-full bg-green-500 hover:bg-green-600 text-white py-3 sm:py-4 rounded-xl font-semibold transition-all">
            <i class="fab fa-whatsapp mr-2"></i>Join Startup Group
          </button>
        </div>
      </div>

      <!-- Research Community -->
      <div class="bg-white rounded-2xl shadow-xl border border-red-100 hover:shadow-2xl transition-all">
        <div class="p-6 sm:p-8">
          <div class="flex items-center space-x-4 mb-6">
            <div class="w-14 h-14 sm:w-16 sm:h-16 bg-red-100 rounded-xl flex items-center justify-center">
              <i class="fas fa-flask text-red-600 text-2xl"></i>
            </div>
            <div>
              <h3 class="text-xl font-bold text-gray-800">Research Community</h3>
              <span class="text-red-600 font-semibold">Academic Research</span>
            </div>
          </div>

          <ul class="space-y-3 mb-6 text-gray-700">
            <li class="flex items-center"><i class="fas fa-microscope text-red-500 mr-3"></i>Collaborations</li>
            <li class="flex items-center"><i class="fas fa-file-contract text-red-500 mr-3"></i>Publications</li>
            <li class="flex items-center"><i class="fas fa-graduation-cap text-red-500 mr-3"></i>Higher studies</li>
            <li class="flex items-center"><i class="fas fa-award text-red-500 mr-3"></i>Grants</li>
          </ul>

          <button class="w-full bg-green-500 hover:bg-green-600 text-white py-3 sm:py-4 rounded-xl font-semibold transition-all">
            <i class="fab fa-whatsapp mr-2"></i>Join Research Group
          </button>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- How It Works -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Professional Community Rules</h2>
                <p class="text-gray-600">Maintaining quality and purpose in professional networking</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center" data-aos="fade-up" data-aos-delay="0">
                    <div class="w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-user-check text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Predefined Only</h3>
                    <p class="text-gray-600">No auto-creation of communities. All groups are pre-approved and moderated.</p>
                </div>
                
                <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-20 h-20 bg-secondary/10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fab fa-whatsapp text-secondary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">One WhatsApp Group</h3>
                    <p class="text-gray-600">Each community has exactly one WhatsApp group for planning and coordination.</p>
                </div>
                
                <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-20 h-20 bg-accent/10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-handshake text-accent text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Professional Purpose</h3>
                    <p class="text-gray-600">All discussions must be professional and related to the community's purpose.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize counters
        const counters = document.querySelectorAll('.count-up');
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-count'));
            const countUp = new CountUp(counter, target, {
                duration: 2.5,
                separator: ','
            });
            countUp.start();
        });
        
        // Add hover animations to cards
        const cards = document.querySelectorAll('.bg-white.rounded-2xl');
        cards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                anime({
                    targets: card,
                    translateY: -10,
                    duration: 300,
                    easing: 'easeOutCubic'
                });
            });
            card.addEventListener('mouseleave', () => {
                anime({
                    targets: card,
                    translateY: 0,
                    duration: 300,
                    easing: 'easeOutCubic'
                });
            });
        });
        
        // Animate stats on scroll
        anime({
            targets: '.grid-cols-2 .bg-white',
            translateY: [30, 0],
            opacity: [0, 1],
            delay: anime.stagger(100),
            duration: 800,
            easing: 'easeOutCubic'
        });
    });
</script>

<?php include 'footer.php'; ?>