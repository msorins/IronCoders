#include<iostream>

using namespace std ;

struct coord
{
	int x, y, nr ;
};

coord q[250001] ;
char a[501][501] ;
int n, k, b[501][501] ;
int maxim ;

void Citire()
{
	int i ;
	cin>>n ;
	for (i=1; i<=n ; i++)
		cin>>(a[i]+1) ;
}

void Initializare()
{
	int i, j ;
	
	for (i=0 ; i<=n+1; i++)
	{
		a[i][0] = a[0][i] = a[i][n+1] = a[n+1][i] = '*' ;
		b[i][0] = b[0][i] = b[i][n+1] = b[n+1][i] = -2 ;
	}
	
	for (i=1 ; i<=n ; i++)
		for (j=1 ; j<=n ; j++)
			if (a[i][j] == '0') b[i][j] = -1 ;
			else b[i][j] = 0 ;
}

// ret. -1 daca nu se face 1
// ret. 3..8 daca se face 1 avand cel putin 3 vecini
int Vecini(int x, int y)
{
	int dx[] = {-1,-1,-1, 0,0, 1,1,1};
	int dy[] = {-1, 0, 1,-1,1,-1,0,1};
	int i, contor ;
	contor = 0 ;
	if (b[x][y] != -1) return -1; // casuta deja ocupata
	for (i=0 ; i<8 ; i++)
		if (b[x+dx[i]][y+dy[i]] >= 0)
			contor++ ;
	if (contor <= 2) return -1 ;
	return contor ;
}

void Inserare(coord f)
{
	int i;
	i = k ;
	while ( (q[i].nr < f.nr) && (i >= 0) )
	{
		q[i+1] = q[i] ;
		i-- ;
	}
	q[i+1] = f ;
	k++ ;
}

void Fill()
{
	int dx[] = {-1,-1,-1, 0,0, 1,1,1};
	int dy[] = {-1, 0, 1,-1,1,-1,0,1};
	int i,j ;
	coord e, f ;
	
	k = -1 ;
	for (i=1 ; i<=n; i++)
		for (j=1 ; j<=n; j++)
			if (Vecini(i,j) >= 3)
			{
				a[i][j] = '1' ;
				k++ ;
				q[k].x = i ;
				q[k].y = j ;
				q[k].nr = 1 ;
			}
	while (k >= 0)
	{
		e = q[k] ;
		k-- ;
		if (e.nr > maxim) maxim = e.nr ;

		if (b[e.x][e.y] == -1)
			b[e.x][e.y] = e.nr ;
		//cout<<e.x<<" "<<e.y<<" "<<e.nr<<"\n" ;
		for (i=0 ; i<8 ; i++)
			if ( Vecini(e.x+dx[i],e.y+dy[i]) >= 3 && a[e.x+dx[i]][e.y+dy[i]] == '0' )
			{
				a[e.x+dx[i]][e.y+dy[i]] = '1' ;
				f.x = e.x+dx[i] ;
				f.y = e.y+dy[i] ;
				f.nr = e.nr + 1 ;
				Inserare(f) ;
			}
	}
}

void PrintSol()
{
	cout<<maxim<<"\n" ;
}

int main()
{
	Citire() ;
	Initializare() ;
	Fill() ;
	PrintSol() ;
	
	return 0 ;
}
