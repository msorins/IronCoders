#include <iostream>

using namespace std;

int main()
{
    int a, b, n, c;
    cout<<"n="; cin>>n;
    cout<<"a="; cin>>a;
    cout<<"b="; cin>>b;
    for(int i=0; i<n; i++)
    {
        while(b)
        {c=a%b;
         a=b;
         b=c;}
        cout<<"cmmdc="<<a<<endl;
        cin>>a; cin>>b;
    }
    return 0;
}
