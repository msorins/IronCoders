#include<iostream>
using namespace std;
int n,x,v[10001],m,st,dr;
bool ok;
int main()
{
    cin>>n>>x;
    for (int i=1;i<=n;i++)  //Vectorul incepe de pe pozitia 1
        cin>>v[i];
    st=1, dr=n;
    while(st<=dr)
    {
        m=(st+dr)/2;
        if(v[m]==x)
        {
            cout<<m;
            ok=true;
            break;
        }
        if(x<v[m])
            dr=m-1;
        if(x>v[m])
            st=m+1;
    }
    if(ok==false)
        cout<<"-1";
}
