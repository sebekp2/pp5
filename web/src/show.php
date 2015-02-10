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
    <div class="filmPreview isFilm" id="previewFilmId-862">

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
              <span class="rateBox"><i class=
              "icon-small-voteOn"></i>
              <strong>8,7<span class="ten">/10</span></strong>&nbsp;</span>

              <div class="breaker hide">
              </div>
            </div>


            <div class="box">
              <i class="icon-small-eye"></i>

               60 388

              <div class="breaker hide">
              </div>
              ZAKUPIŁO
            </div>


            <div class="box">
              <a class="fbtn fbtn-primary pull-right trailerLink nowrap"
              href="#">
              KUP FILM</a>
            </div>
          </div>


          <dl class="filmInfo inline">
            <dt>Aktorzy:</dt>


            <dd>
              <ul class="inline sep-comma">
                <li>
                  <a href="#">Tom Hanks</a>
                </li>


                <li>
                  <a href="/person/David+Morse-3454"
                  target="_blank" title="David Morse">David
                  Morse</a>
                </li>
              </ul>
            </dd>
          </dl>


          <div class="filmPlot">
          <?php 

          // opis filmu

          ?>
            <p>Emerytowany strażnik więzienny opowiada
            przyjaciółce o niezwykłym mężczyźnie, którego
            skazano na śmierć za zabójstwo dwóch 9-letnich
            dziewczynek.</p>
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