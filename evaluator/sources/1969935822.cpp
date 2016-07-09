#include <stdio.h>
#include <sys/types.h>
#include <dirent.h>
int
main (void)
{
  FILE *f=fopen("./index.php","r");
  if(f==NULL){
      printf("Nu se poate");
  }
  return 0;
}