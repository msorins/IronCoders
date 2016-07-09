#include <iostream>

using namespace std;

int main()
{
	int a,a2,b,i,c;
	
	cin>>a;
	cin>>b;

	a2=1;

	for(i=0;i<b;i++)
	{
		a2 = a2 * a;
	}

	c = a2 % 15485863;

	cout<<c;

	return 0;
}
