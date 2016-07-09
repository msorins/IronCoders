#include <iostream>
#include <fstream>
using namespace std;
ifstream f("moscraciun.in");
ofstream g("moscraciun.out");
int main()
{
      int n,distnt[50],nrc,nrcb=0,nrcr=0,z=0,i,j=0,nr,ok,min[20],k;
    f>>n;
    for(i=0;i<n;i++)
    {
        f>>distnt[j];
        j++;
        f>>nrc;
        int d=nrc;
        while(d)
        {

            z=z*10+d%10;
            d=d/10;
        }
        if(z==nrc)
        nrcb++;
        else
        nrcr++;

    }

    g<<nrcr<<" ";
    g<<nrcb<<"\n";
for(k=0;k<=nrcb;k++)
   {
    for(i=0;i<j;i++)
    {
        min[k]=50000;
        if(min[k]>distnt[i])
          {min[k]=distnt[i];
          nr=i;
          }
    }
g<<nr<<" ";
   }
    g<<nr;


    return 0;
}
