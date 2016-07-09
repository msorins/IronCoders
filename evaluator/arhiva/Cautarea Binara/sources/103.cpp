#include<iostream>
using namespace std;
int n,x,v[10001],m;
int caut (int st, int dr)
{
    if(st>dr)
        return -1;
    else
        {
            m =(st+dr)/2;
            if (x==v[m])
                return m;
            if (x<v[m])
                return caut(st,m-1);
            else
                return caut(m+1,dr);
        }
}
int main()
{
    cin>>n>>x;
    for (int i=1;i<=n;i++)  //Vectorul incepe de pe pozitia 1
        cin>>v[i];
    cout<<caut (1,n);
}
