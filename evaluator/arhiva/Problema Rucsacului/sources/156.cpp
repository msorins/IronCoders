#include <iostream>
#include <algorithm>
using namespace std;
int N, G, Pmax;
int W[1001], P[5001];
int D[2][5001];

int main()
{


    cin>>N>>G;
    for(int i = 1; i <= N; ++i)
        cin>>W[i]>>P[i];

    // Dinamica D[i][cw] - profitul maxim pe care-l putem obtine adaugand o submultime a primelor i obiecte, insumand greutatea cw
    // Din aceasta dinamica vom tine ultimele doua linii, astfel: linia l va fi cea pe care avem solutia pentru al (i-1)-lea element,
    // in timp ce  pe linia 1-l vom construi solutia pentru elementul i.
    int l=0;
    for(int i = 1; i <= N; ++i, l = 1 - l)
        for(int cw = 0; cw <= G; ++cw)
        {
            // Mai intai nu punem obiectul i.
            D[1-l][cw] = D[l][cw];

            // Daca acest lucru duce la o solutie curenta mai buna, adaugam obiectul i la o solutie anterioara.
            if(W[i] <= cw)
                D[1-l][cw] = max(D[1-l][cw], D[l][cw - W[i]] + P[i]);
        }

    // Solutia se va afla in statea D[N][G], adica pe linia l, la coloana G
    Pmax = D[l][G];

    // Afisare
    cout<<Pmax;
}
