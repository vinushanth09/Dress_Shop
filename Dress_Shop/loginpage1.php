<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="createAccount.css">
    
  </head>
  <body>
    <?php
    if(isset($_POST['reg']))
    {
      $u=$_POST['email'];
      $p=$_POST['psw'];
      $con=new mysqli("localhost","root","","checking");
      $x=$con->query("select * from users where username='$u'");
      if($x->num_rows>0)
      {
        echo "<script>alert('Already Exist');</script>";
      }
      else
      {
      $con->query("insert into users(username,password) values('$u','$p')");
      }
      $con->close();
    }
    if(isset($_POST['log']))
    {
      $u=$_POST['user'];
      $p=$_POST['psw'];
      $con=new mysqli("localhost","root","","checking");
      $result=$con->query("select * from users where username='$u'");
      if($result->num_rows>0)
      {
        $row=$result->fetch_assoc();
        if($row['password']=$p)
        {
          header("location:index.php");
        }
        else
        {
          echo "<script>alert('wrong password');</script>";
          
        }
      }
      
      
    }
    ?>

<div class="login-box">
  <h1>Create Account</h1>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    
  
  <div class="textbox">
  <input type="text" placeholder="Name" name="user"/>
  </div>

  <div class="textbox">
  <input type="email" placeholder="Email" name="email"/>
  </div>
  <div class="textbox">
  <input type="password" placeholder="Password" name="psw"/>
  </div>
  
  <input type="submit" name="reg" value="Sign up" class="btn btn-primary">
  
</form>
 

  <h1>Log in</h1>
  <form method="post" action=""<?php echo $_SERVER['PHP_SELF'];?>">
    
  
  <div class="textbox">
  <input type="email" placeholder="Email" name="user"/>
  </div>

  <div class="textbox">
  <input type="password" placeholder="Password" name="psw"/>
  </div>
  <input type="submit" name="log" value="Sign In"  class="btn btn-primary">
</form>
</div>


</div>

        

  </body>
</html>
