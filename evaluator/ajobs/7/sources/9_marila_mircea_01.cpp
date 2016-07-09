#include <iostream>
#include <fstream>
using namespace std;

int main()
{
    ifstream f("moscraciun.in");
    ofstream g("moscraciun.out");
    int n;
    f>>n;
    int k[n+1],p[n+1],i,a=0,s=0,b=0,r=0,save,rast,v[n+1],j,w[n+1],x=0,u[n+1],h=0,z[n+1],d=0;
    for(i=1; i<=2*n; i++)
    {
        if(i%2!=0)f>>k[++a];
        if(i%2==0)f>>p[++s];

    }
    for(i=1; i<=n; i++)
    {
        rast=0;
        save=p[i];
        while(save)
        {
            rast=rast*10+save%10;
            save/=10;
        }
        if (rast==p[i])
        {
            b++;
            u[++h]=i;
        }
        else r++;
    }
    int q[h+1];
    for(i=1; i<=h; i++)
        q[i]=u[i];

    g<<b<<" "<<r<<endl;

    for(i=1; i<=n; i++)
        v[i]=k[i];
    for(i=1; i<n; i++)
        for(j=i+1; j<=n; j++)
            if(k[i]>k[j])swap (k[i],k[j]);
    for(i=1; i<=n; i++)
        for(j=1; j<=n; j++)
            if(k[i]==v[j])w[++x]=j;
    for(i=1; i<=x; i++)
        for(j=1; j<=h; j++)
            if(w[i]==q[j])z[++d]=w[i];

    int t[d+1];
    for(i=1; i<=d; i++)
        t[i]=z[i];
    for(i=1; i<=d; i++)
        g<<t[i]<<" ";

    return 0;
}










