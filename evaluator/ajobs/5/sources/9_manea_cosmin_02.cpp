#include <iostream>
#include <fstream>
using namespace std;
int n,f1,f2,f3,v[1000],i,r=0,x[1000],a[1000],b[1000],c[1000],flag=1,steag=1,j,tz=20,u=0;
int main()
{
    ifstream f("trenuri.in");
    ofstream g("trenuri.out");
    f>>n;
    for (i=1;i<=n;i++) f>>v[i];
    for (i=1;i<=n;i++)
    {
        steag=1;
        f1=v[i];
        for (f2=1;f2*f2<f1;f2++)
        {
            if (f1%f2==0) {steag=0;break;}
        }
        if (steag==0)
        {
            f1=1;
            f2=1;
            f3=2;
            r=0;
            while (j<tz)
            {
                f1=f2;
                f2=f3;
                f3=f1+f2;
                if (v[i]!=f3) r++;
                j++;
            }
            if (r==j) {x[i]=v[i];u++;}
            else a[i]=v[i];
        }
        else
        {
            f1=1;
            f2=1;
            f3=2;
            r=0;
            while (j<tz)
            {
                f1=f2;
                f2=f3;
                f3=f1+f2;
                if (v[i]==f3) r++;
                j++;
            }
            if (r==0) a[i]=v[i];
            if (r>0&&r<tz) b[i]=v[i];
            if (r==tz) c[i]=v[i];
        }
    }
    g<<n-u;
    g<<endl;
    return 0;
}

