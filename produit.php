<?php
	
	require_once "listeProduit.php";

	//include_once "listeProduit.php";
	
	//var_dump($beerArray);
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Produit</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<style type="text/css">
		
		h5{
			color: red;
		}

		
	</style>
</head>
<body">
	<div class="container">
		<header class="row">
			<h1 class="col-10 offset-1 text-center">Les bières</h1>
		 	<table class="col-md-12">
			<tbody>
			<section class="row">
					<?php foreach ($beerArray as $element) { ?>
					<div class="col-md-4">
						<div class="row box">
							<!-- HEADER -->
							<div class="col-12">
								<h3 class="my-3 text-center"><?php echo strtoupper($element[0]); ?></h3>
							</div>
							<!-- IMG -->
							<div class="col-12 box-borders">
								<img class="my-3 mx-auto d-block" src="<?php echo $element[1]; ?>" height="250" />
							</div>
							<!-- Description -->
							<div class="col-12 ">
								<p class="my-1 text-justify"><?php echo $element[2]; ?></p>
							</div>
							<hr>
							<!-- Prix -->
							<div class="col-12">
								<h5 class="my-3 text-center"><?php echo round($element[3]*1.2,2);?>€</h5>
							</div>
						</div>
					</div>
					<?php } ?>
				</section>
					    </ul>
					</nav>
				  </section>
			    </tbody>
			</table>
		</header>
	<div>
</body>
</html>
