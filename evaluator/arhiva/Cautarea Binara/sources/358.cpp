#include <iostream>

using namespace std;
int n,x,v[10000];
int binar(int x)
{
    int st=0,dr=n-1, q=0,m;

    while(st<=dr&&q==0)
    {
        m=(st+dr)/2;
        if(x==v[m])
            q=1;
        else
            if(x<v[m])
                dr=m-1;
            else
                st=m+1;

    }
    if(q==1)
        return m+1;
    else
        return -1;

}
int main()
{
    cin>>n;
    cin>>x;
    for(int i=0;i<n;i++)
        cin>>v[i];
    cout<<binar(x);
}
