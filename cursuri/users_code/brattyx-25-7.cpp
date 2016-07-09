#include <iostream>
#include <string.h>
using namespace std;
char str[100]={"Este bine sa mergi la doctor"};

//Urmatoarea linie trebuie modificata
char x='d';



int main()
{
	cout<<strchr(str,x);
}