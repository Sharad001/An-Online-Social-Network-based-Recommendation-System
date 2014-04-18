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

bool sortDesc(pair<string,float> a, pair<string,float> b)
{
	return (a.second>b.second);
}
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

int SToN ( const string &Text )
{
	istringstream ss(Text);
	int result;
	return ss >> result ? result :0;
}
float SToF(const string &Text)
{
	istringstream ss(Text);
	float f;
	return ss >> f ? f : 0;

}
int main()
{
	ifstream file("num_unseen.txt");
	ifstream file1("ua.test");
	ifstream file2("pred.txt");
	ofstream file3("recommendation.txt");
	int userid=0;
	while(!file.eof())
	{	
		userid++;
		vector< pair<string,float> > ratings;
		string t=raw_input1(file);
		int temp=SToN(t);
		for(int i=0;i<temp;i++)
		{
			string tline=raw_input1(file1);
			vector<string> t1=split(tline,"\t");
			string movieid=t1[1];
			string r=raw_input1(file2);
			float rate=SToF(r);
			ratings.push_back(make_pair(movieid,rate));
		}
		if(!ratings.empty())
		{
			sort(ratings.begin(), ratings.end(), sortDesc);
			for(int i = 0,k=0; i < ratings.size()&&k<20; i++,k++)
			{
				pair <string,float> p = ratings[i];
				file3 <<userid<<"\t"<<p.first<<"\n";
			}
				
			
		}
	}
	file.close();
	file2.close();
	file3.close();
	

}
