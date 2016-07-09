#include <iostream>
#include <string.h>
using namespace std;
char v[2002], alfabet[123], salfabet[123];
char cuvinte[500][500];
int i,j,x=0,y=0,yy;
bool cmp()
{
    int aux1,aux2; bool ok=false;
    int l,m,maxim;
    maxim=max(strlen(cuvinte[i]+1), strlen(cuvinte[j]+1));
    for(l=1; l<=maxim; l++)
    {
        aux1=(int)cuvinte[i][l];
        aux2=(int)cuvinte[j][l];
        if(aux1!=aux2)
        {
            if(salfabet[aux1]>salfabet[aux2])
            {
                return 1;
                ok=true;
                break;
            }
                if(salfabet[aux1]<salfabet[aux2])
            {
                return 0;
                ok=true;
                break;
            }
        }
    }
    if(ok==false)
        return 0;
}
int main()
{
    cin.getline(alfabet+1,29);
    cin.getline(v+1,3001);
    for(i=1; i<=strlen(alfabet+1); i++)
    {
        int megaux; megaux=(int)alfabet[i];
        salfabet[megaux]=i;
    }
    for(i=1; i<=strlen(v+1); i++)
    {
        if(v[i]!=' ' && v[i]!='.' && v[i]!=',' && v[i]!=';' && v[i]!='!' && v[i]!='>' && v[i]!=':' && v[i]!='?')
        {
            y=i; x++; yy=0;
            while(v[y]!=' ' && v[y]!='.' && v[y]!=',' && v[y]!=';' && v[y]!='!' && v[y]!='>' && v[y]!=':' && v[i]!='?' && y<=strlen(v+1))
            {
                yy++;
                cuvinte[x][yy]=v[y];
                y++;
            }
            i+=y-i-1;
        }
    }
      char auxiliar[2002];
    for(i=1; i<=x; i++)
    {
        for(j=i+1; j<=x; j++)
        {
            if(cmp()==1)
                {
                    strcpy(auxiliar+1,cuvinte[i]+1);
                    strcpy(cuvinte[i]+1,cuvinte[j]+1);
                    strcpy(cuvinte[j]+1,auxiliar+1);
                }
        }
    }
    for(i=1; i<=x; i++)
    {
        for(j=1; j<=strlen(cuvinte[i]+1); j++)
            cout<<cuvinte[i][j];
        cout<<" ";
    }


}