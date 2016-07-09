#include <iostream>

using namespace std;

int main()
{   int x,a[100],b[100];

    cin>>x;
    for(int i=0;i<x;i++)
        cin>>a[i]>>b[i];
    for(int i=0;i<x;i++)
    {

        while(a[i]!=b[i])
            if(a[i]>b[i])
                    a[i]=a[i]-b[i];
                    else
                        b[i]=b[i]-a[i];
        cout<<a[i]<<" ";
    }


    return 0;
}
