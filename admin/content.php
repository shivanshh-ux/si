<?php
require_once 'auth-check.php';

// Mock Stays
$stays = [
    ['id' => 1, 'name' => 'Malti kunj Pg', 'type' => 'PG', 'added_by' => 'Rahul Sharma', 'rent' => '₹8,000/mo', 'date' => '2026-02-15'],
    ['id' => 2, 'name' => 'Yukio Pg', 'type' => 'PG', 'added_by' => 'Sunil PG', 'rent' => '₹9,500/mo', 'date' => '2026-02-14'],
    ['id' => 3, 'name' => 'Sunshine Flats', 'type' => 'Flat', 'added_by' => 'Ramesh Kumar', 'rent' => '₹18,000/mo', 'date' => '2026-02-12'],
    ['id' => 4, 'name' => 'Green Valley', 'type' => 'Flat', 'added_by' => 'Suresh Prop', 'rent' => '₹12,000/mo', 'date' => '2026-02-10'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stays Management - SIU Admin</title>
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
                <h1 class="text-2xl font-bold text-slate-800">Explore Stays Control</h1>
                <p class="text-slate-500 text-sm">Manage PG and Flat groups available on the website.</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <input type="text" placeholder="Search stays..." class="pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-slate-500/20 focus:border-slate-800 transition-all w-48 shadow-sm">
                    <i class="fas fa-search absolute left-3.5 top-3.5 text-slate-400 text-sm"></i>
                </div>
                <button onclick="addStay()" class="bg-slate-800 text-white px-5 py-2.5 rounded-xl font-bold text-sm hover:bg-slate-900 transition-all shadow-lg shadow-slate-500/20 flex items-center">
                    <i class="fas fa-plus mr-2"></i> Add New Stay
                </button>
            </div>
        </header>

        <!-- Content Table -->
        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-slate-50/50 border-b border-slate-100">
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Stay Name / Title</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Type</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Added By</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Rent (approx)</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Listed Date</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        <?php foreach($stays as $stay): ?>
                        <tr class="hover:bg-slate-50/50 transition-all">
                            <td class="px-6 py-5">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                                        <i class="fas fa-home text-lg"></i>
                                    </div>
                                    <span class="text-sm font-bold text-slate-800"><?php echo $stay['name']; ?></span>
                                </div>
                            </td>
                            <td class="px-6 py-5">
                                <span class="text-[10px] font-bold text-slate-500 bg-slate-100 px-2 py-1 rounded-md"><?php echo $stay['type']; ?></span>
                            </td>
                            <td class="px-6 py-5">
                                <p class="text-xs font-semibold text-slate-700"><?php echo $stay['added_by']; ?></p>
                            </td>
                            <td class="px-6 py-5">
                                <div class="flex items-center text-xs text-slate-500">
                                    <i class="fas fa-tag mr-1.5 text-[10px]"></i>
                                    <?php echo $stay['rent']; ?>
                                </div>
                            </td>
                            <td class="px-6 py-5">
                                <p class="text-xs text-slate-500"><?php echo $stay['date']; ?></p>
                            </td>
                            <td class="px-6 py-5">
                                <div class="flex items-center space-x-2">
                                    <button onclick="editStay(<?php echo htmlspecialchars(json_encode($stay)); ?>)" title="Edit" class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all">
                                        <i class="fas fa-edit text-xs"></i>
                                    </button>
                                    <button onclick="deleteStay('<?php echo $stay['name']; ?>')" title="Delete" class="w-8 h-8 rounded-lg bg-slate-50 text-red-500 flex items-center justify-center hover:bg-red-600 hover:text-white transition-all">
                                        <i class="fas fa-trash text-xs"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function addStay() {
            Swal.fire({
                title: 'Register New Accommodation',
                html: `
                    <div class="text-left space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1">Stay Name</label>
                                <input id="stay-name" class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none" placeholder="e.g. Malti Kunj">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1">Type</label>
                                <select id="stay-type" class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none bg-white">
                                    <option>PG</option>
                                    <option>Flat</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1">Rent Amount</label>
                                <input id="stay-rent" class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none" placeholder="e.g. 8500">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1">Distance (km)</label>
                                <input id="stay-distance" class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none" placeholder="e.g. 1.2">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 mb-1">Broker / Owner Name</label>
                            <input id="stay-broker" class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none" placeholder="Full name">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 mb-1">Contact Number</label>
                            <input id="stay-contact" class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none" placeholder="+91 00000 00000">
                        </div>
                    </div>
                `,
                showCancelButton: true,
                confirmButtonColor: '#1e293b',
                confirmButtonText: 'List Property',
                focusConfirm: false,
                preConfirm: () => {
                    return {
                        name: document.getElementById('stay-name').value,
                        type: document.getElementById('stay-type').value,
                        rent: document.getElementById('stay-rent').value,
                        distance: document.getElementById('stay-distance').value,
                        broker: document.getElementById('stay-broker').value,
                        contact: document.getElementById('stay-contact').value
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Listed!', 'Property has been added to the platform.', 'success');
                }
            });
        }

        function editStay(stay) {
            Swal.fire({
                title: 'Edit Property Details',
                html: `
                    <div class="text-left space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1">Stay Name</label>
                                <input id="edit-stay-name" class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none" value="${stay.name}">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1">Type</label>
                                <select id="edit-stay-type" class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none bg-white">
                                    <option ${stay.type === 'PG' ? 'selected' : ''}>PG</option>
                                    <option ${stay.type === 'Flat' ? 'selected' : ''}>Flat</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1">Rent</label>
                                <input id="edit-stay-rent" class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none" value="${stay.rent}">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1">Owner Alias</label>
                                <input id="edit-stay-added" class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none" value="${stay.added_by}">
                            </div>
                        </div>
                    </div>
                `,
                showCancelButton: true,
                confirmButtonColor: '#1e293b',
                confirmButtonText: 'Update Details',
                focusConfirm: false,
                preConfirm: () => {
                    return {
                        name: document.getElementById('edit-stay-name').value,
                        type: document.getElementById('edit-stay-type').value,
                        rent: document.getElementById('edit-stay-rent').value,
                        added_by: document.getElementById('edit-stay-added').value
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Updated!', 'Property details have been refreshed.', 'success');
                }
            });
        }

        function deleteStay(name) {
            Swal.fire({
                title: 'Remove Listing?',
                text: `Are you sure you want to remove "${name}"?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                confirmButtonText: 'Yes, Delete'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Deleted!', 'Listing has been removed.', 'success');
                }
            });
        }
    </script>
</body>
</html>
