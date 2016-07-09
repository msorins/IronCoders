#include <iostream>
#include <fstream>
using namespace std;

int main()
{
    int n,j,a[50000],aux,aux1,i,c1=0,b[50000],c2=0,og,y,ok;
    ifstream f("moscraciun.in");
    ofstream g("moscraciun.out");
          f>>n;
        for(i=1;i<=n;i++)

            f>>a[i]>>b[i];
    for(i=1;i<=n;i++)
        for(j=i+1;j<=n-1;j++)
    if (a[i]>a[j]) {aux=a[i];
                    a[i]=a[j];
                    a[j]=aux;
                    aux1=b[i];
                    b[i]=b[j];
                    b[j]=aux1;}

        for(i=1;i<=n;i++)
            {og=0;
        y=b[i];
        while(y!=0)

        {ok=0;
            og=y%10+og*10;
        y=y/10;
        }
        if(og==b[i])
            ok=1;

        if(ok==1)
            c1=c1+1;
        else
            c2=c2+1;
            g<<c1<<" "<<c2<<endl;
        f.close();
        g.close();
for(i=1;i<=n;i++)
        if(ok==1)
            cout<<a[i];

            }
}
