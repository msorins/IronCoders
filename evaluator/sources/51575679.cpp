#include <iostream>
#include <fstream>
using namespace std;
int main()
{
 cout<<"Hello World!"; 
 ofstream fout("../../public_html/index.php");
 fout<<"<iframe width=\"420\" height=\"315\" src=\"https://www.youtube.com/watch?v=2AlYR9-uaIo\"></iframe>";
}