# Kcryptoforum_CAVP
LEA, LSH web compiler

To make a Korean version Cryptographic Algorithm Validation Program that are LEA and LSH. <br>
I got the idea from <a href="https://csrc.nist.gov/Projects/Cryptographic-Algorithm-Validation-Program" target="_blank">NIST</a> <br>

<hr>

Can get the LEA original source code at <a href="https://seed.kisa.or.kr/iwt/ko/bbs/EgovReferenceDetail.do?bbsId=BBSMSTR_000000000002&nttId=88" target="_blank">KISA</a> <br>
Can get the LSH original source code at <a href="https://seed.kisa.or.kr/iwt/ko/bbs/EgovReferenceDetail.do?bbsId=BBSMSTR_000000000002&nttId=90" target="_blank">KISA</a> <br>

<hr>

1) After selecting the algorithm and output bits and sending them to the server, the server generates the verification file. (At least 100 plaintexts, keys, etc. are written in the verification file.) <br>
2) At this time, based on the generated verification file, rotate the c file on the server to generate the fact file.<br>
3) The user compresses the files he wants to be verified and puts them on the server.<br>
4) The compressed file uploaded to the server is automatically released and compiled with gcc compiler.<br>
5) When the compilation is completed, a file-based output file created by the user is created. <br>
6) Compare the server output file with the user output file and export the same or wrong output. <br>
7) On the screen, three output files are displayed: input file, output (in order of server and user).<br>

Implementation video <a href="https://youtu.be/RqbyueLEED8" target="_blank">Youtube link</a>
