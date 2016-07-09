#include<iostream>
#define Dim 303

using namespace std ;

struct coord
{
	int x, y ;
};

coord q[Dim * Dim + 1] ;
int a[Dim][Dim], nr[Dim][Dim], pred[Dim][Dim] ;
int n, nrDrumuri ;

void Citire()
{
	int i, j ;
	
	cin >> n ;
	for (i=1 ; i<=n ; i++)
		for (j=1 ; j<=n ; j++)
			cin >> a[i][j] ;
}

inline int Interior(int x, int y)
{
	if (x == 0 || x == n+1 || y == 0 || y == n+1) return 0 ;
	return 1 ;
}

void Calcul()
{
	int i,j, pr, ul, t ;
	
	pr = 0 ; ul = -1 ;
	for (i=1 ; i<=n ; i++)
		for (j=1 ; j<=n ; j++)
		{	
			if (Interior(i-1, j) && a[i-1][j] < a[i][j]) pred[i][j]++ ;
			if (Interior(i+1, j) && a[i+1][j] < a[i][j]) pred[i][j]++ ;
			if (Interior(i, j-1) && a[i][j-1] < a[i][j]) pred[i][j]++ ;
			if (Interior(i, j+1) && a[i][j+1] < a[i][j]) pred[i][j]++ ;
			if (pred[i][j] == 0)
			{
				nr[i][j] = 1 ;
				ul++ ;
				q[ul].x = i ;
				q[ul].y = j ;
			}
		}
	
	while (pr <= ul)
	{
		i = q[pr].x ;
		j = q[pr].y ;
		pr++ ;
		
		t = 0 ;
		if (Interior(i-1, j) && a[i-1][j] > a[i][j])
		{
			t = 1 ;
			nr[i-1][j] += nr[i][j] ;
			pred[i-1][j]-- ;
			if (pred[i-1][j] == 0)
			{
				ul++ ;
				q[ul].x = i-1 ;
				q[ul].y = j ;
			}
		}
		if (Interior(i+1, j) && a[i+1][j] > a[i][j]) 
		{
			t = 1 ;
			nr[i+1][j] += nr[i][j] ;
			pred[i+1][j]-- ;
			if (pred[i+1][j] == 0)
			{
				ul++ ;
				q[ul].x = i+1 ;
				q[ul].y = j ;
			}
		}
		if (Interior(i, j-1) && a[i][j-1] > a[i][j]) 
		{
			t = 1 ;
			nr[i][j-1] += nr[i][j] ;
			pred[i][j-1]-- ;
			if (pred[i][j-1] == 0)
			{
				ul++ ;
				q[ul].x = i ;
				q[ul].y = j-1 ;
			}
		}
		if (Interior(i, j+1) && a[i][j+1] > a[i][j]) 
		{
			t = 1 ;
			nr[i][j+1] += nr[i][j] ;
			pred[i][j+1]-- ;
			if (pred[i][j+1] == 0)
			{
				ul++ ;
				q[ul].x = i ;
				q[ul].y = j+1 ;
			}
		}
		if (t == 0) nrDrumuri += nr[i][j] ;
	}
}

void Afisare()
{
	cout<<nrDrumuri<<"\n" ;
}

int main()
{
	Citire() ;
	Calcul() ;
	Afisare() ;
	
	return 0 ;
}
