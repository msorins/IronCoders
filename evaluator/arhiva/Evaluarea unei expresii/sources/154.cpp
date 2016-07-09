#include <iostream>
#include <string.h>
using namespace std;
char v[100002],*p;
int s;
int a(); int b(); int c();
int main()
{
   cin.getline(v,100001); p=v;
   cout<<a();
}
int a()
{
    int val=b();
    while(*p=='+' || *p=='-')
    {
        switch(*p)
          {
          case '+':
            ++p;
            val+=b();
            break;
          case '-':
            ++p;
            val-=b();
            break;
          }
    }
    return val;
}
int b()
{
    int val=c();
    while(*p=='/' || *p=='*')
    {
        switch(*p)
        {
        case '/':
            ++p;
            val/=c();
            break;
        case '*':
            ++p;
            val*=c();
            break;
        }
    }
    return val;
}
int c()
{
    int val=0;
    if(*p=='(')
    {
        ++p;
        val=a();
        ++p;
    }
    else
    {
        while(*p>='0' && *p<='9')
        {
            val=val*10+*p-'0';
            ++p;
        }
    }
    return val;
}
