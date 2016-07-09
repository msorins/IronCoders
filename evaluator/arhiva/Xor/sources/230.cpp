#include<iostream>
using namespace std ;

int n, a[2001], x[2001], x1, x2, x3, s ;

void Citire()
{
	int i ;
	cin>>n ;
	for (i=1 ; i<=n ; i++)
	{
		cin>>a[i] ;
		x[i] = x[i-1] ^ a[i] ;
	}
}

void Solutie()
{
	int k, p;
	s = 0 ;
	for (k = 1 ; k<n ; k++)
		for (p = k+1 ; p<=n ; p++)
		{
			x1 = x[k] ;
			x2 = x[p] ^ x[k] ;
			x3 = x[n] ^ x[p] ;
			if (s < x1 + x2 + x3)
				s = x1 + x2 + x3 ;
		}
	cout<<s<<"\n" ;
}

int main()
{
	Citire() ;
	Solutie() ;
	
	return 0 ;
}
