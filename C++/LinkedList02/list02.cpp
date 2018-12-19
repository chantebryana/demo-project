#include <cstdlib>
#include <string> //string
#include "./list02.h"

int main () {
    car * owned_cars;
    car * car1 = new car;
    car * car2 = new car;
    car * car3 = new car;
    
    car1->make = "Ford"; car1->year = 1999;
    car2->make = "Ford"; car2->year = 2008;
    car3->make = "Jeep"; car3->year = 2007;
    
    owned_cars = car1;
    car1->next = car2;
    car2->next = car3;
    car3->next = NULL;
    
    car1 = car2 = car3 = NULL;
    
    deallocate (& owned_cars);
    
    return 0;
}