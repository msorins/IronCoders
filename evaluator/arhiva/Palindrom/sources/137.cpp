#include <iostream>

using namespace std;

int main()
{
    int n,v[100],i,x,inv;
    cin>>n;
    for(i=0;i<n;i++)
    cin>>v[i];
    for(i=0;i<n;i++)
        {x=v[i];
        inv=0;

        while(x!=0)
           {

            inv=inv*10+x%10;
            x=x/10;}
            if(inv=v[i])
                cout<<v[i]<<" ";
        }
    return 0;
}
