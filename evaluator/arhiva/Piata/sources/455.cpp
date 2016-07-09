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
            x=n;
        if(x<0)
            x*=-1;
        int xx=x;
        //cout<<x<<" ";
        for(int j=1;j<=jm-jt;j++)
        {
            int y=(xx+j)%n;
            if(y==0)
                y=n;
           // cout<<y<<" ";
            x+=y;
        }
        //cout<<endl;
        s+=x;
    }
    cout<<s<<endl;
    int nr=1;
    /*for(int i=0;i<10;i++)
    {
        for(int j=0;j<10;j++)
        {
            if(nr%10==0)
                printf(" 10");
            else printf("% 3d",nr%10);
            nr++;
        }
        nr--;
        cout<<endl;
    }*/
    return 0;
}
