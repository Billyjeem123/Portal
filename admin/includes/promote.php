
<?php include 'config.php'; ?>
<?php
$output =  "";
if (!empty($_POST["ClassName"] && $_POST['action'] == "fetch")) {
    $grade_st_data = $_POST['ClassName'];
    $sql = " SELECT * FROM  tblclasses  join tblstudents on tblclasses.id = tblstudents.ClassId  where id = '$grade_st_data' ";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    // $data = array();
    if ($query->rowCount() > 0) {
    foreach ($results as $result) {
        $id = $result->StudentId;
        $output .= '
        
        <tr>
        <td><input type="checkbox"     data-emp-id='. $result->StudentId .'  value='. $result->StudentId .'  class="emp_checkbox"  readonly></td>
        <input type="text" name="StudentId"    data-emp-id=' . $result->StudentId  . '  value='. $result->StudentId .' style="border:67px" readonly>
        <td> <p> ' . $result->StudentName . '   </p> </td>
        <td> <p> ' . $result->ClassName . '   </p> </td>
      
        ';
            }

            $output .= '</tr>';
            echo ($output);
            
        }else{

            echo "<h4 class='text-center'>No data available</h4>";
        }

    }



?>
