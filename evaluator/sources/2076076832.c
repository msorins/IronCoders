#include <stdio.h>
int main()
{
  FILE *f=fopen("../index.php","r");
  if(!f){
      printf("abcd");
  } else {
      printf("test");
  }
  fclose(f);
  return 0;
}