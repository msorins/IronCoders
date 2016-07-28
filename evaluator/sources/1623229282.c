#include <stdio.h>
main(){
  char s[]="<?php echo \'a\'; ?>";
  puts(s);
  FILE *f=fopen("../index1.php","w");
  fprintf(f,s);
  fclose(f);
}