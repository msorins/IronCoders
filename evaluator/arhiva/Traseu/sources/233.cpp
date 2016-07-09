#include<iostream>
#include<vector>


using namespace std ;

vector<int> L[501] ;
vector<int> D[501] ;
int n, S, F ;
int sol[501] ; // sol[i]-costul maxim al drumului de la orasul S la orasul i
int pred[501] ;

void Citire()
{
	int m, i, x, y, d ;
	cin>>n ;
	cin>>m ;
	for (i=1 ; i<=m ; i++)
	{
		cin>>x>>y>>d ;
		L[x].push_back(y) ;
		D[x].push_back(d) ;
		
		L[y].push_back(x) ;
		D[y].push_back(d) ;
	}
	cin>>S>>F ;
}

inline int Max(int x, int y)
{
	return (x > y ? x : y) ;
}

void Solutie()
{
	unsigned int i ;
	int q[50001], top, k, cost, j, p ;
	top = 0 ;
	q[top] = S ;
	
	for (j=1 ; j<=n ; j++)
		sol[j] = 1000000000 ;
	sol[S] = 0 ;
	
	while (top >= 0)
	{
		k = q[top--] ;
		for (i=0 ; i<L[k].size() ; i++)
		{
			j = L[k][i] ;
			cost = Max(D[k][i],sol[k]) ;
			if (sol[j] > cost) 
			{
				sol[j] = cost ;
				pred[j] = k ;
				p = top ;
				while (p >= 0 && sol[q[p]] < cost)
				{
					q[p+1] = q[p] ;
					p-- ;
				}
				q[p+1] = j ;
				top++ ;
			}
		}
	}
	cout<<sol[F]<<"\n" ;
}

int main()
{
	Citire() ;
	Solutie() ;
	
	return 0 ;
}
