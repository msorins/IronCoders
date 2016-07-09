#include <iostream>
#define nmax 220
using namespace std;
char a[nmax][nmax];
int s[nmax+1],ct[nmax+1],n,k,m,lung,coada[nmax+1],begin,end,v1,v2,dist[nmax+1];
void in(int val)
 {coada[end]=val;end++;}
int out()
 { begin++; return coada[begin-1];}
int isempty()
 {return begin==end;}

void parc()
 { int i;
   int vf = out();
//   cout<<vf<<' ';
   for(i=1;i<=n;i++)
     if (a[vf][i]==1 && ct[i]==0)
      { dist[i]=dist[vf]+1;
	ct[i]++;in(i);
      }
   if (!isempty())
     parc();
 }

void print()
{ int i;
  for (i=0;i<=k;i++)
   { //cout<<s[i]<<' ';
     ct[s[i]]++;
   }
//  cout<<v2<<endl;
}

int valid(int p)
{ int i;
  if(a[s[p]][s[p-1]]==0) return 0;
  for(i=0;i<p;i++)
    if (s[p]==s[i]) return 0;
  if (p==k && a[s[p]][v2]==0) return 0;
  return 1;}

void back(int p)
 { int i;
   for (i=1;i<=n;i++)
     {s[p]=i;
      if (valid(p))
       if (p==k)
	 print();
       else
	 back(p+1);
      }
 }

int main()
{
  int i,i1,i2;
  cin>>n>>m>>v1>>v2;
  for (i=1;i<=m;i++)
   { cin>>i2>>i1;
     a[i1][i2]=a[i2][i1]=1;
   }
  in(v1);
  ct[v1]=1;
  parc();
//  for (i=1;i<=n;i++)
//    cout<<pred[i]<<' ';
//  cout<<endl;
  k=dist[v2];
//  cout<<k<<endl;
  k--;
  s[0]=v1;
  back(1);
  int kt=0;
  ct[v2]=ct[v1];
  for (i=1;i<=n;i++)
	if(ct[v1]==ct[i] )
	  kt++;
  cout<<kt<<endl;
  for (i=1;i<=n;i++)
	if(ct[v1]==ct[i])
	  cout<<i<<' ';
  return 0;
}
