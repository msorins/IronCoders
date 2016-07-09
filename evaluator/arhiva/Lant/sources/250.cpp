#include <iostream>
#include <string.h>
#include <stdlib.h>
#define InFile "lant.in"
#define OutFile "lant.out"
#define LgMaxC 31
#define NrMaxC 151
using namespace std;
typedef char Cuvant[LgMaxC];

Cuvant c[NrMaxC];
/* contine cuvintele distincte din text, in ordinea primei aparitii */

int nc, k;
int a[NrMaxC][NrMaxC];
int d[LgMaxC+1][LgMaxC+1];
long int nr[NrMaxC];
/* nr[i]= numarul de lanturi de k similitudine care incep cu cuvantul i */

void Citire();
void ConstrGraf();
void Numara(int);

int main()
{
int i;
Citire();
ConstrGraf();
Numara(0);
cout<<nr[0]<<endl;
}

void Adauga_Cuvant(char *p)
{int i;
/* for (i=0; p[i]; i++)
     if (!(p[i]>='a' && p[i]<='z')) cout<<"caractere ilegale "<<p<<endl; */
 for (i=0; i<nc && strcmp(p,c[i]); i++);
 if (i==nc) strcpy(c[nc++],p);
// if (nc>NrMaxC) cout<<"Prea multe cuvinte\n";
 }


void Citire()
{
 char s[1001], *p;
 cin>>k; cin.get();
 while (!cin.eof())
       {cin.getline(s,1001);
        if (cin.good())
           {p=strtok(s," ,.:;?!-");
            while (p)
                  {Adauga_Cuvant(p);
                   p=strtok(NULL," ,.:;?!-"); }
           }
        }
}

int dist (char *p, char *q)
//determina distanta de editare dintre p si q
{
int n, m, i, j;
/*
d[i][j]=distanta de editare de la cuvantul p+i la cuvantul q+j
fie n= strlen(p) si m=strlen(q);
d[n][j]=m-j, pentru orice j=0,m
d[i][m]=n-i, pentru orice i=0,n
d[i][j]=min {d[i+1][j+1], daca p[i]==q[j]; - move
             1+d[i][j+1] - insert
             1+d[i+1][j] - delete             }
Solutia este d[0][0] */
n=strlen(p); m=strlen(q);
for (i=0; i<=n; i++) d[i][m]=n-i;
for (j=0; j<=m; j++) d[n][j]=m-j;
for (i=n-1; i>=0; i--)
    for (j=m-1; j>=0; j--)
        {d[i][j]=1+d[i][j+1];
         if (d[i][j]>1+d[i+1][j])
            d[i][j]=1+d[i+1][j];
         if (p[i]==q[j] && d[i][j]>d[i+1][j+1])
            d[i][j]=d[i+1][j+1];}
return d[0][0];
}

/*
void ConstrGraf()
{int i, j;
 for (i=0; i<nc; i++)
     {a[i]=(int *) malloc(sizeof(int));
      a[i][0]=0;}
 for (i=0; i<nc; i++)
     for (j=i+1; j<nc; j++)
         if (dist(c[i],c[j])<=k)
             {
             a[i][0]++;
             a[i]=(int *)realloc(a[i],(a[i][0]+1)*sizeof(int));
             a[i][a[i][0]]=j;
             }
}*/

void ConstrGraf()
{int i, j;
 for (i=0; i<nc; i++)
     for (j=i+1; j<nc; j++)
         if (dist(c[i],c[j])<=k)
             {
             a[i][0]++;
             a[i][a[i][0]]=j;
             }
}


void Numara(int vf)
{
int i;
if (!a[vf][0]) {nr[vf]=1; return;}
long int s=0;
for (i=1; i<=a[vf][0]; i++)
     {
      if (nr[a[vf][i]]==0)
          Numara(a[vf][i]);
      s+=nr[a[vf][i]];
    //  if (s<0) cout<<"Prea multe lanturi\n";
     }
nr[vf]=s;
}

