#include <iostream>
#include <cstdio>

using namespace std;

int n, it,jt,im,jm;

int main()
{
    //freopen("piata.in","r",stdin);
    //freopen("piata.out","w",stdout);
    scanf("%d",&n);
    scanf("%d %d\n%d %d",&it,&jt,&im,&jm);
    int s=0;
    for(int i=it;i<=im;i++)
    {
        int x=(n-i+jt+1)%n;
        if(x==0)
            x=6;
        if(x<0)
            x*=-1;
        int xx=x;
        for(int j=1;j<=jm-jt;j++)
        {
            int y=(xx+j)%n;
            if(y==0)
                y=n;
            x+=y;
        }
        //cout<<x<<endl;
        s+=x;
    }
    cout<<s;
    return 0;
}
