#include<iostream>

using namespace std;

int a[1001], b[1001], n, m;
short s[2000001];

int main()
{
	int i, j, x, contor;
	
	cin >> n >> m;
	for (i = 0; i < n; i++)
		cin >> a[i];
	for (i = 0; i < m; i++)
		cin >> b[i];

	
	for (i = 0; i < n - 1; i++)
		for (j = i + 1; j < n; j++)
		{
			x = a[i] + a[j];
			s[x] = 1;
		}
	
	contor = 0;
	for (i = 0; i < m - 1; i++)
		for (j = i + 1; j < m; j++)
		{
			x = b[i] + b[j];
			if (s[x] == 1) contor++;
		}
	
	cout << contor << "\n";

	return 0;
}
