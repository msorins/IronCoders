#include <iostream>
#include <string.h>
using namespace std;
char str[101],str2[101];
int main()
{
	cin.getline(str,100);
	cin.getline(str2,100);
	cout<<strcmp(str,str2);
}