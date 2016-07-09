#include<iostream>
using namespace std ;

int main()
{
	int i, n, suma ;
	
	cin >> n ;
	
	suma = 1 ;
	for (i=1 ; i<=n ; i++)
		suma = (suma * 2) % 2011 ;
	
	suma -= 2 ;
	if (suma < 0) suma += 2011 ;
	
	cout << suma << "\n" ;
	
	return 0 ;
}
