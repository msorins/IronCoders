#include <iostream>
#include<fstream>
using namespace std;

int main()
{
    int ok,d,b,c,x,f1,f2,f3,i,n,a[50],e;
    ifstream f("trenuri.in");
    ofstream g("trenuri.out");
    f>>n;
    for(i=1; i<=n; i++)
    {
        d=2;
        ok=0;
        for(d=2; d<=a[i]/2; d++)
        {
            if(a[i]%d==0)
                ok=1;
            if(ok==0)
                g<<e<<" ";
        }
    do
    {   f3=f2+f1;
        f1=f2;
        f2=f3;
        f3=f1;
    }while(n!=0);
           g<<b<<" ";
        if(ok==0 && n!=0)
            g<<c<<" ";
            else g<<x<<" ";

    }
}
