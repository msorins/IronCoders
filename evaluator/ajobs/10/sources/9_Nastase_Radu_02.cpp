#include <iostream>
#include <fstream>
using namespace std;
ifstream f("trenuri.in");
ofstream g("trenuri.out");
int main()
{
    int cod[100],i,n,nrg=-1,ok=1,nrf,nrf1=1,nrf2=1,d,nr,k,l=0,j;
    f>>n;
    for(i=0;i<n;i++)
    {
        f>>cod[i];

    }
    for(i=0;i<n;i++)
    {
        if(cod[i]<2 || cod[i]>2 && cod[i]%2==0)
        {
            ok=0;
        }
        else for(d=3;d*d<cod[i];d=d+2)
        {
            if(cod[i]%2==0)
            ok=0;
        }
        if(ok==0)
        {
        nrf=nrf1+nrf2;
        while (cod[i]!=nrf &&nrf<cod[i])
          {
              nrf2=nrf1;
              nrf1=nrf;
              nrf=nrf1+nrf2;

          }
    if (cod[i]!=nrf)
     {
    nrg++;
    nr=i;
    for(k=nr;k<n;k++)
    cod[k]=cod[k+1];

}

    }
    }
    g<<n-nrg<<" \n";


    for(j=0;j<n;j++)
    {
       if(cod[j]<2 || cod[j]>2 && cod[j]%2==0)
        {
            ok=0;
        }
        else for(d=3;d*d<cod[j];d=d+2)
        {
            if(cod[j]%2==0)
            ok=0;
        }

        nrf=nrf1+nrf2;
        while (cod[i]!=nrf &&nrf<cod[i])
          {
              nrf2=nrf1;
              nrf1=nrf;
              nrf=nrf1+nrf2;

          }

for(i=0;i<n-1;i++)
{

          if(ok==1 && cod[j]!=nrf)
          cod[i]=cod[j];
          else if(ok==0 && cod[j]==nrf)
          cod[i+1]=cod[j];

          else if(ok==1 && cod[j]==nrf)
         {
        cod[n-l]=cod[j];
       l++;
         }
}
    }
    for(i=0;i<n-1;i++)
    g<<cod[i]<<" ";
    return 0;
}
