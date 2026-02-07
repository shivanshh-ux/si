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
<?php if (!$is_cr): ?>
<section class="py-4 bg-amber-50 border-y border-amber-100">
    <div class="container mx-auto px-4 text-center">
        <p class="text-amber-800 text-sm font-medium">
            <i class="fas fa-info-circle mr-2"></i> Only Class Representatives can upload. You have <strong>View-Only</strong> access.
        </p>
    </div>
</section>
<?php endif; ?>

<!-- Resources Section -->
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        
        <?php if ($is_cr): ?>
        <!-- Upload Section (CR Only) -->
        <div class="mb-12">
           <!-- ... CR upload form code ... -->
        </div>
        <?php endif; ?>
        
        <!-- Resources Display -->
        <div>
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">My Resources</h2>
                    <p class="text-gray-600">Files shared by your CR for <?= $user_sec ?></p>
                </div>
                <div class="flex space-x-2">
                    <span class="bg-primary/10 text-primary px-3 py-1 rounded-full text-xs font-bold"><?= $user_inst ?></span>
                    <span class="bg-secondary/10 text-secondary px-3 py-1 rounded-full text-xs font-bold"><?= $user_course ?></span>
                </div>
            </div>
            
            <!-- Resources Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6" id="resourcesGrid">
                <!-- Resource Card (Mocked for current user's profile) -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-all p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-red-50 text-red-500 rounded-xl flex items-center justify-center">
                            <i class="fas fa-file-pdf text-xl"></i>
                        </div>
                        <span class="text-[10px] font-bold text-gray-400 bg-gray-50 px-2 py-1 rounded uppercase"><?= $user_sec ?></span>
                    </div>
                    <h3 class="font-bold text-gray-800 mb-1">Semester 1 Timetable</h3>
                    <p class="text-xs text-gray-500 mb-4">Uploaded by CR • 2 days ago</p>
                    <button class="w-full bg-primary/5 hover:bg-primary/10 text-primary py-2.5 rounded-xl font-bold text-sm transition-all flex items-center justify-center">
                        <i class="fas fa-download mr-2"></i> Download PDF
                    </button>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-all p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-blue-50 text-blue-500 rounded-xl flex items-center justify-center">
                            <i class="fas fa-book text-xl"></i>
                        </div>
                        <span class="text-[10px] font-bold text-gray-400 bg-gray-50 px-2 py-1 rounded uppercase"><?= $user_sec ?></span>
                    </div>
                    <h3 class="font-bold text-gray-800 mb-1">Subject Syllabus (All)</h3>
                    <p class="text-xs text-gray-500 mb-4">Uploaded by Admin • 1 week ago</p>
                    <button class="w-full bg-primary/5 hover:bg-primary/10 text-primary py-2.5 rounded-xl font-bold text-sm transition-all flex items-center justify-center">
                        <i class="fas fa-download mr-2"></i> Download ZIP
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
        
        <!-- Resources Display -->
        <div data-aos="fade-up" data-aos-delay="100">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Course Resources</h2>
                    <p class="text-gray-600">Available resources for selected course</p>
                </div>
                <div class="text-sm text-gray-500">
                    <i class="fas fa-filter mr-1"></i>
                    Showing: <span id="selectedCourse">All Courses</span>
                </div>
            </div>
            
            <!-- Resources Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6" id="resourcesGrid">
                <!-- Resource Card 1 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition-shadow" data-course="mba">
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-file-pdf text-red-600 text-xl"></i>
                                </div>
                                <div>
                                    <span class="bg-red-100 text-red-600 px-2 py-1 rounded text-xs font-semibold">PDF</span>
                                    <h3 class="font-bold text-gray-800 mt-1">MBA Semester 1 Timetable</h3>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-2 mb-4">
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-calendar mr-2"></i>
                                <span>Updated: 15 Jan 2024</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-user-tie mr-2"></i>
                                <span>Uploaded by: CR - MBA Section A</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-graduation-cap mr-2"></i>
                                <span>Course: MBA</span>
                            </div>
                        </div>
                        <button class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 py-3 rounded-lg font-medium transition-colors">
                            <i class="fas fa-download mr-2"></i>Download (2.4 MB)
                        </button>
                    </div>
                </div>
                
                <!-- Resource Card 2 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition-shadow" data-course="mba">
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-image text-blue-600 text-xl"></i>
                                </div>
                                <div>
                                    <span class="bg-blue-100 text-blue-600 px-2 py-1 rounded text-xs font-semibold">Image</span>
                                    <h3 class="font-bold text-gray-800 mt-1">Academic Calendar 2024</h3>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-2 mb-4">
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-calendar mr-2"></i>
                                <span>Updated: 10 Jan 2024</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-user-tie mr-2"></i>
                                <span>Uploaded by: CR - MBA Section B</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-graduation-cap mr-2"></i>
                                <span>Course: MBA</span>
                            </div>
                        </div>
                        <button class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 py-3 rounded-lg font-medium transition-colors">
                            <i class="fas fa-download mr-2"></i>Download (1.8 MB)
                        </button>
                    </div>
                </div>
                
                <!-- Resource Card 3 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition-shadow" data-course="mtech">
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-file-pdf text-red-600 text-xl"></i>
                                </div>
                                <div>
                                    <span class="bg-red-100 text-red-600 px-2 py-1 rounded text-xs font-semibold">PDF</span>
                                    <h3 class="font-bold text-gray-800 mt-1">MTech Syllabus - AI Specialization</h3>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-2 mb-4">
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-calendar mr-2"></i>
                                <span>Updated: 5 Jan 2024</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-user-tie mr-2"></i>
                                <span>Uploaded by: CR - MTech</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-graduation-cap mr-2"></i>
                                <span>Course: MTech</span>
                            </div>
                        </div>
                        <button class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 py-3 rounded-lg font-medium transition-colors">
                            <i class="fas fa-download mr-2"></i>Download (3.2 MB)
                        </button>
                    </div>
                </div>
                
                <!-- Resource Card 4 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition-shadow" data-course="mca">
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-file-pdf text-red-600 text-xl"></i>
                                </div>
                                <div>
                                    <span class="bg-red-100 text-red-600 px-2 py-1 rounded text-xs font-semibold">PDF</span>
                                    <h3 class="font-bold text-gray-800 mt-1">MCA Lab Schedule</h3>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-2 mb-4">
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-calendar mr-2"></i>
                                <span>Updated: 12 Jan 2024</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-user-tie mr-2"></i>
                                <span>Uploaded by: CR - MCA</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-graduation-cap mr-2"></i>
                                <span>Course: MCA</span>
                            </div>
                        </div>
                        <button class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 py-3 rounded-lg font-medium transition-colors">
                            <i class="fas fa-download mr-2"></i>Download (1.5 MB)
                        </button>
                    </div>
                </div>
                
                <!-- Resource Card 5 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition-shadow" data-course="btech">
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-file-alt text-green-600 text-xl"></i>
                                </div>
                                <div>
                                    <span class="bg-green-100 text-green-600 px-2 py-1 rounded text-xs font-semibold">Curriculum</span>
                                    <h3 class="font-bold text-gray-800 mt-1">BTech Course Structure</h3>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-2 mb-4">
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-calendar mr-2"></i>
                                <span>Updated: 8 Jan 2024</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-user-tie mr-2"></i>
                                <span>Uploaded by: CR - BTech</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-graduation-cap mr-2"></i>
                                <span>Course: BTech</span>
                            </div>
                        </div>
                        <button class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 py-3 rounded-lg font-medium transition-colors">
                            <i class="fas fa-download mr-2"></i>Download (4.1 MB)
                        </button>
                    </div>
                </div>
                
                <!-- Resource Card 6 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition-shadow" data-course="bba">
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-holiday text-purple-600 text-xl"></i>
                                </div>
                                <div>
                                    <span class="bg-purple-100 text-purple-600 px-2 py-1 rounded text-xs font-semibold">Schedule</span>
                                    <h3 class="font-bold text-gray-800 mt-1">BBA Holiday Schedule 2024</h3>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-2 mb-4">
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-calendar mr-2"></i>
                                <span>Updated: 3 Jan 2024</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-user-tie mr-2"></i>
                                <span>Uploaded by: CR - BBA</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-graduation-cap mr-2"></i>
                                <span>Course: BBA</span>
                            </div>
                        </div>
                        <button class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 py-3 rounded-lg font-medium transition-colors">
                            <i class="fas fa-download mr-2"></i>Download (0.8 MB)
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Empty State -->
            <div id="noResources" class="hidden text-center py-12">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-folder-open text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">No resources found</h3>
                <p class="text-gray-600">Select a course to view available resources</p>
            </div>
        </div>
    </div>
</section>

<!-- Rules Section -->
<section class="py-12 bg-white border-t border-gray-200">
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
                </div>
                
                <div class="bg-gray-50 rounded-xl p-6">
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
</section>

<script>
    // Course filter functionality
    document.addEventListener('DOMContentLoaded', function() {
        const courseSelect = document.getElementById('courseSelect');
        const selectedCourse = document.getElementById('selectedCourse');
        const resources = document.querySelectorAll('[data-course]');
        const noResources = document.getElementById('noResources');
        const resourcesGrid = document.getElementById('resourcesGrid');
        
        function filterResources() {
            const selectedValue = courseSelect.value;
            
            if (selectedValue === '') {
                selectedCourse.textContent = 'All Courses';
                resources.forEach(resource => {
                    resource.style.display = 'block';
                });
                noResources.classList.add('hidden');
                resourcesGrid.classList.remove('hidden');
                return;
            }
            
            selectedCourse.textContent = courseSelect.options[courseSelect.selectedIndex].text;
            
            let foundAny = false;
            resources.forEach(resource => {
                if (resource.getAttribute('data-course') === selectedValue) {
                    resource.style.display = 'block';
                    foundAny = true;
                    
                    // Animate display
                    anime({
                        targets: resource,
                        scale: [0.9, 1],
                        opacity: [0, 1],
                        duration: 300,
                        easing: 'easeOutCubic'
                    });
                } else {
                    resource.style.display = 'none';
                }
            });
            
            if (foundAny) {
                noResources.classList.add('hidden');
                resourcesGrid.classList.remove('hidden');
            } else {
                resourcesGrid.classList.add('hidden');
                noResources.classList.remove('hidden');
                
                anime({
                    targets: noResources,
                    scale: [0.9, 1],
                    opacity: [0, 1],
                    duration: 500,
                    easing: 'easeOutCubic'
                });
            }
        }
        
        courseSelect.addEventListener('change', filterResources);
        
        // Initial animation for upload section
        anime({
            targets: '.border-l-4',
            translateX: [-20, 0],
            opacity: [0, 1],
            duration: 800,
            easing: 'easeOutCubic'
        });
    });
</script>

<?php include 'includes/footer.php'; ?>