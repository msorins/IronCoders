#include <iostream>
#include <fstream>

using namespace std;

int main()
{
    ifstream fin("trenuri.in");
    ofstream gout("trenuri.out");
    int n,t[50000],ok=1,ok2=0,ok3=0,nr=0,f1=1,f2=1,d,i=1,f3=2;
    fin>>n;
    while(n){
        fin>>t[i];
        for(d=2;d<=t[i]/2;d++)
            {if(t[i]%d==0)ok=0;
            else ok=1;}
        do{f1=f2;
           f2=f3;
           f3=f1+f2;
           if(t[i]==f3)ok2=1;
           if(f3>t[i]){break;}}while(f3);
        if(ok==1&&ok2==1)ok3=1;
        if(ok==1||ok2==1)nr++;
        i++;n--;f1=1;f2=1;f3=2;ok=0;ok2=0;ok3=0;}gout<<nr;
    }



