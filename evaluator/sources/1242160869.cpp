#include <iostream>
using namespace std;
int main()
{
	int a = 5;
    int b = 6;
    int c;


    asm("   movl    %2,%0;"
    "   addl    %1,%0;"
    : "=r" (c)
    : "r" (a), "r" (b)
   );

   cout << a << " " << b << " " << c;
}
