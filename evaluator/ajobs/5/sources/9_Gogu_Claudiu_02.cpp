#include <iostream>
#include<fstream>
using namespace std;

int main()
{
    int n, a, b, c, x, y, ok, f1, f2, f3, d, p1, p2, p3, p4;
    ifstream f("trenuri.in");
    ofstream g("trenuri.out");
    f>>n;
    while(n)
    {
        f>>y;
        d=2;
        ok=1;
        while(d<=y/10&&ok==1)
            if(y%d==0)ok=0;
            else d++;
        if(ok==1)a=y;
        f1=1;
        f2=1;
        while(f3!=y)
        {
            f3=f2+f1;
            f1=f2;
            f2=f3;
        }

        if(f3==y)b=y;
        if(ok==1&&f3==y)c=y;
                              else x=y;
    }
    p1=a; p2=b; p3=c; p4=x;
    if(p1!=p2)
        g<<a<<b<<c<<a;
    f.close();
    g.close();
}
