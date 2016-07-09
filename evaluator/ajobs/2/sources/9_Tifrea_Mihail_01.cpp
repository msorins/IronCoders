#include <iostream>
#include <fstream>
using namespace std;
ifstream f("moscraciun.in");
ofstream g("moscraciun.out");
int main()
{
    int n[50000],p,c1,c2,i,N,z,cif,t,j,nr,save,v,k[50000],min,r,u[50000];
    j=0;
    f>>N;
    v=0;
    z=0;
    t=0;
    r=0;
    nr=0;
    for(i=0;i<N;i++)
    {
        f>>k[i];
        f>>n[i];
        save=n[i];
        while(n[i])
        {
            j++;
            cif=n[i]%10;
            if(j==1&&cif==0);
            else nr=nr*10+cif;
            n[i]/=10;
        }
        n[i]=save;
        if(nr==save){t++;u[t]=k[i]*10000+i+1;}
        nr=0;
    }
    if(i>9){r++; if(i>99)r++; if(i>999)r++;}
    z=N-t;
    g<<t<<" "<<z<<endl;
    min=1000000;
for(i=1;i<=t;i++)
    {
        g<<u[i]%10000<<" ";
        k[i]=u[i]%10000;
    }


    return 0;
}

