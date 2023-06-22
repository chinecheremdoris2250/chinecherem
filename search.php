
<?php 


$host = "localhost";
$user = "root";
$password = "";
$db = "tracking-system";

// if(isset($_POST['search'])){
//     $search = $mysqli -> real_escape_string($search);

//     $query = "SELECT username FROM user WHERE username LIKE '%".$search."%'";
//     $result= $mysqli -> query($query);
    
//     while($row = $result -> fetch_object()){
//         echo "<div id='link' onClick='addText(\"".$row -> username."\");'>" . $row -> username . "</div>";  
//     }    
// }else{
//     echo "<script> alert('Not found')</script>";
// }
$output='';
if(isset($_POST['search'])){

    $searchq=$_POST['search'];
    $searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
    $query->query("SELECT * FROM user WHERE username LIKE '%$searchq%' OR reg_no LIKE '%$searchq%'") or die("could not search!");
    $count= mysqli_num_rows($query);

    if($count==0){
        // $output='nothing to find';
        echo $output="<script> alert('Not found')</script>";
    }else{
while($row=mysqli_fetch_array($query)){
    $user=$row['username'];
    $reg_no=$row['reg_no'];
    $password=$row['password'];

    $output .='<div> '.$user.' '.$reg_no.'</div>';
}
    }
}

?>