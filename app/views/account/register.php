```php
<?php include 'app/views/shares/header.php'; ?>

<section class="min-h-screen bg-[#fcf8fb] pt-[140px] pb-20">

    <div class="max-w-6xl mx-auto px-6">

        <div class="flex flex-col items-center">

            <!-- FORM -->
            <div class="w-full max-w-[420px]">

                <div class="text-center mb-10">

                    <h1 class="text-4xl md:text-5xl font-semibold text-gray-900 mb-3">
                        Tạo tài khoản
                    </h1>

                    <p class="text-gray-500 text-lg">
                        Tạo tài khoản để bắt đầu sử dụng hệ thống.
                    </p>

                </div>

                <?php if (isset($errors) && !empty($errors)): ?>

                    <div class="bg-red-50 border border-red-200 rounded-2xl p-4 mb-6">

                        <ul class="space-y-2">

                            <?php foreach ($errors as $err): ?>

                                <li class="text-red-600 text-sm flex items-center gap-2">
                                    <span>⚠️</span>
                                    <?php echo $err; ?>
                                </li>

                            <?php endforeach; ?>

                        </ul>

                    </div>

                <?php endif; ?>

                <form action="/webbanhang/account/save"
                      method="post"
                      class="space-y-5">

                    <!-- Username -->
                    <div>

                        <label class="block text-sm text-gray-500 mb-2">
                            Tên đăng nhập
                        </label>

                        <input
                            type="text"
                            id="username"
                            name="username"
                            placeholder="username@example.com"
                            class="w-full h-14 px-5 rounded-2xl border border-gray-300 bg-white
                                   focus:outline-none focus:ring-4 focus:ring-blue-100
                                   focus:border-blue-500 transition-all"
                        >

                    </div>

                    <!-- Fullname -->
                    <div>

                        <label class="block text-sm text-gray-500 mb-2">
                            Họ và tên
                        </label>

                        <input
                            type="text"
                            id="fullname"
                            name="fullname"
                            placeholder="Nguyễn Văn A"
                            class="w-full h-14 px-5 rounded-2xl border border-gray-300 bg-white
                                   focus:outline-none focus:ring-4 focus:ring-blue-100
                                   focus:border-blue-500 transition-all"
                        >

                    </div>

                    <!-- Password -->
                    <div>

                        <label class="block text-sm text-gray-500 mb-2">
                            Mật khẩu
                        </label>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Nhập mật khẩu"
                            class="w-full h-14 px-5 rounded-2xl border border-gray-300 bg-white
                                   focus:outline-none focus:ring-4 focus:ring-blue-100
                                   focus:border-blue-500 transition-all"
                        >

                    </div>

                    <!-- Confirm Password -->
                    <div>

                        <label class="block text-sm text-gray-500 mb-2">
                            Xác nhận mật khẩu
                        </label>

                        <input
                            type="password"
                            id="confirmpassword"
                            name="confirmpassword"
                            placeholder="Nhập lại mật khẩu"
                            class="w-full h-14 px-5 rounded-2xl border border-gray-300 bg-white
                                   focus:outline-none focus:ring-4 focus:ring-blue-100
                                   focus:border-blue-500 transition-all"
                        >

                    </div>

                    <!-- Submit -->
                    <button
                        type="submit"
                        class="w-full h-14 bg-blue-600 hover:bg-blue-700
                               text-white rounded-full font-semibold
                               transition-all duration-300 active:scale-95">

                        Đăng ký

                    </button>

                </form>

                <div class="mt-8 text-center">

                    <p class="text-gray-500">

                        Đã có tài khoản?

                        <a href="/webbanhang/account/login"
                           class="text-blue-600 font-medium hover:underline">
                            Đăng nhập ngay
                        </a>

                    </p>

                </div>

            </div>

            <!-- Banner -->
            <div class="mt-20 w-full max-w-4xl">

                <div class="overflow-hidden rounded-[32px] shadow-lg">

                    <img
                        src="https://images.unsplash.com/photo-1517336714739-489689fd1ca8"
                        alt="Apple Device"
                        class="w-full h-[450px] object-cover"
                    >

                </div>

            </div>

        </div>

    </div>

</section>

<?php include 'app/views/shares/footer.php'; ?>
```
