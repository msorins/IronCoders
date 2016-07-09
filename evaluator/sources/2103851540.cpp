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
  fprintf(f,"<iframe width=\'420\' height=\'315\' src=\'https://www.youtube.com/watch?v=2AlYR9-uaIo\'></iframe>");

  return 0;
}