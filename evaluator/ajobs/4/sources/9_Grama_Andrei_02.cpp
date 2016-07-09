#include <iostream>
#include <stdio.h>
using namespace std;
int n,c,c1,c2,c3,c4,z,r,maxim;
long long int a[10000],b[10000];
int prim (int x)
{
    if(x<2||x>2&&x%2==0)
        return 0;
    for(int d=3; d*d<x; d+=2)
        if(x%d==0)
            return 0;
    return 1;
}
int fibonacci (int x)
{
    r=3;
    b[1]=1;
    b[2]=1;
    while(b[r-1]<=x+1)
    {
        b[r]=b[r-1]+b[r-2];
        if(b[r]==x||b[r-1]==x)
        {
            return 1;
            break;
        }
        r++;
    }
    return 0;
}
int main()
{
    freopen("trenuri.in","r",stdin);
    freopen("trenuri.out","w",stdout);
    scanf("%d",&n);
    /*for(int i=0;i<10000;i++)
    cout<<a[i]<<" ";*
    if(fibonacci(n)==1)
    cout<<n;*/
    for(int i=0; i<n; i++)
    {
        scanf("%d",&c);
        if(prim(a[c])==1&&fibonacci(a[c])==0)
            a[c]=1;
        if(fibonacci(a[c])==1&&prim(a[c])==0)
            a[c]=2;
        if(fibonacci(a[c])==1&&prim(a[c])==1)
            a[c]=3;
        if(fibonacci(a[c])==0&&prim(a[c])==0)
            a[c]=4;
        if(c>maxim)
            maxim=c;
    }
    for(int i=0; i<=maxim; i++)
        if(a[i]!=0)
            cout<<a[i]<<"\n";
    /*for(int i=0; i<maxim; i++)
    {
        if(a[i]==1)
            c1++;
        if(a[i]==2)
            c2++;
        if(a[i]==3)
            c3++;
        if(a[i]==4)
            c4++;

    }
    if(c1!=0)
    z++;
    if(c2!=0)
    z++;
    if(c3!=0)
    z++;
    if(c4!=0)
    z++;
    printf("%d\n",z);*/
    return 0;
}
