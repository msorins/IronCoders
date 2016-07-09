#include <iostream>
using namespace std;
int n,x1,yy1,x2,y2,i,j,lin,prim,ultim,sum,sumcr,aux;
int suma(int x)
{
    int s=0;
    while(x)
    {
        s+=x%10;
        x/=10;
    }
    return s;
}
int val(int x, int y)
{
    if(x==1)
        aux=1;
    else
        aux=n-x+2;
    aux+=y;
    aux%=n;
    aux--;
    if(aux<=0)
        aux=n+aux;
    return suma(aux);
}
int main()
{
    cin>>n;
    cin>>x1>>yy1>>x2>>y2;
    ultim=val(x1,y2);
    for(j=yy1; j<=y2; j++)
        sum+=val(x1,j);
    sumcr=sum;
    for(i=x1+1; i<=x2; i++)
    {
        sumcr-=ultim;
        sumcr+=val(i,yy1);
        ultim=val(i,y2);
        sum+=sumcr;
    }
    cout<<sum;

}