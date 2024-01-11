<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>

        <!--bootstrap css-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />

        <style>
            #clock {
                display: block;
                width: 100%;
                background: #b6b4b4;
            }
            .time {
                height: 70px;
                width: 70px;
                display: inline-block;
                background: #2196f3 !important;
                color: #fff;
                text-align: center;
            }
            .time hr{
                margin: 0;
               
                background: #eee;
            }
            #hour,#minute,#second,.time span {
                height: 65%;
                display: block;
                display: flex;
                align-items: center;
                justify-content: center;
                position: relative;
                font-size: 27px;
            }
            .time span:last-child {
                color: ;
                font-size: 12px;
                border: 1px solid #9191ac;
                height: 35% !important;
            }
            .clock-red{
                background: #ff0061 !important;
                
            }
            
        </style>


    </head>
    <body>

        <div id="clock">
            <div class='time '><span id="hour">00</span>  <span>Hours</span></div>
            <div class='time' ><span id="minute">00</span>  <span>Minutes</span></div>
            <div class='time clock-red' ><span id="second">00</span><span>Seconds</span></div>
        </div>


        




        <!--bootsrap js-->

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        
        
        <script type="text/javascript">
        
        function clock(){
            var hour = document.querySelector('#hour');
            var minute = document.querySelector('#minute');
            var second = document.querySelector('#second');
            
            var h = new Date().getHours();
            var m = new Date().getMinutes();
            var s = new Date().getSeconds();
            
            if( h >12){
                h = h-12;
            }
            
            h = (h<10)? '0'+h : h;
            m = (m<10)? '0'+m : m;
            s = (s<10)? '0'+s : s;
            
            
            hour.innerHTML = h;
            minute.innerHTML = m;
            second.innerHTML = s;
            
        }
            var interval = setInterval(clock,1000);
        
        
        </script>
        
        
        
        
        
        
        
        
        

    </body>