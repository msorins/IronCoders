#include <iostream>
#include <fstream>
using namespace std;

int main()
{ifstream f("moscraciun.in");
ofstream g("moscraciun.out");
int N, P, K, C1=0, C2=0,  a[50000], b[50000], i, j, aux, p[50000], y,og;
f>>N;
for(i=1;i<=N;i++)
    f>>a[i];
for(i=1;i<=n;i++) f>>b[i]>>endl;
for(i=1;i<=N;i++)
{
    K=a[i];
    P=b[i];
    y=P;
    og=0;
    while(y!=0) {og=og*10+y%10;
                 y=y/10;}
    if(P==og) {C1++;
               p[i]=P;}
      else C2++;
}
for(i=1;i<=N-1;i++)
{for(j=i+1;j<=N;j++)
     if(a[i]>a[j]){ aux=a[i];
                     a[i]=a[j];
                     a[j]=aux;}

}
g<<C1<<" "<<C2<<endl;
for(i=1;i<=N;i++)
    g<<i<<" ";
f.close();
g.close();
}
