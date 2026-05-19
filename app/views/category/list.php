<?php include 'app/views/shares/header.php'; ?>

<div class="min-h-screen bg-[#f5f5f7] py-14 px-6">

    <div class="max-w-6xl mx-auto">

        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 mb-12">

            <div>
                <h1 class="text-5xl font-semibold tracking-tight text-gray-900">
                    Danh mục sản phẩm
                </h1>

                <p class="text-gray-500 mt-3 text-lg">
                    Quản lý các danh mục trong hệ thống Apple Store.
                </p>
            </div>

            <a href="/webbanhang/Category/add"
               class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-7 py-4 rounded-full font-medium shadow-sm hover:shadow-md transition-all duration-300">

                <span class="text-xl leading-none">+</span>

                <span>Thêm danh mục</span>

            </a>

        </div>

        <!-- Table Card -->
        <div class="bg-white/80 backdrop-blur-xl rounded-[32px] border border-gray-200/70 shadow-sm overflow-hidden">

            <!-- Table Header -->
            <div class="grid grid-cols-12 px-8 py-5 border-b border-gray-200 bg-white/60">

                <div class="col-span-2 text-sm font-semibold tracking-wide text-gray-500 uppercase">
                    ID
                </div>

                <div class="col-span-6 text-sm font-semibold tracking-wide text-gray-500 uppercase">
                    Tên danh mục
                </div>

                <div class="col-span-4 text-sm font-semibold tracking-wide text-gray-500 uppercase text-center">
                    Thao tác
                </div>

            </div>

            <!-- Table Body -->
            <div class="divide-y divide-gray-100">

                <?php foreach ($categories as $category): ?>

                    <div class="grid grid-cols-12 items-center px-8 py-6 hover:bg-gray-50/70 transition-all duration-200">

                        <!-- ID -->
                        <div class="col-span-2">

                            <span class="text-gray-500 font-medium">
                                #<?php echo $category->id; ?>
                            </span>

                        </div>

                        <!-- Name -->
                        <div class="col-span-6">

                            <h3 class="text-lg font-semibold text-gray-900">
                                <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                            </h3>

                        </div>

                        <!-- Actions -->
                        <div class="col-span-4">

                            <div class="flex items-center justify-center gap-3">

                                <!-- Edit -->
                                <a href="/webbanhang/Category/edit/<?php echo $category->id; ?>"
                                   class="px-5 py-2.5 rounded-full bg-amber-100 text-amber-700 font-medium hover:bg-amber-200 transition-all duration-200">

                                    Sửa

                                </a>

                                <!-- Delete -->
                                <a href="/webbanhang/Category/delete/<?php echo $category->id; ?>"
                                   onclick="return confirm('Bạn có chắc muốn xóa danh mục này?');"
                                   class="px-5 py-2.5 rounded-full bg-red-100 text-red-700 font-medium hover:bg-red-200 transition-all duration-200">

                                    Xóa

                                </a>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>

    </div>

</div>

<?php include 'app/views/shares/footer.php'; ?>