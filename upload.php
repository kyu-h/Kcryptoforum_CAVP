<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="main.css">
        <script src="http://code.jquery.com/jquery-1.10.2.js"></script> <!-- jquery 사용하고 싶을 경우  import -->
        <!--<script src="C:\\Bitnami\\wampstack-7.1.20-1\\apache2\\htdocs\\upload\\application\\upcreatefile2.js"></script>-->
    </head>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
<body>
    
    <p>Please click algorithm type and output bits!!!</p> <br>
        <table style="">
          <tr>
            <th>Algorithm types</th>
            <th>Output Bits</th> 
          </tr>
          <tr>
            <td>
                <input type="radio" name="algo" value="LSH" checked="checked"> LSH<br>
                <input type="radio" name="algo" value="LEA"> LEA
            </td>
            
            <td>
                <div id="POP_LSH">
                    <input type="radio" name="bits" value="256_224" checked="checked"> 256_224<br>
                    <input type="radio" name="bits" value="256_256"> 256_256<br>
                    <input type="radio" name="bits" value="512_224"> 512_224<br>
                    <input type="radio" name="bits" value="512_256"> 512_256<br>
                    <input type="radio" name="bits" value="512_384"> 512_384<br>
                    <input type="radio" name="bits" value="512_512"> 512_512
                </div>
                
                <div id="POP_LEA" style="display: none;">
                    <input type="radio" name="bits" value="224" checked="checked"> 224<br>
                    <input type="radio" name="bits" value="256"> 256<br>
                    <input type="radio" name="bits" value="384"> 384<br>
                    <input type="radio" name="bits" value="512"> 512
                </div>
            </td>
          </tr>
        </table>
        
        <form method="POST">
            <input type = "button" id="button1" value="Send to Server" onclick="click_btn()">
        </form>
        
        <br><br>
    
        <p id="demo">파일은 모두 압축 후 압축 파일 '.zip'를 올려주시기 바랍니다. 만약 header file이 포함 된 파일의 경우 header file도 올리셔야합니다. </p>
    
        <form name="uploadForm" id="uploadForm" method="post" action="upload_process.php" enctype="multipart/form-data" onsubmit="return formSubmit(this);">
            <div>
                <label for="upfile">첨부파일</label>
                <input type="file" name="upfile" id="upfile" />
            </div>
            <input type="submit" value="업로드" />
        </form>
    
    <script type="text/javascript">
        
        function formSubmit(f) {
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
        
        $('input[type=radio][name=algo]').on('click', function() {
            var chkvalue = $('input[type=radio][name=algo]:checked').val();

            if (chkvalue == 'LSH'){
                $('#POP_LSH').css('display', 'block');
                $('#POP_LEA').css('display', 'none');
            }else if(chkvalue == 'LEA'){
                $('#POP_LSH').css('display', 'none');
                $('#POP_LEA').css('display', 'block');
            }
        });

        function click_btn(){
            var AlgoradioVal = $(':radio[name="algo"]:checked').val();
            var BitsradioVal = $(':radio[name="bits"]:checked').val();

            if(AlgoradioVal == "LSH"){
                console.log(AlgoradioVal);
                console.log(BitsradioVal);  

                createFile256_224_();
                createFile256_256_();
                createFile512_224_();
                createFile512_256_();
                createFile512_384_();
                createFile512_512_();

                //magnifier();

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
                
                document.cookie = BitsradioVal;
                
                location.reload(); 
            }else {
                randomString();
            }
        }

        function magnifier(){
            try{
                var objWSH = new ActiveXObject("WScript.Shell"); 
                var BitsradioVal = $(':radio[name="bits"]:checked').val();
                var retval = objWSH.Run("C:\\Users\\kyu\\Desktop\\Kcryptoforum_CAVP\\LSH-"+BitsradioVal+".exe");  
            }catch(exception){
                alert("There is some error!");
            }
        } 

        function randomString() {
            var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
            var result = Math.floor(Math.random() * 30) + 1;
            var string_length = result;
            var randomstring = '';

            for (var i=0; i<string_length; i++) {
            var rnum = Math.floor(Math.random() * chars.length);
            randomstring += chars.substring(rnum,rnum+1);
            }

            //document.randform.randomfield.value = randomstring;

            console.log(randomstring);
            //return randomstring;
        }
        
        function verify(){
            console.log("tttt");
        }

        function myFunction() {
            var x = document.getElementById("myFile");
            x.disabled = true;
        }
        
        function createFile256_224_(){
            var fileObject = new ActiveXObject("Scripting.FileSystemObject");

            var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
            var result = Math.floor(Math.random() * 30) + 1;
            var string_length = result;
            var randomstring = '';

            var BitsradioVal = $(':radio[name="bits"]:checked').val();

            fWrite = fileObject.CreateTextFile("C:\\Bitnami\\wampstack-7.1.20-1\\apache2\\htdocs\\upload\\application\\up\\Hash_test\\LSH-256_224.txt", true);

            fWrite.write("Algo_ID = LSH-" + BitsradioVal);
            fWrite.write("\r\n");

            fWrite.write("Message = 5");
            fWrite.write("\r\n");

            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }

            fWrite.write('"'+randomstring+'"');
            fWrite.write("\r\n");

            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }

            fWrite.write('"'+randomstring+'"');
            fWrite.write("\r\n");

            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }

            fWrite.write('"'+randomstring+'"');
            fWrite.write("\r\n");

            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }

            fWrite.write('"'+randomstring+'"');
            fWrite.write("\r\n");

            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }

            fWrite.write('"'+randomstring+'"');
            fWrite.write("\r\n");

            fWrite.close();
        }

        function createFile256_256_(){
            var fileObject = new ActiveXObject("Scripting.FileSystemObject");

            var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
            var result = Math.floor(Math.random() * 30) + 1;
            var string_length = result;
            var randomstring = '';

            var BitsradioVal = $(':radio[name="bits"]:checked').val();

            fWrite = fileObject.CreateTextFile("C:\\Bitnami\\wampstack-7.1.20-1\\apache2\\htdocs\\upload\\application\\up\\Hash_test\\LSH-256_256.txt", true);

            fWrite.write("Algo_ID = LSH-" + BitsradioVal);
            fWrite.write("\r\n");

            fWrite.write("Message = 5");
            fWrite.write("\r\n");

            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }

            fWrite.write('"'+randomstring+'"');
            fWrite.write("\r\n");

            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }

            fWrite.write('"'+randomstring+'"');
            fWrite.write("\r\n");

            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }

            fWrite.write('"'+randomstring+'"');
            fWrite.write("\r\n");

            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }

            fWrite.write('"'+randomstring+'"');
            fWrite.write("\r\n");

            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }

            fWrite.write('"'+randomstring+'"');
            fWrite.write("\r\n");

            fWrite.close();
        }

        function createFile512_224_(){
            var fileObject = new ActiveXObject("Scripting.FileSystemObject");

            var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
            var result = Math.floor(Math.random() * 30) + 1;
            var string_length = result;
            var randomstring = '';

            var BitsradioVal = $(':radio[name="bits"]:checked').val();

            fWrite = fileObject.CreateTextFile("C:\\Bitnami\\wampstack-7.1.20-1\\apache2\\htdocs\\upload\\application\\up\\Hash_test\\LSH-512_224.txt", true);

            fWrite.write("Algo_ID = LSH-" + BitsradioVal);
            fWrite.write("\r\n");

            fWrite.write("Message = 5");
            fWrite.write("\r\n");

            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }

            fWrite.write('"'+randomstring+'"');
            fWrite.write("\r\n");

            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }

            fWrite.write('"'+randomstring+'"');
            fWrite.write("\r\n");

            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }

            fWrite.write('"'+randomstring+'"');
            fWrite.write("\r\n");

            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }

            fWrite.write('"'+randomstring+'"');
            fWrite.write("\r\n");

            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }

            fWrite.write('"'+randomstring+'"');
            fWrite.write("\r\n");

            fWrite.close();
        }

        function createFile512_256_(){
            var fileObject = new ActiveXObject("Scripting.FileSystemObject");

            var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
            var result = Math.floor(Math.random() * 30) + 1;
            var string_length = result;
            var randomstring = '';

            var BitsradioVal = $(':radio[name="bits"]:checked').val();

            fWrite = fileObject.CreateTextFile("C:\\Bitnami\\wampstack-7.1.20-1\\apache2\\htdocs\\upload\\application\\up\\Hash_test\\LSH-512_256.txt", true);

            fWrite.write("Algo_ID = LSH-" + BitsradioVal);
            fWrite.write("\r\n");

            fWrite.write("Message = 5");
            fWrite.write("\r\n");

            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }

            fWrite.write('"'+randomstring+'"');
            fWrite.write("\r\n");

            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }

            fWrite.write('"'+randomstring+'"');
            fWrite.write("\r\n");

            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }

            fWrite.write('"'+randomstring+'"');
            fWrite.write("\r\n");

            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }

            fWrite.write('"'+randomstring+'"');
            fWrite.write("\r\n");

            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }

            fWrite.write('"'+randomstring+'"');
            fWrite.write("\r\n");

            fWrite.close();
        }

        function createFile512_384_(){
            var fileObject = new ActiveXObject("Scripting.FileSystemObject");

            var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
            var result = Math.floor(Math.random() * 30) + 1;
            var string_length = result;
            var randomstring = '';

            var BitsradioVal = $(':radio[name="bits"]:checked').val();

            fWrite = fileObject.CreateTextFile("C:\\Bitnami\\wampstack-7.1.20-1\\apache2\\htdocs\\upload\\application\\up\\Hash_test\\LSH-512_384.txt", true);

            fWrite.write("Algo_ID = LSH-" + BitsradioVal);
            fWrite.write("\r\n");

            fWrite.write("Message = 5");
            fWrite.write("\r\n");

            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }

            fWrite.write('"'+randomstring+'"');
            fWrite.write("\r\n");

            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }

            fWrite.write('"'+randomstring+'"');
            fWrite.write("\r\n");

            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }

            fWrite.write('"'+randomstring+'"');
            fWrite.write("\r\n");

            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }

            fWrite.write('"'+randomstring+'"');
            fWrite.write("\r\n");

            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }

            fWrite.write('"'+randomstring+'"');
            fWrite.write("\r\n");

            fWrite.close();
        }

        function createFile512_512_(){
            var fileObject = new ActiveXObject("Scripting.FileSystemObject");

            var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
            var result = Math.floor(Math.random() * 30) + 1;
            var string_length = result;
            var randomstring = '';

            var BitsradioVal = $(':radio[name="bits"]:checked').val();

            fWrite = fileObject.CreateTextFile("C:\\Bitnami\\wampstack-7.1.20-1\\apache2\\htdocs\\upload\\application\\up\\Hash_test\\LSH-512_512.txt", true);

            fWrite.write("Algo_ID = LSH-" + BitsradioVal);
            fWrite.write("\r\n");

            fWrite.write("Message = 5");
            fWrite.write("\r\n");

            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }

            fWrite.write('"'+randomstring+'"');
            fWrite.write("\r\n");

            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }

            fWrite.write('"'+randomstring+'"');
            fWrite.write("\r\n");

            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }

            fWrite.write('"'+randomstring+'"');
            fWrite.write("\r\n");

            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }

            fWrite.write('"'+randomstring+'"');
            fWrite.write("\r\n");

            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }

            fWrite.write('"'+randomstring+'"');
            fWrite.write("\r\n");

            fWrite.close();
        }
        
    </script>
</body>
</html>