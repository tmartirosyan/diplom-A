<?php 
  include "js/connection.php";
  $id = $_GET['id'];
  $sql = "SELECT * FROM `".$_GET['category']."` WHERE `id` = '$id'";
  $result = mysqli_query($connection,$sql);
  $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
  session_start();
  $_SESSION['logged_in'] = false;
 ?>
<!DOCTYPE html>
<html lang="en">
<title>W3.CSS Template</title>
<?php 
  include "html/imports.php";
  include "html/functional.php";
?>
<style>
  body {
    font-size:16px;
  }
  body,h1,h2,h3,h4,h5 {
    font-family: "Poppins", sans-serif;
  }
</style>
<body>

<!-- Sidebar/menu -->
<?php 
  include "html/navigation_menu.php";
 ?>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">&#9776;</a>
  <span class="card-text"><?php echo $name; ?></span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="showcase">
    <h4 class="w3-jumbo order-title"><b>You want to order <?php echo $data[0]['title']; ?></b></h4>
  </div>

  <!-- Pizzas -->
  <div id="pizzaContainer" class="w3-row-padding">
    <div class="wraped" style="display: flex;">
      <div>
        <div class="w3-bottombar w3-border-red w3-section"></div>
      </div>
      <div class="w3-col m5 s7 w3-margin-bottom card-order">
        <div class="w3-light-grey">
          <img src="<?php echo $data[0]['image']; ?>" alt="John" style="width:100%">
          <div class="w3-container card-text" style="padding-bottom: 10px;">
            <h3><?php echo $data[0]['title']; ?></h3>
            <p><?php echo $data[0]['description']; ?></p>
            <p class="w3-red" style="text-align: center;padding: 7px 0;">Order $<?php echo $data[0]['price']; ?></p>
            <!-- <a href="order.php?<?php echo $data[0]['id']; ?>"><button class="w3-button w3-red">Order $<?php echo $data[0]['price']; ?></button></a> --> 
          </div>
        </div>
      </div>
      <form class="w3-container w3-card-4 card-text" action="orderAction.php?category=<?php echo $_GET['category']; ?>" method="post" style="width: 100%;margin-left: 20px;">
        <br>
        <p>      
        <input type="text" name="id" value="<?php echo $data[0]['id']; ?>" style="display: none;">
        <label class="w3-text-grey">Name</label>
        <input name="name" class="w3-input w3-border" type="text" required="" placeholder="Arman">
        </p>
        <p>      
        <label class="w3-text-grey">Surname</label>
        <input name="surname" class="w3-input w3-border" type="text" required="" placeholder="Armayan">
        </p>
        <p>      
        <label class="w3-text-grey">Address</label>
        <input name="address" class="w3-input w3-border" type="text" required="" placeholder="Erevan Daxax Doni 23/14">
        </p>
        <p>      
        <label class="w3-text-grey">Tel Number</label>
        <input name="telnumber" class="w3-input w3-border" type="number" required="" placeholder="055 555 555">
        </p>
        <br>
          <p><button name="order" type="submit" class="w3-btn w3-padding w3-teal" style="width:120px">Send &nbsp;❯</button></p>
        </form>
      </div>    
   </div>
</div>
<?php include "html/footer.php"; ?>
</body>
</html>