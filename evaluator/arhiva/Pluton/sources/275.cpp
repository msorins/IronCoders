#include <iostream>
using namespace std;
int mat[4001][12], v[12];
int poz[4001], vv[4001];
int plutoane[4001];
int main()
{
    bool ok,okPluton=true,okbol=true,superok=true;
    int n,i,j,x,xx,contor,h,winner;
    int contorPlutoane=0, streak=1, maxSoldati=0,streakSoldati=0;
    cin>>n;
    for(i=1; i<=n; i++)
        {
            cin>>x;
            v[i]=x;
            while(x)
            {
                xx=x%10; x/=10;
                mat[i][xx]++;
            }

        }
    /*
    for(i=1; i<=n; i++)
    {
        for(j=1; j<=10; j++)
            cout<<mat[i][j];
        cout<<"\n";
    }
    */
    for(i=1; i<=n; i++)
    {
        streak=1;
        if(mat[i][0]!=-1)
        {
            contorPlutoane++;
             mat[i][10]=contorPlutoane;
        }

        for(j=i+1; j<=n; j++)
        {
            if(mat[j][0]!=-1)
            {
            ok=true; // pp ca numerele sunt egale
            for(h=0; h<10; h++)
            {
                if(mat[i][h]!=mat[j][h])
                {
                    ok=false;
                    break;
                }
            }
            if(ok==true)
            {
               mat[j][0]=-1;
               superok=true;
               streak++;
               if(streak>maxSoldati)
                {
                    maxSoldati=streak;
                    streakSoldati=0;
                    winner=contorPlutoane;
                }
               if(streak==maxSoldati)
                    streakSoldati++;
                mat[j][10]=contorPlutoane;
            }
            }



        }

    }
    cout<<contorPlutoane<<"\n"<<maxSoldati<<"\n"<<streakSoldati<<"\n";
    for(i=1; i<=n; i++)
    {
        if(mat[i][10]==winner)
            cout<<v[i]<<" ";
    }



}