<?php
if(isset($_POST['uplord']))
{
  $msg = "";
  $img="";
	$i=$_POST['id'];
	$n=$_POST['pname'];
	$p=$_POST['price'];
 
  $image_name = $_FILES['image']['name'] ;
  $image_type = $_FILES['image']['type'] ;
  $image_size = $_FILES['image']['size'] ;
  $image_tem_loc = $_FILES['image']['tmp_name'] ;
  $image_store = "Image/$image_name"; ;


move_uploaded_file($image_tem_loc,$image_store);
   
      

	$con=new mysqli("localhost","root","","product_details");
	$x=$con->query("select * from product where id='$i'");
	if($x->num_rows>0)
	{
		echo "<script>alert('This Product ID is Already Exist');</script>";
	}
	else
	{
	$con->query("insert into product(id,pname,image,price) values('$i','$n','$image_name ','$p')");
  echo "<script>alert('This Product Insert Sucessfully');</script>";
	}
	$con->close();

}



?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin</title>
  <link rel="stylesheet" href="style1.css">
  
</head>

<body>
  <div class="vanner">
            <div class="navbar1">
             <img src="r11.png" class="logo"> 
            <div class="bar1">
            <a href="index.php">Home</a>
            <a href="card.php">Product</a>
            <a href="add.php">Add cart</a>
            <a href="Admin.php">Admin</a>
            <a href="loginpage1.php">Account</a>
            </div>
            </div>
  </div>
  
  <div class="table-responsive">
<form action="?" method="post" enctype="multipart/form-data">
  <h2 class="title">UPLOAD PRODUCTS</h2>
  <table class="table table-bordered">
  <tr>
  <th width="20%">
    <label for="textfield">Product ID :</label>
    <input type="number" name="id" id="id">
    </th>

    <th width="20%">
    <label for="textfield2">Product Name:</label>
    <input type="text" name="pname" id="pname">
    </th>

    <th width="15%">
    <label>Select Image File:</label>
    <input type="file"name="image">
    </th>

    <th width="20%">
    <label for="textfield4">Price:</label>
    <input type="number" name="price" id="price">
    </th>

    <th width="10%">
	  <input type="submit" name="uplord" value="Upload">
    </th>
    
    
   </tr>
   </table>
   
</form>
</div>


<?php
    session_start();
    $database_name = "Product_details";
    $con = mysqli_connect("localhost","root","",$database_name);   
    
    
?>

<div class="row" >
        
        <?php
            $query = "SELECT * FROM product ";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {

                    ?>
                    
                            <div class="col-4">
                            <form method="post" action="add.php?action=add&id=<?php echo $row["id"]; ?>">
                                <img src="<?php echo $row["image"];?>" >
                                <h3><?php echo $row["id"];?></h3>
                                <h4><?php echo $row["pname"];?></h4>
                                <p><?php echo $row["price"];?></p>
                                
                                <input type="hidden" name="hidden_id" value="<?php echo $row["id"];?>">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["pname"];?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"];?>">
                                
                            </form>    
                            </div>
                    
                    
                    <?php
                }
            }
        ?>

    </div>

</body>
</html>