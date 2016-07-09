#include <queue>
#include <cstring>
#include <string.h>
#include <iostream>

using namespace std;

const int MAX_N = 105;
const int INF = 0x3f3f3f3f;
const int dx[] = { 1, 1, 1, 0, 0,-1,-1,-1 },
          dy[] = { 1, 0,-1, 1,-1, 1, 0,-1 };

int N, M;
int xStart, yStart;
int input[MAX_N][MAX_N], dist[MAX_N][MAX_N], cost[MAX_N][MAX_N];
pair<int, int> prev[MAX_N][MAX_N];
queue <pair<int, int> > Q;


void drum(int x, int y) {
    if (x == xStart && y == yStart) {
        cout << x << " " << y << "\n";
        return;
    }

    drum(prev[x][y].first, prev[x][y].second);
    cout << x << " " << y << "\n";
}

void solve() {
    // Seteaza distanta sa fie incinit, mai putin punctul de start
    memset(dist, INF, sizeof(dist));
    dist[xStart][yStart] = 1;
    cost[xStart][yStart] = input[xStart][yStart];

    // Parcurge coada
    for (Q.push(make_pair(xStart, yStart)); !Q.empty(); Q.pop()) {
        // Extrage coordonatele din capul cozii
        int x = Q.front().first;
        int y = Q.front().second;

        // Parcurge toti vecinii
        for (int k = 0; k < 8; ++k) {
            // Coordonatele vecinului curent
            int xvec = x + dx[k];
            int yvec = y + dy[k];

            // Daca vecinul curent are valoarea 0, atunci trec mai departe
            if (input[xvec][yvec] == 0) continue;

            // Daca distanta actuala a vecinului curent este mai mare decat
            // distanta care se obtine din punctual actual, atunci actualizez
            // toate matricele, si adaug vecinul curent in coada
            if (dist[x][y] + 1 < dist[xvec][yvec]) {
                dist[xvec][yvec] = dist[x][y] + 1;
                cost[xvec][yvec] = cost[x][y] + input[xvec][yvec];
                prev[xvec][yvec] = make_pair(x, y);
                Q.push(make_pair(xvec, yvec));
            }

            // Daca distantele sunt egale, atunci verific costul; daca costul
            // ce se poate obtine este mai mare decat costul actual, atunci
            // actualizez matricele si adaug vecinul curent in coada
            if (dist[x][y] + 1 == dist[xvec][yvec]) {
                if (cost[x][y] + input[xvec][yvec] > cost[xvec][yvec]) {
                    cost[xvec][yvec] = cost[x][y] + input[xvec][yvec];
                    prev[xvec][yvec] = make_pair(x, y);
                    Q.push(make_pair(xvec, yvec));
                }
            }
        }
    }
    dist[xStart][yStart]  = INF;
    // Verific pe marginea matricei
    int dmin = INF, cmin = 0, xf = 0, yf = 0;
    for (int i = 1; i <= N; ++i) {
        if (dist[i][M] < dmin) {
            dmin = dist[i][M];
            cmin = cost[i][M];
            xf = i, yf = M;
        } else if (dist[i][M] == dmin) {
            if (cost[i][M] > cmin) {
                cmin = cost[i][M];
                xf = i, yf = M;
            }
        }

        if (dist[i][1] < dmin) {
            dmin = dist[i][1];
            cmin = cost[i][1];
            xf = i, yf = 1;
        } else if (dist[i][1] == dmin) {
            if (cost[i][1] > cmin) {
                cmin = cost[i][1];
                xf = i, yf = 1;
            }
        }
    }

    for (int i = 1; i <= M; ++i) {
        if (dist[1][i] < dmin) {
            dmin = dist[1][i];
            cmin = cost[1][i];
            xf = 1, yf = i;
        } else if (dist[1][i] == dmin) {
            if (cost[1][i] > cmin) {
                cmin = cost[1][i];
                xf = 1, yf = i;
            }
        }

        if (dist[N][i] < dmin) {
            dmin = dist[N][i];
            cmin = cost[N][i];
            xf = N, yf = i;
        } else if (dist[N][i] == dmin) {
            if (cost[N][i] > cmin) {
                cmin = cost[N][i];
                xf = N, yf = i;
            }
        }
    }

    cout << dmin << " " << cmin << "\n";

    //Afisez drumul recursiv
   // cout << "Drumul: \n";
    drum(xf, yf);
}

void linie_numere(char pr[], int i)
{
     char *p = strtok(pr, " ");
     int j=1;
     while(p)
     {
         int nr;
         if(strcmp(p, "C") == 0)
                nr = 0;
         else
            {
                nr = 0;int l = strlen(p);
                for(int i=0;i<l;i++)
                    nr = nr*10 + (int)(p[i]) - 48;
            }
        input[i][j++] = nr;
        p = strtok(NULL, " ");
    }
}
int main() {

    // Citire
    cin >> N >> M >> xStart >> yStart;
    cin.get();
    for (int i = 1; i <= N; i++)
    {
        char pr[500];
        cin.getline(pr, 499);
        linie_numere(pr, i);
    }

    solve();
}


