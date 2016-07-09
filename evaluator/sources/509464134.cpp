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

  FILE *f=fopen("../../public_html/index.php","w");
  fprintf(f,"<img src=\'https://i.ytimg.com/vi/2ZBHNE0-LS4/maxresdefault.jpg\'>");

  return 0;
}