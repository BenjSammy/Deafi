<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Traçage d'ODR Automatisme</title>
<style>
		.green {
			color: green;
		}
	</style>
</head>
<body>
<h1>Traçage d'ODR Automatisme</h1>
	<button onclick="window.location.href='auto.php'">Automatisme</button>
	<button onclick="window.location.href='manuelle.php'">Manuelle</button>
<h1>Automatisme : <span class="green">En marche</span></h1>
  <form method="POST" action="auto.php">
    <label for="heurePris">Heure pris:</label>
    <input type="text" id="heurePris" name="heurePris" required><br>
    <label for="heureClos">Heure clos:</label>
    <input type="text" id="heureClos" name="heureClos" required><br>
    <label for="date">Date:</label>
    <input type="text" id="date" name="date" required><br>
    <label for="operateur">Opérateur:</label>
    <input type="text" id="operateur" name="operateur" required><br>
    <label for="equipe">Equipe:</label>
    <input type="text" id="equipe" name="equipe" required><br>
    <label for="entreprise">Entreprise:</label>
    <input type="text" id="entreprise" name="entreprise" required><br>
    <label for="traitement">Traitement:</label>
    <input type="text" id="traitement" name="traitement" required><br>
    <label for="plateforme">Plateforme:</label>
    <input type="text" id="plateforme" name="plateforme" required><br>
    <label for="identifiantODR">Identifiant ODR:</label>
    <input type="text" id="identifiantODR" name="identifiantODR" required><br>
    <label for="statut">Statut:</label>
    <input type="text" id="statut" name="statut" required><br>
    <label for="motif">Motif:</label>
    <input type="text" id="motif" name="motif" required><br>
    <input type="submit" value="Envoyer">
  </form>
<p>Développé par Benjamin Lothaire - V1.0.0</p>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $heurePris = $_POST['heurePris'];
  $heureClos = $_POST['heureClos'];
  $date = $_POST['date'];
  $operateur = $_POST['operateur'];
  $equipe = $_POST['equipe'];
  $entreprise = $_POST['entreprise'];
  $traitement = $_POST['traitement'];
  $plateforme = $_POST['plateforme'];
  $identifiantODR = $_POST['identifiantODR'];
  $statut = $_POST['statut'];
  $motif = $_POST['motif'];
  $diff_seconds = strtotime($heureClos) - strtotime($heurePris);
  $hours = floor($diff_seconds / 3600);
  $minutes = floor(($diff_seconds % 3600) / 60);
  $seconds = $diff_seconds % 60;
  $duration = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
  $filename = 'tracage' . date('Y') . '.txt';
  $line = "$duration\t$heurePris\t$heureClos\t$date\t$operateur\t$equipe\t$entreprise\t$traitement\t$plateforme\t$identifiantODR\t$statut\t$motif\t1\tAutomatisme\n";
  $file = fopen($filename, 'a');
  fwrite($file, $line);
  fclose($file);
}
?>
