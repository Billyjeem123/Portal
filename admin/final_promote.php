<?php
include('includes/config.php');

if($_POST['action'] == "PromoteStudent"){
    
    
   ( $idss=$_POST['id']);
    $classname=$_POST['ClassName'];
   
    $N = count($idss);
   for($i=0; $i < $N; $i++)
   {
       $sql_check  = " UPDATE tblstudents SET ClassId='$classname[$i]'  WHERE StudentId='$idss[$i]' " ;
       $query = $dbh->prepare($sql_check);
       if($query->execute()){
           
           echo "Student Promoted";
       }else{

           echo "Error While Processing";
           

       }
    
}
}

if($_POST['action'] == "AssignTeacher"){


    ( $idss=$_POST['id']);
    $classname=$_POST['ClassName'];
   
    $N = count($idss);
   for($i=0; $i < $N; $i++)
   {
    $sql_check  = "UPDATE tblteacher SET ClassId='$classname[$i]'  WHERE teacher_id='$idss[$i]'";
	$query = $dbh->prepare($sql_check);
	if($query->execute()){
           
           echo "Done";
       }else{

           echo "Error While Processing";
           

       }


    }
}