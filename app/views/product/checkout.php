<?php include 'app/views/shares/header.php'; ?>

<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com?plugins=forms"></script>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@400&display=swap" rel="stylesheet"/>

<script>
tailwind.config = {
    theme: {
        extend: {
            colors: {
                primary: "#0071e3",
                surface: "#f5f5f7",
                dark: "#1d1d1f",
                grayText: "#6e6e73"
            },
            fontFamily: {
                inter: ['Inter', 'sans-serif']
            }
        }
    }
}
</script>

<style>
    body{
        font-family: 'Inter', sans-serif;
        background: #ffffff;
    }

    .apple-input:focus{
        outline: none;
        border-color: #0071e3;
        box-shadow: 0 0 0 4px rgba(0,113,227,0.15);
    }

    .material-symbols-outlined{
        font-variation-settings:
        'FILL' 0,
        'wght' 400,
        'GRAD' 0,
        'opsz' 24;
    }
</style>

<div class="min-h-screen bg-white">

    <!-- Top Header -->
    <div class="bg-black h-[48px] flex items-center justify-center">
        <div class="w-full max-w-6xl px-6 flex justify-between items-center">
            <h1 class="text-white text-lg font-semibold tracking-wide">
                Thanh toán
            </h1>

            <a href="/webbanhang/Product/cart"
               class="text-sm text-gray-300 hover:text-white transition">
                Giỏ hàng
            </a>
        </div>
    </div>

    <!-- Hero -->
    <section class="max-w-6xl mx-auto px-6 py-14">
        <h2 class="text-5xl font-bold text-dark mb-4">
            Hoàn tất thanh toán.
        </h2>

        <p class="text-grayText text-lg max-w-2xl leading-relaxed">
            Vui lòng nhập đầy đủ thông tin giao hàng để chúng tôi có thể
            xử lý và vận chuyển đơn hàng nhanh nhất đến bạn.
        </p>
    </section>

    <!-- Checkout Layout -->
    <section class="max-w-6xl mx-auto px-6 pb-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            <!-- LEFT -->
            <div class="lg:col-span-7">

                <form method="POST"
                      action="/webbanhang/Product/processCheckout"
                      class="space-y-10">

                    <!-- Delivery Info -->
                    <div class="bg-surface rounded-3xl p-8 shadow-sm">

                        <div class="flex items-center gap-3 mb-8">
                            <span class="material-symbols-outlined text-primary text-3xl">
                                local_shipping
                            </span>

                            <h3 class="text-2xl font-semibold text-dark">
                                Thông tin giao hàng
                            </h3>
                        </div>

                        <!-- Name -->
                        <div class="mb-6">
                            <label class="block text-sm text-grayText mb-2">
                                Họ tên
                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                required
                                placeholder="Nguyễn Văn A"
                                class="apple-input w-full rounded-2xl border border-gray-300 px-5 py-4 bg-white transition"
                            >
                        </div>

                        <!-- Phone -->
                        <div class="mb-6">
                            <label class="block text-sm text-grayText mb-2">
                                Số điện thoại
                            </label>

                            <input
                                type="text"
                                id="phone"
                                name="phone"
                                required
                                placeholder="090 123 4567"
                                class="apple-input w-full rounded-2xl border border-gray-300 px-5 py-4 bg-white transition"
                            >
                        </div>

                        <!-- Address -->
                        <div>
                            <label class="block text-sm text-grayText mb-2">
                                Địa chỉ
                            </label>

                            <textarea
                                id="address"
                                name="address"
                                required
                                rows="5"
                                placeholder="Số nhà, tên đường, phường/xã, quận/huyện..."
                                class="apple-input w-full rounded-2xl border border-gray-300 px-5 py-4 bg-white resize-none transition"
                            ></textarea>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div class="bg-surface rounded-3xl p-8 shadow-sm">

                        <div class="flex items-center gap-3 mb-8">
                            <span class="material-symbols-outlined text-primary text-3xl">
                                payments
                            </span>

                            <h3 class="text-2xl font-semibold text-dark">
                                Phương thức thanh toán
                            </h3>
                        </div>

                        <div class="space-y-4">

                            <!-- COD -->
                            <label class="flex items-start gap-4 border border-primary bg-blue-50 rounded-2xl p-5 cursor-pointer">

                                <input
                                    type="radio"
                                    name="payment"
                                    value="cod"
                                    checked
                                    class="mt-1 text-primary"
                                >

                                <div class="flex-1">
                                    <p class="font-medium text-dark">
                                        Thanh toán khi nhận hàng (COD)
                                    </p>

                                    <p class="text-sm text-grayText mt-1">
                                        Thanh toán trực tiếp cho shipper khi nhận hàng.
                                    </p>
                                </div>

                                <span class="material-symbols-outlined text-primary">
                                    local_shipping
                                </span>
                            </label>

                            <!-- Bank -->
                            <label class="flex items-start gap-4 border border-gray-300 rounded-2xl p-5 cursor-pointer hover:border-primary transition">

                                <input
                                    type="radio"
                                    name="payment"
                                    value="banking"
                                    class="mt-1 text-primary"
                                >

                                <div class="flex-1">
                                    <p class="font-medium text-dark">
                                        Chuyển khoản ngân hàng
                                    </p>

                                    <p class="text-sm text-grayText mt-1">
                                        Thanh toán bằng QR hoặc ứng dụng ngân hàng.
                                    </p>
                                </div>

                                <span class="material-symbols-outlined text-gray-500">
                                    account_balance
                                </span>
                            </label>

                        </div>
                    </div>
                </form>
            </div>

            <!-- RIGHT -->
            <!-- RIGHT -->
            <div class="lg:col-span-5">

            <?php
            $total = 0;
            ?>

            <div class="sticky top-10 bg-surface rounded-3xl p-8 shadow-sm">

                <h3 class="text-2xl font-semibold text-dark mb-8">
                    Tóm tắt đơn hàng
                </h3>

                <!-- Danh sách sản phẩm -->
                <?php
                    $total = 0;
                ?>

                <!-- PRODUCTS -->
                <div class="space-y-6">

                    <?php if (!empty($_SESSION['cart'])): ?>

                        <?php foreach ($_SESSION['cart'] as $item): ?>

                            <?php
                                $itemTotal = $item['price'] * $item['quantity'];
                                $total += $itemTotal;
                            ?>

                            <div class="flex items-center gap-5 pb-6 border-b border-white/10">

                                <!-- IMAGE -->
                                <div class="w-24 h-24 rounded-2xl bg-white overflow-hidden flex items-center justify-center">

                                    <img
                                        src="/webbanhang/<?php echo $item['image']; ?>"
                                        alt="<?php echo htmlspecialchars($item['name']); ?>"
                                        class="w-full h-full object-cover"
                                    >

                                </div>

                                <!-- INFO -->
                                <div class="flex-1">

                                    <p class="font-semibold text-lg">
                                        <?php echo htmlspecialchars($item['name']); ?>
                                    </p>

                                    <p class="text-sm text-gray-400 mt-1">
                                        Số lượng: <?php echo $item['quantity']; ?>
                                    </p>

                                    <p class="mt-2 font-bold text-xl">
                                        <?php echo number_format($itemTotal, 0, ',', '.'); ?>đ
                                    </p>

                                </div>

                            </div>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <p class="text-gray-400">
                            Giỏ hàng đang trống.
                        </p>

                    <?php endif; ?>

                </div>

                <!-- TOTAL -->
                <div class="space-y-4 py-8 border-b border-white/10">

                    <div class="flex justify-between text-gray-300">

                        <span>Tạm tính</span>

                        <span>
                            <?php echo number_format($total, 0, ',', '.'); ?>đ
                        </span>

                    </div>

                    <div class="flex justify-between text-gray-300">

                        <span>Vận chuyển</span>

                        <span class="text-green-400">
                            Miễn phí
                        </span>

                    </div>

                    <div class="flex justify-between text-2xl font-bold pt-3">

                        <span>Tổng cộng</span>

                        <span>
                            <?php echo number_format($total, 0, ',', '.'); ?>đ
                        </span>

                    </div>

                </div>

                <!-- Button -->
                <div class="pt-8 space-y-4">

                    <button
                        type="submit"
                        onclick="document.querySelector('form').submit()"
                        class="w-full bg-primary text-white py-4 rounded-full font-semibold hover:opacity-90 active:scale-[0.98] transition"
                    >
                        Thanh toán
                    </button>

                    <a href="/webbanhang/Product/cart"
                    class="flex items-center justify-center gap-2 text-primary hover:underline">

                        <span class="material-symbols-outlined text-[18px]">
                            arrow_back
                        </span>

                        Quay lại giỏ hàng
                    </a>

                </div>

            </div>
        </div>

<?php include 'app/views/shares/footer.php'; ?>