#include <iostream>
#include <fstream>
using namespace std;

int main()
{ifstream a("trenuri.in");
 ofstream b("trenuri.out");
int N,nr=0,vagon;
a>>N;
int vA[N],vB[N],vC[N],vloc[N],lo=0,ok,ok1,j,i;
for(i=1;i<=N;i++)
    {a>>vagon;
    ok=0; ok1=0;
    for(j=1;j<=vagon;) {if(vagon==j) ok=1;
                        j=j+j;
                       }
    for(j=2;j<=vagon/2;j++) if(vagon%j==0) ok1=1;
    if(ok==1&&ok1==0) {lo++;
                       vagon=vB[lo];vA[lo]=0;vC[lo]=0;
                       nr++;}
    if(ok==0&&ok1==1) {lo++;vagon=vA[lo];vB[lo]=0;vC[lo]=0;nr++;}
    if(ok==1&&ok1==1) {lo++;vagon=vC[lo];vA[lo]=0;vB[lo]=0;nr++;}
    }
   b<<nr<<endl;
   i=1;
   if(vA[i]!=0) {vloc[i]=vA[i]; for(i=2;i<=lo;i++) {if(vB[i]!=0) vloc[i]=vB[i];
                                                      else if(vC[i]!=0) vloc[i]=vC[i];
                                                      else if(vloc[i]==vA[i]) {vloc[i+1]=vA[i];
                                                                              for(j=i+1;j<=lo;j++) if(vB[j]!=0) {vloc[i]=vB[j]; vB[j]=0;break;}
                                                                             }
                                                   }}
   else if(vB[i]!=0) {vloc[i]=vB[i]; for(i=2;i<=lo;i++) {if(vA[i]!=0) vloc[i]=vA[i];
                                                       else if(vC[i]!=0) vloc[i]=vC[i];
                                                       else if(vloc[i]==vB[i]) {vloc[i+1]=vB[i];
                                                                                for(j=i+1;j<=lo;j++) if(vA[j]!=0) {vloc[i]=vA[j]; vA[j]=0;break;}
                                                                               }
                                                   }}
   else if(vC[i]!=0) {vloc[i]=vC[i];for(i=2;i<=lo;i++); {if(vB[i]!=0) vloc[i]=vB[i];
                                                          else if(vA[i]!=0) vloc[i]=vA[i];
                                                          else vloc[i]=vC[i];


                                                                             }
                                                   }
for(i=1;i<=lo;i++) b<<vloc[i]<<" ";



       return 0;
}
