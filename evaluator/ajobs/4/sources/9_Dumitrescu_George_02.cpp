#include <iostream>
#include <fstream>
using namespace std;
ifstream fin("trenuri.in");
ofstream fout("trenuri.out");
int main()
{
    int N,T[30],i,d=2,ok=0,f1=1,f2=1,f3,n,j=1;
    fin>>N;
    n=N;
    for(i=1; i<=N; i++)
        fin>>T[i];
    for(i=1; i<=N; i++)
    {
        for(d=2; d*d<=T[i]&&ok==0; d++)
        {
            if(T[i]%d==0)
                ok=1;
        }
        while(f3<T[i])
        {
            f3=f1+f2;
            f1=f2;
            f2=f3;
        }
        if(T[i]!=f3&&ok==1)
        {
            n--;
            for(j=1; j<=N; j++)
                T[i]=T[i+1];
            N--;
        }
        f3=-1;
        f1=1;
        f2=1;
        ok=0;
    }
    fout<<n<<endl;
    for(j=1; j<=N; j++)
        fout<<T[j]<<" ";
    //cout << "Hello world!" << endl;
    return 0;
}
