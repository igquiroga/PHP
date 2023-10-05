<?php
require_once('Autoload.php');
use Model\IndexQuery;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DATABASE</title>
	<link rel="stylesheet" href="Assets/css/styles.css">
</head>
<body>
	<main class="search-container">
		<div class="title-div">
			<h3 class="tittle">SIMPLE OOP CRUD</h3>
		</div>
		<form action="" method="POST">
			<div class="search-input">
				<input type="text" name="search" class="inputs" placeholder="Search">
				<button type="submit" name="find" class="buttons">Find</button>
			</div>
			<div class="save-input">
				<input type="text" name="name-save" class="inputs" placeholder="Name">
				<button type="submit" name="create" class="buttons">SAVE</button>
			</div>
			<div class="update-input">
				<input type="text" name="id-update" class="id-inputs" placeholder="ID">
				<input type="text" name="name-update" class="name-inputs" placeholder="Name">
				<button type="submit" name="update" class="buttons">UPDATE</button>
			</div>
			<div class="delete-input">
				<input type="text" name="id-delete" class="id-inputs" placeholder="ID">
				<button type="submit" name="delete" class="buttons">DELETE</button>
			</div>
			<div class="search-buttons">
				<button type="submit" name="getAll" class="buttons">GET ALL</button>
			</div>
		</form>
	</main>
	<section>
		<?php
			if(isset($_POST["getAll"])){
				echo IndexQuery::getAll();
			}
			if(isset($_POST["find"])){
				echo IndexQuery::find();
			}

			if(isset($_POST["create"])){
				echo IndexQuery::create();
			}
			if(isset($_POST["update"])){
				echo IndexQuery::update();
			}
			if(isset($_POST["delete"])){
				echo IndexQuery::delete();
			}
		?>
	</section>
</body>
</html>