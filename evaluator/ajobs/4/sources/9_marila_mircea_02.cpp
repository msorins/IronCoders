#include <iostream>
#include <fstream>
#include <limits.h>
using namespace std;

int main()
{ ifstream f("trenuri.in");
ofstream g("trenuri.out");
int n;
f>>n;
int v[n+1],i,a=0,b=0,c=0,x=0,ok,save1=-1,save2=-2,f1,f2,f3,max=INT_MIN,nrmax;
for(i=1;i<=n;i++)
    f>>v[i];
for(i=1;i<=n;i++)
{    ok=1;
    if(v[i]<=1)ok=0;
    else if(v[i]==2)ok=1;
    else for(i=2;i<=v[i]/2;i++)
    if(v[i]%i==0)ok=0;
    if(ok)save1=v[i];
    ok=0;
    if(v[i]<=1)ok=0;
    else if(v[i]==1)ok=1;
    else
    {f1=1;f2=1;f3=f1+f2;
    while(f3<=1000)
    {
        if(v[i]==f3){ok=1;break;}
        else
        {
            f1=f2;
            f2=f3;
            f3=f1+f2;
        }

    }if(ok)save2=v[i];
    }
    if(save1==save2)c++;
    else if(save1==v[i]&&save2==-2)a++;
    else if(save2==v[i]&&save1==-1)b++;
    else if(save2==-2&&save1==-1) x++;

}
if(a>max)max=a;
if(b>max)max=b;
if(c>max)max=c;
if(max==a&&b+c>=a-1)nrmax=a+b+c;
else nrmax=2*(b+c)+1;
if(max==b&&a+c>=b-1)nrmax=a+b+c;
else nrmax=2*(a+c)+1;
if(max==c&&b+a>=c-1)nrmax=a+b+c;
else nrmax=2*(b+a)+1;
g<<nrmax;
return 0;}


