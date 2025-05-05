<?php

require 'auth.php';

$host = 'localhost';

$db   = 'patient_ehr';

$user = 'root';

$pass = '';

try {

    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

    die("Connection failed: " . $e->getMessage());

}

function getAllPatients($pdo) {

    $stmt = $pdo->query("SELECT * FROM patients ORDER BY created_at DESC");

    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

function getPatient($pdo, $id) {

    $stmt = $pdo->prepare("SELECT * FROM patients WHERE id = ?");

    $stmt->execute([$id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);

}

function addPatient($pdo, $first, $last, $dob, $married) {

    $stmt = $pdo->prepare("INSERT INTO patients (first_name, last_name, birth_date, married) VALUES (?, ?, ?, ?)");

    $stmt->execute([$first, $last, $dob, $married]);

}

function updatePatient($pdo, $id, $first, $last, $dob, $married) {

    $stmt = $pdo->prepare("UPDATE patients SET first_name = ?, last_name = ?, birth_date = ?, married = ? WHERE id = ?");

    $stmt->execute([$first, $last, $dob, $married, $id]);

}

function deletePatient($pdo, $id) {

    $stmt = $pdo->prepare("DELETE FROM patients WHERE id = ?");

    $stmt->execute([$id]);

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['add_patient'])) {

        addPatient($pdo, $_POST['first_name'], $_POST['last_name'], $_POST['birth_date'], isset($_POST['married']) ? 1 : 0);

    } elseif (isset($_POST['update_patient'])) {

        updatePatient($pdo, $_POST['id'], $_POST['first_name'], $_POST['last_name'], $_POST['birth_date'], isset($_POST['married']) ? 1 : 0);

    } elseif (isset($_POST['delete_patient'])) {

        deletePatient($pdo, $_POST['id']);

    }

    header('Location: patient-EHR.php');

    exit();
    
}

$patients = getAllPatients($pdo);

require 'patient-EHR.view.php';