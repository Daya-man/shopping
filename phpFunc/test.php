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
    update user set `Email`=:email where `id`=:id;
';

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':email',$email,PDO::PARAM_STR);
$stmt->bindParam(':id',$userID,PDO::PARAM_STR);
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