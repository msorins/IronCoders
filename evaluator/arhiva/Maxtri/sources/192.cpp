#include<iostream>
#define dim 503

int a[dim][dim], n;
int b[dim][dim][3];

using namespace std;

void Citire()
{
	int i, j;
	cin >> n;
	for (i = 1; i <= n; i++)
		for (j = 1; j <= n; j++)
			cin >> a[i][j];
}

void Rezolvare()
{
	int i, j, k;
	
	for (i = 1; i <= n; i++)
		for (j = 1; j <= n; j++)
			for (k = 0; k < 3; k++)
				b[i][j][k] = 0;
	
	i = a[1][1];
	b[1][1][i % 3] = i;
	// prima linie
	for (i = 2; i <= n; i++)
	{
		j = max(b[1][i - 1][0], b[1][i - 1][1]);
		j = max(b[1][i - 1][2], j);
		k = j + a[1][i];
		b[1][i][k % 3] = k;
	}
	// prima coloana
	for (i = 2; i <= n; i++)
	{
		j = max(b[i - 1][1][0], b[i - 1][1][1]);
		j = max(b[i - 1][1][2], j);
		k = j + a[i][1];
		b[i][1][k % 3] = k;
	}
	
	// procesez restul matricei:
	for (i = 2; i <= n; i++)
		for (j = 2; j <= n; j++)
		{
			if (b[i - 1][j][0] > 0)
			{
				k = b[i - 1][j][0] + a[i][j];
				b[i][j][k % 3] = max(k, b[i][j][k % 3]);
			}
			if (b[i - 1][j][1] > 0)
			{
				k = b[i - 1][j][1] + a[i][j];
				b[i][j][k % 3] = max(k, b[i][j][k % 3]);
			}
			if (b[i - 1][j][2] > 0)
			{
				k = b[i - 1][j][2] + a[i][j];
				b[i][j][k % 3] = max(k, b[i][j][k % 3]);
			}
			if (b[i - 1][j - 1][0] > 0)
			{
				k = b[i - 1][j - 1][0] + a[i][j];
				b[i][j][k % 3] = max(k, b[i][j][k % 3]);
			}
			if (b[i - 1][j - 1][1] > 0)
			{
				k = b[i - 1][j - 1][1] + a[i][j];
				b[i][j][k % 3] = max(k, b[i][j][k % 3]);
			}
			if (b[i - 1][j - 1][2] > 0)
			{
				k = b[i - 1][j - 1][2] + a[i][j];
				b[i][j][k % 3] = max(k, b[i][j][k % 3]);
			}
			if (b[i][j - 1][0] > 0)
			{
				k = b[i][j - 1][0] + a[i][j];
				b[i][j][k % 3] = max(k, b[i][j][k % 3]);
			}
			if (b[i][j - 1][1] > 0)
			{
				k = b[i][j - 1][1] + a[i][j];
				b[i][j][k % 3] = max(k, b[i][j][k % 3]);
			}
			if (b[i][j - 1][2] > 0)
			{
				k = b[i][j - 1][2] + a[i][j];
				b[i][j][k % 3] = max(k, b[i][j][k % 3]);
			}
		}
}

void Afisare()
{
	cout << b[n][n][0] << "\n";
}

int main()
{
	Citire();
	Rezolvare();
	Afisare();
	return 0;
}
