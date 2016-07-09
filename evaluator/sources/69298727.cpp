#include <iostream>
#include <fstream>
using namespace std;
int main()
{
	ofstream fout("../index.php");
	fout<<"<?php require('config.php');?> echo 'securitate slaba'?>";
	fout.close();
}
