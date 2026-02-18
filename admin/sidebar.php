<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<aside class="w-64 bg-slate-900 min-h-screen text-white flex flex-col fixed left-0 top-0 z-50 transition-all duration-300 hidden lg:flex" id="sidebar">
    <div class="p-6 flex items-center space-x-3 border-b border-slate-800">
        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/20">
            <i class="fas fa-shield-alt text-white"></i>
        </div>
        <div>
            <h2 class="text-lg font-bold tracking-tight">SIU Admin</h2>
            <p class="text-[10px] text-slate-400 uppercase tracking-widest font-semibold">Command Center</p>
        </div>
    </div>

    <nav class="flex-1 px-4 py-8 space-y-2">
        <a href="index.php" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-200 <?php echo ($current_page == 'index.php') ? 'bg-blue-600/10 text-blue-400 border border-blue-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white'; ?>">
            <i class="fas fa-th-large w-5"></i>
            <span class="font-medium">Dashboard</span>
        </a>

        <a href="users.php" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-200 <?php echo ($current_page == 'users.php') ? 'bg-blue-600/10 text-blue-400 border border-blue-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white'; ?>">
            <i class="fas fa-users w-5"></i>
            <span class="font-medium">User Management</span>
        </a>

        <a href="communities.php" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-200 <?php echo ($current_page == 'communities.php') ? 'bg-blue-600/10 text-blue-400 border border-blue-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white'; ?>">
            <i class="fab fa-whatsapp w-5"></i>
            <span class="font-medium">WhatsApp Groups</span>
        </a>

        <a href="content.php" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-200 <?php echo ($current_page == 'content.php') ? 'bg-blue-600/10 text-blue-400 border border-blue-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white'; ?>">
            <i class="fas fa-home w-5"></i>
            <span class="font-medium">Explore Stays</span>
        </a>

        <div class="pt-6 pb-2">
            <span class="px-4 text-[10px] text-slate-500 uppercase tracking-widest font-bold">System</span>
        </div>

        <a href="../index.php" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition-all duration-200">
            <i class="fas fa-external-link-alt w-5"></i>
            <span class="font-medium">View Website</span>
        </a>

        <a href="../logout.php" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-red-400 hover:bg-red-500/10 transition-all duration-200">
            <i class="fas fa-sign-out-alt w-5"></i>
            <span class="font-medium">Logout</span>
        </a>
    </nav>

    <div class="p-4 border-t border-slate-800">
        <div class="bg-slate-800/50 rounded-2xl p-4 flex items-center space-x-3">
            <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-xs font-bold text-white shadow-lg">
                <?php echo substr($_SESSION['user_name'] ?? 'A', 0, 1); ?>
            </div>
            <div class="overflow-hidden">
                <p class="text-sm font-bold truncate"><?php echo $_SESSION['user_name'] ?? 'Admin'; ?></p>
                <p class="text-[10px] text-slate-500 truncate"><?php echo $_SESSION['user_email'] ?? 'admin@siu.edu.in'; ?></p>
            </div>
        </div>
    </div>
</aside>

<style>
    /* Prevent horizontal scroll and ensure fixed positioning works correctly */
    html, body {
        max-width: 100vw;
        overflow-x: hidden;
    }
    .mobile-nav-active {
        padding-bottom: 70px !important;
    }
    @media (min-width: 1024px) {
        .mobile-nav-active {
            padding-bottom: 0 !important;
        }
    }
</style>

<!-- Mobile Bottom Navigation -->
<div class="lg:hidden fixed bottom-0 left-0 right-0 z-[9999] w-full bg-slate-900 border-t border-slate-800 shadow-[0_-4px_20px_rgba(0,0,0,0.3)]">
    <nav class="px-4 sm:px-6 py-3 flex justify-between items-center w-full max-w-full overflow-hidden">
        <a href="index.php" class="flex flex-col items-center space-y-1 min-w-[60px] <?php echo ($current_page == 'index.php') ? 'text-blue-400 font-bold' : 'text-slate-500'; ?>">
            <i class="fas fa-th-large text-lg"></i>
            <span class="text-[9px] uppercase tracking-tighter">Dash</span>
        </a>
        <a href="users.php" class="flex flex-col items-center space-y-1 min-w-[60px] <?php echo ($current_page == 'users.php') ? 'text-blue-400 font-bold' : 'text-slate-500'; ?>">
            <i class="fas fa-users text-lg"></i>
            <span class="text-[9px] uppercase tracking-tighter">Users</span>
        </a>
        <a href="communities.php" class="flex flex-col items-center space-y-1 min-w-[60px] <?php echo ($current_page == 'communities.php') ? 'text-blue-400 font-bold' : 'text-slate-500'; ?>">
            <i class="fab fa-whatsapp text-lg"></i>
            <span class="text-[9px] uppercase tracking-tighter">Groups</span>
        </a>
        <a href="content.php" class="flex flex-col items-center space-y-1 min-w-[60px] <?php echo ($current_page == 'content.php') ? 'text-blue-400 font-bold' : 'text-slate-500'; ?>">
            <i class="fas fa-house-user text-lg"></i>
            <span class="text-[9px] uppercase tracking-tighter">Stays</span>
        </a>
        <a href="../logout.php" class="flex flex-col items-center space-y-1 min-w-[60px] text-red-400/80">
            <i class="fas fa-sign-out-alt text-lg"></i>
            <span class="text-[9px] uppercase tracking-tighter">Exit</span>
        </a>
    </nav>
</div>

<script>
    // Robust check to add padding to body if mobile nav is visible
    document.addEventListener('DOMContentLoaded', function() {
        if (window.innerWidth < 1024) {
            document.body.classList.add('mobile-nav-active');
        }
        window.addEventListener('resize', function() {
            if (window.innerWidth < 1024) {
                document.body.classList.add('mobile-nav-active');
            } else {
                document.body.classList.remove('mobile-nav-active');
            }
        });
    });
</script>



