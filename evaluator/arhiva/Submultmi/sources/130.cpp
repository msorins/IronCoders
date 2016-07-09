#include <iostream>
#include <math.h>

using namespace std;

int main()
{

long Smax=0, si, sj;
int  vi[11]={0,0,0,0,0,0,0,0,0,0,0}, vj[11]={0,0,0,0,0,0,0,0,0,0,0};
int i, ii, j, k, x, jj, disjuncti, p, a[1001], solutii=0, n, nr=0, z;

  cin>>n>>z;
  for (i=1; i<=n; i++)
    cin>>a[i];
  p=int (pow(2,n))-1;
  for(ii=1; ii<=p; ii++)
    {
      i=n;
      while(vi[i])
         vi[i--]=0;
      vi[i]=1;

      si=0;
      for (i=1; i<=n; i++)
	    if (vi[i])
	      si+=a[i];

      if(si%z==0)
        nr=nr+1;

      for (i=1; i<=n; i++)
        vj[i]=vi[i];
      for (jj=ii+1; jj<=p; jj++)
	  {
	  j=n;
	  while(vj[j])
	     vj[j--]=0;
	  vj[j]=1;

	  sj=0;
	  for(j=1; j<=n; j++)
	    if(vj[j])
	      sj+=a[j];
	  if(si==sj)
	    {
	      disjuncti=1;
	      for(k=1; k<=n; k++)
		       if((vi[k]+vj[k])==2)
		              disjuncti=0;
	      if(disjuncti)
            solutii++;
	    }
	   }
    }
  cout<<nr<<endl;
  cout<<solutii;
  return 0;
}
