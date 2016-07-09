#include <iostream>
#include <fstream>

using namespace std;

ifstream fin("moscraciun.in");
ofstream fout("moscraciun.out");



    long N,K[50000],P[50000],i,d,C1[50000],C2[50000];
    int c,y,l=0,m=0,poz[1000];


    void citire()
    {
         fin>>N;
         for(i=0;i<N;i++)
         fin>>K[i]>>P[i];

    }


    void cumintenie()
    {
        for(i=0;i<N;i++)
    {
       d=P[i];
       y=0;
       while(d)
       {
           c=d%10;
           y=y*10+c;
           d=d/10;
       }
       if(P[i]==y)
        C1[l++]=P[i];
       else
         C2[m++]=P[i];

    }

     fout<<l<<" "<<m<<"\n";
    }


    void distanta()
    {
        int distmin=2^31-1,j=0;

        for(i=0;i<N;i++)
          if(K[i]<distmin)
              distmin=K[i]; //aici se va gasi minimul sirului

        for(i=0;i<N;i++)
         {
             if(K[i]==distmin)
              poz[j++]=i+1;


         }



    }




    int main()
{
     citire();
     cumintenie();
     distanta();

    return 0;
}
