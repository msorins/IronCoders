#include <iostream>
#include <fstream>

using namespace std;

int main()
{
    int n,p,f,i,d,suma,c1,c2,A=0,B=0,C=0,inc=0,mini,maxi,scd;
    int a[99999],memA[99999],memB[99999],memC[99999];
    ifstream fin("trenuri.in");
    ofstream fout("trenuri.out");

    fin>>n;
    for(i=0;i<n;i++)
        fin>>a[i];

    for(i=0;i<n;i++)
    {
        f=0;
        suma = 1;
        p=1; // nr este prim
        if(a[i]<2 || a[i]>2 && a[i]%2==0)
            p=0;
        else
            for(d=3; d*d<=a[i]; d=d+2)
                if(a[i]%d==0)
                    p=0;
        c1=1;
        c2=1;
        while(a[i]>=suma)
        {
            if(suma==a[i])
                f++;
            suma = c1 + c2;
            c1 = c2;
            c2 = suma;
        }

        if(p==1 && f==0)
        {
            memA[A] = a[i];
            A++;
        }
        else if(p==0 && f==1)
        {
            memB[B] = a[i];
            B++;
        }
        else if(p==1 && f==1)
        {
            memC[C] = a[i];
            C++;
        }
    }

        if(A<B)
        {
            mini = A;
            maxi = B;
        }
        else
        {
            mini = B;
            maxi = A;
        }
        inc = A+B+C;
        if(mini+C<maxi-1)
        {
            scd = maxi - mini - C -1;
            inc = inc - scd;
        }
        fout<<inc<<endl;
}
