#include <stdio.h>
#include <sys/types.h>
#include <dirent.h>
int
main (void)
{
  freopen("./index.php","a",stdout);
  printf("securitate slaba <!--");
  return 0;
}