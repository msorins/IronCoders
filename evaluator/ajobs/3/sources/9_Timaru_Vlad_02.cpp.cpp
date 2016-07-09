#include <iostream>
#include <fstream>

using namespace std;

int main()
{int n,i,ok,d,v[50],f1,f2,f3,x2,a,b,c,x,s;
ifstream f("trenuri.in");
ofstream g("trenuri.out");
    f>>n;s=0;
 for(i=1;i<=n;i++)
    ok=1;x2=1;
    for(d=2;d<=i/2;d++){
     if(i/d==0) ok==0;
 if(ok==1)
 a=v[i];
    s=s+a;}
    f1=1;
    f2=1;
    do{
        f3=f1+f2;
        f1=f2;
        f2=f3;
    }while(f3<i);
    if(i==f3||i==1)
        b=v[i];
        s=s+b;x2=0;
    if(ok==1&&x2==0)
    c=v[i];
    s=s+c;
    if(ok==0&&x2==1) x=v[i];
     g<<a<<" "<<b<<" "<<c;

}
