#include <iostream>

using namespace std;

int main()
{
	int n,i,t1,t2,t;
	cin>>n;

	t1=1;
	t2=1;

	i=1;
	while(i < n)
	{
		t = t1;
		t1 = t2;
		t2 = t+t2;
		cout<<t2<<" ";
	}
	return 0;
}