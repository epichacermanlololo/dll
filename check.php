<?php
$link = mysqli_connect('host', 'user', 'pass'); //host, user, pass

$database = mysqli_select_db($link, "dlldb"); //Set here your db name

$user = $_GET['username'];
$hwid = $_GET['hwid'];

$tables = "user"; //Set here ur user table
$sql = "SELECT * FROM ". $tables ." WHERE username = '". mysqli_real_escape_string($link,$user) ."'" ;
$result = $link->query($sql);

if ($result->num_rows > 0) {
    // Outputting the rows
    while($row = $result->fetch_assoc())
    {
        
        $password = $row['password'];

        $sql_pass = $_GET['password'];
        
        function Redirect($url, $permanent = false)
        {
            if (headers_sent() === false)
            {
                header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
            }
        exit();
        }
        
        if($sql_pass !== $row['password'])
        {
            echo "0"; // pass is wrong
        }
        else
        {
            echo "1"; // pass is correct
        }
        
     
    }
}  
?>
