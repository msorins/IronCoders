/*trenuri*/

#include <iostream>
#include <fstream>
#include <stdio.h>

using namespace std;


    ifstream fin("trenuri.in");
    ofstream fout("trenuri.out");

int main()
{
    int n,i,ok,d,b=0;
    int s[1000],c1[5000];
    long f,p,a;

    fin>>n;
    for(i=0;i<n;i++)
    fin>>s[i];

    for(i=0;i<n;i++)
    {   d=s[i];
        ok=1;
        for(i=2;i<d/2;i++)
           if(d%i==0)
                ok=0;
        if(ok)
            {c1[b]=s[i];
            b++;

            fout<<endl<<d<<" ";}
   }
    p=a=1;

     for(i=3;i<10;i++)
    {   f=p+a;
        a=p;
        p=f;

    for(i=0;i<n;i++)
    {

        d=s[i];
        if(d==f)


        fout<<d<<" ";


    }
    }





    return 0;
}
