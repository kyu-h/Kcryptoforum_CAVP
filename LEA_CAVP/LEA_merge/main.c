#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include "LEA.h"
#include "ConfigMode.h"

#define TEXT_BYTE_LENGTH 64
#define MAX_MARKER_LEN 4096

int FindMarker(FILE *infile, const char *marker){
    char    line[MAX_MARKER_LEN];
    int     i, len;

    len = (int)strlen(marker);
    if ( len > MAX_MARKER_LEN-1 )
        len = MAX_MARKER_LEN-1;

    for ( i=0; i<len; i++ )
        if ( (line[i] = fgetc(infile)) == EOF )
            return 0;
    line[len] = '\0';

    while ( 1 ) {
        if ( !strncmp(line, marker, len) )
            return 1;

        for ( i=0; i<len-1; i++ )
        	line[i] = line[i+1];

        if ( (line[len-1] = fgetc(infile)) == EOF )
			return 0;
        line[len] = '\0';
    }

    /* shouldn't get here */
    return 0;
}

void LEA_128(const char *inputFileName, const char *outputFileName){
	unsigned char ct[16] = {0x00, };
	unsigned char pt_128[16] = {0x10, 0x11, 0x12, 0x13, 0x14, 0x15, 0x16, 0x17, 0x18, 0x19, 0x1a, 0x1b, 0x1c, 0x1d, 0x1e, 0x1f};
	unsigned char k_128[16]	= {0x0f, 0x1e, 0x2d, 0x3c, 0x4b, 0x5a, 0x69, 0x78, 0x87, 0x96, 0xa5, 0xb4, 0xc3, 0xd2, 0xe1, 0xf0};

	unsigned char Key[MAX_MARKER_LEN];
	unsigned char *split_Key[16] = {NULL, };
	unsigned char Hex_Key[16] = {NULL, };
	unsigned char PlainText[MAX_MARKER_LEN];
	unsigned char *split_PlainText[16] = {NULL, };
	unsigned char Hex_Plain[16] = {NULL, };
	char str;
	char *str_Key = NULL;
	char *str_Plain = NULL;
	int KeyNum, PlainNum = 0;
	int num, z,k = 0;

	FILE *fp_in, *fp_out;

	if ( (fp_in = fopen(inputFileName, "r")) == NULL ) {
		printf("Couldn't open <ShortMsgKAT.txt> for read\n");
	}

	fp_out = fopen(outputFileName, "w");

	FindMarker(fp_in, "PlainText");
	fscanf(fp_in, " %c %d", &str, &PlainNum);

	for(int i=0; i<PlainNum; i++){
		fgets(PlainText, MAX_MARKER_LEN, fp_in); //skip line
		fgets(PlainText, MAX_MARKER_LEN, fp_in);
	}

	//************remove " **************//
	PlainText[strlen(PlainText) - 1] = '\0';

	for(z = 0, k = 0 ; z < strlen(PlainText) ; z++){
		if(PlainText[z] != '\"')
			PlainText[k++] = PlainText[z];
	}
	PlainText[k] = '\0';

	//***************split***************//
	str_Plain = strtok(PlainText, ", ");

	while(str_Plain != NULL){
		split_PlainText[num++] = str_Plain;
		str_Plain = strtok(NULL, ", ");
	}

	printf("Plain: ");
	for(int i=0; i<16; i++){
		if(split_PlainText[i] != NULL){
			printf("%s ", split_PlainText[i]);
		}
	}

	//**********string to Hex**********//
	for(int a = 0, b = 0 ; b < 16; b++){
	   unsigned char temp_arr[3] = {split_PlainText[b][0], split_PlainText[b][1], '\0'};
	   Hex_Plain[b] = strtol(temp_arr, NULL, 16);
	}

	num = 0;

	FindMarker(fp_in, "Key");
	fscanf(fp_in, " %c %d", &str, &KeyNum);

	for(int i=0; i<KeyNum; i++){
		fgets(Key, MAX_MARKER_LEN, fp_in); //skip line
		fgets(Key, MAX_MARKER_LEN, fp_in);
	}

	//************remove " **************//
	Key[strlen(Key) - 1] = '\0';

	for(z = 0, k = 0 ; z < strlen(Key) ; z++){
		if(Key[z] != '\"')
			Key[k++] = Key[z];
	}
	Key[k] = '\0';

	//***************split***************//
	str_Key = strtok(Key, ", ");

	while(str_Key != NULL){
		split_Key[num++] = str_Key;
		str_Key = strtok(NULL, ", ");
	}

	printf("Key: ");
	for(int i=0; i<16; i++){
		if(split_Key[i] != NULL){
			printf("%s ", split_Key[i]);
		}
	}
	printf("\n");

	//**********string to Hex**********//
	for(int a = 0, b = 0 ; b < 16; b++){
	   unsigned char temp_arr[3] = {split_Key[b][0], split_Key[b][1], '\0'};
	   Hex_Key[b] = strtol(temp_arr, NULL, 16);
	}

	KeySchedule_enc_128(Hex_Key);
	encrypt_128(Hex_Plain, ct);
	printf("\n");
}

