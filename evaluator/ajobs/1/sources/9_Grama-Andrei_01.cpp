#include <iostream>
#include <stdio.h>

using namespace std;
int n,cont,aux,inv,c;
long a[2^31-1][2];
int main()
{
    freopen("moscraciun.in","r",stdin);
    freopen("moscraciun.out","w",stdout);
    long min;
    scanf("%d",&n);
    for(int i=0; i<n; i++)
        for(int j=0; j<2; j++)
            scanf("%d",&a[i][j]);
    for(int i=0; i<n; i++)
    {
        aux=a[i][1];
        inv=0;
        while(aux>0)
        {
            c=aux%10;
            aux=aux/10;
            inv=inv*10+c;
        }
        if(inv==a[i][1])
            cont++;
    }
    printf("%d %d\n",cont,n-cont);
    for(int i=0; i<cont; i++)
    {
        min=2^31-1;
        for(int j=0; j<n; j++)
            if(a[j][0]!=0&&a[j][0]<min)
                min=a[j][0];
        for(int k=0;k<n;k++)
        if(a[k][0]==min)
        {
            printf("%d ",k+1);
            a[k][0]=0;
        }
    }
    return 0;
}
