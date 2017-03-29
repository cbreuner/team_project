<?php				

	$itemIds = $_SESSION['itemId'];
	$itemNames = $_SESSION['itemName'];
	$itemPrices = $_SESSION['itemPrice'];
	$itemImgUrls = $_SESSION['itemImgUrl'];
	
	for($i=0, $count = count($itemIds);$i<$count;$i++) {
		$itemId  = $itemIds[$i];
		$itemName = $itemNames[$i];
		$itemPrice  = $itemPrices[$i];
		$itemImgUrl = $itemImgUrls[$i];
		$img = "http://localhost/team_project/img/games/".$itemImgUrl;		
		echo "<row><div class='shoppingCartDiv'>";
		echo "<table style='width:100%'><tr><td rowspan='2'>";
		echo '<img src="'.$img.'" class="img-responsive" style="max-width:60px;padding-bottom:15px;">';
		echo "</td><td><span syle='font-size:16px;'>";
		echo $itemName;
		echo "</span></td></tr><tr><td><h4 class='pull-right'>";
		echo $itemPrice;
		echo "</h4></td></tr></table></div></row>";
		
	}
?>