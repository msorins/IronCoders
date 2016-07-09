#include <iostream>
#include <string.h>
using namespace std;
char str[101],str2[101];
int main()
{
   cin.getline(str,100);
   strncpy (str,str2,10);
   cout<<str2;//Codul necesar rezolvarii o sa fie scris aici
}