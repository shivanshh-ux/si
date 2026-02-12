<?php
session_start();

// Handle Registration
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $otp = $_POST['otp'] ?? '';

    // Server-side OTP Verification
    if (!empty($otp) && isset($_SESSION['verification_otp']) && $otp === $_SESSION['verification_otp']) {
        $_SESSION['user_id'] = rand(10, 1000); // Random ID for new user
        $_SESSION['user_name'] = "Student " . $_SESSION['user_id'];
        $_SESSION['email'] = $email;
        
        // Clear verification session data
        unset($_SESSION['verification_otp']);
        unset($_SESSION['temp_email']);
        
        header("Location: onboarding.php");
        exit();
    } else {
        $error = "Invalid or expired verification code.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - SIU UNIVERSE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            <h1 class="text-2xl font-bold">Join SIU UNIVERSE</h1>
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
                <div id="step-1" class="<?php echo (isset($_POST['otp']) && isset($error)) ? 'hidden' : ''; ?>">
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-semibold mb-2" for="email">
                            SI Email Address
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-colors" 
                                   id="email" type="email" name="email" placeholder="student@siu.edu.in" 
                                   value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
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
                <div id="step-2" class="<?php echo (isset($_POST['otp']) && isset($error)) ? '' : 'hidden'; ?>">
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-semibold mb-2" for="otp">
                            Verification Code
                        </label>
                        <p class="text-xs text-gray-500 mb-3">Sent to <span id="display-email" class="font-bold text-gray-700"><?php echo htmlspecialchars($_POST['email'] ?? ''); ?></span></p>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-key text-gray-400"></i>
                            </div>
                            <input class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-colors tracking-widest text-lg" 
                                   id="otp" name="otp" type="text" placeholder="Enter 6-digit code" maxlength="6"
                                   value="<?php echo htmlspecialchars($_POST['otp'] ?? ''); ?>">
                        </div>
                        <p id="otp-error" class="text-red-500 text-xs mt-2 <?php echo isset($error) ? '' : 'hidden'; ?>">
                            <?php echo isset($error) ? $error : 'Invalid OTP. Please check your email.'; ?>
                        </p>
                    </div>
                    <button type="button" onclick="verifyOtpStep()" class="w-full bg-primary hover:bg-secondary text-white font-bold py-3 px-4 rounded-lg transition-all shadow-lg">
                        Verify Email
                    </button>
                    <div class="mt-4 text-center">
                        <button type="button" onclick="goToStep(1)" class="text-gray-400 text-sm hover:text-gray-600"><i class="fas fa-arrow-left mr-1"></i> Change Email</button>
                    </div>
                </div>

                <!-- Step 3 has been removed for a faster signup experience -->

            </form>
        </div>
    </div>

    <script>
        function goToStep(step) {
            document.getElementById('step-1').classList.add('hidden');
            document.getElementById('step-2').classList.add('hidden');
            document.getElementById('step-' + step).classList.remove('hidden');
        }

        async function verifyEmailStep() {
            const emailInput = document.getElementById('email');
            const email = emailInput.value;
            const nextBtn = document.querySelector('#step-1 button');
            
            if(email && email.includes('@')) {
                // Show loading state
                const originalText = nextBtn.innerHTML;
                nextBtn.disabled = true;
                nextBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Sending...';

                try {
                    const response = await fetch('includes/ajax-send-otp.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'email=' + encodeURIComponent(email)
                    });
                    
                    const data = await response.json();
                    
                    if(data.success) {
                        document.getElementById('display-email').innerText = email;
                        goToStep(2);
                    } else {
                        Swal.fire('Failed', data.message || "Failed to send verification code. Please try again.", 'error');
                    }
                } catch (error) {
                    console.error('Error:', error);
                    Swal.fire('Error', "An error occurred. Please try again.", 'error');
                } finally {
                    nextBtn.disabled = false;
                    nextBtn.innerHTML = originalText;
                }
            } else {
                Swal.fire('Invalid Email', "Please enter a valid email address", 'warning');
            }
        }

        function verifyOtpStep() {
            const otpInput = document.getElementById('otp');
            const otp = otpInput.value;
            const verifyBtn = document.querySelector('#step-2 button');

            if(otp.length >= 6) {
                // Submit the form directly to verify on server and redirect
                verifyBtn.disabled = true;
                verifyBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Verifying...';
                document.getElementById('signupForm').submit();
            } else {
                document.getElementById('otp-error').classList.remove('hidden');
            }
        }

        // Allow Enter key to submit OTP
        document.getElementById('otp').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                verifyOtpStep();
            }
        });
    </script>
</body>
</html>
