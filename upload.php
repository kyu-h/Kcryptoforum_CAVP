<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="main.css">
        <script src="http://code.jquery.com/jquery-1.10.2.js"></script> <!-- jquery 사용하고 싶을 경우  import -->
        <!--<script src="C:\\Bitnami\\wampstack-7.1.20-1\\apache2\\htdocs\\upload\\application\\up\\createfile2.js"></script>
        <script src="C:\\Bitnami\\wampstack-7.1.20-1\\apache2\\htdocs\\upload\\application\\up\\createfile_LEA.js"></script>-->
        <script src="./createfile2.js"></script>
        <script src="./createfile_LEA.js"></script>
    </head>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
<body>
    <p>Please click algorithm type and output bits!</p> <br>    
    <table style="">
      <tr>
        <th>Algorithm types</th>
        <th>Output Bits</th> 
      </tr>
      <tr>
        <td>
            <input type="radio" name="algo" value="LSH" checked=false> LSH<br>
            <input type="radio" name="algo" value="LEA"> LEA
        </td>

        <td>
            <div id="POP_LSH">
                <input type="radio" name="bits" value="256_224"> 256_224<br>
                <input type="radio" name="bits" value="256_256"> 256_256<br>
                <input type="radio" name="bits" value="512_224"> 512_224<br>
                <input type="radio" name="bits" value="512_256"> 512_256<br>
                <input type="radio" name="bits" value="512_384"> 512_384<br>
                <input type="radio" name="bits" value="512_512"> 512_512
            </div>

            <div id="POP_LEA" style="display: none;">
                <input type="radio" name="bits" value="128" checked="checked"> 128<br>
                <input type="radio" name="bits" value="192"> 192<br>
                <input type="radio" name="bits" value="256"> 256
            </div>
        </td>
      </tr>
    </table>
        
    <form method="POST">
        <input type = "button" id="button1" value="Send to Server" onclick="click_btn()">
    </form>

    <br><br>

    <p id="demo">파일은 모두 압축 후 압축 파일 '.zip'를 올려주시기 바랍니다. 만약 header file이 포함 된 파일의 경우 header file도 올리셔야합니다. </p>

    <form name="uploadForm" id="uploadForm_LSH" method="post" action="upload_process.php?algo=LSH" enctype="multipart/form-data" onsubmit="return formSubmit_LSH(this);">
        <div>
            <label for="upfile">첨부파일</label>
            <input type="file" name="upfile" id="upfile" />
        </div>
        <input type="submit" value="업로드" />
    </form>

    <form name="uploadForm" id="uploadForm_LEA" method="post" action="upload_process.php?algo=LEA" enctype="multipart/form-data" onsubmit="return formSubmit_LEA(this);" style="display: none;">
        <div>
            <label for="upfile2">첨부파일</label>
            <input type="file" name="upfile2" id="upfile2" />
        </div>
        <input type="submit" value="업로드!!" />
    </form>
    
    <script type="text/javascript">
        var cookie = document.cookie;
        var split_cookie = cookie.split('/');
        var algo = split_cookie[0];
        console.log(algo);
        
        if(algo == 'LEA'){
            console.log(algo+"!!!");
            window.onload = function() {
                $("input:radio[name='algo']:radio[value='LEA']").prop("checked", true);
                $("input:radio[name='algo']:radio[value='LSH']").prop("checked", false);
                
                $('#POP_LSH').css('display', 'none');
                $('#POP_LEA').css('display', 'block');
                
                $('#uploadForm_LSH').css('display', 'none');
                $('#uploadForm_LEA').css('display', 'block');
            }
        }
        
        function formSubmit_LSH(f) {
            var extArray = new Array('zip','c', 'h');
            var path = document.getElementById("upfile").value;
            if(path == "") {
                alert("파일을 선택해 주세요.");
                return false;
            }

            var pos = path.indexOf(".");
            if(pos < 0) {
                alert("확장자가 없는파일 입니다.");
                return false;
            }

            var ext = path.slice(path.indexOf(".") + 1).toLowerCase();
            
            console.log(ext);
            
            var file = ext.split('.');
            
            var checkExt = false;
            for(var i = 0; i < extArray.length; i++) {
                if(file[0] == extArray[i]) {
                    checkExt = true;
                    break;
                }
            }

            if(checkExt == false) {
                alert("업로드 할 수 없는 파일 확장자 입니다.");
                return false;
            }
            
            return true;
        }
        
        function formSubmit_LEA(f) {
            var extArray = new Array('zip','c', 'h');
            var path = document.getElementById("upfile2").value;
            if(path == "") {
                alert("파일을 선택해 주세요.");
                return false;
            }

            var pos = path.indexOf(".");
            if(pos < 0) {
                alert("확장자가 없는파일 입니다.");
                return false;
            }

            var ext = path.slice(path.indexOf(".") + 1).toLowerCase();
            
            console.log(ext);
            
            var file = ext.split('.');
            
            var checkExt = false;
            for(var i = 0; i < extArray.length; i++) {
                if(file[0] == extArray[i]) {
                    checkExt = true;
                    break;
                }
            }

            if(checkExt == false) {
                alert("업로드 할 수 없는 파일 확장자 입니다.");
                return false;
            }
            
            return true;
        }
        
        $('input[type=radio][name=algo]').on('click', function() {
            var chkvalue = $('input[type=radio][name=algo]:checked').val();

            if (chkvalue == 'LSH'){
                $('#POP_LSH').css('display', 'block');
                $('#POP_LEA').css('display', 'none');
                
                $('#uploadForm_LSH').css('display', 'block');
                $('#uploadForm_LEA').css('display', 'none');
            }else if(chkvalue == 'LEA'){
                $('#POP_LSH').css('display', 'none');
                $('#POP_LEA').css('display', 'block');
                
                $('#uploadForm_LSH').css('display', 'none');
                $('#uploadForm_LEA').css('display', 'block');
            }
        });

        function click_btn(){
            var AlgoradioVal = $(':radio[name="algo"]:checked').val();
            var BitsradioVal = $(':radio[name="bits"]:checked').val();
            
            var send_cookie = AlgoradioVal + "/" + BitsradioVal;
            
            console.log(send_cookie);

            if(AlgoradioVal == "LSH"){
                console.log(AlgoradioVal);
                console.log(BitsradioVal);  

                createFile256_224_();
                createFile256_256_();
                createFile512_224_();
                createFile512_256_();
                createFile512_384_();
                createFile512_512_();

                <?php
                    $current = "";
                    $answer = "";

                    putenv("PATH=C:\\Program Files (x86)\\mingw-w64\\i686-7.3.0-posix-dwarf-rt_v5-rev0\\mingw32\\bin");

                    shell_exec("gcc -c main.c");
                    shell_exec("gcc -c lsh.c");
                    shell_exec("gcc -c lsh256.c");
                    shell_exec("gcc -c lsh512.c");

                    shell_exec("gcc -o main.exe main.o lsh.o lsh256.o lsh512.o");

                    $answer = shell_exec("main.exe");
                ?>
                
                document.cookie = send_cookie;
                
                location.reload(); 
            }else {
                createFileLEA128();
                createFileLEA192();
                createFileLEA256();
                console.log("cccc");
                
                <?php
                    $current = "";
                    $answer = "";

                    putenv("PATH=C:\\Program Files (x86)\\mingw-w64\\i686-7.3.0-posix-dwarf-rt_v5-rev0\\mingw32\\bin");

                    shell_exec("gcc -c LEA_Main.c");
                    shell_exec("gcc -c LEA_Default.c");
                    shell_exec("gcc -c LEA_ConfigMode.c");

                    shell_exec("gcc -o lea_main.exe LEA_Main.o LEA_Default.o LEA_ConfigMode.o");

                    $answer = shell_exec("lea_main.exe");
                ?>
                
                document.cookie = send_cookie;
                
                $('#uploadForm_LSH').css('display', 'none');
                $('#uploadForm_LEA').css('display', 'block');
                location.reload(); 
                
                aa();
            }
        }

        function myFunction() {
            var x = document.getElementById("myFile");
            x.disabled = true;
        }
    </script>
</body>
</html>