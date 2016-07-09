#include <string.h>
#include <iostream>
using namespace std;
char str[101][1001],aux[1001],a[11][51],b[11][51],*poz;
int n,p,i,j,poz2;
int main()
{
    cin>>n>>p; cin.getline(aux,100);
    for(i=1; i<=n; i++)
        cin.getline(str[i],1001);
    for(i=1; i<=p; i++)
        cin>>a[i]>>b[i];
    for(i=1; i<=p; i++)//parcurg toate operatiile
        for(j=1; j<=n; j++)//parcurg toate propozitiile
        {
            do
            {
                poz=strstr(str[j],a[i]); poz2=poz-str[j];
                if(poz && ( poz2==0 || str[j][poz2-1]==' ') && (!isalpha(str[j][poz2+strlen(a[i])])))
                {
                    strcpy(aux,poz+strlen(a[i]));
                    strcpy(poz,b[i]);
                    strcat(str[j],aux);
                }
                else
                    break;
            }while(1);
        }
    for(i=1; i<=n; i++)
        cout<<str[i];
}
