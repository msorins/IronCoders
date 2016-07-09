#include <iostream>
#include <fstream>
using namespace std;

int main()
{ifstream f("trenuri.in");
ofstream g("trenuri.out");
int N, A=0, B=0, C=0, X=0, i,a[1000], ok, d, nrv=0, f1, f2, f3;
f>>N;
for(i=1;i<=N;i++)
    f>>a[i];

for(i=1;i<=N;i++)
   {ok=1;
for(d=2;d<=2;d++)
    if(a[i]%2==0) ok=0;
    if(ok==1) {A=a[i];
               nrv++;}
    f1=1;
    f2=1;
   do{f3=f1+f2;
        f1=f2;
        f2=f3;}
        while(f3<a[1]);
            if(a[i]==f3) {B=a[i];
            nrv++;}
    if(A==B){ C=a[i];
    nrv++;}
        g<<nrv<<endl;
        if(A!=B && B!=C && A!=C) g<<A<<" "<<B<<" "<<C<<" ";

}



    f.close();
g.close();
}
