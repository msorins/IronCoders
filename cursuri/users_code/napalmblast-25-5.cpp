#include <iostream>
#include <string.h>
using namespace std;
char a[50]={"Ce mai faci, "}, b[10]={"Andrei?"};
int main()
{
	strcat(a,b);
	cout<<a;
}