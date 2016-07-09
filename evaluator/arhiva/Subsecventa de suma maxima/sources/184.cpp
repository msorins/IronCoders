#include <iostream>
using namespace std;
int best=-999999,i,n,x,sum=-99999,nr;
int main()
{
    cin>>n;
    for(i=1; i<=n; i++)
    {
        cin>>nr;
        if(sum<0)
            sum=nr;
        else
            sum+=nr;
        if(sum>best)
            best=sum;
    }
    cout<<best;
}
