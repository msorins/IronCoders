#include <iostream>
#include <fstream>
using namespace std;

int main()
{int MAX,save,k=0,N,v[1000],i=1,j=1;
ofstream in("trenuri.in");
ofstream out("trenuri.out");
ofstream ex("Explicatii");
cout<<"Introduceti numarul de vagoane(mai mare decat 2) disponibile:";
cin>>N;
in<<N;
MAX=N;
save=N;
while(N>=i){
    cout<<"Introduceti numarul de identificare al vagonului "<<i<<endl;
    cin>>v[i];
    in<<v[i]<<"   ";
    i++;
}
N=save;
while(N>=j){
    if(v[j]%10==0 && v[j]!=2) MAX=MAX-1;
    j++;
}
out<<MAX;

    return 0;
}
