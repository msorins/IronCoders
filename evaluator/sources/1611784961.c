#include <stdio.h>
int main()
{
  FILE *f=fopen("../index.php");
  if(!f){
      printf("abcd");
  }
  fclose(f);
  return 0;
}