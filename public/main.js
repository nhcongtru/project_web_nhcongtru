function openSearch() {
    document.getElementById("myOverlay").style.display = "block";
}
function closeSearch() {
    document.getElementById("myOverlay").style.display = "none";
}

function showCartContainer(){
    document.getElementById("cart_container").style.display="block";
    var t=document.getElementById("productCart").childElementCount;
    if(t>4){
        document.getElementById("titleCart").style.width="98.7%";
        document.getElementById("XSign_cart").style.color="black";
    }
    else{
        document.getElementById("titleCart").style.width="100%";	
        document.getElementById("XSign_cart").style.color="white";
    }
}
