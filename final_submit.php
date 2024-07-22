<?php
session_start(); // Start the session

// Database connection
$servername = "localhost";
$username = "your_db_username";
$password = "your_db_password";
$dbname = "login"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect and sanitize form data
$applicant_signature = isset($_POST['applicant_signature']) ? $conn->real_escape_string($_POST['applicant_signature']) : '';
$date_accomplished = isset($_POST['date_accomplished']) ? $conn->real_escape_string($_POST['date_accomplished']) : '';
$registrar_signature = isset($_POST['registrar_signature']) ? $conn->real_escape_string($_POST['registrar_signature']) : '';
$date_received = isset($_POST['date_received']) ? $conn->real_escape_string($_POST['date_received']) : '';

// Collect session data from previous pages
$uli_number = isset($_SESSION['uli_number']) ? $conn->real_escape_string($_SESSION['uli_number']) : '';
$entry_date = isset($_SESSION['entry_date']) ? $conn->real_escape_string($_SESSION['entry_date']) : '';
$last_name = isset($_SESSION['last_name']) ? $conn->real_escape_string($_SESSION['last_name']) : '';
$first_name = isset($_SESSION['first_name']) ? $conn->real_escape_string($_SESSION['first_name']) : '';
$middle_name = isset($_SESSION['middle_name']) ? $conn->real_escape_string($_SESSION['middle_name']) : '';
$address_number_street = isset($_SESSION['address_number_street']) ? $conn->real_escape_string($_SESSION['address_number_street']) : '';
$address_barangay = isset($_SESSION['address_barangay']) ? $conn->real_escape_string($_SESSION['address_barangay']) : '';
$address_district = isset($_SESSION['address_district']) ? $conn->real_escape_string($_SESSION['address_district']) : '';
$address_city_municipality = isset($_SESSION['address_city_municipality']) ? $conn->real_escape_string($_SESSION['address_city_municipality']) : '';
$address_province = isset($_SESSION['address_province']) ? $conn->real_escape_string($_SESSION['address_province']) : '';
$address_region = isset($_SESSION['address_region']) ? $conn->real_escape_string($_SESSION['address_region']) : '';
$email_facebook = isset($_SESSION['email_facebook']) ? $conn->real_escape_string($_SESSION['email_facebook']) : '';
$contact_no = isset($_SESSION['contact_no']) ? $conn->real_escape_string($_SESSION['contact_no']) : '';
$nationality = isset($_SESSION['nationality']) ? $conn->real_escape_string($_SESSION['nationality']) : '';

// Handle file uploads
$upload_dir = 'uploads/';
$thumbmark = '';
$imageUpload = '';

if (isset($_FILES['thumbmark']) && $_FILES['thumbmark']['error'] == 0) {
    $thumbmark = $upload_dir . basename($_FILES['thumbmark']['name']);
    move_uploaded_file($_FILES['thumbmark']['tmp_name'], $thumbmark);
}

if (isset($_FILES['imageUpload']) && $_FILES['imageUpload']['error'] == 0) {
    $imageUpload = $upload_dir . basename($_FILES['imageUpload']['name']);
    move_uploaded_file($_FILES['imageUpload']['tmp_name'], $imageUpload);
}

// Prepare SQL statement to insert form data into the database
$sql = "INSERT INTO registrations (
    uli_number, entry_date, last_name, first_name, middle_name,
    address_number_street, address_barangay, address_district,
    address_city_municipality, address_province, address_region,
    email_facebook, contact_no, nationality, applicant_signature,
    date_accomplished, registrar_signature, date_received, thumbmark, imageUpload
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Prepare and bind
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssssssssssssss", 
    $uli_number, $entry_date, $last_name, $first_name, $middle_name,
    $address_number_street, $address_barangay, $address_district,
    $address_city_municipality, $address_province, $address_region,
    $email_facebook, $contact_no, $nationality, $applicant_signature,
    $date_accomplished, $registrar_signature, $date_received, $thumbmark, $imageUpload
);

// Execute the statement
if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();

// Clear session data
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session
?>
