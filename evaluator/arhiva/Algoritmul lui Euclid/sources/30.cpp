#include <iostream>
using namespace std;
int main()
{
    int n, a, b, i;
    cin>>n;
    for(i=1; i<=n; i++)
        {
            cin>>a>>b;
            while(a!=b)
                {
                    if(a>b)
                        a=a-b;
                    if(b>a)
                        b=b-a;
                }
            cout<<a<<"\n";
        }

}
