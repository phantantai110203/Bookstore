<!DOCTYPE html>
<html>
<head>
    <title>Trang thanh toán</title>
</head>
<body>
    <h2>Thông tin thanh toán</h2>
    <form method="post" action="thanh-toan.php">
        <label for="name">Họ tên:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <label for="amount">Số tiền:</label>
        <input type="number" name="amount" id="amount" required><br>

        <input type="submit" value="Thanh toán">
    </form>
</body>
</html>
