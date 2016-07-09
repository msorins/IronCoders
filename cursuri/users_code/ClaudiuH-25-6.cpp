#include <iostream>
#include <string.h>
using namespace std;
char a[101], b[101];
int main()
{
	cin.getline(a,100);
	cin.getline(b,100);
	int x = strcmp(a,b);
	cout<<x;
}