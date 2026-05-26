<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cửa Hàng Táo</title>

    <!-- TailwindCSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .material-symbols-outlined {
            font-size: 20px;
        }

        .glass {
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- HEADER TOP -->
    <header class="fixed top-0 left-0 w-full z-50">

        <!-- NAVBAR -->
        <nav class="bg-black/95 text-white h-[50px] flex items-center">
            <div class="max-w-7xl mx-auto w-full px-6 flex items-center justify-between">

                <!-- LOGO -->
                <a href="/webbanhang/Product/" 
                   class="flex items-center gap-2 text-lg font-semibold hover:opacity-80 transition">
                    <span class="material-symbols-outlined">shopping_bag</span>
                    TechStore
                </a>

                <!-- MENU DESKTOP -->
                <ul class="hidden md:flex items-center gap-8 text-sm">
                    <li>
                        <a href="/webbanhang/Product/" 
                           class="hover:text-blue-400 transition">
                            Danh sách sản phẩm
                        </a>
                    </li>

                    <li>
                        <a href="/webbanhang/Product/add" 
                           class="hover:text-blue-400 transition">
                            Thêm sản phẩm
                        </a>
                    </li>

                    <li>
                        <a href="/webbanhang/Category/list" class="hover:text-blue-400 transition">
                            Danh mục
                        </a>
                    </li>

                    <li>
                        <a href="#" class="hover:text-blue-400 transition">
                            Thống kê
                        </a>
                    </li>
                </ul>

                <!-- ACTIONS -->
                <div class="flex items-center gap-4">

                    <!-- SEARCH -->

                    <?php
                        $count = 0;

                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $item) {
                                $count += $item['quantity'];
                            }
                        }
                    ?>
                    
                    <a href="/webbanhang/Product/cart" 
                       class="relative hover:text-blue-400 transition">
                        
                       <span class="material-symbols-outlined">
                            shopping_bag
                       </span>

                       <span id="cart-count"
                            class="absolute -top-2 -right-2 bg-blue-600 text-white text-[10px] w-5 h-5 rounded-full flex items-center justify-center
                            <?php echo $count <= 0 ? 'hidden' : ''; ?>">

                            <?php echo $count; ?>

                        </span>

                    </a>

                    <!-- USER -->
                    <button class="hover:text-blue-400 transition">
                        <span class="material-symbols-outlined">person</span>
                    </button>

                    <!-- MOBILE MENU -->
                    <button id="menuBtn" 
                            class="md:hidden hover:text-blue-400 transition">
                        <span class="material-symbols-outlined">menu</span>
                    </button>
                </div>
            </div>
        </nav>

        <!-- SUB NAV -->
        <div class="bg-white/70 glass border-b border-gray-200 h-[60px] flex items-center shadow-sm">
            <div class="max-w-7xl mx-auto w-full px-6 flex items-center justify-between">

                <!-- TITLE -->
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">
                        Cửa Hàng Táo
                    </h1>
                </div>

                <!-- BUTTON -->
                <a href="/webbanhang/Product/add"
                   class="bg-blue-600 hover:bg-blue-700 transition text-white px-5 py-2 rounded-full text-sm font-medium shadow">
                    + Thêm sản phẩm
                </a>
            </div>
        </div>

        <!-- MOBILE MENU -->
        <div id="mobileMenu"
             class="hidden md:hidden bg-black text-white border-t border-gray-800">

            <ul class="flex flex-col p-4 space-y-4 text-sm">
                <li>
                    <a href="/webbanhang/Product/" class="block hover:text-blue-400">
                        Danh sách sản phẩm
                    </a>
                </li>

                <li>
                    <a href="/webbanhang/Product/add" class="block hover:text-blue-400">
                        Thêm sản phẩm
                    </a>
                </li>

                <li>
                    <a href="/webbanhang/Category/list" class="block hover:text-blue-400">
                        Danh mục
                    </a>
                </li>

                <li>
                    <a href="#" class="block hover:text-blue-400">
                        Thống kê
                    </a>
                </li>
            </ul>
        </div>

    </header>

    <!-- CONTENT -->
    <main class="pt-[130px] max-w-7xl mx-auto px-6"> 
        
    </main>

    <!-- SCRIPT -->
    <script>
        const menuBtn = document.getElementById("menuBtn");
        const mobileMenu = document.getElementById("mobileMenu");

        menuBtn.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden");
        });
    </script>

</body>
</html>