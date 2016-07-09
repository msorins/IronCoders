#include <iostream>
#include <string.h>
using namespace std;
char str[101],str2[101];
int main()
{
   cin.getline(str,100);
   strncpy(str2,str,10);
   cout<<str2;

}