#include <iostream>
using namespace std;


int main()
{
    int n,i,a[30001],prim=0,per,ok=0;
    cin>>n;
    per=n-1;
    for(int i=1;i<n;i++)
        {
            cin>>a[i];
            if(a[i]==a[1])
                prim++;
        }
    if(prim==1)
        {cout<<n-1;ok=1;}
    else
        for(i=2;i<=prim;i++)
            if(prim%i==0)

                {
                    int j,k;
                    for(j=1;j<=(n-1)/i;j++)
                        {
                            for(k=i-1;k>=1;k--)
                                if(a[j]!=a[j+k*(n-1)/i])
                                    break;
                            if(k!=0)
                                break;
                        }
                    if(j==(n-1)/i+1)

                            per=(n-1)/i;


                }

    if(ok==0)
        cout<<per;
    return 0;
}
