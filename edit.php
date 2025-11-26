<?php include 'db.php'; ?>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id=$id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();
?>

<h2>Sửa sản phẩm</h2>

<form action="" method="POST" enctype="multipart/form-data">

    Tên:<br>
    <input type="text" name="name" value="<?= $product['name'] ?>" required><br><br>

    Giá:<br>
    <input type="number" name="price" value="<?= $product['price'] ?>" required><br><br>

    Ảnh hiện tại:<br>
    <?php if ($product['image_url']) { ?>
        <img src="uploads/<?= $product['image_url'] ?>" width="80"><br>
    <?php } ?>

    Ảnh mới (nếu có):<br>
    <input type="file" name="image"><br><br>

    <button type="submit" name="update">Cập nhật</button>
</form>

<?php
if (isset($_POST['update'])) {

    $name  = $_POST['name'];
    $price = $_POST['price'];

    $slug = strtolower(str_replace(" ", "-", $name));

    $image = $product['image_url'];

    if (!empty($_FILES['image']['name'])) {
        $image = time() . "_" . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $image);
    }

    $sql = "UPDATE products SET 
                name='$name',
                price='$price',
                slug='$slug',
                image_url='$image'
            WHERE id=$id";

    if ($conn->query($sql)) {
        echo "<script>alert('Đã cập nhật'); window.location='index.php';</script>";
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>
Đã gửi
Viết cho
