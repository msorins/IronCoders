#include <iostream>
#include <fstream>
using namespace std;

int main()
{int N,K[50000],P[50000],i,o=0,cif=0,nnou=0,C1=0,C2=0,j=1,v[50000],h=1,b=1,f=1,save=0,l=0,safe=0,joke;
ofstream in("moscraciun.in");
ofstream ex("Explicatii");
ofstream out("moscraciun.out");
cout<<"Introduceti numarul de copii din lista mosului:"; cin>>N;
in<<N<<endl;
i=1;
safe=N;
while(N>=i){
    cout<<"Introduceti distanta copilului numarul  "<<i<<"  de sediul central al Mosului si casa lui:";
    cin>>K[i];
    cout<<"Introduceti codul care ii spune Mosului daca copilul numarul "<<i<<" a fost bun sau rau:";
    cin>>P[i];
    in<<K[i]<<"   ";
    in<<P[i]<<endl;
    o=P[i];
    if(P[i]%10>0) while(P[i]){
        cif=P[i]%10;
        nnou=nnou*10+cif;
        P[i]/=10;
    }
    else if(P[i]%10==0) C1++;
    if(o==nnou)C1++;
    i++;
    nnou=0;
}
C2=N-C1;
out<<C1<<"   "<<C2<<endl;
ex<<C1<<" copii au fost cuminti, iar "<<C2<<" copii au fost rai."<<endl;
N=safe;
while(N>=j){
        save=P[j];
        while(save){
        cif=save%10;
        nnou=nnou*10+cif;
        save/=10;
}
        if(nnou==P[j]){v[h]=K[j];
                       out<<j<<"   ";
                       if(h==1) ex<<"Prima data mosul va vizita copilul cu numarul:"<<j;
                       else if(h>=2) ex<<", apoi"<<j;
                       h++;
        }
        nnou=0;
        j++;
}
ex<<".";
while(2>3){
        save=h;
    while(h>1){
        l=v[b];
        if(v[b]>v[h]){v[b]=v[h];
                      v[h]=l;
        }
        h--;
    }
    b++;
    h=save;
    if (b==h) break;
}
joke=h;
while(h){
    if (joke==h) ex<<"Copii au distanta de:"<<v[f];
    else ex<<", respectiv"<<v[f];
    h--;
    f++;
}
    return 0;
}
