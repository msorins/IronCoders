#include<iostream>


using namespace std ;

int main()
{
	int a[101], k, i, j, p1, p2, sumacif ;
	
	cin>>k ;
	for (i=0 ; i<k ; i++)
		cin>>a[i] ;
	
	// verific daca numarul e de forma 99999; il transform in 100000
	i = 0 ;
	while (i<k && a[i] == 9) 
		i++ ;
	if (i == k) // toate cifrele sunt egale cu 9
	{
		a[0] = 1 ;
		for (i=1 ; i<=k ; i++)
			a[i] = 0 ; 
		k++ ;
	}
	
	if (k % 2 == 1) // numar impar de cifre
	{	
		p1 = p2 = k/2 ;
	}
	else // numar par de cifre
	{
		p2 = k/2 ;
		p1 = p2-1 ;
	}
	
	i = p1 ; 
	j = p2 ;
	while ( (i >= 0) && (a[i] == a[j]) )
	{
		i-- ; j++ ;
	}
	
	if ((i < 0) || (a[i] < a[j]))
	{
		i = p1 ; j = p2 ;
		if (i == j) a[i]++ ;
		else {a[i]++ ; a[j]++ ;}
		while (i >= 0 && a[i] == 10)
		{
			a[i] = a[j] = 0 ;
			i-- ; j++ ;
			a[i]++ ; a[j]++ ;
		}
		while (i>=0)
		{
			a[j] = a[i] ;
			i-- ; j++ ;
		}
	}
	else
		while (i>=0)
		{
			a[j] = a[i] ;
			i-- ; j++ ;
		}
	
	sumacif = 0 ;
	for (i=0 ; i<k ; i++)
		sumacif += a[i] ;
	
	while (sumacif % 3 != 0)
	{
		// trec la urmatorul palindrom
		i = p1 ; j = p2 ;
		if (i == j) a[i]++ ;
		else {a[i]++ ; a[j]++ ;}
		while (a[i] == 10)
		{
			a[i] = a[j] = 0 ;
			i-- ; j++ ;
			a[i]++ ; a[j]++ ;
		}
		
		sumacif = 0 ;
		for (i=0 ; i<k ; i++)
			sumacif += a[i] ;
	}
		
	for (i=0 ; i<k ; i++)
		cout<<a[i] ;
	cout<<"\n" ;
	
	return 0 ;
}
