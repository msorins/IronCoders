#include <iostream>
#include <fstream>

using namespace std;

int main()
{
    ifstream fin("moscraciun.in");
    ofstream fout("moscraciun.out");
    long int n,k[99999],p[99999],cc=0,cr=0,c,aux,inv,i,q,x,mini,mem[99999],ok[99999];

    fin>>n;
    for(i=0; i<n; i++)
    {
        fin>>k[i];
        fin>>p[i];
    }

    for(i=0; i<n; i++)
        mem[i] = k[i];

    for(i=0; i<n; i++)
    {
        ok[i]=0;
        inv = 0;
        aux = p[i];
        while(aux>0)
        {
            c = aux % 10;
            inv = c + inv*10;
            aux = aux / 10;
        }

        if(inv==p[i])
        {
            cc++;
            ok[i] = 1;
        }
        else
            cr++;

        mini = k[0];
        for(q=0; q<n; q++)
            for(x=0; x<n; x++)
                if(mem[q]<mem[x])
                {
                    aux = mem[q];
                    mem[q] = mem[x];
                    mem[x] = aux;
                }
    }
    fout<<cc<<" "<<cr<<endl;
    for(q=0; q<n; q++)
            for(x=0; x<n; x++)
            {
                if(mem[q]==k[x] && ok[x]==1)
                    fout<<x+1<<" ";
            }
}

