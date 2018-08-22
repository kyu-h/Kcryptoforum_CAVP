function createFileLEA128(){
    var fileObject = new ActiveXObject("Scripting.FileSystemObject");

    var chars = "0123456789abcdef";
    var result = Math.floor(Math.random() * 30) + 1;
    var string_length = result;
    var randomstring = '';

    var BitsradioVal = $(':radio[name="bits"]:checked').val();

    fWrite = fileObject.CreateTextFile("C:\\Bitnami\\wampstack-7.1.20-1\\apache2\\htdocs\\upload\\application\\up\\BlockCipher_test\\LEA-128.txt", true);

    fWrite.write("Algo_ID = LEA-128");
    fWrite.write("\r\n");

    fWrite.write("PlainText = 100");
    fWrite.write("\r\n");
    
    for(var total_len = 0; total_len<100; total_len++){
        for(var num =0; num<16; num ++){
            for (var i=0; i<2; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }
            if(num == 0){
                fWrite.write('"'+randomstring+', ');    
            }else if(num == 15){
                fWrite.write(randomstring+'"');    
            }else {
                fWrite.write(randomstring+', ');    
            }
            randomstring = '';
        }
        fWrite.write("\r\n");        
    }
    
    fWrite.write("Key = 100");
    fWrite.write("\r\n");
    
    for(var total_len = 0; total_len<100; total_len++){
        for(var num =0; num<16; num ++){
            for (var i=0; i<2; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }
            if(num == 0){
                fWrite.write('"'+randomstring+', ');    
            }else if(num == 15){
                fWrite.write(randomstring+'"');    
            }else {
                fWrite.write(randomstring+', ');    
            }
            randomstring = '';
        }
        fWrite.write("\r\n");        
    }

    fWrite.close();
}

function createFileLEA192(){
    var fileObject = new ActiveXObject("Scripting.FileSystemObject");

    var chars = "0123456789abcdef";
    var result = Math.floor(Math.random() * 30) + 1;
    var string_length = result;
    var randomstring = '';

    var BitsradioVal = $(':radio[name="bits"]:checked').val();

    fWrite = fileObject.CreateTextFile("C:\\Bitnami\\wampstack-7.1.20-1\\apache2\\htdocs\\upload\\application\\up\\BlockCipher_test\\LEA-192.txt", true);

    fWrite.write("Algo_ID = LEA-192");
    fWrite.write("\r\n");

    fWrite.write("PlainText = 100");
    fWrite.write("\r\n");
    
    for(var total_len = 0; total_len<100; total_len++){
        for(var num =0; num<16; num ++){
            for (var i=0; i<2; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }
            if(num == 0){
                fWrite.write('"'+randomstring+', ');    
            }else if(num == 15){
                fWrite.write(randomstring+'"');    
            }else {
                fWrite.write(randomstring+', ');    
            }
            randomstring = '';
        }
        fWrite.write("\r\n");        
    }
    
    fWrite.write("Key = 100");
    fWrite.write("\r\n");
    
    for(var total_len = 0; total_len<100; total_len++){
        for(var num =0; num<24; num ++){
            for (var i=0; i<2; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }
            if(num == 0){
                fWrite.write('"'+randomstring+', ');    
            }else if(num == 23){
                fWrite.write(randomstring+'"');    
            }else {
                fWrite.write(randomstring+', ');    
            }
            randomstring = '';
        }
        fWrite.write("\r\n");        
    }

    fWrite.close();
}

function createFileLEA256(){
    var fileObject = new ActiveXObject("Scripting.FileSystemObject");

    var chars = "0123456789abcdef";
    var result = Math.floor(Math.random() * 30) + 1;
    var string_length = result;
    var randomstring = '';

    var BitsradioVal = $(':radio[name="bits"]:checked').val();

    fWrite = fileObject.CreateTextFile("C:\\Bitnami\\wampstack-7.1.20-1\\apache2\\htdocs\\upload\\application\\up\\BlockCipher_test\\LEA-256.txt", true);

    fWrite.write("Algo_ID = LEA-256");
    fWrite.write("\r\n");

    fWrite.write("PlainText = 100");
    fWrite.write("\r\n");
    
    for(var total_len = 0; total_len<100; total_len++){
        for(var num =0; num<16; num ++){
            for (var i=0; i<2; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }
            if(num == 0){
                fWrite.write('"'+randomstring+', ');    
            }else if(num == 15){
                fWrite.write(randomstring+'"');    
            }else {
                fWrite.write(randomstring+', ');    
            }
            randomstring = '';
        }
        fWrite.write("\r\n");        
    }
    
    fWrite.write("Key = 100");
    fWrite.write("\r\n");
    
    for(var total_len = 0; total_len<100; total_len++){
        for(var num =0; num<32; num ++){
            for (var i=0; i<2; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }
            if(num == 0){
                fWrite.write('"'+randomstring+', ');    
            }else if(num == 31){
                fWrite.write(randomstring+'"');    
            }else {
                fWrite.write(randomstring+', ');    
            }
            randomstring = '';
        }
        fWrite.write("\r\n");        
    }

    fWrite.close();
}