<?php

require 'patient-EHR.php';

$isEdit = isset($_GET['id']);

$patient = $isEdit ? getPatient($pdo, $_GET['id']) : ['first_name'=>'', 'last_name'=>'', 'birth_date'=>'', 'married'=>0, 'id'=>''];

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Add Patient</title>

    <style>

        body {

            background: rgb(12, 12, 12);

            padding: 2em;

            text-align: left;

            color: #ffffff;

            font-family: Arial, Helvetica, sans-serif;

        }

        form {

            display: flex;

            flex-direction: column;

            margin-left: 450px;

        }

        label { 

            display: block; 

            margin: 0.5em 0 0.2em; 

        }

        input[type="text"], input[type="date"] { 

            width: 300px; 

            padding: 0.5em; 

        }

        .actions { 
            
            margin-top: 1em; 
        
        }

        .actions input { 
            
            margin-right: 1em; 
        
        }

    </style>

</head>

<body>

<h1><?= $isEdit ? 'Edit' : 'Add' ?> Patient</h1>

<form method="POST" action="patient-EHR.php">

    <input type="hidden" name="id" value="<?= $patient['id'] ?>">

    <label>First Name:</label>

    <input type="text" name="first_name" required value="<?= htmlspecialchars($patient['first_name']) ?>">

    <label>Last Name:</label>

    <input type="text" name="last_name" required value="<?= htmlspecialchars($patient['last_name']) ?>">

    <label>Birth Date:</label>

    <input type="date" name="birth_date" required value="<?= $patient['birth_date'] ?>">

    <label><input type="checkbox" name="married" <?= $patient['married'] ? 'checked' : '' ?>> Married</label>

    <div class="actions">

        <?php if ($isEdit): ?>

            <input type="submit" name="update_patient" value="Update">

            <input type="submit" name="delete_patient" value="Delete" onclick="return confirm('Are you sure?');">

        <?php else: ?>

            <input type="submit" name="add_patient" value="Add">

        <?php endif; ?>

        <a href="patient-EHR.php">Cancel</a>

    </div>

</form>

</body>

</html>