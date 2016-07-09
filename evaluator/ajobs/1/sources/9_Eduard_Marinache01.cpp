#include<iostream>
#include<fstream>
using namespace std;
int main()
{
    ifstream f("moscraciun.in");
    ofstream g("moscraciun.out");
    int n,i,a[50],b[50],j,ni,nr,aux,x;
    for(i=0;i<=n-1;i++)
        cin>>a[i];
        for(j=0;j<=n-1;j++)
        cin>>b[j];
        {ni=0;nr=0;x=j;
            while(x!=0)
            {
                ni=ni*10+x%10;
                x=x/10;
            }
            if(ni==x)
                nr++;
            if(a[i]>b[j])
            a[i]=aux;
            aux=b[j];
            b[j]=a[i];
        }
    f.close();
    g.close();
}
