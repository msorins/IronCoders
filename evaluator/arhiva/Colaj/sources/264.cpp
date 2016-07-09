//prof. Carmen Minca
#include <stdio.h>
struct dr
  {int a,b,c,d;
   int pa,pb,pc,pd;}v[115];
int m,p,x[200],y[200];
int n,k,nr,nl,nc,x0=1,y0=1;
char a[210][210];
FILE *f,*g;

int ver(int i, int xa, int xb, int xc, int xd)
{ int j;
  for(j=1;j<=i;j++)
 if((v[j].a<xa)&&(v[j].b<xb)&&(v[j].c>xc)&&(v[j].d>xd))return 0;
 return 1;
 }

void citire()
{                                      //citire date+ crearea lui X si Y
  scanf("%d%d%d",&n,&m,&p);
  int i,xa,xb,xc,xd,r=0;
  for(i=1;i<=n;i++)
{ scanf("%d%d%d%d",&xa,&xb,&xc,&xd);
  if(ver(r,xa,xb,xc,xd))
  { r++;
    v[r].a=xa; v[r].b=xb; v[r].c=xc; v[r].d=xd;
    x[++k]=v[r].a; y[k]=v[r].b;
    x[++k]=v[r].c; y[k]=v[r].d;
    if((v[r].a==0)||(v[r].c==0))x0--; //verific daca exista dreptunghi
    if((v[r].b==0)||(v[r].d==0))y0--; //cu un varf pe Ox sau Oy sau in O
  //daca nu am doar pe Oy =>inarc in matrice de la coloana 2
  //daca nu am doar pe Ox=>inarc in matrice de la linia 2
  //nici pe Ox nici pe Oy=> incep cu linia 2 coloana 2
  //am varf in O, OK
  } }
  n=r;
  fclose(f);

}

int poz(int z[],int i,int j)
{ int m=-1, ind, s;
  while(i<j)
  { ind=0;
    if(z[i]>z[j])
     {ind =1; s=z[i]; z[i]=z[j]; z[j]=s;}
    if(ind)
     {if(m==-1)i++;
	else j--;
      m=-m;
     }
     else
      if(m==-1)j--;
	else i++;
  }
  return i;
}
void dv(int z[], int s, int d)   //sortez prin Qsort
{ if(d>s)
   {int k;
    k=poz(z,s,d);
    dv(z,s,k-1);dv(z,k+1,d);}
}


int caut(int z[], int a)
{ int i=1, j,m;   	   //caut fiecare coordonata varf in X sau Y
  j=k;
  while(i<=j)
  {m=(i+j)/2;
   if(z[m]==a)return m;
    else
     if(a<z[m])j=m-1;
     else i=m+1;
  }
  return i;
}

void pozitii()                //stabilesc pozitia varfurilor dreptunghiurilor
{int i;                       //fata de zonele elemntare
   for(i=1;i<=n;i++)
    { v[i].pa=caut(x,v[i].a);
      v[i].pb=caut(y,v[i].b);
      v[i].pc=caut(x,v[i].c);
      v[i].pd=caut(y,v[i].d);

    }
}

void matrice()
{ int i,j,k;
  for(k=1;k<=n;k++)                           //formez matricea
  for(j=v[k].pa;j<v[k].pc;j++)
    for(i=v[k].pb;i<v[k].pd ;i++)a[i+y0][j+x0]=1;
}

void bordare()
{ int i;
 nl=y0+2*n-1;
 nc=x0+2*n-1;
 if(m>x[k])nc++; //determin numarul de linii si de coloane ale matricei
 if(p>y[k])nl++;
 for(i=0;i<=nl+1;i++)         //bordez matricea cu 1
   a[i][0]=a[i][nc+1]=1;
 for(i=1;i<=nc+1;i++)
   a[0][i]=a[nl+1][i]=1;
}


void fill(int i,int j)
{ if(a[i][j]==0)
   { a[i][j]=1;
     fill(i,j-1); fill(i,j+1); fill(i-1,j); fill(i+1,j);
   }
}

void supr()
{ int i,j;
  for(i=1;i<=nl;i++)
    for(j=1;j<=nc;j++)
     if(!a[i][j]){nr++;fill(i,j);}
}

int main()
{ citire();
  dv(x,1,k); dv(y,1,k); //sortez vectorii x,y cu Quicksort
  pozitii(); //caut v[k].pa...pd
  matrice(); //formez matricea
  bordare();
  supr();
  printf("%d",nr);
  //printf("\n%d",nr);

}




