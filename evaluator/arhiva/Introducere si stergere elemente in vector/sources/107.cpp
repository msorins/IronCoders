#include <fstream>
using namespace std;
ifstream cin("a.in");
ofstream cout("a.out");
int n,i,v[101],k,tip,x,y;
void stergere( int poz )
{
    int i;
    for(i=poz; i<=n; i++)
        v[i]=v[i+1];
    n--;
}
void introduce (int poz, int nr)
{
    int i; n++;
    for(i=n; i>=poz; i--)
        v[i]=v[i-1];
    v[poz]=nr;
}
int main()
{
    cin>>n;
    for(i=1; i<=n; i++)
        cin>>v[i];
    cin>>k;
    for(i=1; i<=k; i++)
    {
        cin>>tip;
        if(tip==0)//stergere
        {
            cin>>x;
            stergere(x); // sterg elementul de pe pozitia x
        }
        if(tip==1)//introduce
        {
            cin>>x>>y;
            introduce(x,y); // introduc pe pozitia x elementul y
        }
    }
    for(i=1; i<=n; i++)
        cout<<v[i]<<" ";
}
