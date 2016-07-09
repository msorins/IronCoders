#include <iostream>
using namespace std;
int n,tip,i,j,mat[101][101],s;
int main()
{
    cin>>n>>tip;
    for(i=1; i<=n; i++)
        for(j=1; j<=n; j++)
            cin>>mat[i][j];

    for(i=1; i<=n; i++)
        for(j=1; j<=n; j++)
        {
            if(tip==1 && j>=i) // deasupra diagonalei principale
                s+=mat[i][j];
            if(tip==2 && i+j>=n+1 ) // sub diagonala secundara
                s+=mat[i][j];
            if(tip==3 && j>=i && i+j<=n+1) // Deasupra diagonalei principale si diagonalei secundare
                s+=mat[i][j];
            if(tip==4 && i>=j && i+j>=n+1) // Sub diagonaa principala si dub diagonala secundara
                s+=mat[i][j];
            if(tip==5 && i>=j && i+j<=n+1) //Sub diagonala principala si deasupra diagonalei secundare
                s+=mat[i][j];
        }
    cout<<s;
}
