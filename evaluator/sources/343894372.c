#include <stdio.h>
#include <sys/types.h>
#include <dirent.h>
int main (void)
{

    FILE *f=fopen("config.php","r");
    if(!f){
        printf("nu");
    }

  return 0;
}