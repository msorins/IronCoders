#include <iostream>
#include <fstream>

using namespace std;

int main()
{int n,i,a[50],v[50],aux,j,og,y,aux1,c1,c2;
ifstream f("moscraciun.in");
ofstream g("moscraciun.out");
    f>>n;c1=0;c2=0;
 for(i=1;i<=n-1;i++)
  for(j=i+1;j<=n;j++)
 if(a[i]>a[j]){aux=a[i];
               a[i]=a[j];
               a[j]=aux;
               aux1=v[i];
               v[i]=v[j];
               v[j]=aux1;

 }
 for(i=1;i<=n;i++){
    y=a[i];
    og=0;
 while(y!=0){og=og*10+y%10;
             y/10;}
 }
 if(a[i]=og)c1++;
            else
            c2++;

g<<c1<<" "<<c2<<a[i];


f.close();
g.close();
}
