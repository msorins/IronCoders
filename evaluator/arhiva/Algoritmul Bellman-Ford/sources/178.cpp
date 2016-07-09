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
        cout<<a<<" "<<b<<" "<<c<<"\n";
        nod act;
        act.val=b;
        act.cost=c;
        grf[a].push_back(act);
    }

}
