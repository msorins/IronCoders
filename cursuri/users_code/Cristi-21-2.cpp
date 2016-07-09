#include <iostream>
#include <fstream>
using namespace std;
int main()
{
    int x,s=0;
    x=1231121212;
    while(x)
    {
        cout<<x%10<<" ";
        s+=x%10;
        x/=10;
    }
    cout<<s;
}