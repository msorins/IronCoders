#include <iostream>

using namespace std;

int main()
{
    int n, a=1, b=1,c=0;
    cin>>n;
    cout<<a<<" "<<b<<" ";
    for(int i=0; i<n-2; i++)
    {
      c=a+b;
      a=b;
      b=c;
      cout<<c<<" ";
    }

    return 0;
}
