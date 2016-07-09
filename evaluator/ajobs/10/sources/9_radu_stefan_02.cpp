#include <iostream>
#include <fstream>
using namespace std;

int main()
{
    int n, d , ok , f1, f2 , f3, i ,vagoane=0, a[50];
    ifstream f("trenuri.in");
    f>>n;
      for(i=1; i<=n; i++)
      f>>a[i];
    for(i=1; i<=n; i++)
    {
        d=2;
        ok=1;
        while((d<=a[i]/2)&&(ok==1))
        {
            if(a[i]%d==0) ok=0;
            d=d+1;
        }
        f1=1;
        f2=1;
        do
        {
            f3=f1+f2;
            f1=f2;
            f2=f3;
        }
        while(f3<a[i]);
        if((ok==1)&&((a[i]==f3)||(a[i]==1))) vagoane=vagoane+1;
        else if (ok==1) vagoane=vagoane+1;
        else if ((a[i]==f3)||(a[i]==1)) vagoane=vagoane+1;
    }

    cout<<vagoane;
    f.close();
    return 0;
}
