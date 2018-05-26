#include <iostream>
using namespace std;
int main()
{
    double w,h1,h2;
    int a,r;
    char ch;
    cout<<"Enter Weight"<<endl;
    cin>>w;
    cout<<"Enter Height"<<endl;
    cin>>h1;
    cout<<"Enter Age"<<endl;
    cin>>a;
    h2=(h1*30.48)/12.00;
    cout<<"Enter m for Male And f for Female"<<endl;
    cin>>ch;
    if(ch=='m' ||ch=='M')
    {

        r=(10*w+(6.25*h2)-(5*a)+5);
        cout<<"You Need "<<r<<" Calories Per Day"<<endl;
    }
    else
    {
        r=(10*w+(6.25*h2)-(5*a)-161);
        cout<<"You Need "<<r<<" Calories Per Day"<<endl;
    }


    return 0;

}
