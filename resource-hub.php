<?php
session_start();

include 'includes/header.php';
$p = $_SESSION['onboarding_data'] ?? null;
$user_inst = $p['institute'] ?? 'SIT';
$user_course = $p['course'] ?? 'B.Tech';
$user_sec = $p['section'] ?? 'Section A';
$is_cr = false; // Mocking CR status
?>

<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-secondary/10 to-primary/10 py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
            <div class="inline-flex items-center space-x-2 bg-white/80 backdrop-blur-sm px-4 py-2 rounded-full mb-6">
                <i class="fas fa-lock text-primary"></i>
                <span class="text-gray-700 font-medium">Access Controlled: <?= $user_inst ?> - <?= $user_course ?> Only</span>
            </div>
            <h1 class="text-4xl font-bold text-gray-800 mb-6">Resource Hub</h1>
            <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
                Official academic resources for your course and section. Read-only for students.
            </p>
            
            <div class="bg-blue-50 border border-blue-100 p-4 rounded-2xl inline-flex flex-col items-center">
                <span class="text-xs font-bold text-blue-400 uppercase tracking-widest mb-1">Your Access Layer</span>
                <span class="text-lg font-bold text-blue-800"><?= $user_course ?> (<?= $user_sec ?>)</span>
            </div>
        </div>
    </div>
</section>

<!-- Access Control Info -->
<!--  <?php if (!$is_cr): ?> 
<section class="py-4 bg-amber-50 border-y border-amber-100">
    <div class="container mx-auto px-4 text-center">
        <p class="text-amber-800 text-sm font-medium">
            <i class="fas fa-info-circle mr-2"></i> Only Class Representatives can upload. You have <strong>View-Only</strong> access.
        </p>
    </div>
</section>
<?php endif; ?> -->

<!-- Resources Section -->
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        
        <?php if ($is_cr): ?>
        <!-- Upload Section (CR Only) -->
        <div class="mb-12">
           <!-- ... CR upload form code ... -->
        </div>
        <?php endif; ?>
        
        <!-- Category Filters -->
        <div class="mb-12 overflow-x-auto pb-4 -mx-4 px-4 scrollbar-hide">
            <div class="flex items-center space-x-3 min-w-max">
                <!-- <button class="bg-primary text-white px-6 py-2.5 rounded-full font-medium shadow-md shadow-primary/20 transition-all text-sm">
                    All Resources
                </button> -->
                <button class="bg-white text-gray-600 border border-gray-200 px-6 py-2.5 rounded-full font-medium hover:border-primary hover:text-primary transition-all text-sm shadow-sm">
                    Timetable
                </button>
                <button class="bg-white text-gray-600 border border-gray-200 px-6 py-2.5 rounded-full font-medium hover:border-primary hover:text-primary transition-all text-sm shadow-sm">
                    Syllabus
                </button>
                <button class="bg-white text-gray-600 border border-gray-200 px-6 py-2.5 rounded-full font-medium hover:border-primary hover:text-primary transition-all text-sm shadow-sm">
                    Curriculum
                </button>
                <button class="bg-white text-gray-600 border border-gray-200 px-6 py-2.5 rounded-full font-medium hover:border-primary hover:text-primary transition-all text-sm shadow-sm">
                    Holiday Schedule
                </button>
                    
            </div>
        </div>
        
        <!-- Resources Display -->
        <div class="py-20 text-center" data-aos="fade-up">
            <div class="w-32 h-32 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-8">
                <i class="fas fa-folder-open text-gray-300 text-5xl"></i>
            </div>
            <h2 class="text-3xl font-bold text-gray-800 mb-4">No resources yet</h2>
            <p class="text-gray-500 max-w-md mx-auto text-lg">
                Your Class Representative hasn't uploaded any academic resources for <?= $user_course ?> (<?= $user_sec ?>) yet.
            </p>
            <?php if ($is_cr): ?>
            <div class="mt-8">
                <p class="text-primary font-medium mb-4">As a CR, you can be the first to share!</p>
                <button class="bg-primary text-white px-8 py-3 rounded-xl font-bold hover:shadow-lg transition-all">
                    <i class="fas fa-plus mr-2"></i> Upload First Resource
                </button>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Rules Section -->
<!-- <section class="py-12 bg-white border-t border-gray-200">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Resource Hub Rules</h3>
            
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-gray-50 rounded-xl p-6">
                    <h4 class="font-bold text-gray-800 mb-3 flex items-center">
                        <i class="fas fa-upload text-primary mr-2"></i>
                        Upload Rules
                    </h4>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Only Class Representatives can upload</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Allowed: PDF and Images only</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Max file size: 10MB per upload</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Official academic resources only</span>
                        </li>
                    </ul>
                </div> -->
                
                <!-- <div class="bg-gray-50 rounded-xl p-6">
                    <h4 class="font-bold text-gray-800 mb-3 flex items-center">
                        <i class="fas fa-eye text-secondary mr-2"></i>
                        Access Rules
                    </h4>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Students see only their course resources</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>No cross-course sharing allowed</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Same course + same section → shared resources</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Resources are class-level, not user-specific</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section> -->

<?php include 'includes/footer.php'; ?>