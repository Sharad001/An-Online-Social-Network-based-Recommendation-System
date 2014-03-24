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

/* General Declarations */

#define INF		1000000007
#define LL		long long int
#define SI(n)		scanf("%lld",&n)
#define SC(c)		scanf("%c",&c)
#define FOR(x,a,b)	for(LL x=a;x<b;x++)
#define REP(i,n)	for(LL i=0;i<n;i++)
#define MP		make_pair
#define PB		push_back
#define F		first
#define S		second
#define TR(container,it) for(typeof(container.begin()) it = container.begin();it != container.end(); it++)


/* Container's */

#define	VI		vector<LL>
#define PLL		pair<LL,LL>  /* A Single Pair  */
#define VP		vector<PLL> /* Vector of Pairs */
#define VS		vector<string>
#define VVI		vector<VI>
#define VVS		vector<VS>

typedef struct user
{
	LL age;
	string sex;
	string profession;
	LL location;
}user;
typedef struct movie
{
	string name;
	vector<bool> genre;
}movie;
map<LL,vector<pair<LL,LL> > > data; // to be populated from u.data
vector<user> uinfo; // to be populated from u.user
map<LL,VI> age_id; // mapping of age to user_id
vector<movie> minfo; // to be populated from u.item
LL matrix[1005][1700];
VI similarPeople;

