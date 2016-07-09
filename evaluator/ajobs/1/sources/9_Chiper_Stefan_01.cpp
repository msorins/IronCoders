#include <iostream>
#include <fstream>
using namespace std;
ifstream fisier_intrare("moscraciun.in");
ofstream fisier_iesire("moscraciun.out");
int n,b,k,p,nr1,nr2, test,cif,p1,a,mare;
int vector_distanta[50000],vector_numar[50000];
int main()
{
    fisier_intrare>>n;

    for(int i = 0 ; i < n ; i++)
    {
        fisier_intrare>>k>>p;
        test=0;
        cif=1;
        p1=p;
        while ( p > 0 )
        {
            test=test * cif + p % 10;
            cif=cif*10;
            p=p/10;
        }

        if( p1 == test)
        {
            vector_distanta[a]=k;
            a++;
            vector_numar[n]=i;
            nr1++;
        }
        else
        {

            nr2++;
        }


    }
    for ( int j=0 ; j < nr1 ; j++)
    {

        mare=vector_distanta[j];
        for(int l = j+1 ; l <= nr1 ; l++)
        {

            if ( mare > vector_distanta[j])
            {

                mare=vector_distanta[l];
                vector_distanta[l]=vector_distanta[j];
                vector_distanta[j]=mare;
                mare=vector_numar[l];
                vector_numar[l]=vector_numar[j];
                vector_numar[j]=mare;
            }
        }


    }
    fisier_iesire<<nr1<<" "<<nr2<<endl;
    b=0;
   while ( b < nr1)
    {

        fisier_iesire<<vector_numar<<" ";
        b++;
    }


    return 0;
}
