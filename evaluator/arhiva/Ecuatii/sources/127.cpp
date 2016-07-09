#include <math.h>
#include <stdlib.h>
#include <string.h>
#include <iostream>
using namespace std;
#define LgMax 300

char s[LgMax],s1[LgMax],s2[LgMax];
int n;
long nr1, nr2, nrx1, nrx2;

void rezolva(char *, long &, long &);

int main()
{
int i;
char *p;

cin>>n;
for (i=0; i<n; i++)
    {
       cin>>s1;
       p=strchr(s1,'=');
       strcpy(s2,p+1);
       *p=NULL;
       rezolva(s1, nr1, nrx1);
       rezolva(s2, nr2, nrx2);
       if (nrx1==nrx2)
          if (nr1==nr2)
             cout<<"infinit\n";
             else
             cout<<"imposibil\n";
          else
              cout<<(double)(nr2-nr1)/(nrx1-nrx2);

    }
return 0;
}

void rezolva(char *s, long &nr, long &nrx)
{char *p, ss[LgMax];
 long v;
 int semn=1, l;
strcpy(ss,s);
p=strtok(ss,"+-");
nr=0; nrx=0;
while (p)
      {

      l=strlen(p);
      if (p[0]=='x') nrx+=semn;
      else
      if (p[l-1]=='x')
         {p[l-1]=NULL;
          v=atol(p);
          nrx=nrx+semn*v;
         }
         else
         {v=atol(p);
         nr=nr+semn*v;}
      if (s[p+l-ss]=='+')
         semn=1;
         else
         semn=-1;
      p=strtok(NULL, "+-");
      }
}
