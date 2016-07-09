#include <iostream>
#include <fstream>
#include <string.h>
#include <stdlib.h>
using namespace std;
ifstream f("moscraciun.in");
ofstream o("moscraciun.out");

int main()
{


    int K,N,P,i,d,c=0,nr4,nr=0,nr2=0,nr3=0,minim=9999999,e[100],k=0,j,maxim=0,y7,y8,r,u,l=0;
    char a[100],x[100];
    f>>N;
    for (i=1;i<=N;i++)
    {
        nr3++;
        f>>K;
        f>>P;
        d=P;
        e[k]=P;
        k++;
        while (d)
        {
            c=c*10+d%10;
            d=d/10;
        }

                 if (P<minim &&P==c)
        {
            minim=0;
            nr4=nr3;
            nr++;
        }
        else if (P!=c) nr2++;

    }

    return 0;

}
