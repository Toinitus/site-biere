<?php
	
	require_once "listeProduit.php";

	//include_once "listeProduit.php";
	
	//var_dump($beerArray);
?>



<!DOCTYPE html>
<html>
<head>
	<title>Produit</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>Titre</th>
				<th>Image</th>
				<th>Description</th>
				<th>Prix HT</th>
				<th>Prix TTC</th>
			</tr>
		</thead>
		<tbody>
			<?php
				
				foreach ($beerArray as $value) {
					echo "<tr>
						<td>".$value[0]."</td>
						<td><img class='resizeImage' src='".$value[1]."'></td>
						<td>".$value[2]."</td>
						<td>".$value[3]."€</td>
						<td>".round($value[3]*1.20, 2)."€</td>
					  <tr>";
				}
			?>
		</tbody>
	</table>
</body>
</html>