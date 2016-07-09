#include <iostream>
using namespace std;
int a[10],b[10];

void back(int k,int len)
{
     if(k-1 == len)   //afisam solutia
     {
         for(int i = 1; i <= len;i++)
           cout<<a[i]<<" ";
         cout<<"\n";
     }
     else
     {
         for(int  i = 1; i <= len; i++)            if(!b[i])  //daca valoarea nu-i folosita
           {
                 a[k] = i;
                 b[i] = 1; //o folosim
                 back(k+1,len); //trecem la pasul urmator
                 b[i] = 0; //o eliberam
           }
     }
}

int main()
{
    int n;
    cin>>n;
    back(1,n);
    return 0;
}
