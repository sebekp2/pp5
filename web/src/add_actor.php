<?php
// Jeśli zostało przesłane dodanie nowego aktora

if ($_POST['name'])
{


echo "Dodano aktora";
}
?>
<center>

<form class="form-container" action="index.php?page=add_actor" method="post">
	<div class="form-title"><h2>Dodaj Aktora</h2></div>
	<div class="form-title">Imie i nazwisko</div>
	<input class="form-field" type="text" name="name" /><br />
	<div class="form-title">Zagrał w filmach (CTRL do zaznaczania wielu lub 0)</div>

	<select multiple class="form-field" name="in_movies">
	<?php 
	// pobieramy liste filmów

	$movies = $conn->query("SELECT `title`, `id` FROM `movies`");

	while($row = $movies->fetch_assoc()) {
	?>

	  <option value="<?=$row['id']?>"><?=$row['title']?></option>
	  <?php 
	}
	?>
</select>
	<div class="submit-container">
	<input class="submit-button" type="submit" value="Dodaj" />
	</div>
	</form>
</center>