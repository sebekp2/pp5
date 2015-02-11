<?php

// Jeśli zostało przesłane dodanie nowego filmu

// Sprawdzamy czy elementy formy nie są puste
if (!empty($_POST['title']) and !empty($_POST['info']) 
  and !empty($_POST['price']) and !empty($_POST['year']))
{
//Wysylanie dodawnaia
$conn->query("INSERT INTO `movies` (`title`, `info`, `price`, `year`) ".
            "VALUES ('".$_POST['title']."', '".$_POST['info']."', '".$_POST['price']."', '".$_POST['year']."')");

echo $conn->error;
// id wprowadzonego filmu
$movie_id = $conn->insert_id;

//jeżeli zagrali w jakichś filmach
// Przeleć całą tablice, w której sa zawarte ID aktorów jakie wybraliśmy w selekcie
foreach ($_POST['actors'] as $actor_id) {
  //echo $movie_id."<br/>";
  //echo $actor_id."<br/>";
  // dodaj ich do bazy (w razie powtórzenia jest INSERT IGNORE)
  $conn->query("INSERT IGNORE INTO `movies_actors` (`movie_id`, `actor_id`) VALUES ('".$movie_id."', '".$actor_id."')");
  # code...
}

echo "<script> alert('Dodano film!')</script>";
}
?>
<center>

<form class="form-container" action="index.php?page=add_movie" style="width:450px" method="post">
  <div class="form-title"><h2>Dodaj Film</h2></div>
  <div class="form-title">Tytuł filmu</div>
  <input class="form-field" type="text" name="title" /><br />
  <div class="form-title">Opis filmu</div>
  <textarea class="form-field" name="info" /></textarea> <br />
  <div class="form-title">Cena</div>
  <input class="form-field" type="number" value="19.99" name="price" step="0.01"  /><br />
    <div class="form-title">Rok produkcji</div>
  <input class="form-field" type="number" value="2015" name="year" step="1"  /><br />
  <div class="form-title">W filmie zagrali aktorzy: (CTRL do zaznaczania wielu lub 0)</div>

  <select multiple class="form-field" name="actors[]">
  <?php 
  // pobieramy liste filmów

  $actors = $conn->query("SELECT `name`, `id` FROM `actors`");

  while($row = $actors->fetch_assoc()) {
  ?>

    <option value="<?=$row['id']?>"><?=$row['name']?></option>
    <?php 
  }
  ?>
</select>
  <div class="submit-container">
  <input class="submit-button" type="submit" value="Dodaj" />
  </div>
  </form>
</center>