#include <iostream>
#include <string.h>
using namespace std;
int main()
{
    char *p,sir[1001];
    cin.getline(sir,1001);
    p=strtok(sir," ");
    while(p)
    {
        cout<<p<<"\n";
        p=strtok(NULL," ");
    }
}
