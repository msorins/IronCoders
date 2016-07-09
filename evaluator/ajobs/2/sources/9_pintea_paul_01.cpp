#include <iostream>
#include <fstream>
using namespace std;
ifstream f("moscraciun.in");
ofstream g("moscraciun.out");
int main()
{
    int N,i=1,K,P,v[1000],x[1000],z,j=1,a[1000],shm[1000],rtv[1000],cif=0,c1=0,c2=0,y[1000],zd=1;
    f>>N;
    for(i=1; i<=N; i++)
    {
        f>>K;
        v[i]=K;
        a[i]=K;
        f>>P;
        x[i]=P;
        shm[i]=P;
    }
    for(j=1; j<N; j++)
    {
        i=1;
        for(i=1; i<N; i++)
        {
            if(v[i]>v[i+1])
            {
                z=v[i+1];
                v[i+1]=v[i];
                v[i]=z;
                i=i+1;
            }
        }
    }
    for(i=1; i<=N; i++)
    {
        rtv[i]=0;
        while(x[i]!=0)
        {
            cif=x[i]%10;
            rtv[i]=rtv[i]+cif;
            rtv[i]=rtv[i]*10;
            x[i]=x[i]/10;
        }
        rtv[i]=rtv[i]/10;
    }
    for(i=1; i<=N; i++)
    {
        if(shm[i]<10)
            {c1++;
            y[zd]=i;
            zd++;}
        if(shm[i]==rtv[i])
        {
            c1++;
            y[zd]=i;
            zd++;
        }
        else if(shm[i]!=rtv[i])
        {
            c2++;
        }
    }
zd=1;
    g<<c1<<" "<<c2<<endl;
    for(i=1; i<=N; i++)
    {
        for(j=1; j<=N; j++)
        {
            if(a[i]==v[j])
            {
                g<<y[zd]<<" ";
            }
        }zd++;
    }

    return 0;
}