void LEA_192(const char *inputFileName, const char *outputFileName){
	unsigned char ct[16] = {0x00, };

	unsigned char Key[MAX_MARKER_LEN];
	unsigned char *split_Key[32] = {NULL, };
	unsigned char Hex_Key[32] = {NULL, };
	unsigned char PlainText[MAX_MARKER_LEN];
	unsigned char *split_PlainText[16] = {NULL, };
	unsigned char Hex_Plain[16] = {NULL, };
	char str;
	char *str_Key = NULL;
	char *str_Plain = NULL;
	int KeyNum, PlainNum = 0;
	int num, z,k = 0;

	FILE *fp_in, *fp_out;

	if ( (fp_in = fopen(inputFileName, "r")) == NULL ) {
		printf("Couldn't open <ShortMsgKAT.txt> for read\n");
	}

	fp_out = fopen(outputFileName, "w");

	FindMarker(fp_in, "PlainText");
	fscanf(fp_in, " %c %d", &str, &PlainNum);

	for(int i=0; i<PlainNum; i++){
		fgets(PlainText, MAX_MARKER_LEN, fp_in); //skip line
		fgets(PlainText, MAX_MARKER_LEN, fp_in);
	}

	//************remove " **************//
	PlainText[strlen(PlainText) - 1] = '\0';

	for(z = 0, k = 0 ; z < strlen(PlainText) ; z++){
		if(PlainText[z] != '\"')
			PlainText[k++] = PlainText[z];
	}
	PlainText[k] = '\0';

	//***************split***************//
	str_Plain = strtok(PlainText, ", ");

	while(str_Plain != NULL){
		split_PlainText[num++] = str_Plain;
		str_Plain = strtok(NULL, ", ");
	}

	printf("Plain: ");
	for(int i=0; i<16; i++){
		if(split_PlainText[i] != NULL){
			printf("%s ", split_PlainText[i]);
		}
	}

	//**********string to Hex**********//
	for(int a = 0, b = 0 ; b < 16; b++){
	   unsigned char temp_arr[3] = {split_PlainText[b][0], split_PlainText[b][1], '\0'};
	   Hex_Plain[b] = strtol(temp_arr, NULL, 16);
	}

	num = 0;

	FindMarker(fp_in, "Key");
	fscanf(fp_in, " %c %d", &str, &KeyNum);

	for(int i=0; i<KeyNum; i++){
		fgets(Key, MAX_MARKER_LEN, fp_in); //skip line
		fgets(Key, MAX_MARKER_LEN, fp_in);
	}

	//************remove " **************//
	Key[strlen(Key) - 1] = '\0';

	for(z = 0, k = 0 ; z < strlen(Key) ; z++){
		if(Key[z] != '\"')
			Key[k++] = Key[z];
	}
	Key[k] = '\0';

	//***************split***************//
	str_Key = strtok(Key, ", ");

	while(str_Key != NULL){
		split_Key[num++] = str_Key;
		str_Key = strtok(NULL, ", ");
	}

	printf("Key: ");
	for(int i=0; i<32; i++){
		if(split_Key[i] != NULL){
			printf("%s ", split_Key[i]);
		}
	}
	printf("\n");

	//**********string to Hex**********//
	for(int a = 0, b = 0 ; b < 32; b++){
	   unsigned char temp_arr[3] = {split_Key[b][0], split_Key[b][1], '\0'};
	   Hex_Key[b] = strtol(temp_arr, NULL, 16);
	}

	KeySchedule_enc_192(Hex_Key);
	encrypt_192(Hex_Plain, ct);

	printf("\n");
}

