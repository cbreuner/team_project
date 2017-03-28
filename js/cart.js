
	var cartTotal = 0.00;
	var lastPrice = 0.00;



function addCart(itemId,priceGet) {
  console.log(itemId);
 //document.getElementById(itemId).style.display = "block";
	price = priceGet;
    cartTotal = cartTotal + price;
    lastPrice = price;
      console.log(cartTotal);

   document.getElementById("shoppingCartDiv").innerHTML += "<div id='" + itemId + "'><a class='btn btn-primary btn-large' onclick=\"removeItemId('" + itemId + "')\" >Remove " + itemId + "</a><br><img src=image/" + itemId + ".jpg></div>";
    
    document.getElementById('shoppingCartTotalPrice').innerHTML="<br>Total Price $" + cartTotal;
    
	var y = document.getElementById(itemId + "_button");
	    y.style.display = "block";
}


function removeItemId(itemId,priceGet) {
	price = priceGet;
    cartTotal = cartTotal - price;
	var removeElement = document.getElementById(itemId);
	removeElement.parentNode.removeChild(removeElement);
	document.getElementById('shoppingCartTotalPrice').innerHTML="<br>Total   Price = $" + cartTotal;
    
   var y = document.getElementById(itemId + "_button");
    y.style.display = "none";
}
