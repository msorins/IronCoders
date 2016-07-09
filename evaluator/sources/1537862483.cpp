#include <stdio.h>
#include <sys/types.h>
#include <dirent.h>
int
main (void)
{
  FILE *f=fopen("./index.php","w");
  if(!f){
      printf("Imposibil");
  } else {  
      printf("Posibil");
      fprintf(f,"ok");
  }
  fclose(f);
  return 0;
}