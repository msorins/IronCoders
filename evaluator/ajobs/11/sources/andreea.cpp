#include <iostream>
#include <fstream>
using namespace std;

int main()
{
   int n=0, k=0, p=0, pal=0, aux=0, a=0, b=0;
   ifstream f("moscraciun.in");
   f>>n;
   int v[n], w[n];
   for(int i=0; i<n; i++)
   {  f>>k>>p;
           pal=0;
           aux=p;
           while(aux!=0)
           {pal=pal*10+aux%10;
            aux=aux/10;}
            if(p==pal)
               {a++;
                v[a]=i+1;
                w[a]=k;}
            else
                b++;
  }
  ofstream g("moscraciun.out");
  g<<a<<" "<<b<<endl;
  for(int i=0; i<n; i++)
  for(int j=i+1; j<n; j++)
  { int aux1=0, aux2=0;
      if(w[i]>w[j])
      {
        aux1=w[i];
        w[i]=w[j];
        w[j]=aux1;
        aux2=v[i];
        v[i]=v[j];
        v[j]=aux2;
      }
  }

  for(int i=1; i<=a; i++)
    g<<v[i]<<" ";
    return 0;
}
