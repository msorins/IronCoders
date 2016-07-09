#include <iostream>
#include <string.h>
#include <algorithm>
using namespace std;
struct rct
{
    char x[21];
    int y;
}v[101];
int cmp(rct A, rct B)
{
    if(strcmp(A.x,B.x)<0)
        return 1;
    else
        return 0;
}
char str[1001],aux2[22];
int i,j,lim,nr,rasp1,cuvinte,c,poz;
bool ok,ok2,ok3;
int main()
{
    cin.getline(str,1000); lim=strlen(str);
    for(i=0; i<lim; i++)
    {
        if(str[i]==')')
            ok=true;
        if(isdigit(str[i]) && ok==true)
        {
            nr=str[i]-48;
            if(isdigit(str[i+1]))
                nr=nr*10+str[i+1]-48;
            if(isdigit(str[i+2])&& isdigit(str[i+1]))
                nr=nr*10+str[i+2]-48;
            rasp1+=nr;
            ok=false;
        }
        if(isalpha(str[i]))
        {
            ok3=true; c=0; ok2=true; // pp ca e unic cuvantul
            while(isalpha(str[i]))
            {
                aux2[c]=str[i];
                i++; c++;
            }
            for(j=0; j<cuvinte; j++)
            {
                if(strcmp(aux2,v[j].x)==0)
                {
                    poz=j;
                    ok2=false;
                    break;
                }
            }
            if(ok2==true)
            {
                poz=cuvinte;
                strcpy(v[cuvinte].x,aux2);
                cuvinte++;
            }
            for(j=0; j<=20; j++)
                aux2[j]=NULL;
            i--;
        }
        if(ok3==true && isdigit(str[i]))
            {
                nr=str[i]-48;
                if(isdigit(str[i+1]))
                    nr=nr*10+str[i+1]-48;
                if(isdigit(str[i+2])&& isdigit(str[i+1]))
                    nr=nr*10+str[i+2]-48;
                ok3=false;
                v[poz].y+=nr;
            }
    }
    sort(v,v+cuvinte,cmp);
    cout<<rasp1<<"\n";
    for(i=0; i<cuvinte; i++)
        cout<<v[i].x<<" "<<v[i].y<<"\n";;
}