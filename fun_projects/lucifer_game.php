<?php
session_start();
if (isset($_GET["reset"]) && $_GET["reset"] == 1) unset($_SESSION["aantalLucifers"]);
if (!isset($_SESSION["aantalLucifers"])) $_SESSION["aantalLucifers"] = 7;
if(isset($_GET["aantal"])){
    $aantal = $_GET["aantal"];    
}
$spelstop = false;
if (isset($aantal)) {
	if ($_SESSION["aantalLucifers"] - $aantal > 0) {
		$_SESSION["aantalLucifers"] -= $aantal;
	} elseif ($_SESSION["aantalLucifers"] - $aantal == 0) {
		$spelstop = true;
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head><title>Luciferspel</title></head>
	<body>
		<h1>Luciferspel</h1>
		<?php
		if ($spelstop) {
			?>
			<h2>Het spel is afgelopen.</h2>
			<?php
		} else {
			for ($i=1; $i<=$_SESSION["aantalLucifers"]; $i++) {
				?>
                                <img src="../graphics/lucifer.png">
				<?php
			}
			?>
			<br>
			<br>
			<table>
				<tr>
					<td>
						<form action="lucifer_game.php?aantal=1" method="post">
							<input type="submit" value="Een lucifer wegnemen">
						</form>
					</td>
					<td>
						<form action="lucifer_game.php?aantal=2" method="post">
							<input type="submit" value="Twee lucifers wegnemen">
						</form>
					</td>
				</tr>
			</table>
			<?php
		}
		?>
		<br>
		Klik <a href="lucifer_game.php?reset=1">hier</a> om een nieuw spel te beginnen.
	</body>
</html>