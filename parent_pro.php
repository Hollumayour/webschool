<?php 

session_start();
include "connect/db.php";

if(isset($_POST['submit'])){
    $fullname =$_POST['fullname'];
    $phone =$_POST['phone'];
    $email =$_POST['email'];
    $address =$_POST['address'];
    $occupation =$_POST['occupation'];
    $religion =$_POST['religion'];
    $date = date("Y:m:d H:i:s");


    if(empty($fullname)){
        echo 'Please enter your parent name';
    }
    elseif(empty($phone)){
        echo 'please enter your phone number';
    }
    elseif(empty($email)){
        echo 'please enter your email address';
    }
    elseif(empty($address)){
        echo 'please enter your address';
    }
    elseif(empty($occupation)){
        echo 'please state your occupation';
    }
    elseif(empty($religion)){
        echo 'please state your religion';
    }
    else{
        $equery = mysqli_query($conn, "SELECT * FROM `parent` WHERE `email`='$email'" );
        $pquery = mysqli_query($conn, "SELECT * FROM `parent` WHERE `phone`='$phone'" );

        if(mysqli_num_rows($equery)>0){
            echo "Email already exists, register a new one";
        }
        elseif(mysqli_num_rows($pquery)>0){
            echo "Phone Number exists already";
        }
        else{

            $insert = mysqli_query($conn, "INSERT INTO `parent` (`fullname`, `phone`, `email`, `address`, `occupation`, `religion`, `created_at`)
            VALUES ('$fullname', '$phone', '$email', '$address', '$occupation', '$religion', '$date')");

            if(empty($insert)){
                echo 'something went wrong, please try again or contact support';
            }else{
                echo 'form submitted successfully';
                
            }
        }
    
    }
}
?>