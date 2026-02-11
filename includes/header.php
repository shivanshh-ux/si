<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Primary Meta Tags -->
    <title>SIU UNIVERSE - Student Community Platform</title>
    <meta name="description" content="SIU UNIVERSE: Decide online. Meet offline. Verified student communities for SI students since 2026.">
    <meta name="keywords" content="student community, SI University, hostel students, day scholars, PG students, academic resources, professional communities">
    <meta name="author" content="SIU UNIVERSE">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://siuniverse.edu/">
    <meta property="og:title" content="SIU UNIVERSE - Student Community Platform">
    <meta property="og:description" content="Decide online. Meet offline. Verified student communities for SI students since 2026.">
    <meta property="og:image" content="https://siuniverse.edu/assets/images/og-image.jpg">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large-image">
    <meta property="twitter:url" content="https://siuniverse.edu/">
    <meta property="twitter:title" content="SIU UNIVERSE - Student Community Platform">
    <meta property="twitter:description" content="Decide online. Meet offline. Verified student communities for SI students since 2026.">
    <meta property="twitter:image" content="https://siuniverse.edu/assets/images/og-image.jpg">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
    
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3B82F6',
                        secondary: '#1E40AF',
                        accent: '#F59E0B',
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    </style>
</head>
<body class="bg-gray-50 font-sans pb-20 md:pb-0">
    <!-- Navigation -->
    <nav class="fixed w-full bg-white shadow-sm z-50 top-0">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="index.php" class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-gradient-to-r from-primary to-secondary rounded-lg flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-white text-sm"></i>
                    </div>
                    <span class="text-xl font-bold text-gray-800">SIU UNIVERSE</span>
                    <span class="text-xs bg-accent text-white px-2 py-1 rounded-full">Est. 2026</span>
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <?php
                    $current_page = basename($_SERVER['PHP_SELF']);
                    $pages = [
                        'index.php' => ['name' => 'Home', 'icon' => 'fa-home'],
                        'discover.php' => ['name' => 'Discover', 'icon' => 'fa-search'],
                        'resource-hub.php' => ['name' => 'Resources', 'icon' => 'fa-book'],
                        'professional-communities.php' => ['name' => 'Professional', 'icon' => 'fa-briefcase']
                    ];
                    
                    foreach ($pages as $page => $info):
                        $is_active = $current_page === $page;
                    ?>
                    <a href="<?php echo $page; ?>" class="text-gray-600 hover:text-primary transition-colors <?php echo $is_active ? 'text-primary font-semibold' : 'font-medium'; ?>">
                        <?php echo $info['name']; ?>
                    </a>
                    <?php endforeach; ?>
                    
                    <!-- Login Button / Profile Icon -->
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <div class="flex items-center space-x-6">
                            <?php if ($_SESSION['user_id'] == 1): ?>
                                <a href="admin/index.php" class="text-secondary hover:text-primary transition-colors font-bold text-sm bg-blue-50 px-3 py-1.5 rounded-lg flex items-center">
                                    <i class="fas fa-shield-alt mr-2"></i> Admin
                                </a>
                            <?php endif; ?>
                            <a href="profile-page.php" class="text-gray-600 hover:text-primary transition-colors flex items-center">
                                <i class="fas fa-user-circle text-2xl"></i>
                            </a>
                        </div>
                    <?php else: ?>
                        <a href="login.php" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-secondary transition-colors font-medium">
                            <i class="fab fa-google mr-2"></i>Login
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
                        
    <!-- Mobile Account Link (Bottom) -->
    <div class="md:hidden fixed bottom-0 left-0 w-full bg-white border-t border-gray-200 z-50 px-6 py-3 flex justify-between items-center shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)]">
        <?php
        foreach ($pages as $page => $info):
            $is_active = $current_page === $page;
        ?>
        <a href="<?php echo $page; ?>" class="flex flex-col items-center space-y-1 <?php echo $is_active ? 'text-primary' : 'text-gray-400 hover:text-gray-600'; ?>">
            <i class="fas <?php echo $info['icon']; ?> text-xl"></i>
            <span class="text-xs font-medium"><?php echo $info['name']; ?></span>
        </a>
        <?php endforeach; ?>
        
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="profile-page.php" class="flex flex-col items-center space-y-1 <?php echo ($current_page === 'profile-page.php') ? 'text-primary' : 'text-gray-400'; ?>">
                <i class="fas fa-user-circle text-xl"></i>
                <span class="text-xs font-medium">Profile</span>
            </a>
        <?php else: ?>
            <a href="login.php" class="flex flex-col items-center space-y-1 text-gray-400">
                <i class="fas fa-user-circle text-xl"></i>
                <span class="text-xs font-medium">Login</span>
            </a>
        <?php endif; ?>
    </div>

    <!-- Main Content -->
    <main class="pt-16">

    <script>
        // Initialize AOS if available
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 600,
                once: true
            });
        }
    </script>