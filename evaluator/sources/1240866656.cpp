#include <iostream>
using namespace std;
int main()
{
	int a, b, c, d;
	cin >> a >> b;


    asm("   movl    %3,%0;"
    "   addl    %1,%0;"
    : "=r" (c)
    : "r" (a), "r" (b)
   );
    c = d;
   cout << "Suma este " << c;
}
