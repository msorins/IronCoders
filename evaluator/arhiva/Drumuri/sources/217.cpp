#include <iostream>
#include <queue>
#include <algorithm>
using namespace std;
int mat[301][301],i,j,nr,n,c;
int dx[]={-1,1,0,0};
int dy[]={0,0,-1,1};
bool fol[301][301];
struct rct
{
    int i, j, nr;
}v[90001];
bool cmp(rct A, rct B)
{
    return A.nr<B.nr;
}
void dfs(int x, int y)
{
    int x2,y2;
    bool ok=false;
    for(int i=0; i<4; i++)
    {
        x2=x+dx[i];
        y2=y+dy[i];
        if(x2>=1 && y2>=1 && x2<=n && y2<=n && mat[x2][y2]>mat[x][y])
        {
            if(ok==true)
                nr++;
            ok=true;
            fol[x2][y2]=1;
            dfs(x2,y2);
        }
    }
}
int main()
{
    cin>>n;
    for(i=1; i<=n; i++)
        for(j=1; j<=n; j++)
        {
            cin>>mat[i][j]; c++;
            v[c].nr=mat[i][j];
            v[c].i=i;
            v[c].j=j;

        }
    sort(v+1,v+c+1,cmp);
   // for(i=1; i<=c; i++)
       //cout<<v[i].nr<<" "<<v[i].i<<" "<<v[i].j<<"\n";
    for(i=1; i<=c; i++)
    {
        if(!fol[v[i].i][v[i].j])
        {
            fol[v[i].i][v[i].j]=1;
            nr++;
            dfs(v[i].i,v[i].j);
        }
    }
    cout<<nr;
}