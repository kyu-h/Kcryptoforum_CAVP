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
        $zipfile = new PclZip('Hash_test/LSH_NEW.zip');  
    
        //**********압축 풀기************//
        //$zipfile = new PclZip('test.zip');
    
        $extract = $zipfile->extract(PCLZIP_OPT_PATH, './');
        
        if(!empty($extract)){
            echo "LSH_NEW.zip extract succesfully";
        }else{
            echo "failed to extract";
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
                
                echo $CC[$j] . "<br>";
                echo $Carray[$j++] . "<br>";
            }
        }
    
        $Cfinal = "";
        for($i=0; $i<count($Carray); $i++){
            $Cmiddle = explode('/', $Carray[$i]);
            
            $Cfinal .= $Cmiddle[1];
        }
        echo $Cfinal."<br>";
    
    
        //************gcc compiler*****************//
        putenv("PATH=C:\\Program Files (x86)\\mingw-w64\\i686-7.3.0-posix-dwarf-rt_v5-rev0\\mingw32\\bin");
        for($i = 0; $i < count($CC); $i++){
            shell_exec("gcc -c " . $CC[$i]);
        }
        
        shell_exec("gcc -o user_test.exe " . $Cfinal);
        shell_exec("user_test.exe");
    
        /*echo "System output <br>";
    
        if (isset($_COOKIE["cookie"])) {
            echo "Welcome " . $_COOKIE["user"] . "!<br/>";
        } else {
            echo "There are no cookies<br/>";
        }*/
    
        echo "aa: ";
        echo $good."<br>";
    
    
        $aa = "512_384";
        $bits = '<script>document.write(bits);</script>';
        echo $bits."<br>";
    
        if(!strcmp($bits, $aa)){
            echo "same";
        }else {
            echo $bits."==".$aa;
            echo "different";
        }
        
        //$file_location = "Hash_test/LSH-".$bits."_rsp.txt"
        
        $handle_rsp = fopen("Hash_test/LSH-512_384_rsp.txt", "r"); //읽기 모드로 text문서 열기  
        $lineRead_rsp = 0;
    
        if(!$handle_rsp) die("Not Found!!!<br>");//실패시 경고문

        for ($i=0 ; !feof($handle_rsp) ; $i++) { //텍스트 문서에서 한줄한줄 읽어와 배열에 저장
            $buffer_rsp[$i] = fgets($handle_rsp, 1000);
            echo $i."번째 줄 : ".$buffer_rsp[$i]."<br/>";
            $lineRead_rsp++;
        }
        fclose($handle);//파일 닫기  
    
        echo "<br><br>";
    
        echo "User's output <br>";
        $handle_cp = fopen("Hash_test/LSH-512_384_cp.txt", "r"); //읽기 모드로 text문서 열기
        $lineRead_cp = 0;
    
        if(!$handle_cp) die("Not Found!!!<br>");//실패시 경고문

        for ($i=0 ; !feof($handle_cp) ; $i++) { //텍스트 문서에서 한줄한줄 읽어와 배열에 저장
            $buffer_cp[$i] = fgets($handle_cp, 1000);
            echo $i."번째 줄 : ".$buffer_cp[$i]."<br/>";
            $lineRead_cp++;
        }
        fclose($handle_cp);//파일 닫기
    
        echo "<br><br>";
    
        for($i=0; $i<$lineRead_rsp; $i++){
            if($buffer_rsp[$i] != $buffer_cp[$i]){
                echo "rsp: ".$i."번째 줄 : ".$buffer_rsp[$i]."<br/>";
                echo "cp:  ".$i."번째 줄 : ".$buffer_cp[$i]."<br/>";
            }else {
                $count = 0;
            }
        }
        
        if($count == 0){
            echo "Perfectly matched!!<br>";
        }
        
    ?>
</body>
</html>