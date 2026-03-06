<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receive Form Data

    $name = htmlspecialchars($_POST['full_name']);
    $age = htmlspecialchars($_POST['age']);
    $course = htmlspecialchars($_POST['course']);
    $email = htmlspecialchars($_POST['email']);
    $gender = $_POST['gender'];
    $hobbies = isset($_POST['hobbies']) ? $_POST['hobbies'] : [];
    $bio = htmlspecialchars($_POST['bio']);

    // image upload logic

    $target_dir = "uploads/";
    if (!file_exists($target_dir)) { 
        mkdir($target_dir, 0777, true); 
    }

    $file_name = basename($_FILES["profile_pic"]["name"]);
    $target_file = $target_dir . time() . "_" . $file_name;
    
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Aero View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {


            /* Okay, balik napud tag Windows 7 Aero style. Favorite jud nako ang UI sa Windows 7 */
            background: linear-gradient(135deg, #1e5799 0%, #2989d8 50%, #207cca 51%, #7db9e8 100%);
            background-attachment: fixed;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        
        /* aero glass card */

        .aero-card {
            background: rgba(255, 255, 255, 0.35);
            padding: 40px;
            border-radius: 12px;
            width: 100%;
            max-width: 500px;
            text-align: center;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.4), inset 0 0 25px rgba(255, 255, 255, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        /* pfp with glossy border */

        .profile-img {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
            margin-bottom: 20px;
        }

        h1 {
            color: #000;
            text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.9);
            font-weight: bold;
        }

        /* Glass Inset Info Bits */

        .info-bit {
            background: rgba(255, 255, 255, 0.5);
            margin: 12px 0;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: inset 1px 1px 4px rgba(0,0,0,0.1);
            color: #111;
            font-size: 1.05rem;
        }

        .bio-box {
            background: rgba(0, 0, 0, 0.05);
            font-style: italic;
            margin-top: 25px;
            padding: 15px;
            border-radius: 4px;
            border-left: 5px solid rgba(255, 255, 255, 0.8);
            text-align: left;
            color: #222;
        }

        .btn-aero-back {  /* mao ni ang back button nako */
            margin-top: 30px;
            background: linear-gradient(to bottom, #f2f6f8 0%, #d8e1e7 50%, #b5c6d0 51%, #e0eff9 100%);
            border: 1px solid #708090;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.4), inset 0 1px 1px rgba(255,255,255,1);
            color: #333;
            font-weight: bold;
            padding: 12px 25px;
            text-shadow: 1px 1px 0px rgba(255,255,255,0.8);
            width: 100%;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-aero-back:hover {
            background: linear-gradient(to bottom, #f9fcfe 0%, #e6f0f5 50%, #cce0eb 51%, #f0f7fb 100%);
            color: #000;
            box-shadow: 0 2px 5px rgba(0,0,0,0.5), inset 0 1px 1px rgba(255,255,255,1);
        }
    </style>
</head>
<body>

<div class="aero-card">
    <img src="<?php echo $target_file; ?>" class="profile-img" alt="User Profile Picture">
    
    <h1><?php echo $name; ?></h1>
    <p class="text-dark"><strong><?php echo $gender; ?> • <?php echo $age; ?> Years Old</strong></p>
    
    <div class="info-bit"><strong>Email:</strong> <?php echo $email; ?></div>
    <div class="info-bit"><strong>Program:</strong> <?php echo $course; ?></div>
    
    <div class="info-bit">
        <strong>Hobbies:</strong> <?php echo !empty($hobbies) ? implode(", ", $hobbies) : "None selected"; ?>
    </div>

    <?php if(!empty($bio)): ?>
    <div class="bio-box">
        "<?php echo nl2br($bio); ?>"
    </div>
    <?php endif; ?>

    <a href="index.php" class="btn-aero-back">← CREATE ANOTHER PROFILE</a>  // mao ni ang back button na nalink sa ".btn-aero-back"
</div>

</body>
</html>