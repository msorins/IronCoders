#include <iostream>
#include <algorithm>
using namespace std;

int i,j,n,k,x,poz,v[200002],raspuns;
int main()
{
    cin>>n>>k;
    for(i=1; i<=n; i++)
        cin>>v[i];

    for(i=1; i<=k; i++)
    {
        cin>>x;
        poz = lower_bound(v+1, v+n+1, x)-v;
        raspuns = x-poz+1;
        if(v[poz]==x)
            raspuns=0;
        cout<<raspuns<<"\n";
    }

}
