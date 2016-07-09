#include <fstream>
using namespace std;

int main()
{int n,a=0,b=0,c=0,x=0,va[100],vb[100],vc[100],vx[100],  i,d,x1,x2,f1,f2,s,ok,os,max=0,v[100];

    ifstream q("trenuri.in");
    ofstream w("trenuri.out");

    q>>n;
    for(i=1;i<=n;i++){
        q>>v[i];
    }
//Pana aici citire

    for(i=1;i<=n;i++){
        x1=v[i];
        x2=v[i];
        f1=1;
        f2=1;
        s=2;
        d=2;
        while(d*d<=x1){
            if(x1%d==0) {d=0;break;}
            else d++;
        }
        while(s<x2){
            s=f1+f2;
            f1=f2;
            f2=s;

        }
        if(d>0 && s==x2) {ok=3; c++; vc[c]=v[i];}
        else if(f2==x2) {ok=2; b++; vb[b]=v[i];}
             else if(d>0) {ok=1; a++; va[a]=v[i];}
                  else {ok=0; x++; vx[x]=v[i];}

    }

    i=0;
    while(a>0 || b>0 || c>0){
        s=a+b+c;
        while(s){
            if(max<=a && os!=1) {max=a;ok=1;os=1;}
            if(max<=b && os!=2) {max=b;ok=2;os=2;}
            if(max<=c && os!=3) {max=c;ok=3;os=3;}
            s--;
        }
        if(ok==1) {vx[i]=va[a];a--;i++;}
        else if(ok==2) {vx[i]=vb[b];b--;i++;}
             else if(ok==3) {vx[i]=vc[c];c--;i++;}
             max--;
    }


    w<<i<<"\n";
    for(n=0;n<i;n++){
        w<<vx[n]<<" ";
    }


    return 0;
}
