<?php

require 'patient-EHR.php';

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

        input {

            display: block;

            margin: 0.5em 0;
            
            width: 300px;

        }

        input[type="submit"] {

            margin-top: 1em;

            display: flex;

            justify-content: center;

        }

    </style>

</head>

<body>

    <h1>Add Patient</h1>

    <form method="POST" action="patient-EHR.php">

        <label>Name:</label>

        <input type="text" name="name" required>

        <label>Date of Birth:</label>

        <input type="date" name="date_of_birth" required>

        <label>Email:</label>

        <input type="email" name="email">

        <label>Phone:</label>

        <input type="text" name="phone">

        <input type="hidden" name="add_patient" value="1">

        <input type="submit" value="Add Patient">

    </form>

    <p><a href="patient-EHR.php">Cancel and go back</a></p>

</body>

</html>