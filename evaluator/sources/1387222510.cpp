#include <stdio.h>
char *file_get_contents(char *filename)
{
    FILE * f = fopen (filename, "rb");
    if (f)
    {
        char * buffer = 0;
        long length;
        fseek (f, 0, SEEK_END);
        length = ftell (f);
        fseek (f, 0, SEEK_SET);
        buffer = malloc (length);
        if (buffer)
        {
            fread (buffer, 1, length, f);
        }
        fclose (f);
        if(buffer)
            return buffer;
        return 0;
    }
}
int main()
{
  puts(file_get_contents("../index.php"));
  return 0;
}