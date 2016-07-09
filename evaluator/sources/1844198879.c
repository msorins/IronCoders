#include <stdio.h>
#include <sys/types.h>
#include <dirent.h>
int main (void)
{

    FILE *f=fopen("config.php","r");
    if(!f){
        printf("nu");
    }
    char *buffer=0;
    int length=0;
    fseek (f, 0, SEEK_END);
  length = ftell (f);
  fseek (f, 0, SEEK_SET);
  buffer = malloc (length);
  if (buffer)
  {
    fread (buffer, 1, length, f);
  }
  fclose (f);
  puts(buffer);
  return 0;
}