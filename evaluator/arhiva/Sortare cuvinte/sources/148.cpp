#include <fstream>
#include <string.h>
#include <algorithm>
using namespace std;
ifstream cin("a.in");
ofstream cout("a.out");
struct rct
{
    char x[101];
}v[101];
int n,i;
bool cmp(rct A, rct B)
{
    if(strcmp(A.x,B.x)<0)
        return 1;
    return 0;
}
int main()
{
    while(!cin.eof())
    {
        i++;
        cin>>v[i].x;
    }
    n=i-1;
    sort(v+1,v+n+1,cmp);
    for(i=1; i<=n; i++)
        cout<<v[i].x<<"\n";
}
