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

        li {

            padding: 1em;

            display: flex;

            justify-content: center;
            
        }

        a {

            display: flex;

            justify-content: center;

        }

    </style>

</head>

<body>

    <h1>Patient EHR</h1>

    <ul>

    <?php if (!empty($patients)): ?>

        <?php foreach ($patients as $patient): ?>

            <li>

                <?= htmlspecialchars($patient['name']) ?> (<?= htmlspecialchars($patient['date_of_birth']) ?>)

            </li>

        <?php endforeach; ?>

    <?php else: ?>

        <li>No patients found.</li>

    <?php endif; ?>

    </ul>

    <a href="patient-details.php">Add Patient</a>

</body>

</html>