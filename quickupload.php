 

<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
 <style>
.exc:hover {
background-color: red;
color:white;}
body{
  background: #52a4b8;
}
 </style>
  <title>QUICK UPLOADER</title>
</head>
<body>


<div class="container">
  <div class="row">
    <div class="col-lg-6">
	
      <div class="form">
  <form enctype="multipart/form-data" action="quickupload.php" method="POST">
    <p>QUICK UPLOAD</p>
	
    <input   type="file" name="uploaded_file"></input><br />
    <input  type="submit" value="Upload"></input>
  </form>
  <div style="color:#f2f2f2;font-size:150%;">
  
<?PHP
    
     
  if(!empty($_FILES['uploaded_file']))
  {
    $path = "fileupload/";
	#echo $path.$_FILES["uploaded_file"]["name"]; 
    if(move_uploaded_file($_FILES["uploaded_file"]["tmp_name"],$path.$_FILES["uploaded_file"]["name"])) {
      echo '<p style="color:green;font-size:80%;">UPLOADED</p>';
      $copycp = "/fileupload/".rawurlencode($_FILES['uploaded_file']['name']);
	  echo "<a target='_blank' href=".$copycp.">ไปยังไฟล์</a>";
	  
	  $copycpcc = rawurldecode("http://".$_SERVER['REMOTE_ADDR'].$copycp);
	  echo "<button onclick='myFunction()'>URL TO CLIPBOARD</button>";
	  echo "<input  readonly  style='font-size:60%;height:0px;' type='text' value="."http://".$_SERVER['REMOTE_ADDR'].$copycp." id='myInput'>";
	  
    } else{
        echo '<p style="color:red;font-size:80%;">There was an error uploading the file, please try again!</p>';
    }
  }
?>
</div></center>
<p>-------------------------</p>

  
      <form enctype="multipart/form-data" action="rm.php" method="POST">
    <input class="exc"   type="submit" value="REMOVE FILE"></input>
  </form>
  <p>-------------------------</p>


  </div>
    </div>
    <div class="col-lg-6">
      <div class="form">
  <p style="font-size:200%;">ไฟล์ในระบบฝากข้อมูล</p>
  <p>-------------------------</p>
	<?PHP
		$dir='fileupload';
	$file =	scandir($dir);
		$number = count($file);
		$real = $number;
		$real-=2;		
		
		for($if=2;$if<=$number-1;$if++){
			echo "<a target='_blank' href="."fileupload/".rawurlencode($file[$if]).">".$file[$if]."</a> ";
			$path = "fileupload/".rawurlencode($file[$if]);
			$type = pathinfo($path, PATHINFO_EXTENSION); 
			if ($type == "jpg" OR $type == "png"){echo "<a href=".$path."><img height=30px src=".$path."></a>";}
			echo "<br>";
		 	
		}
		
	?>
<p>-------------------------</p>
    </div>
  </div>
</div>



 
<script>

function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();

  /* Copy the text inside the text field */
  document.execCommand("Copy");

  /* Alert the copied text */
  alert("คัดลอกลิ้ง " + copyText.value + " ไปยังคลิปบอร์ดเรียบร้อยแล้ว");
} 

</script>


 



  
  
  

  
  
</body>

</html><center>
