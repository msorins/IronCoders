#include <iostream>
#include<fstream>
using namespace std;

int main()
{
    ifstream f("trenuri.in");
    ofstream g("trenuri.out");
    int n,a,b,c,x,y,d,ok,f1,f2,f3;
    f>>n;
        while(n!=0)
        {
            f>>y;
            d=2;ok=1;
            while(d<=y/2 && ok==1)
                if(y%d==0) ok=2;
            else d++;
            if(ok==1&&a==y)
                f1=1;f2=1;
            do
            {
                f3=f1+f2;
                f1=f2;
                f2=f3;
            }while(f3!=y);
            if(f3==y&&f3==y)c=y;
            else x=y;
            n--;
        }
        f.close();
        g.close();
}
