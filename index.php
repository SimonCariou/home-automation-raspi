<?php
require_once('configuration.php');
require_once('functions.php');
?>

<html lang="en">
<header>
	<link rel="icon" type="image/png" href="/images/favicon.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Home automation</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg==" crossorigin="anonymous">
  <link href="css/house_management.css" rel="stylesheet">
 <link href="css/style.css" rel="stylesheet">
 <link href="css/button.css" rel="stylesheet">
<link href="gpio/css/style.css" rel="stylesheet">


<script src="js/jquery.min.js"></script>
<script src="js/script.js"></script>
<script type="text/javascript">

var hold='';

   function loadXMLDoc(){
      var xmlhttp;
      if (window.XMLHttpRequest){
         // code for IE7+, Firefox, Chrome, Opera, Safari
         xmlhttp=new XMLHttpRequest();
      }else{
         // code for IE6, IE5
         xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      //Put the most recent image name in the variable 'hold'
      xmlhttp.onreadystatechange=function(){
         if (xmlhttp.readyState==4 && xmlhttp.status==200){
            hold=xmlhttp.responseText;

         }
      }
      //Get the latest info from 'ajax_info.txt'
      xmlhttp.open("GET","ajax_info.txt",true);
      xmlhttp.send();
      //Refresh the image only if it has a new name
      if(document.getElementById("camera2").innerHTML!=hold){
         document.getElementById("photo_camera").src= hold ;
	document.getElementById("camera2").innerHTML=hold;
	}
}

function take_picture(){
      var xmlhttp;
      if (window.XMLHttpRequest){
         // code for IE7+, Firefox, Chrome, Opera, Safari
         xmlhttp=new XMLHttpRequest();
      }else{
         // code for IE6, IE5
         xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange=function(){
         if (xmlhttp.readyState==4 && xmlhttp.status==200){
            //Do something
         }
      }
      //Take a still image
      xmlhttp.open("GET","take_picture.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
      xmlhttp.send();


}


function initialize_stuff() {
document.getElementById("cmn-toggle-2").checked = false; 
document.getElementById("camera").style.width="100%";
document.getElementById("camera").class="centered";

}


   function timedRefresh(){
      loadXMLDoc();
      setTimeout("timedRefresh();", 50);
   }


</script>

</header>

<body onload="initialize_stuff() ; timedRefresh();">
	<div class= "container">
 		<div class="banner">
		</div>

<!-- PARAGRAPHE INTRO  -->
		<div class="intro col-xs-12 col-sm-12 col-md-12 col-lg-12 centered">
			<img class="centered col-xs-6 col-sm-6 col-md-12 col-lg-12" src="images/intro_img.png" style="width:300px; height: auto; margin-top: 20px"/>
			<h1>HOME AUTOMATION</h1>
			<h3>Webcontroler</h3>
			<h4>- Raspberry Pi -</h4>

<!-- DIVISIONS DE GESTION  -->

<!-- LAMPES  -->
                <div class="stuff col-xs-12 col-sm-12 col-md-4 col-lg-4">
		<h1>Lamps</h1>
			<hr>

<!-- ON / OFF LAMPES  -->
<table class="materialTab" style="width:75%">
<tr><th>Objet</th><th>PIN</th><th>Etat</th></tr>
<?php foreach($materials as $material=>$pin){ ?>
<tr>
        <td><?php echo $material; ?></td>
 <td><?php echo $pin;  $pinState = getPinState($pin,$pins);?></td>
        <td><div onclick="changeState(<?php echo $pin; ?>,this)" class="pinState <?php echo $pinState; ?>"></div></td></tr>
<?php } ?>
</table>




			</div>
<!-- PHOTO VIDEO  -->

                <div class="stuff col-xs-12 col-sm-12 col-md-8 col-lg-8 ">
                <h1>Camera</h1>
                        <hr>
<!-- STREAM VIDEO -->

<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
<p>Stream video</p>
			<div class="switch">
            		<input onclick="" name="check_camera" id="cmn-toggle-2" class="cmn-toggle cmn-toggle-round" type="checkbox">
            		<label for="cmn-toggle-2"></label>
	  		</div>
</div>




<!-- PHOTOS -->

<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

<!-- PRENDRE PHOTO -->

<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 centered">
<p>Take pic</p>
<br>
  <span class="button-wrap" style="display:inline-block; vertical-align:middle">
    <button class="button button-circle" onclick="take_picture()">
      <i class="fa fa-camera"></i>
    </button>
  </span>
</div>


</div>

<br>
<hr width="0" align="center">

<!-- DIV QUI S'AFFICHE AVEC LA PHOTO -->
	<div id="camera" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 centered">
<div id="camera2" style="display:none"></div>
<img src="http://orig01.deviantart.net/7705/f/2013/197/d/d/aperture_flat_replacement_icon_by_packrobottom-d6dqgqf.png" id="photo_camera"/>
 	</div>

		</div>
<!-- MEDIA CENTER -->
		<div class="stuff col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h1>Medias</h1>
                </div>
</div>
</div>
</div>
</body>
</html>
