#include <fstream>
using namespace std;

int main()
{int n,c1=0,c2=0,d,c,i,a[500],b[500],f[500],x,x2,z=0,s[300];

    ifstream q("moscraciun.in");
    ofstream w("moscraciun.out");

    q>>n;
    for(i=1;i<=n;i++){
        q>>d>>c;
        a[i]=d;
        b[i]=c;
    }

    for(i=1;i<=n;i++){
        x=b[i];
        x2=0;
        while(x){
            x2=x2*10+x%10;
            x/=10;
        }
        if(x2==b[i]) {z++;c1++;f[z]=a[i];s[a[i]]=i;}
        else c2++;
    }
// am distantele in f[z] si trebuie sa le ordonez
   for(i=1;i<=z;i++){
     x=z;
     while(x){
        if(f[i]>f[x] && x>i) swap(f[i],f[x]);
        x--;
     }
   }

    w<<c1<<" "<<c2<<"\n";
   for(i=1;i<=z;i++)
    w<<s[f[i]]<<" ";



    return 0;
}
