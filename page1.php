<?php
session_start(); // Start the session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Save form data into session variables
    $_SESSION['uli_number'] = $_POST['uli_number'];
    $_SESSION['entry_date'] = $_POST['entry_date'];
    $_SESSION['last_name'] = $_POST['last_name'];
    $_SESSION['first_name'] = $_POST['first_name'];
    $_SESSION['middle_name'] = $_POST['middle_name'];
    $_SESSION['address_number_street'] = $_POST['address_number_street'];
    $_SESSION['address_barangay'] = $_POST['address_barangay'];
    $_SESSION['address_district'] = $_POST['address_district'];
    $_SESSION['address_city_municipality'] = $_POST['address_city_municipality'];
    $_SESSION['address_province'] = $_POST['address_province'];
    $_SESSION['address_region'] = $_POST['address_region'];
    $_SESSION['email_facebook'] = $_POST['email_facebook'];
    $_SESSION['contact_no'] = $_POST['contact_no'];
    $_SESSION['nationality'] = $_POST['nationality'];

    // Handle file uploads
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
        $uploadedFile = $_FILES['profile_image'];
        $uploadDir = 'uploads/'; // Ensure this directory exists and is writable
        $uploadFile = $uploadDir . basename($uploadedFile['name']);

        if (move_uploaded_file($uploadedFile['tmp_name'], $uploadFile)) {
            $_SESSION['profile_image'] = $uploadFile; // Save file path to session
        } else {
            echo 'File upload failed!';
            exit();
        }
    }

    echo "Redirecting to page2.php";
    header('Location: page2.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form - Page 1</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f9;
        }

        .page {
            max-width: 1700px; /* Adjust as needed */
            height: 1400px;
            margin: 0 auto;
            padding: 90px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            overflow: hidden; /* Prevents overflow from breaking layout */
        }

        h2, h1, p {
            text-align: center;
            margin-bottom: 10px;
        }

        form {
            width: 100%;
            margin-top: 20px; /* Provides space between headings and form */
        }

        .image-upload-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-bottom: 20px;
        }

        .image-preview {
            width: 200px;
            height: 150px;
            border: 1px solid #007bff;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f0f0f0;
            margin-bottom: 10px;
            overflow: hidden;
        }

        .image-preview img {
            max-width: 100%;
            max-height: 100%;
        }

        .image-upload-label {
            cursor: pointer;
            color: #007bff;
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 8px; /* Adjust padding for tighter spacing */
            text-align: left;
            border: 2px solid #007bff;
            font-size: 23px;
        }

        .learner {
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        td input[type="text"] {
            width: calc(100% - 16px); /* Adjust width to fit table without overflow */
            padding: 6px;
            border: 1px solid black;
            border-radius: 4px;
            margin-top: 5px;
        }

        .center {
            text-align: center;
            margin-top: 20px; /* Provides space for button */
        }

        button[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .page {
                padding: 20px; /* Adjust padding for smaller screens */
            }

            th, td {
                font-size: 14px;
            }

            button[type="submit"] {
                width: 100%;
                padding: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="page">
        <h1>Technical Education and Skills Development Authority</h1>
        <h1><p>Pangasiwaan sa Edukasyong Teknikal at Pagpapaunlad ng Kasanayan</p></h1>
        <h1>Registration Form - Page 1/5</h1>
        <form action="page2.php" method="post" enctype="multipart/form-data">
            <div class="image-upload-container">
                <div class="image-preview" id="imagePreview">
                    <?php if (isset($_SESSION['profile_image'])): ?>
                        <img src="<?= $_SESSION['profile_image'] ?>" alt="Profile Image">
                    <?php else: ?>
                        <span>I.D Picture</span>
                    <?php endif; ?>
                </div>
                <label class="image-upload-label" for="profile_image">Choose Image</label>
                <input type="file" name="profile_image" id="profile_image" accept="image/*" style="display: none;" onchange="previewImage(event)">
            </div>

            <table>
                <tr>
                    <th colspan="2" class="learner">LEARNERS PROFILE FORM</th>
                </tr>
                <tr>
                    <td>1. T2MIS Auto Generated</td>
                    <td></td>
                </tr>
                <tr>
                    <td>1.1. Unique Learner Identifier (ULI) Number:</td>
                    <td><input type="text" name="uli_number" value="<?= isset($_SESSION['uli_number']) ? htmlspecialchars($_SESSION['uli_number']) : '' ?>"></td>
                </tr>
                <tr>
                    <td>1.2. Entry Date:</td>
                    <td><input type="text" name="entry_date" size="10" placeholder="mm-dd-yy" value="<?= isset($_SESSION['entry_date']) ? htmlspecialchars($_SESSION['entry_date']) : '' ?>"></td>
                </tr>
                <tr>
                    <th colspan="2" class="learner">2. Learner/Manpower Profile</th>
                </tr>
                <tr>
                    <td>2.1. Name:</td>
                    <td>
                        <input type="text" name="last_name" size="15" placeholder="Last Name, Extension Name (Jr., Sr.)" value="<?= isset($_SESSION['last_name']) ? htmlspecialchars($_SESSION['last_name']) : '' ?>">
                        <input type="text" name="first_name" size="15" placeholder="First Name" value="<?= isset($_SESSION['first_name']) ? htmlspecialchars($_SESSION['first_name']) : '' ?>">
                        <input type="text" name="middle_name" size="15" placeholder="Middle Name" value="<?= isset($_SESSION['middle_name']) ? htmlspecialchars($_SESSION['middle_name']) : '' ?>">
                    </td>
                </tr>
                <tr>
                    <td>2.2. Complete Permanent Mailing Address:</td>
                    <td>
                        <input type="text" name="address_number_street" size="20" placeholder="Number, Street" value="<?= isset($_SESSION['address_number_street']) ? htmlspecialchars($_SESSION['address_number_street']) : '' ?>"><br>
                        <input type="text" name="address_barangay" size="20" placeholder="Barangay" value="<?= isset($_SESSION['address_barangay']) ? htmlspecialchars($_SESSION['address_barangay']) : '' ?>"><br>
                        <input type="text" name="address_district" size="20" placeholder="District" value="<?= isset($_SESSION['address_district']) ? htmlspecialchars($_SESSION['address_district']) : '' ?>"><br>
                        <input type="text" name="address_city_municipality" size="20" placeholder="City/Municipality" value="<?= isset($_SESSION['address_city_municipality']) ? htmlspecialchars($_SESSION['address_city_municipality']) : '' ?>"><br>
                        <input type="text" name="address_province" size="20" placeholder="Province" value="<?= isset($_SESSION['address_province']) ? htmlspecialchars($_SESSION['address_province']) : '' ?>"><br>
                        <input type="text" name="address_region" size="20" placeholder="Region" value="<?= isset($_SESSION['address_region']) ? htmlspecialchars($_SESSION['address_region']) : '' ?>"><br>
                        <input type="text" name="email_facebook" size="20" placeholder="Email Address/Facebook Account" value="<?= isset($_SESSION['email_facebook']) ? htmlspecialchars($_SESSION['email_facebook']) : '' ?>"><br>
                        <input type="text" name="contact_no" size="20" placeholder="Contact No" value="<?= isset($_SESSION['contact_no']) ? htmlspecialchars($_SESSION['contact_no']) : '' ?>"><br>
                        <input type="text" name="nationality" size="20" placeholder="Nationality" value="<?= isset($_SESSION['nationality']) ? htmlspecialchars($_SESSION['nationality']) : '' ?>">
                    </td>
                </tr>
            </table>
            <div class="center">
                <button type="submit">Next</button>
            </div>
        </form>
    </div>
</body>
</html>
