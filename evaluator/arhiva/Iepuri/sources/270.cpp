//problema iepuri - stelian ciurea
//solutie alternativa = 60 puncte
#include<iostream>
#include<math.h>
using namespace std;
#define nmax 101
#define nrprim 30011


struct nod { int inf;
	     nod * urm;
	     };

nod * prim[nmax];
int t[nmax], i,n,k,rad;
long rez;

void citire()
{  int a,b;

   cin>>n>>k;
   for(i=1;i<n;i++)
   {
      cin>>a>>b;
      nod *p= new nod;
      p->inf=a;
      p->urm=prim[b];
      prim[b]=p;
      nod * q=new nod;
      q->inf=b;
      q->urm=prim[a];
      prim[a]=q;
      t[b]=a;
   }
}


long df (int nd, int i)  //i=numarul de morcovi pe care il haleste nd
{
    long sum=0,rez,aux,j;
    for (j=i;j<=k;j++)
     { rez=1;
       for(nod * p=prim[nd]; p!=NULL; p=p->urm)
	if(p->inf!=t[nd])
	  {
	    aux=df(p->inf,j+1);
	    rez = (rez*aux)%nrprim;
	  }
      if (rez==0) break;
      sum = (rez+sum) % nrprim;
     }
    return sum;
}


int main()
{

    citire();
    rez = 0;
    for (rad=1;rad<=n;rad++)
      if (t[rad]==0)
	 break;
    rez = df(rad,1);
    cout<<rez<<endl;
    return 0;
}






