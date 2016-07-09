#include <iostream>
using namespace std;
int n,v[50];

void BK(int k);
int cond(int k);
void afisare();

int main()
{
    cin>>n;
    BK(1);
}

void BK(int k)
{
    int i;
    for(i=0; i<=1; i++)
    {
        v[k]=i;
        if(cond(k))
        {
            if(k==n)
                afisare();
            else
                BK(k+1);
        }
    }
}
int cond(int k)
{
    int j,c=0;
    for(j=2; j<=k; j++)
        if(v[j]==v[j-1] && v[j]==1)
            return 0;
    return 1;
}
void afisare()
{
    int j;
    for(j=1; j<=n; j++)
    {
        if(v[j]==0)
            cout<<"a";
        else
            cout<<"b";
    }
    cout<<"\n";
}