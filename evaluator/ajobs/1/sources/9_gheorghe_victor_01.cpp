#include <iostream>
#include <fstream>

using namespace std;


int main()
{
    ifstream fin("moscraciun.in");
    ofstream gout("moscraciun.out");
    int n,cif,nr=0,i=1,j=1,k[50000],p[50000],c1=0,c2=0,g[50000],x=1,s,s2,Min;
    fin>>n;
    s2=n;
    while(n){fin>>k[i];
             fin>>p[j];
             s=p[j];
             while(s){cif=s%10;
                      nr=nr*10+cif;
                      s=s/10;}
            if(nr==p[j]){c1++;g[x]=k[i];}
            else c2++;
            nr=0;
            i++; j++; x++;
            n--;}
    gout<<c1<<" "<<c2<<endl;
    n=s2;
    for(x=1;x<n;x++)
        for(j=x+1;j<=n;j++)
        if(g[x]>g[j])swap(g[x],g[j]);

    for(i=1;i<=n;i++){
        for(j=1;j<=n;j++)
    {
        if(g[i]==k[j])gout<<j<<" ";
    }

}}
