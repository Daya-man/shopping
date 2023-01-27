<?php
try{
$userID = $_COOKIE['session_id'];
$pdo_config = 'mysql:host=localhost;dbname=ei2031';

$user='ei2031';
$password='ei2031@alumni.hamako-ths.ed.jp';
$option='[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]';

$pdo = new PDO($pdo_config,$user,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = '
	select product.*,cart.num from product inner join cart on product.id = cart.productID where cart.userID=:id;
';

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id',$userID,PDO::PARAM_STR);
$res = $stmt->execute();
if($res){
    $data = $stmt->fetchAll();
    $cart_list = json_encode($data);
    // $url=$_SERVER['HTTP_REFERER'];
    // header('Location:'.$url);
}
$pdo=null;
// exit();
}catch(PDOException $e){
echo $e->getMessage();
}
?>
<script>
    const data = <?php echo $cart_list; ?>;
</script>