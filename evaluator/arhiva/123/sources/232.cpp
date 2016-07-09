#include<iostream>
#include <cmath>
#define dim 10001


using namespace std ;

char s[dim] ;
int a1[dim], a2[dim], a3[dim], c[dim], n, P, K ;
//int pred[dim] ;

int Conditie(int x1, int x2, int x3)
{
	int v[4], k, i, j ;
	k = 0 ;
	if (x1 > 0) v[k++] = x1 ;
	if (x2 > 0) v[k++] = x2 ;
	if (x3 > 0) v[k++] = x3 ;
	for (i=0 ; i<k-1 ; i++)
		for (j=i+1 ; j<k ; j++)
			if (abs(v[i] - v[j]) > P)
				return 0 ;
	return 1 ;
}

int main()
{
	cin>>n>>K>>P ;
	cin>>(s+1) ;
	s[0] = '*' ;

	int i, j, x1, x2, x3, minim ;
	for (i=1 ; i<=n ; i++)
	{
		a1[i] = a1[i-1] ;
		a2[i] = a2[i-1] ;
		a3[i] = a3[i-1] ;
		if (s[i] == '1') a1[i]++;
		else if (s[i] == '2') a2[i]++ ;
		else a3[i]++ ;
	}

	c[1] = 1 ;
	//pred[1] = 0 ;
	for (i=2 ; i<=n ; i++)
	{
		minim = i ;
		for (j=i-1 ; (j>=0) && (i-j <= K) ; j--)
		{
			x1 = a1[i] - a1[j] ;
			x2 = a2[i] - a2[j] ;
			x3 = a3[i] - a3[j] ;
			if (Conditie(x1, x2, x3) && minim > 1 + c[j])
			{
				minim = 1 + c[j] ;
				//pred[i] = j ;
			}
		}
		c[i] = minim ;
	}

	cout<<c[n]<<"\n" ;

	return 0 ;
}
