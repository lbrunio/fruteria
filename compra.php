<html>
<head>
<meta charset="UTF-8">
<title>Minicasino</title>
</head>
<body>
<H1> La Frutería del siglo XXI</H1>
<?=$compraRealizada ?>
<B><br> REALICE SU COMPRA  <?= $_SESSION['cliente']?></B><br>
     <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
     <b>Selecciona la fruta: <select name="fruta">
			<option value="Platanos">Plátanos</option>
			<option value="Naranjas">Naranjas</option>
			<option value="Limones">Limones</option>
			<option value="Manzanas">Manzanas</option>
			</select>
     Cantidad: <input name="cantidad" type="number" value="0" size="4">
     <input type="submit" name="accion" value="Anotar">	
     <input type="submit" name="accion" value="Terminar">	
   </form>

<?php
if (isset($_SESSION['pedidos']) && count($_SESSION['pedidos']) > 0) {
    echo "<h3>Pedidos actuales:</h3>";
    echo "<table border='1'><tr><th>Fruta</th><th>Cantidad</th></tr>";
    foreach ($_SESSION['pedidos'] as $fruta => $cantidad) {
      echo "<tr><td>$fruta</td><td>$cantidad</td></tr>";
    }
    echo "</table>";
}
?>

</body>
</html>
