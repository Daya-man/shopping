<?php
    $expiry = time() + 30 * 24 * 3600;
    setcookie('test_shop','test',$expiry);
    echo $_COOKIE['test_shop'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/product.css">
    <!-- <script src="./test.js"></script> -->
    <title>Document</title>
</head>
<body>
    <p>------------------------------------------</p>
    <div id="product-list" class="flex-list">
    </div>
</body>
</html>