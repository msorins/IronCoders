#include <iostream>
using namespace std;
#define m 15485863
long long n,p;
long long pu(long long x, long long n)
{
    long long p = 1 ;
    while (n)
    {
        if (n %2==1)
            p *= x, p%=m,n-- ;
        x = x * x ; x%=m;
        n/=2;
    }
    return p%m;
}
int main()
{
    cin>>n>>p;
    cout<<pu(n,p);
}
