#include <iostream>
#include <fstream>
using namespace std;
ifstream fin("moscraciun.in");
ofstream fout("moscraciun.out");
int main()
{
    int N,P[30],K[30],C1=0,C2=0,min1=100000000,nrinv=0,p,j=1,a[30],l=1,i=1;
    fin>>N;
    for(i=1; i<=N; i++)
        fin>>K[i]>>P[i];
    for(i=1; i<=N; i++)
    {
        p=P[i];
        while(p)
        {
            nrinv=nrinv*10+p%10;
            p/=10;
        }
        if(nrinv==P[i])
        {
            C1++;
            a[l]=K[i];
            l++;
        }
        else
            C2++;
        nrinv=0;
    }
    fout<<C1<<" "<<C2<<endl;
    for(l=1; l<=C1; l++)
    {
        for(j=1; j<=C1; j++)
        {
            if(a[l]<=min1)
            {
                min1=a[l];
                a[l]=10000000000;
                for(i=1; i<=N; i++)
                {
                    if(K[i]==min1)
                        fout<<i<<" ";
                }
            }
            min1=1000000000;
        }
    }


    //cout << "Hello world!" << endl;
    return 0;
}
