<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>線上月曆</title>
    <style>
        *{
            box-sizing: border-box;
            margin: 0;
        }
        @media screen and (max-width: 767px){
            body{
            background-image: url(https://picsum.photos/767/1080);
            background-repeat: no-repeat;
            background-size:auto;
            width: 100%;
            height: 100vh;
            }
        } 
        @media screen and (min-width: 768px) and (max-width: 1000px){
            body{
            background-image: url(https://picsum.photos/1000/1000);
            background-repeat: no-repeat;
            background-size:auto;
            width: 100%;
            height: 100vh;
            }
        } 
        @media screen and (min-width: 1001px){
            body{
            background-image: url(https://picsum.photos/1920/1080);
            background-repeat: no-repeat;
            background-size:auto;
            width: 100%;
            height: 100vh;
            }
        } 
        table{
            border-collapse: collapse;
            background: linear-gradient(to bottom, #dff1ff, #FFD9EC);
        }

        table td{
            padding:5px;
            text-align: center;
            border:1px solid #aaa;
            display: inline-block;
            width: 50px;
            height: 50px;
            
        }
        .weekend{
            background:pink;
        }
        .workday{
            background:white;
        }
        .today{
            background: lightgreen;
        }
        .calendar{
            margin: 50px 50px;
            text-align: center;
        }
        table>div{
            text-align: center;

        }
        table td:hover{
            background: linear-gradient(0deg , #85d6fc , #f898cf , #fff59e , #85d6fc );
        }
        h1{
            text-align: center;
            font-weight: bold;
            color: #00ffff;
        }
       
    </style>
</head>
<body>
<?php
$month=5;

?>
<h1>線上月曆</h1>
<div class="calendar">

    <table style = " text-align:center; ">
        <tr>
            <td>日</td>
            <td>一</td>
            <td>二</td>
            <td>三</td>
            <td>四</td>
            <td>五</td>
            <td>六</td>
        </tr>
        <?php

$firstDay=date("Y-").$month."-1";
$firstWeekday=date("w",strtotime($firstDay));
$monthDays=date("t",strtotime($firstDay));
$lastDay=date("Y-").$month."-".$monthDays;
$today=date("Y-m-d");
for($i=0;$i<6;$i++){
    print( "<tr>");
    for($j=0;$j<7;$j++){
        $d=$i*7+($j+1)-$firstWeekday-1;
        if($d>=0 && $d<$monthDays){
            $fs=strtotime($firstDay);
            $shiftd=strtotime("+$d days",$fs);
            $date=date("d",$shiftd);
            $w=date("w",$shiftd);
            $chktoday="";
            if(date("Y-m-d",$shiftd)==$today){
                $chktoday='today';
            }
            if($w==0 || $w==6){
                print( "<td class='weekend $chktoday' >");
            }else{
                print( "<td class='workday $chktoday'>");
            }
            print( $date);
            print( "</td>");
        }else{
            print( "<td></td>");
        }
        
        
    }
    
    print( "</tr>");
}



?>


</table>
</div>



</body>
</html>