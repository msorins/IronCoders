#include <iostream>
#include <cmath>
#include <algorithm>
using namespace std;
int v[40001];
int main()
{
    int a,b,n,i,x=1,stop,nrdivizori=0,w=1,lim,d=0;
    cin>>a>>b>>n;
    w=a*b;
    x=w;
    for(i=1; i<n; i++)
        x=x*w;
    lim=sqrt((double)x);
    for(i=2; i<=lim; i++)
    {
        if(x%i==0)
        {
            d++;
            v[d]=i;
            d++;
            v[d]=x/i;
        }
    }
    sort(v+1, v+d+1);
    cout<<"1 ";
    for(i=1; i<=d; i++)
    {
        if(v[i]!=v[i+1])
        {
            cout<<v[i]<<" ";
        }
    }
    cout<<x;

}
