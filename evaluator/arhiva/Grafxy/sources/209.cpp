#include <iostream>
#include <vector>
#include <queue>
#define infinit 99999
using namespace std;
vector <int>graf[100001];
queue<int> coada;
int n,m,i,j,x,y,n1,n2,v1[100001],v2[100001],grup[100001],drum[100001],ok;
int main()
{
    cin>>n>>m;
    for(i=1; i<=n; i++)
        drum[i]=infinit;
    for(i=1; i<=m; i++)
    {
        cin>>x>>y;
        graf[x].push_back(y);
        graf[y].push_back(x);
    }
  cin>>n1;
    for(i=1; i<=n1; i++)
    {
        cin>>x;
        v1[i]=x;
        grup[v1[i]]=1;
    }
   cin>>n2;
    for(i=1; i<=n2; i++)
    {
        cin>>x;
        v2[i]=x;
        grup[v2[i]]=2;
        coada.push(v2[i]);
        drum[v2[i]]=0;
    }
    while(!coada.empty())
    {
        ok=coada.front(); coada.pop();
        for(i=0; i<graf[ok].size(); i++)
        {
            if(drum[graf[ok][i]]>drum[ok]+1)
            {
                drum[graf[ok][i]]=drum[ok]+1;
                coada.push(graf[ok][i]);
            }
        }
    }
    for(i=1; i<=n1; i++)
        cout<<drum[v1[i]]<<"\n";
}