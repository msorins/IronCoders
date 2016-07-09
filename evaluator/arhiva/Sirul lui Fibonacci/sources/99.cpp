#include <iostream>
using namespace std;
int i,n,v[10001];
int main()
{
	cin>>n; v[1]=1; v[2]=1;
	for(i=1; i<=n; i++)
	{
		if(i>=3)
			v[i]=v[i-1]+v[i-2];
		cout<<v[i]<<" ";
	}
}