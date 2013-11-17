<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Ubuntu+Mono' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Josefin+Slab' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Kelly+Slab' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Port+Lligat+Slab' rel='stylesheet' type='text/css'>;
<link href='http://fonts.googleapis.com/css?family=Inconsolata' rel='stylesheet' type='text/css'>




<style>
      body {
         font-family: 'Ubuntu Mono', sans-serif;
        <!-- font-family: 'Port Lligat Slab', serif; --> 
<!-- font-family: 'Varela Round', sans-serif; -->
  
        
      }
#fooObject {
 /* simple box */
 position:absolute;
 left:0px;
 top:8em;
 width:5em;
 line-height:3em;
 background:#99ccff;
 border:1px solid #003366;
 white-space:nowrap;
 padding:0.5em;
}
    </style>
<title>Knowledge Search and Organization </title>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-15779763-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<script type="text/javascript"> 
 
var foo = null; // object
 
function doMove() {
  foo.style.left = parseInt(foo.style.left)+1+'px';
  setTimeout(doMove,20); // call doMove in 20msec
}
 
function init() {
  foo = document.getElementById('fooObject'); // get the "foo" object
  foo.style.left = '0px'; // set its initial position to 0px
  doMove(); // start animating
}
window.onload = init;

</script>


<!-- 1. Use API's given by websites to access their Database Tables. -->
</head>


<!-- <body style="background-color:#6899d3;"> -->
<body style="background-color:#ffffff;">
<style type="text/css">


.ex
{
width:50%;
height:100%;
padding:10px;
border:0px solid blue;
margin:0px;
<!-- float: right; -->
}

.searchhome
{
position:relative;
<!-- left:30%; -->
top:28%;
color: #4671d5;
font-size:30px;
}

 
.bwhome
{
position:absolute;
left:2%;
top:2%;
font-family: 'Ubuntu Mono', sans-serif;
font-size:15px;
color: #4671d5;
}

.foot
{
position:absolute;
left:70%;
top:96%;
color: #4671d5;
font-size:17px;
<!-- font-family: 'Nova Mono', cursive; -->
}

.searchb
{  
background-color:#ffffff;
font-size: 20px;
font-family: 'Ubuntu Mono', sans-serif;
border-color:#4671d5;
border-width:1px;
}

</style>

<!-- 

<div class="bwhome">
<a href="http://www.beautifulwork.org/">BEAUTIFULWORK HOME</a>
<!--
&nbsp;&nbsp;&nbsp;
<a href="http://www.symmel.org/">SYMMEL KERNEL</a>&nbsp;&nbsp;&nbsp;<a href="http://www.trueangle.org/">TRUEANGLE</a>
-->
</div>

-->


<!-- <div class="searchhome"> -->
<!-- <img   src="images/searchhome.png" /> -->
<!-- <div style="font-size:20px;">
<u>KNOWLEDGE SAO </u>
</div> -->
<!--
<ul style="list-style-type:circle;">
<li> LEARNING MODELS </li>
<li> ORGANIZATION </li>
<li> STARTER </li>
<li> INTERMEDIATE </li>css border color
<li> ADVANCED </li>
<li> DEBIAN DEVELOPER </li>
</ul>
-->
<!-- </div> -->


<!-- <div class="ex"> -->
<!-- 
<div style="float:right;padding-top:50%;">
<a href="http://www.beautifulwork.org/testing/bweagle"> Search Database </a>
</div> -->
<!-- <div class="locater"> -->
<!-- <div class="searchhome"> -->

<!-- <?php phpinfo(); ?> -->

<center style="position:relative;top:20%;">
<div> 
<center style="color: #4671d5;font-size:30px;">TRUEANGLE</center>
</div>
<!-- <center style="position:relative;top:31%;"> -->
<form action="search.php" method="post">
<center><input style="height:40px;color:#7277d8;" type="text" size="40" name="value" /></center> 
<br>
<center><input class="searchb"  type="submit" size="20" value="LOOK TRUEANGLE" /></center>
</form>
</center>
</div>


<!-- <div id="fooObject"> 
Happy Day !
</div>  --> 

<div class="foot">
KNOWLEDGE SEARCH AND ORGANIZATION
</div>



<!-- <a href="facebook_signup.php">Facebook Signup</a> -->

<!-- <iframe src="http://www.facebook.com/plugins/like.php?href=www.beautifulwork.org/bweagle"
        scrolling="no" frameborder="0"
        style="border:none; width:450px; height:80px"></iframe> -->
<!-- 
<div id="fb-root"></div>
      <script src="http://connect.facebook.net/en_US/all.js"></script>
      <script>
         FB.init({ 
            appId:'242627959123228', cookie:true, 
            status:true, xfbml:true 
         });
      </script>
      <fb:login-button>Login with Facebook</fb:login-button>
<fb:registration
            fields="[{'name':'name'}, {'name':'email'},
            {'name':'favorite_car','description':'What is your favorite car?',
            'type':'text'}]" redirect-uri="http://www.beautifulwork.org/">
    </fb:registration> -->
<!-- 
<?php
echo "Total Disk Space   "  . disk_total_space("/")."   Bytes" ;
echo "<br />";
echo "Free Disk Space    "  . disk_free_space("/")."    Bytes" ;
?>
 -->
<meta property="fb:admins" content="1309888201" />
<!-- <? echo SYmmel; ?> -->
</div>
</div>
</body>
</html>
