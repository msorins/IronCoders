#include <fstream>
using namespace std;
int main(){
    ofstream f("../index.php");
    if(!f.good()){
        cout<<"muie";
    }
}