#include <cstdio>
#include <algorithm>
#include <bitset>

#define Cmax 800000
#define Nmax 505

using namespace std;
int N,w[Nmax];
bitset<Cmax> DP;

void Read()
{
    scanf("%d",&N);
    for(int i = 1; i <= N; ++i)
        scanf("%d",&w[i]);
}

void Solve()
{
    DP[0] = 1;
    int smax = 0;
    for(int i = 1; i <= N; ++i){
        for(int j = smax + w[i]; j >= w[i]; --j)
            if(DP[j-w[i]])
                DP[j] = 1;
        smax += w[i];
    }
    int cnt = 0;
    for(int i = 1; i <= smax; ++i)
        cnt += DP[i];
    printf("%d\n", cnt);
}

int main()
{
    ///freopen("dieta.in","r",stdin);
    ///freopen("dieta.out","w",stdout);

    Read();
    Solve();

    return 0;
}
