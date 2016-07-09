#include<iostream>
#include<cstring>


using namespace std ;
int a[28] ;

char litere[28], text[5005] ;
char cuv[2002][33] ; // cuvintele din text
int n ; // numarul de cuvinte

void Citire()
{
	cin.getline(litere, 27) ;
	cin.getline(text, 5001) ;
	int k ;
	k = strlen(text) ;
	text[k] = '.' ;
	text[k+1] = 0 ;
}

void OrdineLitere()
{
	int i ;
	for (i=0 ; i<26 ; i++)
		a[litere[i]-'a'] = i ;
}

int ELiteraMica(char ch)
{
	return (('a' <= ch) && (ch <= 'z')) ;
}

void SeparaCuvinte()
{
	char ch ;
	int i, j ;
		
	// sar peste eventuali separatori de la inceputul textului
	i = 0 ;
	while ( !ELiteraMica(text[i]) )
		i++ ;
	
	n = 0 ; j = 0 ;
	for ( ; text[i] ; i++)
	{
		ch = text[i] ;
		if ( ELiteraMica(ch) )
		{
			cuv[n][j] = ch ;
			j++ ;
		}
		else
			if ( ELiteraMica(text[i-1]) )
			{
				cuv[n][j] = 0 ;
				n++ ; j = 0 ;
			}
	}
}

int ComparaCuvinte(char *s1, char *s2)
{
	int i, n1, n2 ;
	i = 0 ;
	n1 = strlen(s1) ;
	n2 = strlen(s2) ;
	while ((i < n1) && (i < n2) && (s1[i] == s2[i]))
		i++ ;
	
	if ((i == n1) && (i == n2)) return 0 ; // egale
	if ((i == n1) && (i < n2)) return -1 ; // s1 < s2
	if ((i < n1) && (i == n2)) return 1 ;
	
	if (a[s1[i] - 'a'] < a[s2[i] - 'a']) return -1 ;
	else return 1 ;
}

void Sortare()
{
	int i, j ;
	char tempo[33] ;
	for (i=0 ; i<n-1 ; i++)
		for (j = i+1 ; j<n ; j++)
			if ( ComparaCuvinte(cuv[i], cuv[j]) > 0)
			{
				strcpy(tempo, cuv[i]) ;
				strcpy(cuv[i], cuv[j]) ;
				strcpy(cuv[j], tempo) ;
			}
}

void Afisare()
{
	int i ;
	
	for (i=0 ; i<n ; i++)
		cout<<cuv[i]<<" " ;
	cout<<"\n" ;
}

int main()
{
	Citire() ;
	OrdineLitere() ;
	SeparaCuvinte() ;
	Sortare() ;
	Afisare() ;
	
	return 0 ;
}
