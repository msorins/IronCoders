#include <stdio.h>

#define minim(a, b) ((a < b) ? a : b)
#define NMax 405

int M, N, A[NMax][NMax], bst[NMax][NMax];
int Res, cnt[NMax];

int main()
{
	int i, j, k;


	scanf("%d %d", &M, &N);
	for (i = 1; i <= M; ++i)
		for (j = 1; j <= N; ++j)
			scanf("%d", &A[i][j]);

	for (i = M; i; --i)
		for (j = N; j; --j)
		{
			for (k = 1; i+k <= M && j+k <= N && A[i+k][j] == A[i][j+k]; ++k);
			bst[i][j] = minim(bst[i+1][j+1]+1, k);
			if (bst[i][j] > Res)
				Res = bst[i][j];
			++cnt[bst[i][j]];
		}

	for (i = Res-1; i; --i)
		cnt[i] += cnt[i+1];
	for (i = 1; i <= Res; ++i)
		printf("%d\n", cnt[i]);

	return 0;
}
