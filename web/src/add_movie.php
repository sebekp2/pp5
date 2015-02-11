<?php

// Jeśli zostało przesłane dodanie nowego filmu

// Sprawdzamy czy elementy formy nie są pustę
if ($_POST['title'] and $_POST['movie_info'] and $_POST['price'])
{
//Wysylanie dodawnaia
$conn->query("INSERT INTO `actors` (`name`) VALUES ('".$_POST['name']."')");

// id wprowadzonego filmu
$actor_id = $conn->insert_id;

//jeżeli zagrali w jakichś filmach
// Przeleć całą tablice, w której sa zawarte ID filmow jakie wybraliśmy w selekcie
foreach ($_POST['in_movies'] as $movie_id) {
  //echo $movie_id."<br/>";
  //echo $actor_id."<br/>";
  // dodaj ich do bazy (w razie powtórzenia jest INSERT IGNORE)
  $conn->query("INSERT IGNORE INTO `movies_actors` (`movie_id`, `actor_id`) VALUES ('".$movie_id."', '".$actor_id."')");
  # code...
}


echo "Dodano aktora";
}
?>
<center>

<form class="form-container" action="index.php?page=add_actor" method="post">
  <div class="form-title"><h2>Dodaj Aktora</h2></div>
  <div class="form-title">Imie i nazwisko</div>
  <input class="form-field" type="text" name="name" /><br />
  <div class="form-title">Zagrał w filmach (CTRL do zaznaczania wielu lub 0)</div>

  <select multiple class="form-field" name="in_movies[]">
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