<?php include 'app/views/shares/header.php'; ?>

<main class="bg-surface-container-low min-h-screen py-section-v-padding px-margin-mobile md:px-margin-desktop">

    <div class="max-w-[1024px] mx-auto">

        <!-- Header -->
        <div class="mb-12 flex flex-col md:flex-row md:items-center md:justify-between gap-6">

            <h1 class="font-headline-lg text-headline-lg tracking-tight text-on-surface">
                Sửa sản phẩm
            </h1>

            <a href="/webbanhang/Product/list"
               class="flex items-center gap-1 text-primary font-body-md hover:opacity-70 transition">

                <span class="material-symbols-outlined text-[18px]">
                    chevron_left
                </span>

                Quay lại danh sách
            </a>

        </div>

        <!-- Error -->
        <?php if (!empty($errors)): ?>

            <div class="mb-8 bg-error-container text-on-error-container border border-red-200 rounded-2xl p-5">
                <ul class="space-y-2">

                    <?php foreach ($errors as $error): ?>

                        <li>
                            • <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
                        </li>

                    <?php endforeach; ?>

                </ul>
            </div>

        <?php endif; ?>

        <!-- Form Card -->
        <section class="bg-white rounded-[28px] border border-outline-variant/20 shadow-sm p-8 md:p-12">

            <form method="POST"
                  action="/webbanhang/Product/update"
                  enctype="multipart/form-data"
                  class="space-y-10">

                <input type="hidden"
                       name="id"
                       value="<?php echo $product->id; ?>">

                <!-- Product Name -->
                <div class="flex flex-col gap-3">

                    <label for="name"
                           class="text-sm font-medium text-on-surface-variant ml-2">

                        Tên sản phẩm
                    </label>

                    <input type="text"
                           id="name"
                           name="name"
                           required
                           value="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>"
                           class="w-full h-[56px] px-6 rounded-full border border-outline-variant bg-surface text-on-surface focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition">

                </div>

                <!-- Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">

                    <!-- Category -->
                    <div class="flex flex-col gap-3">

                        <label for="category_id"
                               class="text-sm font-medium text-on-surface-variant ml-2">

                            Danh mục
                        </label>

                        <div class="relative">

                            <select id="category_id"
                                    name="category_id"
                                    required
                                    class="w-full h-[56px] px-6 pr-12 rounded-full border border-outline-variant bg-surface appearance-none text-on-surface focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition">

                                <?php foreach ($categories as $category): ?>

                                    <option value="<?php echo $category->id; ?>"
                                        <?php echo $category->id == $product->category_id ? 'selected' : ''; ?>>

                                        <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                            <span class="material-symbols-outlined absolute right-5 top-1/2 -translate-y-1/2 text-outline pointer-events-none">
                                unfold_more
                            </span>

                        </div>

                    </div>

                    <!-- Price -->
                    <div class="flex flex-col gap-3">

                        <label for="price"
                               class="text-sm font-medium text-on-surface-variant ml-2">

                            Giá bán (VNĐ)
                        </label>

                        <input type="number"
                               id="price"
                               name="price"
                               step="0.01"
                               required
                               value="<?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>"
                               class="w-full h-[56px] px-6 rounded-full border border-outline-variant bg-surface text-on-surface focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition">

                    </div>

                </div>

                <!-- Description -->
                <div class="flex flex-col gap-3">

                    <label for="description"
                           class="text-sm font-medium text-on-surface-variant ml-2">

                        Mô tả chi tiết
                    </label>

                    <textarea id="description"
                              name="description"
                              rows="6"
                              required
                              class="w-full p-6 rounded-3xl border border-outline-variant bg-surface resize-none text-on-surface focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition"><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></textarea>

                </div>

                <!-- Images -->
                <div class="flex flex-col gap-4">

                    <label class="text-sm font-medium text-on-surface-variant ml-2">
                        Ảnh sản phẩm
                    </label>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        <!-- Current Preview -->
                        <div class="relative aspect-square rounded-3xl border border-outline-variant bg-surface overflow-hidden group">

                            <?php if (!empty($product->image)): ?>

                                <img
                                    id="preview"
                                    src="/webbanhang/<?php echo $product->image; ?>"
                                    class="w-full h-full object-contain p-8 group-hover:scale-105 transition-transform duration-500"
                                >

                            <?php else: ?>

                                <img id="preview"
                                     class="w-full h-full object-contain p-8 hidden">

                                <div id="noImage"
                                     class="w-full h-full flex items-center justify-center text-on-surface-variant">

                                    Chưa có ảnh

                                </div>

                            <?php endif; ?>

                        </div>

                        <!-- Upload -->
                        <label for="image"
                               class="aspect-square border-2 border-dashed border-outline-variant/50 rounded-3xl bg-surface flex flex-col items-center justify-center gap-4 cursor-pointer hover:bg-surface-container transition text-center p-6">

                            <div class="w-14 h-14 rounded-full bg-primary/10 flex items-center justify-center">

                                <span class="material-symbols-outlined text-primary text-[30px]">
                                    cloud_upload
                                </span>

                            </div>

                            <div>

                                <p class="font-medium text-on-surface">
                                    Chọn ảnh mới
                                </p>

                                <p class="text-sm text-on-surface-variant mt-1">
                                    PNG, JPG tối đa 5MB
                                </p>

                            </div>

                            <input type="file"
                                   id="image"
                                   name="image"
                                   accept="image/*"
                                   class="hidden">

                        </label>

                    </div>

                </div>

                <!-- Actions -->
                <div class="pt-8 border-t border-outline-variant/30 flex flex-col md:flex-row justify-center gap-4">

                    <button type="submit"
                            class="min-w-[220px] h-[56px] px-10 rounded-full bg-primary-container text-white font-semibold hover:opacity-90 active:scale-95 transition-all">

                        Lưu thay đổi

                    </button>

                    <a href="/webbanhang/Product/list"
                       class="min-w-[220px] h-[56px] px-10 rounded-full flex items-center justify-center text-primary font-medium hover:bg-primary/5 transition-all">

                        Hủy

                    </a>

                </div>

            </form>

        </section>

    </div>

</main>

<!-- Preview Image -->
<script>

document.getElementById('image').addEventListener('change', function(event) {

    const file = event.target.files[0];

    if(file){

        const preview = document.getElementById('preview');

        preview.src = URL.createObjectURL(file);

        preview.classList.remove('hidden');

        const noImage = document.getElementById('noImage');

        if(noImage){
            noImage.style.display = 'none';
        }
    }
});

</script>

<?php include 'app/views/shares/footer.php'; ?>