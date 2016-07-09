#include <cstdio>
#include <iostream>
#include <vector>
#include <queue>
#include <cstring>

#define N 1205
#define INF 0x3f3f3f3f

using namespace std;

int n,cost[N],pasi[N],v[N];
vector<pair<int,int> > g[N];
queue<int> q;

void read()
{
    int i,j,k,a,b;
    scanf("%d",&n);
    for(i=1;i<n;++i)
        g[i].push_back(make_pair(i+1,0));
    scanf("%d",&k);
    for(i=1;i<=k;++i)
    {
        scanf("%d%d",&a,&b);
        for(j=2;j<=b;++j)
            g[a].push_back(make_pair(a+j,0));
    }
    scanf("%d",&k);
    for(i=1;i<=k;++i)
    {
        scanf("%d%d",&a,&b);
        for(j=2;j<=2*b;++j)
            g[a].push_back(make_pair(a+j,j/2+j%2));
    }
    memset(cost,INF,sizeof(cost));
    memset(pasi,INF,sizeof(pasi));
    cost[1]=0;
    pasi[1]=1;
    q.push(1);
    v[1]=1;
}

void solve()
{
    int a;
    vector<pair<int,int> >::iterator it;
    while(!q.empty())
    {
        a=q.front();
        q.pop();
        v[a]=0;
        for(it=g[a].begin();it!=g[a].end();++it)
        {
            if(pasi[it->first]>pasi[a]+1)
            {
                pasi[it->first]=pasi[a]+1;
                cost[it->first]=cost[a]+it->second;
                if(!v[it->first])
                {
                    q.push(it->first);
                    v[it->first]=1;
                }
            }
            if(pasi[it->first]==pasi[a]+1)
                if(cost[it->first]>cost[a]+it->second)
                {
                    cost[it->first]=cost[a]+it->second;
                    if(!v[it->first])
                    {
                        q.push(it->first);
                        v[it->first]=1;
                    }
                }
        }
    }
}

void print()
{
    printf("%d %d\n",pasi[n],cost[n]);
}

int main()
{
    read();
    solve();
    print();
}
