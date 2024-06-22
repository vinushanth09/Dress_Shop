<?php
    session_start();
    $database_name = "Product_details";
    $con = mysqli_connect("localhost","root","",$database_name);   
    
    
?>

<html>
    <head>
        <title>collection</title>
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
        
            <h2 class="title">New products</h2>
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
                                <h4><?php echo $row["pname"];?></h4>
                                <p><?php echo $row["price"];?></p>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["pname"];?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"];?>">
                                
                                <input type="submit" name="add"  class="button" value="Add to Cart">
                            </form>    
                            </div>
                    
                    
                    <?php
                }
            }
        ?>

    </div>

    
    

    <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col-1">
                    <h3>FOLLOW US</h3>
                    <p>FACEBOOK</p>
                    <p>TWITTER</p>
                    <p>YOUTUBE</p>
                    <p>INSTAGRAM</p>
                </div>
                    
                <div class="footer-col-2">
                        <h3>ABOUT</h3>
                        <p>STORIES</p>
                        <p>COMMUNITY</p>
                        <p>BLOG</p>
                        <p>BRAND ASSETS</p>
                </div>

                                 
                </div>

            </div>

        </div> 
</body>
</html>
