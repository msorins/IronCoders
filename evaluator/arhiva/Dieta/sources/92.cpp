#include <stdio.h>

using namespace std;
int v[500001];
int n,a[501];
int u,max1,nr,p=1;
int main()
{
    scanf("%d",&n);
    for (int i=0;i<n;i++)
        scanf("%d",&a[i]);
    v[a[0]]=nr=p;
    max1=u=a[0];
    for (int i=1;i<n;i++)
    {
        for (int j=1;j<=u;j++)
        {
            if ( v[j]>0 && v[j]<=p)
                if (v[j+a[i]]==0)
                {
                    v[j+a[i]]=p+1;
                    nr++;
                    if (j+a[i]>max1)
                        max1=j+a[i];
                }

        }
        if (v[a[i]]==0)
        {
            v[a[i]]=p+1;
            if (a[i]>max1)
                max1=a[i];
            nr++;
        }
        p++;
        u=max1;
    }
printf("%d",nr);

    return 0;
}
