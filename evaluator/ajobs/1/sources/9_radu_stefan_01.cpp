#include <iostream>
#include <fstream>
 using namespace std;

int main()
{
    int a[50],b[50],x , y , c1=0, c2=0 , n, i , j , og , z ;
    ifstream k("distante.in");
    ifstream p("copii.in");
  k>>n;
  p>>n;
for(i=1;i<=n;i++)
    k>>a[50];
for(i=1;i<=n;i++)
    p>>b[50];
    for(i=1; i<=n; i++)
        for(j=i+1; j<=n+1; j++)
            if(a[i]>a[j])
            {
                x=a[i];
                a[i]=a[j];
                a[j]=x;
                y=b[i];
                b[i]=b[j];
                b[j]=y;
            }

    for(i=1; i<=n; i++)
    {
        z=b[i];
        og=0;
        while(z!=0)
        {
            og=og*10+z%10;
            z=z/10;
        }
        if(b[i]==og) c1=c1+1;
                     else c2=c2+1;
    }
    cout<<c1<<" "<<c2;
    k.close();
    p.close();
    return 0;
}


