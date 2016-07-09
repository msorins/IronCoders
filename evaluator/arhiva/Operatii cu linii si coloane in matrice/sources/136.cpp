#include <iostream>
using namespace std;
int n,m,mat[101][101],i,j,k,poz,tip;
void sterge_linie(int k)
{
    int i,j;
    for(i=k; i<=n; i++)
        for(j=1; j<=m; j++)
            mat[i][j]=mat[i+1][j];
    n--;
}
void sterge_coloana(int k)
{
    int i,j;
    for(i=1; i<=n; i++)
        for(j=k; j<=m; j++)
            mat[i][j]=mat[i][j+1];
    m--;
}
void adauga_linie(int k)
{
    int i,j;
    for(i=n+1; i>=k; i--)
        for(j=1; j<=m; j++)
            mat[i][j]=mat[i-1][j];
    n++;
    for(j=1; j<=m; j++)
        mat[k][j]=0;
}
void adauga_coloana(int k)
{
    int i,j;
    for(i=1; i<=n; i++)
        for(j=m+1; j>=k; j--)
            mat[i][j]=mat[i][j-1];
    m++;
    for(i=1; i<=n; i++)
        mat[i][k]=0;
}
int main()
{
    cin>>n>>m>>k;
    for(i=1; i<=n; i++)
        for(j=1; j<=m; j++)
            cin>>mat[i][j];
    for(i=1; i<=k; i++)
    {
        cin>>tip>>poz;
        if(tip==0)//stergere linie
            sterge_linie(poz);
        if(tip==1)//sterge coloana
            sterge_coloana(poz);
        if(tip==2)
            adauga_linie(poz);//adauga linie
        if(tip==3)
            adauga_coloana(poz);//adauga coloana
    }
    for(i=1; i<=n; i++)
    {
        for(j=1; j<=m; j++)
            cout<<mat[i][j]<<" ";
        cout<<"\n";
    }

}
