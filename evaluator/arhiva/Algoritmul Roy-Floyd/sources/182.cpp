#include <iostream>
#define infinit 9999999
using namespace std;
int mat[101][101],n,i,j,k;
int main()
{
    cin>>n;
    for(i=1; i<=n; i++)
        for(j=1; j<=n; j++)
            cin>>mat[i][j];
    for(k=1; k<=n; k++)
        for(i=1; i<=n; i++)
            for(j=1; j<=n; j++)
                if(i!=j && mat[i][k] && mat[k][j] && (mat[i][j]==0 || mat[i][j]>mat[i][k]+mat[k][j]))
                    mat[i][j]=mat[i][k]+mat[k][j];
    for(i=1; i<=n; i++)
    {
        for(j=1; j<=n; j++)
            cout<<mat[i][j]<<" ";
        cout<<"\n";
    }
}
