// Sursa Pit-Rada Vasile - 100 p
#include<iostream>
#include<math.h>
using namespace std;
int cablu1[30001],cablu2[30001];
int x1[10001],x2[10001],z1[10001],z2[10001],x[101],y[101];
int n1,n2,n,i,d,k,poz,cul,d1,d2,j,dif,dift,i1,i2,w1,w2,w,m1,m2;
double dmin;


int main()
{
	
cin>>n>>d;
k=0; d1=0;
for (i=1;i<=n;i++)
{
	cin>>poz>>cul;
	cablu1[poz]=i*100+cul-1;
	if (cul>k) k=cul;
	if (poz>d1)d1=poz;
}
d2=0;
for (i=1;i<=n;i++)
{
	cin>>poz>>cul;
	cablu2[poz]=i*100+cul-1;
	if (poz>d2)d2=poz;
}
dmin=0;
for (cul=1;cul<=k;cul++)
{
n1=0; 
m1=0;
for (i=0;i<=d1;i++)
{
	if (cablu1[i])
	{
		m1++;
		if (cablu1[i]%100+1 == cul)
		{
			n1++;
			x1[n1]=i;
			z1[n1]=cablu1[i]/100;
		}
	}
}
n2=0;
m2=0;
for (i=0;i<=d2;i++)
{
	if (cablu2[i])
	{
		m2++;
		if (cablu2[i]%100+1 == cul)
		{
			n2++;
			x2[n2]=i;
			z2[n2]=cablu2[i]/100;
		}
	}
}
i=1; j=1;
dift=x1[i]-x2[j]; i1=z1[i]; i2=z2[j];
if (dift<0) dift=-dift;
while (i<=n1 && j<=n2 && dift!=0)
{
	dif=x1[i]-x2[j]; 
	if (dif<0)dif=-dif;
	if (dif<dift){dift=dif; i1=z1[i]; i2=z2[j];}
	if (x1[i]<x2[j])i++;
		else j++;
}
x[cul]=i1; y[cul]=i2;
dmin=dmin+sqrt((double)dift*dift+d*d);
}
w1=(int)floor(dmin);
w2=(int)floor((dmin-w1)*1000);
cout<<w1<<".";
if (w2<10)cout<<"00"<<w2;
else if (w2<100)cout<<"0"<<w2;
else cout<<w2;
cout<<"\n";
for (cul=1;cul<=k;cul++)
{
	cout<<x[cul]<<" "<<y[cul]<<"\n";
}
return 0;
}


	