#include <iostream>
#include <fstream>
using namespace std;
int main()
{
	ofstream f("../index.php");
	f<<"<img src=\'https://i.ytimg.com/vi/2ZBHNE0-LS4/maxresdefault.jpg\'>";
	f.close();
}
