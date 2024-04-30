<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $num = $_POST['num'];
    $email = $_POST['email'];
    $age = $_POST['age'];
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
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            width: 100vw;
            height: 100vh;
            overflow-x: hidden;
            background: linear-gradient(to bottom right,#d238a4, #4c25b0);
        }
        input{
            border: none;
            border-bottom: 1px solid whitesmoke;
            color: whitesmoke;
            background-color: #27262d;
            width: 100%;
            margin: 5%;
        }
        
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-xl navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="../pages/contact.html">Contact Manager</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDark" aria-controls="navbarDark" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse show" id="navbarDark">
            <ul class="navbar-nav me-auto mb-2 mb-xl-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../pages/dashboard.html">Dashboard</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    
     <div style="width: 40vw; background-color: #27262d; border-radius: 20px;margin: 18vh 10vw; padding: 20px; align-items: center;">
        <form method="post">
            <div style="width: 100%;display: flex; flex-direction: column; width: 20vw; margin-left: 20%;">
                <input type="text" name="fname" placeholder="First Name">
            <input type="text" name="lname" placeholder="Last Name">
            <input type="number" name="num" placeholder="Mobile Number">
            <input type="email" name="email" placeholder="Email ID">
            <input type="number" name="age" placeholder="Age">
            </div>
            <div style="display: flex; justify-content: space-evenly; align-items: center; margin-top: 10%;"> 
            <button type="submit" onClick="find()" class="btn btn-success">Add Contact</button>
            <button type="reset" class="btn btn-danger">Clear</button>
            </div>
        </form>
      </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>