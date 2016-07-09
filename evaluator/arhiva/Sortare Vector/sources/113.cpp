#include <iostream>
#include <fstream>

using namespace std;
ifstream f("a.txt");
ofstream g("b.txt");

int main()
{
    int n,i,a[100],q;
    f>>n;
    for(i=1;i<=n;i++)
        f>>a[i];
    do{
        q=0;
       for(i=1;i<=n-1;i++)
       {
           if(a[i]>a[i+1])
           {
               int aux;
               aux=a[i];
               a[i]=a[i+1];
               a[i+1]=aux;
               q=1;
           }
       }
    }
    while(q==1);
        for(i=1;i<=n;i++)
        g<<a[i]<<" ";
    f.close();
    g.close();
    return 0;
}
