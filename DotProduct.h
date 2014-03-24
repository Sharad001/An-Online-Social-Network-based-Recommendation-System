#define users 943
#define movies 1682
bool foo2(pair<LL,double> a, pair<LL,double> b)
{
	return (a.S>b.S);
}
void dotProduct(LL userId)
{
	//vector<LL> similarUsers;
	vector< pair<LL,double> > dotproducts;
	LL num,den1,den2;
	double dp;
	for(LL i=1;i<=users;i++)
	{	
		num=0;
		den1=0;
		den2=0;
		if(i!=userId)
		{
			for(LL j=1;j<=movies;j++)
			{
				if(matrix[userId][j]!=-1 && matrix[i][j]!=-1)
				{
					num+= (matrix[userId][j] * matrix[i][j]);
				}
				den1+= (matrix[userId][j] * matrix[userId][j]);
				den2+= (matrix[i][j] * matrix[i][j]);
			}
			dp= num / (sqrt(den1)*sqrt(den2));
			dotproducts.push_back(make_pair(i,dp));
		}
	}
	sort(dotproducts.begin(), dotproducts.end(), foo2);
	LL l1=dotproducts.size();
	for(LL k=0;(k<min(20LL,l1)); k++)
	{
		pair <LL,double> p = dotproducts[k];
		similarPeople.push_back(p.first);
	}
	return;
}
