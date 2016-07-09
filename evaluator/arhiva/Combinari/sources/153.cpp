#include <iostream>
using namespace std;
int v[30],n,pac;
bool fol[30];
void bk(int k);
void scrie(int k);
int main()
{
    cin>>n>>pac;
    bk(1);
}
void bk(int k)
{
    int i;
    for(i=v[k-1]+1; i<=n; i++)
    {
        if(!fol[i])
        {
            fol[i]=1;
            v[k]=i;
            if(k==pac)
                scrie(k);
            else
                if(k<pac)
                    bk(k+1);
            fol[i]=0;
        }
    }
}
void scrie(int k)
{
    for(int i=1; i<=k; i++)
        cout<<v[i]<<" ";
    cout<<"\n";
}
