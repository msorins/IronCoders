#include <iostream>

using namespace std;
int vagoane[1000], a, b, c, ok=0, ok2=1, n, d, s, nrA, nrB, nrC, nrf, mare, nrx;
int tip[1000];

int main()
{
    cin >> n;
    a=1;
    b=1;
    for (int i=1; i<=n; i++)
    {
        cin >> vagoane[i];
        ok=0;
        ok2=1;
        d=3;
        for (a=1, b=1; a<300 && b<300;)
        {
            c=a+b;
            a=b;
            b=c;
            if (vagoane[i]==a) ok=1;
        }
        if (vagoane[i]<=1 || vagoane[i]%2==0 && vagoane[i]!=2) ok2=0;
        while (ok2!=0 && d*d<vagoane[i])
        {
            if (vagoane[i]%d==0) ok2=0;
            d+=2;
        }
        if (ok&&ok2) nrC++;
        if (ok==0&&ok2) nrA++;
        if (ok&&ok2==0) nrB++;
    }
    nrf=nrA+nrB+nrC;
    mare=nrA;
    if (nrB>mare) mare=nrB;
    if (nrC>mare) mare=nrC;
    nrx=nrf-mare;
    if (mare-nrx > 2) nrf-=mare-nrx+1;
    if (mare-nrx==2) nrf--;
    if (nrx-mare > 2) nrf-=nrx-mare+1;
    cout << nrf;
    return 0;
}
