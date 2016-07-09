#include <iostream>
#include <fstream>
using namespace std;
int main()
{
	ofstream fout("../index.php");
	fout<<"<?php echo 'securitate slaba'?>";
	fout.close();
}
