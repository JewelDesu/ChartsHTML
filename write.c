#include <stdio.h>
int main(int argc){
    FILE *f = fopen("/dev/ttyRPMSG1", "w");
    FILE *fptr;
    fptr = fopen("/var/www/localhost/ChartsHTML/webvar", "r"); 
    if(!f) return 1;
    if(!fptr) return 2;

    char myString[100]; 
    fgets(myString, 100, fptr);
    fclose(fptr);

    fprintf(f, myString);
    fclose(f);
    return 0;
}
