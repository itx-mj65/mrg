<!DOCTYPE html>
<html lang="en">

<?php
include "../admin/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $guardianName = $_POST['name'];
    $relationGroomBride = $_POST['email'];
    $guardianPhone = $_POST['phone'];
    $lookingFor = $_POST['lookin'];
    $groomBrideName = $_POST['groomBrideName'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $caste = $_POST['caste'];
    $sect = $_POST['sect'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $height = $_POST['height'];
    $education = $_POST['education'];
    $description = $_POST['Description'];
    $paymentMethod = $_POST['paymentMethod'];

    $imagePath = "";
    if (isset($_FILES['upload']) && $_FILES['upload']['error'] == 0) {
        $imageName = time() . '_' . basename($_FILES['upload']['name']);
        $targetDir = "uploads/";
        $targetFilePath = $targetDir . $imageName;

        if (move_uploaded_file($_FILES['upload']['tmp_name'], $targetFilePath)) {
            $imagePath = $targetFilePath;
        }
    }

    $stmt = $conn->prepare("INSERT INTO registrations (name, email, phone, looking_for, groom_bride_name, dob, gender, caste, sect, country, city, height, education, description, payment_method, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssssssss", $guardianName, $relationGroomBride, $guardianPhone, $lookingFor, $groomBrideName, $dob, $gender, $caste, $sect, $country, $city, $height, $education, $description, $paymentMethod, $imagePath);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful!');</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    $stmt->close();
}
$conn->close();
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <style>
        /* General Styles */
        body,
        html {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: rgba(241, 78, 149, 0.4);

        }

        /* Navbar Styles */
        .navbar {
            display: flex;
            justify-content: space-around;
            align-items: center;
            background-color: #F14E95;
            padding: 15px 90px;
            color: white;
            position: sticky;
            top: 0;
            height: 50px;
            z-index: 10;
        }

        .navbar .logo {
            font-size: 22px;
            font-weight: bold;
        }

        .navbar .logo a {
            text-decoration: none;
            color: white;
            font-size: 22px;
            font-weight: bold;
        }

        .navbar .nav-links {
            list-style-type: none;

            padding: 20px;
            display: flex;
        }

        .navbar .nav-links li {
            margin-left: 30px;
            margin: 40px;
        }

        .navbar .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        .navbar .nav-links a:hover {
            color: #E91E63;
        }

        /* Main Container Styling */
        .container {
            display: flex;
            max-width: 1200px;
            width: 100%;
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
            /* background: rgba(241, 78, 149, 0.4); */
            margin: 0px auto;
            padding: 50px 0px;
        }

        /* Left Section Styles */
        .left-section {
            flex: 1;
            position: relative;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('./images/bride\ and\ groome.jpg') center center / cover no-repeat;
        }

        .welcome-text {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .welcome-text h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .welcome-text p {
            margin-bottom: 30px;
        }

        #profilePicture {
            margin-left: 30px;
            width: 300px;
        }

        .login-btn {
            background-color: #d32f2f;
            border: none;
            padding: 12px 30px;
            color: white;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
        }

        /* Right Section Styles */
        .right-section {
            flex: 1;
            padding: 40px;
            background-color: #f9f9f9;
        }

        .right-section h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .registration-form {
            width: 100%;
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .form-group {
            flex-basis: 48%;
            position: relative;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        /* Fee Payment Options */
        .payment-method {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .payment-method input[type="radio"] {
            margin-right: 10px;
        }

        /* Privacy and Fee Confirmation */
        .privacy-check,
        .fee-check {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .privacy-check input,
        .fee-check input {
            margin-right: 10px;
        }

        .register-btn {
            width: 100%;
            background-color: #F14E95;
            color: white;
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Error message */
        .error-message {
            color: red;
            font-size: 14px;
            display: none;
            margin-top: -10px;
            margin-bottom: 10px;
        }

        /* Responsive Behavior */
        @media screen and (max-width: 768px) {
            .container {
                flex-direction: column;
                max-width: 100%;
            }

            .form-row {
                flex-direction: column;
            }

            .form-group {
                flex-basis: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar with Logo and Navigation Links -->
    <div class="navbar">
        <div class="logo"><a href="../index.html"> القائم ازدواج سروس </a> </div>
        <!-- <ul class="nav-links">
            <li><a href="../index.html">Home</a></li>
            <li><a href="#">Login</a></li>
            <li><a href="../register/register.html">Register</a></li>
            <li><a href="../services.html">Services</a></li>
            <li><a href="../contact.html">Contect</a></li>
        </ul> -->
    </div>

    <!-- Main Content with Registration Form -->
    <div class="container">
        <!-- Left Section with Image and Welcome Text -->
        <div class="left-section">
            <div class="welcome-text">
                <h1>Welcome Back</h1>
                <p>Pakistan's largest online matrimonial service</p>
                <!-- <button class="login-btn">Login</button> -->
            </div>
        </div>

        <!-- Right Section with Form -->
        <div class="right-section">
            <h2>Registeration Page</h2> 
            <form action="./register.php" method="post" enctype="multipart/form-data" id="registrationForm" class="registration-form">
                <!-- Guardian Information -->
                <div class="form-row">
                    <div class="form-group">
                        <input type="text" name="name" id="guardianName" placeholder="name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="relationGroomBride" placeholder="Email" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <input type="tel" name="phone" id="guardianPhone" placeholder="Phone Number" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="lookin" id="guardianPhone" placeholder="Looking For" required>
                    </div>
                </div>

                <!-- Groom/Bride Information -->
                <div class="form-row">
                    <div class="form-group">
                        <input type="text" name="groomBrideName" id="groomBrideName" placeholder="Groom/Bride Name" required>
                    </div>
                    <div class="form-group">
                        <input type="date" name="dob" id="dob" placeholder="Date of Birth" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <select id="gender" name="gender" required>
                            <option value="" disabled selected>Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="caste" id="caste" placeholder="Caste" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <select id="sect" name="sect" required>
                            <option value="" disabled selected>Sect</option>
                            <option value="sunni">Sunni</option>
                            <option value="shia">Shia</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select id="country" name="country" required>
                            <option value="" disabled selected>Residence Country</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="India">India</option>
                            <option value="USA">USA</option>
                            <option value="UK">UK</option>
                            <option value="UK">japan</option>

                            <!-- Add more countries as needed -->
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <input type="text" name="city" id="city" placeholder="City" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="height" id="height" placeholder="Height (Feets)" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <select name="education">
                            <option value="">Education</option>
                            <option value="High School">High School</option>
                            <option value="Bachelor">Bachelor</option>
                            <option value="Master">Master</option>
                        </select>

                    </div>
                    <div class="form-group" style="flex-basis: 100%;">
                        <input type="file" name="upload" id="profilePicture" placeholder="Upload Picture" accept="image/*" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group" style="flex-basis: 100%;">
                        <textarea id="description" name="Description" placeholder="Description" rows="3" required></textarea>
                    </div>
                </div>

                <!-- Fee Submission Fields -->
                <div class="fee-check">
                    <input type="checkbox" id="feeConfirmation" required> I confirm that I have submitted the fee (via JazzCash or Bank Account).
                </div>

                <div class="form-row">
                    <div class="form-group" style="flex-basis: 100%;">
                        <select id="paymentMethod" name="paymentMethod" required>
                            <option value="" disabled selected>Payment Method</option>
                            <option value="jazzcash">JazzCash</option>
                            <option value="bank">Bank Account</option>
                        </select>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" name="reg" class="register-btn">Register</button>
            </form>
        </div>
    </div>

    <!-- JavaScript for Form Validation -->
    <script>
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            // Email validation
            const email = document.getElementById('email');
            const emailError = document.getElementById('emailError');
            const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

            // Fee submission confirmation
            const feeConfirmation = document.getElementById('feeConfirmation');
            if (!feeConfirmation.checked) {
                alert("Please confirm fee submission.");
                event.preventDefault();
            }
        });
    </script>
</body>

</html>