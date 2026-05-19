<?php include 'app/views/shares/header.php'; ?>
    <!-- Main -->
    <main class="max-w-[1024px] mx-auto px-6 py-24">

        <!-- Hero -->
        <div class="text-center mb-14">

            <h1 class="text-5xl font-semibold tracking-tight text-gray-900 mb-4">
                Thêm danh mục
            </h1>

            <p class="text-gray-500 text-lg">
                Tạo danh mục mới cho hệ thống sản phẩm.
            </p>

        </div>

        <!-- Form Card -->
        <div class="max-w-[620px] mx-auto bg-white rounded-[28px] border border-gray-200 shadow-sm p-8 md:p-12">

            <form action="/webbanhang/Category/save"
                  method="POST"
                  class="space-y-10"
                  id="addCategoryForm">

                <!-- Category Name -->
                <div>

                    <label class="block text-[15px] font-semibold text-gray-800 mb-3">
                        Tên danh mục
                    </label>

                    <input
                        type="text"
                        name="name"
                        required
                        placeholder="Ví dụ: Điện thoại, Laptop..."
                        class="w-full h-[56px] px-6 rounded-full border border-gray-300 bg-gray-50 text-[16px] focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition"
                    >

                    <p class="text-sm text-gray-500 mt-3 px-2">
                        Sử dụng tên ngắn gọn, dễ hiểu để phân loại sản phẩm tốt hơn.
                    </p>

                </div>

                <!-- Bento Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div class="rounded-2xl border border-gray-200 bg-[#f8f8fa] p-5">

                        <span class="material-symbols-outlined text-blue-600 mb-3">
                            visibility
                        </span>

                        <h3 class="font-semibold text-sm mb-2">
                            Chế độ hiển thị
                        </h3>

                        <p class="text-sm text-gray-500 leading-relaxed">
                            Danh mục sẽ được hiển thị trực tiếp trên hệ thống cửa hàng.
                        </p>

                    </div>

                    <div class="rounded-2xl border border-gray-200 bg-[#f8f8fa] p-5">

                        <span class="material-symbols-outlined text-blue-600 mb-3">
                            sort
                        </span>

                        <h3 class="font-semibold text-sm mb-2">
                            Thứ tự ưu tiên
                        </h3>

                        <p class="text-sm text-gray-500 leading-relaxed">
                            Sắp xếp vị trí danh mục trên giao diện khách hàng.
                        </p>

                    </div>

                </div>

                <!-- Button -->
                <div class="pt-4 flex justify-center">

                    <button
                        type="submit"
                        id="submitBtn"
                        class="min-w-[220px] h-[54px] bg-blue-600 hover:bg-blue-700 text-white rounded-full font-medium text-[16px] transition active:scale-95 flex items-center justify-center gap-2"
                    >
                        Thêm danh mục
                    </button>

                </div>

            </form>

        </div>

        <!-- Tips -->
        <div class="mt-24 grid grid-cols-1 md:grid-cols-3 gap-10">

            <div>
                <h4 class="text-xs uppercase tracking-widest text-gray-400 font-bold mb-3">
                    Mẹo thiết kế
                </h4>

                <p class="text-gray-600 leading-relaxed">
                    Đặt tên ngắn gọn như “Laptop”, “Điện thoại”, “Phụ kiện”.
                </p>
            </div>

            <div>
                <h4 class="text-xs uppercase tracking-widest text-gray-400 font-bold mb-3">
                    Tối ưu SEO
                </h4>

                <p class="text-gray-600 leading-relaxed">
                    Hệ thống sẽ tự động tạo slug thân thiện với công cụ tìm kiếm.
                </p>
            </div>

            <div>
                <h4 class="text-xs uppercase tracking-widest text-gray-400 font-bold mb-3">
                    Khả năng mở rộng
                </h4>

                <p class="text-gray-600 leading-relaxed">
                    Có thể quản lý nhiều danh mục mà vẫn đảm bảo hiệu suất hệ thống.
                </p>
            </div>

        </div>

    </main>

<!-- Google Icons -->
<link
    rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@400"
/>

<!-- Font -->
<link
    rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
/>

<style>
    body {
        font-family: 'Inter', sans-serif;
        -webkit-font-smoothing: antialiased;
    }

    .material-symbols-outlined {
        font-variation-settings:
            'FILL' 0,
            'wght' 400,
            'GRAD' 0,
            'opsz' 24;
    }
</style>

<script>

    const form = document.getElementById('addCategoryForm');

    form.addEventListener('submit', function() {

        const btn = document.getElementById('submitBtn');

        btn.innerHTML = `
            <span class="material-symbols-outlined animate-spin">
                progress_activity
            </span>
            Đang xử lý...
        `;

        btn.disabled = true;
        btn.classList.add('opacity-80');

    });

</script>

<?php include 'app/views/shares/footer.php'; ?>