#include <iostream>
#include <fstream>
using namespace std;

int main()
{
    int n,i,a[50],f1,s=0,f2,f3,ok1,ok2,d,A=0,B=0,C=0,X=0;
    ifstream f("trenuri.in");
    ofstream g("trenuri.out");
f>>n;
        for(i=1;i<=n;i++)

            f>>a[i];

    for(i=1;i<=n;i++)
    {

        d=2;
        ok1=0;
        ok2=0;
        f1=1;
        f2=1;

        while(a[i]!=0)
        {

            while(d<=a[i]/2&&ok1==0)
            if(a[i]%d==0)
                ok1=1;
            else
                d=d+1;
                    do{
            f3=f1+f2;
            f1=f2;
            f2=f3;
            }while(f3<a[i]);
            if(f3==a[i]||a[i]==1)
            ok2=1;}
            if(ok1==1&&ok2==0)
                A++;
            if(ok1==0&&ok2==1)
                B++;
                if(ok1==1&&ok2==1)
                C=C+1;
            if(ok1==0&&ok2==0)
                X++;}
            s=A+B+C;
            g<<s<<endl<<A<<" "<<B<<" "<<C<<" ";

f.close();
g.close();
}
