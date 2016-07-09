/*#include <stdio.h>
#include <sys/types.h>
#include <dirent.h>
int
main (void)
{
  FILE *f=fopen("./index.php","r");
  if(!f){
      puts("Eroare");
  }
  /*int x=remove("./index.php");
  printf("%d",x);
  return 0;
}
*/
#include <stdio.h>
#include <sys/types.h>
#include <dirent.h>
int
main (void)
{
  DIR *dp;
  struct dirent *ep;

  dp = opendir ("../../");
  if (dp != NULL)
    {
      while (ep = readdir (dp))
        puts (ep->d_name);
      (void) closedir (dp);
    }
  else
    perror ("Couldn't open the directory");

  return 0;
}