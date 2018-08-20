<!DOCTYPE html>
<html lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
        
        $extract = $zipfile->extract(PCLZIP_OPT_PATH, '/');
        
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

        echo $Cfinal;

    
        //************gcc compiler*****************//
        putenv("PATH=C:\\Program Files (x86)\\mingw-w64\\i686-7.3.0-posix-dwarf-rt_v5-rev0\\mingw32\\bin");

        for($i = 0; $i < count($CC); $i++){
            shell_exec("gcc -c " . $CC[$i]);
        }
        
        shell_exec("gcc -o user_test.exe " . $Cfinal);
        shell_exec("user_test.exe");
    ?>
</body>
</html>