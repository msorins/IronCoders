#include <fstream>
using namespace std;
ifstream cin("cifru2.in");
ofstream cout("cifru2.out");
const long prim = 19997;
long k,n;
long m[5005];
long f(int n)
{ long d,i,rez=0,t;
  if (n<k)
  {if (n<=1) return 1;
   if (m[n]!=0) return m[n];
   long da = 1, p=1;
   for (d=2;d<=n;d++)
     if (k%d==0)
       {for(i=n-da;i>=n-d+1;i--)
	   p = (p*i) % prim;
	t = p*f(n-d);
	rez = (rez + t) % prim;
	da = d;
	}
    return m[n] = (f(n-1) + rez) % prim;
   }
 if (m[n]!=0) return m[n];
 long da = 1, p = 1;
 for (d=2;d<=k;d++)
   if (k%d==0)
   {for(i=n-da;i>=n-d+1;i--)
       p = (p*i) % prim;
     t = (p*f(n-d)) % prim;
     rez = (rez + t) % prim;
     da = d;
    }
 return m[n] = (f(n-1) + rez) % prim;
}

int main()
{  cin>>n>>k;
   cout<<f(n);
  return 0;
}
