<?php include 'app/views/shares/header.php'; ?>

<section class="min-h-screen bg-[#fcf8fb] flex items-center justify-center px-4 py-20">

    <div class="w-full max-w-6xl grid lg:grid-cols-2 gap-12 items-center">

        <!-- LEFT CONTENT -->
        <div class="hidden lg:block">

            <h1 class="text-5xl font-bold text-gray-900 leading-tight mb-6">
                Chào mừng trở lại
            </h1>

            <p class="text-lg text-gray-500 mb-8">
                Đăng nhập để quản lý sản phẩm, danh mục và theo dõi hoạt động cửa hàng của bạn.
            </p>

            <img
                src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9"
                alt="Apple Store"
                class="w-full rounded-3xl shadow-xl object-cover h-[450px]"
            >
        </div>

        <!-- LOGIN CARD -->
        <div class="flex justify-center">

            <div class="bg-white w-full max-w-md rounded-[32px] shadow-xl border border-gray-100 p-10">

                <div class="text-center mb-8">

                    <div class="w-16 h-16 bg-blue-600 rounded-full mx-auto flex items-center justify-center mb-4">
                        <span class="text-white text-2xl">🍎</span>
                    </div>

                    <h2 class="text-3xl font-bold text-gray-900">
                        Đăng nhập
                    </h2>

                    <p class="text-gray-500 mt-2">
                        Vui lòng đăng nhập để tiếp tục
                    </p>

                </div>

                <form action="/webbanhang/account/checklogin" method="post">

                    <!-- USERNAME -->
                    <div class="mb-5">

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Email
                        </label>

                        <input
                            type="text"
                            name="username"
                            placeholder="Nhập Email"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required
                        >
                    </div>

                    <!-- PASSWORD -->
                    <div class="mb-3">

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Mật khẩu
                        </label>

                        <input
                            type="password"
                            name="password"
                            placeholder="Nhập mật khẩu"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required
                        >
                    </div>

                    <div class="flex justify-end mb-6">

                        <a href="#"
                           class="text-sm text-blue-600 hover:underline">
                            Quên mật khẩu?
                        </a>

                    </div>

                    <!-- BUTTON -->
                    <button
                        type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 rounded-full font-semibold transition duration-300"
                    >
                        Đăng nhập
                    </button>

                </form>

                <!-- SOCIAL -->
                <div class="mt-8">

                    <div class="relative text-center mb-6">

                        <span class="bg-white px-4 text-gray-400 text-sm relative z-10">
                            Hoặc tiếp tục với
                        </span>

                        <div class="absolute left-0 top-1/2 w-full border-t border-gray-200 -z-0"></div>

                    </div>

                </div>

                <!-- REGISTER -->
                <div class="text-center mt-8">

                    <p class="text-gray-500">
                        Chưa có tài khoản?

                        <a href="/webbanhang/account/register"
                           class="text-blue-600 font-semibold hover:underline">
                            Đăng ký ngay
                        </a>

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<?php include 'app/views/shares/footer.php'; ?>
