<?php
// Require SessionHelper and other necessary files
require_once('app/config/database.php');
require_once('app/models/CategoryModel.php');

class CategoryController
{
    private $categoryModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->categoryModel = new CategoryModel($this->db);
    }

    public function list()
    {
        $categories = $this->categoryModel->getCategories();
        include 'app/views/category/list.php';
    }

    // Hiển thị form thêm
    public function add()
    {
        include 'app/views/category/add.php';
    }

    // Lưu category mới
    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';

            $result = $this->categoryModel->addCategory(
                $name,
                $description
            );

            if ($result) {

                header('Location: /webbanhang/Category/list');

            } else {

                echo "Đã xảy ra lỗi khi thêm category.";

            }
        }
    }

    // Hiển thị form sửa
    public function edit($id)
    {
        $category = $this->categoryModel->getCategoryById($id);

        if ($category) {

            include 'app/views/category/edit.php';

        } else {

            echo "Không tìm thấy category.";

        }
    }

    // Cập nhật category
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];

            $result = $this->categoryModel->updateCategory(
                $id,
                $name,
                $description
            );

            if ($result) {

                header('Location: /webbanhang/Category/list');

            } else {

                echo "Đã xảy ra lỗi khi cập nhật.";

            }
        }
    }

    // Xóa category
    public function delete($id)
    {
        $result = $this->categoryModel->deleteCategory($id);

        if ($result) {

            header('Location: /webbanhang/Category/list');

        } else {

            echo "Đã xảy ra lỗi khi xóa.";

        }
    }

}
?>
