#include <iostream>
#include <fstream>
using namespace std;
ifstream f("trenuri.in");
ofstream g("trenuri.out");
long n;
int N,N2,aux,aux1,ok,ok1,nr,nr2,nr3,maxi=0;
int a[1000],b[1000];
int main()
{
    f>>N;
    for(int i=0; i<N; i++)
    {
        f>>n;
        b[i]=n;
        ok=1;
        if(n%2==0 && n>2||n<2)
            ok=0;
        {
            for(int d=3; d*d<=n-1; d=d+2)
            {
                if(n%d==0)
                    ok=0;
            }
        }
        nr=0;
        nr2=1;
        nr3=1;
        while(nr<n)
        {
            nr=nr2+nr3;
            nr2=nr3;
            nr3=nr;
        }
        if(ok==1 && nr==n)
        {
            maxi=maxi+1;
            a[i]=3;
        }
        else if(ok==1)
        {
            maxi=maxi+1;
            a[i]=1;
        }
        else if(nr==n)
        {
            maxi=maxi+1;
            a[i]=2;

        }
        else
        {
            a[i]=0;
        }
    }
    N2=maxi;
    for(int j=0; j<=maxi; j++)
    {
        N2=N2-1;
        for(int k=0; k<N2; k++)
        {
            if(a[k]>a[k+1])
            {
                aux=a[k];
                a[k]=a[k+1];
                a[k+1]=aux;
                aux1=b[k];
                b[k]=b[k+1];
                b[k+1]=aux1;
            }
        }
    }
    for(int z=0; z<N; z++)
    {
        ok1=0;
            if(a[z]!=a[z+1]||a[z]==3&&a[z+1]==3)
                ok1=1;
                }
            if(ok1==1)
    {
        g<<maxi<<endl;
        for(int l=1; l<=maxi; l++)
            g<<b[l]<<" ";
    }
    else
        g<<0<<endl;

    return 0;
}
