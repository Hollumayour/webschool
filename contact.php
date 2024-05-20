<?php 

session_start();
include "connect/db.php";

if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $number = $_POST['number'];
    $mail = $_POST['mail'];
    $message = $_POST['message'];
    $date = date("Y:m:d H:i:s");


    if(empty($fname)){
        echo 'please enter your name';
    }
    elseif(empty($number)){
        echo 'please input your number';
    }
    elseif(empty($mail)){
        echo 'please enter your email';
    }
    elseif(empty($message)){
        echo 'please leave a message';
    }
    else{

        $insert = mysqli_query($conn, "INSERT INTO `contact`(`fname`, `number`, `mail`, `message`, `created_at`)
        VALUES ('$fname', '$number', '$mail', '$message', '$date')");

        if(empty($insert)){
            echo 'Something went wrong';
        }else{
            echo 'Message submitted successfully';
        }
    }
}

?>


<?php include 'include/nav.php' ?>

<title>Contact</title>

<section id="contact_header">
    <div class="overlay">
        <div class="content">
            <h2>GET IN TOUCH</h2>
            <h1>CONTACT US</h1>
        </div>
    </div>
</section>

<section id="contact_info">
    <div class="container">
        <div class="info1">
            <h3>Leave a Message</h3>
            <form action="" method="post">
                <label for="">Fullname</label> <br>
                <input type="text" name="fname"><br>
                <label for="">Phone Number</label> <br>
                <input type="tel" name="number"><br>
                <label for="">Email</label><br>
                <input type="text" name="mail"><br>
                <label for="">Your Message</label> <br>
                <textarea name="message" id="" cols="30" rows="10"></textarea><br><br>
                <button type="submit" name="submit">Send Message</button>

            </form>
        </div>

        <div class="info2">
            <h2>Contact Us</h2> 
            <h4>Principal</h4>      
            <p>08147261648</p>
            <h4>Vice Principal</h4>
            <p>07069243489</p>
            <h4>Head Of Staffs</h4>
            <p>09033677883</p>
        </div>
    </div>
</section>

<section id="map">
    <div class="class">
    <div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=25,%20college%20road%20street,%20odiolowo%20area,%20osogbo+(Hollumayour)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/">gps tracker sport</a></iframe></div>
    </div>
</section>

<?php include 'include/footer.php' ?>