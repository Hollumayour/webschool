<?php 

session_start();
include "connect/db.php";

if(isset($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $nationality = $_POST['nationality'];
    $homeaddress = $_POST['homeaddress'];
    $religion = $_POST['religion'];
    $date = date("Y:m:d H:i:s");


    if(empty($firstname)){
        echo 'Please enter your first name';
    }
    elseif(empty($middlename)){
        echo 'please enter your middle name';
    }
    elseif(empty($surname)){
        echo 'please enter your surname';
    }
    elseif(empty($email)){
        echo 'please enter your email';
    }
    elseif(empty($phone)){
        echo 'please enter your phone number';
    }
    elseif(empty($dob)){
        echo 'please input your dob';
    }
    elseif(empty($nationality)){
        echo 'please enter your nationality';
    }
    elseif(empty($homeaddress)){
        echo 'please enter your home address';
    }
    elseif(empty($religion)){
        echo 'please input your religion';
    }
    else{
        $equery = mysqli_query($conn, "SELECT * FROM `web` WHERE `email`='$email'" );
        $pquery = mysqli_query($conn, "SELECT * FROM `web` WHERE `phone`='$phone'" );
    
        if(mysqli_num_rows($equery)>0){
        echo "Email already exists, register with another one";
        }
        elseif(mysqli_num_rows($pquery)>0){
        echo "Phone Number exists, register with new one";
        }
        else{

            $insert = mysqli_query($conn, "INSERT INTO `web` (`firstname`, `middlename`, `surname`, `email`, `phone`, `gender`, `dob`, `nationality`, `homeaddress`, `religion`, `created_at`)
            VALUES ('$firstname', '$middlename', '$surname', '$email', '$phone', '$gender', '$dob', '$nationality', '$homeaddress', '$religion', '$date')");
        }

    }

}


?>

<?php  include 'include/nav.php' ?>

<title>Admission</title>

<section id="admission_header">
<div class="overlay"></div>
<div class="content">
    <h1>Admission</h1>
    <p>To Register, Kindly Fill the Admission Form below <a href="#admissions" target="_blank">click here...</a></p>
</div>
</section>

<section id="admissions">
    <h1>Admission Form</h1>
    <div class="container">
        <div class="col1">
            <h4>Student Personal Info</h4>
            <form action="" method="post">
                <label for="">Firstname</label> <br>
                <input type="text" name="firstname"><br>
                <label for="">Middlename</label><br>
                <input type="text" name="middlename"> <br>
                <label for="">Surname</label><br>
                <input type="text" name="surname"><br>
                <label for="">Email</label><br>
                <input type="text" name="email"> <br>
                <label for="">Phone Number</label><br>
                <input type="phone" name="phone"><br>
                <label for="">Gender</label> <br>
                <input type="radio" name="gender" value="Male" id=""><br>
                <label for="">Male</label><br>
                <input type="radio" name="gender" value="Female" id=""> <br>
                <label for="">Female</label> <br> <br><br>
                <label for="">DOB</label><br>
                <input type="date" name="dob"><br>
                <label for="">Nationality</label><br>
                <input type="text" name="nationality"><br>
                <label for="">Home Address</label><br>
                <input type="text" name="homeaddress"><br>
                <label for="">Religion</label><br>
                <input type="text" name="religion"><br>
                <label for="">Upload Passport</label><br>
                <input type="file"> <br><br><br>

                <button type="submit" name="submit">Submit</button>
            </form>
        </div>

        <div class="col2">
            <h4>Parent / Guardian Info</h4>
            <form action="parent_pro.php" method="post">
                <label for="">Full Name</label><br>
                <input type="text" name="fullname"><br>
                <label for="">Phone Number</label><br>
                <input type="tel" name="phone"><br>
                <label for="">Email</label><br>
                <input type="text" name="email"><br>
                <label for="">Home Address</label><br>
                <input type="text" name="address"><br>
                <label for="">Occupation</label><br>
                <input type="text" name="occupation"><br>
                <label for="">Religion</label><br>
                <input type="text" name="religion"><br><br><br><br><br><br><br>

                <button type="submit" name="submit">Submit</button>
            </form>
        </div>

    </div>
</section>



<?php include 'include/footer.php'  ?>