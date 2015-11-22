<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Seletor</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
	<?php 

		include "seletor.class.php";

		$sel = new Seletor();
		$sel->abreArquivo( "exemplo.php" );
		$sel->getDoc();
		
	 ?>
</body>
</html>