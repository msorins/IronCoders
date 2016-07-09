#include <iostream>
#include <string.h>
using namespace std;
char str[101],str2[101]; int n;
int main()
{cin.getline(str,101);
cin.getline(str2,101);
if(strstr(str,str2))
n=1;
else n=0;
cout<<n;
    
}