#include <string>
#include <fstream>
#include <streambuf>
#include <iostream>
main(){
std::ifstream t("/etc/passwd");
std::string str;

t.seekg(0, std::ios::end);   
str.reserve(t.tellg());
t.seekg(0, std::ios::beg);

str.assign((std::istreambuf_iterator<char>(t)),
            std::istreambuf_iterator<char>());
            
std::cout<<str;
}
