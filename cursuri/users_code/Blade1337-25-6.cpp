#include <iostream>
#include <string.h>
using namespace std;

char a[100], b[100];
int x;

int main()
{
    cin.getline(a, '\n');
    cin.getline(b, '\n');
    cout<<strcmp(a, b);
}