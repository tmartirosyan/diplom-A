<?php 
  include "js/connection.php";

  $sql_pizza = "SELECT * FROM `pizza` ORDER BY `id`";
  $result_query_pizza = mysqli_query($connection,$sql_pizza);
  $data_pizza = mysqli_fetch_all($result_query_pizza,MYSQLI_ASSOC);

  $sql_pasta = "SELECT * FROM `pasta` ORDER BY `id`";
  $result_query_pasta = mysqli_query($connection,$sql_pasta);
  $data_pasta = mysqli_fetch_all($result_query_pasta,MYSQLI_ASSOC);

  $sql_starter = "SELECT * FROM `starter` ORDER BY `id`";
  $result_query_starter = mysqli_query($connection,$sql_starter);
  $data_starter = mysqli_fetch_all($result_query_starter,MYSQLI_ASSOC);
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
<nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
    <h3 class="w3-padding-64 card-text"><b><?php echo $name; ?></b></h3>
  </div>
  <div class="w3-bar-block">
    <a href="/diplom Anna" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a> 
    <a href="index.php#about" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">About</a>
    <a href="index.php#myMap" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Contact</a>
    <a id="pizzaHref" class="w3-bar-item w3-button w3-hover-white">Pizzas</a>
    <a id="pastasHref" class="w3-bar-item w3-button w3-hover-white">Pastas</a>
    <a id="starterHref" class="w3-bar-item w3-button w3-hover-white">Starters</a>
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">&#9776;</a>
  <span><?php echo $name; ?></span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="showcase">
    <h1 class="w3-jumbo"><b>Our Menu</b></h1>
  </div>

  <!-- Pizzas -->
  <div id="pizzaContainer" class="w3-row-padding">
    <div>
      <h1 class="w3-xxxlarge w3-text-red"><b>Pizzas</b></h1>
      <div class="w3-bottombar w3-border-red w3-section"></div>
    </div>
    <?php 
      $i = 0;
      while($i < count($data_pizza)) {
    ?>
    <div class="w3-col m4 w3-margin-bottom">
      <div class="w3-light-grey">
        <img src="<?php echo $data_pizza[$i]['image']; ?>" alt="John" style="width:100%">
        <div class="w3-container" style="padding-bottom: 10px;">
          <h3><?php echo $data_pizza[$i]['title']; ?></h3>
          <p><?php echo $data_pizza[$i]['description']; ?></p>
          <a href="order.php?category=pizza&id=<?php echo $data_pizza[$i]['id']; ?>"><button class="w3-button w3-red">Order $<?php echo $data_pizza[$i]['price']; ?></button></a>
        </div>
      </div>
    </div>
    <?php 
      $i++;}
     ?>
   </div>

<div id="pastaContainer" class="w3-container" style="margin-top:80px">
  <div>
    <h1 class="w3-xxxlarge w3-text-red"><b>Pastas</b></h1>
    <div class="w3-bottombar w3-border-red w3-section"></div>
  </div>

  <!-- Pastas -->
  <div class="w3-row-padding">
    <?php 
      $i = 0;
      while($i < count($data_pasta)) {
    ?>
    <div class="w3-col m4 w3-margin-bottom">
      <div class="w3-light-grey">
        <img src="<?php echo $data_pasta[$i]['image']; ?>" alt="John" style="width:100%">
        <div class="w3-container"  style="padding-bottom: 10px;">
          <h3><?php echo $data_pasta[$i]['title']; ?></h3>
          <p><?php echo $data_pasta[$i]['description']; ?></p>
          <a href="order.php?category=pasta&id=<?php echo $data_pasta[$i]['id']; ?>"><button class="w3-button w3-red">Order $<?php echo $data_pasta[$i]['price']; ?></button></a>
        </div>
      </div>
    </div>
    <?php 
      $i++;}
     ?>
   </div>
</div>

<div id="starterContainer" class="w3-container" style="margin-top:80px">
  <div>
    <h1 class="w3-xxxlarge w3-text-red"><b>Starter</b></h1>
    <div class="w3-bottombar w3-border-red w3-section"></div>
  </div>

  <!-- Starter -->
  <div class="w3-row-padding">
    <?php 
      $i = 0;
      while($i < count($data_starter)) {
    ?>
    <div class="w3-col m4 w3-margin-bottom">
      <div class="w3-light-grey">
        <img src="<?php echo $data_starter[$i]['image']; ?>" alt="John" style="width:100%">
        <div class="w3-container"  style="padding-bottom: 10px;">
          <h3><?php echo $data_starter[$i]['title']; ?></h3>
          <p><?php echo $data_starter[$i]['description']; ?></p>
          <a href="order.php?category=starter&id=<?php echo $data_starter[$i]['id']; ?>"><button class="w3-button w3-red">Order $<?php echo $data_starter[$i]['price']; ?></button></a>
        </div>
      </div>
    </div>
    <?php 
      $i++;}
     ?>
   </div>
</div>
<?php include "html/footer.php"; ?>
<script type="text/javascript">
  $("#pizzaHref").click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#pizzaContainer").offset().top
    }, 2000);
});
  $("#pastasHref").click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#pastaContainer").offset().top
    }, 2000);
});
  $("#starterHref").click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#starterContainer").offset().top
    }, 2000);
});
</script>
</body>
</html>