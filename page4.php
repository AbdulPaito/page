<?php
session_start(); // Start the session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Save form data into session variables from Page 3
    $_SESSION['disability'] = $_POST['disability'] ?? [];
    $_SESSION['cause_of_disability'] = $_POST['cause_of_disability'] ?? [];
    $_SESSION['taken_ncae'] = $_POST['taken_ncae'] ?? '';
    $_SESSION['where'] = $_POST['where'] ?? '';
    $_SESSION['when'] = $_POST['when'] ?? '';
    $_SESSION['qualification'] = $_POST['qualification'] ?? '';
    $_SESSION['scholarship'] = $_POST['scholarship'] ?? '';
    $_SESSION['privacy_disclaimer'] = $_POST['privacy_disclaimer'] ?? '';

    // Redirect to Page 5
    header('Location: page5.php');
    exit();
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form - Page 4</title>
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
            width: 720px;
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
        <h1>Registration Form - Page 4/6</h1>
        <form action="page5.php" method="POST">
            <table>
                <tr>
                    <th colspan="3">Type of Disability (for Persons with Disability Only): To be filled up by the TESDA personnel</th>
                </tr>
                <tr>
                    <th>Type of Disability</th>
                    <th>Type of Disability</th>
                    <th>Type of Disability</th>
                </tr>
                <tr>
                    <td><input type="checkbox" name="disability[]" value="Mental/Intellectual" <?php if (isset($_SESSION['disability']) && in_array('Mental/Intellectual', $_SESSION['disability'])) echo 'checked'; ?>> Mental/Intellectual</td>
                    <td><input type="checkbox" name="disability[]" value="Visual Disability" <?php if (isset($_SESSION['disability']) && in_array('Visual Disability', $_SESSION['disability'])) echo 'checked'; ?>> Visual Disability</td>
                    <td><input type="checkbox" name="disability[]" value="Orthopedic (Musculoskeletal) Disability" <?php if (isset($_SESSION['disability']) && in_array('Orthopedic (Musculoskeletal) Disability', $_SESSION['disability'])) echo 'checked'; ?>> Orthopedic (Musculoskeletal) Disability</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="disability[]" value="Hearing Disability" <?php if (isset($_SESSION['disability']) && in_array('Hearing Disability', $_SESSION['disability'])) echo 'checked'; ?>> Hearing Disability</td>
                    <td><input type="checkbox" name="disability[]" value="Speech Impairment" <?php if (isset($_SESSION['disability']) && in_array('Speech Impairment', $_SESSION['disability'])) echo 'checked'; ?>> Speech Impairment</td>
                    <td><input type="checkbox" name="disability[]" value="Multiple Disabilities" <?php if (isset($_SESSION['disability']) && in_array('Multiple Disabilities', $_SESSION['disability'])) echo 'checked'; ?>> Multiple Disabilities, specify</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="disability[]" value="Psychosocial Disability" <?php if (isset($_SESSION['disability']) && in_array('Psychosocial Disability', $_SESSION['disability'])) echo 'checked'; ?>> Psychosocial Disability</td>
                    <td><input type="checkbox" name="disability[]" value="Disability Due to Chronic Illness" <?php if (isset($_SESSION['disability']) && in_array('Disability Due to Chronic Illness', $_SESSION['disability'])) echo 'checked'; ?>> Disability Due to Chronic Illness</td>
                    <td><input type="checkbox" name="disability[]" value="Learning Disability" <?php if (isset($_SESSION['disability']) && in_array('Learning Disability', $_SESSION['disability'])) echo 'checked'; ?>> Learning Disability</td>
                </tr>

                <tr>
                    <th colspan="3">Causes of Disability (for Persons with Disability Only): To be filled up by the TESDA personnel</th>
                </tr>
                <tr>
                    <th>Cause of Disability</th>
                    <th>Cause of Disability</th>
                    <th>Cause of Disability</th>
                </tr>
                <tr>
                    <td><input type="checkbox" name="cause_of_disability[]" value="Congenital/Inborn" <?php if (isset($_SESSION['cause_of_disability']) && in_array('Congenital/Inborn', $_SESSION['cause_of_disability'])) echo 'checked'; ?>> Congenital/Inborn</td>
                    <td><input type="checkbox" name="cause_of_disability[]" value="Illness" <?php if (isset($_SESSION['cause_of_disability']) && in_array('Illness', $_SESSION['cause_of_disability'])) echo 'checked'; ?>> Illness</td>
                    <td><input type="checkbox" name="cause_of_disability[]" value="Injury" <?php if (isset($_SESSION['cause_of_disability']) && in_array('Injury', $_SESSION['cause_of_disability'])) echo 'checked'; ?>> Injury</td>
                </tr>
            </table>

            <table>
                <tr>
                    <th colspan="3">Taken NCAE/YP4SC Before?</th>
                </tr>
                <tr>
                    <td><input type="radio" name="taken_ncae" value="Yes" <?php if (isset($_SESSION['taken_ncae']) && $_SESSION['taken_ncae'] == 'Yes') echo 'checked'; ?>> Yes</td>
                    <td><input type="radio" name="taken_ncae" value="No" <?php if (isset($_SESSION['taken_ncae']) && $_SESSION['taken_ncae'] == 'No') echo 'checked'; ?>> No</td>
                </tr>
                <tr>
                    <td><input type="text" placeholder="Where:" id="where" name="where" value="<?php echo isset($_SESSION['where']) ? htmlspecialchars($_SESSION['where']) : ''; ?>"></td>
                    <td><input type="text" placeholder="When:" id="when" name="when" value="<?php echo isset($_SESSION['when']) ? htmlspecialchars($_SESSION['when']) : ''; ?>"></td>
                </tr>

                <tr>
                    <th colspan="3">Name of Course/Qualification</th>
                </tr>
                <tr>
                    <td>Name of Course/Qualification:</td>
                    <td><input type="text" id="qualification" placeholder="Course/Qualification" name="qualification" value="<?php echo isset($_SESSION['qualification']) ? htmlspecialchars($_SESSION['qualification']) : ''; ?>"></td>
                </tr>

                <tr>
                    <th colspan="3">If Scholar, What Type of Scholarship Package (TWSP, PESFA, STEP, others)?</th>
                </tr>
                <tr>
                    <td>If Scholar, What Type of Scholarship:</td>
                    <td><input type="text" id="scholarship" placeholder="Type of Scholarship Package (TWSP, PESFA, STEP, others)?" name="scholarship" value="<?php echo isset($_SESSION['scholarship']) ? htmlspecialchars($_SESSION['scholarship']) : ''; ?>"></td>
                </tr>
                <tr>
                    <th colspan="3">Privacy Disclaimer</th>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">I hereby allow TESDA to use/post my contact details, name, email, cellphone/landline nos. and other information I provided which maybe used for processing of my scholarship application, for employment opportunities and other purposes.</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="privacy_disclaimer" value="Agree" <?php if (isset($_SESSION['privacy_disclaimer']) && $_SESSION['privacy_disclaimer'] == 'Agree') echo 'checked'; ?>> Agree</td>
                    <td><input type="checkbox" name="privacy_disclaimer" value="Disagree" <?php if (isset($_SESSION['privacy_disclaimer']) && $_SESSION['privacy_disclaimer'] == 'Disagree') echo 'checked'; ?>> Disagree</td>
                </tr>
            </table>
            <div class="center">
                <button type="button" onclick="window.location.href='page3.php'">Back</button>
                <button type="submit">Next</button>
            </div>
        </form>
    </div>
</body>
</html>