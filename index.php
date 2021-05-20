<?php 
  include "js/connection.php";
  include "html/functional.php";
  
  $sql_pizza = "SELECT * FROM `pizza` ORDER BY `id` DESC LIMIT 0 , 5";
  $result_query_pizza = mysqli_query($connection,$sql_pizza);
  $data_pizza = mysqli_fetch_all($result_query_pizza,MYSQLI_ASSOC);

  $sql_pasta = "SELECT * FROM `pasta` ORDER BY `id` DESC LIMIT 0 , 5";
  $result_query_pasta = mysqli_query($connection,$sql_pasta);
  $data_pasta = mysqli_fetch_all($result_query_pasta,MYSQLI_ASSOC);

  $sql_starter = "SELECT * FROM `starter` ORDER BY `id` DESC LIMIT 0 , 5";
  $result_query_starter = mysqli_query($connection,$sql_starter);
  $data_starter = mysqli_fetch_all($result_query_starter,MYSQLI_ASSOC);
  session_start();
  $_SESSION['logged_in'] = false;
?>

<!DOCTYPE html>
<html lang="en">
<title><?php echo $name; ?></title>
<?php 
  include "html/imports.php"; 
  include "html/functional.php";
?>
<style>
  body, html {height: 100%}
  body,h1,h2,h3,h4,h5,h6 {font-family: "Amatic SC", sans-serif;}
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top ">
  <div class="w3-bar w3-xlarge w3-black w3-opacity w3-hover-opacity-off" id="myNavbar">
    <a href="#" class="w3-bar-item w3-button">HOME</a>
    <a href="menu.php" class="w3-bar-item w3-button">MENU</a>
    <a id="aboutSection" class="w3-bar-item w3-button">ABOUT</a>
    <a id="contactSection" class="w3-bar-item w3-button">CONTACT</a>
  </div>
</div>
  
<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-bottomleft w3-padding">
    <span class="w3-tag w3-xlarge">Open from 10am to 12pm</span>
  </div>
  <div class="w3-display-middle w3-center">
    <span class="w3-text-white w3-hide-small" style="font-size:100px"><?php echo $name; ?></span>
    <span class="w3-text-white w3-hide-large w3-hide-medium" style="font-size:60px"><?php echo $name; ?></span>
    <p><a id="menuViewButton" class="w3-button w3-xxlarge w3-black">Let me see the menu</a></p>
  </div>
</header>

<!-- Menu Container -->
<div class="w3-container w3-black w3-padding-64 w3-xxlarge" id="menu">
  <div class="w3-content" id="menu">
  
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">THE MENU</h1>
    <div class="w3-row w3-center w3-border w3-border-dark-grey">
      <a href="javascript:void(0)" onclick="openMenu(event, 'Pizza');" id="myLink">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Pizza</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'Pasta');">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Salads</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'Starter');">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Starter</div>
      </a>
    </div>

    <div id="Pizza" class="w3-container menu w3-padding-32 w3-white">
      <?php 
        $i = 0;
        while($i < count($data_pizza)) {
      ?>  
      <h1>
        <b><?php echo $data_pizza[$i]['title']; ?></b> 
        <span class="w3-tag w3-<?php if ($data_pizza[$i]['legend']=='HOT!' || $data_pizza[$i]['legend']=='NEW!') {echo 'red';} else {echo 'grey';} ?> w3-round"><?php echo $data_pizza[$i]['legend'] ?></span>
        <span class="w3-right w3-tag w3-dark-grey w3-round"><?php echo "$".$data_pizza[$i]['price']; ?></span>
      </h1>
      <p class="w3-text-grey"><?php echo $data_pizza[$i]['description']; ?></p>
      <hr>
      <?php $i++;} ?>
    </div>

    <div id="Pasta" class="w3-container menu w3-padding-32 w3-white">
      <?php 
        $i = 0;
        while ($i < count($data_pasta)) {
      ?>
      <h1>
        <b><?php echo $data_pasta[$i]['title']; ?></b> 
        <span class="w3-tag w3-<?php if ($data_pasta[$i]['legend'] == 'HOT!' || $data_pasta[$i]['legend'] == 'NEW!') {echo 'red';} else {echo 'grey';} ?> w3-round"><?php echo $data_pasta[$i]['legend']; ?></span> 
        <span class="w3-right w3-tag w3-dark-grey w3-round"><?php echo "$".$data_pasta[$i]['price']; ?></span>
      </h1>
      <p class="w3-text-grey"><?php echo $data_pasta[$i]['description']; ?></p>
      <?php $i++;} ?>
    </div>


    <div id="Starter" class="w3-container menu w3-padding-32 w3-white">   
      <?php 
        $i = 0;
        while($i < count($data_starter)) {
       ?>
      <h1>
        <b><?php echo $data_starter[$i]['title']; ?></b>
        <span class="w3-tag w3-<?php if ($data_starter[$i]['legend'] == 'HOT!' || $data_starter[$i]['legend'] == 'NEW!') {echo 'red';} else {echo 'grey';} ?> w3-round"><?php echo $data_starter[$i]['legend']; ?></span>
        <span class="w3-right w3-tag w3-dark-grey w3-round"><?php echo "$".$data_starter[$i]['price']; ?></span>
      </h1>
      <p class="w3-text-grey"><?php echo $data_starter[$i]['description']; ?></p>
      <hr>
      <?php 
        $i++;}
      ?>
    </div><br>

  </div>
