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


<?php 

// POKAZ REKORDY
// Zależnie od tego co jest wysłane w głownym zapytaniu

$page = $_GET['page'];
//gdyby w linku nie było zmiennej to ustawia domyślną
if (!$page)
	$page = 'show';
include 'src/'.$page.'.php';
?>

<!-- KOD -->
</div>


</div>
</div>
</div>
</div>

<script type="text/javascript">
	
	// Zaznaczanie aktywnego menu
	var li = document.getElementById('navbar').getElementsByTagName('li');

	for (var i = 0; i<li.length; i++) {
		if (li[i].innerHTML.indexOf('<?=$page?>') >0)
			li[i].setAttribute('class', 'active');
	};
</script>

</body>
</html>