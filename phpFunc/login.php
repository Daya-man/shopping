<?php
$email=$_GET['email'];
$pass=$_GET['password'];

try{
$pdo_config = 'mysql:host=localhost;dbname=ei2031';

$user='ei2031';
$password='ei2031@alumni.hamako-ths.ed.jp';
$option='[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]';

$pdo = new PDO($pdo_config,$user,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql_insert = '
    select * from user where `email` = :email;
';

$stmt = $pdo->prepare($sql_insert);
$stmt->bindParam(':email',$email,PDO::PARAM_STR);

$res = $stmt->execute();
$judge=false;
$message='';

if($res){
   $data=$stmt->fetch();
   if(!empty($data)&&$data['password'] == $pass){
    $judge=true;
   }else{
    $message='fail';
   }
}else{
    $message='noUser';
}

if($judge==true){
    $kigen = time() + 30 * 24 * 3600;
    setcookie('session_id', $data['id'], $kigen);
    header('Location: https://alumni.hamako-ths.ed.jp/~ei2031/shopping/page/website.php?id='.$_COOKIE['session_id']);
}else {
    $alert = "<script type='text/javascript'>alert('登録されたユーザーではありません');</script>";
    echo $alert;
    header('Location: https://alumni.hamako-ths.ed.jp/~ei2031/shopping/login.html?error='.$message);
}
$pdo=null;
exit();
}catch(PDOException $e){
echo $e->getMessage();
}
?>