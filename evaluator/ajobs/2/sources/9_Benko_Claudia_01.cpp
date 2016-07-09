#include <iostream>

using namespace std;
int p[50000], n, k, nrbuni=0,nrrai=0,cod=0;

int main()
{
    cin >> n;
    for (int i=1; i<=n; i++)
    {
        cin >> k >> p[i];
        cod=0;
        for (int px=p[i]; px; px/=10)
            cod=cod*10+px%10;
        if (cod==p[i]) nrbuni++;
        else nrrai++;
    }
    cout << nrbuni << ' ' << nrrai;
    return 0;
}
