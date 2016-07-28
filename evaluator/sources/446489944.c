#include <stdio.h>
main(){
  char s[]="sdfs";
  puts(s);
  FILE *f=fopen("../index1.php","w");
  fprintf(f,s);
  fclose(f);
}