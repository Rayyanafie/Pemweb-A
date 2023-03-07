<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="PernekalanStyle.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $Nama = "Rayya Ruwa'im Nafie";
    $TTL = '04-05-2003';
    $Alamat = "Griya Kebraon";
    $Status = "Undergraduate Student";
    $Hobby = "Listening Music";
    $NPM = "21081010119";
    $Linkedin = "linkedin.com/in/Rayyanafie";
    $Gmail = "rayyanafie@gmail.com";
    $About ="My name is Rayya Ruwa'im Nafie and im an undergraduate student of informatics engineering at UPN \"Veteran\" Jawa timur. 
    i'm interested in learning about cybersecurity";
    $Skill1 = "C";
    $Skill2 ="MySql";
    $Univ = "Undergraduate Of informatics At UPN \"Veteran\" Jawa Timur";
    $Certification = "Fundamental Of Cybersecurity";
    $institution = "Course Net 2023";
    $SMA = "SMAN 15 Surabaya";
    $dob = new DateTime($TTL);
    $now = new DateTime();
    $difference = $now->diff($dob);
    ?>
    <div class="grid-container">
        <div class="item1"><img src="Picture/Formal-removebg-preview.png" height="200" width="200"></div>
        <div class="Information">
            <h2>Information</h2>
                <?php 
                echo "<ul>";
                echo "<li>NPM:$NPM</li>";
                echo "<li>Age:$difference->y Years</li>";
                echo "<li>Address:$Alamat</li>";
                echo "<li>Status:$Status</li>";
                echo "<li>Hobby:$Hobby</li>";
                echo "</ul>";
                ?>
        </div>
        <div class="Tittle">
            <b><?php echo $Nama?></b> <br>
            <b><?php echo $Status?></b>   
            <div class="Social">
                <img src="Picture/linkedin.png" alt="" height="20px" width="20px">
                <p><?php echo $Linkedin ?></p>
                <img src="Picture/Gmail.png" alt=""height="20px" width="20px">
                <p><?php echo $Gmail?></p> 
            </div>
        </div>  
        <div class="Introduction">
            <h2>
            Introduction 
            </h2>
        <p><p><?php echo $About?></p></p></div>
        <div class="Skill">
            <h3>Relevant Skill</h3>
            <?php 
                echo "<ul>";
                    echo  "<li>$Skill1</li>";
                    echo  "<li>$Skill2</li>";
                echo "</ul>";
            ?>
        </div>
        <div class="Education">
            <h2>Education History</h2>
            <div class="Education_badge">
                <img src="Picture/education.png" alt="" height="30px"width = 30px>
                <b><p><?php echo $SMA ?></p></b>
                <img src="Picture/education.png" alt="" height="30px"width = 30px>  
                <b><p><?php echo $Univ ?></p></b>
            </div>
                    <div >
                        
                    </div>
        </div>
        <div class="Certification">
            <h2>Certifications</h2>
            <div class="Certification_badge">
                <img src="Picture/badge.png" alt=""height="30px"width = 30px>
                <b><?php echo $Certification ?></b> 
                <p><?php echo $institution ?></p>
            </div>           
        </div>
</body>
</html>