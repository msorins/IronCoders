#include <iostream>
#include <fstream>
using namespace std;

int main()
{
    ifstream f("trenuri.in");
    ofstream g("trenuri.out");
    int n, c=0, k, i, j,f1=1,f2=1, f3, r, nr=0;
    f>>n;
    char a[n];
    for(i=1; i<=n ; i++)
    {
        f>>a[i];
        r=a[i];


        for (j=1; j*j<=r; j++)
            if(r%j==0) c++;

        if(c==2|| r==1 || r==2 || r==3)
        {
            nr++;
            r='A';
        }
        a[i]=r;
        c=0;
        f1=1;
        f2=1;
        for (j=1; j<=100; j++)
        {
            f3=f1+f2;
            f1=f2;
            f2=f3;
            if  (a[i]==1 || a[i]==f3)
            {
                r='B';
                nr++;
            }
        }

        if(a[i]=='A' && r=='B')
              r='C';
        a[i]=r;

        for(j=1; j<=n; j++)

                if(a[j]!='A' && a[j] != 'B')
                    a[j]='X';
    }
    /*   for(i=1; i<=n; i++)
       {
           for(j=1; j<=n; j++)
               if( (char)a[i]=='A' && (char)a[j]=='B')
               {
                   a[i]='C';
                   nr++;
               }
       }*/
    g<<nr;

    return 0;
}
