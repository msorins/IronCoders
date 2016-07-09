//problema numar - stelian ciurea
//solutia "oficiala" 100 puncte
#include <iostream>
using namespace std;

long a[1001];
long st,dr,mj,vl,n,m,i,j,k,h,nr1,lim,ok,pro,np;
long prod[13000];
int s[1001];


long f(long x)
{ long vl = 0;
  for (i=1;i<=np;i++)
   if (prod[i]!=0)
      vl = vl + x/prod[i];
    else
      cout<<"upsi";
  return vl;
}

void back(int p,long pr)
{ int i,j;
  for (i=s[p-1]+1;i<=n-k+p;i++)
   {s[p]=i;
    if (a[i] > lim / pr) return;
    if (p==1)
     { pro=1;
       for (j=1;j<=k;j++)
	{  if (pro <= lim/a[i+j-1])
	      pro = pro*a[i+j-1];
	   else
	      return;
	}
     }
    if (p==k)
      { pro=1;
	for (j=1;j<=k;j++)
	 { if (pro <= lim/a[s[j]])
	     pro = pro*a[s[j]];
	   else return;
	   //if (pro>lim) return;
	 }
	if (pro<=lim)
	{ np++;
	 //cout<<np<<' ';
	  if (k%2==1)
	   prod[np]=pro;
	  else
	   prod[np]=-pro;

	}
	else return;
      }
    else
      back(p+1,pr*a[i]);
    }
}



int main()
{ cout<<endl;
  cin>>n>>m;
  for (i=1;i<=n;i++)
     cin>>a[i];

  lim = m*a[1];  //limita pana la care pot fi valori in sir

  np=0;

  for (k=1;k<=n;k++)
     back(1,1);


  st = 1;
  dr = lim;
  do
  { mj = (st+dr) / 2;
    vl = f(mj);
    if (vl==m)
      { //cout<<mj<<endl;
	break;
      }
    if (vl<m) st = mj+1;
     else dr = mj-1;
  }
  while (st<=dr);

  for (k=mj;k>=0;k--)
  {
    for (i=1;i<=n;i++)
      if (k%a[i]==0)
	{ cout<<k<<endl;

	}
  }

}
