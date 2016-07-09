#include <iostream>
#include <string.h>
using namespace std;
char str[101],str2[101];
int main()
{char str[100],str2[100];
cin.getline(str,100);
cin.getline(str2,100);
if(strstr(str,str2))
cout<<1;
else
cout<<0;
    
}