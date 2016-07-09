#include <iostream>

using namespace std;

int main()
{
    int n,i,v[100];
    cin>>n;
    for(i=2;i<=n;i++)
       {

      int d=2, ok=1;
      while(d<=i/2&&ok==1)
      {
          if(i%d==0)
            ok=0;
          else d++;
      }
      if(ok==1)
        cout<<i<<" ";
       }
}

