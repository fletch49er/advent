<?php
//get day of the month (numeric)
$day = date('j');
//get current year (numeric)
$year = date('Y')+1;
//set expiry date for cookie 01.01.2020
$expires = mktime(0, 0, 0, 1, 1, $year);
//set path
$path = '/examples/advent/';

//set cookie
setcookie ('adventCalender', $day, $expires, $path);

//set image folder
$imageLocal = 'images/2018/';

//php array of album covers
$songURL = array(
	1 => 'watch?v=0K4sMCGvWzk',
	2 => 'watch?v=MsP6EKAzEjI',
	3 => 'watch?v=gOqblSqx_VI',
	4 => 'watch?v=jyZc2Xqav_4',
	5 => 'watch?v=2n1Zx5eM38M',
	6 => 'watch?v=ar_saHB60qU',
	7 => 'watch?v=GcHL8efKKPE',
	8 => 'watch?v=jZzEvqDQfIA',
	9 => 'watch?v=pIXQn9OoLc4',
	10 => 'watch?v=XBnJS1buiwU',
	11 => 'watch?v=hrVd4TZQhbA',
	12 => 'watch?v=LPAVDHo1Elc',
	13 => 'watch?v=A-okrbdH98M',
	14 => 'watch?v=zn0CdBEHLM8',
	15 => 'watch?v=dLl1MeOCeKI',
	16 => 'watch?v=ClxXDfvtoj0',
	17 => 'watch?v=2o6O0HOt4lc',
	18 => 'watch?v=7nptFEl-nwM',
	19 => 'watch?v=_xOO3A6UEjU',
	20 => 'watch?v=sQw3LBl2eEU',
	21 => 'watch?v=AZm1_jtY1SQ',
	22 => 'watch?v=E_bUzOuSGjw',
	23 => 'watch?v=f0bdLdTJdKI',
	24 => 'watch?v=VnM9X0IgUmg'
);
//php array of door numbers in random order
$num = array(0,18,9,2,15,6,17,21,13,11,3,20,8,24,1,10,14,16,22,4,7,12,23,5,19);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Advent Calender</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

<!-- stylesheet -->
<link rel="stylesheet" href="styles/advent.css" type="text/css" />

<!-- include external javascript files-->
<script src="scripts/advent.js"></script>

<!-- javascript array of album covers -->
<script>	
//create javascript array songURL from php array $songURL
var songURL = <?php echo json_encode($songURL);?>;
</script>

</head>
<body>
<div id="wrapper" class="clearfix">
<div id="advent" class="clearfix">
<?php
if(isset($_COOKIE['adventCalender'])) {
  //layout advent doors
  for($x=1; $x<=24; $x++) {
  	if((date("m") == 12) && ($num[$x] < date("j")) && ($num[$x] < $_COOKIE["adventCalender"])) {
  		echo '<div id="'.$num[$x].'" class="floatLeft open pointer" style="background-image: url('.$imageLocal.$num[$x].'.jpg);">'.PHP_EOL;
  		echo '<a href="https://www.youtube.com/'.$songURL[$num[$x]].'" target="_blank">'.$num[$x].'</a>'.PHP_EOL;
  	}elseif((date("m") == 12) && ($num[$x] <= date("j")) && ($num[$x] <= $_COOKIE["adventCalender"])) {
    	if($_COOKIE['windowOpen'] == 'yes') {
      	echo '<div id="'.$num[$x].'" class="floatLeft open pointer" style="background-image: url('.$imageLocal.$num[$x].'.jpg);">'.PHP_EOL;
  			echo '<a href="https://www.youtube.com/'.$songURL[$num[$x]].'" target="_blank">'.$num[$x].'</a>'.PHP_EOL;
			}else{
  			echo '<div id="'.$num[$x].'" class="floatLeft pointer" onclick="openWindow('.$num[$x].')">'.PHP_EOL;
  			echo $num[$x].PHP_EOL;
      }
  	} else {
  		echo '<div id="'.$num[$x].'" class="floatLeft">'.PHP_EOL;
  		echo $num[$x].PHP_EOL;
  	}
  	echo '</div>'.PHP_EOL;
  }
}
?>
</div><!-- end #advent -->
</div><!-- end #wrapper -->
</body>
</html>