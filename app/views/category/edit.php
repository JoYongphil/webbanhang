<?php include 'app/views/shares/header.php'; ?>

<div class="min-h-screen bg-gray-50 py-16 px-6">

    <div class="max-w-2xl mx-auto">

        <div class="mb-10">

            <h1 class="text-4xl font-bold tracking-tight text-gray-900">
                Sửa danh mục
            </h1>

            <p class="text-gray-500 mt-2">
                Cập nhật thông tin danh mục sản phẩm.
            </p>

        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-gray-200 p-10">

            <form method="POST"
                  action="/webbanhang/Category/update"
                  class="space-y-8">

                <input type="hidden"
                       name="id"
                       value="<?php echo $category->id; ?>">

                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                        Tên danh mục
                    </label>

                    <input type="text"
                           name="name"
                           required
                           value="<?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>"
                           class="w-full h-14 px-6 rounded-2xl border border-gray-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none transition">

                </div>

                <div class="flex items-center gap-4 pt-4">

                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-full font-medium transition">
                        Lưu thay đổi
                    </button>

                    <a href="/webbanhang/Category/list"
                       class="px-8 py-4 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium transition">
                        Hủy
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

<?php include 'app/views/shares/footer.php'; ?>