<?php include 'app/views/shares/header.php'; ?>

<!-- MAIN -->
<main class="max-w-7xl mx-auto px-6 py-12">

    <!-- PAGE HEADER -->
    <div class="flex flex-col items-center justify-center text-center gap-6 mb-16 w-full">

        <div class="max-w-2xl">
            <h1 class="text-5xl font-bold tracking-tight text-gray-900">
                Danh sách sản phẩm
            </h1>

            <p class="text-gray-500 mt-4 text-lg leading-8">
                Quản lý kho hàng và danh mục sản phẩm công nghệ 
                với giao diện hiện đại và tối ưu trải nghiệm người dùng.
            </p>
        </div>

    </div>

    <!-- PRODUCT GRID -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-8">

        <?php foreach ($products as $product): ?>

        <div class="bg-white rounded-[28px] overflow-hidden border border-gray-200 hover:border-gray-300 hover:shadow-2xl hover:shadow-gray-200/70 transition-all duration-500 group flex flex-col">

            <!-- IMAGE -->
            <div class="aspect-square bg-[#f7f7f8] overflow-hidden flex items-center justify-center p-8 relative">

                <?php if (!empty($product->image)): ?>

                    <img 
                        src="/webbanhang/<?php echo $product->image; ?>" 
                        alt="Product Image"
                        class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500"
                    >

                <?php else: ?>

                    <div class="flex flex-col items-center justify-center text-gray-400">

                        <span class="material-symbols-outlined text-6xl mb-2">
                            image
                        </span>

                        <p class="text-sm">
                            Không có ảnh
                        </p>

                    </div>

                <?php endif; ?>

            </div>

            <!-- CONTENT -->
            <div class="p-7 flex flex-col flex-grow">

                <!-- CATEGORY -->
                <span class="text-[12px] uppercase tracking-[2px] text-gray-400 font-semibold mb-2">
                    <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?>
                </span>

                <!-- NAME -->
                <h2 class="text-2xl font-bold text-gray-900 tracking-tight mb-3 line-clamp-1">

                    <a href="/webbanhang/Product/show/<?php echo $product->id; ?>"
                       class="hover:text-blue-600 transition-colors">

                        <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>

                    </a>

                </h2>

                <!-- DESCRIPTION -->
                <p class="text-gray-500 leading-7 text-sm mb-6 line-clamp-3">
                    <?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?>
                </p>

                <!-- PRICE -->
                <div class="mb-6">

                    <span class="text-2xl font-bold text-gray-900">
                        <?php echo number_format($product->price, 0, ',', '.'); ?>đ
                    </span>

                </div>

                <!-- ACTIONS -->
                <div class="mt-auto pt-5 border-t border-gray-100 flex items-center justify-between">

                    <!-- DETAIL -->
                    <a href="/webbanhang/Product/show/<?php echo $product->id; ?>"
                       class="text-blue-600 font-medium hover:underline text-sm">
                        Xem chi tiết
                    </a>

                    <!-- BUTTONS -->
                    <div class="flex items-center gap-2">

                        <!-- EDIT -->
                        <a href="/webbanhang/Product/edit/<?php echo $product->id; ?>"
                           class="w-10 h-10 rounded-full bg-gray-100 hover:bg-yellow-100 text-gray-600 hover:text-yellow-600 transition flex items-center justify-center">

                            <span class="material-symbols-outlined text-[20px]">
                                edit
                            </span>

                        </a>

                        <!-- DELETE -->
                        <a href="/webbanhang/Product/delete/<?php echo $product->id; ?>"
                           onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');"
                           class="w-10 h-10 rounded-full bg-gray-100 hover:bg-red-100 text-gray-600 hover:text-red-600 transition flex items-center justify-center">

                            <span class="material-symbols-outlined text-[20px]">
                                delete
                            </span>

                        </a>

                    </div>

                </div>

            </div>

        </div>

        <?php endforeach; ?>

        <!-- ADD NEW CARD -->
        <a href="/webbanhang/Product/add"
           class="rounded-[28px] border-2 border-dashed border-gray-300 bg-white/50 hover:bg-white hover:border-blue-500 transition-all duration-300 flex flex-col items-center justify-center min-h-[520px] group">

            <div class="w-20 h-20 rounded-full bg-gray-100 group-hover:bg-blue-100 flex items-center justify-center transition-all duration-300 mb-5">

                <span class="material-symbols-outlined text-5xl text-gray-500 group-hover:text-blue-600">
                    add
                </span>

            </div>

            <h3 class="text-xl font-semibold text-gray-700 group-hover:text-blue-600 transition">
                Thêm sản phẩm mới
            </h3>

            <p class="text-gray-400 mt-2 text-sm">
                Tạo nhanh sản phẩm cho cửa hàng
            </p>

        </a>

    </div>

</main>

<?php include 'app/views/shares/footer.php'; ?>