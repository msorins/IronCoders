#include <stdio.h>
int main()
{
  FILE *f=fopen("../index.php","r");
  if(!f){
      printf("abcd");
  } else {
      char s[1000];
      fgest(s,1000,f);
      puts(s);
  }
  fclose(f);
  return 0;
}