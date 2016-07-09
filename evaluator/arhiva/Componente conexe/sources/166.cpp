#include <iostream>
#include <vector>
#include <queue>
using namespace std;
vector<int> graf[101];
queue<int> coada;
int i,j,ok,x,y,n,m,cont,lim;
bool fol[100001];
void fa_coada(int start)
{
    cont++; coada.push(start);
    while(!coada.empty())
    {
        ok=coada.front(); coada.pop();
        fol[ok]=1;
        for(j=0; j<graf[ok].size(); j++)
            if(!fol[graf[ok][j]])
                coada.push(graf[ok][j]);
    }
}
int main()
{
    cin>>n>>m;//n = noduri, m=muchii
    for(i=1; i<=m; i++)
        cin>>x>>y, graf[x].push_back(y), graf[y].push_back(x);
    for(i=1; i<=n; i++)
       {
           if(!fol[i])
            fa_coada(i);
       }
    cout<<cont;
}
