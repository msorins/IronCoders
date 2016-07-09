#include <iostream>
using namespace std;
int v[201][201], pvec[201],qvec[201];
int l,c,i,j,p,q,okl,okc,h;
int main()
{
    cin>>l>>c;
    for(i=1; i<=l; i++)
    {
        for(j=1; j<=c; j++)
        {
            cin>>v[i][j];
        }
    }
    cin>>p;
    for(i=1; i<=p; i++)
        cin>>pvec[i];
    cin>>q;
    for(i=1; i<=q; i++)
        cin>>qvec[i];
    for(i=1; i<=l; i++)
    {
        okl=true;
        for(h=1; h<=p; h++)
        {
            if(i==pvec[h])
                okl=false;
        }
        for(j=1; j<=c; j++)
        {
            okc=true;
            if(okl==false)
                break;
            else
            {
                for(h=1; h<=q; h++)
                {
                    if(j==qvec[h])
                        okc=false;
                }
                if(okc==true)
                    cout<<v[i][j]<<" ";
            }
        }
        if(okl==true)
            cout<<"\n";
    }
}
