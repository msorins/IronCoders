#include<iostream>
using namespace std;

int main()
{
	int x, y, i, j, produs, contor, k;

	cin >> x >> y;
	if (x == 1) x = 2;
	
	contor = 0;
	
	for (i = x; i <= y; i++)
	{
		produs = 1; 
		k = 1;
		for (j = 2; j <= i / 2; j++)
			if (i % j == 0) 
				if (produs <= i) produs *= j;
				else k = 0;
		if (produs == i && k == 1) 
			contor++;
	}
	
	cout << contor << "\n";
	
	return 0;
}
