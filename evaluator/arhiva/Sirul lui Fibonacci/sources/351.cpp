#include <iostream>

using namespace std;

int main()
{
    int n,nr1=1,nr2=1,aux;
    cin>>n;
    cout<<nr1<<" "<<nr2<<" ";
    for(int i=3;i<=n;i++)
    {
        aux=nr1+nr2;
        cout<<aux<<" ";
        nr1=nr2;
        nr2=aux;
    }
    return 0;
}
