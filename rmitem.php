<?PHP

echo "fileupload/".$_POST['rmdes'];
$exc = "fileupload/".$_POST['rmdes'];
echo $exc;
$excddd = rawurlencode($exc);
echo  "<br>".$excddd;
unlink($exc);
header("location:rm.php");
?>