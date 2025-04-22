<?php

function age($bdate) {

    $date = new DateTime($bdate);

    $now = new DateTime();

    $interval = $now->diff($date);

    return $interval->y;

}

function isDate($dt) {

    $date_arr  = explode('-', $dt);

    return count($date_arr) === 3 && checkdate($date_arr[1], $date_arr[2], $date_arr[0]);

}

function bmi($feet, $inches, $weight) {

    $totalInches = $feet * 12 + $inches;

    $heightMeters = $totalInches * 0.0254;

    $weightKg = $weight / 2.20462;

    return $weightKg / ($heightMeters * $heightMeters);

}

function bmiDescription($bmi) {
    
    if ($bmi < 18.5) return "Underweight";

    elseif ($bmi < 25) return "Normal weight";

    elseif ($bmi < 30) return "Overweight";

    else return "Obese";
}

$errors = [];

$submitted = $_SERVER["REQUEST_METHOD"] == "POST";

$data = [

    'first_name' => '',

    'last_name' => '',

    'married' => '',

    'birth_date' => '',

    'height_ft' => '',

    'height_in' => '',

    'weight' => '',

];

if ($submitted) {

    foreach ($data as $key => $value) {

        $data[$key] = trim($_POST[$key] ?? '');

    }

    if ($data['first_name'] === '') $errors['first_name'] = "First name is required.";

    if ($data['last_name'] === '') $errors['last_name'] = "Last name is required.";

    if ($data['married'] !== 'yes' && $data['married'] !== 'no') $errors['married'] = "Please select if married.";

    if (!isDate($data['birth_date'])) $errors['birth_date'] = "Invalid birth date.";

    if (!is_numeric($data['height_ft']) || $data['height_ft'] < 1 || $data['height_ft'] > 8) $errors['height_ft'] = "Invalid height (feet).";

    if (!is_numeric($data['height_in']) || $data['height_in'] < 0 || $data['height_in'] >= 12) $errors['height_in'] = "Invalid height (inches).";

    if (!is_numeric($data['weight']) || $data['weight'] < 1 || $data['weight'] > 1000) $errors['weight'] = "Invalid weight.";

}

if ($submitted && empty($errors)) {

    $age = age($data['birth_date']);

    $bmiValue = bmi($data['height_ft'], $data['height_in'], $data['weight']);

    $bmiRounded = round($bmiValue, 1);

    $bmiDesc = bmiDescription($bmiValue);

    echo "<style>body {

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

            justify-content: center;

        }

        .form {

            display: flex;

            justify-content: center;

            flex-direction: column;

        }

        strong {

            padding-right: 10px;

        }

        p {

            padding-bottom: 40px;

        }
            
        }</style>";

    echo "<div class='form'>";

    echo "<h1>Patient Information</h1>";

    echo "<p><strong>Name:</strong> {$data['first_name']} {$data['last_name']}</p>";

    echo "<p><strong>Married:</strong> " . ucfirst($data['married']) . "</p>";

    echo "<p><strong>Birth Date:</strong> {$data['birth_date']} (Age: $age)</p>";

    echo "<p><strong>Height:</strong> {$data['height_ft']}' {$data['height_in']}\"</p>";

    echo "<p><strong>Weight:</strong> {$data['weight']} lbs</p>";
    
    echo "<p><strong>BMI:</strong> $bmiRounded ($bmiDesc)</p>";

    echo "</div>";
    
    exit;

}

require 'patient-intake.view.php';

