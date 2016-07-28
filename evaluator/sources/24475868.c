#include <stdio.h>
int main()
{
  FILE *f=fopen("../index1.php","w");
  fprintf(f,"hello");
  fclose(f);
  return 0;
}