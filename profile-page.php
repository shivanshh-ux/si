<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include 'header.php';

$p = $_SESSION['onboarding_data'] ?? [
    'accommodation' => 'Not set',
    'campus' => 'Not set',
    'institute' => 'Not set',
    'course' => 'Not set',
    'year' => 'Not set',
    'gym' => 'Not set',
    'country' => 'India'
];
?>

<div class="container mx-auto px-4 py-12 max-w-4xl">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden mb-8">
        <div class="bg-gradient-to-r from-primary to-secondary p-8 text-white relative">
            <div class="flex flex-col md:flex-row items-center md:items-end space-y-4 md:space-y-0 md:space-x-6">
                <div class="w-24 h-24 bg-white/20 rounded-2xl backdrop-blur-md flex items-center justify-center text-4xl border border-white/30">
                    <i class="fas fa-user"></i>
                </div>
                <div>
                    <h1 class="text-3xl font-bold"><?php echo $_SESSION['user_name'] ?? 'User Name'; ?></h1>
                    <p class="text-blue-100"><?php echo $p['course']; ?> • <?php echo $p['institute']; ?></p>
                </div>
            </div>
            <a href="onboarding.php" class="absolute top-8 right-8 bg-white/10 hover:bg-white/20 p-2 rounded-lg backdrop-blur-sm transition-all text-sm border border-white/20">
                <i class="fas fa-edit mr-1"></i> Edit Profile
            </a>
        </div>

        <div class="p-8">
            <h2 class="text-xl font-bold text-gray-800 mb-6 border-b pb-4">Personal Details</h2>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="space-y-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-building"></i>
                        </div>
                        <div>
                            <span class="block text-xs text-gray-500 uppercase font-bold tracking-wider">Accommodation</span>
                            <span class="text-gray-800 font-semibold"><?php echo $p['accommodation']; ?></span>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <span class="block text-xs text-gray-500 uppercase font-bold tracking-wider">Campus Location</span>
                            <span class="text-gray-800 font-semibold"><?php echo $p['campus']; ?></span>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-university"></i>
                        </div>
                        <div>
                            <span class="block text-xs text-gray-500 uppercase font-bold tracking-wider">Institute & Section</span>
                            <span class="text-gray-800 font-semibold"><?php echo $p['institute']; ?> (<?php echo $p['section'] ?? 'A'; ?>)</span>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-calendar"></i>
                        </div>
                        <div>
                            <span class="block text-xs text-gray-500 uppercase font-bold tracking-wider">Year of Study</span>
                            <span class="text-gray-800 font-semibold">Year <?php echo $p['year']; ?></span>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-dumbbell"></i>
                        </div>
                        <div>
                            <span class="block text-xs text-gray-500 uppercase font-bold tracking-wider">Gym Preference</span>
                            <span class="text-gray-800 font-semibold"><?php echo $p['gym']; ?></span>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-flag"></i>
                        </div>
                        <div>
                            <span class="block text-xs text-gray-500 uppercase font-bold tracking-wider">Origin</span>
                            <span class="text-gray-800 font-semibold"><?php echo ($p['country'] == 'India' ? 'India' : 'International Student'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-blue-50 p-6 rounded-2xl border border-blue-100 flex items-start space-x-4">
        <i class="fas fa-info-circle text-blue-500 mt-1"></i>
        <p class="text-sm text-blue-800">
            This information is used to automatically assign you to relevant campus communities. Only students in your institute can see your profile searching by name.
        </p>
    </div>
</div>

<?php include 'footer.php'; ?>
