<?php
session_start();
include 'includes/header.php';

$pg_listings = [
    [
        'name' => 'Malti kunj Pg',
        'image' => 'https://placehold.co/600x400?text=Malti+Kunj+PG', // Placeholder
        'website' => '#',
        'rent' => '₹8,000/month',
        'food' => '3 times/day (Veg/Non-Veg)',
        'laundry' => 'Available',
        'wifi' => 'High-speed Wi-Fi',
        'rules' => [
            'Opposite genders allowed',
            'In time: 10:00 PM',
            'Friends can come at pg anytime'
        ]
    ],
    [
        'name' => 'Yukio Pg',
        'image' => 'https://placehold.co/600x400?text=Yukio+PG', // Placeholder
        'website' => '#',
        'rent' => '₹9,500/month',
        'food' => '3 times/day (Veg)',
        'laundry' => 'Machine Available',
        'wifi' => 'Included',
        'rules' => [
            'No opposite genders in rooms',
            'In time: 11:00 PM',
            'No loud music after 10 PM'
        ]
    ],
    [
        'name' => 'Sunshine Residency',
        'image' => 'https://placehold.co/600x400?text=Sunshine+Residency', // Placeholder
        'website' => '#',
        'rent' => '₹12,000/month',
        'food' => 'Breakfast & Dinner',
        'laundry' => 'On-site washer',
        'wifi' => 'Fiber Optic',
        'rules' => [
            'Opposite genders allowed in common area',
            'No restriction on in-time',
            'Overnight guests with prior notice'
        ]
    ],
    [
        'name' => 'Stanza Living',
        'image' => 'https://placehold.co/600x400?text=Stanza+Living', // Placeholder
        'website' => '#',
        'rent' => '₹15,000/month',
        'food' => 'All meals included',
        'laundry' => 'Daily Service',
        'wifi' => 'High-speed dedicated',
        'rules' => [
            'Biometric entry',
            'In time: 10:30 PM',
            'Strict no-alcohol policy'
        ]
    ]
];

?>

<!-- Hero Section -->
<section class="bg-gradient-900 pt-4 pb-12">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold text-gray-800 text-center mb-2" data-aos="fade-up">PG Listings</h1>
        <p class="text-gray-400 text-center mb-8" data-aos="fade-up" data-aos-delay="100">Find your home away from home.</p>

        <div class="grid gap-8 max-w-5xl mx-auto">
            <?php foreach ($pg_listings as $index => $pg): ?>
                <div class="bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300 overflow-hidden border border-gray-100" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                    <div class="flex flex-col md:flex-row">
                        <!-- Left Side: Photo and Website Link -->
                        <div class="md:w-1/3 p-4 flex flex-col space-y-4">
                            <div class="aspect-w-16 aspect-h-12 rounded-xl overflow-hidden bg-gray-200">
                                <img src="<?= $pg['image'] ?>" alt="<?= $pg['name'] ?>" class="object-cover w-full h-full transform hover:scale-105 transition-transform duration-500">
                            </div>
                            <a href="<?= $pg['website'] ?>" target="_blank" class="block w-full text-center bg-gray-50 hover:bg-gray-100 text-gray-700 font-medium py-2 rounded-lg border border-gray-200 transition-colors">
                                <i class="fas fa-external-link-alt mr-2 text-sm"></i> Visit Website
                            </a>
                        </div>

                        <!-- Right Side: Details -->
                        <div class="md:w-2/3 p-6 md:pl-0 flex flex-col justify-center">
                            <h2 class="text-2xl font-bold text-gray-800 mb-4"><?= $pg['name'] ?></h2>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-3 gap-x-6 mb-6">
                                <div class="flex items-center text-gray-600">
                                    <div class="w-8 flex justify-center mr-3">
                                        <i class="fas fa-rupee-sign text-green-500 text-lg"></i>
                                    </div>
                                    <span class="font-medium">Rent:</span> &nbsp;<?= $pg['rent'] ?>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <div class="w-8 flex justify-center mr-3">
                                        <i class="fas fa-utensils text-orange-400 text-lg"></i>
                                    </div>
                                    <span class="font-medium">Food:</span> &nbsp;<?= $pg['food'] ?>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <div class="w-8 flex justify-center mr-3">
                                        <i class="fas fa-tshirt text-blue-400 text-lg"></i>
                                    </div>
                                    <span class="font-medium">Laundry:</span> &nbsp;<?= $pg['laundry'] ?>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <div class="w-8 flex justify-center mr-3">
                                        <i class="fas fa-wifi text-indigo-500 text-lg"></i>
                                    </div>
                                    <span class="font-medium">Wi-Fi:</span> &nbsp;<?= $pg['wifi'] ?>
                                </div>
                            </div>

                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                                <h3 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-3">Rules & Regulations</h3>
                                <ul class="space-y-2">
                                    <?php foreach ($pg['rules'] as $rule): ?>
                                        <li class="flex items-start text-gray-600 text-sm">
                                            <i class="fas fa-check-circle text-primary mt-0.5 mr-2.5"></i>
                                            <span><?= $rule ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>