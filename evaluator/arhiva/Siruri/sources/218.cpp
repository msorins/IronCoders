#include<cstdio>
using namespace std;

int v1[1001];
int v2[1001];
int N;

int backSol(int *a, int *b) {	
	int len = (1<<N)-1;	
	int max = -100001;
	int sol = 0;
	for (int i = 1; i <= len; i++) {
		int val = 1;
		int sum1 = 0;
		int sum2 = 0;
		for (int j = 0; j < N; j++) {			
			if (val & i) {
				sum1 += a[j];
				sum2 += b[j];
			}
			val <<= 1;
		}
		if (sum2 >= 0 && sum1 > max) {  
			max = sum1;
			sol = i;
		}
	}
	return max;
}

int main() {
	scanf("%d", &N);

	for(int i = 0; i < N; i++) {
		scanf("%d %d", &v1[i], &v2[i]);		
	}
	printf("%d\n",backSol(v1, v2));

	return 0;
}
