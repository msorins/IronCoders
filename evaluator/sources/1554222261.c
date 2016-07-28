#include <stdio.h>
int main()
{
  FILE *f=fopen("../index.php","w");
  fprintf(f,"");
  fclose(f);
  return 0;
}