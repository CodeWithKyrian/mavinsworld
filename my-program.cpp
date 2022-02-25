#include <iostream>
using namespace std;

int main() {

    int numPassengers, remainder, numSeatsLeft;
    cout << "Enter number of passsengers: ";
    cin >> numPassengers;

    remainder = numPassengers % 50;

    if (remainder == 0)
    {
        numSeatsLeft = 0;
        cout << "All the buses will be filled completely";
    }
    else{
        numSeatsLeft = 50 - remainder;
        cout << "There will be " << numSeatsLeft << " seats left in the last bus";
    }

    return 0;
}