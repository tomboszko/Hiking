<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modifier une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
	<style>
		body {
			background-color: #f0f0f0;
			font-family: Arial, sans-serif;
		}
		form {
			width: 300px;
			margin: 0 auto;
		}
		label {
			display: block;
			margin-top: 20px;
		}
		input, select {
			width: 100%;
			padding: 10px;
			margin-top: 5px;
		}
		button {
			width: 100%;
			padding: 10px;
			background-color: #007BFF;
			color: white;
			border: none;
			margin-top: 20px;
		}
		button:hover {
			background-color: #0056b3;
		}
	</style>
</head>
<body>
	<a href="/Hiking/read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="<?php echo $row['name']; ?>">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile" <?php if ($row['difficulty'] == 'très facile') echo 'selected'; ?>>Très facile</option>
				<option value="facile" <?php if ($row['difficulty'] == 'facile') echo 'selected'; ?>>Facile</option>
				<option value="moyen" <?php if ($row['difficulty'] == 'moyen') echo 'selected'; ?>>Moyen</option>
				<option value="difficile" <?php if ($row['difficulty'] == 'difficile') echo 'selected'; ?>>Difficile</option>
				<option value="très difficile" <?php if ($row['difficulty'] == 'très difficile') echo 'selected'; ?>>Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="<?php echo $row['distance']; ?>">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="<?php echo $row['duration']; ?>">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="<?php echo $row['height_difference']; ?>">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>