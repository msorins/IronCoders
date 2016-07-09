#include <iostream>

using namespace std;

int main()
{
   int d,i,a,b,r,n,j;
   cin>>n;

   for(j=1;j<=n;j++)
   {cin>>a;
    cin>>b;
    d=a;
   i=b;
   do{r=d%i;
      d=i;
      i=r;
     }
   while(r);
       cout<<d;
   }
return 0;
}
