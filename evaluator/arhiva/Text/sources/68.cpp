#include <iostream>
#include <string.h>
using namespace std;
void invers(char *q)
{
    int n=strlen(q),i;
    for(i=0;i<n/2;i++)
        {char aux=q[i];
         q[i]=q[n-i-1];
         q[n-i-1]=aux;
        }
}

int main()
{
    char text[525]="",cuv[25],textdec[525],p[525],q[525],textinvdec[525];
    unsigned int n,s,m,lg=0,am[50],bs[50],k=0,i,j;
    cin>>n;

    while(lg<=n)
       {
           cin>>cuv;
           strcat(text,cuv);
           lg+=strlen(cuv);

       }
    for(s=1;s<=25;s++)
        {
          strcpy(textdec,text);
          for( i=0;i<strlen(textdec);i++)
                     {if(text[i]-s>='A')textdec[i]=text[i]-s;
                      else textdec[i]='Z'-(64-text[i]+s);
                     }

          for(m=5;m<=20;m++)
            {

               strcpy(p,textdec);
               strcpy(textinvdec,"");
               for( int kk=1;kk<=strlen(textdec);kk+=m)
                    {
                        strncpy(q,p,m);
                        q[m]='\0';
                        invers(q);
                        strcat(textinvdec,q);
                        strcpy(p,p+m);
                    }
               if(strstr(textinvdec,cuv))
                     {   cout<<s<<m;
                         break;
                     }


              }
              }
    return 0;
}