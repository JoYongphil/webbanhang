<?php include 'app/views/shares/header.php'; ?>

<main class="min-h-screen bg-[#f5f5f7] py-20 px-6">

    <div class="max-w-3xl mx-auto">

        <!-- HEADER -->
        <div class="text-center mb-14">

            <h1 class="text-5xl font-bold tracking-tight text-gray-900 mb-4">
                Thêm sản phẩm mới
            </h1>

            <p class="text-gray-500 text-lg leading-8">
                Tạo sản phẩm mới cho hệ thống quản lý cửa hàng công nghệ.
            </p>

        </div>

        <!-- ERROR -->
        <?php if (!empty($errors)): ?>

            <div class="mb-8 bg-red-50 border border-red-200 text-red-700 rounded-3xl p-6">

                <h3 class="font-semibold mb-3">
                    Đã xảy ra lỗi:
                </h3>

                <ul class="space-y-2 text-sm">

                    <?php foreach ($errors as $error): ?>

                        <li>
                            • <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
                        </li>

                    <?php endforeach; ?>

                </ul>

            </div>

        <?php endif; ?>

        <!-- FORM CARD -->
        <div class="bg-white rounded-[32px] shadow-xl shadow-gray-200/50 border border-gray-200 overflow-hidden">

            <form 
                method="POST" 
                action="/webbanhang/Product/save"
                enctype="multipart/form-data"
                onsubmit="return validateForm();"
                class="p-8 md:p-12 space-y-8"
            >

                <!-- PRODUCT NAME -->
                <div class="space-y-3">

                    <label for="name"
                           class="block text-sm font-semibold text-gray-700">
                        Tên sản phẩm
                    </label>

                    <input 
                        type="text"
                        id="name"
                        name="name"
                        required
                        placeholder="Ví dụ: iPhone 15 Pro"
                        class="w-full rounded-2xl border border-gray-200 bg-white px-5 py-4 text-gray-900 placeholder:text-gray-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none transition"
                    >

                </div>

                <!-- CATEGORY -->
                <div class="space-y-3">

                    <label for="category_id"
                           class="block text-sm font-semibold text-gray-700">
                        Danh mục
                    </label>

                    <div class="relative">

                        <select 
                            id="category_id"
                            name="category_id"
                            required
                            class="w-full appearance-none rounded-2xl border border-gray-200 bg-white px-5 py-4 text-gray-900 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none transition"
                        >

                            <?php foreach ($categories as $category): ?>

                                <option value="<?php echo $category->id; ?>">

                                    <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                        <span class="material-symbols-outlined absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                            expand_more
                        </span>

                    </div>

                </div>

                <!-- PRICE -->
                <div class="space-y-3">

                    <label for="price"
                           class="block text-sm font-semibold text-gray-700">
                        Giá sản phẩm
                    </label>

                    <input 
                        type="number"
                        id="price"
                        name="price"
                        required
                        step="0.01"
                        placeholder="0"
                        class="w-full rounded-2xl border border-gray-200 bg-white px-5 py-4 text-gray-900 placeholder:text-gray-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none transition"
                    >

                </div>

                <!-- DESCRIPTION -->
                <div class="space-y-3">

                    <label for="description"
                           class="block text-sm font-semibold text-gray-700">
                        Mô tả sản phẩm
                    </label>

                    <textarea 
                        id="description"
                        name="description"
                        required
                        rows="5"
                        placeholder="Nhập mô tả chi tiết sản phẩm..."
                        class="w-full resize-none rounded-2xl border border-gray-200 bg-white px-5 py-4 text-gray-900 placeholder:text-gray-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none transition"
                    ></textarea>

                </div>

                <!-- IMAGE -->
                <div class="space-y-3">

                    <label class="block text-sm font-semibold text-gray-700">
                        Ảnh sản phẩm
                    </label>

                    <div class="relative group">

                        <input 
                            type="file"
                            id="image"
                            name="image"
                            accept="image/*"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                        >

                        <div id="uploadBox"
                             class="border-2 border-dashed border-gray-300 rounded-3xl p-12 bg-gray-50 hover:bg-gray-100 transition flex flex-col items-center justify-center text-center">

                            <div class="w-20 h-20 rounded-full bg-white border border-gray-200 flex items-center justify-center mb-5 shadow-sm">

                                <span class="material-symbols-outlined text-5xl text-blue-600">
                                    cloud_upload
                                </span>

                            </div>

                            <h3 class="text-lg font-semibold text-gray-800 mb-2">
                                Nhấp để tải ảnh lên
                            </h3>

                            <p class="text-sm text-gray-500 leading-6">
                                PNG, JPG hoặc WEBP <br>
                                Khuyên dùng ảnh tỷ lệ 1:1
                            </p>

                        </div>

                    </div>

                </div>

                <!-- ACTION BUTTONS -->
                <div class="pt-6 flex flex-col sm:flex-row items-center gap-4">

                    <!-- SUBMIT -->
                    <button 
                        type="submit"
                        class="w-full sm:w-auto min-w-[220px] bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 hover:scale-[1.02] active:scale-95 shadow-lg shadow-blue-500/20"
                    >

                        Thêm sản phẩm

                    </button>

                    <!-- BACK -->
                    <a href="/webbanhang/Product/"
                       class="w-full sm:w-auto text-center min-w-[220px] bg-gray-100 hover:bg-gray-200 text-gray-700 px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300">

                        Quay lại danh sách

                    </a>

                </div>

            </form>

        </div>

    </div>

</main>

<!-- IMAGE PREVIEW -->
<script>

    const imageInput = document.getElementById("image");
    const uploadBox = document.getElementById("uploadBox");

    imageInput.addEventListener("change", function () {

        if (this.files && this.files[0]) {

            const reader = new FileReader();

            reader.onload = function (e) {

                uploadBox.innerHTML = `
                    <div class="relative w-full max-w-[280px] aspect-square overflow-hidden rounded-3xl shadow-lg border border-gray-200">
                        <img src="${e.target.result}" 
                             class="w-full h-full object-cover">
                    </div>

                    <p class="mt-5 text-blue-600 font-medium">
                        ${imageInput.files[0].name}
                    </p>

                    <p class="text-sm text-gray-500 mt-1">
                        Ảnh đã được chọn thành công
                    </p>
                `;
            }

            reader.readAsDataURL(this.files[0]);
        }

    });

</script>

<?php include 'app/views/shares/footer.php'; ?>