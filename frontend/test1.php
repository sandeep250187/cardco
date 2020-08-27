 
<?php session_start(); ?>
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
startTimer(60);  // start again from 5 minutes
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

startTimer(<?php echo $_SESSION['st']; ?>);  // time left untill next cron update

</script>

<span id="countdown" style="font-size:12px;"></span>