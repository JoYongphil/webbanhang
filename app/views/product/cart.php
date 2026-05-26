<?php include 'app/views/shares/header.php'; ?>

<main class="max-w-[1024px] mx-auto px-4 md:px-8 py-20">

    <!-- HEADING -->
    <div class="mb-14 border-b border-gray-200 pb-10">

        <h1 class="text-5xl md:text-6xl font-semibold tracking-tight text-gray-900 mb-4">
            Giỏ hàng
        </h1>

        <p class="text-gray-500 text-lg">
            Vận chuyển miễn phí cho mọi đơn hàng.
        </p>

    </div>

    <?php if (!empty($cart)): ?>

        <?php
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }
        ?>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            <!-- PRODUCT LIST -->
            <div class="lg:col-span-8 space-y-8">

                <?php foreach ($cart as $id => $item): ?>

                <div class="flex flex-col md:flex-row gap-6 border-b border-gray-200 pb-8 group">

                    <!-- IMAGE -->
                    <div class="w-full md:w-48 h-48 bg-white rounded-2xl overflow-hidden flex items-center justify-center border border-gray-100">

                        <?php if ($item['image']): ?>

                            <img
                                src="/webbanhang/<?php echo $item['image']; ?>"
                                alt="Product Image"
                                class="w-full h-full object-contain p-4 group-hover:scale-105 transition-transform duration-500"
                            >

                        <?php else: ?>

                            <div class="flex flex-col items-center justify-center text-gray-400">

                                <span class="material-symbols-outlined text-5xl">
                                    image
                                </span>

                            </div>

                        <?php endif; ?>

                    </div>

                    <!-- CONTENT -->
                    <div class="flex-1 flex flex-col justify-between py-2">

                        <!-- TOP -->
                        <div class="flex justify-between items-start gap-4">

                            <div>

                                <h2 class="text-2xl font-semibold text-gray-900">

                                    <?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?>

                                </h2>

                                <p class="text-sm text-gray-500 mt-2">
                                    Sản phẩm chính hãng cao cấp.
                                </p>

                            </div>

                            <div class="text-right">

                                <p class="text-2xl font-semibold text-gray-900">

                                    <?php echo number_format($item['price'], 0, ',', '.'); ?>đ

                                </p>

                            </div>

                        </div>

                        <!-- BOTTOM -->
                        <div class="flex items-center justify-between mt-6">

                            <!-- QUANTITY -->
                            <div class="flex items-center gap-4">

                                <label class="text-sm text-gray-500">
                                    Số lượng:
                                </label>

                                <div class="flex items-center border border-gray-300 rounded-full px-2 py-1 gap-3">

                                    <a 
                                        href="/webbanhang/Product/decreaseQuantity/<?php echo $id; ?>"
                                        class="w-6 h-6 flex items-center justify-center rounded-full hover:bg-gray-100 transition"
                                    >
                                        <span class="material-symbols-outlined text-sm">remove</span>
                                    </a>

                                    <span class="text-sm min-w-[20px] text-center">

                                        <?php echo htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8'); ?>

                                    </span>

                                    <a 
                                        href="/webbanhang/Product/increaseQuantity/<?php echo $id; ?>"
                                        class="w-6 h-6 flex items-center justify-center rounded-full hover:bg-gray-100 transition"
                                    >
                                        <span class="material-symbols-outlined text-sm">add</span>
                                    </a>


                                </div>

                            </div>

                            <!-- REMOVE -->
                            <a
                                href="/webbanhang/Product/removeFromCart/<?php echo $id; ?>"
                                class="text-blue-600 hover:underline text-sm"
                            >
                                Gỡ bỏ
                            </a>

                        </div>

                    </div>

                </div>

                <?php endforeach; ?>

            </div>

            <!-- SUMMARY -->
            <div class="lg:col-span-4">

                <div class="sticky top-[120px] space-y-6">

                    <!-- TOTAL -->
                    <div class="space-y-4">

                        <div class="flex justify-between text-gray-500">

                            <span>Tạm tính</span>

                            <span>
                                <?php echo number_format($total, 0, ',', '.'); ?>đ
                            </span>

                        </div>

                        <div class="flex justify-between text-gray-500">

                            <span>Vận chuyển</span>

                            <span>Miễn phí</span>

                        </div>

                        <div class="flex justify-between border-t border-gray-200 pt-4 text-2xl font-semibold">

                            <span>Tổng cộng</span>

                            <span>
                                <?php echo number_format($total, 0, ',', '.'); ?>đ
                            </span>

                        </div>

                    </div>

                    <!-- BUTTONS -->
                    <div class="space-y-4">

                        <a
                            href="/webbanhang/Product/checkout"
                            class="w-full bg-blue-600 text-white py-4 rounded-full text-center text-lg font-semibold hover:bg-blue-700 transition block"
                        >
                            Thanh toán
                        </a>

                        <a
                            href="/webbanhang/Product"
                            class="w-full text-blue-600 hover:underline text-center block"
                        >
                            Tiếp tục mua sắm
                        </a>

                    </div>

                    <!-- SHIPPING -->
                    <div class="bg-[#f5f5f7] p-6 rounded-3xl">

                        <div class="flex gap-4">

                            <span class="material-symbols-outlined text-blue-600">
                                local_shipping
                            </span>

                            <div>

                                <h4 class="text-sm font-semibold text-gray-900">
                                    Giao hàng tận nơi miễn phí
                                </h4>

                                <p class="text-sm text-gray-500 mt-1">
                                    Đơn hàng của bạn đủ điều kiện nhận giao hàng tiêu chuẩn miễn phí.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    <?php else: ?>

        <!-- EMPTY STATE -->
        <div class="text-center py-24">

            <span class="material-symbols-outlined text-gray-300 text-8xl mb-6">
                shopping_bag
            </span>

            <h2 class="text-4xl font-semibold text-gray-900 mb-4">
                Giỏ hàng của bạn đang trống
            </h2>

            <p class="text-lg text-gray-500 mb-10 max-w-xl mx-auto">
                Hãy khám phá các sản phẩm tuyệt vời của chúng tôi và thêm chúng vào giỏ hàng của bạn.
            </p>

            <a
                href="/webbanhang/Product"
                class="inline-block bg-blue-600 text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-blue-700 transition"
            >
                Tiếp tục mua sắm
            </a>

        </div>

    <?php endif; ?>

</main>

<?php include 'app/views/shares/footer.php'; ?>