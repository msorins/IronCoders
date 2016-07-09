// sursa Pit-Rada Vasile - 100 p
#include<iostream>
#include<math.h>
using namespace std;

int n,i,c,s,aux,r[1001],j,k;
int x[10000],y[10000];


int main()
{
	cin>>n;
	c=0;
	for (i=1;i<=n;i++)
	{
		cin>>r[i];
		for (j=1;j<=r[i]-1;j++)
		{
			k=(int)sqrt((double)r[i]*r[i]-j*j);
			if (k*k+j*j==r[i]*r[i])
			{
				c++;
				x[c]=j; y[c]=k;

			}
		}
	}
	cout<<c<<"\n";
	for (i=1;i<c;i++)
		for (j=i+1;j<=c;j++)
			if (x[i]*y[j]>x[j]*y[i])
			{
				aux=x[i]; x[i]=x[j]; x[j]=aux;
				aux=y[i]; y[i]=y[j]; y[j]=aux;
			}
	x[0]=0; y[0]=1;
	s=0;
	for (i=1;i<=c;i++)
	{
		if (x[i-1]*y[i]<x[i]*y[i-1])
			s++;
	}
	cout<<s<<"\n";
	s=1;
	for (i=2;i<=c;i++)
	{
		if (x[i-1]*y[i]==x[i]*y[i-1])
		{
			s++;
		}
		else
		{
			cout<<s<<" ";
			s=1;
		}
	}
	cout<<s;
	return 0;
}
