#include <iostream>
#include <fstream>
using namespace std;
ifstream f ("moscraciun.in");
ofstream g ("moscraciun.out");
int main()
{
    int n,i,j,ok=0,a,s=0,cif,flag,b;
    f>>n;
    int m[n][2],v[n];
    for(i=1; i<=n; i++)
        for(j=1; j<=2; j++)
            f>>m[i][j];
    for(i=1; i<=n; i++)
    {
        a=m[i][2];
        while(a!=0)
        {
            cif=a%10;
            s=s*10+cif;
            a/=10;
        }
        if(s==m[i][2])
            ok++;
        else m[i][1]=0;
        s=0;
    }
    for(i=1;i<=n;i++)
    {
        m[i][2]=i;
    }
    for(i=1;i<=n&&flag;i++)
    {
        flag=0;
        for(j=1;j<=n-1;j++)
        if(m[j+1][1]<m[j][1])
        {
            a=m[j][1]; b=m[j][2];
            m[j][1]=m[j+1][1]; m[j][2]=m[j+1][2];
            m[j+1][1]=a; m[j+1][2]=b;
            flag=1;
        }
    }
    g<<ok<<" "<<n-ok<<"\n";
    for(i=n-ok+1;i<=n;i++)
        g<<m[i][2]<<" ";
    return 0;
}
