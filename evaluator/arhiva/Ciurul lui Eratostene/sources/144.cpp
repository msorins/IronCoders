#include <iostream>
bool ciur[100001];
using namespace std;
int i,j,n;
int main()
{
    cin>>n;
    for(i=2; i<=n; i++)
        for(j=i+i; j<=n; j+=i)
            ciur[j]=true;
    for(i=2; i<=n; i++)
        if(!ciur[i])
            cout<<i<<" ";
}
