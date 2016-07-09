#include <iostream>
#include <cmath>
using namespace std;
int n;
int prim(int nr)
{
    for(int i=2; i<=sqrt(nr); i++)
        if(nr%i==0)
            return 0;
    return 1;
}
int main()
{
    cin>>n;
    if(prim(n))
        cout<<1;
    else
    {
        cout<<"0\n";
        for(int i=2; i<n; i++)
            if(prim(i))
                cout<<i<<" ";
    }
}
