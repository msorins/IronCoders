#include <iostream>
#include <string.h>
using namespace std;

int main()
{
    int n,m,i,j,h,v[101],lg,min,poz;
    char cuv[101],s[10001],a[5000][101];
    cin>>cuv;
    cin>>s;
    m=strlen(cuv);
    n=strlen(s)/m;
    lg=strlen(cuv);
    h=-1;
    for(i=0;i<strlen(cuv);i++)
       v[i]=cuv[i]-'A';
    for(j=1;j<=lg;j++)
    {
        min=v[0];
        poz=0;
        for(i=1;i<lg;i++)
           if(v[i]<min)
                        {
                            min=v[i];
                            poz=i;
                        }

        for(i=1;i<=n;i++)
           a[i][poz+1]=s[++h];
        v[poz]=65;
    }
    for(i=1;i<=n;i++)
         for(j=1;j<=m;j++)
            cout<<a[i][j];
    return 0;
}
