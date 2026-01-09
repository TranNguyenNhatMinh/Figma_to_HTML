<?php include 'db.php'; ?>

<h2>Danh sách sản phẩm</h2>

<a href="add.php">+ Thêm sản phẩm</a><br><br>

<table>
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Giá</th>
        <th>Ảnh</th>
        <th>Hành động</th>
    </tr>

<?php
$sql = "SELECT * FROM products ORDER BY id DESC";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['price']."</td>";
    echo "<td><img src='uploads/".$row['image_url']."' width='60'></td>";
    echo "<td>
            <a href='edit.php?id=".$row['id']."'>Sửa</a>
            <a href='delete.php?id=".$row['id']."' onclick='return confirm(\"Xóa?\")'>Xóa</a>
          </td>";
    echo "</tr>";
}
?>

</table>