#include <iostream>
#include <fstream>
using namespace std;

int main()
{
    ofstream fout ("trenuri.out");
    ifstream fin ("trenuri.in");
    int n,x,a[2000],b[2000],c[2000],ia=1,ib=1,ic=1,na=0,nb=0,nc=0,okp,okf,d,e,f,g,z=1,ver;
    fin>>n;
    for(;n;n--){
        fin>>x;
        okp=1;
        okf=0;


        if((x%2==0&&x!=2)||x==1)okp=0;
        for(d=3;d*d<=x;d+=2) if(x%d==0)okp=0;


        if (x==1)okf=1;g=0;
        for(e=1,f=1;g<=x;){
            g=e+f;
            e=f;
            f=g;
            if (g==x)okf=1;
        }

        if(okf==1&&okp==1){c[ic]=x;ic++,nc++;}
        else{
            if(okf==1){b[ib]=x;ib++;nb++;}
            if(okp==1){a[ia]=x;ia++;na++;}
            }}
            d=0;
    if(nc){
    if(na+nc<nb){ if(nb-na-nc==1)d=nc+2*na+1;if(nb-na-nc>1)d=nc+2*na+2;}
    if(nb+nc<na){ if(na-nb-nc==1)d=nc+2*nb+1;if(na-nb-nc>1)d=nc+2*nb+2;}}
    if(na+nc>=nb&&nb+nc>=na) d=na+nb+nc;
    fout<<d<<endl;
    if (na>nb)ver=1;else ver=2;
    for(z=1,d=0;z==1;ver++){
            e=0;
        if(ver%2==1){
                if(na>=nb&&na>0){fout<<a[na]<<' ';na--;e=1;}
                if(na<=nb&&nc>0&&na>0&&e==0){fout<<c[nc-1]<<' ';nc--;}}
        if(ver%2==0) {
                if(nb>=na&&nb>0){fout<<b[nb]<<' ';nb--;e=1;}
                if(nb<=na&&nc>0&&nb>0&&e==0){fout<<c[nc]<<' ';nc--;}}
        if(na==0&&nb==0&&e==0&&nc>0){fout<<c[nc]<<' ';nc--;}
        if((nb==0&&nc==0)||(na==0&&nc==0)){z=0;}
               }



 return 0;
}
