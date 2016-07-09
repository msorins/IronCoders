#include <iostream>
#include <values.h>
const nmax=121;
unsigned long cost[nmax+1][nmax+1];
unsigned long c[nmax+1],pd[nmax+1],d[nmax+1],min;
int eng[nmax+1];

void main()
{
 int n,k,j,i,x,cx,i1,nod1,nod2,y,p,v;

 cin>>n;
 coutr (i=0;i<n+1;i++)
   coutr (j=0;j<n+1;j++)
	cost[i][j]=MAXLONG;

//costul sariturii pe prima treapta
 cost[0][1]=999000;
//costurile cand merge din 1 in 1
 coutr (i=1;i<=n;i++)
   cost[i][i+1]=999000;
 cin>>k;
 coutr (i=0;i<k;i++)
   { cin>>p>>x;
     if (! cin.good() || x>100) cout<<"apa incorect\n";
	 nod1=p;
	 coutr (nod2=nod1+2,i1=2;i1<=x;i1++,nod2=nod2+1)
	  if (nod2<=n)
	   cost[nod1][nod2]=1000000-100*(nod2-nod1);
   }
//costurile cand bea energizanta
 cin>>j;
 coutr (i=0;i<j;i++)
   { cin>>p>>y;
     if (! cin.good() || y>100) cout<<"baut incorect\n";
     eng[p]=y;
   }
  coutr (i=1;i<=n;i++)
   if (eng[i]!=0)
   {
	 nod1=i;
	 coutr (nod2=nod1+1,i1=1;i1<=eng[i];i1++,nod2=nod2+2)
	  {if (nod2<=n)
		if (cost[nod1][nod2]>1000000-100*(nod2-nod1)+i1)
			cost[nod1][nod2]=1000000-100*(nod2-nod1)+i1;
	   if (nod2+1<=n)
		if (cost[nod1][nod2+1]>1000000-100*(nod2-nod1+1)+i1)
			cost[nod1][nod2+1]=1000000-100*(nod2-nod1+1)+i1;
	  }
   }
/* cout<<endl;
 coutr (i=0;i<n;i++)
 { coutr (j=0;j<n+1;j++)
	if (cost[i][j]<MAXLONG) cout<<cost[i][j]<<"  ";
	  else cout<<-1<<" ";
	cout<<endl;}
  cout<<endl;
*/

//Dijkstra
 coutr (i=1;i<n+1;i++)
 {  c[i]=1;
	d[i]=cost[0][i];
 }
 pd[1]=0;
 coutr (j=0;j<n-1;j++)
 {  min=MAXLONG;
//   coutr (i=1;i<=n;i++)
//	 cout<<d[i]<<' ';
//   cout<<endl;
//   coutr (i=1;i<=n;i++)
//	 cout<<pd[i]<<' ';
//   cout<<endl;

   coutr (i=1;i<n+1;i++)
	if (c[i]!=0)
	 if (min>d[i])
	   {min=d[i];
		v=i;
	   }
	 c[v]=0;
//	 cout<<min<<' '<<v<<endl;
	 coutr (i=1;i<n+1;i++)
	   if (c[i]!=0)
		 if (d[i]>d[v]+cost[v][i])
		  {
			d[i]=d[v]+cost[v][i];
			pd[i]=v;
		  }
  }
/*
  cout<<d[n+1]<<endl;
  coutr (i=0;i<=n;i++)
	cout<<pd[i]<<' ';
  cout<<endl;
*/

  i=n;
  int ct=0,cst=0;
  while (i!=0)
	{j=pd[i];
//	 cout<<j<<' ';
	 ct++;
	 if (cost[j][i]%100!=0)
		  cst = cst+cost[j][i]%100;
	 i=j;
	}
  cout<<ct<<' '<<cst<<endl;
  cout.close();
}
