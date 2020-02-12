<?php


if(isset($_POST['question_two'])){
    $to = "eric@weinsure4you.com,info@weinsure4you.com "; // this is your Email address
    $from = $_POST['question_two']; // this is the sender's Email address
    $name = $_POST['question_one'];
    $email = $_POST['question_two'];
    $phone = $_POST['question_three'];
    $comments = $_POST['question_four'];
    $subject = "New Footer Form submission";
    $message = "Name: " . $name ."
                                Email:". $email."
                                Phone:". $phone."
                                Comments: ".$comments;

    $headers = "From:" . $from;
    mail($to,$subject,$message,$headers);
    header('Location: http://www.weinsure4you.com');
    }
?>
