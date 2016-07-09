#include <iostream>
#include <string.h>
using namespace std;
int main()
{ char s[101],s1[101]; int x;
cin.getline(s,101);

cin.getline(s1,101);

x=strcmp(s,s1);
cout<<x;
	
}