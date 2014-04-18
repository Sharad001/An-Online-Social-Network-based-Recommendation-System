#include<cstdio>
#include<iostream>
#include<algorithm>
#include<cstring>
#include<cmath>
#include<vector>
#include<stack>
#include<queue>
#include<map>
#include<set>
#include<sstream>
#include<fstream>
#include<iomanip>

using namespace std;

#define users 943
#define movies 1682
#define LL		long long int


int matrix[1005][1700];


string raw_input1(istream& stream)
{
	string res;
	getline(stream,res);
	return res;
}
vector<string> split(string x, string d)
{
	vector<string> res;
	int prev = 0, found = x.find(d); // string find returns int
	while(found!=std::string::npos) // special cnstnt returned when not found
	{
		res.push_back(x.substr(prev,found-prev)); // substr : give start    point and length to include
		prev = found+1;
		found = x.find(d, found+1); // find from index >= found+1
	}
	res.push_back(x.substr(prev,x.size()-prev));
	return res;
}
LL STN ( const string &Text )
{
	istringstream ss(Text);
	LL result;
	return ss >> result ? result :0;
}
int SToN ( const string &Text )
{
	istringstream ss(Text);
	int result;
	return ss >> result ? result :0;
}
void parse()
{
	ifstream file("ua.base");
	memset(matrix,-1,sizeof(matrix));
	vector<string> temp;
	while(!file.eof())
	{
		string t=raw_input1(file);
		if(t.size()>0)
		{
			temp=split(t,"\t");
			matrix[SToN(temp[0])][SToN(temp[1])]=STN(temp[2]);
			
		}
	}
	file.close();
	ofstream testfile ("ua.test");
	ofstream num_unseen ("num_unseen.txt");
	int unseen=0;
	for(int i=0;i<users;i++)
	{	
		for(int j=0;j<movies;j++)
		{	if(matrix[i][j]==-1)
			{	unseen++;
				testfile << i+1 <<"\t" <<j+1 <<"\t"<<"1"<<"\n";	
			}
		}
		num_unseen <<unseen<<"\n";
		unseen=0;
	}
	testfile.close();
	num_unseen.close();
}
int main()
{
	
	parse();
	
	
	return 0;
}
