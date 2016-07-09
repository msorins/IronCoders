#include <iostream>
#include <dirent.h>
#include <string>
#include <cstring>
#include <fstream>
using namespace std;


void display_members(char a[100])
{
    string getcontent;
    ifstream openfile (a);
    if(openfile.is_open())
    {
        while(! openfile.eof())
        {
            getline(openfile, getcontent);
            cout << getcontent << endl;
        }
    }
}

int main()
{
    /*DIR* dirp = opendir(".");
   dirent* dp;
   while ((dp = readdir(dirp)) != NULL)
    cout << dp->d_name << endl;
	cout<<"Hello world!";*/
	char v[100];
	strcpy(v, "cursuri-edit.php");
	display_members(v);
}
