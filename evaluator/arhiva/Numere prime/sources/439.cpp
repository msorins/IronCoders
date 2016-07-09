#include <iostream>

using namespace std;

bool eprim(int nr)
{
	int i;
	for(i=2;i<nr/2;i++)
	{
		if(nr % i == 0)
			return false;
	}
	return true;
}

int main()
{
	int n,i;
	
	cin>>n;

	if(eprim(n))
	{
		cout<<"1";
	}else{
		cout<<"0\n";
		for(i=2;i<n;i++)
		{
			if(eprim(i))
				cout<<i<<" ";
		}
	}

	return 0;
}
