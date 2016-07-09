#include <iostream>
#include <fstream>
using namespace std;

int main()
{
    int P=0,n,p[30],k[30],c1=0,c2=0,t=0,q=0,i=0;
    ifstream fin ("moscraciun.in");
    ofstream gout("moscraciun.out");
    gout << "Ajuta-l pe Mos Craciun sa trimita cadourile" << endl;
    fin>>n;

    for(i=1; i<=n; i++)
    {
        fin>>p[i];
        P=p[i];
        q=0;
        while(p[i])
        {
            q=q*10+(p[i]%10);
            p[i]/=10;
        }
        if(P==q)
            c1++;
    }
    c2=n-c1;
    gout<<c1<<"copii au fost cuminti ,iar "<<c2<<"copii au fost rai"<<endl;
    for(i=1; i<=c1; i++)
    {
        fin>>k[i];
        if(k[i]>=k[i-1])
            gout<<"Numarul de ordine este  "<<i<<endl;

        if(k[i-1]>k[i])
        {
            for(i=1; i<=c1; i++)
            {
                t=k[i-1];
                k[i-1]=k[i];
                k[i]=t;
            }
        }
        gout<<i;
    }
    return 0;
}
