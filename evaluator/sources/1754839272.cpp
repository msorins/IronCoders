#include <iostream>
#include <dirent.h>
#include <string>
#include <fstream>
using namespace std;


void display_members(string filename)
{
    string getcontent;
    ifstream openfile ("members.txt");
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
	display_members("cursuri-edit.php");
}
