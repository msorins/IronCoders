#include <iostream>

using namespace std;

int n,it,im,jt,jm,s;
int main()
{
    cin>>n>>it>>jt>>im>>jm;
    for(int i=it; i<=im; i++)
    {
        for(int j=jt; j<=jm; j++)
        {
            int x=(n-i+j+1)%n;
            if(x==0) x=6;
            s+=x;
        }
    }
    cout<<s;
    return 0;
}
