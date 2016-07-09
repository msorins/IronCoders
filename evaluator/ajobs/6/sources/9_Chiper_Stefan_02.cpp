#include <iostream>
#include <fstream>
using namespace std;
ifstream fisier_intrare("trenuri.in");
ofstream fisier_iesire("trenuri.out");
int n,d,x,a,b,c,vagon,poz,nr,f,t;
int vector_vagon[1000];
int main()
{
    fisier_intrare>>n;
    for(int i = 1 ; i <= n ; i++)
    {
        fisier_intrare>>d;
        f=2;
        t=1;
        while (nr < d  )
        {
            nr=f+t;
            t=f;
            f=nr;
        }
        if( nr == d)
        {
            if( d >1 || d !=2 && d % 2 ==1)
            {
                for (int r=3 ; r <= d/2 ; r=+2)
                {
                    if( d % r != 0 )
                    {
                        c++;
                    }

                }
            }
            else
            {
                b++;
            }
        }
        if( d >1 || d !=2 && d % 2 ==1)
        {
            for (int u=3 ; u <= d/2 ; u=+2)
            {
                if( d % u != 0 )
                {
                    a++;
                }

            }
        }
    }
    if( a < b)
    {
        while ( a != b)
        {
            a++;
            c--;
            if(c == 0 )
            {
                vagon = a + a;
            }
        }
        if ( c != 0 )
        {
            if (c % 2 == 1)
            {
                c = c - 1;
                a= a + c / 2 ;
                b= b + c / 2;
                vagon = a + b;
            }
            else
            {
                a= a + c / 2 ;
                b= b + c / 2;
                vagon = a + b;

            }
        }

    }
    if( a > b)
    {
        while ( a != b)
        {
            b++;
            c--;
            if(c == 0 )
            {
                vagon = b + b;
            }
        }
        if (c % 2 == 1)
        {
            c = c - 1;
            a= a + c / 2 ;
            b= b + c / 2;
            vagon = a + b;

        }
        else
        {
            a= a + c / 2 ;
            b= b + c / 2;
            vagon = a + b;

        }
    }
    fisier_iesire<<vagon<<endl;

    for( int l = 0 ; l < poz ; l++)
    {
        fisier_iesire<<vector_vagon<<" ";
    }

    return 0;
}
