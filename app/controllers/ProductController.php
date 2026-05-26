<?php
// Require SessionHelper and other necessary files
require_once('app/config/database.php');
require_once('app/models/ProductModel.php');
require_once('app/models/CategoryModel.php');
require_once('app/models/CategoryModel.php');
class ProductController
{
    private $categoryModel;
    private $productModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();

        $this->productModel = new ProductModel($this->db);

        $this->categoryModel = new CategoryModel($this->db);
    }

    public function index()
    {
        $categoryModel = new CategoryModel($this->db);

        $categories = $categoryModel->getCategories();

        if (isset($_GET['category'])) {

            $category_id = $_GET['category'];

            $products = $this->productModel->getProductsByCategory($category_id);

        } else {

            $products = $this->productModel->getProducts();
        }

        include 'app/views/product/list.php';
    }

    public function show($id)
    {
        $product = $this->productModel->getProductById($id);
        if ($product) {
            include 'app/views/product/show.php';
        } else {
            echo "Không thấy sản phẩm.";
        }
    }

    public function add()
    {
        $categories = (new CategoryModel($this->db))->getCategories();
        include_once 'app/views/product/add.php';
    }

    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name        = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price       = $_POST['price'] ?? '';
            $category_id = $_POST['category_id'] ?? null;
            $image = "";

            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {

                $target_dir = "public/images/";

                // Tạo thư mục nếu chưa tồn tại
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }

                $image = time() . "_" . basename($_FILES["image"]["name"]);

                $target_file = $target_dir . $image;

                move_uploaded_file(
                    $_FILES["image"]["tmp_name"],
                    $target_file
                );

                // Lưu path vào DB
                $image = $target_file;
            }

            $result = $this->productModel->addProduct($name, $description, $price, $image, $category_id);

            if (is_array($result)) {
                $errors     = $result;
                $categories = (new CategoryModel($this->db))->getCategories();
                include 'app/views/product/add.php';
            } else {
                header('Location: /webbanhang/Product');
            }
        }
    }

    public function edit($id)
    {
        $product    = $this->productModel->getProductById($id);
        $categories = (new CategoryModel($this->db))->getCategories();

        if ($product) {
            include 'app/views/product/edit.php';
        } else {
            echo "Không thấy sản phẩm.";
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id          = $_POST['id'];
            $name        = $_POST['name'];
            $description = $_POST['description'];
            $price       = $_POST['price'];
            $category_id = $_POST['category_id'];

            $product = $this->productModel->getProductById($id);
            $image = $product->image;

            
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                
                $target_dir = "public/images/";
                
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }
                
                $new_image = time() . "_" . basename($_FILES["image"]["name"]);
                
                $target_file = $target_dir . $new_image;
                
                move_uploaded_file(
                    $_FILES["image"]["tmp_name"],
                    $target_file
                );
                
                $image = $target_file;
            }
            
            $edit = $this->productModel->updateProduct($id, $name, $description, $price, $image, $category_id);
            if ($edit) {
                header('Location: /webbanhang/Product');
            } else {
                echo "Đã xảy ra lỗi khi lưu sản phẩm.";
            }
        }
    }

    public function delete($id)
    {
        if ($this->productModel->deleteProduct($id)) {
            header('Location: /webbanhang/Product');
        } else {
            echo "Đã xảy ra lỗi khi xóa sản phẩm.";
        }
    }

    public function addToCart($id)
    {
        $product = $this->productModel->getProductById($id);

        if (!$product) {
            echo json_encode([
                'success' => false
            ]);
            return;
        }

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (isset($_SESSION['cart'][$id])) {

            $_SESSION['cart'][$id]['quantity']++;

        } else {

            $_SESSION['cart'][$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => 1
            ];
        }

        $totalQuantity = 0;

        foreach ($_SESSION['cart'] as $item) {
            $totalQuantity += $item['quantity'];
        }

        header('Content-Type: application/json');

        echo json_encode([
            'success' => true,
            'totalQuantity' => $totalQuantity
        ]);
    }

    public function increaseQuantity($id)
    {
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity']++;
        }

        header('Location: /webbanhang/Product/cart');
        exit;
    }

    public function decreaseQuantity($id)
    {
        if (isset($_SESSION['cart'][$id])) {

            $_SESSION['cart'][$id]['quantity']--;

            // Nếu số lượng <= 0 thì xóa khỏi giỏ
            if ($_SESSION['cart'][$id]['quantity'] <= 0) {
                unset($_SESSION['cart'][$id]);
            }
        }

        header('Location: /webbanhang/Product/cart');
        exit;
    }

    public function removeFromCart($id)
    {
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }

        header('Location: /webbanhang/Product/cart');
        exit;
    }

    public function cart()
    {
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        include 'app/views/product/cart.php';
    }

    public function checkout()
    {
        include 'app/views/product/checkout.php';
    }

    public function processCheckout()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name    = $_POST['name'];
            $phone   = $_POST['phone'];
            $address = $_POST['address'];

            // Kiểm tra giỏ hàng
            if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
                echo "Giỏ hàng trống.";
                return;
            }

            // Bắt đầu giao dịch
            $this->db->beginTransaction();

            try {
                // Lưu thông tin đơn hàng vào bảng orders
                $query = "INSERT INTO orders (name, phone, address) 
                        VALUES (:name, :phone, :address)";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':phone', $phone);
                $stmt->bindParam(':address', $address);
                $stmt->execute();

                $order_id = $this->db->lastInsertId();

                // Lưu chi tiết đơn hàng vào bảng order_details
                $cart = $_SESSION['cart'];
                foreach ($cart as $product_id => $item) {
                    $query = "INSERT INTO order_details (order_id, product_id, quantity, price) 
                            VALUES (:order_id, :product_id, :quantity, :price)";
                    $stmt = $this->db->prepare($query);
                    $stmt->bindParam(':order_id', $order_id);
                    $stmt->bindParam(':product_id', $product_id);
                    $stmt->bindParam(':quantity', $item['quantity']);
                    $stmt->bindParam(':price', $item['price']);
                    $stmt->execute();
                }

                // Xóa giỏ hàng sau khi đặt hàng thành công
                unset($_SESSION['cart']);

                // Commit giao dịch
                $this->db->commit();

                // Chuyển hướng đến trang xác nhận đơn hàng
                header('Location: /webbanhang/Product/orderConfirmation');
            } catch (Exception $e) {
                // Rollback giao dịch nếu có lỗi
                $this->db->rollBack();
                echo "Đã xảy ra lỗi khi xử lý đơn hàng: " . $e->getMessage();
            }
        }
    }

    public function orderConfirmation()
    {
        include 'app/views/product/orderConfirmation.php';
    }

    
}
?>
