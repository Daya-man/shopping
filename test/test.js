var myfunc = function(){
    let product = document.createElement('div');
    product.className="product-box";
    let imgBox = document.createElement('div');
    imgBox.className="product-img";
    let img = document.createElement('img');
    img.src='https://www.shutterstock.com/image-vector/sample-stamp-rubber-style-red-260nw-1811246308.jpg';
    img.style.width="100%";
    img.width=100;
    let txt = document.createElement('p');
    txt.className="font-title";
    txt.innerHTML="this is test product";
    imgBox.appendChild(img);
    product.appendChild(imgBox);
    product.appendChild(txt);
    document.getElementById("product-list").appendChild(product);

    // var product = document.createElement('p');
    // product.innerHTML = 'aaaaaaaaaaaaa';
    // document.getElementById('product-list').appendChild(product); 
};

var myd = function(){
    document.getElementById("product-list").innerHTML = '';
}

window.onload = function(){
    for(let i = 0;i<10;i++)myfunc();
}