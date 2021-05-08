<?php
include ("https://p9056.isrcttu.net/20200413/lunercalendardata.php");
?>
<html>
    <head>
        <title>月曆-國曆+農曆</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
        A:hover {color: #9AC2C5}
        </style>
    </head>
     <body>
        <div style="color:white; background-color:#8DAA9D; height:20%; padding:50px;">
             <a  align="left" href="https://p9056.isrcttu.net/20200413" ></a>  
             <h1 align="center"><font face="Microsoft JhengHei" color="#4A4E69" size="6" >
                 <b>20200413</b></font>       
                  </h1> 
                 <h2 align="center"><font face="Microsoft JhengHei" color="#4A4E69" size="4" >
                 
                    </font></h2>  
            <h3 align="center"><font face="Microsoft JhengHei" color="#4A4E69" size="5" >
                 <b>今年月曆-國曆+農曆</b></font>       
                  </h3> 
        <h4 align="center">
        <form action="https://p9056.isrcttu.net/20200413/twocalendar.php" method="post" style="font-size:16px; line-height:150%;">
         <select name="choose1">
          <?php
            echo '<option value="' ,2020 ,'">', "年份選擇", '</option>';
            for($i=2010; $i <= 2030; $i++){
                echo '<option value="' ,$i ,'">', $i, '</option>';
            }
            ?>
        </select>
        <select name="choose">
       <?php
            echo '<option value="' ,4 ,'">', "月份選擇", '</option>';
            for($i=1; $i <= 12; $i++){
                echo '<option value="' ,$i ,'">', $i, '</option>';
            }
            ?>
        </select>
             <input type="submit" value="送出"  name="check" >
       </form>
            </h4>
       <br><br>
 
       </div>
    </body>
</html>
<?php
$check=filter_input(INPUT_POST, 'check');
$Y =filter_input(INPUT_POST, 'choose1');
$M =filter_input(INPUT_POST, 'choose');
if($check!="送出"){$M=4;$Y=2020;}
$FirstDate = 1;
$LastDate = date('j', mktime(0,0,0,$M+1,0,$Y));
$ShowDate = array();
for ($i=0; $i<6; $i++)
    for ($j=0; $j<7; $j++)
	$ShowDate[$i][$j] = '';
$r = 0;
for ($d=1; $d<=$LastDate; $d++) {
    $w = date('w',mktime(0,1,0,$M,$d,$Y));
    $ShowDate[$r][$w] = $d;
    if ($w==6) $r++;
}
$Month = date('F',mktime(0,1,0,$M,1,$Y));
$LastRow = 5;
if (empty($ShowDate[$LastRow][0])) $LastRow = 4;
if (empty($ShowDate[$LastRow][0])) $LastRow = 3;
?>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
        A:hover {color: #9AC2C5}
        </style>
    </head>
    <body>
        <div style="color:white; background-color:#8DAA9D; height:100%;  padding:20px ">
                  <br>
            <h4 align="center"><?php echo $Month.' '.$Y; ?></h4>
            <table style="text-align:center;" width="50%" border="2" align="center">
            <tr align="center">
            <td width="100">Sun</td>
            <td width="100">Mon</td>
            <td width="100">Tue</td>
            <td width="100">Wed</td>
            <td width="100">Thu</td>
            <td width="100">Fri</td>
            <td width="100">Sat</td>
            </tr>
          <?php  for($r=0;$r<=$LastRow;$r++)  {   ?>
            <tr align="center">
           <?php
          for($i=0;$i<7;$i++){
             $Date = $ShowDate[$r][$i];
             $BgColor='';
             if(!empty($Date)){
                 $xDate=date('Ymd',mktime(0,1,0,$M,$Date,$Y));
                 if($xDate==date('Ymd')){
                    $BgColor ='bgcolor="#AAAAEE"';
                 }
                 if($i==0){
                     $Date='<span style="color:red">'.$Date.'</span>';
                 }
                 if($i==6){
                     $Date='<span style="color:orange">'.$Date.'</span>';
                 }
             }
              
             $Argument = date('Y-m-d',mktime(1,0,0,$M,(int)$Date,$Y));
             $LDayName = GetLDay($Argument);
            ?>  
                <td width="25" <?php echo $BgColor; ?> > <?php if($LDayName!="無對應表資料"){echo "$Date <br /> $LDayName";} else{echo "$Date";}?></td>
           <?php }   ?>
        
            </tr>
          <?php }  ?>
        
  
     </div>
 </body>
</html>
