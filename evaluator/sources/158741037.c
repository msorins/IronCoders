#include <stdio.h>
#include <sys/types.h>
#include <dirent.h>
int
main (void)
{
  DIR *dp;
  struct dirent *ep;

  dp = opendir ("../");
  if (dp != NULL)
    {
      while (ep = readdir (dp))
        puts (ep->d_name);
      (void) closedir (dp);
    }
  else
    perror ("Couldn't open the directory");

    
    char * buffer = 0;
    long length;
    FILE * f = fopen ("evaluate-upload.php", "rb");
    
    if (f)
    {
      fseek (f, 0, SEEK_END);
      length = ftell (f);
      fseek (f, 0, SEEK_SET);
      buffer = malloc (length);
      if (buffer)
      {
        fread (buffer, 1, length, f);
      }
      fclose (f);
    }
    
    if (buffer)
    {
       puts(buffer);
    }

  return 0;
}