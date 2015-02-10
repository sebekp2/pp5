<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link href="css/main.css" media="screen" rel="stylesheet" type="text/css">

  <title>
  </title>
</head>

<body>
<!-- Styl "pożyczony" z filmweb -->
<div id="body"><div class="bodyBackground">
<div class="bodyWrapper"><div class="mainCol">
<!-- główna zawartość -->
<div class="pageBox">

<?php 
// załączamy menu
include 'src/menu.html' 
?>

<div class="pageBox well filterBox concave">
  <div id="searchFilters" style="visibility: visible;">
    <input>
  </div>
</div>


<div class="pageBox">
  <div class="searchResultInfo boxContainer">
    <div class="box" id="resultsCount">
      <strong>Wyniki:</strong> 


      <?php 
      // INFORMACJE ILE WYNIKOW JEST ZNALEZIONYCH

      ?>
    </div>


    <div class="box" id="sortBar">
      <label class="first" for=
      "search_sortBy"><strong>sortuj</strong> według:</label>
      <select class="s" name="sort">
      </select> &nbsp; 
      <input checked="checked" name="sortAscending" type="radio"
        value="false"> 
      <label for="search_sort_desc">od największej</label> &nbsp; 
      <input name="sortAscending" type="radio" value="true">
    </div>
  </div>
</div>

<?php 

// POKAZ REKORDY

include 'src/show.php';
?>

<!-- KOD -->
</div>


</div>
</div>
</div>
</div>
</body>
</html>