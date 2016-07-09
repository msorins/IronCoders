//#include <fstream>
#include <iostream>
using namespace std;
//ifstream cin("numere7.in");
//ofstream cout("numere7.out");
bool fol [250001];
int i,j,n,st,dr,x;
int main()
{
    cin>>n;
    for(i=1; i<=n; i++)
        for(j=1; j<=n; j++)
        {
            cin>>x;
            fol[x]=1;
        }
    for(i=1; i<=n*n; i++)
        if(!fol[i])
        {
            st=i;
            break;
        }
    for(i=n*n; i>=1; i--)
        if(!fol[i])
        {
            dr=i;
            break;
        }
    cout<<st<<" "<<dr;
}
