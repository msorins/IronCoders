#include <iostream>
#include <fstream>
#include <math.h>
using namespace std;

int main()

{
    int n, p, k=0,j, i, min=pow(2,31)-1, cum=0, rai=0, r=0;
    ifstream f("moscraciun.in");
    ofstream g("moscraciun.out");
    f>>n;
    int b[n], a[n];
    for(i=1; i<=n; i++)
        f>>a[i]>>b[i];

    for(i=1; i<=n; i++ )
    {
        p=b[i];

        while(p)
        {
            r=r*10+(p%10);
            p/=10;
        }
        if(b[i]==r) cum++;
        else
        {
            rai++;
            b[i]=0;

        }
        r=0;
    }
    g<<cum<<" "<<rai;
    g<<endl;
    for(i=1; i<=n-rai; i++)
    {

        for(j=1; j<=n; j++)

            if(b[j]!=0)
            {
                if(a[j] <min)
                {
                    min=a[j];
                    k=j;
                }
            }

        g<<k<<" ";
        a[k]=pow(2,31)+1;
        min=pow(2,31)-1;

    }



    return 0;
}
