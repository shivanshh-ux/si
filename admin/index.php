<?php
require_once 'auth-check.php';

// Mock Stats
$stats = [
    'total_users' => 1250,
    'active_communities' => 45,
    'total_resources' => 86, // Representing total stay listings
    'pending_reports' => 3
];

// Mock Recent Activity
$activities = [
    ['user' => 'Rahul Sharma', 'action' => 'added new PG "Malti Kunj"', 'time' => '2 mins ago'],
    ['user' => 'Admin', 'action' => 'verified "Sunshine Flats" listing', 'time' => '1 hour ago'],
    ['user' => 'Sunil PG', 'action' => 'updated rent for "Yukio Pg"', 'time' => '3 hours ago'],
    ['user' => 'Vikas Kor', 'action' => 'added "Green Valley" Flat', 'time' => '5 hours ago'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SIU Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen">

    <?php include 'sidebar.php'; ?>

    <main class="ml-0 lg:ml-64 p-4 md:p-8 pb-24 lg:pb-8">
        <!-- Header -->
        <header class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 space-y-4 md:space-y-0">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Operational Overview</h1>
                <p class="text-slate-500 text-sm italic">Welcome back, Administrator.</p>
            </div>
            <div class="flex items-center space-x-4 w-full md:w-auto justify-between md:justify-end">
                <button class="bg-white p-2.5 rounded-xl border border-slate-200 text-slate-500 hover:text-slate-800 transition-all shadow-sm">
                    <i class="fas fa-bell"></i>
                </button>
                <div class="h-10 w-px bg-slate-200 mx-2 hidden md:block"></div>
                <div class="flex items-center space-x-3 bg-white p-1.5 pr-4 rounded-xl border border-slate-200 shadow-sm">
                    <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-xs capitalize">
                        <?php echo substr($_SESSION['user_name'] ?? 'A', 0, 1); ?>
                    </div>
                    <span class="text-sm font-semibold text-slate-700"><?php echo $_SESSION['user_name'] ?? 'Admin'; ?></span>
                </div>
            </div>
        </header>


        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <!-- Total Users -->
            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all group">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                    <span class="text-xs font-bold text-green-500 bg-green-50 px-2 py-1 rounded-lg">+12%</span>
                </div>
                <h3 class="text-slate-500 text-sm font-medium">Total Students</h3>
                <p class="text-3xl font-bold text-slate-800 mt-1"><?php echo number_format($stats['total_users']); ?></p>
            </div>

            <!-- Active Communities -->
            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all group">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-12 h-12 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center group-hover:bg-green-600 group-hover:text-white transition-all duration-300">
                        <i class="fab fa-whatsapp text-xl"></i>
                    </div>
                    <span class="text-xs font-bold text-green-500 bg-green-50 px-2 py-1 rounded-lg">+4</span>
                </div>
                <h3 class="text-slate-500 text-sm font-medium">Verified Groups</h3>
                <p class="text-3xl font-bold text-slate-800 mt-1"><?php echo $stats['active_communities']; ?></p>
            </div>

            <!-- Explore Stays -->
            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all group">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center group-hover:bg-purple-600 group-hover:text-white transition-all duration-300">
                        <i class="fas fa-file-alt text-xl"></i>
                    </div>
                    <span class="text-xs font-bold text-purple-500 bg-purple-50 px-2 py-1 rounded-lg">Stable</span>
                </div>
                <h3 class="text-slate-500 text-sm font-medium">Stays Active</h3>
                <p class="text-3xl font-bold text-slate-800 mt-1"><?php echo $stats['total_resources']; ?></p>
            </div>

            <!-- Pending Reports -->
            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all group">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-12 h-12 bg-red-50 text-red-600 rounded-2xl flex items-center justify-center group-hover:bg-red-600 group-hover:text-white transition-all duration-300">
                        <i class="fas fa-exclamation-triangle text-xl"></i>
                    </div>
                    <?php if ($stats['pending_reports'] > 0): ?>
                        <span class="text-xs font-bold text-red-500 bg-red-50 px-2 py-1 rounded-lg">Action Required</span>
                    <?php endif; ?>
                </div>
                <h3 class="text-slate-500 text-sm font-medium">Admin Alerts</h3>
                <p class="text-3xl font-bold text-slate-800 mt-1"><?php echo $stats['pending_reports']; ?></p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Recent Activity -->
            <div class="lg:col-span-2 bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-50 flex justify-between items-center">
                    <h2 class="font-bold text-slate-800 text-lg">System Audit Log</h2>
                    <button class="text-blue-600 text-sm font-bold hover:underline">View All</button>
                </div>
                <div class="p-6">
                    <div class="space-y-6">
                        <?php foreach($activities as $activity): ?>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 font-bold text-xs uppercase">
                                    <?php echo substr($activity['user'], 0, 1); ?>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-slate-800"><?php echo $activity['user']; ?></p>
                                    <p class="text-xs text-slate-500"><?php echo $activity['action']; ?></p>
                                </div>
                            </div>
                            <span class="text-[10px] font-bold text-slate-400 bg-slate-50 px-2 py-1 rounded-md"><?php echo $activity['time']; ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6">
                <h2 class="font-bold text-slate-800 text-lg mb-6">Quick Actions</h2>
                <div class="grid grid-cols-1 gap-4">
                    <button class="flex items-center space-x-4 p-4 rounded-2xl bg-blue-50 text-blue-700 hover:bg-blue-600 hover:text-white transition-all group">
                        <div class="w-10 h-10 bg-white/50 rounded-xl flex items-center justify-center group-hover:bg-white/20">
                            <i class="fas fa-plus"></i>
                        </div>
                        <span class="font-bold">Add New Community</span>
                    </button>
                    <button class="flex items-center space-x-4 p-4 rounded-2xl bg-slate-50 text-slate-700 hover:bg-slate-800 hover:text-white transition-all group">
                        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center group-hover:bg-white/20">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <span class="font-bold">Register Student</span>
                    </button>
                    <button class="flex items-center space-x-4 p-4 rounded-2xl bg-slate-50 text-slate-700 hover:bg-slate-800 hover:text-white transition-all group">
                        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center group-hover:bg-white/20">
                            <i class="fas fa-house-user"></i>
                        </div>
                        <span class="font-bold">Manage Stays</span>
                    </button>
                </div>

                <div class="mt-8 bg-gradient-to-br from-slate-900 to-slate-800 rounded-2xl p-6 text-white overflow-hidden relative">
                    <div class="relative z-10">
                        <p class="text-[10px] text-slate-400 uppercase tracking-widest font-bold mb-2">Notice</p>
                        <h3 class="font-bold mb-2">Summer 2026 Batch</h3>
                        <p class="text-xs text-slate-400 leading-relaxed">Update the onboarding flow for upcoming SIT batch onboarding scheduled for May.</p>
                    </div>
                    <i class="fas fa-graduation-cap absolute -bottom-4 -right-4 text-white/5 text-8xl transform -rotate-12"></i>
                </div>
            </div>
        </div>
    </main>

</body>
</html>
