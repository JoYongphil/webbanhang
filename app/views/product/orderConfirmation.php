<?php include 'app/views/shares/header.php'; ?>

<!-- SUCCESS PAGE -->
<main class="min-h-screen bg-[#fcf8fb] flex flex-col items-center justify-center px-6 py-20">

    <!-- SUCCESS ICON -->
    <div class="mb-8 opacity-0 translate-y-4 animate-[fadeInUp_0.8s_ease-out_forwards]">

        <div class="w-28 h-28 rounded-full bg-blue-100 flex items-center justify-center shadow-sm">

            <span class="material-symbols-outlined text-[70px] text-blue-600"
                  style="font-variation-settings:'FILL' 1;">
                check_circle
            </span>

        </div>

    </div>

    <!-- MESSAGE -->
    <div class="max-w-2xl text-center space-y-6">

        <h1 class="text-5xl md:text-6xl font-bold tracking-tight text-gray-900
                   opacity-0 translate-y-4
                   animate-[fadeInUp_0.8s_ease-out_0.2s_forwards]">

            Cảm ơn bạn đã đặt hàng.

        </h1>

        <p class="text-lg md:text-xl text-gray-500 leading-8
                  opacity-0 translate-y-4
                  animate-[fadeInUp_0.8s_ease-out_0.4s_forwards]">

            Đơn hàng của bạn đã được xử lý thành công.
            Chúng tôi đã gửi xác nhận đơn hàng và sẽ sớm liên hệ giao hàng.

        </p>

    </div>

    <!-- ORDER INFO -->
    <div class="mt-12 text-center
                opacity-0 translate-y-4
                animate-[fadeInUp_0.8s_ease-out_0.6s_forwards]">

        <p class="uppercase tracking-[4px] text-sm text-gray-400 mb-3">
            Mã đơn hàng
        </p>

        <p class="text-2xl font-bold text-gray-900">
            #ORDER-<?php echo rand(1000,9999); ?>
        </p>

        <!-- BUTTONS -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-5 mt-10">

            <!-- CONTINUE SHOPPING -->
            <a href="/webbanhang/Product/"
               class="bg-blue-600 hover:bg-blue-700
                      text-white font-medium
                      px-8 py-3 rounded-full
                      transition-all duration-300
                      hover:shadow-xl hover:shadow-blue-200
                      active:scale-95">

                Tiếp tục mua sắm

            </a>

            <!-- TRACK ORDER -->
            <a href="#"
               class="text-blue-600 font-medium
                      inline-flex items-center gap-1
                      hover:gap-2 transition-all">

                Theo dõi đơn hàng

                <span class="material-symbols-outlined text-[18px]">
                    chevron_right
                </span>

            </a>

        </div>

    </div>

</main>

<!-- ANIMATION -->
<style>

@keyframes fadeInUp {

    from {
        opacity: 0;
        transform: translateY(20px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }

}

</style>

<?php include 'app/views/shares/footer.php'; ?>