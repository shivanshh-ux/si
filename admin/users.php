<?php
require_once 'auth-check.php';

// Mock Users
$users = [
    ['id' => 1, 'name' => 'Admin User', 'email' => 'admin@siu.edu.in', 'college' => 'SIT Pune', 'course' => 'B.Tech CS', 'section' => 'A', 'status' => 'Verified'],
    ['id' => 2, 'name' => 'Rahul Sharma', 'email' => 'rahul.sharma@sitpune.edu.in', 'college' => 'SIT Pune', 'course' => 'B.Tech CS', 'section' => 'B', 'status' => 'Verified'],
    ['id' => 3, 'name' => 'Sneha Patil', 'email' => 'sneha.patil@sibmpune.edu.in', 'college' => 'SIBM Pune', 'course' => 'MBA', 'section' => 'Core', 'status' => 'Verified'],
    ['id' => 4, 'name' => 'Vikas Kor', 'email' => 'vikas.kor@siu.edu.in', 'college' => 'SIU', 'course' => 'M.Tech', 'section' => 'CR', 'status' => 'Pending'],
    ['id' => 5, 'name' => 'Priya Das', 'email' => 'priya.das@sitpune.edu.in', 'college' => 'SIT Pune', 'course' => 'B.Tech IT', 'section' => 'A', 'status' => 'Verified'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - SIU Admin</title>
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
        <header class="flex flex-col xl:flex-row justify-between items-start xl:items-center mb-10 space-y-4 xl:space-y-0">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">User Management</h1>
                <p class="text-slate-500 text-sm">Manage registered student accounts.</p>
            </div>
            <div class="flex flex-wrap items-center gap-4 w-full xl:w-auto">
                <div class="hidden lg:flex items-center bg-white border border-slate-200 rounded-xl px-4 py-2 shadow-sm focus-within:border-blue-500 transition-all">
                    <i class="fas fa-id-card text-slate-400 mr-2 text-xs"></i>
                    <input type="text" id="quick-verify-input" placeholder="Enter PRN..." class="text-sm focus:outline-none w-32">
                    <button onclick="quickVerifyUser()" class="ml-2 text-blue-600 hover:text-blue-700">
                        <i class="fas fa-check-circle"></i>
                    </button>
                </div>
                <div class="relative flex-1 md:flex-none">
                    <input type="text" placeholder="Search..." class="pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all w-full md:w-48 shadow-sm">
                    <i class="fas fa-search absolute left-3.5 top-3.5 text-slate-400 text-sm"></i>
                </div>
                <button onclick="addUser()" class="bg-blue-600 text-white px-5 py-2.5 rounded-xl font-bold text-sm hover:bg-blue-700 transition-all shadow-lg shadow-blue-500/20 flex items-center justify-center flex-1 md:flex-none">
                    <i class="fas fa-user-plus mr-2"></i> Add User
                </button>
            </div>
        </header>


        <!-- Users Table -->
        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-slate-50/50 border-b border-slate-100">
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">User</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">College & Course</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Section</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Status</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        <?php foreach($users as $user): ?>
                        <tr class="hover:bg-slate-50/50 transition-all">
                            <td class="px-6 py-5">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 font-bold text-xs">
                                        <?php echo substr($user['name'], 0, 1); ?>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-800"><?php echo $user['name']; ?></p>
                                        <p class="text-[10px] text-slate-500"><?php echo $user['email']; ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-5">
                                <p class="text-sm font-semibold text-slate-700"><?php echo $user['college']; ?></p>
                                <p class="text-xs text-slate-500"><?php echo $user['course']; ?></p>
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap">
                                <span class="text-xs font-bold text-slate-600 bg-slate-100 px-2 py-1 rounded-lg">Sec <?php echo $user['section']; ?></span>
                            </td>
                            <td class="px-6 py-5">
                                <?php if ($user['status'] == 'Verified'): ?>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-green-50 text-green-600 border border-green-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-2"></span>
                                        Verified
                                    </span>
                                <?php else: ?>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-yellow-50 text-yellow-600 border border-yellow-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-yellow-500 mr-2"></span>
                                        Pending
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-5">
                                <div class="flex items-center space-x-2">
                                    <?php if ($user['status'] == 'Pending'): ?>
                                    <button onclick="verifyUser('<?php echo $user['name']; ?>')" title="Verify User" class="w-8 h-8 rounded-lg bg-green-50 text-green-600 flex items-center justify-center hover:bg-green-600 hover:text-white transition-all">
                                        <i class="fas fa-check text-xs"></i>
                                    </button>
                                    <?php endif; ?>
                                    <button onclick="editUser(<?php echo htmlspecialchars(json_encode($user)); ?>)" title="Edit" class="w-8 h-8 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all">
                                        <i class="fas fa-edit text-xs"></i>
                                    </button>
                                    <button onclick="deleteUser('<?php echo $user['name']; ?>')" title="Delete" class="w-8 h-8 rounded-lg bg-slate-100 text-red-500 flex items-center justify-center hover:bg-red-600 hover:text-white transition-all">
                                        <i class="fas fa-trash text-xs"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-slate-50 bg-slate-50/30 flex justify-between items-center">
                <p class="text-xs text-slate-500">Showing 5 of 1,250 registered students</p>
                <div class="flex space-x-2">
                    <button class="px-3 py-1.5 rounded-lg border border-slate-200 text-xs font-bold text-slate-500 hover:bg-white transition-all">Previous</button>
                    <button class="px-3 py-1.5 rounded-lg bg-white border border-slate-200 text-xs font-bold text-blue-600 shadow-sm">1</button>
                    <button class="px-3 py-1.5 rounded-lg border border-slate-200 text-xs font-bold text-slate-500 hover:bg-white transition-all">2</button>
                    <button class="px-3 py-1.5 rounded-lg border border-slate-200 text-xs font-bold text-slate-500 hover:bg-white transition-all">Next</button>
                </div>
            </div>
        </div>
    </main>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function addUser() {
            Swal.fire({
                title: 'Add New Student',
                html: `
                    <div class="text-left space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 mb-1">Full Name</label>
                            <input id="swal-input1" class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none" placeholder="e.g. John Doe">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 mb-1">SIU Email</label>
                            <input id="swal-input2" class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none" placeholder="e.g. john.doe@siu.edu.in">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1">College</label>
                                <select id="swal-input3" class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none bg-white">
                                    <option>SIT Pune</option>
                                    <option>SIBM Pune</option>
                                    <option>SID Pune</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1">Section</label>
                                <input id="swal-input4" class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none" placeholder="A, B, C or CR">
                            </div>
                        </div>
                    </div>
                `,
                showCancelButton: true,
                confirmButtonColor: '#2563eb',
                confirmButtonText: 'Create Account',
                focusConfirm: false,
                preConfirm: () => {
                    return {
                        name: document.getElementById('swal-input1').value,
                        email: document.getElementById('swal-input2').value,
                        college: document.getElementById('swal-input3').value,
                        section: document.getElementById('swal-input4').value
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Success!', 'New student account created (Mocked).', 'success');
                }
            });
        }

        function editUser(user) {
            Swal.fire({
                title: 'Edit User Profile',
                html: `
                    <div class="text-left space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 mb-1">Full Name</label>
                            <input id="swal-edit-1" class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none" value="${user.name}">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 mb-1">SIU Email</label>
                            <input id="swal-edit-2" class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none" value="${user.email}">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1">Course</label>
                                <input id="swal-edit-3" class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none" value="${user.course}">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1">Section</label>
                                <input id="swal-edit-4" class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none" value="${user.section}">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 mb-1">Verification Status</label>
                            <select id="swal-edit-5" class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none bg-white">
                                <option value="Verified" ${user.status === 'Verified' ? 'selected' : ''}>Verified</option>
                                <option value="Pending" ${user.status === 'Pending' ? 'selected' : ''}>Pending</option>
                            </select>
                        </div>
                    </div>
                `,
                showCancelButton: true,
                confirmButtonColor: '#2563eb',
                confirmButtonText: 'Save Changes',
                focusConfirm: false,
                preConfirm: () => {
                    return {
                        name: document.getElementById('swal-edit-1').value,
                        email: document.getElementById('swal-edit-2').value,
                        course: document.getElementById('swal-edit-3').value,
                        section: document.getElementById('swal-edit-4').value,
                        status: document.getElementById('swal-edit-5').value
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Updated!', 'User profiles details updated (Mocked).', 'success');
                }
            });
        }

        function verifyUser(name) {
            Swal.fire({
                title: 'Verify Account?',
                text: `Are you sure you want to verify ${name}?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#16a34a',
                confirmButtonText: 'Yes, Verify'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Verified!', 'The student has been verified.', 'success');
                }
            });
        }

        function quickVerifyUser() {
            const prn = document.getElementById('quick-verify-input').value;
            if (!prn) {
                Swal.fire('Error', 'Please enter a PRN or Email.', 'error');
                return;
            }
            
            Swal.fire({
                title: 'User Identified',
                text: `Found user for PRN: ${prn}. Proceed with verification?`,
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Verify Now'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Verified!', 'The account is now active.', 'success');
                    document.getElementById('quick-verify-input').value = '';
                }
            });
        }

        function deleteUser(name) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete " + name + "'s account?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Deleted!', 'User has been removed.', 'success');
                }
            });
        }
    </script>
</body>
</html>
