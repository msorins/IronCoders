#include <iostream>
#include <fstream>
using namespace std;
ifstream f ("trenuri.in");
ofstream g ("trenuri.out");
int main()
{
    int n,j,i,l=1,m=1,z=1,ok,a,b,c,flag=1;
    f>>n;
    int v[n],A[n],B[n],C[n];
    for(i=1; i<=n; i++)
        f>>v[i];
    for(j=1; j<=n; j++)
    {
        ok=1;
        if(v[j]%2==0 && v[j]!=2) ok=0;
        else
        {
            for(i=3; i*i<=v[j]; i+=2)
                if(v[j]%i==0) ok=0;
        }
        if(ok==1)
        {
            A[l]=v[j];
            l++;
        }
    }
    l--;
    for(i=1; i<=n; i++)
    {
        a=1;
        b=1;
        for(j=1; j<=v[i]; j++)
        {
            c=a+b;
            a=b;
            b=c;
            if(c==v[i])
            {
                B[m]=v[i];
                m++;
            }
        }
    }
    m--;

    for(i=1; i<=n; i++)
    {
        for(j=1; j<=n; j++)
        {
            if(A[i]==B[j])
            {
                C[z]=A[i];
                z++;
                A[i]=0;
                B[j]=0;
            }
        }
    }
    z--;
    j=0;
    for(i=1; i<=n; i++)
    {
        ok=1;
        for(a=1; a<=l; a++)
        {
            if(v[i]==A[a]) ok=0;
        }
        for(b=1; b<=m; b++)
        {
            if(v[i]==B[b]) ok=0;
        }
        for(c=1; c<=z; c++)
        {
            if(v[i]==C[c]) ok=0;
        }
        if(ok==0) j++;
    }
    g<<j<<endl;
    n=j;
    for (i=1; i<=l &&flag; i++)
    {
        flag=0;
        for(j=1; j<=l-1; j++)
            if(A[j+1]>A[j])
            {
                ok=A[j];
                A[j]=A[j+1];
                A[j+1]=ok;
                flag=1;
            }
    }
    flag=1;
    for (i=1; i<=m &&flag; i++)
    {
        flag=0;
        for(j=1; j<=m-1; j++)
            if(B[j+1]>B[j])
            {
                ok=B[j];
                B[j]=B[j+1];
                B[j+1]=ok;
                flag=1;
            }
    }
    flag=1;
    for (i=1; i<=z &&flag; i++)
    {
        flag=0;
        for(j=1; j<=z-1; j++)
            if(C[j+1]>C[j])
            {
                ok=C[j];
                C[j]=C[j+1];
                C[j+1]=ok;
                flag=1;
            }
    }
    a=0;
    for (i=1; i<=l; i++)
        if(A[i]==0) a++;
    l=l-a;
    a=0;
    for (i=1; i<=m; i++)
        if(B[i]==0) a++;
    m=m-a;
    a=0;
    for (i=1; i<=z; i++)
        if(C[i]==0) a++;
    z=z-a;
    a=1;b=1;c=1; flag=0;
    for(i=1;i<=n;i++)
    {
        if(a<=l && flag!=1)
        {
            v[i]=A[a];
            a++; flag=1;
        }
        else if(b<=m && flag!=2)
        {
            v[i]=B[b];
            b++; flag=2;
        }
        else if(c<=z)
        {
            v[i]=C[c];
            c++; flag=3;
        }
    }
    for (i=1; i<=n; i++)
        g<<v[i]<<" ";

    return 0;
}
