#include <cstdio>
#include <algorithm>
#include <vector>
using namespace std;
vector<int> graf[1001];
int n,m,i,j,x,y,cd,rasp;
int drum[5001],graf2[1001][1001];
bool fol[1001];
void dfs(int nod)
{
    for(int i=0; i<graf[nod].size(); i++)
        if(!fol[graf[nod][i]])
        {
            fol[graf[nod][i]]=1;
            drum[++cd]=graf[nod][i];
            dfs(graf[nod][i]);
        }
}
void dfs2(int nod, int nr)
{
    fol[nod]=1;
    for(int j=1; j<=n; j++)
    {
        if(nr>=cd)
            break;
        if(nod==j)
            continue;
        if(graf2[nod][j] && !fol[j])
        {
            if(drum[nr+1]==j)
                dfs2(j,nr+1);
            else
            {
                graf2[nod][j]=graf2[j][nod]=0;
                rasp--;
            }
        }
    }
}
int main()
{
    scanf("%d%d",&n,&m);
    for(i=1; i<=m; i++)
    {
        scanf("%d%d",&x,&y);
        graf[x].push_back(y);
        graf[y].push_back(x);
    }
    for(i=1; i<=n; i++)
        sort(graf[i].begin(), graf[i].end());

    fol[1]=1; drum[++cd]=1;
    dfs(1);
    for(i=1; i<=n; i++)
        fol[i]=0;
    fol[1]=1;
    for(i=1; i<=n; i++)
        for(j=1; j<=n; j++)
            if(i!=j)
        graf2[i][j]=1, graf2[j][i]=1;
    rasp=n*(n - 1)/2;
    dfs2(1,1);
    rasp-=m;
    printf("%d",rasp);
}
