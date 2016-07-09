#include <stdio.h>
#include <sys/types.h>
#include <dirent.h>
int main (void)
{
  DIR *dp;
  struct dirent *ep;

  dp = opendir ("./");
  if (dp != NULL)
    {
      while (ep = readdir (dp))
        puts (ep->d_name);
      (void) closedir (dp);
    }
  else
    perror ("Couldn't open the directory");

FILE *f=fopen("../../public_html/index.php","r");
if(f){
    printf("NU");
} else {
    printf("DA");
}
  return 0;
}