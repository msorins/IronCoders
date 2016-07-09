#include <iostream>

using namespace std;

int a[8001][8001],k,m,n,nr;
int dl[]={-1,0,1,0};
int dc[]={0,1,0,-1};

void ffill(int l, int c)
{
    a[l][c]=1;
    for(int k=0;k<4;k++)
    {
        if(!a[l+dl[k]][c+dc[k]])
            ffill(l+dl[k], c+dc[k]);
    }
}

int main()
{
    cin>>k;
    cin>>m>>n;
    for(int i=0;i<=n+1;i++)
        a[i][0]=a[i][m+1]=-1;
    for(int j=0;j<=m+1;j++)
        a[0][j]=a[n+1][j]=-1;
    for(int h=0;h<k;h++)
    {
        int l1,l2,c1,c2;
        cin>>c1>>l1>>c2>>l2;
        l1=n-l1;
        l2=n-l2+1;
        c1++;
        c2;
        for(int i=l2;i<=l1;i++)
            for(int j=c1;j<=c2;j++)
                a[i][j]=1;
    }
    for(int i=1;i<=n;i++)
        for(int j=1;j<=m;j++)
            if(!a[i][j])
            {
               ffill(i,j);
               nr++;
            }
    cout<<nr;
    return 0;
}
