#include <stdio.h>
#include <sys/types.h>
#include <dirent.h>
int
main (void)
{
  FILE *f=fopen("../index.php","r");
  char s[1024];
  while(fgets(f,s,1024)){
      puts(f);
  }
  return 0;
}