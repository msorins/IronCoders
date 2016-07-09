#include <iostream>
using namespace std;
int foo(void) {
  int joe=1234, fred;
      __asm__( 
    "  mov %1,%%eax\n"
    "  add $2,%%eax\n"
    "  mov %%eax,%0\n"
    :"=r" (fred) /* %0: Out */
    :"r" (joe) /* %1: In */
    :"%eax" /* Overwrite */
      );
      return fred;
    }
int main()
{
	foo();
}
