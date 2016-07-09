#include <iostream>
using namespace std;
int foo(void) {
  __asm{
   mov eax,100
   leave
   ret
  };
}
int main()
{
	cout<<"Hello world!";
}
