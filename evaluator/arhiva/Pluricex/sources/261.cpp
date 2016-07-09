#include <iostream>
#include <cstdio>
using namespace std;
int n,kk,d,i,j,mat[50][50],v[50]={1},contor,x;
bool folosit[50];
void bk(int k);
int cond(int k);
int main()
{
    scanf("%d%d%d",&n,&kk,&d);
    for(i=1; i<=n; i++)
    {
         scanf("%d",&x);
         mat[i][0]=x;
        for(j=1; j<=mat[i][0]; j++)
            {
                scanf("%d",&x);
                mat[i][j]=x;
            }
    }
    bk(1);
}
void bk(int k)
{
    int h;
    for(h=v[k-1]; h<=n; h++)
    {
        if(!folosit[h])
        {
            folosit[h]=1;
            v[k]=h;
            if(k==kk && cond(k))
            {
                for(int abz=1; abz<=k; abz++)
                    printf("%d ",v[abz]);
                printf("\n");
                contor++;
                if(contor>=20000)
                   break;
            }
            else
                if(k<kk)
                    bk(k+1);
            folosit[h]=0;
        }
        if(contor>=20000)
                   break;
    }
}
int cond(int k)
{
    int j,h,x;
    bool fol[50];
    for(j=1; j<=d; j++)
        fol[j]=0;
    for(j=1; j<=k; j++)
    {
        x=v[j];
        for(h=1; h<=mat[x][0]; h++)
            fol[mat[x][h]]=1;
    }
    for(j=1; j<=d; j++)
        if(!fol[j])
            return 0;
    return 1;
}
