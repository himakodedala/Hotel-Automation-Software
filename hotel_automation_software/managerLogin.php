<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Login</title>
    <script>
    window.onload = function() {
      setTimeout(function() {
        document.getElementById("myParagraph").style.display = "none";
      }, 1000); // 1000 milliseconds = 1 seconds
    };
  </script>
</head>

<body>
    <?php
    include 'managerACcreateDatabase.php';
    $mail = $_GET["email"];
    $password = $_GET["password"];
    
    $query="select *  from  manager   where Email='".$mail."'AND Password='".$password."'limit 1 ";

    $result=mysqli_query($connection,$query);

    $row=mysqli_fetch_assoc($result);
    $login = false;
    if(mysqli_num_rows($result)==1){
       ?><p  id="myParagraph"style="color: green; padding-left: 500px;"> "you have successfully logged in"</p>    <?php    
       $login = true;
       
    }
    else{
      ?>  <p id="myParagraph" style="color: red; padding-left: 500px;"> "you entered incorrect password or mail"</p> <?php
      $login = false;
    }

   
    ?>
    <?php
        if($login){
            header("Location: ManagergivingInput.html");
            exit;
        }else{
            header("Location: managerLogin.html");
            exit;
        }
    ?>
</body>

</html>

