#include <iostream>
#include <fstream>
#include <cmath>
#include <limits.h>

using namespace std;

int main()
{
    int N, K, P, C1=0, C2=0,cf=0,cifre=1, cfr=0, v[100],i=1,min=INT_MAX, max=INT_MIN, w[100];

    ifstream fin ("moscraciun.in") ;
    ofstream fout ("moscraciun.out") ;

    fin>>N;
    for (N=1; N<=50000; N++) {fin>> K; fin>>P; int PP=P;
                              while (PP!=0)
                              {
                                  PP/=10;
                                  cf++;
                                  cifre*=10;
                              }
                              cifre/=10;
                              while( P!=0)
                              {
                                  if (P%10!=P%cifre) C2++;
                                  else if (P%10==P%cifre) C1++;
                                  P/=(pow(10,(cf-1)));
                                  P/=10;
                              }
                              v[i]=K;
                              i++;
                              while (i!=0)
                              {
                                  if (v[i]<min) min=v[i];
                                  else if (v[i]>max) max=v[i]+1;
                                  i--;
                              }
                             }

    fout<<C2<<" "<<C1<< " "<<endl;
    fout<<min<<" "<<"1"<<" "<<max;


    return 0;
}
