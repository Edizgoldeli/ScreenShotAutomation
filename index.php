<?php include_once 'config.php'; 
 
$status = $statusMsg = ' '; 
if(!empty($_SESSION['status_response'])){ 
    $status_response = $_SESSION['status_response']; 
    $status = $status_response['status']; 
    $statusMsg = $status_response['status_msg']; 
     
    unset($_SESSION['status_response']); 
} 
?>
<!DOCTYPE html>
<html>
<head>
<style>
ssg{
position: absolute;
width: 198px;
height: 86px;
left: calc(50% - 198px/2 - 0.5px);
top: 53px;

font-family: Quicksand;
font-style: normal;
font-weight: bold;
font-size: 34px;
line-height: 42px;
display: flex;
align-items: center;
text-align: center;

color: #200E32;
}
.button {
border: none;
text-align: center;
display: inline-block;
cursor: pointer;
}
buttonstyle{
position: absolute;
width: 198px;
height: 63px;
top: 221px;
background: #5A38E4;
left: calc(50% - 198px/2 - 0.5px);
box-shadow: -5px -5px 10px rgba(255, 255, 255, 0.5), 5px 5px 10px rgba(170, 170, 204, 0.25), 10px 10px 20px rgba(170, 170, 204, 0.5), -10px -10px 20px #FFFFFF;
border-radius: 15px;
}
buttonstyle:hover{
background: #635EFC;}



textStyle{
position: absolute;
width: 155px;
height: 23px;
left: calc(50% - 155px/2 + 0.5px);
top: calc(50% - 23px/2 + 1px);
font-family: Quicksand;
font-style: normal;
font-weight: bold;
font-size: 18px;
line-height: 22px;
text-align: center;
color: #FFFFFF;
}

</style>
</head>
<body>
<center>
<ssg> ScreenShot Generator </ssg>
<buttonstyle>
													<a href="ssTaker.php" class="button" > 		
													<textStyle> Take ScreenShots </textStyle> 
</buttonstyle>

</center>

    </body>
</html>