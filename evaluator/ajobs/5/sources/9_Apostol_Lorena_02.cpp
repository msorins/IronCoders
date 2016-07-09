#include <iostream>
#include <fstream>

using namespace std;

ifstream fin("trenuri.in");
ofstream fout("trenuri.out");

int main()
{
    int N,i,j,OK,d,k=0,l=0,m=0,q=0;
    int s[1000],A[1000],B[1000],C[1000],X[1000];
    long fibo[1000];


    fin>>N;
    for(i=0; i<N; i++)
        fin>>s[i];


    for(i=0; i<N; i++)
    {
        OK=1;
        if(s[i]<2 || s[i]>2 && s[i]%2==0)
            OK=0;
        for(d=3; d*d<=s[i]; d=d+2)
            if(s[i]%d==0)
                OK=0;

        if(OK)
        {
            A[k++]=s[i];
            C[m++]=s[i];
        }

        int termen1=1,termen2=1;
        for(j=0; j<N; j++)
        {
            fibo[j]=termen1+termen2;
            termen1=termen2;
            termen2=fibo[j];  //generez sirul lui Fibonacci

        }


    }


    for(i=0; i<N; i++)
    {
        for(j=0; j<N; j++)
            if(s[i]==fibo[j])
            {
                B[l++]=s[i];
                C[m++]=s[i];
            }

        if(s[i]!=A[k] || s[i]!=B[l] || s[i]!=C[m])
            X[q++]=s[i];

    }
    fout<<k+l+m-4<<"\n";
    for(i=0; i<N; i++)
    {
        fout<<A[i]<<" ";
        fout<<B[i]<<" ";
        fout<<C[i]<<" ";




    }

    return 0;
}
