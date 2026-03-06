<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Profile Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {

            /*I guess we're doing my favorite style. The Windows 7 Aero (PS: I used the Lec Activity as References on my design) */

            background: linear-gradient(135deg, #1e5799 0%, #2989d8 50%, #207cca 51%, #7db9e8 100%);
            background-attachment: fixed;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 40px 15px;
        }
        
        /* Windows 7 Aero style  */
        .aero-container {
            background: rgba(255, 255, 255, 0.4);
            padding: 30px;
            border-radius: 8px;
            width: 100%;
            max-width: 550px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5), inset 0 0 20px rgba(255, 255, 255, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(4px);
        }

        .aero-container h2 { 
            color: #111; 
            text-shadow: 0 0 5px rgba(255, 255, 255, 0.8), 1px 1px 1px #fff; 
            font-weight: 600;
        }

        .form-label {
            color: #222;
            font-weight: 600;
            text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.7);
        }
        
        /* Inset Inputs */
        .form-control {
            background: rgba(255, 255, 255, 0.85);
            border: 1px solid #999;
            border-radius: 4px;
            box-shadow: inset 2px 2px 5px rgba(0,0,0,0.15);
            color: #000;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 1);
            border-color: #3399ff;
            box-shadow: 0 0 6px rgba(51, 153, 255, 0.6), inset 1px 1px 3px rgba(0,0,0,0.1);
        }
        
        /* Glossy Buttons */
        .btn-aero {
            background: linear-gradient(to bottom, #f2f6f8 0%, #d8e1e7 50%, #b5c6d0 51%, #e0eff9 100%);
            border: 1px solid #708090;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.4), inset 0 1px 1px rgba(255,255,255,1);
            color: #333;
            font-weight: bold;
            padding: 12px;
            text-shadow: 1px 1px 0px rgba(255,255,255,0.8);
            width: 100%;
            transition: 0.1s;
        }

        .btn-aero:hover {
            background: linear-gradient(to bottom, #f9fcfe 0%, #e6f0f5 50%, #cce0eb 51%, #f0f7fb 100%);
            border-color: #5c6a77;
        }

        .btn-aero:active {
            background: linear-gradient(to bottom, #b5c6d0 0%, #d8e1e7 50%, #e0eff9 100%);
            box-shadow: inset 0 2px 5px rgba(0,0,0,0.4);
            transform: translateY(1px);
        }
    </style>
</head>
<body>

<div class="aero-container">
    <h2 class="text-center mb-4">Create Your Profile</h2>
    <form action="profile.php" method="POST" enctype="multipart/form-data"> 
        
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control" name="full_name" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Age</label>
            <input type="number" class="form-control" name="age" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Course / Program</label>
            <input type="text" class="form-control" name="course" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <div class="mb-3">
            <label class="form-label d-block">Gender</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="Male" id="genderMale" required>
                <label class="form-check-label" for="genderMale">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="Female" id="genderFemale">
                <label class="form-check-label" for="genderFemale">Female</label>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label d-block">Hobbies (Select at least 5)</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="hobbies[]" value="Reading" id="hob1">
                <label class="form-check-label" for="hob1">Reading</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="hobbies[]" value="Gaming" id="hob2">
                <label class="form-check-label" for="hob2">Gaming</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="hobbies[]" value="Sports" id="hob3">
                <label class="form-check-label" for="hob3">Sports</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="hobbies[]" value="Music" id="hob4">
                <label class="form-check-label" for="hob4">Music</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="hobbies[]" value="Traveling" id="hob5">
                <label class="form-check-label" for="hob5">Traveling</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="hobbies[]" value="Coding" id="hob6">
                <label class="form-check-label" for="hob6">Coding</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="hobbies[]" value="Audiophile" id="hob7">
                <label class="form-check-label" for="hob7">Audiophile</label>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Short Biography</label>
            <textarea class="form-control" name="bio" rows="4"></textarea>
        </div>

        <div class="mb-4">
            <label class="form-label">Profile Image</label>
            <input type="file" class="form-control" name="profile_pic" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-aero">GENERATE PROFILE</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>