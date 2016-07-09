#include <iostream>
using namespace std;
int n,x,pal,i,aux;
int main()
{
    cin>>n;
    for(i=1; i<=n; i++)
    {
        cin>>x; aux=x; pal=0;
        while(aux)
        {
            pal=pal*10+aux%10;
            aux/=10;
        }
        if(pal!=x)
            cout<<x<<" ";
    }
}
