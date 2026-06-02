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

    private function isAdmin()
    {
        return SessionHelper::isAdmin();
    }

    public function list()
    {
        if (!$this->isAdmin()) {
            echo "Bạn không có quyền truy cập chức năng này!";
            exit;
        }
        $categories = $this->categoryModel->getCategories();
        include 'app/views/category/list.php';
    }

    // Hiển thị form thêm
    public function add()
    {
        if (!$this->isAdmin()) {
            echo "Bạn không có quyền truy cập chức năng này!";
            exit;
        }
        include 'app/views/category/add.php';
    }

    // Lưu category mới
    public function save()
    {
        if (!$this->isAdmin()) {
            echo "Bạn không có quyền truy cập chức năng này!";
            exit;
        }

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

        if (!$this->isAdmin()) {
            echo "Bạn không có quyền truy cập chức năng này!";
            exit;
        }

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
        if (!$this->isAdmin()) {
            echo "Bạn không có quyền truy cập chức năng này!";
            exit;
        }

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
        if (!$this->isAdmin()) {
            echo "Bạn không có quyền truy cập chức năng này!";
            exit;
        }
        
        $result = $this->categoryModel->deleteCategory($id);

        if ($result) {

            header('Location: /webbanhang/Category/list');

        } else {

            echo "Đã xảy ra lỗi khi xóa.";

        }
    }

}
?>
