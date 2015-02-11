<?php
// Dane do bazy danych
$servername = "localhost";
$username = "sklep";
$password = "sklep";

// Create connection
$conn = new mysqli($servername, $username, $password, 'test2');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// Żeby wyświetlał polskie znaki
$conn->set_charset("utf8");
?>
<ul class="sep-hr resultsList">
<?php

// pobieranie wynikow o filmach
$sql = "SELECT * FROM movies";
// wysylanie zapytania
$result = $conn->query($sql);

//pobieranie wynikow do zmiennej
while($row = $result->fetch_assoc()) {


?>
  <li>
    <div class="filmPreview isFilm">

    <!-- Zdjęcie -->
      <div class="filmPoster-2">
        <a class="fImg2 entityPoster" href="#">

        <?php 
        // link do obrazka ?>
        <img src="http://placehold.it/140x180/">

        </a>
      </div>


      <div class="filmContent">
        <h3 class="hdr hdr-big entityTitle">
          <?php
          echo $row['title'];
                    ?>
        
        </h3>
        <span class="titleYear">
        Rok produkcji:
          <?php
            // wyswietlamy rok
            echo $row["year"];
          ?>

        </span><br/>


        <ul class="inline sep-line prevInfo">
        <!-- lista gatunkow, jeszcze nie zaimplementowana -->
          <li class="filmGenres">
            <ul class="inline sep-comma">
              <li>Dramat</li>
              <li>Akcja</li>
              <li>Komedia</li>
            </ul>
          </li>



        <div class="relative prevInfo2">
          <div class=
          "well boxContainer va-middle rateInfo hasRate">
            <div class="box">
              <span class="rateBox">

              Cena filmu
              <strong><?=$row['price']?> $
              </strong>&nbsp;</span>

              <div class="breaker hide">
              </div>
            </div>


            <div class="box">
              FILM KUPIŁO:
              <?php 
               $orders = $conn->query("SELECT * FROM `orders` WHERE `movie_id`='".$row['id']."';");
               echo mysqli_num_rows($orders);
              ?>
              <div class="breaker hide">
              </div>
              OSÓB
            </div>


            <div class="box">
            <form style="display:none;" action="src/buy.php" method="post" id="<?=$row['id']?>">
              <input type="hidden" name="movie_id" value="<?=$row['id']?>">
              <div><label for="movie_info">Podaj adres, na który mamy wysłać Ci film (płatność przy odbiorze):</label>
              <textarea name="movie_info" style="margin: 0px; height: 100px; width: 300px;">
Justyna Kowalska
ul.Słoneczna 3/7
00-000 Warszawa</textarea>
              </div>
              <button class="fbtn fbtn-primary pull-right trailerLink nowrap" type="submit">
              POTWIERDŹ ZAKUP</button>
            </form>
              <button class="fbtn fbtn-primary pull-right trailerLink nowrap" onclick="showForm(<?=$row['id']?>, this)">
              ZAKUP</button>
            </div>
          </div>


          <dl class="filmInfo inline">
            <dt>Aktorzy:</dt>


            <dd>

              <ul class="inline sep-comma">
              <?php 
              // pobieranie aktorów
              // Wybiera takie rekody z tabeli łączącej aby wybrać aktorów którzy grali w tym filmie, 
              // w raize braku wyniku zwróci "Brak danych"
              $sql2 = "SELECT * FROM `movies_actors` "
              ."INNER JOIN `actors` ON `actors`.`id`=`movies_actors`.`actor_id` "
              ."WHERE `movies_actors`.`movie_id`='".$row['id']."';";
              // wysylanie zapytania
              
              $actors = $conn->query($sql2);


              //pobieranie wynikow do zmiennej
              if (mysqli_num_rows($actors) == 0)
                echo "<li>Brak danych o aktorach</li>";
              while($rowA = $actors->fetch_assoc()) {
              ?>
                <li>
                  <a href="#"><?=$rowA['name']?></a>
                </li>


         
                <?php 
              }
              ?>
              </ul>
            </dd>
          </dl>


          <div class="filmPlot">
          <p>
          <?php 

          // opis filmu
          echo $row['info'];
          ?>
            </p>
          </div>



        </div>
      </div>
    </div>
  </li>
<?php 
// koniec pętli while
}
?>
</ul>

<script>

// Skrypt wyswietla forme z potwierdzeniem zakupu
function showForm (id, button) {
  // Gdy forma nie jest jeszcze wyswietlona
  if (document.getElementById(id).getAttribute('style') == 'display:none;')
  {
    // Zmien atrybuty i ją wyświetl
  document.getElementById(id).setAttribute('style', '');
  button.innerHTML = "ANULUJ";   
} else 
{
  // gdy forma jest juz wyswietlona to schowa ją
  document.getElementById(id).setAttribute('style', 'display:none;');
  button.innerHTML = "ZAKUP";  
}


}
</script>