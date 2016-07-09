#include <iostream>
#include <fstream>
using namespace std;
int n,a[250000],mini,maxi,i,x;
bool q=false;
int main()
{
    ifstream fin("numere2.in");
    ofstream fout("numere.out");

    fin>>n;
    for(i=1;i<=n*n;i++){
        fin>>x;
        a[x]=x;

    }

    /* for(i=1;i<=n*n;i++)
        fout<<a[i]<<" ";*/

        for(i=1;i<=n*n && q==false;i++){
            if(a[i]==0){
                mini=a[i-1]+1;
                q=true;
                while(a[i]==0)
                    i++;
            }
            maxi=a[i]-1;
    }


    fout<<mini<<" "<<maxi;







    return 0;
}
