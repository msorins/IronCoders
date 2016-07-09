#include <iostream>
using namespace std;
int n, i;
long long a[1001], k, j;
long long maxim, sumact, sum, sum2;
int main()
{
cin>>n;
for(i=1; i<=n; i++)
    {
        cin>>a[i];
        sumact=sumact+a[i];
}
for(i=1; i<n-2; i++)
    {
        sum=sumact;
        sum=(long long)(sum-a[i]-a[i+1]+a[i]*a[i+1]);
        sum2=(long long)(sum-a[i+2]-a[i]*a[i+1]+a[i]*a[i+1]*a[i+2]);
        if(sum2>maxim)
            maxim=sum2;
        for(j=i+3; j<=n; j++)
            {
                sum2=(long long)(sum-a[j]-a[j+1]+a[j]*a[j+1]);
                if(sum2>maxim)
                    maxim=sum2;
            }
    }
        cout<<maxim;
}