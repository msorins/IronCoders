#include <iostream>
using namespace std;
int main(){
long x,y,nrdiv,nrdivmax=0,nr=0,val;
cin>>x>>y;
for(long i=x;i<=y;i++)
    {   long j;
        nrdiv=0;
        for(j=1;j*j<i;j++)
           if(i%j==0)nrdiv+=2;
        if(j*j==i)nrdiv++;
        if(nrdiv>nrdivmax)
        {
            nrdivmax=nrdiv;
            val=i;
            nr=1;
        }
        else
          if(nrdiv==nrdivmax)nr++;
    }
    cout<<val<<" "<<nrdivmax<<" "<<nr;
    return 0;
}
