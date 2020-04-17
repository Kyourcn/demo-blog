<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script type="text/javascript">
        function down(){
            // 判断是否微信浏览器
            var ua = navigator.userAgent.toLowerCase();//获取判断用的对象
            if (ua.match(/MicroMessenger/i) == "micromessenger") {
                // 弹出模态框提示用户 
                 document.getElementById('download-modal').style.visibility = "visible";
            }else{
                // 判断系统客户端
                var u = navigator.userAgent; 
                var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1; //android终端 
                var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端 
                if(isAndroid == true){
                    // alert('Android!');
                    window.location = 'litme.apk';
                }
                else {
                    if(isiOS == true){
                        // alert('ios！');
                        window.location = 'https://itunes.apple.com/';
                    }else{
                        alert('请在手机端打开');
                    }
                }
            }
            
        }
        function closeModal(){
            var modal = document.getElementById('download-modal');
            modal.style.visibility = "hidden";
        }
    </script>
    <style type="text/css">
        .download-modal{
            visibility: hidden;
            width: 100%;
            height: 100%;
            opacity: 0.5;
            position: absolute;
            text-align: center;
            background-color:rgb(30,30,30); 
            top: 0;
            left: 0;
            z-index: 9999;
        }
        .download-modal-mess{
            
        }
        #jump-to-browser{
            width: 90%;
        }
    </style>
</head>
<body onload="down()">
    <div id="download-modal" class="download-modal" onclick="closeModal()">
        <div class="download-modal-mess">
            <!-- 提示跳转用户的图片 -->
            <img src="./img/live_weixin.png" id="jump-to-browser">
        </div>
    </div>
</body>
</html>