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

    <h1>Age Verification</h1>

    <ul>

        <li><?php age_verification($age1); ?></li>

        <li><?php age_verification($age2); ?></li>

        <li><?php age_verification($age3); ?></li>

    </ul>

</body>

</html>