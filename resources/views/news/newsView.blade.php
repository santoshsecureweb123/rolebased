<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">

<title>News</title>

<base target="_parent">

<style type="text/css">
	/* IMPORT GOOGLE FONTS */
	iframe{
		float:right !important;;
	}

#news_iframe_scroll	{
		width: 100%;
		max-width: 250px;
		min-width: 200px;
		margin: 0px auto 10px auto;
		border: #000000 1px solid;
		-moz-box-sizing: border-box;
		-webkit-box-sizing: border-box;
		box-sizing: border-box;
		}

#news_iframe_scroll iframe 
		{
		width: 100%;
		height: 176px; 
		display: block;
		margin: 0px;
		padding: 0px;
		overflow: hidden;
		}

.news_scroll-title 
		{
		color: #FFFFFF;
		font: normal 20px "Droid Sans", arial, sans-serif;
		text-align: left;
		background-color: #276396;
		padding: 5px 5px 5px 5px;
		border-bottom: #C0C0C0 5px solid;
		}




/* EMBEDDED NEWS PAGE BODY */

#NewsDiv	{ position: absolute; left: 0; top: 0px; width: 50%; float: right;}

body.news-scroll {
		background-color: #FFFFFF;
		margin: 0;
		padding: 0;
		border: 0;
		}

/* FONTS & PADDING */

.scroll-text-if	{
		color: #666666;
		font: normal 12px "Droid Sans", arial, sans-serif;
		text-align: left;
		padding: 8px 7px 0px 7px;
		}

.scroll-title-if {
		color: #000000;
		font: bold 15px "Droid Sans", arial, sans-serif;
		text-align: left;
		border-bottom: #666666 0px solid;
		}

/* EMBEDDED NEWS PAGE LINK COLORS */

.news-scroll a:link	{ color: #0033FF; text-decoration: none; }

.news-scroll a:visited	{ color: #6633FF; text-decoration: none; }

.news-scroll a:active	{ color: #0033FF; text-decoration: none; }

.news-scroll a:hover	{ color: #6699FF; text-decoration: underline; }

</style>
</head>

<body class="news-scroll" onMouseover="scrollspeed=0" onMouseout="scrollspeed=current" OnLoad="NewsScrollStart();">
<div id="NewsDiv">
<div class="scroll-text-if">
@foreach ($news as $newVal)
<span class="scroll-title-if"><br>
</span> <?php echo $newVal['title']; ?>
<a href="<?php echo $newVal['link']; ?>">Read More</a>.

<br><br>
 @endforeach
</div>
</div>

<script type="text/javascript">


var startdelay 		= 2; 		// START SCROLLING DELAY IN SECONDS
var scrollspeed		= 1.1;		// ADJUST SCROLL SPEED
var scrollwind		= 1;		// FRAME START ADJUST
var speedjump		= 30;		// ADJUST SCROLL JUMPING = RANGE 20 TO 40
var nextdelay		= 0; 		// SECOND SCROLL DELAY IN SECONDS 0 = QUICKEST
var topspace		= "2px";	// TOP SPACING FIRST TIME SCROLLING
var frameheight		= 176;		// IF YOU RESIZE THE CSS HEIGHT, EDIT THIS HEIGHT TO MATCH


current = (scrollspeed);


function HeightData(){
AreaHeight=dataobj.offsetHeight
if (AreaHeight===0){
setTimeout("HeightData()",( startdelay * 1000 ))
}
else {
ScrollNewsDiv()
}}

function NewsScrollStart(){
dataobj=document.all? document.all.NewsDiv : document.getElementById("NewsDiv")
dataobj.style.top=topspace
setTimeout("HeightData()",( startdelay * 1000 ))
}

function ScrollNewsDiv(){
dataobj.style.top=scrollwind+'px';
scrollwind-=scrollspeed;
if (parseInt(dataobj.style.top)<AreaHeight*(-1)) {
dataobj.style.top=frameheight+'px';
scrollwind=frameheight;
setTimeout("ScrollNewsDiv()",( nextdelay * 1000 ))
}
else {
setTimeout("ScrollNewsDiv()",speedjump)
}}

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
	 jQuery(document).ready(function() {
var url = 'https://newsapi.org/v2/top-headlines?' +
          'country=us&' +
          'apiKey=cd06f3748ee84807b10756c086e0279c';
var req = new Request(url);
fetch(req)
    .then(function(response) {
       var jsonData= response.json();
       console.log(jsonData);
     // var obj = JSON.parse(jsonData);
     //  console.log(obj);

    });
    	});
    </script>
</body>
</html>
