#include <iostream>
#define M 9001
using namespace std;
int n,i,j,s,aux,v[10005];
int main()
{
    v[1]=1; v[2]=1;
    cin>>n;
    for(i=3; i<=n+2; i++)
    {
        v[i]=v[i-1]%M+v[i-2]%M;
        v[i]%=M;
    }
    cout<<v[n+2]-1;
}