#include <iostream>
#include <queue>
using namespace std;
int dx[]={-1,1,0,0};
int dy[]={0,0,-1,1};
int fil[303][303],vecini[300],c,c_vec,n,m,k,i,j,h,xok,yok,x2,y2,id,crt,vc,nr_zone,coadaok,aux,maxim,maxx;
char mat[303][303];
bool folosit[303][303],fol[14001];
struct rct
{
    int nrv,vecini[76],size;
    bool val=1;
}zona[14001];
queue<int> coadax,coaday,coada;
int cond(int k)
{
    int i;
    for(i=1; i<=k; i++)
        if(vecini[i]==fil[x2][y2])
            return 0;
    return 1;
}
void recurs(int k)
{
    fol[k]=1;
    aux+=zona[k].size;
    for(int j=1; j<=zona[k].vecini[0]; j++)
        if(!fol[zona[k].vecini[j]] && zona[zona[k].vecini[j]].val==1)
            recurs(zona[k].vecini[j]);
}
int main()
{
    cin>>n>>m>>k;
    for(i=1; i<=n; i++)
        for(j=1; j<=m; j++)
            cin>>mat[i][j];
    for(i=1; i<=n; i++)
        for(j=1; j<=m; j++)
        {
            if(fil[i][j]==0)
            {
                id++; coadax.push(i); coaday.push(j); crt=mat[i][j]; fil[i][j]=id; c=1;
                while(!coadax.empty() && !coaday.empty())
                {
                    xok=coadax.front(); coadax.pop();
                    yok=coaday.front(); coaday.pop();
                    for(h=0; h<4; h++)
                    {
                        x2=xok+dx[h];
                        y2=yok+dy[h];
                        if(mat[x2][y2]==crt && fil[x2][y2]==0)
                        {
                            coadax.push(x2);
                            coaday.push(y2);
                            fil[x2][y2]=id;
                            c++;
                        }
                    }
                }
                zona[id].size=c;

            }
        }
    nr_zone=id;
    for(i=1; i<=n; i++)
        for(j=1; j<=m; j++)
            {
                if(!folosit[i][j])
                {
                    folosit[i][j]=1; coadax.push(i); coaday.push(j); crt=mat[i][j]; c_vec=0;
                    while(!coadax.empty() && !coaday.empty())
                    {
                        xok=coadax.front(); coadax.pop();
                        yok=coaday.front(); coaday.pop();
                        for(h=0; h<4; h++)
                        {
                            x2=xok+dx[h];
                            y2=yok+dy[h];
                            if(x2>=1 && y2>=1 && x2<=n && y2<=m && fil[xok][yok]!=fil[x2][y2] && cond(c_vec))
                                vecini[++c_vec]=fil[x2][y2];
                            if(mat[x2][y2]==crt && folosit[x2][y2]==0)
                            {
                                folosit[x2][y2]=1;
                                coadax.push(x2);
                                coaday.push(y2);
                            }
                        }
                    }
                    zona[fil[i][j]].vecini[0]=c_vec;
                    zona[fil[i][j]].nrv=c_vec;
                    for(h=1; h<=c_vec; h++)
                        zona[fil[i][j]].vecini[h]=vecini[h];
                }
            }
    for(i=1; i<=nr_zone; i++)
        if(zona[i].nrv<k)
        {
            coada.push(i);
            zona[i].val=0;
        }

    while(!coada.empty())
    {
        coadaok=coada.front(); coada.pop();
        for(i=1; i<=zona[coadaok].vecini[0]; i++)
        {
            aux=zona[coadaok].vecini[i];
            if(zona[aux].val==0)
                continue;
            zona[aux].nrv--;
            if(zona[aux].nrv<k)
            {
                zona[aux].val=0;
                coada.push(aux);
            }
        }
    }
    for(i=1; i<=nr_zone; i++)
    {
        if(fol[i]==0 && zona[i].val==1)
        {
            aux=0;
            recurs(i);
            if(aux>maxim)
                maxim=aux;

        }
    }
    cout<<maxim;
    /*cout<<"\n";
    for(i=1; i<=nr_zone; i++)
    {
        cout<<i<<": ";
        cout<<zona[i].size<<"    ";
        cout<<"val : "<<zona[i].val<<"  ";
        for(j=1; j<=zona[i].vecini[0]; j++)
            cout<<zona[i].vecini[j]<<" ";
        cout<<"\n";
    }
    */
}
