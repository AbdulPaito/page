<?php
session_start(); // Start the session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Save form data into session variables from Page 3
    $_SESSION['educational_attainment'] = $_POST['educational_attainment'] ?? [];
    $_SESSION['parent_guardian_name'] = $_POST['parent_guardian_name'] ?? '';
    $_SESSION['parent_guardian_address'] = $_POST['parent_guardian_address'] ?? '';
    $_SESSION['classification'] = $_POST['classification'] ?? [];
    
    // Redirect to Page 4
    header('Location: page4.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form - Page 3</title>
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
            border: 2px solid #007bff;
            font-size: 22px;
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            text-align: center;
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
    <h1>Registration Form - Page 3/6</h1>
    <form action="page4.php" method="post">
        <table>
            <tr>
                <th colspan="3">Educational Attainment Before the Training (Trainee)</th>
            </tr>
            <tr>
                <td><input type="checkbox" name="educational_attainment[]" value="no_grade_completed" <?= isset($_SESSION['educational_attainment']) && in_array('no_grade_completed', $_SESSION['educational_attainment']) ? 'checked' : '' ?>> No Grade Completed</td>
                <td><input type="checkbox" name="educational_attainment[]" value="pre_school" <?= isset($_SESSION['educational_attainment']) && in_array('pre_school', $_SESSION['educational_attainment']) ? 'checked' : '' ?>> Pre-School (Nursery/Kinder/Prep)</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="educational_attainment[]" value="elementary_undergraduate" <?= isset($_SESSION['educational_attainment']) && in_array('elementary_undergraduate', $_SESSION['educational_attainment']) ? 'checked' : '' ?>> Elementary Undergraduate</td>
                <td><input type="checkbox" name="educational_attainment[]" value="post_secondary_undergraduate" <?= isset($_SESSION['educational_attainment']) && in_array('post_secondary_undergraduate', $_SESSION['educational_attainment']) ? 'checked' : '' ?>> Post Secondary Undergraduate</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="educational_attainment[]" value="elementary_graduate" <?= isset($_SESSION['educational_attainment']) && in_array('elementary_graduate', $_SESSION['educational_attainment']) ? 'checked' : '' ?>> Elementary Graduate</td>
                <td><input type="checkbox" name="educational_attainment[]" value="post_secondary_graduate" <?= isset($_SESSION['educational_attainment']) && in_array('post_secondary_graduate', $_SESSION['educational_attainment']) ? 'checked' : '' ?>> Post Secondary Graduate</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="educational_attainment[]" value="high_school_undergraduate" <?= isset($_SESSION['educational_attainment']) && in_array('high_school_undergraduate', $_SESSION['educational_attainment']) ? 'checked' : '' ?>> High School Undergraduate</td>
                <td><input type="checkbox" name="educational_attainment[]" value="high_school_graduate" <?= isset($_SESSION['educational_attainment']) && in_array('high_school_graduate', $_SESSION['educational_attainment']) ? 'checked' : '' ?>> High School Graduate</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="educational_attainment[]" value="college_undergraduate" <?= isset($_SESSION['educational_attainment']) && in_array('college_undergraduate', $_SESSION['educational_attainment']) ? 'checked' : '' ?>> College Undergraduate</td>
                <td><input type="checkbox" name="educational_attainment[]" value="college_graduate_or_higher" <?= isset($_SESSION['educational_attainment']) && in_array('college_graduate_or_higher', $_SESSION['educational_attainment']) ? 'checked' : '' ?>> College Graduate or Higher</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="educational_attainment[]" value="junior_high_graduate" <?= isset($_SESSION['educational_attainment']) && in_array('junior_high_graduate', $_SESSION['educational_attainment']) ? 'checked' : '' ?>> Junior High Graduate</td>
                <td><input type="checkbox" name="educational_attainment[]" value="senior_high_graduate" <?= isset($_SESSION['educational_attainment']) && in_array('senior_high_graduate', $_SESSION['educational_attainment']) ? 'checked' : '' ?>> Senior High Graduate</td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="3">3.7. Parent/Guardian</th>
            </tr>
            <tr>
                <td>Parent/Guardian Name:</td>
                <td colspan="2"><input type="text" name="parent_guardian_name" size="50" placeholder="Name" value="<?= htmlspecialchars($_SESSION['parent_guardian_name'] ?? '') ?>"></td>
            </tr>
            <tr>
                <td>Complete Permanent Mailing Address:</td>
                <td colspan="2"><input type="text" name="parent_guardian_address" size="50" placeholder="Complete Permanent Mailing Address" value="<?= htmlspecialchars($_SESSION['parent_guardian_address'] ?? '') ?>"></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="3">Learner/Trainee/Student (Clients) Classification:</th>
            </tr>
            <tr>
                <th>Learner/Trainee/Student</th>
                <th>Client Type</th>
                <th>Client Type</th>
            </tr>
            <tr>
                <td class="column">
                    <input type="checkbox" name="classification[]" value="Students" <?= isset($_SESSION['classification']) && in_array('Students', $_SESSION['classification']) ? 'checked' : '' ?>> Students<br>
                    <input type="checkbox" name="classification[]" value="Out-of-School-Youth" <?= isset($_SESSION['classification']) && in_array('Out-of-School-Youth', $_SESSION['classification']) ? 'checked' : '' ?>> Out-of-School-Youth<br>
                    <input type="checkbox" name="classification[]" value="Solo Parent" <?= isset($_SESSION['classification']) && in_array('Solo Parent', $_SESSION['classification']) ? 'checked' : '' ?>> Solo Parent<br>
                    <input type="checkbox" name="classification[]" value="Solo Parent's Children" <?= isset($_SESSION['classification']) && in_array('Solo Parent\'s Children', $_SESSION['classification']) ? 'checked' : '' ?>> Solo Parent's Children<br>
                    <input type="checkbox" name="classification[]" value="Senior Citizens" <?= isset($_SESSION['classification']) && in_array('Senior Citizens', $_SESSION['classification']) ? 'checked' : '' ?>> Senior Citizens<br>
                    <input type="checkbox" name="classification[]" value="Displaced HEIs Teaching Personnel" <?= isset($_SESSION['classification']) && in_array('Displaced HEIs Teaching Personnel', $_SESSION['classification']) ? 'checked' : '' ?>> Displaced HEIs Teaching Personnel<br>
                    <input type="checkbox" name="classification[]" value="Displaced Workers" <?= isset($_SESSION['classification']) && in_array('Displaced Workers', $_SESSION['classification']) ? 'checked' : '' ?>> Displaced Workers<br>
                    <input type="checkbox" name="classification[]" value="TVET Trainers" <?= isset($_SESSION['classification']) && in_array('TVET Trainers', $_SESSION['classification']) ? 'checked' : '' ?>> TVET Trainers<br>
                    <input type="checkbox" name="classification[]" value="Currently Employed Workers" <?= isset($_SESSION['classification']) && in_array('Currently Employed Workers', $_SESSION['classification']) ? 'checked' : '' ?>> Currently Employed Workers<br>
                    <input type="checkbox" name="classification[]" value="Employees with Contractual/Job-Order Status" <?= isset($_SESSION['classification']) && in_array('Employees with Contractual/Job-Order Status', $_SESSION['classification']) ? 'checked' : '' ?>> Employees with Contractual/Job-Order Status<br>
                    <input type="checkbox" name="classification[]" value="TESDA Alumni" <?= isset($_SESSION['classification']) && in_array('TESDA Alumni', $_SESSION['classification']) ? 'checked' : '' ?>> TESDA Alumni<br>
                    <input type="checkbox" name="classification[]" value="Urban and Rural Poor" <?= isset($_SESSION['classification']) && in_array('Urban and Rural Poor', $_SESSION['classification']) ? 'checked' : '' ?>> Urban and Rural Poor<br>
                </td>
                <td class="column">
                    <input type="checkbox" name="classification[]" value="Informal Workers" <?= isset($_SESSION['classification']) && in_array('Informal Workers', $_SESSION['classification']) ? 'checked' : '' ?>> Informal Workers<br>
                    <input type="checkbox" name="classification[]" value="Industry Workers" <?= isset($_SESSION['classification']) && in_array('Industry Workers', $_SESSION['classification']) ? 'checked' : '' ?>> Industry Workers<br>
                    <input type="checkbox" name="classification[]" value="Cooperatives" <?= isset($_SESSION['classification']) && in_array('Cooperatives', $_SESSION['classification']) ? 'checked' : '' ?>> Cooperatives<br>
                    <input type="checkbox" name="classification[]" value="Family Enterprises" <?= isset($_SESSION['classification']) && in_array('Family Enterprises', $_SESSION['classification']) ? 'checked' : '' ?>> Family Enterprises<br>
                    <input type="checkbox" name="classification[]" value="Micro Entrepreneurs" <?= isset($_SESSION['classification']) && in_array('Micro Entrepreneurs', $_SESSION['classification']) ? 'checked' : '' ?>> Micro Entrepreneurs<br>
                    <input type="checkbox" name="classification[]" value="Family Members of Microentrepreneur" <?= isset($_SESSION['classification']) && in_array('Family Members of Microentrepreneur', $_SESSION['classification']) ? 'checked' : '' ?>> Family Members of Microentrepreneur<br>
                    <input type="checkbox" name="classification[]" value="Farmers and Fisherman" <?= isset($_SESSION['classification']) && in_array('Farmers and Fisherman', $_SESSION['classification']) ? 'checked' : '' ?>> Farmers and Fisherman<br>
                    <input type="checkbox" name="classification[]" value="Family Members of Farmers and Fisherman" <?= isset($_SESSION['classification']) && in_array('Family Members of Farmers and Fisherman', $_SESSION['classification']) ? 'checked' : '' ?>> Family Members of Farmers and Fisherman<br>
                    <input type="checkbox" name="classification[]" value="Community Tmg. & Employment Coordinator" <?= isset($_SESSION['classification']) && in_array('Community Tmg. & Employment Coordinator', $_SESSION['classification']) ? 'checked' : '' ?>> Community Tmg. & Employment Coordinator<br>
                    <input type="checkbox" name="classification[]" value="Retuming/Repatriated Overseas Filipino Workers" <?= isset($_SESSION['classification']) && in_array('Retuming/Repatriated Overseas Filipino Workers', $_SESSION['classification']) ? 'checked' : '' ?>> Retuming/Repatriated Overseas Filipino Workers<br>
                    <input type="checkbox" name="classification[]" value="Overseas Filipino Workers (OFW) Dependents" <?= isset($_SESSION['classification']) && in_array('Overseas Filipino Workers (OFW) Dependents', $_SESSION['classification']) ? 'checked' : '' ?>> Overseas Filipino Workers (OFW) Dependents<br>
                    <input type="checkbox" name="classification[]" value="Persons with Disabilities" <?= isset($_SESSION['classification']) && in_array('Persons with Disabilities', $_SESSION['classification']) ? 'checked' : '' ?>> Persons with Disabilities<br>
                </td>
                <td class="column">
                    <input type="checkbox" name="classification[]" value="Indigenous People & Cultural Communities" <?= isset($_SESSION['classification']) && in_array('Indigenous People & Cultural Communities', $_SESSION['classification']) ? 'checked' : '' ?>> Indigenous People & Cultural Communities<br>
                    <input type="checkbox" name="classification[]" value="Disadvantaged Women" <?= isset($_SESSION['classification']) && in_array('Disadvantaged Women', $_SESSION['classification']) ? 'checked' : '' ?>> Disadvantaged Women<br>
                    <input type="checkbox" name="classification[]" value="Victim of Natural Disasters and Calamities" <?= isset($_SESSION['classification']) && in_array('Victim of Natural Disasters and Calamities', $_SESSION['classification']) ? 'checked' : '' ?>> Victim of Natural Disasters and Calamities<br>
                    <input type="checkbox" name="classification[]" value="Victim or Survivor of Human Trafficking" <?= isset($_SESSION['classification']) && in_array('Victim or Survivor of Human Trafficking', $_SESSION['classification']) ? 'checked' : '' ?>> Victim or Survivor of Human Trafficking<br>
                    <input type="checkbox" name="classification[]" value="Drug Dependent Surrenderers" <?= isset($_SESSION['classification']) && in_array('Drug Dependent Surrenderers', $_SESSION['classification']) ? 'checked' : '' ?>> Drug Dependent Surrenderers<br>
                    <input type="checkbox" name="classification[]" value="Rebel Returnees or Decommissioned Combatants" <?= isset($_SESSION['classification']) && in_array('Rebel Returnees or Decommissioned Combatants', $_SESSION['classification']) ? 'checked' : '' ?>> Rebel Returnees or Decommissioned Combatants<br>
                    <input type="checkbox" name="classification[]" value="Inmates and Detainees" <?= isset($_SESSION['classification']) && in_array('Inmates and Detainees', $_SESSION['classification']) ? 'checked' : '' ?>> Inmates and Detainees<br>
                    <input type="checkbox" name="classification[]" value="Wounded-in-Action AFP & PNP Personnel" <?= isset($_SESSION['classification']) && in_array('Wounded-in-Action AFP & PNP Personnel', $_SESSION['classification']) ? 'checked' : '' ?>> Wounded-in-Action AFP & PNP Personnel<br>
                    <input type="checkbox" name="classification[]" value="Family Members of AFP and PNP Killed-and-Wounded in-Action" <?= isset($_SESSION['classification']) && in_array('Family Members of AFP and PNP Killed-and-Wounded in-Action', $_SESSION['classification']) ? 'checked' : '' ?>> Family Members of AFP and PNP Killed-and-Wounded in-Action<br>
                    <input type="checkbox" name="classification[]" value="Family Members of Inmates and Detainees" <?= isset($_SESSION['classification']) && in_array('Family Members of Inmates and Detainees', $_SESSION['classification']) ? 'checked' : '' ?>> Family Members of Inmates and Detainees<br>
                    <input type="checkbox" name="classification[]" value="Uniformed Personnel" <?= isset($_SESSION['classification']) && in_array('Uniformed Personnel', $_SESSION['classification']) ? 'checked' : '' ?>> Uniformed Personnel<br>
                </td>
            </tr>
        </table>
        <div class="center">
            <button type="button" onclick="window.location.href='page2.php'">Back</button>
            <button type="submit">Next</button>
        </div>
    </form>
</div>
</body>
</html>
