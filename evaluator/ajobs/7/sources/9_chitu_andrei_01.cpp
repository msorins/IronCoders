#include <iostream>
#include <fstream>
using namespace std;

int main()
{ifstream a ("moscraciun.in");
ofstream b("moscraciun.out");
int N;
a>>N;
int v[N],i=0,pali,vec[N],nr=0,o=0,K,P,var,var1,j;
for(i=1;i<=N;i++)
   {a>>K>>P;
    pali=P;
    while(P)
         {nr*=10;
          nr=nr+P%10;
          P/=10;
         }
    if(pali==nr) {o++;
                  vec[o]=i;
                  v[o]=K;
                 }
   pali=0;
   nr=0;
   }
  b<<o<<" "<<N-o<<endl;
  for(i=1;i<o;i++) for(j=2;j<=o;j++) if(v[i]>>v[j]) {var=v[i]; var1=vec[i];
                                                     v[i]=v[j]; vec[i]=vec[j];
                                                     v[j]=var; vec[j]=var1;  }
   for(i=1;i<=o;i++) b<<vec[i]<<" ";







    return 0;
}
