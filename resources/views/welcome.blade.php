<?php
use App\Core\Helper\Helper;
use App\Models\Dream;

include_once(Helper::views_path() . '/layouts/header.php');
$dreams = Dream::orderBy('created_at', 'desc')->get();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DreamsUP - Share Your Dreams</title>
    <link href="https://fonts.bunny.net/css?family=cairo:400,500,600,700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --primary-color: #1a3a6c;
            --secondary-color: #1e4d45;
            --light-primary: #2c5eaa;
            --light-secondary: #2a6b5f;
            --accent-color: #ffc107;
            --text-light: #f8f9fa;
            --text-dark: #343a40;
            --dark-background: #1a1a24;
        }
        body {
            font-family: 'Cairo', sans-serif;
            background-color: var(--dark-background);
        }
        .dream-image {
            height: 180px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .fulfilled-dream {
            border: 2px solid var(--light-secondary) !important;
        }
    </style>
</head>
<body class="text-gray-100">
    <div class="container mx-auto px-4 py-6 bg-white/5 rounded-lg mt-6 mb-6">
        <h2 class="text-2xl font-bold text-center mb-4">جميع الأحلام</h2>
        
        <?php if (empty($dreams)): ?>
            <div class="bg-blue-500/20 border border-blue-500 text-blue-200 text-center p-4 rounded-lg">
                لم يتم إضافة أي أحلام بعد. كن أول من يشارك حلمه!
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <?php    foreach ($dreams as $dream): ?>
                    <div class="bg-white/5 rounded-lg shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300 <?php        echo ($dream->status === 'fulfilled') ? 'fulfilled-dream' : ''; ?>">
                        <div class="bg-gradient-to-r from-blue-800 to-blue-900 text-white font-semibold p-3 rounded-t-lg flex justify-between items-center">
                            <span>
                                <i class="fas fa-user mr-1"></i> <?php        echo htmlspecialchars($dream->full_name); ?>
                            </span>
                            <?php        if ($dream->status === 'fulfilled'): ?>
                                <span class="bg-green-500 text-white text-sm px-2 py-1 rounded">
                                    <i class="fas fa-check-circle mr-1"></i> تم التحقيق
                                </span>
                            <?php        endif; ?>
                        </div>
                        
                        <?php        if (!empty($dream->image_path)): ?>
                            <div class="dream-image" style="background-image: url('<?php            echo config('app.app_url') . '/storage/uploads/' . htmlspecialchars($dream->image_path); ?>')"></div>
                        <?php        endif; ?>
                        
                        <div class="p-4">
                            <h5 class="text-lg font-semibold text-blue-400"><?php        echo htmlspecialchars($dream->description); ?></h5>
                            <p class="text-gray-300"><?php        echo htmlspecialchars($dream->description); ?></p>
                        </div>
                        
                        <div class="bg-black/20 border-t border-white/10 p-3">
                            <div class="text-yellow-400 font-bold text-lg">
                                <i class="fas fa-money-bill-wave mr-1"></i> <?php        echo htmlspecialchars($dream->amount); ?> ل.س
                            </div>
                        </div>
                    </div>
                <?php    endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="mt-8 bg-gradient-to-r from-blue-900 to-green-900 text-white p-6 rounded-lg text-center">
            <h1 class="text-2xl font-bold mb-2">
                <i class="fas fa-star-half-alt mr-2"></i>
                DreamsUP - حقق أحلامك
            </h1>
            <p class="text-gray-200 mb-4">منصة لمشاركة وتحقيق الأحلام، يمكنك مشاركة حلمك وقد يتم اختياره للتحقيق!</p>
            <a href="dream/create" class="inline-block bg-white text-blue-900 font-semibold px-4 py-2 rounded-lg hover:bg-gray-200 transition-colors">
                <i class="fas fa-plus-circle mr-1"></i> شارك حلمك الآن
            </a>
        </div>
    </div>

    <?php include_once(Helper::views_path() . '/layouts/footer.php'); ?>
</body>
</html>