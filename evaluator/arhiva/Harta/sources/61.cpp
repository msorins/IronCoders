#include <iostream>
#include <math.h>
using namespace std;
int a[176][176],t[176][176],cost[176][176],n,l1,l2,l;
long d;
const int dx[] = {-1, 0, 1, 0, 1, -1, 1, -1},
          dy[] = {0, 1, 0, -1, 1, 1, -1, -1};
typedef struct {
    int l, c;
}
element;
typedef element coada[31000];

void citire()
{
int i, j;
cin>>n>>d;
for (i = 1; i <= n; i++)
for (j = 1; j <= n; j++)
    {
    cin>>t[i][j];
    cost[i][j]=30000;
    }
for (i = 0; i <= n+1; i++)
    cost[i][0] = cost[i][n+1] = cost[0][i] = cost[n+1][0] = 30000;
}

int numar(int y)
{
    int n10=0,p=0;
    while(y)
    {
        n10=n10+y%10*pow(2,p);
        y=y/10;
        p=p+1;
    }
    return n10;
}
void detlun()
{
coada c;
int inc,sfc,k;
element x,y;
x.l = 1;
x.c = 1;
a[1][1] = 1;
cost[1][1] = t[1][1];
inc=sfc = 1;
c[inc] = x;
//verific daca numarul norocos se afla in prima celula
if(t[1][1]==l)
{
    l1=1;l2=1;
}
else //altfel folosesc coada
while(inc<=sfc)
{
x = c[inc++];
for (k = 0;k <= 7; k++)
{//ma deplasez in toate celulele vecine
    y.l=x.l+dx[k];
    y.c=x.c+dy[k];
    if (cost[y.l][y.c] > cost[x.l][x.c] + t[y.l][y.c] && t[y.l][y.c] != 0)
    {//verific sa nu fiu in afara padurii, daca timpul parcelei in care am ajuns este mai mare, daca nu, voi face atribuirea
    cost[y.l][y.c] = cost[x.l][x.c] + t[y.l][y.c];
    c[++sfc] = y;
    a[y.l][y.c] = a[x.l][x.c] + 1;
        if (t[y.l][y.c] == l) //daca am gasit numarul norocos memorez coordonatele si renunt la vizitarea vecinilor
            {
            l1=y.l;
            l2=y.c;
            break;
            }
    }
}
}
cout<<cost[l1][l2]<<endl;
}
//parcurg recursiv drumul
void drum(int i, int j, int  h)
{
for (int r = 0; r <= 7; r++)
 if (a[i+dx[r]][j+dy[r]] == h-1 && cost[i][j] == cost[i+dx[r]][j+dy[r]] + t[i][j])
    drum(i+dx[r],j+dy[r],h-1);
      cout<<i<<" "<<j<<endl;
}

int main()
{
citire();
l = numar(d);
detlun();
drum(l1,l2,a[l1][l2]);
return 0;
}