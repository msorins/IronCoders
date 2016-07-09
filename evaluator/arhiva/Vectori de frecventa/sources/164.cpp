#include <iostream>
using namespace std;
int n,i,x,v[11],nr,frecv_nr;
void frecv(int nr)
{
    while(nr)
    {
        v[nr%10]++;
        nr/=10;
    }
}
int main()
{
    cin>>n;
    for(i=1; i<=n; i++)
    {
        cin>>x;
        frecv(x);
    }
    for(i=0; i<=9; i++)
        if(v[i]>frecv_nr)
        {
            frecv_nr=v[i];
            nr=i;
        }
    cout<<nr<<" "<<frecv_nr;

}
