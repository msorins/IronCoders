#include <iostream>
#include <fstream>
using namespace std;

ifstream f("trenuri.in");
ofstream g("trenuri.out");

int a[10000],b[10000],c[10000],auxa,auxb,auxc,aux1,f1,aux;
int n,v,l,m,N,x,S=0;
int Ok1,Ok2=1;

int main()
{
    f>>N;
    for(int i=0;i<N;i++)
    {
        f>>x;
        Ok1=1;
        Ok2=0;
       if((x%2==0 && x!=2) || x<2)
        {
            Ok1=0;
        }
        else
        {
            for(int d=3;d*d<x;d=d+2)
            {
                if(x%d==0)
                {
                    Ok1=0;
                }
            }
        }
        f1=1;
        aux=1;
        while(f1<=x)
        {
            if(f1+aux==x)
            {
                Ok2=1;
                break;
            }
            aux1=f1;
            f1=f1+aux;
            aux=aux1;
        }
            if(Ok2==1 && Ok1==1)
            {
               c[n]=x;
               n=n+1;
               S=S+1;
               auxc=auxc+1;
           }
           else if(Ok2==1&&Ok1!=1)
           {
                b[v]=x;
                v=v+1;
                S=S+1;
                auxb=auxb+1;
           }
            if(Ok1==1&&Ok2!=1)
           {
                a[l]=x;
                S=S+1;
                auxa=auxa+1;
           }
    }
    g<<S<<endl;
    for(int l=0;l<auxa;l++)
    {

            g<<a[l]<<" ";


    }
    for(int v=0;v<auxb;v++)
    {

            g<<b[v]<<" ";


    }
    for(int n=0;n<auxc;n++)
    {

            g<<c[n]<<" ";


    }
    g<<endl;
    return 0;
}
