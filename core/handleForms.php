<?php  
require_once 'dbConfig.php';
require_once 'models.php';

// Handle forms for insert button
if (isset($_POST['insertBSApplicantBtn'])) {
    // Verify whether any input fields are blank
    if (empty($_POST['desired_job']) || empty($_POST['applicant_first_name']) || empty($_POST['applicant_last_name']) || empty($_POST['gender']) || empty($_POST['address']) || empty($_POST['email']) || empty($_POST['nationality']) || empty($_POST['additional_skills'])) {
        $_SESSION['message'] = 'Insertion of the application failed.';
        $_SESSION['statusCode'] = 400;
        header("Location: ../insert.php");
        exit();
    }
    
    $response = insertNewApplicantRecord($pdo, $_POST['desired_job'], $_POST['applicant_first_name'], $_POST['applicant_last_name'], $_POST['gender'], $_POST['address'], $_POST['email'], $_POST['nationality'], $_POST['additional_skills']);

    $_SESSION['message'] = $response['message'];
    $_SESSION['statusCode'] = $response['statusCode'];
    header("Location: ../index.php");
    exit();
}

// Handle forms for edit button
if (isset($_POST['editBSApplicantBtn'])) {
    // Verify whether any input fields are blank
    if (empty($_POST['desired_job']) || empty($_POST['applicant_first_name']) || empty($_POST['applicant_last_name']) || empty($_POST['gender']) || empty($_POST['address']) || empty($_POST['email']) || empty($_POST['nationality']) || empty($_POST['additional_skills'])) {
        $_SESSION['message'] = "Updating of the application failed.";
        $_SESSION['statusCode'] = 400;
        header("Location: ../edit.php?id=" . $_GET['id']);
        exit();
    }
    
    $response = editApplicantRecord($pdo, $_POST['desired_job'], $_POST['applicant_first_name'], $_POST['applicant_last_name'], $_POST['gender'], $_POST['address'], $_POST['email'], $_POST['nationality'], $_POST['additional_skills'], $_GET['id']);

    $_SESSION['message'] = $response['message'];
    header("Location: ../index.php");
    exit();
}

// Handle forms for delete button
if (isset($_POST['deleteBSApplicantBtn'])) {
    $response = deleteApplicantRecord($pdo, $_GET['id']);

    $_SESSION['message'] = $response['message'];
    header("Location: ../index.php");
    exit();
}
?>

