<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Receive Form Data
    $name = htmlspecialchars($_POST['full_name']);
    $age = htmlspecialchars($_POST['age']);
    $course = htmlspecialchars($_POST['course']);
    $email = htmlspecialchars($_POST['email']);
    $gender = $_POST['gender'];
    $hobbies = isset($_POST['hobbies']) ? $_POST['hobbies'] : [];
    $bio = htmlspecialchars($_POST['bio']);

    // 2. Upload the Image
    $target_dir = "uploads/";
    // Ensure directory exists
    if (!file_exists($target_dir)) { mkdir($target_dir, 0777, true); }

    $file_name = basename($_FILES["profile_pic"]["name"]);
    $target_file = $target_dir . time() . "_" . $file_name; // unique name
    
    move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file);
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <style>
        body { background-color: #e0e0e0; font-family: sans-serif; display: flex; justify-content: center; padding: 40px; }
        
        .profile-card {
            background: #e0e0e0;
            padding: 40px;
            border-radius: 50px;
            width: 450px;
            text-align: center;
            box-shadow: 20px 20px 60px #bebebe, -20px -20px 60px #ffffff;
        }

        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 8px solid #e0e0e0;
            box-shadow: 6px 6px 12px #bebebe, -6px -6px 12px #ffffff;
            margin-bottom: 20px;
        }

        .info-bit {
            background: #e0e0e0;
            margin: 10px 0;
            padding: 10px;
            border-radius: 15px;
            box-shadow: inset 4px 4px 8px #bebebe, inset -4px -4px 8px #ffffff;
            color: #333;
        }

        .bio-box {
            font-style: italic;
            margin-top: 20px;
            padding: 15px;
            border-left: 5px solid #aaa;
        }
    </style>
</head>
<body>

<div class="profile-card">
    <img src="<?php echo $target_file; ?>" class="profile-img" alt="Profile Image">
    
    <h1 style="text-shadow: 1px 1px #fff;"><?php echo $name; ?></h1>
    <p><strong><?php echo $gender; ?> | <?php echo $age; ?> Years Old</strong></p>
    
    <div class="info-bit"><strong>Email:</strong> <?php echo $email; ?></div>
    <div class="info-bit"><strong>Program:</strong> <?php echo $course; ?></div>
    
    <div class="info-bit">
        <strong>Hobbies:</strong> <?php echo implode(", ", $hobbies); ?>
    </div>

    <div class="bio-box">
        "<?php echo nl2br($bio); ?>"
    </div>

    <br>
    <a href="index.php" style="color: #666; text-decoration: none; font-size: 0.9em;">← Create Another</a>
</div>

</body>
</html>