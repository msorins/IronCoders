#include <iostream>
#include <fstream>
using namespace std;

int main()
{
    int n,t[30],i=0,d=0;
    ifstream fin("trenuri.in");
    ofstream gout("trenuri.out");
    gout << "Introduceti numarul de vagoane " << endl;
    fin>>n;
    for(i=1; i<=n; i++)
    {
        fin>>t[i];
        for(d=2; d<=t[i]/2; d++)
            if(t[i]%d!=0)
                gout<<"de tip A";
    }
    if(t[i]=t[i-1]+t[i-2])
        gout<<"de tip B";
    if(t[i]%d!=0&&t[i]==t[i-1]+t[i-2])
        gout<<"de tip C";
    if(t[i]%d==0|| t[i]!=t[i-1]+t[i-2])
        gout<<"de tip X";


        return 0;
    }
