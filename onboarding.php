<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Handle Form Submission (Mocking persistence in Session)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['onboarding_data'] = [
        'accommodation' => $_POST['accommodation'] ?? '',
        'mess' => $_POST['mess'] ?? '',
        'campus' => $_POST['campus'] ?? '',
        'institute' => $_POST['institute'] ?? '',
        'course' => $_POST['course'] ?? '',
        'year' => $_POST['year'] ?? '',
        'gym' => $_POST['gym'] ?? '',
        'country' => $_POST['country'] ?? '',
        'international_student' => ($_POST['country'] === 'Other') ? true : false,
    ];
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onboarding - SIU UNIVERSE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/animejs@3.2.1/lib/anime.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        .step-content { transition: opacity 0.3s ease-in-out; }
        .hidden { display: none; }
    </style>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen font-[Inter]">

    <!-- Header -->
    <header class="bg-white shadow-sm py-4 px-6 md:px-12 flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <div class="w-8 h-8 bg-gradient-to-r from-blue-600 to-indigo-700 rounded-lg flex items-center justify-center">
                <i class="fas fa-graduation-cap text-white text-sm"></i>
            </div>
            <span class="text-xl font-bold text-gray-800 tracking-tight">SIU UNIVERSE</span>
        </div>
    </header>

    <div class="flex-grow flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl overflow-hidden border border-gray-100">
            <!-- Progress Bar -->
            <div class="w-full bg-gray-100 h-2">
                <div id="progressBar" class="bg-blue-600 h-2 transition-all duration-500" style="width: 14.28%"></div>
            </div>

            <form id="onboardingForm" method="POST" action="">
                <!-- Step 1: Accommodation -->
                <div id="step1" class="p-8 step-content">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2"><span class="display-step">1</span>. Accommodation</h2>
                    <p class="text-gray-500 mb-6">Where are you staying?</p>
                    
                    <div class="grid grid-cols-1 gap-4 mb-6">
                        <label class="flex items-center p-4 border-2 border-gray-100 rounded-xl cursor-pointer hover:border-blue-500 transition-all">
                            <input type="radio" name="accommodation" value="Hostel" class="mr-4 w-5 h-5" required onchange="toggleMess(true)">
                            <div class="flex-1">
                                <span class="font-bold text-gray-700 block">Hostel</span>
                                <span class="text-xs text-gray-500">Living on campus</span>
                            </div>
                        </label>
                        <label class="flex items-center p-4 border-2 border-gray-100 rounded-xl cursor-pointer hover:border-blue-500 transition-all">
                            <input type="radio" name="accommodation" value="PG / Flat" class="mr-4 w-5 h-5" onchange="toggleMess(false)">
                            <div class="flex-1">
                                <span class="font-bold text-gray-700 block">PG / Flat</span>
                                <span class="text-xs text-gray-500">Private Accommodation</span>
                            </div>
                        </label>
                        <label class="flex items-center p-4 border-2 border-gray-100 rounded-xl cursor-pointer hover:border-blue-500 transition-all">
                            <input type="radio" name="accommodation" value="Day Scholar" class="mr-4 w-5 h-5" onchange="toggleMess(false)">
                            <div class="flex-1">
                                <span class="font-bold text-gray-700 block">Day Scholar</span>
                                <span class="text-xs text-gray-500">Living with family</span>
                            </div>
                        </label>
                    </div>

                    <div id="messSelection" class="hidden animate-in">
                        <h3 class="text-sm font-semibold text-gray-700 mb-3">Which Mess do you use?</h3>
                        <select name="mess" id="messSelect" class="w-full p-3 border border-gray-200 rounded-lg outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">-- Choose Mess --</option>
                            <option value="Viola Mess">Viola Mess</option>
                            <option value="SIT Mess">SIT Mess</option>
                            <option value="Petunia Mess">Petunia Mess</option>
                            <option value="Medical Mess">Medical Mess</option>
                        </select>
                    </div>
                </div>

                <!-- Step 2: Campus Location -->
                <div id="step2" class="p-8 step-content hidden">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2"><span class="display-step">2</span>. Campus Location</h2>
                    <p class="text-gray-500 mb-6">Select your primary campus base.</p>
                    <div class="grid grid-cols-2 gap-4">
                        <label class="text-center p-6 border-2 border-gray-100 rounded-xl cursor-pointer hover:border-blue-500 transition-all">
                            <input type="radio" name="campus" value="Hill Base" class="hidden peer">
                            <div class="peer-checked:text-blue-600">
                                <i class="fas fa-mountain text-3xl mb-2"></i>
                                <span class="block font-bold">Hill Base</span>
                            </div>
                        </label>
                        <label class="text-center p-6 border-2 border-gray-100 rounded-xl cursor-pointer hover:border-blue-500 transition-all">
                            <input type="radio" name="campus" value="Hilltop" class="hidden peer">
                            <div class="peer-checked:text-blue-600">
                                <i class="fas fa-tree text-3xl mb-2"></i>
                                <span class="block font-bold">Hilltop</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Step 3: Institute -->
                <div id="step3" class="p-8 step-content hidden">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2"><span class="display-step">3</span>. Institute</h2>
                    <p class="text-gray-500 mb-6">Select your institute at SIU.</p>
                    <select name="institute" class="w-full p-4 border border-gray-200 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 text-lg">
                        <option value="">-- Choose Institute --</option>
                        <?php 
                        $insts = ["SAII", "SIMC", "SIBM", "SIDTM", "SIT", "SSBF", "SSVAP", "SSCANS", "SCON", "SCHS", "SSSS", "SIHS", "SMCW", "SSODL", "STLRC", "SCRI"];
                        foreach($insts as $i) echo "<option value='$i'>$i</option>";
                        ?>
                    </select>
                </div>

                <!-- Step 4: Course & Section -->
                <div id="step4" class="p-8 step-content hidden">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2"><span class="display-step">4</span>. Course & Section</h2>
                    <p class="text-gray-500 mb-6">Enter your course and select your section.</p>
                    <div class="space-y-4">
                        <input type="text" name="course" placeholder="e.g. B.Tech" class="w-full p-4 border border-gray-200 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 text-lg">
                         <input type="text" name="branch" placeholder="e.g. Computer Science" class="w-full p-4 border border-gray-200 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 text-lg">
                        <select name="section" class="w-full p-4 border border-gray-200 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 text-lg">
                            <option value="">-- Choose Section --</option>
                            <option value="Section A">Section A</option>
                            <option value="Section B">Section B</option>
                            <option value="Section C">Section C</option>
                            <option value="Section D">Section D</option>
                        </select>
                    </div>
                </div>

                <!-- Step 5: Year -->
                <div id="step5" class="p-8 step-content hidden">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2"><span class="display-step">5</span>. Year</h2>
                    <p class="text-gray-500 mb-6">Select your current academic year.</p>
                    <div class="grid grid-cols-3 gap-4">
                        <?php foreach([1, 2, 3, 4] as $y): ?>
                        <label class="text-center p-6 border-2 border-gray-100 rounded-xl cursor-pointer hover:border-blue-500 transition-all">
                            <input type="radio" name="year" value="<?= $y ?>" class="hidden peer">
                            <div class="peer-checked:text-blue-600">
                                <span class="text-3xl font-bold"><?= $y ?></span>
                                <span class="block text-sm uppercase">Year</span>
                            </div>
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Step 6: Gym -->
                <div id="step6" class="p-8 step-content hidden">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2"><span class="display-step">6</span>. Gym Choice</h2>
                    <p class="text-gray-500 mb-6">Which gym do you visit?</p>
                    <div class="space-y-3">
                        <?php 
                        $gyms = ["Sit Gym", "Viola Gym", "Medical Gym", "Hill Top Gym", "no gym"];
                        foreach($gyms as $g): 
                        ?>
                        <label class="flex items-center p-4 border-2 border-gray-100 rounded-xl cursor-pointer hover:border-blue-500 transition-all">
                            <input type="radio" name="gym" value="<?= $g ?>" class="mr-4 w-5 h-5">
                            <span class="font-bold text-gray-700"><?= $g ?></span>
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Step 7: Country -->
                <div id="step7" class="p-8 step-content hidden">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2"><span class="display-step">7</span>. Origin</h2>
                    <p class="text-gray-500 mb-6">Where are you from?</p>
                    <div class="grid grid-cols-2 gap-4">
                        <label class="text-center p-8 border-2 border-gray-100 rounded-xl cursor-pointer hover:border-blue-500 transition-all">
                            <input type="radio" name="country" value="India" class="hidden peer" required>
                            <div class="peer-checked:text-blue-600">
                                <i class="fas fa-flag text-4xl mb-2 text-orange-500"></i>
                                <span class="block font-bold">India</span>
                            </div>
                        </label>
                        <label class="text-center p-8 border-2 border-gray-100 rounded-xl cursor-pointer hover:border-blue-500 transition-all">
                            <input type="radio" name="country" value="Other" class="hidden peer">
                            <div class="peer-checked:text-blue-600">
                                <i class="fas fa-globe-americas text-4xl mb-2 text-blue-500"></i>
                                <span class="block font-bold">International</span>
                            </div>
                        </label>
                    </div>
                    <!-- <p id="intl-notice" class="hidden mt-6 p-4 bg-green-50 text-green-700 rounded-lg text-sm italic">
                        <i class="fas fa-info-circle mr-2"></i> You will be automatically added to the International Students Community!
                    </p> -->
                </div>

                <!-- Step 8: Password -->
                <div id="step8" class="p-8 step-content hidden">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2"><span class="display-step">8</span>. Set Your Password</h2>
                    <p class="text-gray-500 mb-6">Create a secure password for your account.</p>
                    
                    <div class="space-y-4">
                        <div class="relative">
                            <label class="block text-gray-700 text-sm font-semibold mb-2" for="password">Password</label>
                            <div class="relative">
                                <input type="password" id="password" name="password" placeholder="••••••••" 
                                       class="w-full p-4 border border-gray-200 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 text-lg">
                                <button type="button" onclick="togglePasswordVisibility('password')" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                    <i id="password-eye" class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div id="password-requirements" class="mt-2 text-xs space-y-1 text-gray-500">
                                <p id="req-length" class="flex items-center"><i class="fas fa-circle text-[6px] mr-2"></i> At least 8 characters</p>
                                <p id="req-special" class="flex items-center"><i class="fas fa-circle text-[6px] mr-2"></i> At least one special character</p>
                            </div>
                        </div>

                        <div class="relative">
                            <label class="block text-gray-700 text-sm font-semibold mb-2" for="confirm_password">Confirm Password</label>
                            <div class="relative">
                                <input type="password" id="confirm_password" name="confirm_password" placeholder="••••••••" 
                                       class="w-full p-4 border border-gray-200 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 text-lg">
                                <button type="button" onclick="togglePasswordVisibility('confirm_password')" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                    <i id="confirm_password-eye" class="fas fa-eye"></i>
                                </button>
                            </div>
                            <p id="match-error" class="hidden mt-1 text-xs text-red-500">Passwords do not match</p>
                        </div>
                    </div>
                </div>

                <!-- Navigation -->
                <div class="p-8 bg-gray-50 flex justify-between items-center border-t border-gray-100">
                    <button type="button" id="prevBtn" onclick="next(-1)" class="text-gray-500 font-semibold hover:text-gray-800 disabled:opacity-30" disabled>
                        <i class="fas fa-chevron-left mr-1"></i> Back
                    </button>
                    <button type="button" id="nextBtn" onclick="next(1)" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-bold shadow-lg hover:bg-blue-700 transition-all">
                        Continue <i class="fas fa-chevron-right ml-1"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let currentTab = 1;
        const totalTabs = 8;

        function showTab(n) {
            const tabs = document.getElementsByClassName("step-content");
            tabs[n-1].classList.remove("hidden");
            
            // Calculate Display Step Number
            const acc = document.querySelector('input[name="accommodation"]:checked');
            const isHostel = acc && acc.value === "Hostel";
            let displayStep = n;
            let displayTotal = totalTabs;

            if (!isHostel) {
                if (n > 6) displayStep = n - 1;
                displayTotal = totalTabs - 1;
            }

            const stepSpan = tabs[n-1].querySelector(".display-step");
            if (stepSpan) stepSpan.innerText = displayStep;
            
            // Buttons
            document.getElementById("prevBtn").disabled = (n === 1);
            if (n === totalTabs) {
                document.getElementById("nextBtn").innerHTML = "Finish Profile <i class='fas fa-check ml-1'></i>";
            } else {
                document.getElementById("nextBtn").innerHTML = "Continue <i class='fas fa-chevron-right ml-1'></i>";
            }

            // Progress Bar
            document.getElementById("progressBar").style.width = (displayStep / displayTotal * 100) + "%";
        }

        function next(n) {
            const tabs = document.getElementsByClassName("step-content");
            
            // Validation (simplified)
            if (n === 1 && !validateForm()) return false;

            tabs[currentTab-1].classList.add("hidden");
            
            // Logic to skip Gym Choice (Step 6) if not a Hostel student
            let targetTab = currentTab + n;
            const acc = document.querySelector('input[name="accommodation"]:checked');
            const isHostel = acc && acc.value === "Hostel";

            if (targetTab === 6 && !isHostel) {
                targetTab += n; // Skip 6, go to 7 (if forward) or 5 (if backward)
            }

            currentTab = targetTab;

            if (currentTab > totalTabs) {
                document.getElementById("onboardingForm").submit();
                return false;
            }
            showTab(currentTab);
        }

        function validateForm() {
            // Basic validation for radios and text
            const tab = document.getElementsByClassName("step-content")[currentTab-1];
            
            // Step 1 extra validation for mess if Hostel
            if (currentTab === 1) {
                const acc = document.querySelector('input[name="accommodation"]:checked');
                if (!acc) { Swal.fire('Error', 'Please select accommodation', 'error'); return false; }
                if (acc.value === "Hostel" && document.getElementById("messSelect").value === "") {
                    Swal.fire('Error', 'Please select your Mess', 'error'); return false;
                }
            }

            if (currentTab === 3 && document.querySelector('select[name="institute"]').value === "") {
                Swal.fire('Error', 'Please select your Institute', 'error'); return false;
            }
            
            if (currentTab === 4 && document.querySelector('input[name="course"]').value === "") {
                Swal.fire('Error', 'Please enter your course', 'error'); return false;
            }

            if (currentTab === 7) {
                const country = document.querySelector('input[name="country"]:checked');
                if (!country) { Swal.fire('Error', 'Please select your origin', 'error'); return false; }
            }

            // Step 8: Password Validation
            if (currentTab === 8) {
                const password = document.getElementById('password').value;
                const confirmPassword = document.getElementById('confirm_password').value;

                if (password.length < 8) {
                    Swal.fire('Error', 'Password must be at least 8 characters long', 'error');
                    return false;
                }
                if (!/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
                    Swal.fire('Error', 'Password must contain at least one special character', 'error');
                    return false;
                }
                if (password !== confirmPassword) {
                    Swal.fire('Error', 'Passwords do not match', 'error');
                    return false;
                }
            }

            return true;
        }

        function togglePasswordVisibility(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = document.getElementById(fieldId + '-eye');
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

        // Live Password Validation
        document.getElementById('password').addEventListener('input', function(e) {
            const val = e.target.value;
            const reqs = {
                length: val.length >= 8,
                special: /[!@#$%^&*(),.?":{}|<>]/.test(val)
            };

            updateReq('req-length', reqs.length);
            updateReq('req-special', reqs.special);
        });

        function updateReq(id, met) {
            const el = document.getElementById(id);
            if (met) {
                el.classList.remove('text-gray-500');
                el.classList.add('text-green-500');
                el.querySelector('i').className = 'fas fa-check-circle mr-2';
            } else {
                el.classList.remove('text-green-500');
                el.classList.add('text-gray-500');
                el.querySelector('i').className = 'fas fa-circle text-[6px] mr-2';
            }
        }

        document.getElementById('confirm_password').addEventListener('input', function(e) {
            const pass = document.getElementById('password').value;
            const matchError = document.getElementById('match-error');
            if (e.target.value && e.target.value !== pass) {
                matchError.classList.remove('hidden');
            } else {
                matchError.classList.add('hidden');
            }
        });

        function toggleMess(show) {
            const el = document.getElementById("messSelection");
            if (show) el.classList.remove("hidden");
            else el.classList.add("hidden");
        }

        // Country logic for international student notice
        document.querySelectorAll('input[name="country"]').forEach(radio => {
            radio.addEventListener('change', (e) => {
                const notice = document.getElementById("intl-notice");
                if (e.target.value === 'Other') notice.classList.remove('hidden');
                else notice.classList.add('hidden');
            });
        });

        // Initialize
        showTab(currentTab);
    </script>
</body>
</html>
