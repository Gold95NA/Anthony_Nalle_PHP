<?php

$host = 'localhost';

$db   = 'patient_ehr';

$user = 'root';

$pass = ''; 

try {

    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

    die("Database connection failed: " . $e->getMessage());

}

function getAllPatients($pdo) {

    $stmt = $pdo->query("SELECT * FROM patients ORDER BY created_at DESC");

    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

function addPatient($pdo, $name, $dob, $email, $phone) {

    $sql = "INSERT INTO patients (name, date_of_birth, email, phone) VALUES (?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([$name, $dob, $email, $phone]);

}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_patient'])) {

    $name  = $_POST['name'];

    $dob   = $_POST['date_of_birth'];

    $email = $_POST['email'];

    $phone = $_POST['phone'];

    addPatient($pdo, $name, $dob, $email, $phone);

    header('Location: patient-EHR.php');

    exit();
}

$patients = getAllPatients($pdo);

require 'patient-EHR.view.php';

?>