</div>

<!-- About Container -->
<div class="w3-container w3-padding-64 w3-red w3-grayscale w3-xlarge parallax" id="about">
  <div class="w3-content">
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">About</h1>
    <p>The Pizza Restaurant was founded in blabla by Mr. Italiano in lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    <h1><b>Opening Hours</b></h1>
    
    <div class="w3-row">
      <div class="w3-col s6">
        <p>Mon & Tue CLOSED</p>
        <p>Wednesday 10.00 - 24.00</p>
        <p>Thursday 10:00 - 24:00</p>
      </div>
      <div class="w3-col s6">
        <p>Friday 10:00 - 12:00</p>
        <p>Saturday 10:00 - 23:00</p>
        <p>Sunday Closed</p>
      </div>
    </div>
    
  </div>
</div>

<!-- Image of location/map -->
<div id="myMap" class="myMap">
  <div class="iframe_div">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3048.000098071451!2d44.51452846736526!3d40.1868112644629!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDDCsDExJzE0LjciTiA0NMKwMzEnMDAuOSJF!5e0!3m2!1sru!2s!4v1621273712489!5m2!1sru!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    <div class="info">
      <div><p><i class="fa fa-envelope-open w3-text-light-grey"></i></p><p>Gmail. anna.asatryan2.y@tumo.org</p></div>
      <div><p><i class="fa fa-map-marker w3-text-light-grey"></i></p><p>Address. Sayat-Nova</p></div>
      <div><p><i class="fa fa-mobile w3-text-light-grey"></i></p><p>Tel. 098077558</p></div>
    </div>
  </div>
</div>

<!-- Contact -->
<div class="w3-container w3-padding-64 w3-blue-grey w3-grayscale-min w3-xlarge">
  <div class="w3-content">
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">Contact</h1>
    <p>Find us at some address at some place or call us at 05050515-122330</p>
    <p><span class="w3-tag">FYI!</span> We offer full-service catering for any event, large or small. We understand your needs and we will cater the food to satisfy the biggerst criteria of them all, both look and taste.</p>
    <p class="w3-xxlarge"><strong>Reserve</strong> a table, ask for today's special or just send us a message:</p>
    <form method="post" action="orderAction.php">
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="name" required name="name"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="number" placeholder="tel number" required name="telNumber"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="number" placeholder="How many people" required name="people"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="datetime-local" placeholder="Date and time" required name="date" value="&rarr;"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Message \ Special requirements" required name="message"></p>
      <p><button class="w3-button w3-light-grey w3-block" name="msg_button" type="submit">SEND MESSAGE</button></p>
    </form>
  </div>
</div>
<?php include "html/footer.php"; ?>
<script type="text/javascript">
  $("#menuViewButton").click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#menu").offset().top
    }, 1200);
});
  $("#aboutSection").click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#about").offset().top
    }, 1200);
});
  $("#contactSection").click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#myMap").offset().top
    }, 1200);
});
</script>
</body>
</html>