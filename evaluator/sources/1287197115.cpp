#include <iostream>
using namespace std;
int main()
{
	int a, b, c, d;
	cin >> a >> b;


    asm("   mov    %2,%1;"
    "   addl    %1,%2;"
    : "=r" (c)
    : "r" (a), "r" (b)
   );
    
   cout << "Suma este " << c;
}
