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

    document.getElementById("txtInput").innerHTML="저장되었습니다.";
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

    document.getElementById("txtInput").innerHTML="저장되었습니다.";
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

    document.getElementById("txtInput").innerHTML="저장되었습니다.";
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

    document.getElementById("txtInput").innerHTML="저장되었습니다.";
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

    document.getElementById("txtInput").innerHTML="저장되었습니다.";
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

    document.getElementById("txtInput").innerHTML="저장되었습니다.";
}

function aa(){
    console.log("aaa");
}