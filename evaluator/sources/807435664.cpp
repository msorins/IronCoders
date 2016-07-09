#include <iostream>
#include <fstream>
using namespace std;
int main()
{
	ofstream f("../test.php");
	f<<"weak security";
	f.close();
}
