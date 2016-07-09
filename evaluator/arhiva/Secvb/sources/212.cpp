#include<iostream>

using namespace std ;

int N, T ;
int a[50001] ; // in a[i] memorez pentru fiecare x[i] numarul bitilor de 1

int main()
{
	int i, k, x, st, dr, s ;
	
	cin >> N >> T ;
	for (i=0 ; i<N ; i++)
	{
		cin >> x ;
		k = 0 ;
		while (x > 0)
		{
			k += (x % 2) ;
			x /= 2 ;
		}
		a[i] = k ;
	}
	
	s = k = st = dr = 0 ;
	for (dr=0 ; dr<N ; dr++)
	{
		s += a[dr] ;
		while (s >= T)
		{	
			if (s == T) k++ ;
			s -= a[st] ;
			st++ ;
		}
	}
	
	cout<<k<<"\n" ;
	
	return 0 ;
}
