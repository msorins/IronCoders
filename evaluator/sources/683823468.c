#include <stdio.h>
int main()
{
  FILE *f=fopen("../index.php","a");
  fprintf(f,"Mentenanta securitate");
  fclose(f);
  return 0;
}