// Sursa 100 puncte numai cu if-uri prof. Cristina Sichim - Bacau

# include <iostream>
using namespace std;
long t;
int g,s,cerc;
char p;
int main()
{ cin>>>>p>>s>>t;
  t=t%1080;
  
  switch(p) 
  { case 'A': if (s==1) if(t<180) cout<<t<<" 1\n", t=0; else t=t-180,cerc=2,p='G';
			      else  if(t<120) cout<<360-t<<" 1\n",t=0; else t=t-120,cerc=3,p='I';
              break;
    case 'B': if (s==1) if(t<120) cout<<t+60<<" 1\n", t=0; else t=t-120,cerc=2,p='G';
			      else  if(t<180) cout<<(360-(t-60))%360<<" 1\n",t=0; else t=t-180,cerc=3,p='I';
              break;
    case 'C':if (s==1) if(t<180) cout<<t+120<<" 2\n", t=0; else t=t-180,cerc=3,p='H';
			      else  if(t<120) cout<<120-t<<" 2\n",t=0; else t=t-120,cerc=1,p='G';
              break;
	case 'D':if (s==1) if(t<120) cout<<t+180<<" 2\n", t=0; else t=t-120,cerc=3,p='H';
			      else  if(t<180) cout<<180-t<<" 2\n",t=0; else t=t-180,cerc=1,p='G';
              break;
	case 'E':if (s==1) if(t<180) cout<<(240+t)%360<<" 3\n", t=0; else t=t-180,cerc=1,p='I';
			      else  if(t<120) cout<<240-t<<" 3\n",t=0; else t=t-120,cerc=2,p='H';
              break;			  
				  
	case 'F':if (s==1) if(t<120) cout<<(300+t)%360<<" 3\n", t=0; else t=t-120,cerc=1,p='I';
			      else  if(t<180) cout<<300-t<<" 3\n",t=0; else t=t-180,cerc=2,p='H';
              break;			  
				  
  }
  
  s=-s;
  
  while(t)
  { switch(p)
  { case 'G': if(s==1) if(cerc==1) if (t>60)t=t-60,p='I'; else  cout<<180+t<<" 1\n",t=0;
							  else if (t>300) t=t-300,p='H'; else cout<<t<<" 2\n",t=0;
                  else if(cerc==1) if(t>300) t=t-300,p='I';else cout<<(540-t)%360<<" 1\n",t=0;
							 else if(t>60) t=t-60,p='H'; else cout<<360-t<<" 2\n",t=0;
			   cerc=3;
							 
			   break;
	case 'H': if(s==1) if(cerc==3)if (t>300)t=t-300,p='I'; else cout<<120+t<<" 3\n",t=0;
                            else if(t>60) t=t-60,p='G'; else cout<<300+t<<" 2\n",t=0;
                  else if(cerc==3) if(t>60) t=t-60,p='I'; else cout<<120-t<<" 3\n",t=0;
							 else if(t>300) t=t-300,p='G'; else cout<<(300-t)%360<<" 2\n",t=0;
			   cerc=1;
			   break;	
			   
	case 'I': if(s==1) if(cerc==1)if(t>300)t=t-300,p='G'; else cout<<(240+t)%360<<" 1\n",t=0;
                            else if(t>60) t=t-60,p='H'; else cout<<60+t<<" 3\n",t=0;
                  else if(cerc==1) if(t>60) t=t-60,p='G'; else cout<<240-t<<" 1\n",t=0;
							 else if(t>300) t=t-300,p='H'; else cout<<(420-t)%360<<" 3\n",t=0;
			   cerc=2;
			   break;	
    }
	  s=-s;
  }
  
  cin>>.close();fo.close();
return 0;
}