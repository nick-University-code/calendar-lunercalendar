<?php
include ("lunercalendardata.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Pragma" content="no-cache">
<title>農曆展示</title>
</head>
   <body>
        <div style="color:white; background-color:#8DAA9D; height:100%;   padding:50px;">
             <a  align="left" href="https://p9056.isrcttu.net/20200413" ></a>  
             <h1 align="center"><font face="Microsoft JhengHei" color="#4A4E69" size="6" >
                 <b>20200413</b></font>       
                  </h1> 
                 <h2 align="center"><font face="Microsoft JhengHei" color="#4A4E69" size="4" >
                     
                    </font></h2>  
            <h3 align="center"><font face="Microsoft JhengHei" color="#4A4E69" size="5" >
                 <b>今年每月一日農曆日期對照</b></font>       
                  </h3> 
            <h4 align="center"> <font face="Microsoft JhengHei" color="#4A4E69" size="4" >          
             <?php
            $Year = 2020;
            for ($Month=1; $Month<=12; $Month++) {
                $Day = 1;
                $Argument = date('Y-m-d',mktime(1,0,0,$Month,1,$Year));
                $LDayName = GetLDay($Argument);
                echo "$Argument ==> $LDayName <br />";
            }
            ?>
          </font>  </h4>
        </div>>
</body>
</html>