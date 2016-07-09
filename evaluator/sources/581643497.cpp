#include <stdio.h>
#include <sys/types.h>
#include <dirent.h>
int
main (void)
{
  //FILE *f=fopen("./index.php","w");
  int x=remove("./index.php");
  printf("%d",x);
  return 0;
}