void LEA_256(const char *inputFileName, const char *outputFileName){
	unsigned char ct[16] = {0x00, };

	unsigned char Key[MAX_MARKER_LEN];
	unsigned char *split_Key[32] = {NULL, };
	unsigned char Hex_Key[32] = {NULL, };
	unsigned char PlainText[MAX_MARKER_LEN];
	unsigned char *split_PlainText[16] = {NULL, };
	unsigned char Hex_Plain[16] = {NULL, };
	char str;
	char *str_Key = NULL;
	char *str_Plain = NULL;
	int KeyNum, PlainNum = 0;
	int num, z,k = 0;

	FILE *fp_in, *fp_out;

	if ( (fp_in = fopen(inputFileName, "r")) == NULL ) {
		printf("Couldn't open <ShortMsgKAT.txt> for read\n");
	}

	fp_out = fopen(outputFileName, "w");

	FindMarker(fp_in, "PlainText");
	fscanf(fp_in, " %c %d", &str, &PlainNum);

	for(int i=0; i<PlainNum; i++){
		fgets(PlainText, MAX_MARKER_LEN, fp_in); //skip line
		fgets(PlainText, MAX_MARKER_LEN, fp_in);
	}

	//************remove " **************//
	PlainText[strlen(PlainText) - 1] = '\0';

	for(z = 0, k = 0 ; z < strlen(PlainText) ; z++){
		if(PlainText[z] != '\"')
			PlainText[k++] = PlainText[z];
	}
	PlainText[k] = '\0';

	//***************split***************//
	str_Plain = strtok(PlainText, ", ");

	while(str_Plain != NULL){
		split_PlainText[num++] = str_Plain;
		str_Plain = strtok(NULL, ", ");
	}

	printf("Plain: ");
	for(int i=0; i<16; i++){
		if(split_PlainText[i] != NULL){
			printf("%s ", split_PlainText[i]);
		}
	}

	//**********string to Hex**********//
	for(int a = 0, b = 0 ; b < 16; b++){
	   unsigned char temp_arr[3] = {split_PlainText[b][0], split_PlainText[b][1], '\0'};
	   Hex_Plain[b] = strtol(temp_arr, NULL, 16);
	}

	num = 0;

	FindMarker(fp_in, "Key");
	fscanf(fp_in, " %c %d", &str, &KeyNum);

	for(int i=0; i<KeyNum; i++){
		fgets(Key, MAX_MARKER_LEN, fp_in); //skip line
		fgets(Key, MAX_MARKER_LEN, fp_in);
	}

	//************remove " **************//
	Key[strlen(Key) - 1] = '\0';

	for(z = 0, k = 0 ; z < strlen(Key) ; z++){
		if(Key[z] != '\"')
			Key[k++] = Key[z];
	}
	Key[k] = '\0';

	//***************split***************//
	str_Key = strtok(Key, ", ");

	while(str_Key != NULL){
		split_Key[num++] = str_Key;
		str_Key = strtok(NULL, ", ");
	}

	printf("Key: ");
	for(int i=0; i<32; i++){
		if(split_Key[i] != NULL){
			printf("%s ", split_Key[i]);
		}
	}
	printf("\n");

	//**********string to Hex**********//
	for(int a = 0, b = 0 ; b < 32; b++){
	   unsigned char temp_arr[3] = {split_Key[b][0], split_Key[b][1], '\0'};
	   Hex_Key[b] = strtol(temp_arr, NULL, 16);
	}

	KeySchedule_enc_256(Hex_Key);
	encrypt_256(Hex_Plain, ct);
	printf("\n");
}


