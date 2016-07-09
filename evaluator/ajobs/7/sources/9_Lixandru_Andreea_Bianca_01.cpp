#include <iostream>
#include<fstream>
using namespace std;

int main()
{
    int n,i,a[50],b[50],ni,y,aux,aux1,j,nr,c;
    ifstream f("moscraciun.in");
    ofstream g("moscraciun.out");
    f>>n;
    for(i=1; i<=n-1; i++)
       for(j=i+1; j<=n; j++)
        {
            aux=a[i];
            a[i]=a[j];
            a[j]=aux;
            aux1=b[i];
            b[i]=b[j];
            b[j]=aux1;}
            ni=0;
            y=a[i];
    if(y!=0)
    {
        ni=ni*10+y%10;
        y=y/10;
    }
    if(ni==a[i])
        nr++;
    else
        c++;
    cout<<g<<c<<" ";
}
