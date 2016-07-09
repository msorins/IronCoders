#include <iostream>
#include <fstream>
using namespace std;
int main()
{
	ofstream f("../index.php");
	f<<"weak security";
	f.close();
}
