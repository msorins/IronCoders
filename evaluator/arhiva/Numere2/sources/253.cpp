#include <cstdio>
using namespace std;
bool fol [250001];
int i,j,n,st,dr,x;
int main()
{


    scanf("%d", &n);
    for(i=1; i<=n; i++)
        for(j=1; j<=n; j++)
        {
            scanf("%d", &x);
            fol[x]=1;
        }
    for(i=1; i<=n*n; i++)
        if(!fol[i])
        {
            st=i;
            break;
        }
    for(i=n*n; i>=1; i--)
        if(!fol[i])
        {
            dr=i;
            break;
        }
    printf("%d %d",st,dr);
}
