#include <iostream>
#include <fstream>

using namespace std;


int main()
{
    int n,i,a[10001],q;
    cin>>n;
    for(i=1;i<=n;i++)
        cin>>a[i];
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
        cout<<a[i]<<" ";
    return 0;
}
