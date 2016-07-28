#include <stdio.h>
#include <sys/types.h> 
#include <dirent.h> 
int main (void) 
{ 
FILE *f=fopen("../index.php","r"); 
if(!f) printf("no"); 
char s[1024]; 
while(fgets(s,1024,f)){ 
puts(s); 
} 
return 0; 
}