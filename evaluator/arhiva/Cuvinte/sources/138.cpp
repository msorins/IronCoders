#include <iostream>
#include <string.h>
using namespace std;
int nr=0,lim,i;
char str[1001];
int main()
{
    cin.getline(str,1000);
    while(strlen(str))
    {
        lim=strlen(str); nr++;
        for(i=0; i<lim; i++)
            if(str[i]==' ' && isalpha(str[i+1]))
                nr++;
        cin.getline(str,1000);
    }
    cout<<nr;
}
