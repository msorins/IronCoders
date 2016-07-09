#include <iostream>
#include <fstream>
#include <math.h>
using namespace std;
ifstream f("trenuri.in");
ofstream g("trenuri.out");
int main()
{int N,i,a[1000],z[1000],A,B,C,x,b=0,c=0,j,ok,hm,k=1,tz[1000],u=0;
    f>>N;
    for(i=1;i<=N;i++)
        f>>a[i];
        z[1]=1;
        A=1;
        z[2]=2;
        B=2;
        for(i=3;i<=233;i++)
        {
            z[i]=A+B;
            C=z[i];
            A=B;
            B=C;
            if(z[i]>99999999)break;

        }
    for(i=1;i<=N;i++){
            j=2;
    ok=0;
        while(j<=a[i]/2)
        {
            if(a[i]%j==0)ok=1;
            j++;
        }
        hm=1;
        for(j=1;j<=a[i];j++)
        {
            if(a[i]==z[j])hm=0;
        }
        if(hm==0&&ok==0)
        {
            c++;
        }
        else if(ok==0&&hm==1)u++;
        else if(hm==0&&ok==1)b++;
        else if(hm==1&&ok==1)
        {
            x++;
            tz[k]=i;
            k++;
        }

        }
        g<<u+b+c<<endl;
        for(j=1;j<=k;j++)
        for(i=3;i<=N;i++)
            a[i]=a[i+1];
            N=N-1;
            for(i=1;i<=N;i++)
                g<<a[i]<<" ";


    return 0;
}
