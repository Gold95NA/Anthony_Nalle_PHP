<?php

require 'auth.php';

$pdo = new PDO("mysql:host=localhost;dbname=patient_ehr", 'root', '');

$searchSql = "SELECT * FROM patients WHERE 1=1";

$params = [];

if (!empty($_GET['first_name'])) {

    $searchSql .= " AND first_name LIKE ?";

    $params[] = "%" . $_GET['first_name'] . "%";

}

if (!empty($_GET['last_name'])) {

    $searchSql .= " AND last_name LIKE ?";

    $params[] = "%" . $_GET['last_name'] . "%";

}

if (isset($_GET['married']) && $_GET['married'] !== '') {

    $searchSql .= " AND married = ?";

    $params[] = $_GET['married'];

}

$stmt = $pdo->prepare($searchSql);

$stmt->execute($params);

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>

<html>

<head>

    <title>Search Patients</title>

    <style>

        body {

            background:rgb(12, 12, 12);

            padding: 2em;

            text-align: left;

            color: #ffffff;

            font-family: Arial, Helvetica, sans-serif;

        }

        h1 {

            display: flex;

            justify-content: center;

        }

        input, select { 
            
            margin-bottom: 0.5em; 
        
        }

        table { 
            
            margin-top: 1em; 
            
            border-collapse: collapse; 
            
            width: 100%; 
        
        }

        td, th { 
            
            border: 1px solid #666; 
            
            padding: 0.5em; 
        
        }

    </style>

</head>

<body>

<h1>Search Patients</h1>

<form method="GET">

    <label>First Name:</label>

    <input type="text" name="first_name" value="<?= htmlspecialchars($_GET['first_name'] ?? '') ?>"><br>

    <label>Last Name:</label>

    <input type="text" name="last_name" value="<?= htmlspecialchars($_GET['last_name'] ?? '') ?>"><br>

    <label>Married:</label>

    <select name="married">

        <option value="">--</option>

        <option value="1" <?= (($_GET['married'] ?? '') === '1') ? 'selected' : '' ?>>Yes</option>

        <option value="0" <?= (($_GET['married'] ?? '') === '0') ? 'selected' : '' ?>>No</option>

    </select><br>

    <button type="submit">Search</button>

</form>

<table>

<tr><th>First</th><th>Last</th><th>Birth</th><th>Married</th></tr>

<?php foreach ($results as $p): ?>

<tr>
    
    <td><?= htmlspecialchars($p['first_name']) ?></td>

    <td><?= htmlspecialchars($p['last_name']) ?></td>

    <td><?= htmlspecialchars($p['birth_date']) ?></td>

    <td><?= $p['married'] ? 'Yes' : 'No' ?></td>

</tr>

<?php endforeach; ?>

</table>

<p><a href="patient-EHR.php">View All Patients</a> | <a href="logoff.php">Log Out</a></p>

</body>

</html>
