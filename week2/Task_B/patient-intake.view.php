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

            padding-bottom: 40px;

        }

        form {

            display: flex;

            flex-direction: column;

            justify-content: center;
            
        }

        label {

            margin-left: 550px;
        }

        .sub-btn {

            width: 100px;

            margin-left: 650px;

        }

        .marriage-check {

            margin-left: 25px;

        }

        .bday-check {

            margin-left: 8px;

        }

        .height-input {

            margin-left: 34px;

        }

    </style>

</head>



<body>

    <h1>Patient Intake Form</h1>

    <form method="post">

        <label>First Name:

            <input type="text" name="first_name" value="<?= htmlspecialchars($data['first_name']) ?>">

            <span style="color:red"><?= $errors['first_name'] ?? '' ?></span>

        </label>
        
        <br><br>

        <label>Last Name:

            <input type="text" name="last_name" value="<?= htmlspecialchars($data['last_name']) ?>">

            <span style="color:red"><?= $errors['last_name'] ?? '' ?></span>
            
        </label>
        
        <br><br>

        <label>Married:

            <select class="marriage-check" name="married">

                <option value="">--Select--</option>

                <option value="yes" <?= $data['married'] == 'yes' ? 'selected' : '' ?>>Yes</option>

                <option value="no" <?= $data['married'] == 'no' ? 'selected' : '' ?>>No</option>

            </select>

            <span style="color:red"><?= $errors['married'] ?? '' ?></span>

        </label>
        
        <br><br>

        <label>Birth Date:

            <input class="bday-check" type="date" name="birth_date" value="<?= htmlspecialchars($data['birth_date']) ?>">

            <span style="color:red"><?= $errors['birth_date'] ?? '' ?></span>

        </label>
        
        <br><br>

        <label>Height:

            <input class="height-input" type="number" name="height_ft" placeholder="ft" min="1" max="8" value="<?= htmlspecialchars($data['height_ft']) ?>"> ft

            <input type="number" name="height_in" placeholder="in" min="0" max="11" value="<?= htmlspecialchars($data['height_in']) ?>"> in

            <span style="color:red"><?= $errors['height_ft'] ?? '' ?> <?= $errors['height_in'] ?? '' ?></span>

        </label>
        
        <br><br>

        <label>Weight (lbs):

            <input type="number" name="weight" value="<?= htmlspecialchars($data['weight']) ?>">

            <span style="color:red"><?= $errors['weight'] ?? '' ?></span>

        </label>
        
        <br><br>

        <input class="sub-btn" type="submit" value="Submit">

    </form>

</body>

</html>