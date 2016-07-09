#include <iostream>
#include <dirent.h>
using namespace std;
int main()
{
    DIR* dirp = opendir(".");
   dirent* dp;
   while ((dp = readdir(dirp)) != NULL)
    cout << dp->d_name;
	cout<<"Hello world!";
}
