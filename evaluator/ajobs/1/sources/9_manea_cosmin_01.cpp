#include <fstream>
using namespace std;
int n,nr=0,v[50000],cbuni=0,crai=0,w[5000],i,a,t[1000],mn,tz=0,z[1000],poz;
int main()
{
    ifstream f("moscraciun.in");
    ofstream g("moscraciun.out");
    f>>n;
    for (i=1;i<=n;i++)
    {
        f>>v[i];
        f>>w[i];
    }
    for (i=1;i<=n;i++)
    {
        a=w[i];
        nr=0;
        while (a) {nr=nr*10+(a%10);a=a/10;}
        if (nr==w[i]) {cbuni++;t[i]=v[i];}
        else  crai++;
    }
    g<<cbuni<<" "<<crai;
    g<<endl;
    while (tz<n-1)
    {
        mn=32000;
        for (i=1;i<=n;i++)
        {
            if ((t[i]!=0) and (t[i]<mn)) {mn=t[i];poz=i;}
        }
        g<<poz<<" ";
        for (i=1;i<=n;i++)
        {
            if (t[i]!=mn) z[i]=t[i];
            else z[i]=0;
        }
        for (i=1;i<=n;i++) t[i]=z[i];
        tz++;
    }
    return 0;
}
