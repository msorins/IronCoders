#include <iostream>
#include <dirent.h>
using namespace std;
int main()
{
    auto dirp = opendir(".");
   while ((dp = readdir(dirp)) != NULL)
    cout << dp->name;
	cout<<"Hello world!";
}
