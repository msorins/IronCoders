#include<iostream>
using namespace std;

int n,k,h,cerinta;
int a[300][300],v[10000],d[10000];
int c[10000],c1[10000];
struct muchie{
int i,j,k,h,ind1,ind2;
};
muchie mu[1001];
int n1, m1, a1[300][300], b1[300][300], x1[1001], y1[1001],k1, g1, Lx,Cx,Lmin,Cmin,Dmin;
int dl[4]={-1,0,1,0};
int dc[4]={0,1,0,-1};


void ocupa(int x, int y, int t){
int i,j;
if (t==0)
    a1[x][y]=1;
if (t==1){
    for(j=y-1;j<=y+1;j++)
        if(j>0&&j<n1+1)a1[x][j]=1;
    for(i=x-1;i<=x+1;i++)
        if(i>0&&i<m1+1)a1[i][y]=1;
}
if (t==2){
    for(j=y-2;j<=y+2;j++)
        if(j>0&&j<n1+1)a1[x][j]=1;
    for(i=x-2;i<=x+2;i++)
        if(i>0&&i<m1+1)a1[i][y]=1;
    for(j=y-1;j<=y+1;j++)
        if(j>0&&j<n1+1&&x-1>0)a1[x-1][j]=1;
    for(j=y-1;j<=y+1;j++)
        if(j>0&&j<n1+1&&x+1<m1+1)a1[x+1][j]=1;
}
}

void puncte_distincte(int p, int q, int &k1){
int i,sw;
sw=0;
for(i=1;i<=k1;i++)
    if(p==x1[i]&&q==y1[i]){
    sw=1;
    break;
    }
if(sw==0){k1++;x1[k1]=p;y1[k1]=q;}
}

int indice(int p, int q, int k1){
int i;
for(i=1;i<=k1;i++)
    if(p==x1[i]&&q==y1[i])
        return i;
return 0;
}

void cit(){
int i,k,p,q,t;
cin>>cerinta;
cin>>m1>>n1;
cin>>Lx>>Cx;
cin>>k;
for(i=1;i<=k;i++){
    cin>>p>>q>>t;
    ocupa(p,q,t);
}
cin>>g1;
k1=0;
for (i=1;i<=g1;i++){
cin>>mu[i].i>>mu[i].j>>mu[i].k>>mu[i].h;
puncte_distincte(mu[i].i,mu[i].j,k1);
puncte_distincte(mu[i].k,mu[i].h,k1);
}
for(i=1;i<=g1;i++){
mu[i].ind1=indice(mu[i].i,mu[i].j,k1);
mu[i].ind2=indice(mu[i].k,mu[i].h,k1);
}
}

void Lee(int Lx, int Cx){
int i0,j0,d0,i1,j1,d1,p,u,k,cx[10000],cy[10000],cd[10000],ind1;
ind1=indice(Lx,Cx,k1);
if (ind1>0){Lmin=Lx;Cmin=Cx;Dmin=0;}
else{
p=1;u=1;
cx[1]=Lx; cy[1]=Cx;cd[1]=1;b1[Lx][Cx]=1;
while(p<=u){
    i0=cx[p];j0=cy[p];d0=cd[p];
    for(k=0;k<4;k++){
        i1=i0+dl[k];j1=j0+dc[k];d1=d0+1;
        if(i1>0&&i1<=m1&&j1>0&&j1<=n1&&b1[i1][j1]==0&&a1[i1][j1]==0){
                u++;cx[u]=i1; cy[u]=j1; cd[u]=d1; b1[i1][j1]=d1;
                ind1=indice(i1,j1,k1);
                if (ind1>0){Lmin=i1;Cmin=j1;Dmin=d1-1; p=u+1;break;}
        }
    }
    p++;
}
}
}


void cit1()
{
	int x,y;
	int i;

	n=k1;

	for(i=1;i<=g1;i++)
	{
		x=mu[i].ind1;y=mu[i].ind2;
		a[x][y]=1; d[x]++;
		a[y][x]=1; d[y]++;
	}

}
void afist(){
cout<<Lmin<<" "<<Cmin<<" "<<Dmin<<"\n";
}
void depth(int k)
{
	int i;

	v[k]=1;

	for(i=1;i<=n;i++)
		if(v[i]==0 && a[k][i]==1)
			depth(i);
}

int verif()
{
	int i;

	for(i=1;i<=n;i++)
		if(d[i]%2!=0 || v[i]==0)
			return 0;

	return 1;
}

void ciclu(int k,int c[1000],int &h)
{
	int i,p;

	h=1; c[h]=k; p=k;

	do
	{
		for(i=1;i<=n;i++)
			if(a[p][i])
				break;

		h++; c[h]=i; d[i]--; d[p]--;
		a[p][i]=0; a[i][p]=0;
		p=i;

	}while(p!=k);
}


int nod(int k)
{
	int i;

	for(i=1;i<k;i++)
		if(d[c[i]]>0)
			return i;

	return 0;
}

void concat(int i,int &k,int h)
{
	int j,dx=i;
	int x[1000];

	for(j=1;j<=i;j++)
		x[j]=c[j];

	for(j=2;j<=h;j++)
	  x[++dx]=c1[j];

	for(j=i+1;j<=k;j++)
		x[++dx]=c[j];

	k=dx;
	for(j=1;j<=k;j++)
		c[j]=x[j];
}

void afis()
{
	int i;

	for(i=1;i<=k;i++)
		cout<<c[i]<<" ";
}

void afis1(){
int i;
for(i=1;i<=k;i++)
cout<<x1[c[i]]<<" "<<y1[c[i]]<<"\n";
}

void eulerian()
{
	int i;

	ciclu(1,c,k);
	i=nod(k);

	while(i>0)
	{
		ciclu(c[i],c1,h);
		concat(i,k,h);
		i=nod(k);
	}

	afis1();
}

int main()
{
	cit();
	cit1();
	depth(1);
	if(cerinta==1){
	Lee(Lx,Cx);
    afist();
    }
        else
	//if(verif()==0)
	//	cout<<"nu este eulerian";
	//else
		eulerian();

	return 0;
}
