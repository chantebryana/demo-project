#include <iostream> // cin, cout
#include <cstdlib> 
#include <string> // string
#include "./linked_list.h"

int main() {
	run_node * run_200m;
	run_node * node1 = new run_node;
	run_node * node2 = new run_node;
	run_node * node3 = new run_node;
	//node1->name = "Bianca"; node1->time_sec = 26.01;
	//node2->name = "Akmal"; node2->time_sec = 25.57;	
	//node3->name = "Maurice"; node3->time_sec = 26.09;
	node1->name = "Bianca"; node1->rank = 1;
	node2->name = "Akmal"; node2->rank = 3;	
	node3->name = "Maurice"; node3->rank = 2;
	run_200m = node1;
	node1->next = node2;
	node2->next = node3;
	node3->next = NULL;

	node1 = node2 = node3 = NULL;

	//run_node * null_node = NULL;

	print_node_rank(run_200m);
	std::cout << std::endl;
	//insert_new_at_end(& run_200m, "Aziz", 27.00);
	//insert_new_at_front(& run_200m, "Francois", 25.51);
	//insert_new_after_name(& run_200m, "Maurice", "Gustov", 25.63);
	//insert_new_after_name( & null_node, "Bill", "Susan", 26.9);
	//insert_new_after_name(& run_200m, "Arthur", "Phuong", 26.73);
	
	// section below sorts the linked list based on time_sec: takes linked list, finds length of linked list and saving to size_buff and saves memory address pointers into an array (array_ify), sorts the array (based on time_sec node) using qsort, uses list_ify to translate the sorted array back to the linked list, then prints the results to the screen: 
	int size_buff;
	run_node * * array_of_node_address = array_ify(run_200m, & size_buff);
	//qsort(array_of_node_address, size_buff, sizeof(run_node *), compare_node);
	qsort(array_of_node_address, size_buff, sizeof(run_node *), compare_node_rank);
	run_200m = list_ify(array_of_node_address, size_buff);
	print_node_rank(run_200m);

	// deallocate run_200m:
	deallocate(& run_200m);


	return 0;
}