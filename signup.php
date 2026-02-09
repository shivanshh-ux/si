<?php
session_start();

// Handle Registration
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $contact = $_POST['contact'] ?? '';
    $password = $_POST['password'] ?? '';

    // Mock Registration Logic
    // Check if we are skipping details (fast-track from OTP)
    if (isset($_POST['skip_details']) && $_POST['skip_details'] === 'true') {
        $_SESSION['user_id'] = rand(10, 1000);
        $_SESSION['user_name'] = "Student " . $_SESSION['user_id'];
        header("Location: onboarding.php");
        exit();
    }

    // In a real app, validation and DB insertion would happen here
    if (!empty($email) && !empty($password) && !empty($first_name)) {
        $_SESSION['user_id'] = rand(10, 1000); // Random ID for new user
        $_SESSION['user_name'] = $first_name . ' ' . $last_name;
        header("Location: onboarding.php");
        exit();
    } else {
        $error = "Please fill in all fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - SI UNIVERSE</title>
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
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = document.getElementById(fieldId + '-icon');
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
    </style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl overflow-hidden m-4 relative">
        <!-- Progress Bar (Optional, simpler to just show steps) -->
        
        <!-- Header -->
        <div class="bg-gradient-to-r from-primary to-secondary p-8 text-center text-white">
            <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center mx-auto mb-4 backdrop-blur-sm">
                <i class="fas fa-user-plus text-3xl"></i>
            </div>
            <h1 class="text-2xl font-bold">Join SI UNIVERSE</h1>
            <p class="text-blue-100 mt-2">Create your account to connect</p>
        </div>

        <!-- Form Container -->
        <div class="p-8">
            <?php if (isset($error)): ?>
                <div class="bg-red-50 text-red-600 p-3 rounded-lg mb-6 text-sm flex items-center">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="" id="signupForm">
                <input type="hidden" name="skip_details" id="skip_details" value="false">
                
                <!-- STEP 1: Email -->
                <div id="step-1">
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-semibold mb-2" for="email">
                            SI Email Address
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-colors" 
                                   id="email" type="email" name="email" placeholder="student@si.edu" required>
                        </div>
                    </div>
                    <button type="button" onclick="verifyEmailStep()" class="w-full bg-primary hover:bg-secondary text-white font-bold py-3 px-4 rounded-lg transition-all shadow-lg">
                        Continue <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                    <div class="mt-6 text-center">
                        <p class="text-gray-600 text-sm">Already have an account? <a href="login.php" class="text-primary font-bold hover:text-secondary">Login</a></p>
                    </div>
                </div>

                <!-- STEP 2: OTP -->
                <div id="step-2" class="hidden">
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-semibold mb-2" for="otp">
                            Verification Code
                        </label>
                        <p class="text-xs text-gray-500 mb-3">Sent to <span id="display-email" class="font-bold text-gray-700"></span></p>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-key text-gray-400"></i>
                            </div>
                            <input class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-colors tracking-widest text-lg" 
                                   id="otp" type="text" placeholder="Enter 4-digit code" maxlength="4">
                        </div>
                        <p id="otp-error" class="text-red-500 text-xs mt-2 hidden">Invalid OTP. Try 1234.</p>
                    </div>
                    <button type="button" onclick="verifyOtpStep()" class="w-full bg-primary hover:bg-secondary text-white font-bold py-3 px-4 rounded-lg transition-all shadow-lg">
                        Verify Email
                    </button>
                    <div class="mt-4 text-center">
                        <button type="button" onclick="goToStep(1)" class="text-gray-400 text-sm hover:text-gray-600"><i class="fas fa-arrow-left mr-1"></i> Change Email</button>
                    </div>
                </div>

                <!-- STEP 3: User Details -->
                <div id="step-3" class="hidden">
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 text-xs font-semibold mb-1" for="first_name">First Name</label>
                            <input class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 transition-colors" 
                                   id="first_name" type="text" name="first_name" placeholder="John" required>
                        </div>
                        <div>
                            <label class="block text-gray-700 text-xs font-semibold mb-1" for="last_name">Last Name</label>
                            <input class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 transition-colors" 
                                   id="last_name" type="text" name="last_name" placeholder="Doe" required>
                        </div>
                    </div>

                    <div class="mb-4">
                         <label class="block text-gray-700 text-xs font-semibold mb-1" for="contact">Contact Number</label>
                         <input class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 transition-colors" 
                                id="contact" type="tel" name="contact" placeholder="1234567890">
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-xs font-semibold mb-1" for="password">Password</label>
                        <div class="relative">
                            <input class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 transition-colors" 
                                   id="password" type="password" name="password" placeholder="••••••••" required>
                            <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none" onclick="togglePassword('password')">
                                <i class="fas fa-eye" id="password-icon"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-6">
                        <label class="block text-gray-700 text-xs font-semibold mb-1" for="confirm_password">Confirm Password</label>
                        <div class="relative">
                            <input class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 transition-colors" 
                                   id="confirm_password" type="password" name="confirm_password" placeholder="••••••••" required>
                            <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none" onclick="togglePassword('confirm_password')">
                                <i class="fas fa-eye" id="confirm_password-icon"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-4 rounded-lg transition-all shadow-lg hover:shadow-xl">
                        Complete Registration
                    </button>
                </div>

            </form>
        </div>
    </div>

    <script>
        function goToStep(step) {
            document.getElementById('step-1').classList.add('hidden');
            document.getElementById('step-2').classList.add('hidden');
            document.getElementById('step-3').classList.add('hidden');
            document.getElementById('step-' + step).classList.remove('hidden');
        }

        function verifyEmailStep() {
            const email = document.getElementById('email').value;
            if(email && email.includes('@')) {
                document.getElementById('display-email').innerText = email;
                goToStep(2);
            } else {
                alert("Please enter a valid email address");
            }
        }

        function verifyOtpStep() {
            const otp = document.getElementById('otp').value;
            if(otp === '1234') { // Mock verification
                document.getElementById('otp-error').classList.add('hidden');
                // Set hidden field and submit form to establish server-side session
                document.getElementById('skip_details').value = 'true';
                document.activeElement.blur(); // Remove focus
                document.getElementById('signupForm').submit();
            } else {
                document.getElementById('otp-error').classList.remove('hidden');
            }
        }
    </script>
</body>
</html>
