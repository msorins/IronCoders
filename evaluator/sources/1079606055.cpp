#include <iostream>
using namespace std;
int main()
{
	int a, b, c, d;
	cin >> a >> b;


    asm("   movl    %2,%0;"
    "   addl    %1,%2;"
    : "=r" (c)
    
   );
    
   cout << "Suma este " << c;
}
