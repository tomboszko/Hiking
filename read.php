<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
    <style>
      table {
        width: 100%;
        border-collapse: collapse;
      }
      th, td {
        border: 1px solid black;
        padding: 15px;
        text-align: left;
      }
      th {
        background-color: #f2f2f2;
      }
    </style>
  </head>
  <body>
    <h1>Liste des randonnées</h1>
    <table>
      <tr>
        <th>Nom</th>
        <th>Difficulté</th>
        <th>Distance</th>
        <th>Durée</th>
        <th>Dénivelé</th>
      </tr>
      <?php
      // Connect to the database
      $db = new PDO('mysql:host=localhost;dbname=becode;charset=utf8', 'toms', 'root');

      // Query the database
      $result = $db->query('SELECT * FROM hiking');

      // Fetch the data and display it
      while ($row = $result->fetch()) {
        echo '<tr>';
        echo '<td><a href="update.php?id=' . $row['id'] . '">' . $row['name'] . '</a></td>';
        echo '<td>' . $row['difficulty'] . '</td>';
        echo '<td>' . $row['distance'] . '</td>';
        echo '<td>' . $row['duration'] . '</td>';
        echo '<td>' . $row['height_difference'] . '</td>';
        echo '<td><a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';
        echo '</tr>';
    }
      ?>

      
    </table>
  </body>
</html>