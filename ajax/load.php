<?php
//Include database connection
include('db.php');


if($_POST['UserID']) {
    $id = $_POST['UserID']; 
    
    $query = mysqli_query($con,"select * from student where sl='$id'");
    $result = array();
    
    while($row = mysqli_fetch_assoc($query)){
        $result[0]= $row['sl'];
        $result[1]= $row['name'];
        $result[2]= $row['id'];

    }
    echo json_encode($result);
    
    
}
?>

