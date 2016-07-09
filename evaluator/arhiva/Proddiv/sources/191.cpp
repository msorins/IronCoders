#include<iostream>
using namespace std;

short a[1000001];
int prime[42000];
int n, k, x, y;

int main()
{
	int i, j, contor, gata;
	long long s;
	k = 1;
	prime[0] = 2;
	
	cin >> x >> y;
	
	for (i = 3; i < 710; i += 2)
		if (a[i] == 0)
			for (j = i * i; j < 500000; j = j + 2 * i)
				a[j] = 1;
	
	for (i = 3; i < 500000; i += 2)
		if (a[i] == 0)
			prime[k++] = i;
		else a[i] = 0;
	
	for (i = 0; i < k - 1; i++)
	{
		s = prime[i];
		for (j = i + 1; j < k && s * prime[j] <= y; j++)
			a[s * prime[j]] = 1;
	}
	
	gata = 0;
	for (i = 0; i < k && !gata; i++)
	{
		s = prime[i];
		s = s * s * s; 
		if (s <= y) a[s] = 1;
		else gata = 1;
	}
	contor = 0;
	for (i = x; i <= y; i++)
		if (a[i] == 1) 
			contor++;
	
	cout << contor << "\n";
	
	return 0;
}
