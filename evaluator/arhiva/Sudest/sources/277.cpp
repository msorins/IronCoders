#include <iostream>
#include <queue>
using namespace std;
int mat[101][101],lee[101][101],drum[101][101],vec[202],n,i,j,k,xok,yok,x2,y2;
int dx[]={0,1};
int dy[]={1,0};
queue<int> coadax,coaday;
void reface(int x, int y)
{
    for(i=0; i<2; i++)
    {
        x2=x-dx[i]*vec[drum[x][y]-1];
        y2=y-dy[i]*vec[drum[x][y]-1];
        if(x2>=1 && y2>=1 && x2<=n && y2<=n && lee[x2][y2]==lee[x][y]-mat[x][y] && drum[x2][y2]==drum[x][y]-1)
            reface(x2,y2);
    }
    cout<<x<<" "<<y<<"\n";
}
int main()
{
    cin>>n;
    for(i=1; i<=n; i++)
        for(j=1; j<=n; j++)
        {
            cin>>mat[i][j];
            lee[i][j]=-1;
        }
    cin>>k;
    for(i=1; i<=k; i++)
        cin>>vec[i];
    coadax.push(1); coaday.push(1); lee[1][1]=mat[1][1]; drum[1][1]=1;
    while(!coadax.empty() && !coaday.empty())
    {
        xok=coadax.front(); coadax.pop();
        yok=coaday.front(); coaday.pop();
        for(i=0; i<2; i++)
        {
            x2=xok+dx[i]*vec[drum[xok][yok]];
            y2=yok+dy[i]*vec[drum[xok][yok]];
            if(x2==n && y2==n && drum[xok][yok]<k)
                continue;
            if(drum[xok][yok]<=k && x2>=1 && y2>=1 && x2<=n && y2<=n && lee[xok][yok]+mat[x2][y2]>lee[x2][y2])
            {
                lee[x2][y2]=lee[xok][yok]+mat[x2][y2];
                drum[x2][y2]=drum[xok][yok]+1;
                coadax.push(x2);
                coaday.push(y2);
            }
        }
    }
    cout<<lee[n][n]<<"\n";
    reface(n,n);
}
