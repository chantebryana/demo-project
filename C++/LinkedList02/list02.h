#include <cstdlib>
#include <string> //string 

struct car {
    std::string make;
    int year;
    car * next;
} ;



void deallocate (car ** existing_node) {
    while (* existing_node) {
        car * placeholder;
        placeholder = * existing_node;
        * existing_node = (* existing_node)->next;
        delete placeholder;
        //note: * existing_node already "deleted" b/c it's set to NULL
    }
}