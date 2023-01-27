<?php
function product_template($product_name, $link, $image_src, $image_alt)
{
?>

	<div class="product">
		<a class="product-link" href="<?= $link ?>" target="_blank">
			<img class="product-img" src="<?= $image_src ?>" alt="<?= $image_alt ?>">
			<p class="product-title"><?= $product_name ?></p>
		</a>
	</div>

<?php
}
?>