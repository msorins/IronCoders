// bellman-ford
#include <iostream>
#include <queue>
using namespace std;

struct nod
{
    int val, cost;
};
vector <nod> grf[30001];
queue <int> coada;
int d[30001];
int n, m, i, a, b, c,start;
int main()
{
    cin>>n>>m>>start;
    for(i=1; i<=m; i++)
    {
        cin>>a>>b>>c;
        nod act;
        act.val=b;
        act.cost=c;
        grf[a].push_back(act);
    }
    for(i=1; i<=n; i++)
    {
        d[i]=100000;
    }
    coada.push(start); d[start]=0;
    while(!coada.empty())
    {
        int cx=coada.front();
        coada.pop();
        for(i=0; i<grf[cx].size(); i++)
        {
            if(d[cx]+grf[cx][i].cost<d[grf[cx][i].val])
            {
                coada.push(grf[cx][i].val);
                d[grf[cx][i].val]=d[cx]+grf[cx][i].cost;
            }
        }
    }
    for(i=1; i<=n; i++)
    {
        if(d[i]!=100000)
            cout<<d[i]<<" ";
        else
            cout<<0<<" ";
    }
}
