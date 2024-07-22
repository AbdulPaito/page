<?php
session_start(); // Start the session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Save form data into session variables from Page 2
    $_SESSION['sex'] = isset($_POST['sex']) ? $_POST['sex'] : [];
    $_SESSION['civil_status'] = isset($_POST['civil_status']) ? $_POST['civil_status'] : [];
    $_SESSION['employment_status'] = $_POST['employment_status'] ?? '';
    $_SESSION['month_of_birth'] = $_POST['month_of_birth'] ?? '';
    $_SESSION['day_of_birth'] = $_POST['day_of_birth'] ?? '';
    $_SESSION['year_of_birth'] = $_POST['year_of_birth'] ?? '';
    $_SESSION['age'] = $_POST['age'] ?? '';
    $_SESSION['birthplace_city_municipality'] = $_POST['birthplace_city_municipality'] ?? '';
    $_SESSION['birthplace_province'] = $_POST['birthplace_province'] ?? '';
    $_SESSION['birthplace_region'] = $_POST['birthplace_region'] ?? '';

    // Redirect to Page 3
    header('Location: page3.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form - Page 2</title>
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
            margin: 0px auto;
            padding: 90px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            overflow: hidden; /* Prevents overflow from breaking layout */
        }

        h2, h1, h3, p {
            text-align: center;
            margin-bottom: 10px;
        }

        form {
            width: 100%;
            margin-top: 20px; /* Provides space between headings and form */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px; /* Adjust padding for tighter spacing */
            text-align: left;
            width: 700px;
            border: 2px solid #007bff;
            font-size: 22px;
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            text-align: center;
        }

        td input[type="text"], td input[type="checkbox"], td input[type="radio"] {
            margin-top: 5px;
        }

        td input[type="text"] {
            width: calc(100% - 16px); /* Adjust width to fit table without overflow */
            padding: 6px;
            border: 1px solid black;
            border-radius: 4px;
        }

        .center {
            text-align: center;
            margin-top: 20px; /* Provides space for buttons */
        }

        button[type="submit"], button[type="button"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover, button[type="button"]:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .page {
                padding: 20px; /* Adjust padding for smaller screens */
            }

            th, td {
                font-size: 14px;
            }

            button[type="submit"], button[type="button"] {
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
        <h1>Registration Form - Page 2/6</h1>
        <form action="page3.php" method="post">
            <table>
                <tr>
                    <th colspan="2">ADDITIONAL PERSONAL INFORMATION</th>
                </tr>
                <tr>
                    <td>3.1. Sex</td>
                    <td>3.2. Civil Status</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="sex[]" value="male" <?= in_array('male', $_SESSION['sex'] ?? []) ? 'checked' : '' ?>> Male</td>
                    <td><input type="checkbox" name="civil_status[]" value="single" <?= in_array('single', $_SESSION['civil_status'] ?? []) ? 'checked' : '' ?>> Single</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="sex[]" value="female" <?= in_array('female', $_SESSION['sex'] ?? []) ? 'checked' : '' ?>> Female</td>
                    <td><input type="checkbox" name="civil_status[]" value="married" <?= in_array('married', $_SESSION['civil_status'] ?? []) ? 'checked' : '' ?>> Married</td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="checkbox" name="civil_status[]" value="widow" <?= in_array('widow', $_SESSION['civil_status'] ?? []) ? 'checked' : '' ?>> Widow/er</td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="checkbox" name="civil_status[]" value="separated" <?= in_array('separated', $_SESSION['civil_status'] ?? []) ? 'checked' : '' ?>> Separated</td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="checkbox" name="civil_status[]" value="solo_parent" <?= in_array('solo_parent', $_SESSION['civil_status'] ?? []) ? 'checked' : '' ?>> Solo Parent</td>
                </tr>
                <tr>
                    <th colspan="2">EMPLOYMENT AND BIRTH INFORMATION</th>
                </tr>
                <tr>
                    <td>3.3. Employment Status</td>
                    <td>3.4. Birthdate</td>
                </tr>
                <tr>
                    <td><input type="radio" name="employment_status" value="employed" <?= $_SESSION['employment_status'] == 'employed' ? 'checked' : '' ?>> Employed</td>
                    <td><input type="text" name="month_of_birth" size="10" placeholder="Month of Birth" value="<?= htmlspecialchars($_SESSION['month_of_birth'] ?? '') ?>"></td>
                </tr>
                <tr>
                    <td><input type="radio" name="employment_status" value="unemployed" <?= $_SESSION['employment_status'] == 'unemployed' ? 'checked' : '' ?>> Unemployed</td>
                    <td><input type="text" name="day_of_birth" size="10" placeholder="Day of Birth" value="<?= htmlspecialchars($_SESSION['day_of_birth'] ?? '') ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="text" name="year_of_birth" size="10" placeholder="Year of Birth" value="<?= htmlspecialchars($_SESSION['year_of_birth'] ?? '') ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="text" name="age" size="20" placeholder="Age" value="<?= htmlspecialchars($_SESSION['age'] ?? '') ?>"></td>
                </tr>
                <tr>
                    <td>3.5. Birthplace</td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type="text" name="birthplace_city_municipality" size="20" placeholder="City/Municipality" value="<?= htmlspecialchars($_SESSION['birthplace_city_municipality'] ?? '') ?>"></td>
                    <td><input type="text" name="birthplace_province" size="20" placeholder="Province" value="<?= htmlspecialchars($_SESSION['birthplace_province'] ?? '') ?>"></td>
                </tr>
                <tr>
                    <td><input type="text" name="birthplace_region" size="20" placeholder="Region" value="<?= htmlspecialchars($_SESSION['birthplace_region'] ?? '') ?>"></td>
                    <td></td>
                </tr>
            </table>
            <div class="center">
                <button type="button" onclick="window.location.href='page1.php'">Back</button>
                <button type="submit">Next</button>
            </div>
        </form>
    </div>
</body>
</html>
