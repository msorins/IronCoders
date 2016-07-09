#include <iostream>
using namespace std;
int n,i,a[101],b[101],c[101],m;
int ca=1,cb=1,cc=1;
int main()
{
    cin>>n;
    for(i=1; i<=n; i++)
        cin>>a[i];
    cin>>m;
    for(i=1; i<=m; i++)
        cin>>b[i];
    while(ca<=n && cb<=m)
    {
        if(a[ca]<=b[cb])
            c[cc++]=a[ca++];
        else
            c[cc++]=b[cb++];
    }
    while(ca<=n)
        c[cc++]=a[ca++];
    while(cb<=m)
        c[cc++]=b[cb++];
    for(i=1; i<=n+m; i++)
        cout<<c[i]<<" ";
}
