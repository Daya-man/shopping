<!-- include product.css -->
<?php
try{
$pdo_config = 'mysql:host=localhost;dbname=ei2031';

$user='ei2031';
$password='ei2031@alumni.hamako-ths.ed.jp';
$option='[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]';

$pdo = new PDO($pdo_config,$user,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql_product = '
    select * from product;
';

$stmt = $pdo->prepare($sql_product);
$res = $stmt->execute();
$judge=false;

$json_array = [];

if($res){
   $data=$stmt->fetchAll();
   $json_array = json_encode($data);
}

$sql_productImage = '
    select `id`,`productID`,`image` from productImage;
';

$stmt = $pdo->prepare($sql_productImage);
$res = $stmt->execute();

if($res){
    $data = $stmt->fetchAll();
    $img_list = json_encode($data);
}

$pdo=null;
}catch(PDOException $e){
echo $e->getMessage();
}
?>
<script>
const data = <?php echo $json_array; ?>;
const imgList = <?php echo $img_list;?>;
const typeName = ["日常食","薬用","ペット用","釣り用","飼料"];

let myfunc = function(data){
    let id = data['id'];
    let name = data['name'];
    let bugName = data['bug'];
    let type = typeName[data['type']];
    let price = data['price'];
    let expiration = data['expiration'];
    let about = data['about'];
    let stock = data['stock'];
    let from = data['from'];
    let product = document.createElement('div');
    product.className="product-box";
    product.onclick = function(){
        document.location.href = "https://alumni.hamako-ths.ed.jp/~ei2031/shopping/page/product.php?id="+id;
    };
    let imgBox = document.createElement('div');
    imgBox.className="product-img";
    let img = document.createElement('img');
    img.src=imgList[0][2];
    img.style.width="100%";
    img.width=100;
    let txt = document.createElement('p');
    txt.className="font-title";
    txt.innerHTML=name;
    let stocktxt = document.createElement('p');
    stocktxt.innerHTML='stock : '+stock;
    imgBox.appendChild(img);
    product.appendChild(imgBox);
    product.appendChild(txt);
    product.appendChild(stocktxt);
    document.getElementById("product-list").appendChild(product);
};

var myd = function(){
    document.getElementById("product-list").innerHTML = '';
}

window.onload = function(){
    for(const elem of data)myfunc(elem);
}
</script>