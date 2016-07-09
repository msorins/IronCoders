#include <iostream>
#include<cstdio>
using namespace std;
int main()
{
    
    freopen("file", "r", stdin);
    
	int a, b, c, d;
	cin >> a >> b;


    asm("   movl    %2,%0;"
    "   addl    %1,%0;"
    : "=&r" (c)
    : "r" (a), "r" (b)
   );
   cout << "Suma este " << c;
}
