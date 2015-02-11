<?php

?>
<ul class="sep-hr resultsList">
<?php

// pobieranie wynikow o filmach + ile kto ich razy kupił (o poprawnośc zapytania doradziliśmy sie kolegi + wujek google)
$sql = "SELECT * FROM `orders` INNER JOIN `movies` ON `movies`.`id` = `orders`.`movie_id` GROUP BY `orders`.`id`";




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
      <h3 class="hdr hdr-big ">
      Zakup z dnia
      </h3>
        <h4 class="hdr hdr-big ">
          <?php
          echo $row['title'];
          echo " (".$row["year"].")";
                    ?>
        
        </h4>


        <div class="relative prevInfo2">
          <div class=
          "well boxContainer va-middle rateInfo hasRate">
            <div class="">
              <span class="rateBox">

              Cena filmu
              <strong><?=$row['price']?> $
              </strong>&nbsp;</span>

              <div class="breaker hide">
              </div>
            </div>


            <div style="display:block">
          <strong>Adres dostawy:</strong> <br/>
              <?php 
               //$orders = $conn->query("SELECT * FROM `orders` WHERE `movie_id`='".$row['id']."';");
               //echo mysqli_num_rows($orders);
              echo $row['client_info'];
              ?>

            </div>

          </div>

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