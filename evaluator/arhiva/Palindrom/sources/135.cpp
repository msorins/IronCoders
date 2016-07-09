#include <iostream>

using namespace std;

int main()
{
   int n,i,x,inv,v[100];
   cin>>n;
   for(i=1;i<=n;i++) cin>>v[i];
   for(i=1;i<=n;i++)
   {
       x=v[i]; inv=0;
       while(x!=0)
       {
           inv=inv*10+x%10;
           x=x/10;
       }
       if(inv!=v[i])
        cout<<v[i]<<" ";
   }
}
