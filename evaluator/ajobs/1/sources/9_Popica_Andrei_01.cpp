#include <iostream>
#include <fstream>
#include <limits.h>
using namespace std;

int main()
{
    int p[100],k[100],n,c,nou1=0,nou2=0,nr=0,i,min=0,b[100];
    ifstream fin   ("moscraciun.in" );
    ofstream fout  ("moscraciun.out" );
    fin>>n;
    for(i=1; i<=n; i++)
    {
        fin>>p[i];
    }
        while(p[i])
        {
            c=p[i]%10;
            nou1=nou1*10+c;
            nou2=nou2+c*10;
            p[i]=p[i]/10;

        }
        if(nou1==nou2) nr++;
        fout<<nr<<"  ";
        for(i=1; i<=n; i++) fout<<p[i]-nr;


    for(i=1; i<=n; i++)
        fin>>k[i];
    if( min>k[i] ) min=k[i];
    fout<<min;

       /*for(i=1; i<=n; i++) b[p[i]]++;
        fout<<b[p[i]];*/
    return 0;
}
