#include <iostream>
#include <queue>
using namespace std;
#define INF 999999
int dx[]={-1,1,0,0};
int dy[]={0,0,-1,1};
queue<int> coadax,coaday;
int i,j,n,xok,yok,x2,y2,xstart,ystart,xfin,yfin;
int mat[101][101];
int main()
{
    cin>>n;
    cin>>xstart>>ystart>>xfin>>yfin;
    for(i=1; i<=n; i++)
        for(j=1; j<=n; j++)
        {
            cin>>mat[i][j];
            if(mat[i][j])
                 mat[i][j]=INF;
        }

    mat[xstart][ystart]=0; coadax.push(xstart); coaday.push(ystart);
    while(!coadax.empty() && !coaday.empty())
    {
        xok=coadax.front(); coadax.pop();
        yok=coaday.front(); coaday.pop();
        if(xok==xfin && yok==yfin)
            break;
        for(i=0; i<4; i++)
        {
            x2=xok+dx[i];
            y2=yok+dy[i];
            if(mat[x2][y2]>mat[xok][yok]+1)
            {
                mat[x2][y2]=mat[xok][yok]+1;
                coadax.push(x2);
                coaday.push(y2);
            }
        }
    }
    if(mat[xfin][yfin]==INF)
        cout<<"-1";
    else
        cout<<mat[xfin][yfin];

    return 0;
}
