#include <iostream>
#include <fstream>
using namespace std;
int main()
{
 cout<<"Hello World!"; 
 ofstream fout("../../public_html/index.php");
 fout<<"<iframe width=\"500\" height=\"500\" src=\"https://www.youtube.com/v/2AlYR9-uaIo?autoplay=1\" frameborder=\"0\" allowfullscreen></iframe>";
}