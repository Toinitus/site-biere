function changePrice(compteur, valeurHT, valeurTTC)
{
	var ht = valeurHT;
	var ttc = valeurTTC;
	var quantite = document.getElementById('quantite'+compteur).value;

	document.getElementById('horstaxe'+compteur).innerHTML = "";
	document.getElementById('toutestaxe'+compteur).innerHTML = "";
	
	if (quantite > 1) {
		document.getElementById('horstaxe'+compteur).innerHTML = (ht*quantite).toFixed(2);
		document.getElementById('toutestaxe'+compteur).innerHTML = (ttc*quantite).toFixed(2);
	} else {
		document.getElementById('horstaxe'+compteur).innerHTML = ht;
		document.getElementById('toutestaxe'+compteur).innerHTML = ttc;
	}
}