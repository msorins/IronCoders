// bellman-ford
#include <fstream>
#include <queue>
using namespace std;

struct nod
{
    int val, cost;
};
vector <nod> grf[50001];
queue <int> coada;
int d[50001];
int main()
{
    int n, m, i, a, b, c;
    ifstream f("bellmanford.in");
    ofstream g("bellmanford.out");
    f>>n>>m;
    for(i=1; i<=m; i++)
    {
        f>>a>>b>>c;
        nod act;
        act.val=b;
        act.cost=c;
        grf[a].push_back(act);
    }
    for(i=1; i<=n; i++)
    {
        d[i]=10000000;
    }
    coada.push(1);
    d[1]=0;
    while(!coada.empty())
    {
        int cx=coada.front();
        coada.pop();
        for(i=0; i<grf[cx].size(); i++)
        {
            // daca d[cx] + cost nod adiacent < costul acelui nod adiacent
            // inseamna ca gasesc o
            if(d[cx]+grf[cx][i].cost<d[grf[cx][i].val])
            {
                coada.push(grf[cx][i].val);
                d[grf[cx][i].val]=d[cx]+grf[cx][i].cost;
            }
        }
    }
    for(i=2; i<=n; i++)
    {
        if(d[i]!=10000000)
            g<<d[i]<<" ";
        else
            g<<0<<" ";
    }
}
