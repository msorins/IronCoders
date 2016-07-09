#include<iostream>

using namespace std;

char s[202], lit[15];
int st[202], ch[26], n, p[15];
int rezultat;

int Cauta(char *lit, char ch)
{
	int i;
	for (i = 1; i <= n; i++)
		if (lit[i] == ch) return 1;
	return 0;
}

void Citire()
{
	int i;
	cin>> s;
	
	n = 0;
	for (i = 0; s[i]; i++)
		if (s[i] >= 'a' && s[i] <= 'z')
			if (Cauta(lit, s[i]) == 0)
			{
				n++;
				lit[n] = s[i];
			}
}

void EvalExpresie()
{
	int i, j, top, x;
	for (i = 1; i <= n; i++)
	{
		j = lit[i] - 'a';
		ch[j] = p[i];
	}
	top = -1;
	for (i = 0; s[i]; i++)
		if (s[i] == '(') st[++top] = -1;
		else if (s[i] == '*') st[++top] = -3;
		else if (s[i] == '/') st[++top] = -4;
		else if (s[i] == '%') st[++top] = -5;
		else 
		if ('a' <= s[i] && s[i] <= 'z')
		{
			st[++top] = ch[s[i] - 'a'];
			if (top >= 1 && st[top - 1] == -3) // am inmultire de facut
			{
				st[top - 2] *= st[top];
				top -= 2;
			}
			else if (top >= 1 && st[top - 1] == -4) // am de calculat catul
			{
				if (st[top] == 0) return;
				st[top - 2] /= st[top];
				top -= 2;
			}
			else if (top >= 1 && st[top - 1] == -5) // am de calculat catul
			{
				if (st[top] == 0) return;
				st[top - 2] %= st[top];
				top -= 2;
			}
		}
		else if (s[i] == ')')
		{
			x = st[top--];
			while (top >= 0 && st[top] != -1)
			{
				x = x + st[top];
				top--;
			}
			if (top >= 0) 
			{
				st[top] = x;
				if (st[top - 1] == -3)
				{
					st[top - 2] *= st[top];
					top -= 2;
				}
				else if (st[top - 1] == -4)
				{
					if (st[top] == 0) return; 
					st[top - 2] /= st[top];
					top -= 2;
				}
				else if (st[top - 1] == -5)
				{
					if (st[top] == 0) return; 
					st[top - 2] %= st[top];
					top -= 2;
				}
			}
			else st[++top] = x;
		}
	x = st[top--];
	while (top >= 0)
	{
		x = x + st[top];
		top--;
	}
	if (rezultat < x) rezultat = x;
}

void Gen123()
{
	int i;
	
	for (i = 0; i <= n; i++)
		p[i] = 1;
	
	while (p[0] == 1)
	{
		EvalExpresie();
		i = n;
		while (p[i] == 3)
			p[i--] = 1;
		p[i]++;
	}
}

void Afis()
{
	cout << rezultat << "\n";
}

int main()
{
	Citire();
	Gen123();
	Afis();

	return 0;
}
