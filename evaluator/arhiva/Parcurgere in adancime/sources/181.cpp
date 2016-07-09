#include <iostream>
#include <vector>
#include <algorithm>
using namespace std;
int x,y,i,j,n,m,start;
bool vizat[101];
vector<int> graf[101];
void dp(int nod)
{
    cout<<nod<<" ";
    for(int i=0; i<graf[nod].size(); i++)
        if(!vizat[graf[nod][i]])
        {
            vizat[graf[nod][i]]=1;
            dp(graf[nod][i]);
        }
}
int main()
{
    cin>>n>>m>>start; // n= nr noduri, m=nr muchii
    for(i=1; i<=m; i++)
    {
        cin>>x>>y;
        graf[x].push_back(y);
        graf[y].push_back(x);
    }
    for(i=1; i<=n; i++)
        sort(graf[i].begin(),graf[i].end());
    vizat[start]=1;
    dp(start);
}
