/* Author : Bhairaw Aryan (81199119)
 * UBC Email id : aryanb@alumni.ubc.ca
 * Lab Section & Lab# : L2P LAB_8 (DAQ - Simons Game) , April 7th'20
 * Purpose : The program implements the Simon game using the DAQ simulator and declares win or loss. Verification can be seen on CMD screen.
 */

//Necessary Header files and Variables declaration
#define _CRT_SECURE_NO_WARNINGS
#include <stdio.h>
#include <stdlib.h>
#include <Windows.h>
#include <time.h>
#include <math.h>
#include <DAQlib.h>

#define SIMULATOR 6

#define TRUE 1
#define FALSE 0

#define ON 1
#define OFF 0

//Loops and index are used for leds and buttons, which reduces redundancy
#define LEDS_NO 4
#define BUTTON_NO 4

//Only changing the value below can increase and decrease the number of rounds that user wants to play
#define TOTAL_ROUNDS 5

#define DELAY 500

//Functions to be called
void SimonsGame(void);
int checkbuttons(int data[], int roundNo);
void CreateArray(int arrayIn[]);
void winloss(int x);

//---------------------------------------MAIN Function------------------------------------------------------------------------------------------------
int main(void){
	if (setupDAQ(SIMULATOR) == TRUE) {
		SimonsGame();
	}
	else {
		printf("ERROR: Unable to initialize system\n");
	}
	return 0;
}
//-----------------------------------------SIMONS Game Algorithm---------------------------------------------------------------------------------------
void SimonsGame(void) {
	while (continueSuperLoop() == TRUE) {

		int randomNos[TOTAL_ROUNDS];
		int score = 0;
		int round = 1;

		//Creates an array inorder to run the game accordingly
		CreateArray(randomNos);
		Sleep(DELAY * 4);

		while (round < (TOTAL_ROUNDS + 1) && continueSuperLoop() == TRUE) {
			
			//Flashes LEDS accoridng to rounds for memorising
			for (int index = 0; index < round; index++) {
				digitalWrite(randomNos[index], ON);
				Sleep(DELAY);
				digitalWrite(randomNos[index], OFF);
				Sleep(DELAY / 2);
			}
			//CMD outputs for verification
			printf("\nRound %d out of %d\n", round, TOTAL_ROUNDS);
			
			//Function that checks User's clicks
			int status = checkbuttons(randomNos, round);
			
			//increases round and score according to User's feedback
			if (status == TRUE) {
				round++;
				score++;
			}
			else {
				printf("\nWRONG! Restarting the game\n\n ");
				break;
			}
		}

		//This functions decides whether User has achieved Max Score and Declares Win/Loss accordingly
		winloss(score);
	}
}

//------------------------------------------Array Maker-------------------------------------------------------------------------------------------------------
//Purpose: Creates Array of length (TOTAL_ROUNDS) and fills it with random integer corresponding to led index

void CreateArray(int arrayIn[]){
	
	srand((unsigned)time(NULL));
	printf("\nSequence Generated are : ");
	
	for(int k = 0; k < TOTAL_ROUNDS; k++){
		arrayIn[k] = rand() % LEDS_NO;
		printf(" %d ", arrayIn[k]);
	}
}
//------------------------------------------Button Checker-----------------------------------------------------------------------------------------------------
// Purpose: Takes the game-array-sequence and current round number and verifies it with the clicks of User. Returns the decision accordingly
int checkbuttons(int data[], int roundNo) {
	int pointer = 0;
	
	while (pointer < roundNo && continueSuperLoop() == TRUE) {
		//checks the status of every button as long as something is clicked
		for (int button = 0; button < BUTTON_NO; button++) {
			int buttonStatus = digitalRead(button);

			while (buttonStatus == ON && continueSuperLoop() == TRUE) {
				if (digitalRead(button) == OFF) {
					printf("You pressed Button#%d\n", button);
					//checks if button matches the current position number in the array and then moves onto next number of the array
					if (button == data[pointer]) {
						buttonStatus = OFF;
						pointer++;
						break;
					}
					else {
						return FALSE;
					}
				}
			}
		}
	}
	//if all numbers of the current round are completed, it means user has completed only that round and confirms success
	return TRUE;
}

//------------------------------------------Diplaying whether user has won or lost------------------------------------------------------------------------------
//Purpose : Compares Final Score and Total rounds to decide whether User has won or lost

void winloss(int score){
	int LED;
	if (score == TOTAL_ROUNDS){
		LED = 0;
		printf("\nGreat! You won !!\n");
	}
	else {
		LED = 1;
	}
	//Flashes respetive leds 3 times for a win or loss 
	for (int a = 0; a < 3; a++) {
			digitalWrite(LED, ON);
			Sleep(DELAY / 2);
			digitalWrite(LED, OFF);
			Sleep(DELAY / 2);
	}
	Sleep(DELAY);
}
