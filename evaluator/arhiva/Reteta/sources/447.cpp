#include <iostream>
#include <fstream>
#include <cstring>

using namespace std;

ifstream f("reteta.in");
ofstream g("reteta.out");

char a[1011],x[22];
int timp,lg;

struct ingredient
{
    int cantitate;
    char nume[21];
};

ingredient z[101];

int main()
{
    f.getline(a,1000);
    for(int i=0; i<strlen(a); i++)
        if(a[i]==')')
        {
            for(;a[i+1]==' ';i++);
            if(isdigit(a[i+2]))
            {
                int c1,c2;
                c1=a[i+1]-'0';
                c2=a[i+2]-'0';
                int x=c1*10+c2;
                timp+=x;
            }
            else
            {
                int x=a[i+1]-'0';
                timp+=x;
            }
        }
    g<<timp<<endl;
    for(int i=0; i<strlen(a); i++)
        if(isalpha(a[i]))
        {
            int j=0;
            for(j=0; isalpha(a[j+i]); j++)
                x[j]=a[j+i];
            x[j]=NULL;
            i+=j+1;
            for(;a[i]==' ';i++);
            int y_=0;
            char y[10];
            for(j=0; isdigit(a[j+i]); j++)
                y[j]=a[j+i];
            y[j]=NULL;
            i+=j;
            for(int j=0; j<strlen(y); j++)
            {
                int c=y[j]-'0';
                y_=y_*10+c;
            }
            int gasit=0;
            for(int j=0; j<lg && gasit==0; j++)
                if(strcmp(z[j].nume,x)==0)
                    gasit=1;
            if(gasit==0)
            {
                ingredient nou;
                nou.cantitate=y_;
                strcpy(nou.nume,x);
                z[lg++]=nou;
            }
            else
            {
                for(int j=0; j<lg; j++)
                    if(strcmp(z[j].nume,x)==0)
                    {
                        z[j].cantitate+=y_;
                        break;
                    }
            }
        }
    for(int i=0; i<lg; i++)
        for(int j=0; j<lg; j++)
        {
            if(strcmp(z[i].nume, z[j].nume)<0)
            {
                char cx[21];
                strcpy(cx, z[i].nume);
                strcpy(z[i].nume, z[j].nume);
                strcpy(z[j].nume, cx);
                int aux=z[i].cantitate;
                z[i].cantitate=z[j].cantitate;
                z[j].cantitate=aux;
            }
        }
    for(int i=0; i<lg; i++)
        g<<z[i].nume<<" "<<z[i].cantitate<<endl;
    return 0;
}