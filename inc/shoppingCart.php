<?php				

	$itemIds = $_SESSION['itemId'];
	$itemNames = $_SESSION['itemName'];
	$itemPrices = $_SESSION['itemPrice'];
	$itemImgUrls = $_SESSION['itemImgUrl'];
	$total = 0;
	
	for($i=0, $count = count($itemIds);$i<$count;$i++) {
		$itemId  = $itemIds[$i];
		$itemName = $itemNames[$i];
		$itemPrice  = $itemPrices[$i];
		$itemImgUrl = $itemImgUrls[$i];
		$total=$total+$itemPrice;	
		echo "<row><div class='shoppingCartDiv'>";
		echo "<table style='width:100%'><tr><td rowspan='2'>";
		echo '<img src="'.$itemImgUrl.'" class="img-responsive" style="max-width:60px;padding-bottom:15px;">';
		echo "</td><td><div syle='font-size:16px;'>";
		echo $itemName;
		echo "</div></td></tr><tr><td><h4 class='pull-right'>";
		echo $itemPrice;
		echo "</h4></td></tr></table></div></row>";
		
	}
?>