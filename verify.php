<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="main.css">
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script> <!-- jquery 사용하고 싶을 경우  import -->
<title>verify</title>
</head>
<body>
    <?php
        include('pclzip.lib.php'); 
        //***********압축 폴더 내부 파일 가져오기**********//
        //***********C파일만 골라서 가져오기**********//
        // PclZip 객체를 생성합니다. 
        // 목록을 가져올 파일을 선택합니다. 
    
        $algo = $_GET['algo'];
        
        if($algo == "LSH"){
            $zipfile = new PclZip('Hash_test/LSH_NEW.zip');      
        }else if($algo == "LEA"){
            $zipfile = new PclZip('Hash_test/LEA_NEW.zip');      
        }
        
        //**********압축 풀기************//
        //$zipfile = new PclZip('test.zip');
    
        $extract = $zipfile->extract(PCLZIP_OPT_PATH, './');
        
        if(!empty($extract)){
            echo "LSH_NEW.zip extract succesfully<br>";
        }else{
            echo "failed to extract<br>";
        } 
    
        // 엔트리 얻기 
        $list = $zipfile->listContent(); 
        $list_count = count($list);
        $ext_str = "c, C";
        $allowed_extensions = explode(',', $ext_str);
        $cFile = "";
        $j = 0;
        for($i = 0; $i<$list_count; $i++){
            //echo $list[$i][filename] . " ";
            $ext = substr($list[$i][filename], strrpos($list[$i][filename], '.') + 1);
            // 확장자 체크
            if(in_array($ext, $allowed_extensions)) {                
                $cFile = explode('.', $list[$i][filename]);
                $Carray[$j] = $cFile[0];
                $CC[$j] = $cFile[0];
                $Carray[$j] .= ".o ";
                $CC[$j] .= ".c ";
                
                echo $CC[$j] . " / ";
                echo $Carray[$j++] . " / ";
            }
        }
    
        $Cfinal = "";
    
        if($algo == "LSH"){
            for($i=0; $i<count($Carray); $i++){
                $Cmiddle = explode('/', $Carray[$i]);

                $Cfinal .= $Cmiddle[1];
            }
            echo $Cfinal."<br>";    
        }else {
            for($i=0; $i<count($Carray); $i++){
                $Cfinal .= $Carray[$i];
            }
            echo $Cfinal."<br>";
        }
    
        //************gcc compiler*****************//
        putenv("PATH=C:\\Program Files (x86)\\mingw-w64\\i686-7.3.0-posix-dwarf-rt_v5-rev0\\mingw32\\bin");
        for($i = 0; $i < count($CC); $i++){
            shell_exec("gcc -c " . $CC[$i]);
        }
        
        if($algo == "LSH"){
            shell_exec("gcc -o user_test_lsh.exe " . $Cfinal);
            shell_exec("user_test_lsh.exe");    
        }else if($algo == "LEA"){
            shell_exec("gcc -o user_test_lea.exe " . $Cfinal);
            shell_exec("user_test_lea.exe");    
        }
    ?>
        
    <script>
        var cookie = document.cookie;
        console.log(cookie);
        
        var split_cookie = cookie.split('/');
        
        var algo = split_cookie[0];
        var bits = split_cookie[1];
        var config = "";
        
        if(algo == "LEA"){
            config = split_cookie[2];
            console.log(config);
        }
        
        var text_rsp = "";
        var text_cp = "";
        
        if(text_cp == text_rsp){
            document.writeln("<br>Perfectly matched!!<br><br>");
        }else{
            document.writeln("There are some errors..<br>");
        }
        
        if(algo == "LSH"){
            console.log("LSH");
            var input = "C:\\Bitnami\\wampstack-7.1.20-1\\apache2\\htdocs\\upload\\application\\up\\Hash_test\\LSH-"+bits+".txt";
            var filename_rsp = "C:\\Bitnami\\wampstack-7.1.20-1\\apache2\\htdocs\\upload\\application\\up\\Hash_test\\LSH-"+bits+"_rsp.txt";
            var filename_cp = "C:\\Bitnami\\wampstack-7.1.20-1\\apache2\\htdocs\\upload\\application\\up\\Hash_test\\LSH-"+bits+"_cp.txt";
            
            document.writeln("<br /><br />");
            document.writeln("Input file<br>");
            inputFile(input);
            document.writeln("<br /><br /><br />");
            document.writeln("Local system output file <br>");
            readFile_rsp(filename_rsp);
            document.writeln("<br /><br /><br />");
            document.writeln("User system output file <br>");
            readFile_cp(filename_cp);    

            $(window).ready(function(){
                console.log("load");

            });    
        }else if (algo == "LEA" && config == "ECB"){
            console.log("LEA");
            var input = "C:\\Bitnami\\wampstack-7.1.20-1\\apache2\\htdocs\\upload\\application\\up\\BlockCipher_test\\LEA-"+bits+".txt";
            var filename_rsp = "C:\\Bitnami\\wampstack-7.1.20-1\\apache2\\htdocs\\upload\\application\\up\\BlockCipher_test\\LEA-"+bits+"_rsp.txt";
            var filename_cp = "C:\\Bitnami\\wampstack-7.1.20-1\\apache2\\htdocs\\upload\\application\\up\\BlockCipher_test\\LEA-"+bits+"_cp.txt";
            
            document.writeln("Input file<br>");
            inputFile(input);
            document.writeln("<br /><br /><br />");
            document.writeln("Local system output file <br>");
            readFile_rsp(filename_rsp);
            document.writeln("<br /><br /><br />");
            document.writeln("User system output file <br>");
            readFile_cp(filename_cp);

            $(window).ready(function(){
                console.log("load");

            }); 
        }else if (algo == "LEA" && config == "CBC"){
            console.log("LEA");
            var input = "C:\\Bitnami\\wampstack-7.1.20-1\\apache2\\htdocs\\upload\\application\\up\\BlockCipher_test\\LEA-"+bits+".txt";
            var filename_rsp = "C:\\Bitnami\\wampstack-7.1.20-1\\apache2\\htdocs\\upload\\application\\up\\BlockCipher_test\\LEA_CBC-"+bits+"_rsp.txt";
            var filename_cp = "C:\\Bitnami\\wampstack-7.1.20-1\\apache2\\htdocs\\upload\\application\\up\\BlockCipher_test\\LEA_CBC-"+bits+"_cp.txt";
            
            document.writeln("Input file<br>");
            inputFile(input);
            document.writeln("<br /><br /><br />");
            document.writeln("Local system output file <br>");
            readFile_rsp(filename_rsp);
            document.writeln("<br /><br /><br />");
            document.writeln("User system output file <br>");
            readFile_cp(filename_cp);

            $(window).ready(function(){
                console.log("load");

            }); 
        }else if (algo == "LEA" && config == "CTR"){
            console.log("LEA");
            var input = "C:\\Bitnami\\wampstack-7.1.20-1\\apache2\\htdocs\\upload\\application\\up\\BlockCipher_test\\LEA-"+bits+".txt";
            var filename_rsp = "C:\\Bitnami\\wampstack-7.1.20-1\\apache2\\htdocs\\upload\\application\\up\\BlockCipher_test\\LEA_CTR-"+bits+"_rsp.txt";
            var filename_cp = "C:\\Bitnami\\wampstack-7.1.20-1\\apache2\\htdocs\\upload\\application\\up\\BlockCipher_test\\LEA_CTR-"+bits+"_cp.txt";
            
            document.writeln("Input file<br>");
            inputFile(input);
            document.writeln("<br /><br /><br />");
            document.writeln("Local system output file <br>");
            readFile_rsp(filename_rsp);
            document.writeln("<br /><br /><br />");
            document.writeln("User system output file <br>");
            readFile_cp(filename_cp);

            $(window).ready(function(){
                console.log("load");

            }); 
        }
        
        function inputFile(input){
            console.log(input);
            var fso = new ActiveXObject("Scripting.FileSystemObject");    
            var ForReading = 1;
            var f1 = fso.OpenTextFile(input, ForReading);
            var text = f1.ReadAll();
            console.log(text);
            document.writeln(text);
            f1.close();
            return text;
        }
        
        function readFile_rsp(filename_rsp){
            console.log(filename_rsp);
            var fso = new ActiveXObject("Scripting.FileSystemObject");    
            var ForReading = 1;
            var f1 = fso.OpenTextFile(filename_rsp, ForReading);
            text_rsp = f1.ReadAll();
            console.log(text_rsp);
            document.writeln(text_rsp);
            f1.close();
            return text_rsp;
        }

        function readFile_cp(filename_cp){
            console.log(filename_cp);
            var fso = new ActiveXObject("Scripting.FileSystemObject");    
            var ForReading = 1;
            var f1 = fso.OpenTextFile(filename_cp, ForReading);
            text_cp = f1.ReadAll();
            console.log(text_cp);
            document.writeln(text_cp);
            f1.close();
            return text_cp;
        }
        
        document.writeln("<br><br><br>");
        
        
    </script>
</body>
</html>