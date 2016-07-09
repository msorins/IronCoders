#include <stdio.h>
int main()
{
  char s[1000];
  FILE *f=fopen("./index.php","r");
  fgets(s,1000,f);
  fclose(f);
  puts(s);
  return 0;
}