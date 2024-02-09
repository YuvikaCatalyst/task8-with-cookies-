<?php
$cookie_name="username";
$cookie_value="";
setcookie($cookie_name,$cookie_value,time()+(86400*50),"/");
include('database1.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];  
    $password = $_POST['password'];  

    $sql = "SELECT firstname, middlename, lastname, passwords FROM formuser";
    $result = mysqli_query($conn, $sql);

    $user_found = 0;

    if(mysqli_num_rows($result)>0){
    while ($row = mysqli_fetch_assoc($result)) {
       
        $expected_username = $row['firstname'] . $row['middlename'] . $row['lastname'];
       
        if ($username == $expected_username && $password == $row['passwords']) {
          $cookie_value="set";
            $user_found = 1;  
        }
    }

    print_r($user_found);
}
}
?>