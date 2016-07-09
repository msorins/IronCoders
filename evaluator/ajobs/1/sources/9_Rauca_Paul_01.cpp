#include <iostream>
#include <fstream>
using namespace std;
ifstream f("moscraciun.in");
ofstream g("moscraciun.out");
long K;
int P,N,N2,C1,C2,aux,aux1,aux2,o;
int a[50000],b[50000];
int main()
{
    f>>N;
    N2=N;

    for(int i=0; i<N;i++)
    {
            f>>K;
            a[i]=K;

            f>>P;
            aux=P;
            b[i]=i+1;
            o=0;
            while(aux>0)
            {
                o=o*10+aux%10;
                aux=aux/10;
            }
            if(o==P)
                C1=C1+1;
            else
                C2=C2+1;

    }
    for(int j=0;j<N;j++)
    {
        N2=N2-1;
        for(int k=0;k<N2;k++)
        {

            if(a[k]>a[k+1])
            {
                aux1=a[k];
                a[k]=a[k+1];
                a[k+1]=aux1;
                aux2=b[k];
                b[k]=b[k+1];
                b[k+1]=aux2;
            }
        }
    }
    g<<C1<<" "<<C2<<endl;

    for(int l=0;l<N-1;l++)
    g<<b[l]<<" ";

    return 0;
}
