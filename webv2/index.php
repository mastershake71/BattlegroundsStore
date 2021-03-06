<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Battlegrounds Store</title>
<link href="./style/style.css" rel="stylesheet" type="text/css" />
<!-- jScrollPane Style -->
<link type="text/css" href="./style/jquery.jscrollpane.css" rel="stylesheet" media="all" />
<script src="scripts/jquery-1.9.1.min.js"></script>
<script src="scripts/jquery.cookie.js"></script>
<script src="scripts/battlegrounds.js"></script>
<!-- Needed to add features removed from jQuery for jScrollPane -->
<script src="http://code.jquery.com/jquery-migrate-1.1.1.js"></script>
<!-- jQuery MouseWheel Support -->
<script type="text/javascript" src="scripts/jquery.mousewheel.js"></script>
<!-- jScrollPane -->
<script type="text/javascript" src="scripts/jquery.jscrollpane.min.js"></script>
<script>
$(document).ready(function(){
	$('#filters').jScrollPane({
		horizontalGutter:0,
		verticalGutter:2,
		'showArrows': false
	});
	$("#tools").click(function(){
		openMenu("tools_sub"); 
	});
	initiate();
	$("#armor").click(function(){
		openMenu("armor_sub");
	});
	$("#consumable").click(function(){
		openMenu("consumable_sub");
	});
	$("#clear").click(function(){
		resetFilters();
		window.location.replace("filter.php");
	});
	$("#srch").click(function(){
		resetFilters();
	});
	$("#login_button").click(function(){
		$("#login_form").slideToggle();
	});
	<?php
		if(isset($_SESSION['error'])){
			echo "$(\"#notification\").fadeIn(1000).delay(3000).fadeOut(1000);";
		}
	?>
});
</script>
</head>
<body>
<div id="container">
  <div id="left_col">
    <div id="item_search">
      <form action="search.php" method="post">
        <input type="text" name="search"/>
        <input type="submit" class="srch" id="srch" value="Search"/>
      </form>
    </div>
    <div id="filters">
      <ul>
        <li id="tools">
          <div class="inner">Tools</div>
        </li>
        <ul class="sub_main" id="tools_sub">
          <div class="sub">
            <div class="inner" id="allTools">All Tools</div>
          </div>
          <div class="sub">
			<div class="inner" id="weapons">Weapons</div>
          </div>
          <div class="sub">
            <div class="inner" id="swords">Swords</div>
          </div>
          <div class="sub">
            <div class="inner" id="axes">Axes</div>
          </div>
          <div class="sub">
            <div class="inner" id="picks">Picks</div>
          </div>
          <div class="sub">
            <div class="inner" id="shovels">Shovels</div>
          </div>
          <div class="sub">
            <div class="inner" id="hoes">Hoes</div>
          </div>
        </ul>
        <li id="armor">
          <div class="inner">Armor</div>
        </li>
        <ul class="sub_main" id="armor_sub">
          <div class="sub">
            <div class="inner" id="allArmor">All Armor</div>
          </div>
          <div class="sub">
            <div class="inner" id="boots">Boots</div>
          </div>
          <div class="sub">
            <div class="inner" id="chestplate">Chestplate</div>
          </div>
          <div class="sub">
            <div class="inner" id="helmet">Helmet</div>
          </div>
          <div class="sub">
            <div class="inner" id="leggings">Leggings</div>
          </div>
        </ul>
        <li id="consumable">
          <div class="inner">Consumables</div>
        </li>
        <ul class="sub_main" id="consumable_sub">
          <div class="sub">
            <div class="inner" id="allConsumables">All Consumables</div>
          </div>
          <div class="sub">
            <div class="inner" id="food">Food</div>
          </div>
          <div class="sub">
            <div class="inner" id="potion">Potion</div>
          </div>
        </ul>
        <li id="clear">
          <div class="inner" id="clear">Clear Filters</div>
        </li>
      </ul>
    </div>
    <div id="login_form">
      <form action="login.php" method="post">
        <table align="center">
          <tr>
            <td align="right">Username: </td>
            <td><input type="text" name="username" /></td>
          </tr>
          <tr>
            <td align="right">Auth Code: </td>
            <td><input type="password" name="authcode" /></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" class="submit" value="Sign In" name="login" /></td>
          </tr>
        </table>
      </form>
    </div>
    <div id="login">
      <!-- Auto Generated DO NOT EDIT -->
      <?php include("./includes/login_frame.php");?>
    </div>
  </div>
  <div id="right_col">
    <div id="store">
      <!-- Auto Generated DO NOT EDIT -->
      <?php include("./includes/store.php");?>
    </div>
  </div>
  <?php
  	if(isset($_SESSION['error'])){
		echo "<div id=\"notification\">
				<div class=\"errIc\">
    				<img src=\"images/info.png\" alt=\"info\"/>
    			</div>
    			<div class=\"inner\">"
    				.$_SESSION['error'].
    			"</div>
			</div>";
		unset($_SESSION['error']);
	}
  ?>
</div>
</body>
</html>