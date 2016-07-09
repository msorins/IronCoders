#include <iostream>
#include <fstream>
using namespace std;

ifstream f("moscraciun.in");
ofstream g("moscraciun.out");

int N,K,P,aux,nr,nrmic,aux2;
int S1,S2=0;
int a[50000],b[50000];
int mic=100000;
int x=1;
int maxi=0;
int u,z=0;

int main()
{
    f>>N;
    for(int i=0;i<N;i++)
    {
        f>>a[i];
        if(a[i]>maxi)
        {
            maxi=a[i];
        }
        f>>b[i];
        aux=b[i];
        nr=0;
        while(aux>0)
        {
            nr=nr*10+aux%10;
            aux=aux/10;
        }
        if(nr==b[i])
        {
            S1=S1+1;

        }
        else
        {
            S2=S2+1;
        }
    }
    g<<S1<<" "<<S2<<endl;
    while(z!=N)
    {
        mic=100000;
        for(int i=0;i<N;i++)
            {
                if(a[i]<mic)
                {
                    aux=b[i];
                    nr=0;
                    while(aux>0)
                    {
                        nr=nr*10+aux%10;
                        aux=aux/10;
                    }
                    if(nr==b[i])
                    {
                        if(a[i]!=aux2&&a[i]>aux2)
                        {
                            mic=a[i];
                            nrmic=i+1;
                        }
                    }
                }
            }
            if(nrmic!=u)
            {
            g<<nrmic<<" ";
            }
            u=nrmic;
            aux2=mic;
            z=z+1;
    }
    return 0;
}
