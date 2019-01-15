<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<style>
.exc:hover {
background-color: red;
color:white;
}
body{
  background: #52a4b8;
}
</style>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="form">
<p style="font-size:150%;color:red;"> ลบไฟล์ในระบบฝากข้อมูล</p>
<p style="font-size:140%;color:red;"> มีสติตอนลบนะ ไม่ได้ทำ Confirm ใว้นะ</p>

	<?PHP
		
		$dir='fileupload';
	$file =	scandir($dir);
		$number = count($file);
		$real = $number;
		$real-=2;
		if ($real < 0){echo "<br>"."<font color='red'>ระบบข้อมูลมีปัญหา จะไม่สามารถใช้งาน ได้</font>"."<script>alert('ระบบข้อมูลมีปัญหา  พื้นที่ไม่ทำงาน ติดต่อผู้ดูแลระบบ')</script>"; exit;}
		
		
		for($if=2;$if<=$number-1;$if++){
		   $file[$if]; 
		   $path = "fileupload/".rawurlencode($file[$if]);
		   $type = pathinfo($path, PATHINFO_EXTENSION); 
		   if ($type != "jpg" AND $type != "png"){$path='';}
			echo "<p><form action='rmitem.php' method='POST' > <input style='background-repeat: no-repeat;background-size:Auto 100%;background-image: url(".$path.");' class='exc' name ='rmdes' type='submit' value='$file[$if]'> </form>  </p>";
		 	
			 
		}
		
	?>
</div>

<div class="form">
<form  enctype="multipart/form-data" action="quickupload.php" method="POST">
    <input type="submit" value="กลับ"></input>
  </form> 
</div>
    </div>
  </div>
</div>


 