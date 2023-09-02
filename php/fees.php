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
    if(isset($_POST['submit'])){
       $paid = count($_POST['enrolled'])*5;
        $studentsTable=mysqli_query($con, "SELECT*FROM `students table` WHERE `student id`='".$_POST['studentId']."' ")or die('Error In Session 1'.mysqli_error($con));
       
        while($row=$studentsTable->fetch_assoc()){
            mysqli_query($con,"INSERT INTO `payments`(`student name`, `student surname`, `date`, `amount`, `number of courses`, `subjects paid for`, `student id`) 
            VALUES ('".$row['name']."','".$row['surname']."','".date('l jS F Y')."','".$_POST['amount']."','".count($_POST['enrolled'])."','".serialize($_POST['enrolled'])."','".$_POST['studentId']."')");

            //send payment notification
            $message = "Hi, Please note".$row['name']." paid".$_POST['amount']." From Sir Joze";
            $numbers = '+263'.$_POST['parents contact'];
     
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
    }


?>