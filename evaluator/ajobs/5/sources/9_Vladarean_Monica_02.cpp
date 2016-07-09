#include <iostream>
#include <fstream>

using namespace std;

int main()
{
    int N,nr,numar,d,ok=1,sum=0,i=1, v[100];

    ifstream fin ("trenuri.in") ;
    ofstream fout ("trenuri.out") ;

    fin>>N; // 2 <= N <= 1000;

    for (nr=1;nr<=N;nr++)
             {
              fin>> numar;
              v[i]=numar;
              i++;
              if (nr<0 || numar%2!=0 && nr!=2) ok=1;
              for (d=2;d<numar;d++) if (numar%d==0) ok=0;
              if (ok==1) sum++; // este un vagon de tip A (sau un vagon de tip C, daca este si numar Fibonacci);

             }

    sum=sum+1;
    fout<<sum<<endl;
    fout<< v[i];

    return 0;

}
