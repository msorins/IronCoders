#include <iostream>
#include <queue>
using namespace std;
queue<int> coadax,coaday;
int dx[]={-1,1,0,0};
int dy[]={0,0,-1,1};
int mat[101][101],i,j,h,n,m,xok,yok,x2,y2,nr,nr_max,nr_zone,nrr;
bool fol[101][101];
int main()
{
    cin>>n>>m;
    for(i=1; i<=n; i++)
        for(j=1; j<=m; j++)
            cin>>mat[i][j];
    for(i=1; i<=n; i++)
        for(j=1; j<=m; j++)
        {
            nrr++;
            if(mat[i][j] && !fol[i][j])
            {
                fol[i][j]=1;
                nr_zone++; nr=1;
                coadax.push(i); coaday.push(j);
                while(!coadax.empty() && !coaday.empty())
                {
                    xok=coadax.front(); coadax.pop();
                    yok=coaday.front(); coaday.pop();
                    for(h=0; h<4; h++)
                    {
                        x2=xok+dx[h];
                        y2=yok+dy[h];
                        if(mat[x2][y2] && !fol[x2][y2])
                        {
                            fol[x2][y2]=1;
                            coadax.push(x2);
                            coaday.push(y2);
                            nr++;
                        }
                    }
                }
                nr_max=max(nr_max,nr);
            }
        }
    cout<<nr_zone<<"\n"<<nr_max;
}
