<?php
require_once 'auth-check.php';

// Mock Communities
$communities = [
    ['id' => 1, 'name' => 'Mess Improvement', 'category' => 'Hostel', 'link' => 'https://chat.whatsapp.com/demo1', 'members' => 100, 'status' => 'Active'],
    ['id' => 2, 'name' => 'Viola Hostel', 'category' => 'Accommodation', 'link' => 'https://chat.whatsapp.com/demo2', 'members' => 100, 'status' => 'Active'],
    ['id' => 3, 'name' => 'Gym Community', 'category' => 'Fitness', 'link' => 'https://chat.whatsapp.com/demo3', 'members' => 100, 'status' => 'Active'],
    ['id' => 4, 'name' => 'SIT Pune Official', 'category' => 'Official', 'link' => 'https://chat.whatsapp.com/demo4', 'members' => 800, 'status' => 'Active'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Management - SIU Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen">

    <?php include 'sidebar.php'; ?>

    <main class="ml-64 p-8">
        <!-- Header -->
        <header class="flex justify-between items-center mb-10">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">WhatsApp Communities</h1>
                <p class="text-slate-500 text-sm">Manage verified WhatsApp group links and community categories.</p>
            </div>
            <button onclick="addCommunity()" class="bg-green-600 text-white px-5 py-2.5 rounded-xl font-bold text-sm hover:bg-green-700 transition-all shadow-lg shadow-green-500/20 flex items-center">
                <i class="fas fa-plus mr-2"></i> Create New Group
            </button>
        </header>

        <!-- Communities Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php foreach($communities as $community): ?>
            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all group">
                <div class="flex justify-between items-start mb-6">
                    <div class="w-12 h-12 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center group-hover:bg-green-600 group-hover:text-white transition-all duration-300">
                        <i class="fab fa-whatsapp text-2xl"></i>
                    </div>
                    <div class="flex space-x-2">
                        <button onclick="editCommunity('<?php echo $community['name']; ?>')" class="w-8 h-8 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all">
                            <i class="fas fa-edit text-xs"></i>
                        </button>
                        <button onclick="deleteCommunity('<?php echo $community['name']; ?>')" class="w-8 h-8 rounded-lg bg-slate-100 text-red-500 flex items-center justify-center hover:bg-red-600 hover:text-white transition-all">
                            <i class="fas fa-trash text-xs"></i>
                        </button>
                    </div>
                </div>
                
                <h3 class="text-lg font-bold text-slate-800 mb-1"><?php echo $community['name']; ?></h3>
                <p class="text-xs text-slate-500 mb-4"><?php echo $community['category']; ?> • <?php echo $community['members']; ?> Members</p>
                
                <div class="bg-slate-50 p-3 rounded-2xl flex items-center justify-between mb-6">
                    <code class="text-[10px] text-slate-500 truncate w-40"><?php echo $community['link']; ?></code>
                    <button onclick="copyToClipboard('<?php echo $community['link']; ?>')" class="text-blue-600 text-xs font-bold hover:underline">Copy Link</button>
                </div>

                <div class="flex items-center justify-between">
                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-green-50 text-green-600 border border-green-100">
                        <?php echo $community['status']; ?>
                    </span>
                    <a href="<?php echo $community['link']; ?>" target="_blank" class="text-slate-400 hover:text-green-600 transition-all">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </main>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function addCommunity() {
            Swal.fire({
                title: 'Create New WhatsApp Group',
                html: `
                    <div class="text-left">
                        <label class="block text-xs font-bold text-slate-500 mb-1">Group Name</label>
                        <input id="swal-input1" class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none mb-4" placeholder="e.g. SIT Hostel Community">
                        <label class="block text-xs font-bold text-slate-500 mb-1">Category</label>
                        <input id="swal-input2" class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none mb-4" placeholder="e.g. Hostel, Fitness, Official">
                        <label class="block text-xs font-bold text-slate-500 mb-1">WhatsApp Invite Link</label>
                        <input id="swal-input3" class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none" placeholder="https://chat.whatsapp.com/...">
                    </div>
                `,
                showCancelButton: true,
                confirmButtonColor: '#16a34a',
                confirmButtonText: 'Create Group',
                focusConfirm: false,
                preConfirm: () => {
                    return [
                        document.getElementById('swal-input1').value,
                        document.getElementById('swal-input2').value,
                        document.getElementById('swal-input3').value
                    ]
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Created!', 'New WhatsApp group added (Mocked).', 'success');
                }
            });
        }

        function editCommunity(name) {
            Swal.fire({
                title: 'Edit Community',
                text: "Editing " + name,
                icon: 'info',
                input: 'text',
                inputLabel: 'Group Name',
                inputValue: name,
                showCancelButton: true,
                confirmButtonColor: '#2563eb'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Saved!', 'Community details updated.', 'success');
                }
            });
        }

        function deleteCommunity(name) {
            Swal.fire({
                title: 'Are you sure?',
                text: "Permanent delete " + name + "?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Deleted!', 'Group has been removed.', 'success');
                }
            });
        }

        function copyToClipboard(text) {
            navigator.clipboard.writeText(text);
            Swal.fire({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000,
                icon: 'success',
                title: 'Link copied!'
            });
        }
    </script>
</body>
</html>
