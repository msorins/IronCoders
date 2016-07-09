#include <iostream>
#include <fstream>

using namespace std;

int main()
{  int P, N, a[100], v[50000], C1=0, nr, save, C2, j, aux,  b[100];
    ifstream f("moscraciun.in");
    ofstream g("moscraciun.out");
    f >> N;
    for (P=1;P<=N;P++) {f >> a[P]; f >> v[P];
                        b[P]=P;}


    for (P=1;P<=N;P++) {save=v[P]; nr=0;
                        while (save) {nr=nr*10+save%10;
                                      save/=10;}
                        if (nr==v[P]) C1++;}

    C2=N-C1;
    g << C1 << " " << C2 << endl;

    for (P=1;P<N;P++) {for(j=P+1;j<=N;j++) {if (a[P]>a[j]) {aux=a[j];
                                                            a[j]=a[P];
                                                            a[P]=aux;

                                                            save=b[j];
                                                            b[j]=b[P];
                                                            b[P]=save;

                                                            aux=v[j];
                                                            v[j]=v[P];
                                                            v[P]=aux;}
    }}
    for (P=1;P<=N;P++) {nr=0; save=v[P];
                    while (save) {nr=nr*10+save%10;
                                  save=save/10;}

                    if (nr==v[P]) g << b[P] << " ";}

    return 0;
}
