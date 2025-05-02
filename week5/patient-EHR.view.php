<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Document</title>

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

        table { 

            width: 100%; 

            border-collapse: collapse;

            margin-bottom: 1em; 

        }

        td, th { 

            border: 1px solid #444; 

            padding: 0.5em; 

            text-align: left; 

        }

        a {

            display: flex;

            justify-content: center;

        }

    </style>

</head>

<body>

    <h1>Patient EHR</h1>

    <table>

        <tr>

            <th>First</th><th>Last</th><th>Birth Date</th><th>Married</th><th>Actions</th>

        </tr>

        <?php foreach ($patients as $p): ?>

        <tr>

            <td><?= htmlspecialchars($p['first_name']) ?></td>

            <td><?= htmlspecialchars($p['last_name']) ?></td>

            <td><?= htmlspecialchars($p['birth_date']) ?></td>

            <td><?= $p['married'] ? 'Yes' : 'No' ?></td>

            <td><a class="button" href="patient-details.php?id=<?= $p['id'] ?>">Edit</a></td>

        </tr>

        <?php endforeach; ?>

    </table>

    <a href="patient-details.php">Add Patient</a>
    
</body>

</html>