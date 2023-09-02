<?php
    include('../dbcon.php');
    $username = $password = $message = $numbers = "";

    // Define variables used in the URL
    $url = "https://www.winsms.co.za/api/batchmessage.asp?";
    
    $userp = "user=";
    
    $passwordp = "&password=";
    
    $messagep = "&message=";
    
    $numbersp = "&Numbers=";

    $username = 'jonathannyagato17@gmail.com';
    $password = 'LitandEpic17forever';
    /*IF LEARNER WAS PRESENT*/
    if(isset($_POST['present'])){
     mysqli_query($con,"INSERT INTO `attendance register`(`name`, `surname`, `student id`, `status`, `date`) VALUES
      ('".$_POST['name']."','".$_POST['surname']."','".$_POST['studentId']."','present','".date('l jS F Y')."')");
    }
    /* IF LEARNER WAS ABSENT*/
    if(isset($_POST['absent'])){
     mysqli_query($con,"INSERT INTO `attendance register`(`name`, `surname`, `student id`, `status`, `date`)
      VALUES ('".$_POST['name']."','".$_POST['surname']."','".$_POST['studentId']."','absent','".date('l jS F Y')."')");
      
      // Inform parent
                          // send message to student
                          $message = "Hi, Please note".$_POST['name']." was absent today. From Sir Joze";
                          $numbers = '+263'.$_POST['parentsContact'];
                   
                         $encmessage = urlencode(utf8_encode($message));
                   
                         // Combines all the variables together
                         $all = $url.$userp.$username.$passwordp.$password.$messagep.$encmessage.$numbersp.$numbers;
                   
                         //
                   
                         $fp = fopen($all, 'r');
                         while(!feof($fp)){
                         $line = fgets($fp, 4000);
                         }
                         fclose($fp);
    }

?>