#include "DotProduct.h"

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
	ifstream file("./input/u.data");
	memset(matrix,-1,sizeof(matrix));
	vector<string> temp;
	while(!file.eof())
	{
		string t=raw_input1(file);
		if(t.size()>0)
		{
			temp=split(t,"\t");
			matrix[SToN(temp[0])][SToN(temp[1])]=STN(temp[2]);
			data[STN(temp[0])].PB(MP(STN(temp[1]),STN(temp[2])));
		}
	}
	file.close();
	user a;
	uinfo.PB(a);
	ifstream file1("./input/u.user");
	while(!file1.eof())
	{
		string t=raw_input1(file1);
		if(t.size()>0)
		{
			temp=split(t,"|");
			LL id=STN(temp[0]);
			a.age=STN(temp[1]);
			a.sex=temp[2];
			a.profession=temp[3];
			a.location=STN(temp[4]);
			uinfo.PB(a);
			age_id[a.age].PB(id);
		}
	}
	file1.close();
	movie m;
	minfo.PB(m);
	ifstream file2("./input/u.item");
	while(!file2.eof())
	{
		string t=raw_input1(file2);
		if(t.size()>0)
		{
			temp=split(t,"|");
			m.name=temp[1];
			int j=0;
			for(int i=5;i<temp.size();i++)
			{
				if(temp[i]=="1")
					m.genre.PB(1);
				else
					m.genre.PB(0);
			}
			minfo.PB(m);
			m.genre.clear();
		}
	}
	file2.close();

}
bool foo(PLL a,PLL b)
{
	return (a.F>b.F);
}
bool foo1(pair<double,LL> a,pair<double,LL> b)
{
	return (a.F>b.F);
}
void accordingHeuristics(LL age,LL id)
{
	for(LL i=age-2;i<=age+2;i++)
	{
		if(i<0)
			continue;
		LL l=age_id[i].size();
		REP(j,l)
		{
			if(j!=id && uinfo[age_id[i][j]].sex==uinfo[id].sex && uinfo[age_id[i][j]].profession==uinfo[id].profession)
				similarPeople.PB(age_id[i][j]);
		}
	}

}
void suggest(LL x)
{
	map<LL,LL> watched;
	LL id=x;
	LL age=uinfo[id].age;
	PLL temp;temp.F=0,temp.S=0;
	VP sort_genre(19,temp);

	// using Heuristics
	//accordingHeuristics(age,id);

	//using CollaborativeFiltering
	dotProduct(id);
	LL l=data[id].size();
	REP(i,l)
		watched[data[id][i].F]=1;
	l=data[id].size();
	REP(i,l)
	{
		LL movieid=data[id][i].F;
		REP(k,19)
		{
			sort_genre[k].F+=minfo[movieid].genre[k];
			sort_genre[k].S=k;
		}
	}
	sort(sort_genre.begin(),sort_genre.end(),foo);
	l=similarPeople.size();
	map<LL,PLL> similarMovieRating_avgRating;
	map<LL,LL> similarMovieRating_noOfGenreMatching;
	map<LL,LL> similarMovieRating_noOfMaximumMatchingGenre;
	REP(j,l)
	{
		REP(k,data[similarPeople[j]].size())
		{
			if(watched.find(data[similarPeople[j]][k].F)!=watched.end())
				continue;			

			similarMovieRating_avgRating[data[similarPeople[j]][k].F].F+=data[similarPeople[j]][k].S;
			similarMovieRating_avgRating[data[similarPeople[j]][k].F].S++;

			// number of matching genres

			REP(i,5)
			{
				if(minfo[data[similarPeople[j]][k].F].genre[sort_genre[i].S]>0) // ??
					similarMovieRating_noOfGenreMatching[data[similarPeople[j]][k].F]++;
			}

			// number of Maximum matching

			REP(i,3)
			{
				if(minfo[data[similarPeople[j]][k].F].genre[sort_genre[i].S]>0) // ??
					similarMovieRating_noOfMaximumMatchingGenre[data[similarPeople[j]][k].F]+=(3-i);
			}
		}
	}
	vector<pair<double,LL> > avgRating;
	TR(similarMovieRating_avgRating,it)
	{
		avgRating.PB(MP((double((it->S).F)/double((it->S).S)),it->F));
	}
	VP noOfGenreMatching;
	TR(similarMovieRating_noOfGenreMatching,it)
	{
		noOfGenreMatching.PB(MP(it->S,it->F));
	}
	VP noOfMaximumMatchingGenre;
	TR(similarMovieRating_noOfMaximumMatchingGenre,it)
	{
		noOfMaximumMatchingGenre.PB(MP(it->S,it->F));
	}
	sort(avgRating.begin(),avgRating.end(),foo1);
	sort(noOfGenreMatching.begin(),noOfGenreMatching.end(),foo);
	sort(noOfMaximumMatchingGenre.begin(),noOfMaximumMatchingGenre.end(),foo);

	map<LL,double> finalSort;
	LL l1=avgRating.size();
	LL l2=noOfGenreMatching.size();
	LL l3=noOfMaximumMatchingGenre.size();
	for(LL i=0;i<min(20LL,l1);i++)
		finalSort[avgRating[i].S]+=(avgRating[i].F*0.6);
	for(LL i=0;i<min(20LL,l2);i++)
		finalSort[noOfGenreMatching[i].S]+=((double(similarMovieRating_avgRating[noOfGenreMatching[i].S].F)/double(similarMovieRating_avgRating[noOfGenreMatching[i].S].S))*0.75);
	for(LL i=0;i<min(20LL,l3);i++)
		finalSort[noOfMaximumMatchingGenre[i].S]+=((double(similarMovieRating_avgRating[noOfMaximumMatchingGenre[i].S].F)/double(similarMovieRating_avgRating[noOfMaximumMatchingGenre[i].S].S))*1.0);

	vector<pair<double,LL> > answer;
	TR(finalSort,it)
		answer.PB(MP(it->S,it->F));
	sort(answer.begin(),answer.end(),foo1);

	LL l4=answer.size();
	for(LL i=0;i<min(20LL,l4);i++)
		cout << minfo[answer[i].S].name << endl;
}
int main()
{
	parse();
	while(1)
	{
	cout << "Enter Used Id: ";
	LL x;
	SI(x);
	cout<<endl;
	cout<<"Suggested Movies list:"<<endl;
	suggest(x);
	}
	/*cout << endl;
	cout << "already watched" << endl;
	cout << endl;
	REP(i,data[x].size())
		cout << minfo[data[x][i].F].name << endl;*/
	return 0;
}
