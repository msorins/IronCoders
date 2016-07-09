#include <iostream>
using namespace std;
int n,x,nr,p=1;
int main()
{
    cin>>n>>x;
    while(n)
    {
        nr=p*(n%x)+nr;
        p*=10;
        n/=x;
    }
    cout<<nr;

}
