#include <iostream>
#include <fstream>

using namespace std;
ifstream f("lee.in");
ofstream g("lee.out");

//subprogram lee pentru gasirea drumului care este cel mai scurt
int n,xi,yi,xf,yf,dl[]={-1,0,1,0},dc[]={0,1,0,-1},a[101][101];

int verificare(int x,int y)
{
    if(x<1 || y<1 || x>n || y>n)return 0;
    else return 1;
}

void lee()
{
    int u=1,p=1,c[10000][3],i,l,in,ln,ok=0;
    c[p][1]=xi;
    c[p][2]=yi;
    while(p<=u && ok==0)
    {
        i=c[p][1];l=c[p][2];
        for(int k=0;k<4;k++)
        {
            in=i+dl[k];ln=l+dc[k];
            if(verificare(in,ln))
            {
                a[in][ln]=a[i][l]+1;
                u++;
                c[u][1]=in;
                c[u][2]=ln;
            }
            if(xf==in && yf==ln)
                {g<<a[in][ln]-1;ok=1;}
        }
        p++;
    }
}

int main()
{
    f>>n>>xi>>yi>>xf>>yf;
    for(int i=1;i<=n;i++)
        for(int l=1;l<=n;l++)
            f>>a[i][l];
    lee();
    return 0;
}