int main()
{
    unsigned char ct[16] = {0x00, };

    unsigned char k_128[16]	= {0x0f, 0x1e, 0x2d, 0x3c, 0x4b, 0x5a, 0x69, 0x78, 0x87, 0x96, 0xa5, 0xb4, 0xc3, 0xd2, 0xe1, 0xf0};
    unsigned char pt_128[16] = {0x10, 0x11, 0x12, 0x13, 0x14, 0x15, 0x16, 0x17, 0x18, 0x19, 0x1a, 0x1b, 0x1c, 0x1d, 0x1e, 0x1f};

    unsigned char k_192[32]	= {0x0f, 0x1e, 0x2d, 0x3c, 0x4b, 0x5a, 0x69, 0x78, 0x87, 0x96, 0xa5, 0xb4, 0xc3, 0xd2, 0xe1, 0xf0, 0xf0, 0xe1, 0xd2, 0xc3, 0xb4, 0xa5, 0x96, 0x87};
	unsigned char pt_192[16] = {0x20, 0x21, 0x22, 0x23, 0x24, 0x25, 0x26, 0x27, 0x28, 0x29, 0x2a, 0x2b, 0x2c, 0x2d, 0x2e, 0x2f};

	unsigned char k_256[32]	= {0x0f, 0x1e, 0x2d, 0x3c, 0x4b, 0x5a, 0x69, 0x78, 0x87, 0x96, 0xa5, 0xb4, 0xc3, 0xd2, 0xe1, 0xf0, 0xf0, 0xe1, 0xd2, 0xc3, 0xb4, 0xa5, 0x96, 0x87, 0x78, 0x69, 0x5a, 0x4b, 0x3c, 0x2d, 0x1e, 0x0f};
	unsigned char pt_256[16] = {0x30, 0x31, 0x32, 0x33, 0x34, 0x35, 0x36, 0x37, 0x38, 0x39, 0x3a, 0x3b, 0x3c, 0x3d, 0x3e, 0x3f};

    //ConfigMode Plaintext
    unsigned char sourcePlaintext[TEXT_BYTE_LENGTH] = {0xD7, 0x6D, 0x0D, 0x18, 0x32, 0x7E, 0xC5, 0x62, 0xB1, 0x5E, 0x6B, 0xC3, 0x65, 0xAC, 0x0C, 0x0F,
											        	0x8D, 0x41, 0xE0, 0xBB, 0x93, 0x85, 0x68, 0xAE, 0xEB, 0xFD, 0x92, 0xED, 0x1A, 0xFF, 0xA0, 0x96,
											        	0x39, 0x4D, 0x20, 0xFC, 0x52, 0x77, 0xDD, 0xFC, 0x4D, 0xE8, 0xB0, 0xFC, 0xE1, 0xEB, 0x2B, 0x93,
											        	0xD4, 0xAE, 0x40, 0xEF, 0x47, 0x68, 0xC6, 0x13, 0xB5, 0x0B, 0x89, 0x42, 0xF7, 0xD4, 0xB9, 0xB3};

    unsigned char iv[16]	= {0x26, 0x8D, 0x66, 0xA7, 0x35, 0xA8, 0x1A, 0x81, 0x6F, 0xBA, 0xD9, 0xFA, 0x36, 0x16, 0x25, 0x01};
	unsigned char ctr[16]	= {0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0xFE};
    unsigned char* resultCipher=(unsigned char*)malloc(sizeof(unsigned char)*TEXT_BYTE_LENGTH);
    
    for(int i=0; i<TEXT_BYTE_LENGTH; ++i)
	{
		resultCipher[i] = 0;
	}

    int num = 0;

    FILE *fp_in, *output_file;

    char *HashName[3] = {"LEA-128", "LEA-192", "LEA-256"};
	char inputFileAddress[256], outputFileAddress[256];
	char *pStr;
	char strTemp[255];

	for(int i=0; i<3; i++){
		sprintf(inputFileAddress, "BlockCipher_test/%s.txt", HashName[i]);
		sprintf(outputFileAddress, "BlockCipher_test/%s_rsp.txt", HashName[i]);

		if ( (fp_in = fopen(inputFileAddress, "r")) == NULL ) {
			printf("Couldn't open <%s> for read\n", inputFileAddress);
			return 1;
		}

		pStr = fgets(strTemp, sizeof(strTemp), fp_in);
		printf("%s", pStr);

		if(!strcmp(pStr, "Algo_ID = LEA-128\n")){
			printf("LEA128\n");
			LEA_128(inputFileAddress, outputFileAddress);
		}else if(!strcmp(pStr, "Algo_ID = LEA-192\n")){
			printf("LEA192\n");
			//LEA_192(inputFileAddress, outputFileAddress);
		}else if(!strcmp(pStr, "Algo_ID = LEA-256\n")){
			printf("LEA256\n");
			//LEA_256(inputFileAddress, outputFileAddress);
		}else {
			printf("Error!\n");
		}
	}

	fclose(fp_in);

    /* 
    =============================================================================
    LEA-128
    =============================================================================
    */

	if(num == 1){
		KeySchedule_enc_128(k_128);
		encrypt_128(pt_128, ct);
		printf("\n");
	}else if(num == 2){
		//KeySchedule_dec_128(k_128);
		//decrypt_128(ct, pt_128);
		printf("\n");
	}

    /* 
    =============================================================================
    LEA-192
    =============================================================================
    */

	if(num == 1){
		KeySchedule_enc_192(k_192);
		encrypt_192(pt_192, ct);
		printf("\n");
	}else if(num == 2){
		//KeySchedule_dec_192(k_192);
		//decrypt_192(ct, pt_192);
		printf("\n");
	}

    /* 
    =============================================================================
    LEA-256
    =============================================================================
    */

    if(num == 1){
    	KeySchedule_enc_256(k_256);
		encrypt_256(pt_256, ct);
		printf("\n");
	}else if(num == 2){
		//KeySchedule_dec_256(k_256);
		//decrypt_256(ct, pt_256);
		printf("\n");
	}

    /* 
    =============================================================================
    ConfigMode CBC
    =============================================================================
    */
    
    if(num == 1){
    	printf("\n[LEA CBC_128 Test]\n");
		CBC_enc_128(sourcePlaintext, resultCipher, TEXT_BYTE_LENGTH, k_128, iv);
		printf("\n[LEA CBC_192 Test]\n");
		CBC_enc_192(sourcePlaintext, resultCipher, TEXT_BYTE_LENGTH, k_192, iv);
		printf("\n[LEA CBC_256 Test]\n");
		CBC_enc_256(sourcePlaintext, resultCipher, TEXT_BYTE_LENGTH, k_256, iv);
	}else if(num == 2){
		//CBC_dec_128(sourcePlaintext, resultCipher, TEXT_BYTE_LENGTH, k_128, iv);


		//CBC_dec_192(sourcePlaintext, resultCipher, TEXT_BYTE_LENGTH, k_192, iv);


		//CBC_dec_256(sourcePlaintext, resultCipher, TEXT_BYTE_LENGTH, k_256, iv);
	}



    /* 
    =============================================================================
    ConfigMode CTR
    =============================================================================
    */

    if(num == 1){
    	printf("\n[LEA CTR_128 Test]\n");
		CTR_enc_128(sourcePlaintext, resultCipher, TEXT_BYTE_LENGTH, k_128, ctr);
		printf("\n[LEA CTR_128 Test]\n");
		CTR_enc_192(sourcePlaintext, resultCipher, TEXT_BYTE_LENGTH, k_192, ctr);
		printf("\n[LEA CTR_128 Test]\n");
		CTR_enc_256(sourcePlaintext, resultCipher, TEXT_BYTE_LENGTH, k_256, ctr);
	}else if(num == 2){
	    //CTR_enc_128(sourcePlaintext, resultCipher, TEXT_BYTE_LENGTH, k_128, ctr);


	    //CTR_enc_192(sourcePlaintext, resultCipher, TEXT_BYTE_LENGTH, k_192, ctr);


	    //CTR_enc_256(sourcePlaintext, resultCipher, TEXT_BYTE_LENGTH, k_256, ctr);
	}

    return 0;
}
