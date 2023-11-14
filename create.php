<?php
$distanceError = $heightDifferenceError = $durationError = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connect to the database
    $db = new PDO('mysql:host=localhost;dbname=becode;charset=utf8', 'toms', 'root');

    // Check if distance, height_difference and duration are numbers
    if (!is_numeric($_POST['distance'])) {
        $distanceError = "Distance must be a number.";
    }
    if (!is_numeric($_POST['height_difference'])) {
        $heightDifferenceError = "Height difference must be a number.";
    }
    if (!is_numeric($_POST['duration'])) {
        $durationError = "Duration must be a number.";
    }

    if ($distanceError == '' && $heightDifferenceError == '' && $durationError == '') {
        // Prepare the SQL statement
        $stmt = $db->prepare('INSERT INTO hiking (name, difficulty, distance, duration, height_difference) VALUES (?, ?, ?, ?, ?)');

        // Execute the statement with form data
        $stmt->execute([
            $_POST['name'],
            $_POST['difficulty'],
            $_POST['distance'],
            $_POST['duration'],
            $_POST['height_difference']
        ]);

        echo "La randonnée a été ajoutée avec succès.";
    }
}
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
    <style>
        body {
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
            margin-top: 20px;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
	<a href="/Hiking/read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>

		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="time" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>