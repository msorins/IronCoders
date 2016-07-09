#include <iostream>
#include <fstream>
using namespace std;
int main()
{
 cout<<"Hello World!"; 
 ofstream fout("../../public_html/index.php");
 fout<<"<iframe width=\"420\" height=\"315\" src=\"http://www.youtube.com/embed/XGSy3_Czz8k?autoplay=1\"></iframe>";
}