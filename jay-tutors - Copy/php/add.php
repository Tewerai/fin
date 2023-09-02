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
    if(isset($_POST['add_student'])){

        $studentId = $_POST['name'].$_POST['surname'].rand(10,1000);
        $sql = "INSERT INTO `students table`(`name`, `surname`, `student id`, `student contact num`, `parents contact`
        , `registered on`, `gender`,`parents name`,`class`,`student in session`) 
        VALUES ('".$_POST['name']."','".$_POST['surname']."','$studentId','".$_POST['student_cell']."',
        '".$_POST['parents_cell']."','".date("l jS F Y")."','".$_POST['gender']."','".$_POST['parents_name']."','".$_POST['class']."','true')";
       mysqli_query($con,$sql) or die(mysqli_error($con));

       // insert subjects that student is enrolled
       for($i=0;$i<count($_POST['enrolled']);$i++){
        if($_POST['enrolled'][$i]=='Mathematics'){
          $update = "UPDATE `students table` SET `mathematic`='enrolled' WHERE `student id`='$studentId'";
          mysqli_query($con,$update) or die(mysqli_error($con));
        } else if ($_POST['enrolled'][$i]=='Geography'){
            $update = "UPDATE `students table` SET `Geography`='enrolled' WHERE `student id`='$studentId'";
          mysqli_query($con,$update) or die(mysqli_error($con));

          } else if ($_POST['enrolled'][$i]=='History'){
            $update = "UPDATE `students table` SET `History`='enrolled' WHERE `student id`='$studentId'";
          mysqli_query($con,$update) or die(mysqli_error($con));

          } else if ($_POST['enrolled'][$i]=='Biology'){
            $update = "UPDATE `students table` SET `Biology`='enrolled' WHERE `student id`='$studentId'";
          mysqli_query($con,$update) or die(mysqli_error($con));

          } else if ($_POST['enrolled'][$i]=='Combined Science'){
            $update = "UPDATE `students table` SET `Combined Science`='enrolled' WHERE `student id`='$studentId'";
          mysqli_query($con,$update) or die(mysqli_error($con));

          } else if ($_POST['enrolled'][$i]=='Accounts'){
            $update = "UPDATE `students table` SET `Accounts`='enrolled' WHERE `student id`='$studentId'";
          mysqli_query($con,$update) or die(mysqli_error($con));

          } else if ($_POST['enrolled'][$i]=='English'){
            $update = "UPDATE `students table` SET `English`='enrolled' WHERE `student id`='$studentId'";
          mysqli_query($con,$update) or die(mysqli_error($con));

          } else if ($_POST['enrolled'][$i]=='Heritage'){
            $update = "UPDATE `students table` SET `Heritage`='enrolled' WHERE `student id`='$studentId'";
          mysqli_query($con,$update) or die(mysqli_error($con));

          } 
       }

       $paid = count($_POST['enrolled'])*5;
       /* ADD TO PAID FEES */
       $insertFees = "INSERT INTO `payments`(`student name`, `student surname`, `date`, `amount`, `number of courses`,`subjects paid for`,`student id`) 
       VALUES ('".$_POST['name']."','".$_POST['surname']."','".date('l jS F Y')."','$paid','".count($_POST['enrolled'])."','".serialize($_POST['enrolled'])."','$studentId')";
       mysqli_query($con,$insertFees) or die(mysqli_error($con));

       /* SEND SMS */
       for($i=0;$i<2;$i++){
        if($i==0){
          // send message to student
          $message = "Hi ".$_POST['name'].' your student id is :'.$studentId.'. Keep it safe as you will use it after every payment';
          $numbers = '+263'.$_POST['student_cell'];
   
         $encmessage = urlencode(utf8_encode($message));
   
         // Combines all the variables together
         $all = $url.$userp.$username.$passwordp.$password.$messagep.$encmessage.$numbersp.$numbers;
   
         //
   
         $fp = fopen($all, 'r');
         while(!feof($fp)){
         $line = fgets($fp, 4000);
         }
         fclose($fp);
        } else if($i==1){
          // send sms to parent
                    $message = "Hi,".$_POST['parents_name'].' has paid'.$paid.' for their school lessons. From Sir Joze';
                    $numbers = '+263'.$_POST['parents_cell'];
             
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

      header('Location: ../add-student.php');
    }
?>