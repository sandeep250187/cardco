<?php
 date_default_timezone_set('Asia/Calcutta'); 
 session_start();

//unset($_SESSION['stt']);
if(empty($_SESSION['stt']))
{
$_SESSION['stt']=date('h:i:s');
$start=$_SESSION['stt'];
$endTime = strtotime("+30 minutes", strtotime($start));
//echo 'After 30 Min='.date('h:i:s', $endTime);echo "<br>";

$checkTime = strtotime($start);
echo 'Start Time : '.date('H:i:s', $checkTime);
echo '<hr>';

 echo 'End Time='.date('h:i:s', $endTime);echo "<br>";

$loginTime =$endTime;
$diff = $checkTime - $loginTime;


}

else
	{
		 $current=date('h:i:s');  
		echo "asnu";echo "<br>";
		echo '<hr>';
	echo 'Start Time='.$start=$_SESSION['stt'];echo "<br>";
	echo '<hr>';

	echo '<hr>';
$checkTime = strtotime($current);
echo 'Temp Start Time : '.date('H:i:s', $checkTime);echo "<br>";
echo '<hr>';
$endTime = strtotime("+30 minutes", strtotime($start));
 echo 'End Time='.$et=date('h:i:s', $endTime);echo "<br>";

		if($current>$_SESSION['stt'] or $current< $et )
{
	
//echo 'After 30 Min='.date('h:i:s', $endTime);echo "<br>";

 
echo "inner";

echo '<hr>';
$loginTime =$endTime;
$diff = $checkTime - $loginTime;
	
}

		
	}
 
echo 'Time diff in sec: '.$second=abs($diff);



echo '<hr>';

 
?>
<html>
<body>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
 #progressBar {
  width: 923px;
  margin: 10px auto;
  height: 22px;
  background-color: #0A5F44;
}

#progressBar div {
  height: 100%;
  text-align: right;
  padding: 0 10px;
  line-height: 22px; /* same as #progressBar height if we want text middle aligned */
  width: 0;
  background-color: #CBEA00;
}
.animate({ width: progressBarWidth }, timeleft == timetotal ? 0 : 1000, "linear")

</style>

 

<span id="countdown" style="font-size:12px;"></span>
<div id="progressBar">
  <div></div>
</div>
<script type="text/javascript">	 
/* START TIMER */
var timeInSecs;
var ticker;

function startTimer(secs) {
timeInSecs = parseInt(secs);
ticker = setInterval("tick()", 1000); 
}

function tick( ) {
var secs = timeInSecs;
if (secs > 0) {
timeInSecs--; 
}
else {
clearInterval(ticker);
startTimer(1800);  // start again from 5 minutes
}

var mins = Math.floor(secs/60);
secs %= 60;
var pretty = ( (mins < 10) ? "0" : "" ) + mins + ":" + ( (secs < 10) ? "0" : "" ) + secs;
if(pretty=='00:00')
{
	alert('session out');
}
document.getElementById("countdown").innerHTML = pretty;
}

startTimer(<?php  echo $second; ?>);  // time left untill next cron update



 function progress(timeleft, timetotal, $element) {
        var progressBarWidth = timeleft * $element.width() / timetotal;
        $element.find('div').animate({ width: progressBarWidth }, 500).html(Math.floor(timeleft / 60) + ":" + timeleft % 60);
        if (timeleft > 0) {
            setTimeout(function() {
                progress(timeleft - 1, timetotal, $element);
            }, 1000);
        }
    };

    progress(<?php echo $second; ?>, <?php echo $second; ?>, $('#progressBar'));
 
</script>
</body>
</html>
 