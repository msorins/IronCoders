#include <iostream>
#include <fstream>
using namespace std;

int n,i,j,save,r, bun,rau;

int main()
{
    ifstream f("moscraciun.in");
    ofstream g("moscraciun.out");
    f>>n;
    int K[n],P[n],aux[n],poz[n],x=1;
    for(i=1;i<=n;i++){
         f>>K[i]; ///distanta;
         f>>P[i]; ///cod;
         aux[i]=K[i]; ///copiem K;
    }
    ///Rai si buni;
    for(i=1;i<=n;i++){
        r=0;
        save=P[i];
        while(save){
            r=r*10+(save%10);
            save/=10;
        }
        if(P[i]==r) bun++;
        else {rau++;K[i]=0;}
    }

    for(i=1;i<=n;i++){
        for(j=i+1;i<=n;i++){
            if(K[i]>K[j]) swap(K[i],K[j]);
        }
    }

    for(i=1;i<=n;i++){
        for(j=1;j<n;j++){
            if(K[i]==aux[j] && aux[j]!=0) {poz[x]=j;x++;break;}
        }
    }

    g<<bun<<" "<<rau<<endl;
    for(i=1;i<=x;i++){
        g<<poz[i]<<" ";
    }
    return 0;
}



