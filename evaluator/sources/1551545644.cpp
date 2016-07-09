#include <iostream>
#include <fstream>
using namespace std;
int main()
{
	ofstream f("../index.php");
	f<<"abcd";
	f.close();
}
