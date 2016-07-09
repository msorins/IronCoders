#include <iostream>
#include <queue>
using namespace std;
int drum[101][101],n,m,i,j,xok,yok,x2,y2,xstart,ystart,xfin,yfin,minim=99999;
char mat[101][101], mataux[101][101],saux,saux2;
int r,g,b;
bool ok;
queue<int> coadax; queue<int> coaday;
int dx[]={-1,1,0,0};
int dy[]={0,0,-1,1};
void stergere()
{
    for(int h=1; h<=n; h++)
    {
            for(int hh=1; hh<=m; hh++)
                drum[h][hh]=999999;
    }
    while(!coadax.empty())
        coadax.pop();
    while(!coaday.empty())
        coaday.pop();
}
int main()
{
    cin>>n>>m;
    for(i=1; i<=n; i++)
    {
        for(j=1; j<=m; j++)
        {
            cin>>mat[i][j];
            mataux[i][j]=mat[i][j];
            drum[i][j]=99;
        }
    }
    for(i=1; i<=n; i++)
    {
        for(j=1; j<=m; j++)
        {
            if(mat[i][j]!='0')
            {
                if(mat[i][j]=='1')
                    r++;
                if(mat[i][j]=='2')
                    g++;
                if(mat[i][j]=='3')
                    b++;
                if(i==3 && j==1)
                    i=3;
                saux=mat[i][j];
                coadax.push(i);
                coaday.push(j);
                while(!coadax.empty() && !coaday.empty())
                {
                    xok=coadax.front(); coadax.pop();
                    yok=coaday.front(); coaday.pop();
                    for(int h=0; h<4; h++)
                    {
                        x2=xok+dx[h];
                        y2=yok+dy[h];
                        if(mat[x2][y2]==saux)
                        {
                            coadax.push(x2);
                            coaday.push(y2);
                            mat[x2][y2]='0';

                        }
                    }
                }
                mat[i][j]='0';
            }
        }
    }
       for(i=1; i<=n; i++)
    {
        for(j=1; j<=m; j++)
        {
            if(mataux[i][j]=='0' && ( mataux[i-1][j]=='1' || mataux[i+1][j]=='1' || mataux[i][j-1]=='1' || mataux[i][j+1]=='1' ))
            {
                saux=mataux[i][j];
                drum[i][j]=1;
                coadax.push(i);
                coaday.push(j);
                while(!coadax.empty() && !coaday.empty())
                {
                    xok=coadax.front(); coadax.pop();
                    yok=coaday.front(); coaday.pop();
                    if(mataux[xok][yok]=='2'|| mataux[xok-1][yok]=='2' || mataux[xok+1][yok]=='2' || mataux[xok][yok-1]=='2' || mataux[xok][yok+1]=='2')
                    {
                            if(drum[xok][yok]<minim)
                            {
                                minim=drum[xok][yok];
                                minim=drum[xok][yok];
                            }
                            break;
                    }
                    for(int h=0; h<4; h++)
                    {
                        x2=xok+dx[h];
                        y2=yok+dy[h];
                        if(drum[x2][y2]>drum[xok][yok]+1 && mataux[x2][y2]=='0')
                        {
                            drum[x2][y2]=drum[xok][yok]+1;
                            coadax.push(x2);
                            coaday.push(y2);
                        }
                    }
                }
                stergere();
            }
        }
    }
    cout<<r<<" "<<g<<" "<<b<<" "<<minim;
}