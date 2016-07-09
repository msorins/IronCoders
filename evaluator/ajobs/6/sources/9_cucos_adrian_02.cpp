#include <iostream>
#include <fstream>
using namespace std;

int n,i,vagon,s=1,f1,f2,f3,maxim,nu,j;
int main()
{
    ifstream f("trenuri.in");
    ofstream g("trenuri.out");
    f>>n;
    int tren[n],X[n],B[n],y=1,x=1;
    for(i=1;i<=n;i++){
        f>>tren[i];
        if (maxim<tren[i]) maxim=tren[i];

    }
    for(i=1;i<=n;i++){
        for(j=1;j*j<=n;j++){
            if(tren[i]%j==0) {tren[i]=X[x];x++;break;}
        }
    }
    for(i=1;i<n;i++){
        f1=1;
        f2=1;
        for(j=1;j<maxim;j++){
                f3=f1+f2;
                if (X[i]==f3 || X[i]==1 ){B[y]=X[i];y++;X[i]=0;break;}
                f1=f2;
                f2=f3;
        }
    }
    for(i=1;i<n;i++){
        if (X[i]!=0) nu++;
    }
    g<<n-(n-nu);
    return 0;
}
