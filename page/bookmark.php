<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/home.css">
	<title>ブックマーク</title>
</head>

<body>
	<?php require_once('../component/product_template.php')  ?>
	<?php require_once('../component/header.php')  ?>
	<main>
		<h2>oooさんのブックマーク</h2>

		<section class="products-container">

			<!-- phpでsql実行後、とってきた配列から必要な情報を抜き出し、ループで以下のhtmlに埋め込む -->

			<?php
			for ($i = 0; $i < 5; $i++) {
				product_template('商品名', "", "../image/sample.png", "商品画像");
			}
			?>

		</section>
	</main>
</body>

</html>