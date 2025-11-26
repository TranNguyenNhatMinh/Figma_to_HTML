<?php include 'db.php'; ?>

<h2>Thêm sản phẩm</h2>

<form action="" method="POST" enctype="multipart/form-data">

    Tên:<br>
    <input type="text" name="name" required><br><br>

    Giá:<br>
    <input type="number" name="price" required><br><br>

    Ảnh đại diện:<br>
    <input type="file" name="image"><br><br>

    <button type="submit" name="save">Lưu</button>
</form>

<?php
if (isset($_POST['save'])) {

    $name  = $_POST['name'];
    $price = $_POST['price'];

    $image = null;

    if (!empty($_FILES['image']['name'])) {
        $image = time() . "_" . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $image);
    }

    $slug = strtolower(str_replace(" ", "-", $name));

    $sql = "INSERT INTO products (name, price, slug, image_url)
            VALUES ('$name', '$price', '$slug', '$image')";

    if ($conn->query($sql)) {
        echo "<script>alert('Đã thêm sản phẩm'); window.location='index.php';</script>";
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>