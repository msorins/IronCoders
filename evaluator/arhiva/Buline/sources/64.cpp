#include<iostream>
#define nmax 50000
#define inf "buline.in"
#define outf "buline.out"
using namespace std;
char a[nmax];
unsigned n,m;
int main()
{unsigned i,j,l,k1,k2;
 unsigned x;

 cin>>m;cin>>n;
 for(i=0;i<nmax;i++) a[i]=0;
 for(i=1;i<=m;i++)
   {cin>>x;a[x]=1;}
 for(i=1;i<=n;i++)
  {cin>>x;a[x]+=2;}
 i=0;
 while(i<nmax&&a[i]!=3)i++;
 j=nmax-1;
 while(j>i&&a[j]!=3)j--;
 cout<<i<<' '<<j<<' ';
 k1=k2=0;
 for(l=0;l<i;l++)
  if(a[l]==1) k1++;
    else if(a[l]==2) k2++;
 for(l=j+1;l<=nmax;l++)
  if(a[l]==1) k1++;
    else if(a[l]==2) k2++;
 if(k1==k2) cout<<0<<'\n';
    else if(k1>k2) cout<<1<<'\n';
	   else cout<<2<<'\n';
;
 return 0;
}
