#include <iostream>
#include<fstream>
using namespace std;

int main()
{
    int n, p[50], k[50], og=0, c1=0, c2=0, x, i, j, aux;
    ifstream f("moscraciun.in");
    ofstream g("moscraciun.out");
    f>>n;
    for(i=1; i<=n; i++)
    {
        f>>p[i];
        f>>k[j];
        for(i=1; i<=n; i++)
        {
            x=p[i];
            while(x)
            {
                og=og*10+x%10;
                x=x/10;
            }
            if(og==p[i])
            {
                c1++;
            }
            else c2++;
        }
    }
f.close();
g.close();
}
