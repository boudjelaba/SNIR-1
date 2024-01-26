<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantite"])) {
			$produitParRef = $db_handle->runQuery("SELECT * FROM produits WHERE ref='" . $_GET["ref"] . "'");
			$itemArray = array($produitParRef[0]["ref"]=>array('nom'=>$produitParRef[0]["nom"], 'ref'=>$produitParRef[0]["ref"], 'quantite'=>$_POST["quantite"], 'prix'=>$produitParRef[0]["prix"], 'image'=>$produitParRef[0]["image"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($produitParRef[0]["ref"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($produitParRef[0]["ref"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantite"])) {
									$_SESSION["cart_item"][$k]["quantite"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantite"] += $_POST["quantite"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "supprimer":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["ref"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<HTML>
<HEAD>
<TITLE>Panier d'achat</TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<div id="shopping-cart">
<div class="txt-heading">Panier</div>

<a id="btnEmpty" href="index.php?action=empty">Vider le panier</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Nom</th>
<th style="text-align:left;">Ref</th>
<th style="text-align:right;" width="5%">Quantité</th>
<th style="text-align:right;" width="10%">Prix unitaire</th>
<th style="text-align:right;" width="10%">Prix</th>
<th style="text-align:center;" width="5%">Supprimer</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantite"]*$item["prix"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["nom"]; ?></td>
				<td><?php echo $item["ref"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantite"]; ?></td>
				<td  style="text-align:right;"><?php echo $item["prix"]." €"; ?></td>
				<td  style="text-align:right;"><?php echo  number_format($item_price,2)." €"; ?></td>
				<td style="text-align:center;"><a href="index.php?action=supprimer&ref=<?php echo $item["ref"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantite"];
				$total_price += ($item["prix"]*$item["quantite"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo number_format($total_price, 2)." €"; ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records">Votre panier est vide</div>
<?php 
}
?>
</div>

<div id="product-grid">
	<div class="txt-heading">Produits</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM produits ORDER BY id_prod ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="index.php?action=add&ref=<?php echo $product_array[$key]["ref"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["nom"]; ?></div>
			<div class="product-prix"><?php echo $product_array[$key]["prix"]." €"; ?></div>
			<div class="cart-action"><input type="text" class="product-quantite" name="quantite" value="1" size="2" /><input type="submit" value="Ajouter au panier" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>
</BODY>
</HTML>