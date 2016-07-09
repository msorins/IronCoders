/*mos craciun*/

#include <iostream>
#include <fstream>
#include <stdio.h>
using namespace std;



int main()
{
    int i,n,d,y,c,c1[5000],c2[5000];
    int k[100],p[100],s,l=0,m=0;

    ifstream fin("moscraciun.in");
    ofstream fout("moscraciun.out");

    fin>>n;
    for (i=0; i<n; i++)
    fin>>k[i]>>p[i];


    //prima linie
    for(i=0;i<n;i++)
    {
        d=p[i];
        y=0;
        while(d)
        {
            c=d%10;
            y=y*10+c;
            d=d/10;
        }

        if(p[i]==y)
            c1[l++]=p[i];
       else
            c2[m++]=p[i];
    }

        fout<<l<<" "<<m;
        fout<<endl;




    return 0;
}
