#include <iostream> // cin, cout
#include <cstdlib> 
#include <string> // string

struct run_node {
	std::string name;
	// float time_sec;
	int rank;
	run_node * next;
} ;

// prints linked list: runner and rank nodes: 
void print_node_rank(run_node * existing_node) {
	if(existing_node != NULL) { // makes sure existing_node holds information
		while (existing_node->next != 0){ // goes through the linked list till the end
			std::cout << "runner: " << existing_node->name << ", rank: " << existing_node->rank << std::endl;
			existing_node = existing_node->next;
		}
		// prints out the final chunk of data: 
		std::cout << "runner: " << existing_node->name << ", rank: " << existing_node->rank << std::endl;
	}
}

// finds the length of linked list, to be used in array_ify (iterates through each node of linked list, increasing the counter one by one until reaching the end of the list): 
int find_list_length(run_node * head) {
	int counter = 0;
	while (head->next != NULL) {
		counter += 1;
		head = head->next;
	}
	counter += 1;
	return counter;
}

// save memory addresses of each linked list node into an array on the heap: 
run_node * * array_ify(run_node * head, int * size_buff) {
	// dynamically find the value of size_buff, based on the length of the linked list: 
	* size_buff = find_list_length(head);

	// create a new heap array, then populate it with the addresses of each node in linked list: 
	// (heap memory allocated to a_of_node_address will be deallocated in list_ify):
	run_node * * a_of_node_address = new run_node * [* size_buff];
	for (int i = 0; i < * size_buff; i++) {
		a_of_node_address[i] = head;
		head = head->next;
	}
	// return array of node addresses back to use in main: 
	return a_of_node_address;
}

// take memory addresses saved in array and assign to head and node->next of linked list:
run_node * list_ify(run_node * * a_nn, int s) {
	run_node * next_a;
	// assign head pointer to memory address stored in element zero of array:
	next_a = a_nn[0];
	// iterate through remainder of array and linked list, assigning corresponding memory addresses to linked list nodes:
	for (int i = 1; i < s; i++) {
		next_a->next = a_nn[i];
		next_a = next_a->next;
	}
	// manually assign final node->next to NULL to terminate linked list:
	next_a->next = NULL;

	// assign pointer to head of linked list to head_address; deallocate heap memory used up by a_nn (allocated in array_ify); return pointer to head of linked list (can't return next_a because right now it's pointing to the end of linked list):
	run_node * head_address = a_nn[0];
	delete[] a_nn;
	return head_address;
}

// comparison function (based on rank) to be used within qsort. using memory addresses stored in array, points to nodes of linked list and decides whether to rearrange them or not: 
int compare_node_rank(const void * void_a, const void * void_b) {
	// set void pointers to node * * to correspond with array datatype:
	run_node * * prev = (run_node * *)void_a;
	run_node * * next = (run_node * *)void_b;
	// standard sorting check: is prev >, <, or == next?:
	if (((*prev)->rank) < ((*next)->rank)) {
		return -1;
	} else if (((*prev)->rank) > ((*next)->rank)) {
		return 1;
	} else { // prev->rank == next->rank
		return 0;
	}
}

void deallocate(run_node * * existing_node) {
	while (* existing_node) {
		run_node * placeholder;
		placeholder = * existing_node;
		* existing_node = (* existing_node)->next;
		delete placeholder;
		// don't need to explicity delete * existing_node b/c it's already set to NULL thanks to the while loop
	}
}