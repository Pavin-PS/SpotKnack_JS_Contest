<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
    $fname = $_POST['finame'];
    $lname = $_POST['liname'];
    $num = $_POST['inum'];
    $email = $_POST['iemail'];
    $age = $_POST['iage'];
    $data = array(
        'fname'=> $fname,
        'lname'=> $lname,
        'Mobile' => $num,
        'Email'=> $email,
        'age'=> $age
    );

    $jsonFilePath = 'data.json';

    if(file_exists($jsonFilePath)){
        $existingData = json_decode(file_get_contents($jsonFilePath), true);

        $existingData[] = $data;
    }else{
        $existingData = array($data);
    }
    $jsonData = json_encode($existingData, JSON_PRETTY_PRINT);
    file_put_contents($jsonFilePath, $jsonData);
    header("Location: ./contact.html");
    exit; 
}
?>
