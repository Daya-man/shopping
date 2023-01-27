<?php
// $productID = 10;
// $num = 3;
$productID = $_GET['productID'];
$num = $_GET['num'];

try{
$userID = (int)$_COOKIE['session_id'];
// var_dump($userID);
$pdo_config = 'mysql:host=localhost;dbname=ei2031';

$user='ei2031';
$password='ei2031@alumni.hamako-ths.ed.jp';
$option='[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]';

$pdo = new PDO($pdo_config,$user,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'insert into cart (`productID`,`userID`,`num`,`added`,`updateDate`) values(:productID,:userID,:num,:added,:updateDate);';

$today = date("Y-m-d");

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':productID',$productID,PDO::PARAM_INT);
$stmt->bindParam(':userID',$userID,PDO::PARAM_INT);
$stmt->bindParam(':num',$num,PDO::PARAM_INT);
$stmt->bindParam(':added',$today,PDO::PARAM_STR);
$stmt->bindParam(':updateDate',$today,PDO::PARAM_STR);
// $stmt->bindValue(':productID',$productID);
// $stmt->bindValue(':userID',$userID);
// $stmt->bindValue(':num',$num);
// $stmt->bindValue(':added',Date());
// $stmt->bindValue(':updateDate',Date());
$res = $stmt->execute();

if($res){
    $url=$_SERVER['HTTP_REFERER'];
    header('Location:'.$url);
}
$pdo=null;
exit();
}catch(PDOException $e){

echo $e->getMessage();
}
?>