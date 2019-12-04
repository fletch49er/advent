<?php
//set month
$value = date("j");
//create cookie
setcookie ("adventCalender", $value, time()+(3600*24*30), "/advent/");

//php array of album covers
$movieURL = array(
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
$num = range(1, 24);
shuffle($num);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Advent Calender</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

<!-- stylesheet -->
<link rel="stylesheet" href="styles/advent.css" type="text/css" />

<!-- javascript array of album covers -->
<script>	
//create javascript array songURL from php array $songURL
var songURL = <?php echo json_encode($songURL);?>;
</script>
<!-- advent javascripts -->
<script src="scripts/advent.js" type="text/javascript"></script>

</head>
<body>
<div id="wrapper" class="clearfix">
<div id="advent" class="clearfix">
<?php
//layout advent doors
for($x=1; $x<=24; $x++) {
	if((date("m") == 12) && ($num[$x] < date("j")) && ($num[$x] < $_COOKIE["adventCalender"])) {
		echo '<div id="'.$num[$x].'" class="floatLeft open" style="background-image: url(images/'.date("Y").'/'.$num[$x].'.jpg);">'.PHP_EOL;
		echo '<a href="https://www.youtube.com/'.$songURL[$num[$x]].'" target="_blank">'.$num[$x].'</a>'.PHP_EOL;
	} elseif((date("m") == 12) && ($num[$x] <= date("j")) && ($num[$x] <= $_COOKIE["adventCalender"])) {
		echo '<div id="'.$num[$x].'" class="floatLeft pointer" onclick="openWindow('.$num[$x].')">'.PHP_EOL;
		echo $num[$x].PHP_EOL;
	} else {
		echo '<div id="'.$num[$x].'" class="floatLeft">'.PHP_EOL;
		echo $num[$x].PHP_EOL;
	}
	echo '</div>'.PHP_EOL;
}
?>
</div><!-- end #advent -->
</div><!-- end #wrapper -->
</body>
</html>