#include <iostream>
#include <fstream>

using namespace std;

int main()
{ int p=0, f1, f2,i , f3 , v[1000], N, j,G=0, tren=0;
    ifstream f("trenuri.in");
    ofstream g("trenuri.out");
    f >> N;
    for (i=1;i<=N;i++) f >> v[i];
    for (i=1;i<=N;i++) {p=0;
                        for (j=2;j<=v[i]/2;j++) if (v[i]%j==0) p++;
                        f1=1;
                        f2=1;
                        f3=f1+f2;
                        if (v[i]==1||v[i]==2) G++;
                        while (f3<=v[i]&&G==0) {if (f3==v[i]) {G++;
                                                  break;}
                                            f1=f2;
                                            f2=f3;
                                            f3=f1+f2;
                                            G=0;}
                        if (p==0) tren++;
                        if (G!=0) tren ++;
                        if (p==0&&G!=0) tren--;




    }
    g<<tren ;

    return 0;
}
