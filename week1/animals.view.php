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

        li {

            padding: 1em;
            
        }

    </style>

</head>

<body>

    <ul>

        <?php foreach ($animals as $animal ) : ?>

            <li><?= $animal; ?></li>

        <?php endforeach; ?>
            
    </ul>

</body>

</html>