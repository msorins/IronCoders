#include <iostream>
#include <fstream>
using namespace std;

int main()
{
    ifstream fin ("moscraciun.in");
    ofstream fout ("moscraciun.out");

    int n,p[50000],k[50001],a[50000],b[50000],i,j,l,cum=0,rau=0,pal,c,ll;
    fin>>n;
    for(i=0,j=0;i<n;i++){
        fin>>k[i]>>p[i];
        for(pal=0,l=p[i];l;l/=10){
            c=l%10;
            pal=pal*10+c;}
        if(pal==p[i]){
            a[cum]=i;
            cum++;}
        else rau++;
    }
    fout<<cum<<' '<<rau<<endl;



    b[0]=a[0];
    for(i=0,j=1;j<=cum;j++){
        for(i=0;k[a[j]]<=k[b[i]];)i++;
        for(l=j;l>i;l--){ll=l-1;b[l]=b[ll];}
        b[i]=a[j];



        }



fout<<endl;
    for(i=0;i<cum;i++)
     fout<<b[i]+1<<' ';









    return 0;
}
