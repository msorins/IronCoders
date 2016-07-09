#include<iostream>
#include<cstring>
using namespace std;
#define VALMAX 200003
#define OFFSET 100001

int N;
int A[VALMAX];
int B[VALMAX];
int C[VALMAX];
int D[VALMAX];
#define sum (A + OFFSET)
#define cor (B + OFFSET)
#define aux (C + OFFSET)
#define newCor (D + OFFSET)
//pentru a putea avea si indici numere negative
//sum[i] = 0 daca nu am format suma i
//		 = 1 daca am format suma i
//sum[0] = 2 initial marcam pe 0 cu o valoare pt a putea calcula sumele.
//Daca la un moment dat avem si suma 0 sum[0] = 1

int main() {

	cin>>N;
	int i, j, a, b;
	sum[0] = 2;
	cor[0] = 0;
	for(i = 0; i < N; i++) {
		cin>>a>>b;
		memcpy(C, A, VALMAX * sizeof(int));
		memcpy(B, D, VALMAX * sizeof(int));
		//este nevoie de vectori intermediari pt ca a nu adauga aceeasi
		//valoare de 2 ori

		for (j = -OFFSET; j<=OFFSET; j++) {
			if (aux[j]) {
				if (sum[j+b] == 1)
					newCor[j+b] = newCor[j+b] > (cor[j] + a)?newCor[j+b]:(cor[j] + a);
				else
					newCor[j+b] = cor[j] + a;

				sum[j+b] = 1;
			}
		}
	}

	//cautam val maxima pentru toate sumele >=0 gasite
	int max = -OFFSET - 1;

	for (i = 0; i <= OFFSET; i++) {
		if (sum[i] == 1 && max < newCor[i]) max = newCor[i];
	}

	cout<<max;
	return 0;
}
