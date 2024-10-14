<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Task for the day</h1>
    
    <ul>
        <?php foreach ($task as $key => $description) : ?>
            <li><strong><?= $key; ?></strong> <?= $description; ?></li>
        <?php endforeach; ?>
    </ul>

</body>
</html>