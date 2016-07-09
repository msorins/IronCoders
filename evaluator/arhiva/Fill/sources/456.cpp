#include <iostream>
#include <fstream>
#include <iomanip>

using namespace std;

ifstream f("fill.in");
ofstream g("fill.out");

int a[100][100],b[100][100],lin,col,ct;
const int dl[]={-1,0,1,0},dc[]={0,1,0,-1};

int afara(int x,int y)
{
    return(x<1 || y<1 || x>lin || y>col);
}

int Fill(int & xi,int & yi,int x)
{
    int xn,yn;ct++;
    b[xi][yi]=x;
    for(int k=0;k<4;k++)
    {
        xn=xi+dl[k];yn=yi+dc[k];
        if(!afara(xn,yn) && b[xn][yn]==0 && a[xn][yn]==1)
            Fill(xn,yn,b[xi][yi]+1);
    }
    return ct;
}

void citire()
{
    f>>lin>>col;
    for(int i=1;i<=lin;i++)
        for(int l=1;l<=col;l++)
            f>>a[i][l];
}
int main()
{
    citire();int maxx=0,cti=0;
    for(int i=1;i<=lin;i++)
        for(int l=1;l<=col;l++)
        {
            ct=0;
            if(b[i][l]==0 && a[i][l]==1)
            {
                cti++;int z=i,y=l;
                ct=Fill(z,y,1);
                if(ct>maxx)maxx=ct;
            }
        }
    g<<cti<<'\n'<<maxx;
    return 0;
}
