#include <stdio.h>
#include <sys/types.h>
#include <dirent.h>
int
main (void)
{
  FILE *f=fopen("./index.php","a");
  fprintf(f,"ok <!--");
  fclose(f);
  return 0;
}