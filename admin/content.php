<?php
require_once 'auth-check.php';

// Mock Resources
$resources = [
    ['id' => 1, 'name' => 'COA Lab Manual', 'type' => 'PDF', 'uploader' => 'Sneha Patil', 'downloads' => 145, 'date' => '2026-02-10'],
    ['id' => 2, 'name' => 'Data Structures Notes', 'type' => 'PDF', 'uploader' => 'Rahul Sharma', 'downloads' => 89, 'date' => '2026-02-09'],
    ['id' => 3, 'name' => 'SIT Bus Schedule', 'type' => 'Image', 'uploader' => 'Admin', 'downloads' => 230, 'date' => '2026-02-08'],
    ['id' => 4, 'name' => 'Discrete Math Assignment', 'type' => 'DOCX', 'uploader' => 'Priya Das', 'downloads' => 56, 'date' => '2026-02-07'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Management - SIU Admin</title>
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
                <h1 class="text-2xl font-bold text-slate-800">Resource Hub Control</h1>
                <p class="text-slate-500 text-sm">Manage student-uploaded resources, manuals, and official notices.</p>
            </div>
            <button class="bg-slate-800 text-white px-5 py-2.5 rounded-xl font-bold text-sm hover:bg-slate-900 transition-all shadow-lg shadow-slate-500/20 flex items-center">
                <i class="fas fa-file-upload mr-2"></i> Upload New
            </button>
        </header>

        <!-- Content Table -->
        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-slate-50/50 border-b border-slate-100">
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Resource Name</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Type</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Uploaded By</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Stats</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Date</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        <?php foreach($resources as $resource): ?>
                        <tr class="hover:bg-slate-50/50 transition-all">
                            <td class="px-6 py-5">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                                        <i class="fas fa-file-<?php echo ($resource['type'] == 'Image' ? 'image' : 'alt'); ?> text-lg"></i>
                                    </div>
                                    <span class="text-sm font-bold text-slate-800"><?php echo $resource['name']; ?></span>
                                </div>
                            </td>
                            <td class="px-6 py-5">
                                <span class="text-[10px] font-bold text-slate-500 bg-slate-100 px-2 py-1 rounded-md"><?php echo $resource['type']; ?></span>
                            </td>
                            <td class="px-6 py-5">
                                <p class="text-xs font-semibold text-slate-700"><?php echo $resource['uploader']; ?></p>
                            </td>
                            <td class="px-6 py-5">
                                <div class="flex items-center text-xs text-slate-500">
                                    <i class="fas fa-download mr-1.5 text-[10px]"></i>
                                    <?php echo $resource['downloads']; ?>
                                </div>
                            </td>
                            <td class="px-6 py-5">
                                <p class="text-xs text-slate-500"><?php echo $resource['date']; ?></p>
                            </td>
                            <td class="px-6 py-5">
                                <div class="flex items-center space-x-2">
                                    <button title="View" class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all">
                                        <i class="fas fa-eye text-xs"></i>
                                    </button>
                                    <button title="Delete" class="w-8 h-8 rounded-lg bg-slate-50 text-red-500 flex items-center justify-center hover:bg-red-600 hover:text-white transition-all">
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

</body>
</html>
