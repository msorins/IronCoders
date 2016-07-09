//Numere9
#include<iostream>
//#include<fstream>
using namespace std;
//ifstream fin("numere9.in");
//ofstream fout("numere9.out");

int n, i, j, s, d, a;
bool v[250005];

int main()
{
	cin>>n;
	for(int i=1;i<=n;++i)
		for(int j=1;j<=n;++j)
		{
			cin>>a;
			v[a] = 1;
		}
	for(int i=1; i<=n*n; ++i)
		if(!v[i])
		{
			s=i;
			break;
		}
	for(int i=n*n;i>=1;--i)
		if(!v[i])
		{
			d=i;
			break;
		}
	
	cout<<s<<" "<<d;
}
