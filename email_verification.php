<?php
session_start();

// Handle Verification
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $otp = $_POST['otp'] ?? '';
    
    // Mock Verification Logic
    if (!empty($otp) && strlen($otp) >= 4) {
        // Assume correct
        header("Location: onboarding.php");
        exit();
    } else {
        $error = "Invalid code. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email - SI UNIVERSE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
    </style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl overflow-hidden m-4">
        <!-- Header -->
        <div class="bg-gradient-to-r from-primary to-secondary p-8 text-center text-white">
            <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center mx-auto mb-4 backdrop-blur-sm">
                <i class="fas fa-envelope-open-text text-3xl"></i>
            </div>
            <h1 class="text-2xl font-bold">Check Your Email</h1>
            <p class="text-blue-100 mt-2">We sent a verification code to your email</p>
        </div>

        <!-- Form -->
        <div class="p-8">
            <?php if (isset($error)): ?>
                <div class="bg-red-50 text-red-600 p-3 rounded-lg mb-6 text-sm flex items-center">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-semibold mb-2" for="otp">
                        Verification Code
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-key text-gray-400"></i>
                        </div>
                        <input class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-colors tracking-widest text-lg" 
                               id="otp" type="text" name="otp" placeholder="Enter code" required>
                    </div>
                </div>

                <button type="submit" class="w-full bg-primary hover:bg-secondary text-white font-bold py-3 px-4 rounded-lg transition-all transform hover:-translate-y-0.5 shadow-lg hover:shadow-xl">
                    Verify Email
                </button>
                
                <div class="mt-6 text-center">
                    <p class="text-gray-600 text-sm">Didn't receive the code? <button type="button" class="text-primary font-bold hover:text-secondary hover:underline">Resend</button></p>
                </div>
                
                <div class="mt-4 text-center">
                     <a href="signup.php" class="text-gray-400 text-sm hover:text-gray-600"><i class="fas fa-arrow-left mr-1"></i> Back to Signup</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
